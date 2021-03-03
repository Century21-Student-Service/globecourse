<?php
require '../../../config/conn.php';

//function names
$funcArr = [
    'getLevels',
    'getStates',
    'getFields',
];

$op = 0;

if (isset($_REQUEST['op'])) {
    $op = $_REQUEST['op'];
} else {
    $op = 0;
}

if (is_numeric($op)) {
    if ($op < 0 || $op >= count($funcArr)) {
        die('Invalid param');
    }
    call_user_func($funcArr[$op]);
} else {
    if (!in_array($op, $funcArr)) {
        die('Invalid param');
    }
    call_user_func($op);
}

function getLevels()
{
    global $conn;
    $state_id = isset($_REQUEST['state']) ? $_REQUEST['state'] : 0;
    $regional = isset($_REQUEST['regional']) ? $_REQUEST['regional'] : "";

    $regional_sql = strlen($regional) ? " AND id NOT IN (1,2,3,4,9,11,12) " : "";

    if ($state_id) {
        $sql = "SELECT `id`,`name` FROM `level` WHERE 1 = 1 $regional_sql AND id IN
                  (SELECT level_id FROM course WHERE field_id_c IN(SELECT field_id FROM immi_field_state WHERE state_id=?)
                                                  AND inst_id IN (SELECT id FROM institution WHERE state_id=?))
                  ORDER BY id;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$state_id, $state_id]);
    } else {
        $sql = "SELECT `id`,`name` FROM `level` WHERE 1 = 1 $regional_sql ORDER BY id;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
}

function getStates()
{
    global $conn;
    if (isset($_REQUEST['regional'])) {
        $regional = $_REQUEST['regional'];
    }
    if (isset($regional)) {
        $sql = "SELECT `id`,`name` FROM `state` WHERE id IN(SELECT state_id FROM institution WHERE regional=?) ORDER BY id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$regional]);
    } else {
        $sql = "SELECT `id`,`name` FROM `state` ORDER BY id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
}
function getFields($return = false)
{
    global $conn;
    $state = $_REQUEST['state'];
    $regional = isset($_REQUEST['regional']) ? $_REQUEST['regional'] : "";
    $level = $_REQUEST['level'];

    $param = [];
    $sql_parents = "SELECT `id`,`name` FROM field WHERE deep = 0 ";

    if ($level) {
        $sql_parents .= "AND id IN(SELECT field_id_p FROM course WHERE level_id=:level_id) ";
        $param['level_id'] = $level;
    }
    if ($state) {
        $sql_parents .= "AND id IN(SELECT field_id_p FROM course WHERE inst_id IN(SELECT id FROM institution WHERE state_id=:state_id)) ";
        $param['state_id'] = $state;
    }
    if (strlen($regional)) {
        if ($regional) {
            $sql_parents .= "AND id IN(SELECT p_id FROM field WHERE id IN(SELECT field_id FROM immi_field_state WHERE state_id <> 0)) ";
        } else {
            $sql_parents .= "AND id IN(SELECT p_id FROM field WHERE id IN(SELECT field_id FROM immi_field_state WHERE state_id = 0)) ";
        }
    }
    $sql_parents .= " ORDER BY id;";

    $stmt_parents = $conn->prepare($sql_parents);
    $stmt_parents->execute($param);
    $parents = $stmt_parents->fetchAll(PDO::FETCH_ASSOC);
    $sql_child = "SELECT `id`,`name` FROM field WHERE p_id = ? ";
    if (strlen($regional)) {
        if ($regional) {
            $sql_child .= "AND id IN(SELECT field_id FROM immi_field_state WHERE state_id <> 0) ";
        } else {
            $sql_child .= "AND id IN(SELECT field_id FROM immi_field_state WHERE state_id = 0) ";
        }
    }
    $sql_child .= "ORDER BY id;";
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
