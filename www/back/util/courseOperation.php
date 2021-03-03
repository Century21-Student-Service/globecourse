<?php
include "checksession.php";
require '../../../config/conn.php';

define('PHPMYWIND_ROOT', substr(dirname(__FILE__), 0, -9));
define('PHPMYWIND_DATA', PHPMYWIND_ROOT . 'data');
define('PHPMYWIND_TEMP', PHPMYWIND_ROOT . 'templates');
define('PHPMYWIND_UPLOAD', PHPMYWIND_ROOT . 'uploads');
define('UPLOAD_IMG', PHPMYWIND_UPLOAD . '/image');
define('UPLOAD_SOFT', PHPMYWIND_UPLOAD . '/soft');
define('UPLOAD_MEDIA', PHPMYWIND_UPLOAD . '/media');

$fields = [];

//function names
$funcArr = [
    'getCourses',
    'getCoursesById',
    'getFields',
    'getLevels',
    'saveCourse',
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
    $instId = $_REQUEST['inst'];
    $limit = empty($_POST['limit']) ? "0" : $_POST['limit'];
    $offset = empty($_POST['offset']) ? "0" : $_POST['offset'];
    $orderName = 'id';
    $sortOrder = " DESC ";
    if (!empty($_REQUEST['sort'])) {
        $orderName = $_REQUEST['sort'];
    }
    $orderName = "c." . $orderName;

    if (!empty($_REQUEST['order'])) {
        $sortOrder = strtoupper($_REQUEST['order']);
    }

    $sql_detail = "SELECT  c.id,
                           c.name,
                           c.ename,
                           l.name AS `level`,
                           c.field_id_p,
                           c.field_id_c,
                           c.hours,
                           c.fees,
                           c.immigration,
                           c.status
                    FROM course c
                    LEFT JOIN `level` l ON c.level_id = l.id
                    WHERE c.inst_id = ?
                   -- WHERE c.id IN REPLACEME
                    ORDER BY c.id DESC
                    LIMIT $offset, $limit ;";
    $sql = "SELECT id FROM course WHERE inst_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$instId]);
    $total = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt_detail = $conn->prepare($sql_detail);
    $stmt_detail->execute([$instId]);
    $result_detail = $stmt_detail->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result_detail as &$r) {
        $r['field'] = getField($r['field_id_p'], $r['field_id_c']);
    }

    // echo json_encode($result_detail, JSON_UNESCAPED_UNICODE);
    echo json_encode(
        [
            "total" => count($total),
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
    $result = '';

    foreach ($fields as $f) {
        if ($f['id'] == $p_id) {
            $result .= ":" . $f['name'];
            foreach ($f['children'] as $c) {
                if ($c['id'] == $c_id) {
                    $result .= ":" . $c['name'];
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

    if ($return) {
        return $parents;
    } else {
        echo json_encode($parents, JSON_UNESCAPED_UNICODE);
    }
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
        $sql = "INSERT INTO course (`name`,`ename`,`level_id`,`field_id_p`,`field_id_c`,`hours`,`fees`,`intro`,`description`,`inst_id`)VALUE(:name,:ename,:level_id,:field_id_p,:field_id_c,:hours,:fees,:intro,:description,:inst_id);";
    }

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -20, 'msg' => '数据库错误' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }

}
