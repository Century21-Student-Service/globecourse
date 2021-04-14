<?php session_start();
	require_once(dirname(__FILE__).'./../include/config.inc.php');
	include_once('./../ext/news.php');


	define('emptyTmp_updating', 'Updating...');
	define('emptyTmp_unavailable', 'Unavailable');
	define('emptyTmp_unclassified', 'Unclassified');

  

	$cid = empty($cid) ? 5 : intval($cid);
	$Sch=$dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=".$cid);

	//检测文档正确性
	$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");

	if( is_array($row) ){
		//增加一次点击量
		$dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");
		
		$newsTit=$row['title'];
		$time=GetDateTime($row['posttime']);
		$hits=$row['hits'];
		$author=$row['author'];
		

		if($row['content'] != '')
			$cont=GetContPage($row['content']);
		else
			$cont='网站资料更新中...';

		//获取上一篇信息
		$r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");

		if ($r < 1){
			$per= '上一篇：已经没有了';
		}
		else {
			if($cfg_isreurl != 'Y')
				$gourl = 'schoolShow_zysh.php?cid=178&id='.$r['id'];
			else
				$gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';

			$per= '上一篇：<a href="'.$gourl.'">'.$r['title'].'</a>';
		}

		//获取下一篇信息
		$r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");

		if ($r < 1){
			$next= '下一篇：已经没有了';
		}
		else{
			if($cfg_isreurl != 'Y')
				$gourl = 'schoolShow_zysh.php?cid=178&id='.$r['id'];
			else
				$gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';

			$next= '下一篇：<a href="'.$gourl.'">'.$r['title'].'</a>';
		}

		$pagebar=$per."<br />".$next;
	}
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($newsTit);?> | CT21 Search Platform</title>
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

    
    <!-- ==========  (custom) Style [only this pg]  ========== -->
    <style type="text/css">
        /*sidebar*/
        .sidebar .widget::after {
        	background-color: #027dfa;
        }

        /*button*/
        .flat-button.bg-orange {
		    background: #027dfa;
		    border-color: #027dfa;
		}

		/*picture*/
		.gdlr-core-zoom-on-hover:hover {
			box-shadow: 0px 2px 10px #000 !important;
		}

		@media only screen and (min-width: 448px) {
			.course-widget-price{
				width: 80% !important;
			}
		}
		@media only screen and (max-width: 448px) {
			.course-widget-price{
				width: 100%;
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
                    <?php $picarr = unserialize($Sch['picarr']); ?>

                    <?php
                      // foreach($picarr as $k){
                      //   $v = explode(',', $k);
	                	$v = explode(',', $picarr[0]);
                    ?>
                    <div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url('./../<?php echo $v[0]; ?>');" loading="lazy">  <!-- [Background-Image] -->

		                <div class="kingster-header-transparent-substitute"></div>
		                <div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div>
		                <div class="kingster-page-title-overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)) !important; opacity: 0.9;"></div>
		                
		                <div class="kingster-page-title-container kingster-container">
		                    <div class="kingster-page-title-content kingster-item-pdlr ctm-header__content" style="padding-top: 2.5% !important; padding-bottom: 2.5% !important;">
		                    	
		                    	<a href="school-info.php?id=<?php echo($Sch['id']);?>"><img class="animated fadeIn ctm-header__logo" src="./../<?php echo($Sch['picurl']);?>" width="" height="" style="border-radius: 10px;" loading="lazy" title="院校 - <?php echo($Sch['title']);?>"/></a>  <!-- [Logo] -->
		                    	<!-- <div class="kingster-page-caption"><?php //echo($Sch['cname']);?></div> -->
		                        <!-- <h1 class="kingster-page-title"><?php //echo($Sch['title']);?></h1> -->

		                    </div>
		                </div>

		            </div>
                    
                    <!-- ===============        (theme) educate        =============== -->
                    <section class="main-content blog-posts course-single ctm-pgSchool__section" style="">  <!-- padding:100px -->
			            <div class="container">

			            	<div class="row">
			            		<div class="animated fadeInUp" style="text-align: center; margin-bottom: 50px;">
				            		<!-- ====================     << Title >>     ==================== -->
		                            <h1 class="bold ctm-pgSchool__title" style="font-size: 40px; margin-bottom: 0; line-height: normal;"><?php echo($newsTit);?></h1>  <!-- (Chinese) -->
		                            
		                            
		                            <!-- ====================     << Location >>     ==================== -->
		                            <ul class="course-meta review style2 clearfix" style="display: flex; justify-content: center; list-style-type: none;">
		                                <li class="author">
		                                	<p>Views</p>
		                                	<a style="color: #545454 !important;"><strong><?php echo $hits;?> 次</strong></a>
		                                </li>
		                                <li class="author">
		                                	<p>Published on</p>
		                                    <a style="color: #545454 !important;"><strong><?php echo $time;?></strong></a>
		                                </li>
		                                <li class="author">
		                                	<p>Author</p>
		                                	<a style="color: #545454 !important;"><strong><?php echo $author;?></strong></a>
		                                </li>
		                            </ul>
		                        </div>
			            	</div>

			            	<div class="row">
			                	<!-- ============================================================================================ -->
			                    <!-- ===================================        [Left]        =================================== -->
			                    <!-- ============================================================================================ -->
			                    <div class="col-md-7">
			                        <div class="blog-title-single">
			                            
			                            <!-- <div class="feature-post">
			                                <img src="images/blog/bs1.jpg" alt="">
			                            </div> --><!-- /.feature-post -->
			                            
			                            
			                            <div class="entry-content">
			                                
			                                <!-- <h4 class="title-1 bold">ABOUT THE COURSES</h4> -->
			                                <p style="padding: 0 2%;">
			                                    <?php echo($cont);?>
			                                </p>
			                                
			                            </div><!-- /.entry-post -->

			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->
			                    

			                    <!-- ============================================================================================= -->
			                    <!-- ===================================        [Right]        =================================== -->
			                    <!-- ============================================================================================= -->
			                    <div class="col-md-5" style="display: flex; justify-content: center; align-items: center;">
			                    	
			                    	<?php
			                                	
	                                	// check if duration contain '-'
	                                	if ( strpos($row['ks'], '-') ) {
	                                		$cDuration_yr = '';
	                                	}
	                                	else
	                                		$cDuration_yr = ' / approx. '.ceil($row['ks']/52).' year(s)';

	                                	// formatting 'fees' to $2,000 etc
								        $fees = $row['fees'];
								        
								        $fees_bf_3 = substr($fees, 0, -3);
								        $fees_last_3 = substr($fees, -3);

								        
								        if ($row['fees'] == 0)
	                                		$fees_format = 'Could not be loaded';
	                                	else
	                                		$fees_format = '$'.$fees_bf_3.','.$fees_last_3.' AUD';

	                                	
	                                	// get 'faculty' & major
	                                	if ( !empty($row['kcfw']) ){
                                    		$Db = new MySql(false);
                                        	$cMajor = $Db->GetOne("SELECT * FROM `#@__field` WHERE bh='".$row['kcfw']."' ");

                                        	if ( !empty($cMajor['pid']) ){
                                        		$Db=new MySql(false);
												$faculty = $Db->GetOne("SELECT * FROM `#@__field` WHERE bh=".$cMajor['pid']." ");
												
												$facultyEn = empty($row['ename']) ? emptyTmp_unclassified : $row['ename'];
												$faculty_cTitle = $facultyEn;
												$cMajor_title = getEnameByBh($row['kcfw']);

												$schName_enAbbr = empty($Sch['ename_abbr']) ? emptyTmp_unavailable : $row['ename_abbr'];
                                        	}
                                        	else{
                                        		$faculty_cTitle = 'Unclassified';
                                        		$cMajor_title = 'Unclassified';
                                        	}
                                    	}
                                    	else{
                                    		$faculty_cTitle = 'Unclassified';
                                    		$cMajor_title = 'Unclassified';
                                    	}
	                                ?>
			                    	<div class="course-widget-price" style="float: none !important; margin-right: 0;">

		                                <h4 class="course-title">Course Features</h4>

		                                <ul>
		                                    <!-- <li>
		                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
		                                        <span><b>开学时间</b></span>
		                                        <span class="time">May 29, 2016</span>
		                                    </li> -->
		                                    <!-- <li>
		                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
		                                        <span>学时（周/年）</span>
		                                        <span class="time">2 Months</span>
		                                    </li> -->
		                                    <li>
		                                        <i class="fa fa-clock-o" aria-hidden="true"></i>  <!-- fa-leanpub -->
		                                        <span><b>Duration</b></span>  <!-- （weekly/yearly） -->
		                                        <span class="time"><?php echo($row['ks']);?> week(s)<?php echo $cDuration_yr;?></span>
		                                    </li>
		                                    <li>
		                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		                                        <span><b>Education type</b></span>
		                                        <span class="time"><?php echo(getVal_en('typeEn',$row['type']));?></span>
		                                    </li>
		                                    <li>
		                                        <i class="fa fa-university" aria-hidden="true"></i>
		                                        <span><b>Institution</b></span>
		                                        <span class="time"><?php echo($schName_enAbbr);?></span>
		                                    </li>
		                                    <!-- <li>
		                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
		                                        <span>Seats Available</span>
		                                        <span class="time">23 Student</span>
		                                    </li> -->
		                                    <li>
		                                        <i class="fa fa-users" aria-hidden="true"></i>
		                                        <span><b>Faculty</b></span>
		                                        <span class="time"><?php echo($faculty_cTitle);?></span>
		                                    </li>
		                                    <li>
		                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
		                                        <span><b>Major</b></span>
		                                        <span class="time"><?php echo($cMajor_title);?></span>
		                                    </li>
		                                </ul>

		                                <h5 class="bt-course">Fees: <span><?php echo $fees_format; ?></span></h5>
		                                <a class="flat-button bg-orange custom-button_noBorder" style="color: white; font-weight: bold;" href="http://www.ct21.com.cn/online/online.php?zy=<?php echo urlencode(($newsTit));?>&sx=<?php echo urlencode(($Sch['title']));?>">Apply now</a>
		                            </div>

			                    </div>
			                    
			                    
			                </div><!-- /row -->

			                <div class="animated fadeIn row row-otherSchool" style="transform: scale(0.8);">
			                	<h4 class="title-1 bold ctm-widget-title">Suggested Educational Institution</h4>
	                                <?php
	                                	$dopage->GetPage("SELECT * FROM `#@__infoimg` WHERE classid=3 AND state=".$Sch['state']." AND id!=".$Sch['id']." AND delstate='' AND checkinfo=true ORDER BY hits ASC",6);

		                                while ( $nearbySchool = $dosql->GetArray() ){

		                                	$nUni_img = unserialize($nearbySchool['picarr']);
			                                $img_V = explode(',', $nUni_img[0]);

		                                	$page="school-info.php";
	                          		?>
	                          				<div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='<?php echo($page);?>?id=<?php echo($nearbySchool['id']);?>';">
			                                	<div>
			                                		<img src="./../<?php echo($nearbySchool['picurl']);?>" class="ctm-nearbyUni__img" loading="lazy" />
			                                	</div>
			                                	<h6 style="margin-top: 10px;"><?php echo($nearbySchool['title']);?></h6>
			                                </div>
	                            	<?php
	                            	  }
	                            	?>
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

    <script type='text/javascript' src='kingster-plugins/goodlayers-core/plugins/combine/script.js'></script>
    <script type='text/javascript'>
        var gdlr_core_pbf = {
            "admin": "",
            "video": {
                "width": "640",
                "height": "360"
            },
            "ajax_url": "#"
        };
    </script>
    <script type='text/javascript' src='kingster-plugins/goodlayers-core/include/js/page-builder.js'></script>

    
    <!-- ==========  [from-ORIGINAL]  ========== -->
    <script src="./../templates/default/js/jquery.min.js"></script>



    <!-- ==========  (custom) JavaScript  ========== -->
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->


    <!-- =============================================================================================== -->
	<!-- ______________________________        (custom) Tab-button        ______________________________ -->
	<!-- =============================================================================================== -->
    <script type="text/javascript">
    	
    	var btnTab_all = [$('#tab-overview'), $('#tab-description'), $('#tab-gallery'), $('#tab-cList'), $('#tab-hotel'), $('#tab-eng'), $('#tab-college'), $('#tab-news')];
    	var tab_content = [$('#bodyOverview'), $('#bodyDescription'), $('#bodyGallery'), $('#bodyCList'), $('#bodyHotel'), $('#bodyEng'), $('#bodyCollege'), $('#bodyNews')];

    	tabSwitch(btnTab_all);

    	function tabSwitch(btnTab_id) {
    		jQuery.each(btnTab_id, function(index, value){
    			this.click(function(mouseI, mouseV){
    				
    				//  change Tab btn color
    				$('.ctm-tab-top__title').removeClass('ctm-tab-top__title-active');
		    		btnTab_all[index].addClass('ctm-tab-top__title-active');

		    		//  pasue Video in overview
		    		$('#promotionVid').trigger('pause');

		    		//  hide current page
		    		jQuery.each(tab_content, function(cI, cV){
		    			this.hide();
		    		});
		    		
		    		//  show target page
		    		tab_content[index].show();
		    		tab_content[index].addClass('animated fadeInLeft');

		    		//  hide school suggest at bottom
		    		if (index != 0){
		    			$('.row-otherSchool').hide();
		    		}
		    		else
		    			$('.row-otherSchool').show();
		    	});
    		});
    	}

    </script>
    
</body>
</html>