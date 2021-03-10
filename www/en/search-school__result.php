<?php session_start();
  require_once(dirname(__FILE__).'./../include/config.inc.php'); 
  include_once('./../ext/news.php');

  // @$state=$_POST['state'];
  // @$courseType=$_POST['schoolType'];


  // if(!empty($state)){
  //   $_SESSION['states']=$state;
  //   $statestr=$_SESSION['states'];
  // }else{
  //   if(empty($_SESSION['states'])){
  //     $statestr=0;
  //   }else{
  //     $statestr=$_SESSION['states'];
  //   }
  // }

  // if(!empty($courseType)){
  //   $_SESSION['schoolType']=$courseType;
  //   $cstr=$_SESSION['schoolType'];
  // }else{
  //   if(empty($_SESSION['schoolType'])){
  //     $cstr=0;
  //   }else{
  //     $cstr=$_SESSION['schoolType'];
  //   }
  // }

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


<?php
  @$state=$_POST['state'];
  @$courseType=$_POST['schoolType'];
  @$schoolName=$_REQUEST['schoolName'];

  if(!empty($state)){
    $_SESSION['states']=$state;
    $statestr=$_SESSION['states'];
  }else{
    if ($state == '0'){
        $_SESSION['states'] = 0;
        $statestr=0;
      }
      else if(empty($_SESSION['states'])){
      $statestr=0;
    }else{
      $statestr=$_SESSION['states'];
    }
  }

  if(!empty($courseType)){
    $_SESSION['schoolType']=$courseType;
      $cstr=$_SESSION['schoolType'];
  }else{
    if ($courseType == '0'){
        $_SESSION['schoolType'] = 0;
        $cstr=0;
      }
      else if(empty($_SESSION['schoolType'])){
      $cstr=0;
    }else{
      $cstr=$_SESSION['schoolType'];
    }
  }

  if( !empty($schoolName) ){
    $_SESSION['schoolName'] = $schoolName;
    $sName = $_SESSION['schoolName'];
  }
  else {
    if ($schoolName == '0'){ //  dropdown set to 0
        $_SESSION['schoolName'] = 0;
        $sName = 0;
      }
      else if( empty($_SESSION['schoolName']) ){
        $sName = '';
      }else{
        $sName = $_SESSION['schoolName'];
      }
  }

  /** ==================================================================================== **/
  /** ______________________________        get List        ______________________________ **/
  /** ==================================================================================== **/
  if($statestr==0){
    $stateW="";
  }else{
    $stateW=" state='".$statestr."' AND ";
  }
  if($cstr==0){
      $TypeW="";
  }else{
      $TypeW="  FIND_IN_SET($cstr,schoolType2) AND ";
  }

  if($sName == ''){
    $sNameW = "";
  }
  else {
    $sNameW = " title LIKE '%".$sName."%' AND ";
  }

  $dopage->GetPage("SELECT * FROM `#@__infoimg` WHERE classid=3 AND ".$stateW." ".$TypeW." ".$sNameW." checkinfo='true' AND delstate='' AND checkinfo=true ORDER BY orderid DESC",10);
?>

<!-- ============================================================================================== -->
<!-- ______________________________        Table [responsive]        ______________________________ -->
<!-- ============================================================================================== -->
<div class="ctm-table__container">
  <h2><small>Found </small>"<?php echo $dopage->GetResult_num(); ?>"<small> results</small></h2>
  <ul class="ctm__responsive-table">
    <li class="ctm-table__header">
      <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1">Institution</div>
      <div class="ctm-table__col ctm-table__2col-2">State</div>
    </li>
    
    <?php
      while($row = $dosql->GetArray()){
        if($row['schoolType']>3){;
          // $page="./../schoolShow.php";
          $page="school-info.php";
        }else{
          // $page="./../schoolShow2.php";
          $page="school-info.php";
        }
    ?>
        <!-- <li class="ctm-table__row" onclick="parent.location.href='/iframe_parent/<?php //echo($page);?>?id=<?php //echo($row['id']);?>';"> -->
        <li class="ctm-table__row" onclick="parent.location.href='<?php echo($page);?>?id=<?php echo($row['id']);?>';">
          <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""><?php echo($row['cname']);?></div><!--   <img src="./../<?php //echo($row['picurl']);?>" style="width: auto; height: 15px; border-radius: 4px;" /> -->
          <div class="ctm-table__col ctm-table__2col-2 ctm-table__embed-State" data-label=""><?php echo( getVal_en('stateEn',$row['state']) );?></div>
        </li>

    <?php
        }
    ?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>