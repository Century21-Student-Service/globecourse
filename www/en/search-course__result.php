<?php
session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';

define('EMPTY_UNAVAILABLE', 'Unavailable');

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

if (is_numeric($feesFrom) && is_numeric($feesTo)) {
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
                IF(c.name_en IS NULL OR c.name_en = '', c.`name`, c.name_en) AS `name`,
                l.name_en AS `level`,
                i.name_en AS `inst`,
                c.inst_id,
                s.name_en AS `state`,
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
  <h2><small>Found </small> <?php echo $dopage->GetResult_num(); ?> <small> results</small></h2>
  <ul class="ctm__responsive-table">
    <li class="ctm-table__header">
      <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1">Course Name</div>
      <div class="ctm-table__col ctm-table__6col-2">Education</div>
      <div class="ctm-table__col ctm-table__6col-3">Institution</div>
      <div class="ctm-table__col ctm-table__6col-4">State</div>
      <div class="ctm-table__col ctm-table__6col-5">Duration(Months)</div>
      <div class="ctm-table__col ctm-table__6col-6">Fees(yearly)</div>
    </li>

    <?php
while ($row = $dosql->GetArray()) {

    if ($row['fees'] == 0) {
        $fees_format = EMPTY_UNAVAILABLE;
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
    $months = $row['months'] ? $row['months'] . " months" : EMPTY_UNAVAILABLE;
    ?>
        <li class="ctm-table__row" onclick="parent.location.href='<?php echo $link; ?>';">
          <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1" data-label=""><?php echo ($row['name']); ?></div>
          <div class="ctm-table__col ctm-table__6col-2 ctm-table__embed-courseType" data-label=""><?php echo $row['level']; ?></div>
          <div class="ctm-table__col ctm-table__6col-3 ctm-table__embed-School" data-label=""><?php echo ($row['inst']); ?></div>
          <div class="ctm-table__col ctm-table__6col-4 ctm-table__embed-State" data-label=""><?php echo ($row['state']); ?></div>
          <div class="ctm-table__col ctm-table__6col-5 ctm-table__embed-Duration" data-label=""><?php echo ($months); ?></div>
          <div class="ctm-table__col ctm-table__6col-6 ctm-table__embed-Fes" data-label=""><?php echo $fees_format; ?></div>
        </li>
    <?php
}
?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>