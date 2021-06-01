<?php
session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';

@$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : $_SESSION['state'];
@$level = isset($_REQUEST['schoolType']) ? $_REQUEST['schoolType'] : $_SESSION['schoolType'];

@$courseName = isset($_REQUEST['courseName']) ? $_REQUEST['courseName'] : $_SESSION['courseName'];
@$broadField = isset($_REQUEST['broadField']) ? $_REQUEST['broadField'] : $_SESSION['broadField'];
@$narrowField = isset($_REQUEST['narrowField']) ? $_REQUEST['narrowField'] : $_SESSION['narrowField'];

@$feesRange = isset($_REQUEST['feesRange']) ? $_REQUEST['feesRange'] : $_SESSION['feesRange'];
@$feesFrom = isset($_REQUEST['feesFrom']) ? $_REQUEST['feesFrom'] : $_SESSION['feesFrom'];
@$feesTo = isset($_REQUEST['feesTo']) ? $_REQUEST['feesTo'] : $_SESSION['feesTo'];
@$searchMode_fees = isset($_REQUEST['searchMode_fees']) ? $_REQUEST['searchMode_fees'] : $_SESSION['searchMode_fees'];

$_SESSION['state'] = $state;
$_SESSION['level'] = $level;
$_SESSION['courseName'] = $courseName;
$_SESSION['broadField'] = $broadField;
$_SESSION['narrowField'] = $narrowField;
$_SESSION['feesRange'] = $feesRange;
$_SESSION['feesFrom'] = $feesFrom;
$_SESSION['feesTo'] = $feesTo;
$_SESSION['searchMode_fees'] = $searchMode_fees;

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
    $to = 'max';
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
    if (!empty($_COOKIE['gc_currency']) && $_COOKIE['gc_currency'] != 'AUD') {
        $currency_code = str_replace('"', '', $_COOKIE['gc_currency']);
        $c_base = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE id = 1;");
        $c_base = $c_base['rate'];
        $c_target = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE code = '$currency_code' ;");
        $from = $from * $c_base / $c_target['rate'];
        $to = $to === "max" ? "max" : $to * $c_base / $c_target['rate'];
    }
    $where .= "AND c.fees BETWEEN $from AND $to ";
}

if ($searchMode_fees) {
    if (!empty($_COOKIE['gc_currency']) && $_COOKIE['gc_currency'] != 'AUD') {
        $currency_code = str_replace('"', '', $_COOKIE['gc_currency']);
        $c_base = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE id = 1;");
        $c_base = $c_base['rate'];
        $c_target = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE code = '$currency_code' ;");
        $feesFrom = $feesFrom * $c_base / $c_target['rate'];
        $feesTo = $feesTo * $c_base / $c_target['rate'];
    }
    $where .= "AND c.fees BETWEEN $feesFrom AND $feesTo ";

}

if ($courseName) {
    $where .= "AND (c.name like '%$courseName%' OR c.name_en like '%$courseName%') ";
}

$sql = "SELECT c.id,
                c.name,
                l.name AS `level`,
                i.name AS `inst`,
                c.inst_id,
                s.name AS `state`,
                c.hours,
                c.months,
                c.fees
        FROM course c
        LEFT JOIN `level` l ON l.id = c.level_id
        LEFT JOIN `institution` i ON i.id = c.inst_id
        LEFT JOIN `state` s ON s.id = i.state_id
        WHERE c.status > 0
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
      <div class="ctm-table__col ctm-table__6col-5">课时（月）</div>
      <div class="ctm-table__col ctm-table__6col-6">费用</div>
    </li>

    <?php
while ($row = $dosql->GetArray()) {

    if ($row['fees'] == 0) {
        $fees_format = '无法显示';
    } else {
        $fees = $row['fees'];
        if (empty($_COOKIE['gc_currency'])) {
            $currency_code = 'AUD';
        } else {
            $currency_code = str_replace('"', "", $_COOKIE['gc_currency']);
        }
        $c_base = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE id = 1;");
        $c_base = $c_base['rate'];
        $c_target = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE code = '$currency_code' ;");
        $fees = $fees * $c_target['rate'] / $c_base;
        $fees = round($fees, -3);
        $fees_bf_3 = substr($fees, 0, -3);
        $fees_last_3 = substr($fees, -3);
        $fees_format = $c_target['code'] . ' ' . $c_target['symbol'] . $fees_bf_3 . ',' . $fees_last_3;
    }
    $link = 'course-info.php?cid=' . $row['inst_id'] . '&id=' . $row['id'];
    $months = $row['months'] ? $row['months'] . "个月" : "无";
    ?>
        <li class="ctm-table__row" onclick="parent.location.href='<?php echo $link; ?>';">
          <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1" ><?php echo ($row['name']); ?></div>
          <div class="ctm-table__col ctm-table__6col-2 ctm-table__embed-courseType" ><?php echo $row['level']; ?></div>
          <div class="ctm-table__col ctm-table__6col-3 ctm-table__embed-School" ><?php echo ($row['inst']); ?></div>
          <div class="ctm-table__col ctm-table__6col-4 ctm-table__embed-State" ><?php echo ($row['state']); ?></div>
          <div class="ctm-table__col ctm-table__6col-5 ctm-table__embed-Duration" ><?php echo ($months); ?></div>
          <div class="ctm-table__col ctm-table__6col-6 ctm-table__embed-Fes" ><?php echo $fees_format; ?></div>
        </li>
    <?php
}
?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>