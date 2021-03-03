<?php
require "checksession.php";
require_once '../../../config/conn.php';

$sql = "SELECT `name`,
            concat('fa fa-', `icon`) AS `icon`,
            REPLACE(`url`,'.php','') AS `link`
            FROM `admin_menu`
            WHERE `id` IN (SELECT `menu_id` FROM `admin_user_auth` WHERE `user_id` = ?) ORDER BY `orderint`;";

$stmt = $conn->prepare($sql);
$stmt->execute([$logininfo['user_id']]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$result = array(array("title" => "GlobeCourse",
    "icon" => "fa fa-reorder",
    "items" => $stmt->fetchAll()));
echo "var arrMenu=" . json_encode($result, JSON_UNESCAPED_UNICODE) . ";";
