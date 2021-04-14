<?php

session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
require_once dirname(__FILE__) . './../../config/conn.php';

@$state = isset($_POST['state']) ? $_POST['state'] : $_SESSION['state'];
@$level = isset($_POST['schoolType']) ? $_POST['schoolType'] : $_SESSION['level'];

$_SESSION['state'] = $state;
$_SESSION['level'] = $level;

$where = " WHERE 1 = 1 ";
if ($state) {
    $where .= " AND s.id = $state ";
}
if ($level) {
    $sql = "SELECT DISTINCT inst_id FROM course WHERE level_id = $level";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $where .= " AND i.id IN(" . implode(",", $rows) . ") ";
}
$sql = "SELECT i.id, i.name_en AS `name`, i.badge, s.name_en AS `state`
        FROM `institution` i
        LEFT JOIN `state` s ON s.id = i.state_id
        $where
        ORDER BY i.id DESC";

$dopage->GetPage($sql, 10);
?>

<link href="./../css/common.css" type="text/css" rel="stylesheet" />
<!-- <link href="./../ext/news.css" type="text/css" rel="stylesheet" /> -->

<!-- <script src="./../templates/default/js/jquery.min.js"></script> -->

<!-- (Theme) kingster -->
<!-- <link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' /> -->
<link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
<!-- <link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' /> -->
<link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />

<!-- (Theme) custom -->
<link rel="stylesheet" type="text/css" href="custom-css/table.css">
<style>
  .img-badge {
    width: 40px;
  }

  .col-badge {
    padding-left: 15px;
  }
</style>

<!-- ============================================================================================== -->
<!-- ______________________________        Table [responsive]        ______________________________ -->
<!-- ============================================================================================== -->
<div class="ctm-table__container">
<h2><small>Found </small> <?php echo $dopage->GetResult_num(); ?> <small> results</small></h2>
  <ul class="ctm__responsive-table">
    <li class="ctm-table__header">
      <div class="ctm-table__col col-badge">Badge</div>
      <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1">Institution</div>
      <div class="ctm-table__col ctm-table__2col-3">State</div>
    </li>

    <?php
while ($row = $dosql->GetArray()) {
    $page = "school-info.php?id=" . $row['id'];
    ?>
    <li class="ctm-table__row" onclick="parent.location.href='<?php echo ($page); ?>';">
      <div class="ctm-table__col col-badge"><img src="<?php echo '/' . $row['badge']; ?>" class="img-badge" /></div>
      <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1"><?php echo ($row['name']); ?></div>
      <div class="ctm-table__col ctm-table__2col-3 ctm-table__embed-State"><?php echo $row['state']; ?></div>
    </li>

    <?php
}
?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
</div>

<div class="ctm-table__pageBtn"><?php echo $dopage->GetList(); ?></div>