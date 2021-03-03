<?php
require_once(dirname(__FILE__).'/include/config.inc.php'); 
include_once('ext/news.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/common.css" type="text/css" rel="stylesheet" />
<style type="text/css">
body,td,th {
	font-family: "Microsoft Yahei";
}
</style>
<?php echo GetHeader(); ?>
<script src="templates/default/js/jquery.min.js"></script>
<script src="js/layer/layer.js"></script>
<script>
  $(function(){
	$('#Btn1').click(function(){
	   location.href="ck1.php";
	});
	$('#WxBtn').click(function(){
		layer.open({
		type: 1,
		shade: false,
		title: false, //不显示标题
		content: $('#XwBox'), //捕获的元素
		cancel: function(index){
				layer.close(index);
				this.content.show();
				$('#XwBox').hide();
		     }
	   });
    });
	
    $('#VodBtn').click(function(){
		layer.open({
		type: 1,
		shade: false,
		title: false, //不显示标题
		area: ['800px', '480px'], 
		content: $('#VodBox'), //捕获的元素
		cancel: function(index){
				layer.close(index);
				this.content.show();
				$('#VodBox').hide();
		     }
	   });
    });
	
  });
</script>
</head>
<body>
<?php
include_once('topbar.php');
?>
<div style="background:url(images/bg1.jpg) no-repeat center top; ">
<div class="BoxW"  style="min-height:760px; width:1100px;">
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="109" colspan="3"><table width="1060" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="560"><table width="1060" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="560"><img src="images/tlogo.png" width="423" height="88" /></td>
            <td width="500"><table width="500" border="0" cellspacing="0" cellpadding="0">
              <form action="so.php" method="get" name="soword" id="soword" >
                <tr>
                  <td width="174" align="center" valign="middle"><span style="font-size:14px; color:#03C; font-weight:600;">课程和院校关键词搜索</span></td>
                  <td width="84" height="41" valign="middle"><select name="ctype" class="SoTy" id="ctype">
                    <option value="1">课程</option>
                    <option value="2">院校</option>
                  </select></td>
                  <td width="173" valign="middle"><input name="courseName" type="text" class="SoInp" id="courseName" value="<?php echo($courseName);?>" /></td>
                  <td width="69" valign="middle"><input name="button" type="submit" class="SoBtn" id="button" value="搜索" /></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td height="46" colspan="3" align="right" valign="bottom"><img src="images/tq.png" width="220" height="40" usemap="#Map" border="0" /></td>
                  </tr>
              </form>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td width="369" height="343" align="center" valign="top">
      <a href="schoolShow.php?id=23"><img style="width: 180px;" src="uploads/image/20150928/1443438961.jpg" /></a>
    </td>
    <td width="396" align="center"><img src="images/dt1.png" width="436" height="402" /></td>

    <td width="335" align="left">

      <div class="S1">
         
         <div class="Sb" style="background:url(images/te1.png) no-repeat ;">
           <div class="Tb">热门课程 & 特价课程</div>
           <div class="Btn_t" onclick="location.href='test2.php';">点击进入</div>
         </div>
       </div>
	
	</td>


  </tr>
  <tr>
    <td height="244" colspan="3">
       <div class="S1">
          <div class="Tit">留学方案</div>
          <div class="Sb" style="background:url(images/s1bg.jpg) no-repeat ;">
          <div class="Tb">根据您的学历选择留学方案</div>
          <div class="Btn_t" id="Btn1" >点击进入</div>
          </div>
       </div>
       <div class="S1">
         <div class="Tit">课程搜索</div>
         <div class="Sb" style="background:url(images/s2bg.jpg) no-repeat ;">
           <div class="Tb">搜索澳大利亚教育机构提供的课程</div>
           <div class="Btn_t" onclick="location.href='course.php';">点击进入</div>
         </div>
       </div>
       <div class="S1">
         <div class="Tit">院校搜索</div>
         <div class="Sb" style="background:url(images/s3bg.jpg) no-repeat ;">
           <div class="Tb">搜索澳大利亚的教育机构</div>
           <div class="Btn_t" onclick="location.href='school.php';">点击进入</div>
         </div>
       </div></td>
    </tr>
</table>
</div>
</div>
<?php include('footer.php');?>
  <div id="XwBox" style="display:none;">
      <div style="padding:10px;">
      <table width="320" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="150" height="150"><img src="images/ewm.jpg" width="150" height="150" /></td>
          <td width="20">&nbsp;</td>
          <td width="150"><img src="images/ewm2.jpg" width="150" height="150" /></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle"><strong>官方公众账号</strong></td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><strong>潮流咨询</strong></td>
        </tr>
        </table>
      </div>
  </div>
  
  <div id="VodBox" style=" width:800px; height:480px; display:none; background:#000; ">
      <div style="">
      <!-- 酷播你迷(CuPlayer.com)/代码开始 -->
		<script type="text/javascript" src="CuPlayer/images/swfobject.js"></script>
        <div class="video" id="CuPlayer">
        <strong>酷播你迷(CuPlayer.com) 提示：您的Flash Player版本过低，请<a href="http://www.CuPlayer.com/">点此进行网页播放器升级</a>！</strong></div>
        <script type="text/javascript">
        var so = new SWFObject("CuPlayer/CuPlayerMiniV4.swf","CuPlayerV4","800","480","9","#000000");
        so.addParam("allowfullscreen","true");
        so.addParam("allowscriptaccess","always");
        so.addParam("wmode","opaque");
        so.addParam("quality","high");
        so.addParam("salign","lt");
        so.addVariable("CuPlayerSetFile","CuPlayer/CuPlayerSetFile.xml"); //播放器配置文件地址,例SetFile.xml、SetFile.asp、SetFile.php、SetFile.aspx
        so.addVariable("CuPlayerFile","http://www.ct21.com.cn/CuPlayer/test.flv"); //视频文件地址
        so.addVariable("CuPlayerImage","CuPlayer/images/start.jpg");//视频略缩图,本图片文件必须正确
        so.addVariable("CuPlayerWidth","800"); //视频宽度
        so.addVariable("CuPlayerHeight","480"); //视频高度
        so.addVariable("CuPlayerAutoPlay","yes"); //是否自动播放
        so.addVariable("CuPlayerLogo","CuPlayer/logo.png"); //Logo文件地址
        so.addVariable("CuPlayerPosition","bottom-right"); //Logo显示的位置
        so.write("CuPlayer");
        </script>
       <!-- 酷播你迷(CuPlayer.com)/代码结束 -->
       </div>
  </div>

  
<map name="Map" id="Map">
  <area shape="rect" coords="134,3,172,38" href="http://weibo.com/u/3535166524" target="new" />
  <area shape="rect" coords="177,3,216,39" href="javascript:;" id="VodBtn" />
  <area shape="rect" coords="89,2,126,37" href="javascript:;" id="WxBtn" />
  <area shape="rect" coords="46,2,83,37" href="https://www.facebook.com/Century21StudentServiceCentre" target="new" />
  <area shape="rect" coords="2,3,40,37" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2268244341&amp;site=qq&amp;menu=yes" target="new" />
</map>
</body>
</html>
