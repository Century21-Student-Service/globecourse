<?php
define("MENUID", 1);
include "checksession.php";
include_once '../../../config/conn.php';

$funcArr = [
    'getUsers',
    'addUser',
    'switchUser',
    'getUserDetail',
    'getMenuAndDistrict',
    'saveAuth',
    'getAuth',
];

if (!array_key_exists('op', $_REQUEST) || !is_numeric($_REQUEST['op']) || $_REQUEST['op'] < 0 || $_REQUEST['op'] >= count($funcArr)) {
    $op = 0;
} else {
    $op = $_REQUEST['op'];
}

call_user_func($funcArr[$op], $conn);

function getUsers($conn)
{
    $sql = "SELECT
			u.id as id,
			u.name as `name`,
            u.login,
            DATE_FORMAT(lastlogin, '%Y-%m-%d %H:%i:%s') as `lastlogin`,
			u.status as status
			FROM admin_user u
			ORDER BY u.status DESC, u.id ;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // echo json_encode(['code' => 0, 'rows' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function addUser($conn)
{
    $name = $_POST['name'];
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    // $district = $_POST['district'];

    $sql_check = "SELECT id FROM admin_user WHERE login=?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute([$login]);
    if ($stmt_check->fetch()) {
        echo json_encode(['code' => -201, 'msg' => '登陆名已存在']);
        die;
    }
    $sql = "INSERT INTO admin_user (login, password, name ) values(?,?,?)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([$login, strtoupper(sha1($pwd)), $name]);
        echo json_encode(['code' => 0, 'msg' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['code' => -102, 'msg' => $e->getMessage()]);
    }
}

function switchUser($conn)
{
    $sql = "UPDATE admin_user SET status = -1 * status WHERE id=?;";
    $sql_check = "SELECT status FROM admin_user WHERE id=?;";
    $stmt = $conn->prepare($sql);
    $stmt_check = $conn->prepare($sql_check);
    try {
        $stmt->execute([$_POST['userId']]);
        $stmt_check->execute([$_POST['userId']]);
        $result = $stmt_check->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['code' => 0, 'msg' => $result]);
    } catch (Exception $e) {
        echo json_encode(['code' => -102, 'msg' => $e->getMessage()]);
    }
}

function getUserDetail($conn)
{
    $userId = $_POST['userId'];
    $sql = "SELECT * FROM admin_user WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getMenuAndDistrict($conn)
{
    $sql_menu = "SELECT id, name FROM admin_menu WHERE general = 0 ORDER BY orderint";
    $stmt_menu = $conn->prepare($sql_menu);
    $stmt_menu->execute();
    $menu = $stmt_menu->fetchAll(PDO::FETCH_ASSOC);

    $sql_menu_general = "SELECT id, name FROM admin_menu WHERE general = 1 ORDER BY orderint";
    $stmt_menu_general = $conn->prepare($sql_menu_general);
    $stmt_menu_general->execute();
    $menu_greneral = $stmt_menu_general->fetchAll(PDO::FETCH_ASSOC);

    $sql_district = "SELECT id, name FROM site_district ORDER BY id";
    $stmt_district = $conn->prepare($sql_district);
    $stmt_district->execute();
    $district = $stmt_district->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['code' => 0, 'menu' => $menu, 'menuGeneral' => $menu_greneral, 'district' => $district]);
}

function saveAuth($conn)
{
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    if (!$data) {
        echo json_encode(['code' => -301, 'msg' => '无法解析JSON']);
        die;
    }
    $reg = "/^m_(\d+)_(\d+)$/";
    $sql_clean = "DELETE FROM admin_user_auth WHERE `user_id` = ? ;";
    $stmt_clean = $conn->prepare($sql_clean);
    $sql_insert = "INSERT INTO admin_user_auth (`user_id`,menu_id,district_id) VALUES (?,?,?) ;";
    $stmt_insert = $conn->prepare($sql_insert);
    $conn->beginTransaction();
    try {
        $stmt_clean->execute([$data['userid']]);
        foreach ($data['auth'] as $auth) {
            preg_match($reg, $auth, $matches);
            if (!$matches) {
                $conn->rollback();
                echo json_encode(['code' => -302, 'msg' => '格式错误 - ' . $auth]);
                die;
            }
            $stmt_insert->execute([$data['userid'], $matches[1], $matches[2]]);
        }
        $conn->commit();
        echo json_encode(['code' => 0, 'msg' => '成功']);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['code' => -102, 'msg' => '插入失败 - ' . $e]);
    }
}

function getAuth($conn)
{
    $sql_auth = "SELECT menu_id,district_id FROM admin_user_auth WHERE user_id = ? ;";
    $stmt_auth = $conn->prepare($sql_auth);
    $stmt_auth->execute([$_REQUEST['userid']]);
    $auth = [];
    foreach ($stmt_auth->fetchAll(PDO::FETCH_ASSOC) as $f) {
        if (empty($auth[$f['menu_id']])) {
            $auth[$f['menu_id']] = [];
        }
        array_push($auth[$f['menu_id']], $f['district_id']);
    }
    echo json_encode(['code' => 0, 'auth' => $auth]);
}
