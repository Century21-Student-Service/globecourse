<?php session_start();
  require_once(dirname(__FILE__).'./../include/config.inc.php'); 
  include_once('./../ext/news.php');

  @$state=$_REQUEST['state'];
  @$courseType=$_REQUEST['schoolType'];

  @$courseName=$_REQUEST['courseName'];
  @$broadField=$_REQUEST['broadField'];
  @$narrowField=$_REQUEST['narrowField'];

  @$feesRange=$_REQUEST['feesRange'];
  @$feesFrom=$_REQUEST['feesFrom'];
  @$feesTo=$_REQUEST['feesTo'];


  // $_SESSION['states'] = $state;
  // $_SESSION['cType']=$courseType;

  // $_SESSION['f_Range'] = $feesRange;
  // $_SESSION['f_From'] = $feesFrom;
  // $_SESSION['f_To'] = $feesTo;

  // if ($state == '0'){
  //   echo "<script type='text/javascript'>alert('txt-field: filled');</script>";
  //   $_SESSION['states'] = $state;
  //   $statestr=0;
  // }
  // if ($_SESSION['states'] == 0){
  //   echo "<script type='text/javascript'>alert('session-empty');</script>";
  //   $_SESSION['states'] = $state;
  //   $statestr=0;
  // }
  // else {
  //   echo "<script type='text/javascript'>alert('txt field: ".$state."');</script>";
  //   echo "<script type='text/javascript'>alert('session: ".$_SESSION['states']."');</script>";
  //   $statestr=$_SESSION['states'];
  // }

  // echo "<script type='text/javascript'>alert('session');</script>";


  /** ====  [State]  ==== **/
  if(!empty($state)){
    $_SESSION['states']=$state;
    $statestr=$_SESSION['states'];
  }
  else{
    if ($state == '0'){ //  dropdown set to 0
      $_SESSION['states'] = 0;
      $statestr=0;
    }
    else if(empty($_SESSION['states'])){ //  initial, where value is nil
      $statestr=0;
    }else{
      $statestr=$_SESSION['states']; //  selected from dropdown
    }
  }
  /** ====  [Course-Type]  ==== **/
  if(!empty($courseType)){
    $_SESSION['cType']=$courseType;
    $ct=$_SESSION['cType'];
  }
  else{
    if ($courseType == '0'){ //  dropdown set to 0
      $_SESSION['cType'] = 0;
      $ct=0;
    }
    else if(empty($_SESSION['cType'])){ //  initial, where value is nil
      $ct=0;
    }else{
      $ct=$_SESSION['cType']; //  selected from dropdown
    }
  }

  
  /** ====================  << Faculty/Major >>  ==================== **/

  /** ====  [Course-Name]  ==== **/
  if(!empty($courseName)){
    $_SESSION['cN']=$courseName;
    $cn=$_SESSION['cN'];
  }else{
    if ($courseName == ''){ //  textfield empty
      $_SESSION['cN'] = 0;
      $cn=0;
    }
    else if(empty($_SESSION['cN'])){
      $cn='';
    }else{
      $cn=$_SESSION['cN'];
    }
  }

  /** ====  [Faculty]  ==== **/
  if(!empty($broadField)){

    $_SESSION['bField']=$broadField;
    $bf=$_SESSION['bField'];
  }else{
    if ($broadField == '0'){ //  dropdown set to 0
      $_SESSION['bField'] = 0;
      $bf=0;
    }
    else if(empty($_SESSION['bField'])){
      $bf=0;
    }else{
      $bf=$_SESSION['bField'];
    }
  }
  /** ====  [Specific-course]  ==== **/
  if(!empty($narrowField)){

    $_SESSION['nField']=$narrowField;
    $nf=$_SESSION['nField'];
  }else{
    if ($narrowField == '0'){ //  dropdown set to 0
      $_SESSION['nField'] = 0;
      $nf=0;
    }
    else if(empty($_SESSION['nField'])){
      $nf=0;
    }else{
      $nf=$_SESSION['nField'];
    }
  }


  /** ====================  << Fees >>  ==================== **/
  
  /** ====  [Fees-range]  ==== **/
  if(!empty($feesRange)){
    $_SESSION['f_Range'] = $feesRange;
    $f_Range = $_SESSION['f_Range'];
  }
  else{
    if ($feesRange == '0'){ //  dropdown set to 0
      $_SESSION['f_Range'] = 0;
      $f_Range=0;
    }
    else if(empty($_SESSION['f_Range'])){ //  initial, where value is nil
      $f_Range = 0;
    }
    else{
      $f_Range = $_SESSION['f_Range']; //  selected from dropdown
    }
  }
  /** ====  [Fees-From]  ==== **/
  if (!empty($feesFrom)){
    $_SESSION['f_From'] = $feesFrom;
    $f_From = $_SESSION['f_From'];
  }
  else{
    if ($feesFrom == '0'){ //  dropdown set to 0
      $_SESSION['f_From'] = 0;
      $f_From = 0;
    }
    else if(empty($_SESSION['f_From'])){ //  initial, where value is nil
      $f_From = 0;
    }
    else{
      $f_From = $_SESSION['f_From']; //  selected from dropdown
    }
  }
  /** ====  [Fees-To]  ==== **/
  if(!empty($feesTo)){

    $_SESSION['f_To'] = $feesTo;
    $f_To = $_SESSION['f_To'];
  }
  else{
    if ($feesTo == '0'){ //  dropdown set to 0
      $_SESSION['f_To'] = 0;
      $f_To = 0;
    }
    else if(empty($_SESSION['f_To'])){ //  initial, where value is nil
      $f_To = 0;
    }
    else{
      $f_To = $_SESSION['f_To']; //  selected from dropdown
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
  if($ct==0){
     $TypeW="";
  }else{
     $TypeW=" type='".$ct."' AND ";
  }



  /** ====================  << Faculty/Major >>  ==================== **/

  if($nf==0&&$bf==0){
    $fieldW="";
    $bfW="";
    }
  else if ($nf==0&&$bf!=0) {

    $fieldW=" kcfw LIKE '".$bf."%' AND ";
    $bfW="";
  }
  else{
    $fieldW="kcfw= ".$nf." AND ";
    $bfW="";
  }

  if($cn==''){
    $cnW="";
  }else{
    $cnW=" title LIKE '%".$cn."%' AND ";
  }


  /** ====================  << Fees >>  ==================== **/
  //  0
  //  10,000
  //  20,000
  //  30,000
  //  40,000
  //  50,000
  //  60,000
  //  70,000
  //  80,000

  switch ($f_Range) {
    case 0:
      $fRange_sql = "";
      break;
    case 1: //  10,000 below
      $fRange_sql = "fees < 10000 AND ";
      break;
    case 2: //  10,000 - 20,000
      $fRange_sql = "fees > 10000 AND fees < 20000 AND ";
      break;
    case 3: //  20,000 - 40,000
      $fRange_sql = "fees > 20000 AND fees < 40000 AND ";
      break;
    case 4: //  40,000 - 60,000
      $fRange_sql = "fees > 40000 AND fees < 60000 AND ";
      break;
    case 5: //  60,000 - 80,000
      $fRange_sql = "fees > 60000 AND fees < 80000 AND ";
      break;
    case 6: //  80,000 above
      $fRange_sql = "fees > 80000 AND ";
      break;
  }


  
  if($f_From == '0' && $f_To == '0'){ //  0 for both
    $fSpec_sql = "";
  }
  else if ($f_From == '0' && $f_To != '0'){ //  from: 0 | to: true
    $fRange_sql = "fees <".(int)$f_To." AND ";
    $fSpec_sql = "";
  }
  else if($f_From != '0' && $f_To != '0'){ //  from: true | to: true
    $fRange_sql = "fees >=".(int)$f_From." AND fees <=".(int)$f_To." AND ";
    $fSpec_sql = "";
  }

  $sql="SELECT * FROM `#@__infolist` WHERE classid=2 AND ".$stateW." ".$TypeW." ".$fieldW." ".$bfW." ".$cnW." ".$fRange_sql." ".$fSpec_sql." checkinfo='true' AND delstate='' AND checkinfo=true ORDER BY fees DESC";
  $dopage->GetPage($sql,10);

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
      <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1">课程名称</div>
      <div class="ctm-table__col ctm-table__6col-2">课程类别</div>
      <div class="ctm-table__col ctm-table__6col-3">所属学府</div>
      <div class="ctm-table__col ctm-table__6col-4">所在州</div>
      <div class="ctm-table__col ctm-table__6col-5">课时（周）</div>
      <div class="ctm-table__col ctm-table__6col-6">学费（总额）</div>
    </li>
    
    <?php
      while($row = $dosql->GetArray())
      {
        if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
        else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
        else $gourl = $row['linkurl'];

        $row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
        if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
        else $gourl2 = 'news-'.$row['classid'].'-1.html';
        if($row['type']>3){;
            $page="./../schoolShow.php";
          $zypage="./../schoolShow_zysh.php";
          
        }else{
          $page="./../schoolShow2.php";
          $zypage="./../schoolShow_zysh.php";
        }

        // formatting 'fees' to $2,000 etc
        $fees = $row['fees'];
        
        $fees_bf_3 = substr($fees, 0, -3);
        $fees_last_3 = substr($fees, -3);

        
        if ($row['fees'] == 0)
          $fees_format = '抱歉，暂时无法显示';
        else
          $fees_format = '$'.$fees_bf_3.','.$fees_last_3;

    ?>
        <li class="ctm-table__row" onclick="parent.location.href='course-info.php?cid=<?php echo($row['cbh']);?>&id=<?php echo($row['id']);?>';">
          <div class="ctm-table__col ctm-table__6col-1 ctm-table__col-1" data-label=""><?php echo($row['title']);?></div>
          <div class="ctm-table__col ctm-table__6col-2 ctm-table__embed-courseType" data-label=""><?php echo(getCType($row['type']));?></div>
          <div class="ctm-table__col ctm-table__6col-3 ctm-table__embed-School" data-label=""><?php echo($row['daxue']);?></div>
          <div class="ctm-table__col ctm-table__6col-4 ctm-table__embed-State" data-label=""><?php echo(getState($row['state']));?></div>
          <div class="ctm-table__col ctm-table__6col-5 ctm-table__embed-Duration" data-label=""><?php echo($row['ks']);?></div>
          <div class="ctm-table__col ctm-table__6col-6 ctm-table__embed-Fes" data-label=""><?php echo $fees_format;?></div>
        </li>

    <?php
      }

      // session_unset();
    ?>
  </ul>
  <!-- <div style="display: flex; justify-content: center; align-items: center; line-height:30px; height:30px; padding-left:20px; font-size:14px;"><?php //echo $dopage->GetList(); ?></div> -->
</div>

<div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>