<?php 
// session_start();
  // require_once(dirname(__FILE__).'./../include/config.inc.php'); 
  // include_once('./../ext/news.php');

  // $id = empty($id) ? 9 : intval($id);
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>热门课程 | 潮流搜索平台</title>
    <!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->
    
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
    <?php include_once('_dynamic_siteSetting/icon-setting.php'); ?>
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


    <!-- (Theme) kingster -->
    <!-- <link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' /> -->
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
    <!-- <link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' /> -->
    <link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />


    <!-- Mobile Specific Metas -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="educate-stylesheets/bootstrap.css" >

    <!-- Theme Style -->
    <!-- <link rel="stylesheet" type="text/css" href="educate-stylesheets/style.css"> -->

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="educate-stylesheets/responsive.css">

    <!-- Colors -->
    <!-- <link rel="stylesheet" type="text/css" href="educate-stylesheets/colors/color1.css" id="colors"> -->
    
    <!-- Animation Style -->
    <!-- <link rel="stylesheet" type="text/css" href="stylesheets/animate.css"> -->

    <!-- (Theme) educate -->
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="educate-stylesheets/animate.css">


    <!-- (Theme) custom -->
    <link rel="stylesheet" type="text/css" href="custom-css/font.css">
    <link rel="stylesheet" type="text/css" href="custom-css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="custom-css/style_immi-courses.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/radio-box.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/drop-down.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/tab-box.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/map-effect.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/table.css">

    
    <!-- ==========  (custom) Style [only this pg]  ========== -->
    <style type="text/css"></style>
    <!-- ==========  (custom) Style [only this pg]  ========== -->

    
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
                    
                    <!-- ============================================================================================== -->
                    <!-- ===================================        [Header]        =================================== -->
                    <!-- ============================================================================================== -->
                    <div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url(custom-images/home4_immigration_q1.jpg);" loading="lazy">  <!-- [Background-Image] -->

		                <!-- ========================================     << Overlay >>     ======================================== -->
		                <div class="kingster-header-transparent-substitute"></div>
		                <div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div> <!-- #802525 -->
		                <div class="kingster-page-title-overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, .6)); opacity: .8;"></div>

		                
		                <div class="kingster-page-title-container kingster-container">
		                    <div class="kingster-page-title-content kingster-item-pdlr ctm-header__content" style="height: 160px; padding-top: 55px !important; padding-bottom: 55px !important;">
		                    	
		                    	<!-- ====================     << Title >>     ==================== -->
		                    	<h1 class="bold ctm-pgSchool__title" style="color: white; font-size: 40px; margin-bottom: 0; line-height: normal;">热门课程</h1>  <!-- (Chinese) -->
		                    	
		                    </div>
		                </div>

		            </div>
                    
                    <!-- ===============        (theme) educate        =============== -->
                    <section class="main-content blog-posts course-single ctm-pgSchool__section" style="">  <!-- padding:100px -->
			            <div class="container">

                            <!-- 1st Row -->
                            <div class="row">
                                <div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='http://www.ct21.com.cn/newsshow.php?cid=5&id=1132';">
                                    <div class="ctm-boxImg_wrapper">
                                        <div class="ctm-boxImg" style="background-image: url(custom-images/immi/immi_certificate.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;" loading="lazy">
                                            <div class="img_overlay"></div>
                                            <div class="eleTitle">证书文凭</div>
                                        </div>
                                    </div>
                                    <h6 style="margin-top: 10px;">酒店管理和会展管理双高级文凭,居住酒店带薪实习</h6>
                                </div>

                                <div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='http://www.ct21.com.cn/newsshow.php?cid=5&id=1204';">
                                    <div class="ctm-boxImg_wrapper">
                                        <div class="ctm-boxImg" style="background-image: url(custom-logo/logo_Tafe_WSI.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;" loading="lazy">
                                            <div class="img_overlay"></div>
                                            <div class="eleTitle">TAFE课程</div>
                                        </div>
                                    </div>
                                    <h6 style="margin-top: 10px;">超低价澳洲留学移民捷径，幼教、IT、会计等本科学士学学位大学课程<br>3-4年总学费仅澳币4.3万-5.7万</h6>
                                </div>

                                <div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='http://www.ct21.com.cn/newsshow.php?cid=5&id=1132';">
                                    <div class="ctm-boxImg_wrapper">
                                        <div class="ctm-boxImg" style="background-image: url(custom-images/immi/immi_foundation.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;" loading="lazy">
                                            <div class="img_overlay"></div>
                                            <div class="eleTitle">预科课程</div>
                                        </div>
                                    </div>
                                    <h6 style="margin-top: 10px;">超值塔大大学预科课程一年仅$13,596</h6>
                                </div>
                            </div>

                            <!-- 2nd Row -->
                            <div class="row">
                                <div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='http://www.ct21.com.cn/newsshow.php?cid=52&id=1043';">
                                    <div class="ctm-boxImg_wrapper">
                                        <div class="ctm-boxImg" style="background-image: url(custom-images/immi/immi_bachelor.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;" loading="lazy">
                                            <div class="img_overlay"></div>
                                            <div class="eleTitle">本科课程</div>
                                        </div>
                                    </div>
                                    <h6 style="margin-top: 10px;">IT和会计本科学士课程每年学费仅$16,800, IT本科毕业可获一年带薪实习机会</h6>
                                </div>

                                <div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='http://www.ct21.com.cn/newsshow.php?cid=53&id=1063';">
                                    <div class="ctm-boxImg_wrapper">
                                        <div class="ctm-boxImg" style="background-image: url(custom-images/immi/immi_master.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;" loading="lazy">
                                            <div class="img_overlay"></div>
                                            <div class="eleTitle">硕士课程</div>
                                        </div>
                                    </div>
                                    <h6 style="margin-top: 10px;">IT和会计硕士课程每年学费仅$17,800,IT硕士毕业可获一年带薪实习机会</h6>
                                </div>
                            </div>


			            </div><!-- /container -->
			        </section><!-- /main-content -->

			        <!-- ===============        /(theme) educate        =============== -->
                </div>
            </div>
            <div style="padding: 20px 0;"></div>

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

    
    <!-- ==========  [from-ORIGINAL]  ========== -->
    <!-- <script src="./../templates/default/js/jquery.min.js"></script> -->



    <!-- ==========  (custom) JavaScript  ========== -->
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->


    <!-- ====================================================================================== -->
    <!-- ______________________________        Import-CSS        ______________________________ -->
    <!-- ====================================================================================== -->
    
    <!-- ====================  << Icon  >> ==================== -->
    <?php include_once('_dynamic_siteSetting/importCSS_icon.php'); ?>
    
</body>
</html>