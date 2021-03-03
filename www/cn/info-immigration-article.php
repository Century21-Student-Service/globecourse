<?php session_start();
  require_once(dirname(__FILE__).'./../include/config.inc.php'); 
  include_once('./../ext/news.php');

  $cid = empty($cid) ? 1977 : intval($cid);
  $R = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=".$cid);

  if(!empty($R['id'])){
    $info=$R['content'];
    $title=$R['title'];
  }
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($title); ?> | 潮流搜索平台</title>
    <!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->
    
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
    <?php include_once('_dynamic_siteSetting/icon-setting.php'); ?>
    <!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


    <!-- (Theme) kingster -->
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
    <!-- <link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' /> -->
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
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/drop-down.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/tab-box.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/map-effect.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/table.css">

    
    <!-- ==========  (custom) Style [only this pg]  ========== -->
    <style type="text/css">
        .kingster-blog-info-tag>a:hover {
            color: #027dfa !important;
        }

        @media only screen and (max-width: 765px) {  /*mobile*/
            .kingster-blog-title-bottom-overlay {
                height: 222px !important;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, .9)) !important;
            }

            .kingster-single-article-title {
                font-size: 30px !important;
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
                    <div class="animated fadeIn kingster-blog-title-wrap  kingster-style-custom kingster-feature-image" style="background-image: url(custom-images/home_city-buildings-aerial-photography.jpg) ;">
                        
                        <!-- ========================================     << Overlay >>     ======================================== -->
                        <div class="kingster-header-transparent-substitute"></div>
                        <div class="kingster-blog-title-overlay" style="background-color: black; opacity: 0.5 ;"></div>
                        <div class="kingster-blog-title-bottom-overlay"></div>

                        <div class="kingster-blog-title-container kingster-container">
                            <div class="kingster-blog-title-content kingster-item-pdlr" style="padding-top: 400px ;padding-bottom: 80px ;">
                                
                                <?php
                                    $timeDay = MyDate('d', $R['posttime']);
                                    $timeMonth = MyDate('m', $R['posttime']);
                                    $timeYear = MyDate('Y', $R['posttime']);

                                    switch ($timeMonth) {
                                        case '1':
                                            $timeMonth = 'Jan';
                                            break;
                                        case '2':
                                            $timeMonth = 'Feb';
                                            break;
                                        case '3':
                                            $timeMonth = 'Mar';
                                            break;
                                        case '4':
                                            $timeMonth = 'Apr';
                                            break;
                                        case '5':
                                            $timeMonth = 'May';
                                            break;
                                        case '6':
                                            $timeMonth = 'Jun';
                                            break;
                                        case '7':
                                            $timeMonth = 'Jul';
                                            break;
                                        case '8':
                                            $timeMonth = 'Aug';
                                            break;
                                        case '9':
                                            $timeMonth = 'Sep';
                                            break;
                                        case '10':
                                            $timeMonth = 'Oct';
                                            break;
                                        case '11':
                                            $timeMonth = 'Nov';
                                            break;
                                        case '12':
                                            $timeMonth = 'Dec';
                                            break;
                                    }
                                ?>
                                <header class="kingster-single-article-head clearfix">
                                    <div class="kingster-single-article-date-wrapper  post-date updated">
                                        <div class="kingster-single-article-date-day"><?php echo $timeDay; ?></div>
                                        <div class="kingster-single-article-date-month"><?php echo $timeMonth; ?></div>
                                    </div>
                                    <div class="kingster-single-article-head-right">
                                        <h1 class="kingster-single-article-title"><?php echo($title); ?></h1>
                                        <div class="kingster-blog-info-wrapper">
                                            <div class="kingster-blog-info kingster-blog-info-font kingster-blog-info-author vcard author post-author "><span class="kingster-head">发布者：</span><span class="fn"><a title="Posts by <?php echo $R['author']; ?>" rel="author"><?php echo $R['author']; ?></a></span></div>
                                            <div class="kingster-blog-info kingster-blog-info-font kingster-blog-info-category "><a href="#" rel="tag">点击率：</a><a rel="tag"><?php echo $R['hits']; ?></a></div>
                                            <div class="kingster-blog-info kingster-blog-info-font kingster-blog-info-tag "><a rel="tag" href="immigration-list.php">移民资讯</a></div>
                                            <div class="kingster-blog-info kingster-blog-info-font kingster-blog-info-comment-number "><span class="kingster-head"><i class="fa fa-calendar" ></i></span><?php echo $timeYear; ?>年</div>
                                        </div>
                                    </div>
                                </header>

                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- ===============        (theme) educate        =============== -->
                    <section class="main-content blog-posts course-single" style="">  <!-- padding:100px -->
			            <div class="container">

			            	<!-- <div class="row" style="margin: 40px 80px; padding: 40px; border: 1px solid #e6e6e6; border-radius: 20px; box-shadow: 0px 0px 15px #e7e7e7;"> -->
			            		<div class="widget widget-categories">

		                            <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="">

                                        <?php echo $info; ?>

	                                </div>

		                        </div>
			            	<!-- </div> -->

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
    
</body>
</html>