<?php
require '../../../config/conn.php';

//function names
$funcArr = [
    'getLevels',
    'getStates',
    'getFields',
    'getFieldsCOnly',
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
    $regional = isset($_REQUEST['regional']) ? $_REQUEST['regional'] : "";
    $level = $_REQUEST['level'];
    $state = $_REQUEST['state'];

    $sql_child = "SELECT `id`,`name`,`p_id` FROM field WHERE 1 = 1 ";
    if (strlen($regional)) {
        if ($regional) {
            $sql_child .= " AND id IN(SELECT field_id FROM immi_field_state WHERE state_id <> 0) ";
        } else {
            $sql_child .= " AND id IN(SELECT field_id FROM immi_field_state WHERE state_id = 0) ";
        }
    }
    if ($level) {
        $sql_child .= " AND id IN (SELECT field_id_c FROM course WHERE level_id=:level) ";
        $param['level'] = $level;
    }

    if ($state) {
        $sql_child .= "AND id IN(SELECT field_id_c FROM course WHERE inst_id IN(SELECT id FROM institution WHERE state_id=:state)) ";
        $param['state'] = $state;
    }

    $stmt_child = $conn->prepare($sql_child);
    $stmt_child->execute($param);
    $children = $stmt_child->fetchAll(PDO::FETCH_ASSOC);

    $pids = array_map(function ($c) {
        return $c['p_id'];
    }, $children);

    $pids = array_unique($pids);
    $pids = array_filter($pids, function ($pid) {
        return !empty($pid);
    });

    $sql_parent = "SELECT `id`,`name` FROM field WHERE deep = 0 AND id IN(" . implode(',', $pids) . ");";
    // echo $sql_parent;die;
    $stmt_parent = $conn->prepare($sql_parent);
    $stmt_parent->execute();
    $parents = $stmt_parent->fetchAll(PDO::FETCH_ASSOC);

    foreach ($children as $c) {
        foreach ($parents as &$p) {
            if ($c['p_id'] == $p['id']) {
                if (!isset($p['children'])) {
                    $p['children'] = [];
                }
                array_push($p['children'], ['id' => $c['id'], 'name' => $c['name']]);
                break;
            }
        }
    }

    if ($return) {
        return $parents;
    } else {
        echo json_encode($parents, JSON_UNESCAPED_UNICODE);
    }
}

function getFieldsCOnly($return = false)
{
    global $conn;
    $regional = isset($_REQUEST['regional']) ? $_REQUEST['regional'] : "";
    $field_p = $_REQUEST['field_p'];
    $level = $_REQUEST['level'];
    $state = $_REQUEST['state'];

    $param['field_p'] = $field_p;

    $sql_child = "SELECT `id`,`name`,`p_id` FROM field WHERE p_id = :field_p ";
    if (strlen($regional)) {
        if ($regional) {
            $sql_child .= " AND id IN(SELECT field_id FROM immi_field_state WHERE state_id <> 0) ";
        } else {
            $sql_child .= " AND id IN(SELECT field_id FROM immi_field_state WHERE state_id = 0) ";
        }
    }

    if ($level) {
        $sql_child .= " AND id IN (SELECT field_id_c FROM course WHERE level_id=:level) ";
        $param['level'] = $level;
    }

    if ($state) {
        $sql_child .= "AND id IN(SELECT field_id_c FROM course WHERE inst_id IN(SELECT id FROM institution WHERE state_id=:state)) ";
        $param['state'] = $state;
    }

    $stmt_child = $conn->prepare($sql_child);
    $stmt_child->execute($param);
    $children = $stmt_child->fetchAll(PDO::FETCH_ASSOC);

    if ($return) {
        return $children;
    } else {
        echo json_encode($children, JSON_UNESCAPED_UNICODE);
    }
}
