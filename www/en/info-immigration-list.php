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

    <title>澳洲技术移民信息 | 潮流搜索平台</title>
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <!-- <link rel="stylesheet" type="text/css" href="educate-stylesheets/bootstrap.css" > -->

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
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/radio-box.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/drop-down.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/tab-box.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/map-effect.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/table.css"> -->

    
    <!-- ==========  (custom) Style [only this pg]  ========== -->
    <style type="text/css">
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

        * {
          -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
                  box-sizing: border-box;
        }
        *:before,
        *:after {
          -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
                  box-sizing: border-box;
        }
        .container {
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
        }
        @media (min-width: 768px) {
          .container {
            width: 750px;
          }
        }
        @media (min-width: 992px) {
          .container {
            width: 970px;
          }
        }
        @media (min-width: 1200px) {
          .container {
            width: 1170px;
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
		                    	<h1 class="bold ctm-pgSchool__title" style="color: white; font-size: 40px; margin-bottom: 0; line-height: normal;">澳洲技术移民信息</h1>  <!-- (Chinese) -->
		                    	
		                    </div>
		                </div>

		            </div>
                    
                    <!-- ===============        (theme) educate        =============== -->
                    <section class="main-content blog-posts course-single ctm-pgSchool__section" style="">  <!-- padding:100px -->
			            <div class="container">

			            	<div class="row" style="margin: 40px 80px; padding: 40px; border: 1px solid #e6e6e6; border-radius: 20px; box-shadow: 0px 0px 15px #e7e7e7;">
			            		<div class="widget widget-categories">

		                            <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="padding-top: 50px; padding-bottom: 50px;">
	                                    <?php
	                                    	$Db=new MySql(false);
	                                    	$Db->Execute("SELECT * FROM `#@__infolist` WHERE classid=$id AND delstate='' AND checkinfo=true ORDER BY id DESC, orderid DESC");   //LIMIT 0,8

	                                    	while ( $row = $Db->GetArray() ){
	                                    		//获取链接地址
	                                    		$gourl = 'info-immigration-article.php?cid='.$row['id'];
	                                    		$time = MyDate('Y-m-d', $row['posttime']);
	                                    		// $time='<span class="R1">'.MyDate('Y-m-d', $row['posttime']).'</span>';
		                          		?>
		                          				<div class="gdlr-core-course-item-list ctm-itemList">
		                          					<a class="gdlr-core-course-item-link" href="<?php echo $gourl; ?>">
	                                            	
		                                            	<span class="gdlr-core-course-item-title gdlr-core-skin-title" style="font-weight: bold;"><?php echo(ReStrLen($row['title'],30));?></span>
		                                            	<dateArrow><span style="float: right;" ><?php echo $time; ?></span><i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" style="font-size: 16px;" ></i></dateArrow>

		                                            </a>
	                                            </div>
		                            	<?php
		                            	  }
		                            	?>
	                                </div>

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