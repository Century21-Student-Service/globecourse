<?php
session_start();
// require_once dirname(__FILE__) . './../config/conn.php;';
require_once '../../../config/conn.php';

$inst_id = $_REQUEST['iid'];
$en = empty($_REQUEST['en']);

$sql_course = "SELECT `id`,IF(name_en IS NULL or name_en = '', `name`, name_en) AS `name`,`level_id`,`field_id_p`,`field_id_c`,`hours`,`months`,`fees` FROM course WHERE inst_id=? AND `status` > 0 ORDER BY id;";
$sql_levels = "SELECT `id`,IFNULL(name_en,`name`) AS `name` FROM `level` WHERE id IN (SELECT level_id FROM course WHERE inst_id=?) ORDER BY id;";
$sql_fields_c = "SELECT `id`,IFNULL(name_en,`name`) AS `name`, `p_id` FROM field WHERE id IN(SELECT field_id_c FROM course WHERE inst_id=?) ORDER BY id;";
$sql_fields_p = "SELECT `id`,IFNULL(name_en,`name`) AS `name` FROM field WHERE deep = 0 AND id IN(SELECT field_id_p FROM course WHERE inst_id=?) ORDER BY id;";

$stmt_course = $conn->prepare($sql_course);
$stmt_levels = $conn->prepare($sql_levels);
$stmt_fields_c = $conn->prepare($sql_fields_c);
$stmt_fields_p = $conn->prepare($sql_fields_p);

$stmt_course->execute([$inst_id]);
$stmt_levels->execute([$inst_id]);
$stmt_fields_c->execute([$inst_id]);
$stmt_fields_p->execute([$inst_id]);
$fields_c = $stmt_fields_c->fetchAll(PDO::FETCH_ASSOC);
$result = [
    'course' => $stmt_course->fetchAll(PDO::FETCH_ASSOC),
    'levels' => $stmt_levels->fetchAll(PDO::FETCH_ASSOC),
    'fields' => $stmt_fields_p->fetchAll(PDO::FETCH_ASSOC),
];
foreach ($result['fields'] as &$field_p) {
    $field_p['children'] = [];
    foreach ($fields_c as $f_c) {
        if ($f_c['p_id'] == $field_p['id']) {
            array_push($field_p['children'], $f_c);
        }
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
