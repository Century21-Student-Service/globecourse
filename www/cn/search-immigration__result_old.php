<?php
session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';

@$state = $_REQUEST['state'];
@$courseType = $_REQUEST['schoolType'];
@$courseName = $_REQUEST['courseName'];
@$broadField = $_REQUEST['broadField'];
@$narrowField = $_REQUEST['narrowField'];

/** ====  [State]  ==== **/
if (!empty($state)) {
    $_SESSION['states'] = $state;
    $statestr = $_SESSION['states'];
} else {
    if ($state == '0') {
        $_SESSION['states'] = 0;
        $statestr = 0;
    } else if (empty($_SESSION['states'])) {
        $statestr = 0;
    } else {
        $statestr = $_SESSION['states'];
    }
}
/** ====  [Course-Type]  ==== **/
if (!empty($courseType)) {
    $_SESSION['cType'] = $courseType;
    $ct = $_SESSION['cType'];
} else {
    if ($courseType == '0') {
        $_SESSION['cType'] = 0;
        $ct = 0;
    } else if (empty($_SESSION['cType'])) {
        $ct = 0;
    } else {
        $ct = $_SESSION['cType'];
    }
}

/** ====  [Course-Name]  ==== **/
if (!empty($courseName)) {
    $_SESSION['cN'] = $courseName;
    $cn = $_SESSION['cN'];
} else {
    if ($courseName == '') { //  textfield empty
        $_SESSION['cN'] = 0;
        $cn = 0;
    } else if (empty($_SESSION['cN'])) {
        $cn = '';
    } else {
        $cn = $_SESSION['cN'];
    }
}

/** ====  [Faculty]  ==== **/
if (!empty($broadField)) {

    $_SESSION['bField'] = $broadField;
    $bf = $_SESSION['bField'];
} else {
    if ($broadField == '0') {
        $_SESSION['bField'] = 0;
        $bf = 0;
    } else if (empty($_SESSION['bField'])) {
        $bf = 0;
    } else {
        $bf = $_SESSION['bField'];
    }
}
/** ====  [Specific-course]  ==== **/
if (!empty($narrowField)) {

    $_SESSION['nField'] = $narrowField;
    $nf = $_SESSION['nField'];
} else {
    if ($narrowField == '0') {
        $_SESSION['nField'] = 0;
        $nf = 0;
    } else if (empty($_SESSION['nField'])) {
        $nf = 0;
    } else {
        $nf = $_SESSION['nField'];
    }
}

/** ==================================================================================== **/
/** ______________________________        get List        ______________________________ **/
/** ==================================================================================== **/
if ($statestr == 0) {
    $stateW = "";
} else {
    $stateW = " state='" . $statestr . "' AND ";
}
if ($ct == 0) {
    $TypeW = "";
} else {
    $TypeW = " type='" . $ct . "' AND ";
}

if ($nf == 0 && $bf == 0) {
    $fieldW = "";
    $bfW = "";
} else if ($nf == 0 && $bf != 0) {

    $fieldW = " kcfw LIKE '" . $bf . "%' AND ";
    $bfW = "";
} else {
    $fieldW = "kcfw= " . $nf . " AND ";
    $bfW = "";
}

if ($cn == '') {
    $cnW = "";
} else {
    $cnW = " title LIKE '%" . $cn . "%' AND ";
}

$sql = "SELECT * FROM `#@__infolist` WHERE classid=2 AND immigration=1 AND " . $stateW . " " . $TypeW . " " . $fieldW . " " . $bfW . " " . $cnW . " checkinfo='true' AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
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


<!-- ============================================================================================== -->
<!-- ______________________________        Table [responsive]        ______________________________ -->
<!-- ============================================================================================== -->
<div class="ctm-table__container">
  <h2><small>为您找到相关结果</small>"<?php echo $dopage->GetResult_num(); ?>"<small>个</small></h2>
  <ul class="ctm__responsive-table">
    <li class="ctm-table__header">
      <div class="ctm-table__col ctm-table__5col-1 ctm-table__col-1">课程名称</div>
      <div class="ctm-table__col ctm-table__5col-2">所属学府</div>
      <div class="ctm-table__col ctm-table__5col-3">课程类别</div>
      <div class="ctm-table__col ctm-table__5col-4">所属州份</div>
      <div class="ctm-table__col ctm-table__5col-5">课时（周）</div>
    </li>

    <?php
while ($row = $dosql->GetArray()) {
    if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
        $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
    } else if ($cfg_isreurl == 'Y') {
        $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
    } else {
        $gourl = $row['linkurl'];
    }

    $row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=" . $row['classid']);
    if ($cfg_isreurl != 'Y') {
        $gourl2 = 'news.php?cid=' . $row['classid'];
    } else {
        $gourl2 = 'news-' . $row['classid'] . '-1.html';
    }

    if ($row['type'] > 3) {;
        $page = "./../schoolShow.php";
        $zypage = "./../schoolShow_zysh.php";

    } else {
        $page = "./../schoolShow2.php";
        $zypage = "./../schoolShow_zysh.php";
    }

    ?>
        <!-- <li class="ctm-table__row" onclick="parent.location.href='/iframe_parent/<?php //echo($zypage);;;;;?>?cid=<?php //echo($row['cbh']);;;;;?>&id=<?php //echo($row['id']);;;;;?>';"> -->
        <li class="ctm-table__row" onclick="parent.location.href='course-info.php?cid=<?php echo ($row['cbh']); ?>&id=<?php echo ($row['id']); ?>';">
          <div class="ctm-table__col ctm-table__5col-1 ctm-table__col-1" data-label=""><?php echo ($row['title']); ?></div>
          <div class="ctm-table__col ctm-table__5col-2 ctm-table__embed-School" data-label=""><?php echo ($row['daxue']); ?></div>
          <div class="ctm-table__col ctm-table__5col-3 ctm-table__embed-courseType" data-label=""><?php echo (getCType($row['type'])); ?></div>
          <div class="ctm-table__col ctm-table__5col-4 ctm-table__embed-State" data-label=""><?php echo (getState($row['state'])); ?></div>
          <div class="ctm-table__col ctm-table__5col-5 ctm-table__embed-Duration" data-label=""><?php echo ($row['ks']); ?></div>
        </li>

    <?php
}
?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ;;;;?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>