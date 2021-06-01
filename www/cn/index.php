<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
//include_once('ext/news.php');
include '_dynamic_siteSetting/directoryLang.php'; /***  '$directory' / '$fType_php' from 'directoryLang.php'  ***/
session_unset();
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>潮流搜索平台</title>
    <!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->

    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
    <?php include_once '_dynamic_siteSetting/icon-setting.php';?>
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


    <!-- (Theme) kingster -->
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />

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
        /*.gdlr-core-item-pdb{ padding-bottom: 15px !important; }*/
        @media only screen and (min-width: 2200px) {  /* 4k */
            #rev_slider_1_1_wrapper{ height: 880px !important; }
            #rev_slider_1_1 { height: 900px !important; }
        }

        /*green line*/
        #custom_greenLine-style-title{ border-color: #027dfa; border-bottom-width: 3px; }
        #custom_greenLine-style{ border-color: #d6d6d6; border-bottom-width: 2px; margin-top: 40px; }

        #div_1dd7_1 {
            display: flex;
            align-items: center; justify-content: center;

            padding: 52px 0;
            padding-bottom: 30px;
        }

        /*floating-TAFE*/
        #floatTAFE{
            position: relative; float: right;
            width: 15%; min-width: 100px;

            margin-top: 3%; margin-right: 5%;

            border-radius: 8px;

            transition: all .5s ease;
            z-index: 50;
        }

        /*tab-button*/
        .box_tab {
            cursor: pointer;
        }
        .box_tab:hover {
            background-color: #1a8cff;
        }

        #div_1dd7_2 {
            padding-bottom: 0;
        }

        /*search-box*/
        .ctm-bgSearch, .ctm-bgSearch_2{
            display: flex;
            align-items: center; justify-content: center;
            height: 450px;
            /*min-height: 350px;*/
        }
        .ctm-bgSearch_overlay {
            display: flex;
            align-items: center; justify-content: center;
            height: 100%;
            /*min-height: 350px;*/
            width: 100%;

            background-color: #192f59 !important;
            opacity: .9;
        }

        /*search-box (migration info)*/
        .ctm-itemList>a, .ctm-itemList>a>span{ color: #bababa !important; }

        /*search-button*/
        .ctm-bgSearch_button {
            background-color: #13336f !important;2F2F2F
        }
        .ctm-bgSearch_button:hover {
            background-color: #2F2F2F !important;
        }

        /*mobile*/
        @media only screen and (max-width: 1330px) {  /* mobile */
            .ctm-boxContent_noSpace { padding-bottom: 0 !important; }
        }
        @media only screen and (max-width: 767px) {  /* mobile */

            #div_1dd7_1 {
                padding: 27px 0;
                padding-bottom: 5px;
            }

            #gdlr-core-wrapper-1{ display: none; }
            #gdlr-core-wrapper-2{ display: none; }

            .ctm-btn5_top{ display: none; }
            .ctm-bgSearch{
                height: 250px;
            }
            .ctm-bgSearch_2{ height: 500px; }

            .ctm-qSearch{ transform: scale(.8); }

            .ctm-boxContent-Inner_noSpace { padding-left: 0 !important; padding-right: 0 !important; }

            .ctm-boxTab_wrap {
                overflow-x: scroll;
            }
            .ctm-boxTab_wrapInner{
                width: max-content;
            }
            .box_tab{
                display: inline-block;
                float: none;
                width: auto;
            }

            .ctm-boxTab_wrap::-webkit-scrollbar {
                height: 1px;               /* width of the entire scrollbar */
            }
            .ctm-boxTab_wrap::-webkit-scrollbar-track { /*background: orange;*/        /* color of the tracking area */ }
            .ctm-boxTab_wrap::-webkit-scrollbar-thumb {
                background-color: ;    /* color of the scroll thumb */
                border-radius: 5px;       /* roundness of the scroll thumb */
                /* creates padding around scroll thumb */
            }
        }

        .ctm-boxContent_wrap{ display: flex; position: absolute; justify-content: center; align-items: center; width: 100%; height: 100%; padding: 10%; }
        .ctm-boxContent_50 { text-align: left; width: 100%; /*position: absolute;*/ /*padding-left: 80px; padding-right: 80px;*/ transition: .2s ease; }
        @media only screen and (max-width: 1100px) {  /* mobile */
            .ctm-boxContent_50 { padding-left: 0; padding-right: 0; }
        }

    </style>
    <!-- ==========  (custom) Style [only this pg]  ========== -->

</head>
<body class="home page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full  kingster-with-sticky-navigation  kingster-blockquote-style-1 gdlr-core-link-to-lightbox">

	<!-- ______________________________        NavBar [mobile]        ______________________________ -->
	<!-- =========================================================================================== -->
    <?php
include_once '_dynamic_siteSetting/navbar-mobile.php';
?>

    <!-- ======================================================================================== -->
	<!-- ______________________________        Body [outer]        ______________________________ -->
	<!-- ======================================================================================== -->
    <div class="kingster-body-outer-wrapper ">
        <div class="kingster-body-wrapper clearfix  kingster-with-frame">

            <!-- ______________________________        NavBar        ______________________________ -->
			<!-- ================================================================================== -->
            <?php include_once '_dynamic_siteSetting/navbar.php';?>

            <!-- ======================================================================================== -->
			<!-- ______________________________        Body [inner]        ______________________________ -->
			<!-- ======================================================================================== -->
            <div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="gdlr-core-page-builder-body">

                    <!-- ===============        (theme) custom        =============== -->
                    <div class="gdlr-core-pbf-wrapper ctm-btn5_top " style="padding: 0px 0px 0px 0px;" loading="lazy">  <!-- padding: 70px 0px 100px 0px; -->
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full-no-space">

                                <!-- 1st Element -->
                                <!-- ====================     << Study Solution >> {1st button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-12 gdlr-core-column-first" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1" style="height: 140px; padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home1_sSolution_q1.jpg) ;background-size: cover ;background-position: center ;background-repeat: no-repeat;" data-parallax-speed="0.1">  <!-- gdlr-core-parallax -->

                                                <!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #0000005c; opacity: .5; backdrop-filter: blur(3px);"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-top: 55px; padding-bottom: 0px !important;">

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 25px; color: white;"></i> 留学方案</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-studySolution.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Element -->
                                <!-- ====================     << Search Course >> {2nd button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-12" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-2" style="height: 140px; padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home2_course_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #0000005c; opacity: .5; backdrop-filter: blur(3px);"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-top: 55px; padding-bottom: 0px !important;">

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <img src="upload/hp2-col-2-icon.png" alt="" width="30" height="30" title="hp2-col-2-icon" /> 课程搜索</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-course.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 3rd Element -->
                                <!-- ====================     << Search School >> {3rd button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-12" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-3" style="height: 140px; padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home3_school_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #0000005c; opacity: .5; backdrop-filter: blur(3px);"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-top: 55px; padding-bottom: 0px !important;">

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <img src="upload/hp2-col-1-icon.png" alt="" width="30" height="30" title="hp2-col-1-icon" /> 院校搜索</h3>
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
                                <div class="gdlr-core-pbf-column gdlr-core-column-12" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-4" style="height: 140px; padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home4_immigration_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #0000005c; opacity: .5; backdrop-filter: blur(3px);"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-top: 55px; padding-bottom: 0px !important;">

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <i class="fa fa-globe" aria-hidden="true" style="font-size: 25px; color: white;"></i> 移民搜索</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-immigration.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 5th Element -->
                                <!-- ====================     << Search Price >> {5th button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-12" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-4" style="height: 140px; padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home5_fees_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                                <!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #0000005c; opacity: .5; backdrop-filter: blur(3px);"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-top: 55px; padding-bottom: 0px !important;">

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <i class="fa fa-usd" aria-hidden="true" style="font-size: 25px; color: white;"></i> 学费搜索</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-fees.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ==========    /Element    ========== -->
                            </div>
                        </div>
                    </div>

                    <!-- ===============        (Upper) Map        =============== -->
                    <div id="map-section">
                    	<div id="map-section_inner">

                            <!-- ====================     << Slider >>     ==================== -->
	                    	<div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
                                <div class="gdlr-core-pbf-background-wrap" style="background-color: #192f59 ;"></div>
                                <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                    <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full-no-space">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-revolution-slider-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 0px ;">

                                                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                                                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
                                                        <ul>
                                                            <!-- ====================     << 1 >>     ==================== -->
                                                            <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="upload/slider-1-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- =====  Image  ===== -->
                                                                <img src="custom-images-slider/slider-1_q10.jpg" alt="" title="slider-1-2" width="1800" height="1119" data-bgposition="center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                <!-- =====  Overlay  ===== -->
                                                                <div class="ctm-overlay_blue"></div>
                                                                <!-- =====  Content  ===== -->
                                                                <div class="tp-caption   tp-resizeme" id="slide-3-layer-1" data-x="38" data-y="center" data-voffset="-146" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 28px; line-height: 33px; font-weight: 300; color: #8dc6ff; letter-spacing: 0px;font-family:Poppins;">功能超强， 专业建议，院校课程检索和选择方案</div>
                                                                <!-- <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-3-layer-4" data-x="33" data-y="center" data-voffset="-44" data-width="['600']" data-height="['118']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":330,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;background-color:rgba(24,36,59,0.9);border-radius:3px 3px 3px 3px;"></div> -->
                                                                <!-- <div class="tp-caption   tp-resizeme" id="slide-3-layer-2" data-x="55" data-y="center" data-voffset="-52" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":360,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 88px; line-height: 88px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Playfair Display;">潮流  <small>Century 21</small></div> -->
                                                                <div class="tp-caption   tp-resizeme" id="slide-3-layer-3" data-x="423" data-y="center" data-voffset="-51" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":360,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; white-space: nowrap; font-size: 88px; line-height: 88px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Playfair Display;"></div>
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="33" data-y="center" data-voffset="-31" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":370,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; /*font-size: 63px; line-height: 83px;*/font-size: 43px; line-height: 50px; font-weight: 600; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">提供澳洲、新西兰院校、课程、学费<br>全面检索，留学方案和移民专业广泛选择</div>
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-3-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":660,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(1,61,135);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 9; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="search-studySolution">留学方案</a></div>
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-3-layer-7" data-x="170" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":660,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(1,61,135);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 9; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="search-course">课程搜索</a></div>
                                                            </li>
                                                            <!-- ====================     << 2 >>     ==================== -->
                                                            <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="upload/slider-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- =====  Image  ===== -->
                                                                <img src="custom-images-slider/slider-2_q10.jpg" alt="" title="slider-2" width="1800" height="1119" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina loading="lazy"> <!-- data-bgposition="center center" -->
                                                                <!-- =====  Overlay  ===== -->
                                                                <div class="ctm-overlay_blue"></div>
                                                                <!-- =====  Content  ===== -->
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="36" data-y="center" data-voffset="-120" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 33px; line-height: 33px; font-weight: 300; color: #8dc6ff; letter-spacing: 0px;font-family:Poppins;">全球首家，澳、新留学移民捷径任您选</div>
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="33" data-y="center" data-voffset="-31" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":370,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; /*font-size: 63px; line-height: 83px;*/font-size: 43px; line-height: 50px; font-weight: 600; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">提供全澳偏远地区和非偏远地区及<br>新西兰之留学移民捷径专业课程全面信息</div>
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-1-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="search-immigration.php">移民搜索</a></div>
                                                            </li>
                                                            <!-- ====================     << 3 >>     ==================== -->
                                                            <li data-index="rs-2" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="upload/slider-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- =====  Image  ===== -->
                                                                <img src="custom-images-slider/slider-3-1_q50.jpg" alt="" title="slider-2" width="1800" height="1119" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina loading="lazy"> <!-- data-bgposition="center center" -->
                                                                <!-- =====  Overlay  ===== -->
                                                                <div class="ctm-overlay_blue"></div>
                                                                <!-- =====  Content  ===== -->
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="36" data-y="center" data-voffset="-120" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 33px; line-height: 33px; font-weight: 300; color: #8dc6ff; letter-spacing: 0px;font-family:Poppins;">留学热门地带</div>
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="33" data-y="center" data-voffset="-31" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":370,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; /*font-size: 63px; line-height: 83px;*/font-size: 50px; line-height: 0px; font-weight: 600; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">提供澳洲、新西兰最热门专业课程和目前最优惠特价课程</div>
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-1-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="info-budget-courses.php">特价课程</a></div>
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-1-layer-6" data-x="170" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="info-popular-courses.php">热门课程</a></div>
                                                            </li>
                                                            <!-- ====================     << 4 >>     ==================== -->
                                                            <li data-index="rs-4" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="upload/slider-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                <!-- =====  Image  ===== -->
                                                                <img src="custom-images-slider/slider-4-1_q50.jpg" alt="" title="slider-2" width="1800" height="1119" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina loading="lazy"> <!-- data-bgposition="center center" -->
                                                                <!-- =====  Overlay  ===== -->
                                                                <div class="ctm-overlay_blue"></div>
                                                                <!-- =====  Content  ===== -->
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="36" data-y="center" data-voffset="-120" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 33px; line-height: 33px; font-weight: 300; color: #8dc6ff; letter-spacing: 0px;font-family:Poppins;">随心所欲，提供最佳搜索体验</div>
                                                                <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="33" data-y="center" data-voffset="-31" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":370,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; /*font-size: 63px; line-height: 83px;*/font-size: 40px; line-height: 42px; font-weight: 600; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">以学生<br>所关注的角度，提供最贴心，<br>最直接的检索方式，结果和方案</div>
                                                                <!-- <div class="tp-caption rev-btn rev-hiddenicon " id="slide-1-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="info-popular-courses.php">热门课程</a></div> -->
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-1-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="search-fees">学费搜索</a></div>
                                                                <div class="tp-caption rev-btn rev-hiddenicon " id="slide-1-layer-6" data-x="170" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 16px; font-weight: 600; color: #2d2d2d; letter-spacing: 0px;font-family:Poppins;background-color:rgb(255,255,255);border-color:rgb(2, 125, 250);border-style:solid;border-width:0px 0px 0px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="search-school">院校搜索</a></div>

                                                            </li>
                                                        </ul>
                                                        <!-- ====================     << TAFE-Logo (floating) >>     ==================== -->
                                                        <a href="school-info.php?id=23">
                                                            <img id="floatTAFE" src="custom-logo/logo_Tafe_WSI.jpg" class="animated bounceIn">
                                                        </a>
                                                        <!-- ====================     << TAFE-Logo (floating) >>     ==================== -->
                                                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- ====================     << 4 Boxes >>     ==================== -->
                            <div class="gdlr-core-pbf-wrapper  hp1-col-services"  data-skin="Blue Title" id="gdlr-core-wrapper-1">
                                <div class="gdlr-core-pbf-background-wrap"></div>
                                <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">

                                    <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full-no-space ctm-boxTab_wrap">
                                        <div class=" gdlr-core-pbf-wrapper-container-inner gdlr-core-item-mglr clearfix ctm-boxTab_wrapInner" id="div_1dd7_0">


                                            <div class="gdlr-core-pbf-column gdlr-core-column-15 gdlr-core-column-first box_tab" id="box_tab1">
                                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " id="div_1dd7_1">
                                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                        <div class="gdlr-core-pbf-element">
                                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" id="div_1dd7_2">
                                                                <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/icon-1.png" alt="" width="40" height="40" title="icon-1" /></div>
                                                                <div class="gdlr-core-column-service-content-wrapper">
                                                                    <div class="gdlr-core-column-service-title-wrap">
                                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" id="h3_1dd7_0">特价/热门课程</h3>
                                                                        <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" id="div_1dd7_3">享受超优惠课程</div>
                                                                        <!-- <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" id="h3_1dd7_0">TAFE WSI</h3>
                                                                        <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" id="div_1dd7_3">新南威尔士TAFE学院</div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-column gdlr-core-column-15 box_tab" id="box_tab2">
                                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " id="div_1dd7_1">
                                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                        <div class="gdlr-core-pbf-element">
                                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" id="div_1dd7_2">
                                                                <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/icon-2.png" alt="" width="44" height="40" title="icon-2" /></div>
                                                                <div class="gdlr-core-column-service-content-wrapper">
                                                                    <div class="gdlr-core-column-service-title-wrap">
                                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" id="h3_1dd7_1">技术移民信息</h3>
                                                                        <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" id="div_1dd7_6">为您提供详尽的移民信息</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-column gdlr-core-column-15 box_tab" id="box_tab3">
                                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " id="div_1dd7_1">
                                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                        <div class="gdlr-core-pbf-element">
                                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" id="div_1dd7_2">
                                                                <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/icon-3.png" alt="" width="44" height="39" title="icon-3" /></div>
                                                                <div class="gdlr-core-column-service-content-wrapper">
                                                                    <div class="gdlr-core-column-service-title-wrap">
                                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" id="h3_1dd7_2">大学专业表现</h3>
                                                                        <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" id="div_1dd7_9">为您提供详尽的大学资讯</div> <!-- 透过热门课程了解趋势 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-column gdlr-core-column-15 box_tab" id="box_tab4">
                                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " id="div_1dd7_1">
                                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                        <div class="gdlr-core-pbf-element">
                                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" id="div_1dd7_2">
                                                                <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/icon-4.png" alt="" width="41" height="41" title="icon-4" /></div>
                                                                <div class="gdlr-core-column-service-content-wrapper">
                                                                    <div class="gdlr-core-column-service-title-wrap">
                                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" id="h3_1dd7_0">快 搜</h3>
                                                                        <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" id="div_1dd7_3">新南威尔士TAFE学院</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- ====================     << Boxes-Content >>     ==================== -->
                            <div class="gdlr-core-pbf-wrapper ctm-boxContent_noSpace" style="padding-bottom: 0; box-shadow: 0px 8px 20px #00000017;" id="gdlr-core-wrapper-2">
                                <div class="gdlr-core-pbf-background-wrap">
                                    <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" id="div_1dd7_13" data-parallax-speed="0.8"></div>
                                </div>
                                <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                    <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container-custom ctm-boxContent-Inner_noSpace">


                                        <!-- << Budget/Popular Course >> -->
                                        <div class="row" id="box_tab1_content" style="" loading="lazy">
                                            <div class="animated fadeIn ctm-bgSearch_2 gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-images/home4_immigration_q1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">

                                                <!-- =====  Overlay  ===== -->
                                                <div class="ctm-bgSearch_overlay"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="ctm-boxContent_wrap">
                                                    <div class="ctm-boxContent_50">
                                                        <h4 style="color: white; margin-bottom: 0; line-height: 36px;">特价课程<br><span id="span_1dd7_0">享受超优惠课程</span></h4>
                                                        <div class="gdlr-core-text-box-item-content" id="div_1dd7_20" style="margin-top: 20px;">
                                                            <p>
                                                                <b>1.</b>「证书」和「文凭课程」, 全年整付仅AU$3,900<br>
                                                                <b>2.</b>「超值英语课程」每周仅$145<br>
                                                                <b>3.</b> 悉尼特价大学预科课程，一年学费仅AU$17,400<br>
                                                                <b>4.</b>「会计PY课程」特价一年学费仅$4,350(原价$6,500-$13,000)
                                                            </p>
                                                        </div>
                                                        <div><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="info-budget-courses.php" id="a_1dd7_0"><span class="gdlr-core-content" >了解更多</span></a></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="animated fadeIn ctm-bgSearch_2 gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-images/home1_sSolution_q1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">

                                                <!-- =====  Overlay  ===== -->
                                                <div class="ctm-bgSearch_overlay" style="background-color: #0062a9 !important;"></div>
                                                <!-- =====  Content  ===== -->
                                                <div class="ctm-boxContent_wrap">
                                                    <div class="ctm-boxContent_50">
                                                        <h4 style="color: white; margin-bottom: 0; line-height: 36px;">热门课程<br><span id="span_1dd7_0" style="color: #192f59;">透过热门课程了解趋势</span></h4>
                                                        <div class="gdlr-core-text-box-item-content" id="div_1dd7_20" style="margin-top: 20px;">
                                                            <p>
                                                                <b>1.</b>「酒店管理」和「会展管理」双高级文凭,居住酒店带薪实习<br>
                                                                <b>2.</b>「超值塔大大学预科课程」一年仅$13,596<br>
                                                                <b>3.</b> IT和会计「本科学士」课程每年学费仅$16,800<br>
                                                                <b>4.</b> IT和会计「硕士课程」每年学费仅$17,800, IT硕士毕业可获一年带薪实习机会
                                                            </p>
                                                        </div>
                                                        <div><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="info-popular-courses.php" id="a_1dd7_0"><span class="gdlr-core-content" >了解更多</span></a></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <!-- << Skilled Migration Info. >> -->
                                        <div class="animated fadeIn ctm-bgSearch" style="display: none; background-image: url(custom-images/home4_immigration_q1.jpg); background-size: cover; background-position: center;" id="box_tab2_content">
                                            <!-- =====  Overlay  ===== -->
                                            <div class="ctm-bgSearch_overlay"></div>
                                            <!-- =====  (Insert) Text Field  ===== -->
                                            <div class="ctm-qSearch" style="text-align: center; width: 100%; position: absolute;">
                                                <h4 style="color: white; margin-bottom: 0; line-height: 36px;">技术移民信息</h4>  <!-- <br><span id="span_1dd7_0" style="color: #bababa;">输入「名称关键字」快速搜索</span> -->
                                                <!-- <input class="ctm-txtField" style="width: 60%; min-width: 320px;" name="courseName" type="text" id="courseName" />
                                                <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb" style="padding-top: 20px;">
                                                    <a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" style="width: 140px; border-radius: 6px;" href="school-info.php?id=23" id="a_1dd7_0"><span class="gdlr-core-content" >搜 索</span></a>
                                                </div> -->

                                                <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="text-align: left; padding: 50px 15% 0;">
                                                    <?php
$id = empty($id) ? 9 : intval($id);

$Db = new MySql(false);
$Db->Execute("SELECT * FROM `#@__infolist` WHERE classid=$id AND delstate='' AND checkinfo=true ORDER BY id DESC, orderid DESC LIMIT 0,4"); //LIMIT 0,8

while ($row = $Db->GetArray()) {
    //获取链接地址
    $gourl = 'info-immigration-article.php?cid=' . $row['id'];
    $time = MyDate('Y-m-d', $row['posttime']);
    // $time='<span class="R1">'.MyDate('Y-m-d', $row['posttime']).'</span>';
    ?>
                                                            <div class="gdlr-core-course-item-list ctm-itemList">
                                                                <a class="gdlr-core-course-item-link" href="<?php echo $gourl; ?>">

                                                                    <span class="gdlr-core-course-item-title gdlr-core-skin-title" style="font-weight: bold;"><?php echo (ReStrLen($row['title'], 30)); ?></span>
                                                                    <dateArrow><span style="float: right;" ><?php echo $time; ?></span><i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" style="font-size: 16px;" ></i></dateArrow>

                                                                </a>
                                                            </div>
                                                    <?php
}
?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- << Quick-Search (School) >> -->
                                        <div class="animated fadeIn ctm-bgSearch" style="display: none; background-image: url(custom-images/home3_school_q1.jpg); background-size: cover; background-position: center;" id="box_tab3_content">
                                            <!-- =====  Overlay  ===== -->
                                            <div class="ctm-bgSearch_overlay"></div>
                                            <!-- =====  (Insert) Text Field  ===== -->
                                            <div class="ctm-qSearch" style="text-align: center; width: 100%; position: absolute;">
                                                <h4 style="color: white; margin-bottom: 0; line-height: 36px;">大学专业表现<br><span id="span_1dd7_0" style="color: #bababa;">为您提供详尽的大学资讯</span></h4>
                                                <!-- <input class="ctm-txtField" style="width: 60%; min-width: 320px;" name="courseName" type="text" id="courseName" />
                                                <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb" style="padding-top: 20px;">
                                                    <a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" style="width: 140px; border-radius: 6px;" href="school-info.php?id=23" id="a_1dd7_0"><span class="gdlr-core-content" >搜 索</span></a>
                                                </div> -->
                                                <?php $toFile = 'info-university-ranking';?>

                                                <form action="<?php echo $toFile . $fType_php; ?>" method="post">
                                                    <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb" style="padding-top: 20px;">
                                                        <button id="" type="submit" class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" style="width: 140px; border: 0; border-radius: 6px; cursor: pointer;">了解更多</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- << Quick-Search (Course) >> -->
                                        <div class="animated fadeIn ctm-bgSearch" style="display: none; background-image: url(custom-images/home2_course_q1.jpg); background-size: cover; background-position: center;" id="box_tab4_content" loading="lazy">
                                            <!-- =====  Overlay  ===== -->
                                            <div class="ctm-bgSearch_overlay" style="background-color: #0062a9 !important;"></div> <!-- #0054a9 -->
                                            <!-- =====  (Insert) Text Field  ===== -->
                                            <div class="ctm-qSearch" style="text-align: center; width: 100%; position: absolute;">
                                                <h4 style="color: white; margin-bottom: 0; line-height: 36px;">课程快搜<br><span id="span_1dd7_0" style="color: #bababa;">输入「名称关键字」快速搜索</span></h4>

                                                <?php $toFile = 'search-course__result';?>
                                                <form action="<?php echo $toFile . $fType_php; ?>" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" >

                                                    <input class="ctm-txtField" style="width: 60%; min-width: 320px;" name="courseName" id="courseName" type="text" />

                                                    <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb" style="padding-top: 20px;">
                                                        <button id="btnSearch" type="submit" class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" style="width: 140px; border: 0; border-radius: 6px; cursor: pointer;">搜 索</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- << TAFE >> -->
                                        <!-- <div class="row" id="box_tab4_content" style="display: none;" loading="lazy">

                                            <div class="animated fadeIn ctm-bgSearch gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-logo/logo_Tafe_WSI.jpg); background-size: contain; background-repeat: no-repeat; background-position: center;"></div>

                                            <div class="animated fadeIn ctm-bgSearch gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-images/school-TAFE_pic1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;"> -->

                                                <!-- =====  Overlay  ===== -->
                                                <!-- <div class="ctm-bgSearch_overlay"></div> -->
                                                <!-- =====  (Insert) Text Field  ===== -->
                                                <!-- <div class="ctm-boxContent_wrap">
                                                    <div class="ctm-boxContent_50">
                                                        <h4 style="color: white; margin-bottom: 0; line-height: 36px;">TAFE 学院<br><span id="span_1dd7_0">每年多项课程都在2月开课</span></h4>
                                                        <div class="gdlr-core-text-box-item-content" id="div_1dd7_20" style="margin-top: 20px;">
                                                            <p>隶属新南威尔士州教育部，由政府拥有及管理。 通过学习TAFE课程，学生可以接触世界各地的文化,互相交流。TAFE  NSW也非常关注不同文化背景的海外留学生的个别需要，在他们的学习过程中给予个别辅导。</p>
                                                        </div>
                                                        <div><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="school-info.php?id=23" id="a_1dd7_0"><span class="gdlr-core-content" >了解更多</span></a></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div> -->

                                    </div>
                                </div>
                            </div>

                    	</div>
                    </div>

                    <div class="ctm-boxContent_noSpace" style="padding-bottom: 135px;"></div>

                    <!-- ================================================================================================== -->
                    <!-- ______________________________        (Lower) Search Buttons        ______________________________ -->
                    <!-- ================================================================================================== -->
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;" loading="lazy">  <!-- padding: 70px 0px 100px 0px; -->
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full-no-space">

                                <!-- 1st Element -->
                                <!-- ====================     << Study Solution >> {1st button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-1 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>  <!-- data-sync-height="column-height"  -->
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home1_sSolution_q1.jpg) ;background-size: cover ;background-position: center ;background-repeat: no-repeat;" data-parallax-speed="0.1">  <!-- gdlr-core-parallax -->

                                            	<!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #000000a8; opacity: .5;"></div>
                                                <!-- =====  Content  ===== -->
                                            	<div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <!-- <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-4-icon.png" alt="" width="41" height="41" title="hp2-col-4-icon" /></div> -->
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 40px; color: white;"></i></div>

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">留学方案</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">根据您的学历选择留学方案</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-studySolution.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Element -->
                                <!-- ====================     << Search Course >> {2nd button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-2 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home2_course_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                            	<!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #000000a8; opacity: .5;"></div>
                                                <!-- =====  Content  ===== -->
                                            	<div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-2-icon.png" alt="" width="49" height="45" title="hp2-col-2-icon" /></div>

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">课程搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳大利亚教育机构提供的课程</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-course.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 3rd Element -->
                                <!-- ====================     << Search School >> {3rd button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-3 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home3_school_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                            	<!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #000000a8; opacity: .5;"></div>
                                                <!-- =====  Content  ===== -->
                                            	<div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-1-icon.png" alt="" width="40" height="40" title="hp2-col-1-icon" /></div>

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
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
                                <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-4 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                            <!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home4_immigration_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                            	<!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #000000a8; opacity: .5;"></div>
                                                <!-- =====  Content  ===== -->
                                            	<div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <!-- <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="upload/hp2-col-4-icon.png" alt="" width="41" height="41" title="hp2-col-4-icon" /></div> -->
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><i class="fa fa-globe" aria-hidden="true" style="font-size: 40px; color: white;"></i></div>

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">移民搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳洲移民课程</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-immigration.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- 5th Element -->
                                <!-- ====================     << Search Price >> {5th button}     ==================== -->
                                <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Column White">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  slider-link-4 ctm-lowerSection__searchBtn" style="padding: 70px 0px 70px 0px;" data-sync-height-center>
                                        <div class="gdlr-core-pbf-background-wrap">

                                        	<!-- =====  Background-Image  ===== -->
                                            <div class="gdlr-core-pbf-background gdlr-core-js ctm-lowerSection__searchBtn_img" style="background-image: url(custom-images/home5_fees_q1.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1">

                                            	<!-- =====  Overlay  ===== -->
                                                <div style="position: absolute; width: 100%; height: 100%; background-color: #000000a8; opacity: .5;"></div>
                                                <!-- =====  Content  ===== -->
                                            	<div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-with-caption gdlr-core-item-pdlr ctm-lowerSection__searchBtn_txt" style="padding-bottom: 0px !important;">
                                                    <!-- <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><img src="custom-icon/icon-dollar-48.png" alt="" width="41" height="41" title="hp2-col-4-icon" /></div> -->
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-bottom: 20px;"><i class="fa fa-usd" aria-hidden="true" style="font-size: 40px; color: white;"></i></div>

                                                    <div class="gdlr-core-column-service-content-wrapper" style="position: relative;">
                                                        <div class="gdlr-core-column-service-title-wrap">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">学费搜索</h3>
                                                            <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-weight: 500 ;font-style: normal ;">搜索澳洲课程学费</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- =====  Link Direction  ===== -->
                                                <a class="gdlr-core-pbf-column-link" href="../cn/search-fees.php" target="_self"></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ==========    /Element    ========== -->
                            </div>
                        </div>
                    </div>

                    <!-- <div style="margin-top: 50px;"></div> -->

			        <!-- ===============        /(theme) custom        =============== -->

                    <!-- ===============        (Pop-up) Search Result        =============== -->
                    <div id="Result_Background" class="custom-overlay--hidden">

                        <div id="Result_Frame" class="custom-popup__Frame--hidden">
                          <div id="Result_Content" class="custom-popup__content">


                            <div id="Result_Close" class="custom-popup__close-bar">
                              <span>X</span>
                            </div>

                            <iframe name="Result_Popup" id="Result_Popup" style="border-radius: 10px;" frameborder="0" width="100%" height="100%" src=""  ></iframe>


                          </div>
                        </div>

                    </div>
                    <!-- ===============        /(Pop-up) Search Result        =============== -->

                </div>
            </div>

            <!-- ================================================================================== -->
			<!-- ______________________________        Footer        ______________________________ -->
			<!-- ================================================================================== -->
            <?php include_once '_dynamic_siteSetting/footer.php';?>

            <!-- ============================================================================================== -->
			<!-- ______________________________        (end) Body [outer]        ______________________________ -->
			<!-- ============================================================================================== -->
        </div>
    </div>


    <script type='text/javascript' src='kingster-js/jquery/jquery.js'></script>
    <script type='text/javascript' src='kingster-js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='kingster-plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='kingster-plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js'></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- <script type="text/javascript" src="kingster-plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js"></script> -->


    <!-- <script type='text/javascript' src='kingster-plugins/goodlayers-core/plugins/combine/script.js'></script> -->
    <script type='text/javascript' src='kingster-plugins/goodlayers-core/include/js/page-builder.js'></script>
    <script type='text/javascript' src='kingster-js/jquery/ui/effect.min.js'></script>
    <script type='text/javascript' src='kingster-js/plugins.min.js'></script>



    <!-- ==========  (custom) JavaScript  ========== -->
    <script type="text/javascript" src="custom-code__js/search-animation__popupWin.js"></script>
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->


    <!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Map        ______________________________ -->
	<!-- ======================================================================================== -->
    <script type="text/javascript" src="custom-code__js/map-function__home.js"></script>

    <script>
        /** ==== (Animate) Float-TAFE ==== **/
        jQuery('#floatTAFE').ready(function(){
            jQuery('#floatTAFE').css({'width': '20%'});
            setTimeout(function(){
                jQuery('#floatTAFE').css({'width': ''});
            }, 1000, 'swing');
        });

        jQuery('#floatTAFE').hover(function(){
            jQuery('#floatTAFE').css({'width': '20%'});
        }, function(){
            jQuery('#floatTAFE').css({'width': ''});
        });

    	/** ==== (Initial) Map Color ==== **/
    	stateToDark__init();
    	//loadWith_Dark();

    	/** ==== (Initial) Size [map & buttons] ==== **/
    	var w = window.innerWidth /2;
		var h = window.innerHeight *0.8;

    	// responsive_Map(w, h);
    	responsive_LowerSection();

    	//responsive_Scroll_Size();

    	// function responsive_Scroll_Size(){
    	// 	/** ==== Scrolling | Resizing ==== **/
	    // 	// jQuery(window).on("load resize"/**scroll**/,function() {
     //        jQuery(window).resize(function() {

	    // 		w = window.innerWidth /2;
     //            h = window.innerHeight *0.8;

     //            if (w > 630){
     //                /** == (Upper) Map == **/
     //                responsive_Map(w, h);

     //                /** == (Lower) Search [buttons] == **/
     //                responsive_LowerSection();
     //            }
	    // 	});
    	// }

    	/** ====  (Function) Upper-Map  ==== **/
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

    		/** [calculate margin] buttons Height **/
    		var btnSearch_H = (jQuery('.ctm-lowerSection__searchBtn').width() /16) *10;
			jQuery('.ctm-lowerSection__searchBtn').css( {'height': btnSearch_H} );

			/** [calculate padding] to set text [to center] **/
			var btnSearch_txt_padding = (btnSearch_H - jQuery('.ctm-lowerSection__searchBtn_txt').height()) /2;
			jQuery('.ctm-lowerSection__searchBtn_txt').css( {'padding-top': btnSearch_txt_padding} );
    	}
    </script>

    <!-- =============================================================================================== -->
    <!-- ______________________________        (custom) Tab-button        ______________________________ -->
    <!-- =============================================================================================== -->
    <script type="text/javascript">

        var btnTab_all = [jQuery('#box_tab1'), jQuery('#box_tab2'), jQuery('#box_tab3'), jQuery('#box_tab4')];
        var tab_content = [jQuery('#box_tab1_content'), jQuery('#box_tab2_content'), jQuery('#box_tab3_content'), jQuery('#box_tab4_content')];

        allContent_hide(tab_content);
        tab_content[0].show();
        tabSwitch(btnTab_all);

        function tabSwitch(btnTab_id) {
            jQuery.each(btnTab_id, function(index, value){
                this.click(function(mouseI, mouseV){

                    //  hide current page
                    jQuery.each(tab_content, function(cI, cV){
                        this.hide();
                    });

                    //  show target page
                    tab_content[index].show();
                    // tab_content[index].addClass('animated fadeInLeft');
                });
            });
        }

        function allContent_hide(btnTab_all){
            jQuery.each(btnTab_all, function(index, value){
                this.hide();
            });
        }

    </script>

    <!-- ==================================================================================== -->
    <!-- ______________________________        Template        ______________________________ -->
    <!-- ==================================================================================== -->
    <script type="text/javascript">
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
	</script>
</body>
</html>