<?php
include "checksession.php";
require '../../../config/conn.php';

$fields = [];

//function names
$funcArr = [
    'getCourses',
    'getCoursesById',
    'getFields',
    'getLevels',
    'saveCourse',
    'getStatesAndInstitutions',
    'quickSaveCourse',
    'deleteCourse',
    'swapCourse',
];

$op = 0;

if (isset($_REQUEST['op']) && is_numeric($_REQUEST['op'])) {
    $op = $_REQUEST['op'];
}

if ($op < 0 || $op >= count($funcArr)) {
    die('Invalid param');
}

call_user_func($funcArr[$op]);

function getCourses()
{
    global $conn;
    $limit = empty($_POST['limit']) ? "0" : $_POST['limit'];
    $offset = empty($_POST['offset']) ? "0" : $_POST['offset'];
    $orderName = 'id';
    $sortOrder = " DESC ";
    if (!empty($_REQUEST['sort'])) {
        $orderName = $_REQUEST['sort'];
        if ($orderName == 'field') {
            $orderName = 'field_id_c';
        }

    }

    // $orderName = "c." . $orderName;

    if (!empty($_REQUEST['order'])) {
        $sortOrder = strtoupper($_REQUEST['order']);
    }

    $sql_detail = "SELECT  c.id,
                           c.name,
                           c.ename,
                           l.name AS `level`,
                           i.name AS `inst`,
                           s.name AS `state`,
                           c.level_id,
                           c.inst_id,
                           c.field_id_p,
                           c.field_id_c,
                           c.hours,
                           c.months,
                           c.fees,
                           c.immigration,
                           c.status
                    FROM course c
                    LEFT JOIN `level` l ON c.level_id = l.id
                    LEFT JOIN `institution` i ON i.id = c.inst_id
                    LEFT JOIN `state` s ON i.state_id = s.id
                    WHERE c.id IN REPLACEME
                    ORDER BY $orderName $sortOrder, c.id DESC
                    LIMIT $offset, $limit ;";

    $sql = "SELECT c.id FROM course c ";
    $whereClause = " WHERE 1=1 ";

    $param = [];

    if (!empty($_REQUEST['inst'])) {
        $param['instId'] = $_REQUEST['inst'];
        $whereClause .= " AND inst_id = :instId ";
    }

    if (!empty($_REQUEST['state'])) {
        $param['stateId'] = $_REQUEST['state'];
        $whereClause .= " AND inst_id IN(SELECT id FROM institution WHERE state_id = :stateId) ";
    }

    if (!empty($_REQUEST['level'])) {
        $param['levelId'] = $_REQUEST['level'];
        $whereClause .= " AND level_id = :levelId ";
    }

    if (!empty($_REQUEST['field_p']) && $_REQUEST['field_p'] > 0) {
        $param['fieldPId'] = $_REQUEST['field_p'];
        $whereClause .= " AND field_id_p = :fieldPId ";
        if (!empty($_REQUEST['field_c'])) {
            $param['fieldCId'] = $_REQUEST['field_c'];
            $whereClause .= " AND field_id_c = :fieldCId ";
        }
    } else if (!empty($_REQUEST['field_p']) && $_REQUEST['field_p'] == -1) {
        $whereClause .= " AND (field_id_c IS NULL OR field_id_p IS NULL) ";
    }

    if (!empty($_POST['keyword'])) {
        $whereClause .= " AND c.name LIKE :keyword ";
        $query = trim($_POST['keyword']);
        $param['keyword'] = "%$query%";
        $stmt1 = $conn->prepare($sql . $whereClause);
        $stmt1->execute($param);

        $whereClause = str_replace("c.name LIKE :keyword", "c.ename LIKE :keyword", $whereClause);

        $stmt2 = $conn->prepare($sql . $whereClause);
        $stmt2->execute($param);

        $result = array_merge(
            $stmt1->fetchAll(PDO::FETCH_COLUMN),
            $stmt2->fetchAll(PDO::FETCH_COLUMN)
        );
    } else {
        // echo $sql . $whereClause;die;
        $stmt1 = $conn->prepare($sql . $whereClause);
        $stmt1->execute($param);
        $result = $stmt1->fetchAll(PDO::FETCH_COLUMN);
    }

    if (count($result) > 0) {
        $ids = "(" . implode(",", $result) . ")";
        $stmt_detail = $conn->query(str_replace("REPLACEME", $ids, $sql_detail));
        $result_detail = $stmt_detail->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $result_detail = [];
    }

    foreach ($result_detail as &$r) {
        $r['field'] = getField($r['field_id_p'], $r['field_id_c']);
    }

    echo json_encode(
        [
            "total" => count($result),
            "rows" => $result_detail,
        ], JSON_UNESCAPED_UNICODE
    );

}

function getField($p_id, $c_id)
{
    global $fields;
    if (empty($fields)) {
        $fields = getFields(true);
    }
    $result = ["p" => "", "c" => ""];

    foreach ($fields as $f) {
        if ($f['id'] == $p_id) {
            $result['p'] = $f['name'];
            foreach ($f['children'] as $c) {
                if ($c['id'] == $c_id) {
                    $result['c'] = $c['name'];
                    break;
                }
            }
            break;
        }
    }
    return $result;
}

function getCoursesById()
{
    global $conn;
    $courseId = $_REQUEST['id'];
    $sql = "SELECT  c.id,
                    c.name,
                    c.ename,
                    c.level_id,
                    c.field_id_p AS `field_p`,
                    c.field_id_c AS `field_c`,
                    i.name AS `institution`,
                    c.inst_id,
                    c.hours,
                    c.months,
                    c.fees,
                    c.immigration,
                    c.intro,
                    c.description,
                    c.status
            FROM course c
            LEFT JOIN institution i ON c.inst_id = i.id
            WHERE c.id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$courseId]);
    $one = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($one, JSON_UNESCAPED_UNICODE);
}

function getFields($return = false)
{
    global $conn;
    $sql_parents = "SELECT `id`,`name` FROM field WHERE deep = 0 ORDER BY id;";
    $stmt_parents = $conn->prepare($sql_parents);
    $stmt_parents->execute();
    $parents = $stmt_parents->fetchAll(PDO::FETCH_ASSOC);
    $sql_child = "SELECT `id`,`name` FROM field WHERE p_id = ? ORDER BY id;";
    $stmt_child = $conn->prepare($sql_child);
    foreach ($parents as &$p) {
        $stmt_child->execute([$p['id']]);
        $p['children'] = $stmt_child->fetchAll(PDO::FETCH_ASSOC);
    }
    if (getCourseNoField() > 0) {
        array_push($parents, ['id' => '-1', 'name' => '未知', 'children' => []]);
    }
    if ($return) {
        return $parents;
    } else {
        echo json_encode($parents, JSON_UNESCAPED_UNICODE);
    }
}

function getCourseNoField()
{
    global $conn;
    $sql = "SELECT count(id) FROM course WHERE field_id_c IS NULL;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count;
}

function getLevels()
{
    global $conn;
    $sql_levels = "SELECT `id`,`name` FROM `level` ORDER BY id;";
    $stmt_levels = $conn->prepare($sql_levels);
    $stmt_levels->execute();
    echo json_encode($stmt_levels->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
}

function saveCourse()
{
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);
    if (!$data) {
        echo json_encode(['code' => -1, 'msg' => '请求体错误'], JSON_UNESCAPED_UNICODE);
        die;
    }
    // echo json_encode($data);
    // echo PHP_EOL;

    if (!empty($data['id'])) {
        //更新现有数据
        $sql = "UPDATE course SET ";

        foreach ($data as $key => $value) {
            if (empty($data[$key])) {
                unset($data[$key]);
                continue;
            }
        }
        foreach ($data as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            $sql .= "$key=:$key,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE id=:id";
        // echo $sql;die;
    } else {
        // 插入新数据
        $sql = "INSERT INTO course (`name`,`ename`,`level_id`,`field_id_p`,`field_id_c`,`months`,`fees`,`intro`,`description`,`inst_id`)VALUE(:name,:ename,:level_id,:field_id_p,:field_id_c,:months,:fees,:intro,:description,:inst_id);";
    }

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -20, 'msg' => '数据库错误' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}

function getStatesAndInstitutions()
{
    global $conn;
    $sql_state = "SELECT id,name FROM `state` WHERE id IN(SELECT state_id FROM institution);";
    $stmt_state = $conn->prepare($sql_state);
    $stmt_state->execute();
    $result_state = $stmt_state->fetchAll(PDO::FETCH_ASSOC);

    $sql_inst = "SELECT `id`,`name` FROM institution WHERE state_id = ? ORDER BY convert(`name` using gbk) ";
    $stmt_inst = $conn->prepare($sql_inst);

    foreach ($result_state as &$s) {
        $stmt_inst->execute([$s['id']]);
        $s['inst'] = $stmt_inst->fetchAll(PDO::FETCH_ASSOC);
    }
    echo json_encode($result_state, JSON_UNESCAPED_UNICODE);
}

function quickSaveCourse()
{
    global $conn;
    if (empty($_REQUEST['method']) || empty($_REQUEST['id']) || ($_REQUEST['method'] != 'field' && !isset($_REQUEST['value']))) {
        echo json_encode(['code' => -1, 'msg' => '请求体错误'], JSON_UNESCAPED_UNICODE);
        die;
    }

    $id = $_REQUEST['id'];
    $method = $_REQUEST['method'];
    $param['id'] = $id;
    if ($method != 'field') {
        $param[$method] = $_REQUEST['value'];
    } else {
        $param['field_p'] = $_REQUEST['field_p'];
        $param['field_c'] = $_REQUEST['field_c'];
    }

    if ($method != 'field') {
        $sql = "UPDATE course SET $method = :$method WHERE id = :id ;";
    } else {
        $sql = "UPDATE course SET field_id_p = :field_p, field_id_c = :field_c  WHERE id = :id ;";
    }
    $stmt = $conn->prepare($sql);
    try {
        $stmt->execute($param);
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -20, 'msg' => '数据库错误' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}

function deleteCourse()
{
    global $conn;
    $sql_delete = "DELETE FROM course WHERE id=:id;";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
    $conn->beginTransaction();
    try {
        $stmt_delete->execute();
        $conn->commit();
        echo json_encode(['code' => 0, 'msg' => 'success']);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['code' => -103, 'msg' => $e->getMessage()]);
    }
}

function swapCourse()
{
    global $conn;
    $sql_delete = "UPDATE course SET `status`= -1 * `status` WHERE id=:id;";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
    $conn->beginTransaction();
    try {
        $stmt_delete->execute();
        $conn->commit();
        echo json_encode(['code' => 0, 'msg' => 'success']);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['code' => -103, 'msg' => $e->getMessage()]);
    }
}
