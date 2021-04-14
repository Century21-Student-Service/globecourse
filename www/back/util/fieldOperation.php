<?php
include "checksession.php";
require '../../../config/conn.php';

//function names
$funcArr = [
    'getFields',
    'getStates',
    'getFieldsChildren',
    'getImmi',
    'saveImmi',
    'addFieldC',
    'delFieldC',
    'renameField',
];

$op = 0;

if (isset($_REQUEST['op']) && is_numeric($_REQUEST['op'])) {
    $op = $_REQUEST['op'];
}

if ($op < 0 || $op >= count($funcArr)) {
    die('Invalid param');
}

call_user_func($funcArr[$op]);

function getFields($return = false)
{
    global $conn;
    $sql_parents = "SELECT `id`,`name`,`name_en` FROM field WHERE deep = 0 ORDER BY id;";
    $stmt_parents = $conn->prepare($sql_parents);
    $stmt_parents->execute();
    $parents = $stmt_parents->fetchAll(PDO::FETCH_ASSOC);
    $sql_child = "SELECT `id`,`name`,`name_en` FROM field WHERE p_id = ? ORDER BY id;";
    $stmt_child = $conn->prepare($sql_child);
    foreach ($parents as &$p) {
        $stmt_child->execute([$p['id']]);
        $p['children'] = $stmt_child->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($return) {
        return $parents;
    } else {
        echo json_encode($parents, JSON_UNESCAPED_UNICODE);
    }
}

function getFieldsParent($return = false)
{
    global $conn;
    $sql_parents = "SELECT `id`,`name` FROM field WHERE deep = 0 ORDER BY id;";
    $stmt_parents = $conn->prepare($sql_parents);
    $stmt_parents->execute();
    $parents = $stmt_parents->fetchAll(PDO::FETCH_ASSOC);
    if ($return) {
        return $parents;
    } else {
        echo json_encode($parents, JSON_UNESCAPED_UNICODE);
    }
}

function getFieldsChildren($return = false)
{
    global $conn;
    $pid = $_REQUEST['pid'];
    $sql_children = "SELECT `id`,`name`,name_en FROM field WHERE p_id = ? ORDER BY orderint,id;";
    $stmt_children = $conn->prepare($sql_children);
    $stmt_children->execute([$pid]);
    $children = $stmt_children->fetchAll(PDO::FETCH_ASSOC);
    if ($return) {
        return $children;
    } else {
        echo json_encode($children, JSON_UNESCAPED_UNICODE);
    }
}

function getStates($return = false)
{
    global $conn;
    $sql_states = "SELECT `id`,`name`,`code` FROM `state` ORDER BY id;";
    $stmt_states = $conn->prepare($sql_states);
    $stmt_states->execute();
    $states = $stmt_states->fetchAll(PDO::FETCH_ASSOC);
    if ($return) {
        return $states;
    } else {
        echo json_encode($states, JSON_UNESCAPED_UNICODE);
    }
}

function getImmi()
{
    global $conn;
    $result = [];
    $data = [];
    $pid = $_REQUEST['pid'];
    $children = getFieldsChildren(true);
    $states = getStates(true);

    array_unshift($states, ["id" => "0", "name" => "Non-Regional", "code" => "Non-Regional"]);
    // array_unshift($states, ["id" => "0", "name" => "field_name", "code" => "field_name"]);
    $sql_immi = "SELECT id,field_id,state_id,immi FROM immi_field_state WHERE field_id IN(SELECT id FROM field WHERE p_id = ?)";
    $stmt_immi = $conn->prepare($sql_immi);
    $stmt_immi->execute([$pid]);
    $immi = $stmt_immi->fetchAll(PDO::FETCH_ASSOC);
    foreach ($immi as $i) {
        if (!isset($result[$i['field_id']])) {
            $result[$i['field_id']] = [];
        }
        array_push($result[$i['field_id']], $i['state_id']);
    }
    foreach ($children as $c) {
        $one = ['field_id' => $c['id'], 'field_name' => $c['name'], 'field_name_en' => $c['name_en']];
        if (!isset($result[$c['id']])) {
            foreach ($states as $s) {
                $one[$s['id']] = 0;
            }
        } else {
            foreach ($states as $s) {
                if (in_array($s['id'], $result[$c['id']])) {
                    $one[$s['id']] = 1;
                } else {
                    $one[$s['id']] = 0;
                }
            }
        }
        array_push($data, $one);
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

function saveImmi()
{
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);
    if (!$data) {
        echo json_encode(['code' => -1, 'msg' => '请求体错误'], JSON_UNESCAPED_UNICODE);
        die;
    }
    $one_field_id = $data[0]['field'];

    $sql_del = "DELETE FROM immi_field_state WHERE field_id IN(SELECT id FROM field WHERE p_id IN (SELECT p_id FROM field WHERE id=?));";
    $stmt_del = $conn->prepare($sql_del);

    $data = array_values(array_filter($data, function ($e) {
        return $e['checked'];
    }));

    if (!empty($data)) {
        $insert_values = [];
        foreach ($data as $d) {
            $question_marks[] = '(' . placeholders('?', 2) . ')';
            $insert_values = array_merge($insert_values, [$d['field'], $d['state']]);
        }

        $sql_insert = "INSERT INTO immi_field_state(field_id,state_id)VALUES " . implode(',', $question_marks);
        $stmt_insert = $conn->prepare($sql_insert);
    }

    $conn->beginTransaction();
    try {
        $stmt_del->execute([$one_field_id]);
        if (!empty($data)) {
            $stmt_insert->execute($insert_values);
        }
        $conn->commit();
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['code' => -99, 'msg' => '数据库错误 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }

}

function placeholders($text, $count = 0, $separator = ",")
{
    $result = array();
    if ($count > 0) {
        for ($x = 0; $x < $count; $x++) {
            $result[] = $text;
        }
    }
    return implode($separator, $result);
}

function addFieldC()
{
    global $conn;
    $name = $_REQUEST['name'];
    $pid = $_REQUEST['pid'];

    if (empty($name) || empty($pid)) {
        echo json_encode(['code' => -1, 'msg' => '请求体错误'], JSON_UNESCAPED_UNICODE);
        die;
    }

    $sql = "INSERT INTO field (name,p_id,deep)VALUES(?,?,1);";
    $stmt = $conn->prepare($sql);
    try {
        $stmt->execute([$name, $pid]);
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -99, 'msg' => '数据库错误 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}

function delFieldC()
{
    global $conn;
    $fid = $_REQUEST['fid'];

    if (empty($fid)) {
        echo json_encode(['code' => -1, 'msg' => '请求体错误'], JSON_UNESCAPED_UNICODE);
        die;
    }

    $sql_check = "SELECT c.name AS `course` ,i.name AS `inst` FROM course c LEFT JOIN institution i ON c.inst_id=i.id WHERE c.field_id_c = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute([$fid]);
    $rows = $stmt_check->fetchAll(PDO::FETCH_ASSOC);

    if ($rows) {
        echo json_encode(['code' => 10, 'msg' => ['total' => count($rows), 'rows' => array_slice($rows, 0, 3)]], JSON_UNESCAPED_UNICODE);
        die;
    } else {
        $sql_del = "DELETE FROM field WHERE id=?";
        $stmt_del = $conn->prepare($sql_del);
        try {
            $stmt_del->execute([$fid]);
            echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            echo json_encode(['code' => -99, 'msg' => '数据库错误 - ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
}

function renameField()
{
    global $conn;
    if (empty($_REQUEST['id']) || empty($_REQUEST['name'])) {
        echo json_encode(['code' => -1, 'msg' => '参数非法'], JSON_UNESCAPED_UNICODE);
        die;
    }
    $param['id'] = $_REQUEST['id'];
    $sql = "UPDATE field SET ";
    if (!empty($_REQUEST['name'])) {
        $sql .= ' `name` = :name,';
        $param['name'] = $_REQUEST['name'];
    }
    if (!empty($_REQUEST['name'])) {
        $sql .= ' `name_en` = :name_en,';
        $param['name_en'] = $_REQUEST['name_en'];
    }
    $sql = substr($sql, 0, -1);
    $sql .= " WHERE id = :id ;";
    $stmt = $conn->prepare($sql);
    try {
        $stmt->execute($param);
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -2, 'msg' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}
