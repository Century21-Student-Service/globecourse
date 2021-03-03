<?php
session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
require '../../config/conn.php';

$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : $_SESSION['state'];
$regional = isset($_REQUEST['regional']) ? $_REQUEST['regional'] : $_SESSION['regional'];
$level = isset($_REQUEST['schoolType']) ? $_REQUEST['schoolType'] : $_SESSION['level'];
$keyword = isset($_REQUEST['courseName']) ? $_REQUEST['courseName'] : $_SESSION['keyword'];
$field_p = isset($_REQUEST['broadField']) ? $_REQUEST['broadField'] : $_SESSION['field_p'];
$field_c = isset($_REQUEST['narrowField']) ? $_REQUEST['narrowField'] : $_SESSION['field_c'];

$_SESSION['state'] = $state;
$_SESSION['regional'] = $regional;
$_SESSION['level'] = $level;
$_SESSION['keyword'] = $keyword;
$_SESSION['field_p'] = $field_p;
$_SESSION['field_c'] = $field_c;

$where = "";

$sql = "SELECT id FROM institution WHERE regional=$regional";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_COLUMN);
if (count($rows)) {
    $where .= "AND inst_id IN(" . implode(",", $rows) . ") ";
}

if ($state) {
    $sql = "SELECT id FROM institution WHERE state_id=$state";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (count($rows)) {
        $where .= "AND inst_id IN(" . implode(",", $rows) . ") ";
    }

}

if ($level) {
    $where .= "AND level_id = $level ";
}

if ($keyword) {
    $where .= "AND c.name like '%$keyword%' ";
} else {
    if ($field_p) {
        $where .= "AND field_id_p = $field_p ";
    }
    if ($field_c) {
        $where .= "AND field_id_c = $field_c ";
    }
}

$sql = "SELECT c.id,c.name,c.hours,c.inst_id,i.name AS inst ,l.name AS `level`,s.name AS `state`
      FROM course c
      LEFT JOIN institution i ON i.id = c.inst_id
      LEFT JOIN `level` l ON l.id = c.level_id
      LEFT JOIN `state` s ON s.id = i.state_id
      WHERE 1 = 1
      $where
      ";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$dopage->GetPage($sql, 10);

?>

<link href="./../css/common.css" type="text/css" rel="stylesheet" />
<link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="custom-css/table.css">


<!-- ============================================================================================== -->
<!-- ______________________________        Table [responsive]        ______________________________ -->
<!-- ============================================================================================== -->
<div class="ctm-table__container">
  <h2><small>为您找到相关结果</small>"<?php echo count($rows); // echo $dopage->GetResult_num(); ;;;;;;;;                     ?>"<small>个</small></h2>
  <ul class="ctm__responsive-table">
    <li class="ctm-table__header">
      <div class="ctm-table__col ctm-table__5col-1 ctm-table__col-1">课程名称</div>
      <div class="ctm-table__col ctm-table__5col-2">所属学府</div>
      <div class="ctm-table__col ctm-table__5col-3">课程类别</div>
      <div class="ctm-table__col ctm-table__5col-4">所属州份</div>
      <div class="ctm-table__col ctm-table__5col-5">课时（周）</div>
    </li>

    <?php
while ($row = $dosql->GetArray()) {; // foreach ($rows as $row) {
    ?>
        <!-- <li class="ctm-table__row" onclick="parent.location.href='/iframe_parent/<?php //echo($zypage);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?>?cid=<?php //echo($row['cbh']);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?>&id=<?php //echo($row['id']);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?>';"> -->
        <li class="ctm-table__row" onclick="parent.location.href='course-info.php?cid=<?php echo ($row['inst_id']); ?>&id=<?php echo ($row['id']); ?>';">
          <div class="ctm-table__col ctm-table__5col-1 ctm-table__col-1" data-label=""><?php echo ($row['name']); ?></div>
          <div class="ctm-table__col ctm-table__5col-2 ctm-table__embed-School" data-label=""><?php echo ($row['inst']); ?></div>
          <div class="ctm-table__col ctm-table__5col-3 ctm-table__embed-courseType" data-label=""><?php echo ($row['level']); ?></div>
          <div class="ctm-table__col ctm-table__5col-4 ctm-table__embed-State" data-label=""><?php echo ($row['state']); ?></div>
          <div class="ctm-table__col ctm-table__5col-5 ctm-table__embed-Duration" data-label=""><?php echo ($row['hours']); ?></div>
        </li>
    <?php
}
?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>