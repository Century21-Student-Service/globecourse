<?php session_start();
require_once(dirname(__FILE__).'./../include/config.inc.php');
//include_once('ext/news.php');
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
                    
                    <!-- ===============        (Upper) Map        =============== -->
                    <div id="map-section">
                    	<div id="map-section_inner">
                    		<!-- ====================     << Map >>     ==================== -->
	                    	<?php include('map.php'); ?>
	                    	<!-- ====================     << Map >>     ==================== -->

	                    	<div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container" style="display: block;">
	                    		<img src="custom-images/map-Aus_pureLight.png" width="60px" height="60px" class="custom-mapState_button" title="原始" id="mapBtn_Light">
	                    		<img src="custom-images/map-Aus_pureBlueTxt.png" width="60px" height="60px" class="custom-mapState_button" title="全显示" id="mapBtn_Dark">
	                    	</div>
                    	</div>
                    </div>
                    <!-- ===============        (Lower) Search Buttons        =============== -->

                    <div class="gdlr-core-pbf-wrapper ctm-lowerSection" style="margin: 0px 0px 0px 0px;padding: 50px 50px 50px 50px; min-height: 800px;">
                    	<div class="gdlr-core-pbf-background-wrap">
                    		<div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(custom-images/home_landscape-photography-of-lighted-city_overlay_slim.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 1258.8px; transform: translate(0px, -88px);" data-parallax-speed="0.8">
                    			
                    		</div>
                    	</div>

                    	<div class="gdlr-core-pbf-wrapper-content gdlr-core-js ctm-lowerSection__searchBtn_All" style="">
                    		<div class="gdlr-core-pbf-wrapper-container clearfix"> <!-- gdlr-core-container -->
                    			<!-- 1st Element -->
                                <!-- ====================     << Study Solution >> {1st button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-10 gdlr-core-column-first ctm-section__searchBtn" style="" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap ctm-lowerSection__searchBtn_frame">
                                            
                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home_smiling-students-discussing-day-in-college_overlay.jpg) ;background-size: cover ;background-position: center ;background-repeat: no-repeat;" data-parallax-speed="0.1">  <!-- gdlr-core-parallax -->

                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <!-- <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-4-icon.png" alt="" width="41" height="41" title="hp2-col-4-icon" /></div> -->
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 40px; color: white;"></i></div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">留学方案</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">根据您的学历选择留学方案</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="#" target="_self"></a>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Element -->
                                <!-- ====================     << Search Course >> {2nd button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-10 ctm-section__searchBtn" style="" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap ctm-lowerSection__searchBtn_frame">
                                            
                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home_auditorium-benches-chairs-class_overlay.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-2-icon.png" alt="" width="49" height="45" title="hp2-col-2-icon" /></div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">课程搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳大利亚教育机构提供的课程</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="#" target="_self"></a>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 3rd Element -->
                                <!-- ====================     << Search School >> {3rd button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-10 ctm-section__searchBtn" style="" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap ctm-lowerSection__searchBtn_frame">
                                            
                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home_usyd_overlay.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-1-icon.png" alt="" width="40" height="40" title="hp2-col-1-icon" /></div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">院校搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳大利亚的教育机构</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-school.php" target="_self"></a>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 4th Element -->
                                <!-- ====================     << Search Immigration >> {4th button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-10 ctm-section__searchBtn" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap ctm-lowerSection__searchBtn_frame">
                                            
                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home_city-buildings-aerial-photography_overlay.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <!-- <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-4-icon.png" alt="" width="41" height="41" title="hp2-col-4-icon" /></div> -->
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><i class="fa fa-globe" aria-hidden="true" style="font-size: 40px; color: white;"></i></div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">移民搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳洲移民课程</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="#" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 5th Element -->
                                <!-- ====================     << Search Price >> {5th button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-10 ctm-section__searchBtn" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap ctm-lowerSection__searchBtn_frame">
                                            
                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home_school-fees_overlay.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">
                                                
                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <!-- <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="custom-icon/icon-dollar-48.png" alt="" width="41" height="41" title="hp2-col-4-icon" /></div> -->
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><i class="fa fa-usd" aria-hidden="true" style="font-size: 40px; color: white;"></i></div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">学费搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳洲课程学费</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="#" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>



                    		</div>
                    	</div>
                    </div>

			        <!-- ===============        /(theme) custom        =============== -->
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
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->


    <!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Map        ______________________________ -->
	<!-- ======================================================================================== -->
    <script type="text/javascript" src="custom-code__js/map-function.js"></script>

    <script>

        var w = window.innerWidth /2;
        var h = window.innerHeight *0.6;

        responsive_Map(w, h);
        responsive_LowerSection();

        //responsive_Scroll_Size();

        function responsive_Scroll_Size(){
            /** ==== Scrolling | Resizing ==== **/
            jQuery(window).on("load resize scroll",function() {
                
                /** == (Upper) Map == **/
                w = window.innerWidth /2;
                h = window.innerHeight *0.6;

                responsive_Map(w, h);

                /** == (Lower) Search [buttons] == **/
                btnSearch_W = (jQuery('.ctm-lowerSection__searchBtn').width() /16) *10;
                jQuery('.ctm-lowerSection__searchBtn').css( {'height': btnSearch_W} );
            });
        }


        function responsive_Map(w, h){

            /** [set] Map Frame Height **/
            var section_H = window.innerHeight *0.9;
            
            /** [calculate margin] to set position [to center] **/
            var empty_Margin = jQuery('#map-section').height() - jQuery('#map-section_inner').height();
            var usable_Margin = empty_Margin /2;

            jQuery('#map-section').css( {'height': section_H} );
            jQuery('#map-section_inner').css( {'padding-top': usable_Margin, 'padding-bottom': usable_Margin} );
            jQuery('.ctm-map-svg').css( {'margin-right': '', 'margin': '0 auto'} );
            
            /** [set] Map Size **/
            if (w > 630){
                jQuery('.ctm-map-svg').css( {'width': '', 'height': h, 'padding': '5%'} );
            }
            if (w < 630){
                var w2 = (w /7.5) *16;
                jQuery('.ctm-map-svg').css( {'width': w2, 'height': h, 'padding-right': '5%'} );
            }
        }

        /** ====  (Function) Lower-Buttons  ==== **/
        function responsive_LowerSection(){

            var searchBtnAll_pos = (jQuery('.ctm-lowerSection').height() - jQuery('.ctm-lowerSection__searchBtn_All').height()) /2;
            jQuery('.ctm-lowerSection').css( {'padding-top': searchBtnAll_pos, 'padding-bottom': searchBtnAll_pos} );

            jQuery('.ctm-lowerSection__searchBtn_frame').css( {'border-radius': '20px'} );

            /** [calculate margin] buttons Height **/
            var btnSearch_H = (jQuery('.ctm-lowerSection__searchBtn').width() /16) *10;
            jQuery('.ctm-lowerSection__searchBtn').css( {'height': btnSearch_H} );

            /** [calculate padding] to set text [to center] **/
            var btnSearch_txt_padding = (btnSearch_H - jQuery('.ctm-lowerSection__searchBtn_txt').height()) /2;
            jQuery('.ctm-lowerSection__searchBtn_txt').css( {'padding-top': btnSearch_txt_padding} );
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