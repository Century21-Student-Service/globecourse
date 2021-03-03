<?php session_start();
require_once(dirname(__FILE__).'./../include/config.inc.php');
include_once('./../ext/news.php');

unset($_SESSION['states']);
unset($_SESSION['cType']);
unset($_SESSION['cN']);
unset($_SESSION['bField']);
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>课程搜索 | 潮流搜索平台</title>
    <!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->

    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
    <?php include_once('_dynamic_siteSetting/icon-setting.php'); ?>
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


    <!-- (Theme) kingster -->
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/style-core.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/kingster-style-custom.css' type='text/css' media='all' />

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />

    <!-- (Theme) educate -->
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="educate-stylesheets/animate.css">


    <!-- (Theme) custom -->
    <link rel="stylesheet" type="text/css" href="custom-css/font.css">
    <link rel="stylesheet" type="text/css" href="custom-css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="custom-css/radio-box.css">
    <link rel="stylesheet" type="text/css" href="custom-css/drop-down.css">
    <link rel="stylesheet" type="text/css" href="custom-css/map-effect.css">

    
    <!-- ==========  (custom) Style [only this pg]  ========== -->
    <style type="text/css">
        .gdlr-core-item-pdb{ padding-bottom: 15px !important; }

        /*green line*/
        #custom_greenLine-style-title{ border-color: #027dfa; border-bottom-width: 3px; }
        #custom_greenLine-style{ border-color: #d6d6d6; border-bottom-width: 2px; margin-top: 40px; }
    </style>
    <!-- ==========  (custom) Style [only this pg]  ========== -->

    
    <!-- ==========  [from-ORIGINAL]  ========== -->
    <script src="./../templates/default/js/jquery.min.js"></script>

    <!-- ==========  (custom) JavaScript  ========== -->
    <script>
		$(function(){
		   $('#broadField').change(function(){
			   var pid=$(this).val();
	           //alert(pid);
			   $.ajax({
				   type :'GET',
				   url  :'./../ext/ajaxFun.php?act=getSecField&type=1&pid='+pid,
				   date :'',
				   success:function(m){
					 $('#narrowField option').remove();
					 $('#narrowField').append(m);
				   }
			   });
		   });

		});
	</script>
	<!-- ==========  (custom) JavaScript  ========== -->
    
</head>
<body class="home page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full  kingster-with-sticky-navigation  kingster-blockquote-style-1 gdlr-core-link-to-lightbox">

	<!-- ______________________________        NavBar [mobile]        ______________________________ -->
	<!-- =========================================================================================== -->
    <?php
        include_once('_dynamic_siteSetting/navbar-mobile.php');
    ?>

    <!-- ======================================================================================== -->
	<!-- ______________________________        Body [outer]        ______________________________ -->
	<!-- ======================================================================================== -->
    <div class="kingster-body-outer-wrapper ">
        <div class="kingster-body-wrapper clearfix  kingster-with-frame">
            
            <!-- ______________________________        NavBar        ______________________________ -->
			<!-- ================================================================================== -->
            <?php include_once('_dynamic_siteSetting/navbar.php'); ?>

            <!-- ======================================================================================== -->
			<!-- ______________________________        Body [inner]        ______________________________ -->
			<!-- ======================================================================================== -->
            <div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="gdlr-core-page-builder-body">
                    
                    <!-- ===============        (theme) custom        =============== -->
                    <div class="kingster-page-wrapper" id="kingster-page-wrapper">
		                <div class="gdlr-core-page-builder-body">
		                    <div class="gdlr-core-pbf-wrapper " style="padding: 70px 0px 100px 0px;">
		                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
		                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
		                                
		                                
		                                <!-- ===============        (Top) layer        =============== -->
		                                <div class="gdlr-core-pbf-column gdlr-core-column-60">
		                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
		                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
		                                        	
		                                        	<!-- 1st Element -->
		                                            <!-- ====================     << Page Title >>     ==================== -->
		                                            <div class="gdlr-core-pbf-element">
		                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
		                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
		                                                        
		                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 34px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #161616 ;">课程搜索</h3></div>
		                                                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 16px ;font-style: normal ;color: #6c6c6c ;margin-top: 0 ;">Course Search</span></div>
		                                                </div>
		                                            </div>

		                                            <!-- 2nd Element -->
		                                            <!-- ====================     << (Blue) Line >>     ==================== -->
		                                            <div class="gdlr-core-pbf-element">
		                                                <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 25px ;">
		                                                    
		                                                    <div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style-title"></div>
		                                                </div>
		                                            </div>

		                                        </div>
		                                    </div>
		                                </div>

		                                <!-- =============================================        Form [for submit button]        ============================================= -->
		                                <form action="<?php include('_dynamic_siteSetting/folderLink_cn.php'); ?>search-course__result.php" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" >
		                                <!-- =============================================        Form [for submit button]        ============================================= -->

			                                
			                                <!-- ===============        (1st) Top        =============== -->
			                                <div class="gdlr-core-pbf-column gdlr-core-column-15">
			                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
			                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
			                                        	
			                                        	<!-- 1st Element -->
			                                            <!-- ====================     << Title >> {1st quarter}     ==================== -->		<!-- ===== (State - 州) ===== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0 !important">
			                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
			                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">州 名</h3></div>
			                                                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;">State</span></div>
			                                                </div>
			                                            </div>

			                                            <!-- 2nd Element -->
			                                            <!-- ====================     << Dropdown >> {1st quarter}     ==================== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 20px ;">
			                                                    <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;letter-spacing: 0px ;text-transform: none ;">
			                                                        <!-- <div class="border-box_100">
			                                                        	<input type="radio" id="" name="state" value="0">
			                                                        	<div class="border-box_100_label">
			                                                        		<label for="state"><span>--请选择大州--</span></label><br>
			                                                        	</div>
			                                                        </div> -->


			                                                        <!-- =====  (Get) State list [from database]  ===== -->

			                                                        <!-- =====  (Insert) State [drop-down list]  ===== -->
			                                                        <?php

		                                                        		/***  (Set) recognition-Name  ***/
	                                                        			$dropdown_Name = 'state';
	                                                        			$dropdown_ID = 'state';
		                                                        		/***  (Set) Button-Percentage  ***/
		                                                        		$dropdown_Class = 'dropdown_100';

		                                                        		/***  (Set) 1st Value  ***/
		                                                        		$dropdown_valueNil = '请选择「大州」';
		                                                        		/***  (Get) Value [from database]  ***/
		                                                        		$dropdown_tableID = 5;

		                                                        		/***  (Insert) State [dropdown]  ***/
			                                                        	include('custom-append/append_State__dropdown.php');
		                                                        		
			                                                        ?>


			                                                    </div>
			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>

			                                <!-- ===============        (2nd) Top        =============== -->
			                                <div class="gdlr-core-pbf-column gdlr-core-column-15">
			                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
			                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
			                                        	
			                                        	<!-- 1st Element -->
			                                            <!-- ====================     << Title >> {1st quarter}     ==================== -->		<!-- ===== (Category - 课程类别) ===== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0 !important">
			                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
			                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">课程类别</h3></div>
			                                                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;">Course Level</span></div>
			                                                </div>
			                                            </div>

			                                            <!-- 2nd Element -->
			                                            <!-- ====================     << Dropdown >> {2nd quarter}     ==================== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">
			                                                    
			                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
		                                                        <?php

	                                                        		/***  (Set) recognition-Name  ***/
                                                        			$dropdown_Name = 'schoolType';
                                                        			$dropdown_ID = 'schoolType';
	                                                        		/***  (Set) Button-Percentage  ***/
	                                                        		$dropdown_Class = 'dropdown_100';

	                                                        		/***  (Set) 1st Value  ***/
	                                                        		$dropdown_valueNil = '请选择「课程类别」';
	                                                        		/***  (Get) Value [from database]  ***/
	                                                        		$dropdown_tableID = 6;

	                                                        		/***  (Insert) State [dropdown]  ***/
		                                                        	include('custom-append/append_State__dropdown.php');
	                                                        		
		                                                        ?>

			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>

			                                <!-- ===============        (3rd) Top        =============== -->
			                                <div class="gdlr-core-pbf-column gdlr-core-column-15">
			                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
			                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
			                                        	
			                                        	<!-- 1st Element -->
			                                            <!-- ====================     << Title >> {3rd quarter}     ==================== -->		<!-- ===== (Category - 课程类别) ===== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0 !important">
			                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
			                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">主要学科</h3></div>
			                                                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;">Faculty of Courses</span></div>
			                                                </div>
			                                            </div>

			                                            <!-- 2nd Element -->
			                                            <!-- ====================     << Dropdown >> {3rd quarter}     ==================== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">
			                                                    
			                                                    
			                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
		                                                        <select name="broadField" class="dropdown_100" id="broadField">
												                  <option value="">请选择「学科」</option>
												        					
												                  <?php
												                    $dosql->Execute("SELECT * FROM `#@__field` WHERE `type`=0 ");

												                    while($row = $dosql->GetArray()){
												                      echo('<option value="'.$row['bh'].'">'.$row['bh'].' - '.$row['cname'].'</option>');
												                    }
												        					?>
												                </select>


			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>

			                                <!-- ===============        (4th) Top        =============== -->
			                                <div class="gdlr-core-pbf-column gdlr-core-column-15">
			                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
			                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
			                                        	
			                                        	<!-- 1st Element -->
			                                            <!-- ====================     << Title >> {4th quarter}     ==================== -->		<!-- ===== (Category - 课程类别) ===== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0 !important">
			                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
			                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">具体课程</h3></div>
			                                                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;">Specific Course</span></div>
			                                                </div>
			                                            </div>

			                                            <!-- 2nd Element -->
			                                            <!-- ====================     << Dropdown >> {4th quarter}     ==================== -->
			                                            <div class="gdlr-core-pbf-element">
			                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">
			                                                    
			                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
		                                                        <select name="narrowField" class="dropdown_100" id="narrowField">
												                  <option value="">请选择「课程」</option>
												                </select>

			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>

			                                <!-- ===============        (Bottom) layer        =============== -->
			                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
			                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
			                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ctm-map-container">

			                                        	<!-- ====================     << Map >>     ==================== -->
			                                        	<?php include('map.php'); ?>
			                                        	<!-- ====================     << Map >>     ==================== -->

			                                        	<img src="custom-images/map-Aus_pureLight.png" width="60px" height="60px" class="custom-mapState_button" title="原始" id="mapBtn_Light">
			                                        	<img src="custom-images/map-Aus_pureBlueTxt.png" width="60px" height="60px" class="custom-mapState_button" title="全显示" id="mapBtn_Dark">
			                                        </div>
			                                    </div>
			                                </div>
                                        </form>

		                            	<!-- ===============        (Center) below        =============== -->
		                                <!-- <iframe name="SouJg" id="SouJg" style=" min-height:433px;" frameborder="0" width="100%"  src="" onLoad="iFrameHeight()"  ></iframe> -->
		                                
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>

			        <!-- ===============        /(theme) custom        =============== -->

			        <!-- ===============        (Pop-up) Search Result        =============== -->
			        <div id="Result_Background" class="custom-overlay--hidden">
			        	
			        	<div id="Result_Frame" class="custom-popup__Frame--hidden">
						  <div id="Result_Content" class="custom-popup__content">
						    

						    <div id="Result_Close" class="custom-popup__close-bar">
						      <span>X</span>
						    </div>

						    <iframe name="Result_Popup" id="Result_Popup" style="border-radius: 10px;" frameborder="0" width="100%" height="100%" src="" onLoad="iFrameHeight()"  ></iframe>
						    

						  </div>
						</div>

			        </div>
			        <!-- <iframe name="SouJg" id="SouJg" style=" min-height:433px;" frameborder="0" width="100%"  src="" onLoad="iFrameHeight()"  ></iframe> -->
                </div>
            </div>

            <!-- ================================================================================== -->
			<!-- ______________________________        Footer        ______________________________ -->
			<!-- ================================================================================== -->
            <?php include_once('_dynamic_siteSetting/footer.php'); ?>

            <!-- ============================================================================================== -->
			<!-- ______________________________        (end) Body [outer]        ______________________________ -->
			<!-- ============================================================================================== -->
        </div>
    </div>


	<script type='text/javascript' src='kingster-js/jquery/jquery.js'></script>
    <script type='text/javascript' src='kingster-js/jquery/jquery-migrate.min.js'></script>
    <!-- <script type='text/javascript' src='kingster-plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='kingster-plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js'></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js"></script>  
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.actions.min.js"></script> 
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js"></script> -->


    <!-- <script type='text/javascript' src='kingster-plugins/goodlayers-core/plugins/combine/script.js'></script>
    <script type='text/javascript' src='kingster-plugins/goodlayers-core/include/js/page-builder.js'></script> -->
    <script type='text/javascript' src='kingster-js/jquery/ui/effect.min.js'></script>
    <script type='text/javascript' src='kingster-js/plugins.min.js'></script>



    <!-- ==========  (custom) JavaScript  ========== -->
    <script type="text/javascript" src="custom-code__js/search-animation__popupWin.js"></script>
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->


    <!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Map        ______________________________ -->
	<!-- ======================================================================================== -->
    <script type="text/javascript" src="custom-code__js/map-function__dropdown.js"></script>

    <script type="text/javascript">
    	var w = window.innerWidth;

    	if (w < 1260){
    		jQuery('.ctm-map-svg').css({'margin-right': '0%'});
    		jQuery('.ctm-map-container').css({'margin-bottom': '15%'});
    	}
    </script>


    <!-- <script type="text/javascript">
        /*<![CDATA[*/
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        }; /*]]>*/
    </script>
    <script>
        (function(body) {
            'use strict';
            body.className = body.className.replace(/\btribe-no-js\b/, 'tribe-js');
        })(document.body);
    </script>
    <script>
        var tribe_l10n_datatables = {
            "aria": {
                "sort_ascending": ": activate to sort column ascending",
                "sort_descending": ": activate to sort column descending"
            },
            "length_menu": "Show _MENU_ entries",
            "empty_table": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "info_empty": "Showing 0 to 0 of 0 entries",
            "info_filtered": "(filtered from _MAX_ total entries)",
            "zero_records": "No matching records found",
            "search": "Search:",
            "all_selected_text": "All items on this page were selected. ",
            "select_all_link": "Select all pages",
            "clear_selection": "Clear Selection.",
            "pagination": {
                "all": "All",
                "next": "Next",
                "previous": "Previous"
            },
            "select": {
                "rows": {
                    "0": "",
                    "_": ": Selected %d rows",
                    "1": ": Selected 1 row"
                }
            },
            "datepicker": {
                "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
                "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                "monthNamesShort": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                "monthNamesMin": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                "nextText": "Next",
                "prevText": "Prev",
                "currentText": "Today",
                "closeText": "Done",
                "today": "Today",
                "clear": "Clear"
            }
        };
        var tribe_system_info = {
            "sysinfo_optin_nonce": "a32c675aaa",
            "clipboard_btn_text": "Copy to clipboard",
            "clipboard_copied_text": "System info copied",
            "clipboard_fail_text": "Press \"Cmd + C\" to copy"
        };
    </script>

    <script type="text/javascript">
        /*<![CDATA[*/
        function revslider_showDoubleJqueryError(sliderID) {
            var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
            errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
            errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
            errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
            errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
            jQuery(sliderID).show().html(errorMessage);
        } /*]]>*/
    </script>

    
    <script type='text/javascript'>
        var gdlr_core_pbf = {
            "admin": "",
            "video": {
                "width": "640",
                "height": "360"
            },
            "ajax_url": "https:\/\/demo.goodlayers.com\/kingster\/wp-admin\/admin-ajax.php"
        };
    </script>



    
    <script type='text/javascript'>
        var kingster_script_core = {
            "home_url": "https:\/\/demo.goodlayers.com\/kingster\/"
        };
    </script>
    
    <script>
	    /*<![CDATA[*/
	    var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
	    var htmlDivCss = "";
	    if (htmlDiv) {
	        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
	    } else {
	        var htmlDiv = document.createElement("div");
	        htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
	        document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
	    } /*]]>*/
	</script>
	<script type="text/javascript">
	    /*<![CDATA[*/
	    if (setREVStartSize !== undefined) setREVStartSize({
	        c: '#rev_slider_1_1',
	        gridwidth: [1380],
	        gridheight: [713],
	        sliderLayout: 'auto'
	    });
	    var revapi1, tpj;
	    (function() {
	        if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
	        else onLoad();

	        function onLoad() {
	            if (tpj === undefined) {
	                tpj = jQuery;
	                if ("off" == "on") tpj.noConflict();
	            }
	            if (tpj("#rev_slider_1_1").revolution == undefined) {
	                revslider_showDoubleJqueryError("#rev_slider_1_1");
	            } else {
	                revapi1 = tpj("#rev_slider_1_1").show().revolution({
	                    sliderType: "standard",
	                    jsFileLocation: "//demo.goodlayers.com/kingster/wp-content/plugins/revslider/public/assets/js/",
	                    sliderLayout: "auto",
	                    dottedOverlay: "none",
	                    delay: 9000,
	                    navigation: {
	                        keyboardNavigation: "off",
	                        keyboard_direction: "horizontal",
	                        mouseScrollNavigation: "off",
	                        mouseScrollReverse: "default",
	                        onHoverStop: "off",
	                        touch: {
	                            touchenabled: "on",
	                            touchOnDesktop: "off",
	                            swipe_threshold: 75,
	                            swipe_min_touches: 1,
	                            swipe_direction: "horizontal",
	                            drag_block_vertical: false
	                        },
	                        arrows: {
	                            style: "uranus",
	                            enable: true,
	                            hide_onmobile: true,
	                            hide_under: 1500,
	                            hide_onleave: true,
	                            hide_delay: 200,
	                            hide_delay_mobile: 1200,
	                            tmp: '',
	                            left: {
	                                h_align: "left",
	                                v_align: "center",
	                                h_offset: 20,
	                                v_offset: 0
	                            },
	                            right: {
	                                h_align: "right",
	                                v_align: "center",
	                                h_offset: 20,
	                                v_offset: 0
	                            }
	                        },
	                        bullets: {
	                            enable: true,
	                            hide_onmobile: false,
	                            hide_over: 1499,
	                            style: "uranus",
	                            hide_onleave: true,
	                            hide_delay: 200,
	                            hide_delay_mobile: 1200,
	                            direction: "horizontal",
	                            h_align: "center",
	                            v_align: "bottom",
	                            h_offset: 0,
	                            v_offset: 30,
	                            space: 7,
	                            tmp: '<span class="tp-bullet-inner"></span>'
	                        }
	                    },
	                    visibilityLevels: [1240, 1024, 778, 480],
	                    gridwidth: 1380,
	                    gridheight: 713,
	                    lazyType: "none",
	                    shadow: 0,
	                    spinner: "off",
	                    stopLoop: "off",
	                    stopAfterLoops: -1,
	                    stopAtSlide: -1,
	                    shuffle: "off",
	                    autoHeight: "off",
	                    disableProgressBar: "on",
	                    hideThumbsOnMobile: "off",
	                    hideSliderAtLimit: 0,
	                    hideCaptionAtLimit: 0,
	                    hideAllCaptionAtLilmit: 0,
	                    debugMode: false,
	                    fallbacks: {
	                        simplifyAll: "off",
	                        nextSlideOnWindowFocus: "off",
	                        disableFocusListener: false,
	                    }
	                });
	            };
	        };
	    }()); /*]]>*/
	</script>
	<script>
	    /*<![CDATA[*/
	    var htmlDivCss = unescape("%23rev_slider_1_1%20.uranus.tparrows%20%7B%0A%20%20width%3A50px%3B%0A%20%20height%3A50px%3B%0A%20%20background%3Argba%28255%2C255%2C255%2C0%29%3B%0A%20%7D%0A%20%23rev_slider_1_1%20.uranus.tparrows%3Abefore%20%7B%0A%20width%3A50px%3B%0A%20height%3A50px%3B%0A%20line-height%3A50px%3B%0A%20font-size%3A40px%3B%0A%20transition%3Aall%200.3s%3B%0A-webkit-transition%3Aall%200.3s%3B%0A%20%7D%0A%20%0A%20%20%23rev_slider_1_1%20.uranus.tparrows%3Ahover%3Abefore%20%7B%0A%20%20%20%20opacity%3A0.75%3B%0A%20%20%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%7B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C%200%29%3B%0A%20%20-webkit-transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20background%3Atransparent%3B%0A%20%20width%3A15px%3B%0A%20%20height%3A15px%3B%0A%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20%7B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C1%29%3B%0A%20%20border%3Anone%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background%3Atransparent%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet-inner%20%7B%0A%20%20-webkit-transition%3A%20background-color%200.3s%20ease%2C%20-webkit-transform%200.3s%20ease%3B%0A%20%20transition%3A%20background-color%200.3s%20ease%2C%20transform%200.3s%20ease%3B%0A%20%20top%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20height%3A%20100%25%3B%0A%20%20outline%3A%20none%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background-color%3A%20rgb%28255%2C%20255%2C%20255%29%3B%0A%20%20background-color%3A%20rgba%28255%2C%20255%2C%20255%2C%200.3%29%3B%0A%20%20text-indent%3A%20-999em%3B%0A%20%20cursor%3A%20pointer%3B%0A%20%20position%3A%20absolute%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%20.tp-bullet-inner%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20.tp-bullet-inner%7B%0A%20transform%3A%20scale%280.4%29%3B%0A%20-webkit-transform%3A%20scale%280.4%29%3B%0A%20background-color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%7D%0A");
	    var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
	    if (htmlDiv) {
	        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
	    } else {
	        var htmlDiv = document.createElement('div');
	        htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
	        document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
	    } /*]]>*/
	</script> -->
</body>
</html>