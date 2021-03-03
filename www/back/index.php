<?php
define("LOGINEXPIRE", 8);
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    require_once "../../config/conn.php";
    $sql_user = "UPDATE admin_user SET lastlogin = CURRENT_TIMESTAMP WHERE login=:login AND password=:pwd and status > 0 ";
    $sql_check = "SELECT id, name, group_id, district_id FROM admin_user WHERE login=:login AND password=:pwd and status > 0 ";
    $sql_auth = "SELECT menu_id,district_id FROM admin_user_auth WHERE user_id = ? ;";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_check = $conn->prepare($sql_check);
    $stmt_auth = $conn->prepare($sql_auth);
    $stmt_user->execute(['login' => $_POST['username'], 'pwd' => strtoupper(sha1($_POST['password']))]);
    $stmt_check->execute(['login' => $_POST['username'], 'pwd' => strtoupper(sha1($_POST['password']))]);

    if ($result = $stmt_check->fetch(PDO::FETCH_ASSOC)) {
        $stmt_auth->execute([$result['id']]);
        $auth = [];
        foreach ($stmt_auth->fetchAll(PDO::FETCH_ASSOC) as $f) {
            if (empty($auth[$f['menu_id']])) {
                $auth[$f['menu_id']] = [];
            }
            array_push($auth[$f['menu_id']], $f['district_id']);
        }

        $key = str_replace('.', '', uniqid('ct21admin_', true));

        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        while ($redis->get($key)) {
            $key = str_replace('.', '', uniqid('ct21admin_', true));
        }

        $redis->hMSet($key,
            [
                'login' => time() + 3600 * LOGINEXPIRE,
                'user_id' => $result['id'],
                'username' => $result['name'],
                'usergroup' => $result['group_id'],
                'userauth' => json_encode($auth),
            ]
        );
        setcookie('ct21adminlogin', $key, time() + 3600 * 24 * 7);
        header("Location: home");
        die;
    } else {
        echo '<script type="text/javascript">alert("用户名或密码错误");</script>';
    }

}

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
if (!empty($_COOKIE['ct21adminlogin'])) {
    if ($redis->hGet($_COOKIE['ct21adminlogin'], 'login') &&
        $redis->hGet($_COOKIE['ct21adminlogin'], 'user_id') &&
        time() <= $redis->hGet($_COOKIE['ct21adminlogin'], 'login')) {
        header("Location: home.php");
        die;
    } else {
        $redis->del($_COOKIE['ct21adminlogin']);
        unset($_COOKIE['ct21adminlogin']);
        setcookie('ct21adminlogin', null, -1, '/');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GBK">
	<title>Globe Course 管理页面</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./css/style.css" rel="stylesheet" type="text/css">

	<style class="vjs-styles-defaults">
		.btn-login {
			background: #ff6600;
			padding: .8em 1.8em;
			outline: none;
			border: none;
			font-size: 1em;
			cursor: pointer;
			color: #fff;
			text-transform: uppercase;
			font-weight: bold;
			border-radius: .4em;
		}

		.form-text {
			background: #dee1e8;
			padding-top: 12px;
			border-radius: 6px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h1>用户登录</h1>
	<div class="avtar">
		<img src="./images/avtar.png">
	</div>
	<div class="login-form">
		<form method="POST" action ="#">
			<div class="form-text">
				<input type="text" class="text" placeholder="用户名" name="username">
				<input type="password" placeholder="密码" name="password">
			</div>
			<div>
				<button class="btn-login">登录</button>
			</div>
		</form>
	</div>
</body>
</html>
