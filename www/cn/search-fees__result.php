<?php

session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';

@$state = $_REQUEST['state'];
@$level = $_REQUEST['schoolType'];

@$courseName = $_REQUEST['courseName'];
@$broadField = $_REQUEST['broadField'];
@$narrowField = $_REQUEST['narrowField'];

@$feesRange = $_REQUEST['feesRange'];
@$feesFrom = $_REQUEST['feesFrom'];
@$feesTo = $_REQUEST['feesTo'];

$where = '';
if ($state) {
    $where .= "AND i.state_id = $state ";
}

if ($level) {
    $where .= "AND c.level_id = $level ";
}
if ($broadField) {
    $where .= "AND c.field_id_p = $broadField ";
}

if ($narrowField) {
    $where .= "AND c.field_id_c = $narrowField ";
}

if ($searchMode_fees == 0 && $feesRange) {
    $from = 0;
    $to = 9999;
    switch ($feesRange) {
        case 1:
            break;
        case 2:
            $from = 10000;
            $to = 19999;
            break;
        case 3:
            $from = 20000;
            $to = 39999;
            break;
        case 4:
            $from = 40000;
            $to = 59999;
            break;
        case 5:
            $from = 60000;
            $to = 79999;
            break;
        case 6:
            $from = 80000;
            $to = 'max';
            break;
        default:break;
    }
    $where .= "AND c.fees BETWEEN $from AND $to ";
}

if ($searchMode_fees) {
    $where .= "AND c.fees BETWEEN $feesFrom AND $feesTo ";
}

$sql = "SELECT c.id,
                c.name,
                l.name AS `level`,
                i.name AS `inst`,
                c.inst_id,
                s.name AS `state`,
                c.hours,
                c.fees
        FROM course c
        LEFT JOIN `level` l ON l.id = c.level_id
        LEFT JOIN `institution` i ON i.id = c.inst_id
        LEFT JOIN `state` s ON s.id = i.state_id
        WHERE 1 = 1
        $where
        ORDER BY id ";
$dopage->GetPage($sql, 10);

?>

<link href="./../css/common.css" type="text/css" rel="stylesheet" />
<link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="custom-css/table.css">


<div class="ctm-table__container">
  <h2><small>为您找到</small>"<?php echo $dopage->GetResult_num(); ?>"<small>个相关结果</small></h2>
  <ul class="ctm__responsive-table">
    <li class="ctm-table__header">
      <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1">课程名称</div>
      <div class="ctm-table__col ctm-table__6col-2">课程类别</div>
      <div class="ctm-table__col ctm-table__6col-3">所属学府</div>
      <div class="ctm-table__col ctm-table__6col-4">所在州</div>
      <div class="ctm-table__col ctm-table__6col-5">课时（周）</div>
      <div class="ctm-table__col ctm-table__6col-6">费用</div>
    </li>

    <?php
while ($row = $dosql->GetArray()) {
    if ($row['fees'] == 0) {
        $fees_format = '抱歉，暂时无法显示';
    } else {
        $fees_format = '$' . number_format($row['fees'], 0, '', ',');
    }
    $link = 'course-info.php?cid=' . $row['inst_id'] . '&id=' . $row['id'];
    ?>
        <li class="ctm-table__row" onclick="parent.location.href='<?php echo $link; ?>';">
          <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1" data-label=""><?php echo ($row['name']); ?></div>
          <div class="ctm-table__col ctm-table__6col-2 ctm-table__embed-courseType" data-label=""><?php echo $row['level']; ?></div>
          <div class="ctm-table__col ctm-table__6col-3 ctm-table__embed-School" data-label=""><?php echo ($row['inst']); ?></div>
          <div class="ctm-table__col ctm-table__6col-4 ctm-table__embed-State" data-label=""><?php echo ($row['state']); ?></div>
          <div class="ctm-table__col ctm-table__6col-5 ctm-table__embed-Duration" data-label=""><?php echo ($row['hours']); ?></div>
          <div class="ctm-table__col ctm-table__6col-6 ctm-table__embed-Fes" data-label=""><?php echo $fees_format; ?></div>
        </li>
    <?php
}
?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>