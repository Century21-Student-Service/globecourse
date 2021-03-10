<?php session_start();
  require_once(dirname(__FILE__).'./../include/config.inc.php'); 
  include_once('./../ext/news.php');

  $id = empty($id) ? 9 : intval($id);
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>澳洲大学排名和专业表现 | 潮流搜索平台</title>
    <!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->
    
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
    <?php include_once('_dynamic_siteSetting/icon-setting.php'); ?>
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


    <!-- (Theme) kingster -->
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="educate-stylesheets/bootstrap.css" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="educate-stylesheets/style.css">

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
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/radio-box.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/drop-down.css">
    <link rel="stylesheet" type="text/css" href="custom-css/tab-box.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/map-effect.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/table.css">

    
    <!-- ==========  (custom) Style [only this pg]  ========== -->
    <style type="text/css">
        .ctm-table__container {
            box-shadow: 0px 0px 15px #e7e7e7;
            margin-left: 20px;
            margin-right: 20px;
        }

    	@media only screen and (max-width: 1200px) {  /*mobile*/
    		.ctm-pgSchool__section {
    			padding: 50px 0 !important;
    		}
    	}
    	@media only screen and (max-width: 995px) {  /*mobile*/
    		.row {
    			margin-left: 0 !important;
    			margin-right: 0 !important;
    		}
    	}
    	@media only screen and (max-width: 680px) {  /*mobile*/
    		.row{
    			margin: 0 !important;
    			padding: 20px !important;
    		}

    		.widget-categories>div {
    			padding-top: 30px !important;
    			padding-bottom: 30px !important;
    		}

    		dateArrow {
    			display: none;
    		}
    	}
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
                    
                    <!-- ============================================================================================== -->
                    <!-- ===================================        [Header]        =================================== -->
                    <!-- ============================================================================================== -->
                    <div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url(custom-images/home4_immigration_q1.jpg);" loading="lazy">  <!-- [Background-Image] -->

		                <!-- ========================================     << Overlay >>     ======================================== -->
		                <div class="kingster-header-transparent-substitute"></div>
		                <div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div>
		                <div class="kingster-page-title-overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, .6)); opacity: .8;"></div>

		                
		                <div class="kingster-page-title-container kingster-container">
		                    <div class="kingster-page-title-content kingster-item-pdlr ctm-header__content" style="height: 160px; padding-top: 55px !important; padding-bottom: 55px !important;">
		                    	
		                    	<!-- ====================     << Title >>     ==================== -->
		                    	<h1 class="bold ctm-pgSchool__title" style="color: white; font-size: 40px; margin-bottom: 0; line-height: normal;">澳洲大学排名和专业表现</h1>  <!-- (Chinese) -->
		                    	
		                    </div>
		                </div>

		            </div>
                    
                    <!-- ===============        (theme) educate        =============== -->
                    <section class="main-content blog-posts course-single ctm-pgSchool__section" style="">  <!-- padding:100px -->
			            <div class="container">

                            <div class="row" style="margin-bottom: 20px;">
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <select name="rankYr" class="dropdown_100" id="rankYr" style="text-align: center; padding: 12px;">
                                        <option value="0" id="rankYr_option">2011年</option>
                                        <option value="1" id="rankYr_option">2015年</option>
                                        <option value="2" id="rankYr_option">2018年</option>
                                    </select>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <select name="2011Rank" class="dropdown_100" id="2011Rank" style="text-align: center; padding: 12px;">
                                        <option value="0" id="rankBy_builtYr">按「建校时间」排名</option>
                                        <option value="1" id="rankBy_area">按「地区分类」排名</option>
                                        <option value="2" id="rankBy_builtYr">按「学生向往程度」排名</option>
                                        <option value="3" id="rankBy_builtYr">按「入学方便程度」排名</option>
                                    </select>
                                </div>
                            </div>

                            <!-- =========================================================================================== -->
                            <!-- ______________________________        by [Built-Year]        ______________________________ -->
                            <!-- =========================================================================================== -->
                            <div class="animated slideInUp row" id="rankBy_builtYr-row" loading="lazy">
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1">大学名称</div>
                                            <div class="ctm-table__col ctm-table__2col-1">建校年份</div>
                                        </li>

                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">悉尼大学 (The University of Sydney)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1851年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">墨尔本大学 (The University of Melbourne)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1853年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚联邦大学 (Federation University Australia) - 前身: 巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1870年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">阿德莱德大学 (The University of Adelaide)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1874年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">塔斯马尼亚大学 (The University of Tasmania)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1890年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰大学 (The University of Queensland)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1909年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">西澳大学 (The University of Western Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1911年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚国立大学 (The Australian National University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1946年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士大学 (University of New South Wales)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1949年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新英格兰大学 (The University of New England)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1954年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">莫纳什大学 (Monash University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1958年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">拉筹伯大学 (La Trobe University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1964年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">麦考瑞大学 (Macquarie University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1964年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">纽卡斯尔大学 (The University of Newcastle)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1965年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">弗林德斯大学 (Flinders University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1966年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">詹姆斯·库克大学 (James Cook University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1970年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">格里芬斯大学 (Griffith University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1971年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">默多克大学 (Murdoch University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1973年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">迪肯大学 (Deakin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1974年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">伍伦贡大学 (The University of Wollongong)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1975年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">科廷大学 (Curtin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1987年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">查尔斯·达尔文大学 (Charles Darwin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1988年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰科技大学 (The Queensland University of Technology)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1988年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">邦德大学 (Bond University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1989年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">西悉尼大学 (Western Sydney University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1989年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳洲圣玛丽亚大学 (The University of Notre Dame Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1989年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">堪培拉大学 (The University of Canberra)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1990年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">查尔斯特大学 (Charles Sturt University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1990年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">悉尼科技大学 (The University of Technology Sydney)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1990年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚天主教大学 (Australian Catholic University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1991年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">埃迪斯科文大学 (Edith Cowan University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1991年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南澳大学 (The University of South Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1991年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">中央昆士兰大学 (Central Queensland University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1992年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">墨尔本理工大学 (Royal Melbourne Institute of Technology University 又名: RMIT University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1992年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">斯威本科技大学 (Swinburne University of Technology)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1992年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南昆士兰大学 (The University of Southern Queensland)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1992年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚大学 (Victoria University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1992年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南极星大学 (Southern Cross University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1994年</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">阳光海岸大学 (The University of The Sunshine Coast)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">1999年</div>
                                            </li>
                                    </ul>

                                </div>
                            </div>


                            <!-- ===================================================================================== -->
                            <!-- ______________________________        by [Area]        ______________________________ -->
                            <!-- ===================================================================================== -->
                            <div class="animated slideInUp row" id="rankBy_area-row" loading="lazy">
                                <!-- ====================     << 城市大学 >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">主要城市学校</div>
                                        </li>

                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚天主教大学 (Australian Catholic University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">阿德莱德大学 (The University of Adelaide)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南澳</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚国立大学 (The Australian National University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">堪培拉</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">弗林德斯大学 (Flinders University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南澳</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">麦考瑞大学 (Macquarie University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">墨尔本大学 (The University of Melbourne)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">默多克大学 (Murdoch University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">西澳</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">墨尔本理工大学 (Royal Melbourne Institute of Technology University 又名: RMIT University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰大学 (The University of Queensland)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰科技大学 (The Queensland University of Technology)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">斯威本科技大学 (Swinburne University of Technology)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">悉尼大学 (The University of Sydney)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士大学 (University of New South Wales)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">悉尼科技大学 (The University of Technology Sydney)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">西澳大学 (The University of Western Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">西澳</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚大学 (Victoria University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                    </ul>
                                    
                                </div>

                                <div style="margin-top: 60px;"></div>

                                <!-- ====================     << 地方大学 >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">地方大学</div>
                                        </li>

                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚联邦大学 (Federation University Australia) - 前身: 巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">邦德大学 (Bond University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">查尔斯·达尔文大学 (Charles Darwin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">北领地</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">查尔斯特大学 (Charles Sturt University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">詹姆斯·库克大学 (James Cook University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">纽卡斯尔大学 (The University of Newcastle)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南极星大学 (Southern Cross University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">阳光海岸大学 (The University of The Sunshine Coast)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新英格兰大学 (The University of New England)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南昆士兰大学 (The University of Southern Queensland)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">伍伦贡大学 (The University of Wollongong)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                    </ul>
                                    
                                </div>

                                <div style="margin-top: 60px;"></div>

                                <!-- ====================     << 城市大学/地方大学 >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;"> 既是城市大学又是地方大学 </div>
                                        </li>
                                            
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">中央昆士兰大学 (Central Queensland University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">科廷大学 (Curtin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">迪肯大学 (Deakin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">埃迪斯科文大学 (Edith Cowan University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">拉筹伯大学 (La Trobe University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">莫纳什大学 (Monash University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳洲圣玛丽亚大学 (The University of Notre Dame Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">塔斯马尼亚大学 (The University of Tasmania)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">塔斯马尼亚</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南澳大学 (The University of South Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南澳</div>
                                            </li>
                                    </ul>
                                    
                                </div>
                            </div>


                            <!-- ================================================================================================== -->
                            <!-- ______________________________        by [Student-Favourite]        ______________________________ -->
                            <!-- ================================================================================================== -->
                            <div class="animated slideInUp row" id="rankBy_stuFav-row" loading="lazy">
                                <!-- ====================     << 5 stars >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked" style="font-size: larger;"></span>
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                                <span class="fa fa-star checked" style="font-size: larger;"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                        </li>

                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚心理学院 (Australian College of Applied Psychology)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚国立艺术学院 (National Institute of Dramatic Art)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚国际音乐学院 (Australian International Conservatorium of Music)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">大洋洲工艺教育学院 (Oceania College of Technology)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚坎培恩大学 (Campion College Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">音频工程学院 (SAE Institute Sydney)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">查尔斯特大学 (Charles Sturt University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南方自然疗法学院 (Southern School of Natural Therapies)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">詹森·纽曼心理咨询和应用心理治疗学院 (Jansen Newman Institute)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">泰伯学院 (Tabor College)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">白宫设计学院 (Whitehouse Institute of Design)</div>
                                                <!-- <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">泰伯学院 (Tabor College)</div> -->
                                            </li>
                                    </ul>
                                    
                                </div>

                                <div style="margin-top: 60px;"></div>

                                <!-- ====================     << 4 stars >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">
                                                <span class="fa fa-star checked" style="font-size: larger;"></span>
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                                <span class="fa fa-star checked" style="font-size: larger;"></span>
                                            </div>
                                        </li>
                                            
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚音乐学院 (The Australian Institute of Music)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">斯威本科技大学 (Swinburne University of Technology)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">查尔斯·达尔文大学 (Charles Darwin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳洲维多利亚技术与继续教育学院 (Technical And Further Education 简称: TAFE)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">埃迪斯科文大学 (Edith Cowan University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">塔斯马尼亚大学 (The University of Tasmania)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">麦考瑞大学 (Macquarie University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新英格兰大学 (The University of New England)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">默多克大学 (Murdoch University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南昆士兰大学 (University of Southern Queensland)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳洲圣玛丽亚大学 (The University of Notre Dame Australia)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">西悉尼大学 (Western Sydney University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰数字媒体学院 (SAE QANTM Creative Media Institute)</div>
                                                <!-- <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">新南威尔士州</div> -->
                                            </li>
                                    </ul>
                                    
                                </div>

                                <div style="margin-top: 60px;"></div>

                                <!-- ====================     << 3 stars >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">
                                                <span class="fa fa-star checked" style="font-size: larger;"></span>
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                                <span class="fa fa-star checked" style="font-size: larger;"></span>
                                            </div>
                                        </li>
                                            
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">阿德莱德中央艺术学院 (Adelaide Central School of Art)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">霍尔姆斯学院 (Holmes Institute)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">堪培拉大学 (The University of Canberra)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">纽卡斯尔大学 (The University of Newcastle)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">基督教传统学院 (Christian Heritage College)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">来福士设计和商业学院 (Raffles Design Institute)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">中央昆士兰大学 (Central Queensland University - CQU)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">南澳大学 (The University of South Australia)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">科廷大学 (Curtin University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">悉尼科技大学 (The University of Technology Sydney)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">弗林德斯大学 (Flinders University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">维多利亚大学 (Victoria University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">格里菲斯大学 (Griffith University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">卧龙岗大学/伍伦贡大学 (The University of Wollongong)</div>
                                            </li>
                                    </ul>
                                    
                                </div>

                                <div style="margin-top: 60px;"></div>

                                <!-- ====================     << 2 stars >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                            </div>
                                        </li>
                                            
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚设计学院 (Australian Academy of Design - AAD)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">拉筹伯大学 (La Trobe University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">澳大利亚天主教大学 (Australian Catholic University)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">昆士兰科技大学 (The Queensland University of Technology - QUT)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">堪培拉大学 (The University of Canberra)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 纽卡斯尔大学 (The University of Newcastle)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                    </ul>
                                    
                                </div>

                                <div style="margin-top: 60px;"></div>

                                <!-- ====================     << 1 stars >>     ==================== -->
                                <div class="ctm-table__container">

                                    <ul class="ctm__responsive-table">
                                        <li class="ctm-table__header">
                                            <div class="ctm-table__col ctm-table__2col-1" style="text-align: center; flex-basis: 100%; padding-right: 3%; font-size: 18px;">
                                                <span class="fa fa-star checked" style="font-size: x-large;"></span>
                                            </div>
                                        </li>
                                            
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">阿德莱德中央艺术学院 (Adelaide Central School of Art)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">霍尔姆斯学院 (Holmes Institute)</div>
                                            </li>
                                            <li class="ctm-table__row" onclick="">
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label="">巴拉特大学 (The University of Ballarat)</div>
                                                <div class="ctm-table__col ctm-table__2col-1 ctm-table__col-1" data-label=""> 詹姆斯·库克大学 (James Cook University)</div>
                                            </li>
                                    </ul>
                                    
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
    <script src="./../templates/default/js/jquery.min.js"></script>



    <!-- ==========  (custom) JavaScript  ========== -->
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->

    <script type="text/javascript">
        const rankVal = [0, 1, 2, 3];
        const rankRow = [$('#rankBy_builtYr-row'), $('#rankBy_area-row'), $('#rankBy_stuFav-row')];

        $.each(rankRow, function(index, value){
            if (index != 0)
                this.hide();
        });

        $('select[name="2011Rank"]').change(function(){
            
            $.each(rankVal, function(index, value){
                if ($('#2011Rank').val() == value){

                    allContent_hide(rankRow);
                    $.each(rankRow, function(i, v){
                        if (index == i)
                            this.show();
                    });

                }
            });

        });

        function allContent_hide(rankRow){
            $.each(rankRow, function(index, value){
                this.hide();
            });
        }
    </script>
    
</body>
</html>