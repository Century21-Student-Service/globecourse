<?php session_start();
require_once dirname(__FILE__) . '/include/config.inc.php';
include_once 'ext/news.php';

$id = empty($id) ? 2 : intval($id);
$Sch = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=" . $id);
$Db = new MySql(false);
$G = $Db->GetOne("SELECT * FROM `#@__infoimg` WHERE bh='" . $Sch['bh'] . "'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/index.css" type="text/css" rel="stylesheet" />
<script src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="js/lrtk.js"></script>
<script src="js/layer/layer.js"></script>
<script>

  $(function(){
	$('#NavBox li:eq(0)').addClass('On');
	<?php
if (!empty($_SESSION['username'])) {
    ?>
    layer.open({
        type: 2,
        title: '网站提醒',
        maxmin: false,
		closeBtn: false,
        shadeClose: false, //点击遮罩关闭层
        area : ['460px' , '350px'],
        content: 'login.html',
		shade: [0.9, '#eee']
    });
	<?php
}
?>
  });

</script>
</head>
<body  onselectstart="return false" onpaste="return false">
<?php
include_once 'topbar.php';
?>
<div class="BoxW"  style="min-height:600px; width:1000px;">
  <table width="1000" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="121" align="left" ><?php include_once 'SchImg.php';?></td>
    </tr>
    <tr>
      <td height="32" align="left"><?php include_once 'schnav2.php';?></td>
    </tr>
     <tr>
      <td height="10" align="left"></td>
    </tr>
    <tr>
      <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="450" align="left" valign="top"><table width="1000" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="680" height="299">
              <!-- indexCon start -->
			   <?php

$picarr = unserialize($Sch['picarr']);
?>
                <div class="indexCon">
                    <div class="flashBanner">
                        <a href="schoolShow.php?id=<?php echo ($id); ?>"><img class="bigImg" width="680" height="300" /></a>
                        <div class="mask">
                        <?php
foreach ($picarr as $k) {
    $v = explode(',', $k);
    ?>
                        <img src="<?php echo $v[0]; ?>" uri="<?php echo $v[0]; ?>" link="#"  width="60" height="22"/>
                        <?php
}
?>
                        </div>
                    </div>
                </div>
                <!-- indexCon end -->
              </td>
              <td width="320" valign="top" bgcolor="#EFEFEF">
              <div class="ScBox" style="padding-bottom:0px;margin-left:20px; padding-top:0px; margin-top:0px;">
                <div class="ScTit" style="color:#069; border-bottom:1px solid #eee; ">
                  <div style="height:39px; border-bottom:2px solid #06C; width:80px; text-align:center;">专业课程</div>
                 </div>
             </div>
                <ul class="scZyUl">
                <?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE siteid=1 AND classid=2 AND cbh='" . $id . "' AND delstate='' AND checkinfo=true GROUP BY kcfw ORDER BY orderid DESC LIMIT 0,12");
while ($row = $dosql->GetArray()) {
    $D = $dosql->GetOne("SELECT * FROM `#@__field` WHERE bh='" . $row['kcfw'] . "'");
    //获取链接地址
    if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
        $gourl = 'schoolShow_zy.php?cid=' . $row['id'] . '&id=' . $id;
    } else {
        $gourl = $row['linkurl'];
    }

    ?>
                  <li><a href="<?php echo ($gourl); ?>"><?php echo ($D['cname']); ?></a></li>
                <?php
}
?>
                </ul>


              </td>
            </tr>
            <tr>
              <td height="500" valign="top"><table width="670" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="659" height="197" valign="top"><div class="ScBox">
                    <div class="ScTit" style="color:#069"> 学校概述 </div>
                    <div class="ScTxt"><?php echo ($Sch['description']); ?><br/>
                      <div style="line-height:26px; text-align:right; height:26px;"><a href="schoolShow_xx.php?id=<?php echo ($id); ?>"></a></div>
                    </div>
                  </div></td>
                </tr>
                <tr>
                  <td><div class="ScBox" style="border-bottom:0px;">
                    <div class="ScTit" style="color:#069"> 热门专业 </div>
                       <ul class="schNewsUl">
       	<?php
$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=2  AND delstate='' AND cbh='" . $id . "' AND checkinfo=true ORDER BY orderid DESC", 5);
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

    ?>
            <li>
               <div class="Tit"><a href="<?php echo $gourl; ?>" style="color:<?php echo $row['colorval']; ?>;font-weight:<?php echo $row['boldval']; ?>;"><?php echo ($row['title']); ?></a></div>
               <div class="Cont"><?php echo (ReStrLen($row['description'], 154)); ?></div>
              <div class="Txt"><div class="R1"><a href="schoolShow_zysh.php?cid=<?php echo ($id); ?>&id=<?php echo ($row['id']); ?>">查看详情</a></div><?php echo GetDateTime($row['posttime']); ?></div>
            </li>

	<?php
}
?>
<div style=" clear:both"></div>
                       </ul>
                  </div></td>
                </tr>
                <tr>
                  <td height="40">

                        </td>
                </tr>
              </table></td>
              <td align="right" valign="top">
              <?php include_once 'schleft.php';?>
              </td>
            </tr>
          </table></td>
          </tr>
      </table></td>
      </tr>
  </table>
</div>
           <div id="JgBox" class="BoxW">
            <iframe name="SouJg" id="SouJg" style="min-height:125px;" frameborder="0" width="100%"  src="" onLoad="iFrameHeight()" ></iframe>
          </div>
<?php include 'footer.php';?>
</body>
</html>