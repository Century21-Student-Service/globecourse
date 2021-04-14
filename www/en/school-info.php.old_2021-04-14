<?php session_start();
  require_once(dirname(__FILE__).'./../include/config.inc.php'); 
  include_once('./../ext/news.php');
  

  define('emptyTmp_updating', 'Updating...');
  define('emptyTmp_unavailable', 'Unavailable');
  define('emptyTmp_unclassified', 'Unclassified');



  if ( strpos($_SERVER['REQUEST_URI'], '&') !== false ){
  	$onTab_overview = '';
  	$onTab_cList = 'ctm-tab-top__title-active';

  	$displayOverview = 'display: none;';
  	$displayCList = 'display: ;';
  }
  else{
  	$onTab_overview = 'ctm-tab-top__title-active';
	$displayCList = 'display: none;';
  }

  $id = empty($id) ? 2 : intval($id);
  $Sch=$dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=".$id);
  $Db=new MySql(false);
  $G=$Db->GetOne("SELECT * FROM `#@__infoimg` WHERE bh='".$Sch['bh']."'");

  
  // Filter-Buttons -- get session
  @$fid = $_GET['fid'];
  @$tid = $_GET['tid'];

	if (empty($fid)){
		$fid = 0;
	}
	if (empty($tid)){
		$tid = 0;
	}

	if ($fid == 0){
		$sql_fid = '';
	}
	else
		$sql_fid = "AND kcfw LIKE '".$fid."__'";

	if ($tid == 0){
		$sql_tid = '';
	}
	else
		$sql_tid = "AND type='".$tid."'";

  // if( !empty($fid) ){
  // 	$_SESSION['fid'] = $fid;
  // 	$sessFaculty = $_SESSION['fid'];
  // }
  // else{
  // 	if( empty($_SESSION['fid']) ){
  // 		$sessFaculty =0;
  // 	}
  // 	else{
  // 		$sessFaculty = $_SESSION['fid'];
  // 	}
  // }

  // if( !empty($tid) ){
  // 	$_SESSION['tid'] = $tid;
  // 	$sessType = $_SESSION['tid'];
  // }
  // else{
  // 	if(empty($_SESSION['tid'])){
  // 		$sessType =0;
  // 	}
  // 	else{
  // 		$sessType = $_SESSION['tid'];
  // 	}
  // }
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($Sch['cname']);?> | CT21 Search Platform</title>
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
    <link rel="stylesheet" type="text/css" href="custom-css/style_school-info.css">
    <link rel="stylesheet" type="text/css" href="custom-css/style_school-info__fromTemplate.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/radio-box.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/drop-down.css"> -->
    <link rel="stylesheet" type="text/css" href="custom-css/tab-box.css">
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/map-effect.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="custom-css/table.css"> -->

    
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
                    <?php $picarr = unserialize($Sch['picarr']); ?>

                    <?php
                      // foreach($picarr as $k){
                      //   $v = explode(',', $k);
	                	$v = explode(',', $picarr[0]);
                    ?>
                    <div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url('./../<?php echo $v[0]; ?>');" loading="lazy">  <!-- [Background-Image] -->

		                <div class="kingster-header-transparent-substitute"></div>
		                <div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div>
		                
		                <div class="kingster-page-title-container kingster-container">
		                    <div class="kingster-page-title-content kingster-item-pdlr ctm-header__content" style="padding-top: 2.5% !important; padding-bottom: 2.5% !important;">
		                    	
		                    	<a href="school-info.php?id=<?php echo($Sch['id']);?>"><img class="animated fadeIn ctm-header__logo" src="./../<?php echo($Sch['picurl']);?>" width="" height="" style="border-radius: 10px;" loading="lazy" /></a>  <!-- [Logo] -->
		                    	<!-- <div class="kingster-page-caption"><?php //echo($Sch['cname']);?></div> -->
		                        <!-- <h1 class="kingster-page-title"><?php //echo($Sch['title']);?></h1> -->

		                    </div>
		                </div>

		            </div>
                    
                    <!-- ===============        (theme) educate        =============== -->
                    <section class="main-content blog-posts course-single ctm-pgSchool__section" style="">  <!-- padding:100px -->
			            <div class="container">

			            	<div class="animated fadeInUp" style="text-align: center; margin-bottom: 50px;">

			            		<!-- ====================     << Title >>     ==================== -->
	                            <h1 class="bold ctm-pgSchool__title" style="font-size: 40px; margin-bottom: 0; line-height: normal;"><?php echo($Sch['cname']);?></h1>  <!-- (Chinese) -->
	                            <h1 class="ctm-pgSchool__title-en" style="font-size: 40px; margin-bottom: 16px;"><small><?php echo($Sch['cname']);?></small></h1>  <!-- (English) -->
	                            
	                            
	                            <!-- ====================     << Location >>     ==================== -->
	                            <ul class="course-meta review style2 clearfix" style="display: flex; justify-content: center; list-style-type: none;">
	                                <li class="author">
	                                    <!-- <div class="thumb">
	                                        <img src="educate-images/teacher/Team-05.jpg" alt="image">
	                                    </div> -->

	                                    <p>State</p>
	                                    <a style="color: #545454 !important;"><strong><?php echo(getVal_en('stateEn_abbr',$Sch['state']));?></strong></a>
	                                </li>
	                                <li class="author">
	                                	<p>Country</p>
	                                	<a style="color: #545454 !important;"><strong><?php echo(getVal_en('countryEn',$Sch['country']));?></strong></a>
	                                </li>
	                                <li class="author">
	                                	<p>Views</p>
	                                	<a style="color: #545454 !important;"><strong><?php echo $Sch['hits'];?>00 views</strong></a>
	                                </li>
	                            </ul>
			            	</div>

			            	<!-- ====================     << Tab-top >>     ==================== -->
			            	<div class="ctm-tab-top">
			            		<div style="border-bottom: 2px solid #027dfa;">

			            			<h5 id="tab-overview" class="ctm-tab-top__title <?php echo $onTab_overview; ?>">Overview</h5>
		                            <!-- <h5 id="tab-description" class="ctm-tab-top__title">介绍</h5> -->
		                            <h5 id="tab-gallery" class="ctm-tab-top__title">Gallery</h5>

		                            <?php
		                            	if($Sch['schoolType']>3){
		                            ?>
		                                    <h5 id="tab-cList" class="ctm-tab-top__title <?php echo $onTab_cList; ?>">List of Courses</h5>
		                            		<!-- <li><a href="schoolShow_zy.php?id=<?php //echo($Sch['id']);?>">专业</a></li> -->
		                            <?php
		                        		}
		                        	?>

		                        	<?php
		                        		// if(empty($Sch['ykurl'])){
		                        		// 	$ykurl='schoolShow_yk.php?id='.$Sch['id'];
		                        		// }else{
		                        		// 	$ykurl=$Sch['ykurl'];
		                        		// }
		                        	?>

		                        	<?php if ($Sch['id'] == 23): ?>
		                        			<!-- <li><a href="schoolShow_xx_id_23_jdgl.php?id=23">酒店管理学院</a></li>
		                        			<li><a href="schoolShow_xx_id_23_yykc.php?id=23">英语课程</a></li> -->
		                                    <h5 id="tab-hotel" class="ctm-tab-top__title">Hotel Management College</h5>
		                                    <h5 id="tab-eng" class="ctm-tab-top__title">English Courses</h5>
		                        	<?php endif; ?>

		                        	<?php
		                        		if(!empty($Sch['wpkc'])){

		                        			if (strpos($Sch['wpkc'], 'schoolShow.php') !== false){
		                        				$collegeURL = str_replace('schoolShow.php', 'school-info.php', $Sch['wpkc']);
		                        			}
		                        			else
		                        				$collegeURL = $Sch['wpkc'];
		                        	?>
		                        			<!-- <li><a href="<?php //echo($Sch['wpkc']);?>">预科</a></li>
		                        			<li><a href="<?php //echo($Sch['wpkc']);?>">文凭课程</a></li>
		                        			<li><a href="schoolShow_xw.php?id=<?php //echo($Sch['id']);?>">新闻</a></li> -->
		                                    <a href="<?php echo $collegeURL; ?>"><h5 id="tab-college" class="ctm-tab-top__title">Foundation/Diploma</h5></a>
		                                    <!-- <h5 id="tab-news" class="ctm-tab-top__title">新闻</h5> -->
		                        	<?php
		                        		}
		                        	?>
			            		</div>
			            	</div>

			                <div class="row" style="margin: 0;">
			                	<!-- =============================================================================================== -->
			                    <!-- ===================================        [Content]        =================================== -->
			                    <!-- =============================================================================================== -->
			                    
			                    <!-- ====================     << Overview >>     ==================== -->
			                    <div class="col-md-8 animated fadeInLeft" style="<?php echo $displayOverview; ?>" id="bodyOverview" loading="lazy">
			                        <div class="blog-title-single">
			                            
			                            <!-- ====  Overview  ==== -->
			                            <h4 class="title-1 bold ctm-widget-title">Overview</h4>
		                                <p style="margin-bottom: 30px; padding: 0 2%;">
		                                    <?php echo($Sch['description']);?>
		                                </p>
			                            
			                            <!-- ====  Video  ==== -->
			                            <div class="feature-post">
			                            	<?php
			                            		if ( !empty($Sch['schoolvideo']) ){
			                            	?>
			                            			<video class="video" controls="controls" src="<?php echo($Sch['schoolvideo']);?>" width="100%" id="promotionVid" loading="lazy"> <!-- autoplay="autoplay" -->
			                            	<?php
			                            		}
			                            		else
			                            	?>
			                                		<img src="./../<?php echo $v[0]; ?>" loading="lazy" />
			                                		<!-- <img src="educate-images/blog/bs1.jpg" alt="image"> -->
			                            </div><!-- /.feature-post -->

			                            <!-- ====  Description  ==== -->
			                            <h4 class="title-1 bold ctm-widget-title">Description</h4>
		                                <p style="margin-bottom: 30px; padding: 0 2%;">
		                                    <?php echo($Sch['content']);?>
		                                </p>
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->


			                    <!-- ====================     << Description >>     ==================== -->
			                    <!-- <div class="col-md-8" id="bodyDescription" style="display: none;">
			                        <div class="blog-title-single">
			                            
			                            <h4 class="title-1 bold ctm-widget-title">院校介绍</h4>
		                                
		                                <p style="margin-bottom: 30px; padding: 0 2%;">
		                                    <?php //echo($Sch['content']);?>
		                                </p>
			                            
			                        </div>
			                    </div> -->


			                    <!-- ====================     << Gallery >>     ==================== -->
			                    <div class="col-md-8" id="bodyGallery" style="display: none;" loading="lazy">
			                        <div class="blog-title-single">
			                            
			                            <h4 class="title-1 bold ctm-widget-title">Gallery</h4>
		                                
		                                <div class="gdlr-core-portfolio-item-holder gdlr-core-js-2  filter-container clearfix" data-layout="fitrows">

                                            <?php
						                       $picarr = unserialize($Sch['picarr']);

						                       foreach ($picarr as $k){
						                       	$v = explode(',', $k);
											?>
												<!-- <li><img src="<?php //echo($v[0]);?>" width="204" height="125" /><div><?php //echo($v[1]);?></div></li> -->
										    	<div class="gdlr-core-item-list class1 gdlr-core-item-pdlr gdlr-core-column-20" style="padding-left: 10px; padding-right: 10px;">
	                                                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
	                                                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
	                                                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover" style="border-radius: 6px; box-shadow: 0px 2px 8px #0000008a; transition: all .3s ease;">
	                                                            
	                                                            <a class="gdlr-core-lightgallery gdlr-core-js " href="./../<?php echo($v[0]);?>" data-lightbox-group="gdlr-core-img-group-1">
	                                                            	
	                                                            	<img src="./../<?php echo($v[0]);?>" width="100%" height="100%" alt="" style="height: 140px; object-fit: cover;" loading="lazy" />
	                                                            	
	                                                            	<span class="gdlr-core-image-overlay  gdlr-core-portfolio-overlay gdlr-core-image-overlay-center-icon gdlr-core-js" style="display: flex; justify-content: center; align-items: center; border-radius: 6px;">
	                                                            		<span style="line-height: 1.55;">  <!-- class="gdlr-core-image-overlay-content" -->
	                                                            			<span class="gdlr-core-portfolio-icon-wrap" ><i class="gdlr-core-portfolio-icon arrow_expand" ></i></span>
	                                                            		</span>
	                                                                </span>
	                                                            </a>

	                                                        </div>
	                                                    </div>
	                                                    <!-- <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
	                                                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="font-size: 19px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" >Charity &#038; Voluntary For Social</a></h3></div> -->
	                                                </div>
	                                            </div>
                                            <?php
                                        		}
                                        	?>

                                        </div>
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->


<!-- ====================     << Course-List >>     ==================== --><!-- ====================     << Course-List >>     ==================== --><!-- ====================     << Course-List >>     ==================== -->
			                    <div class="col-md-8" id="bodyCList" style="<?php echo $displayCList; ?>" loading="lazy">
			                        <div class="blog-title-single">
			                            
			                            <!-- ==========  Title  ========== -->
			                            <h4 class="title-1 bold ctm-widget-title">List of Courses</h4>

			                            <!-- ==========  Content  ========== -->
		                                <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list-info ctm-itemList_cList_mob">
                                                
                                                
                                                <!-- ==========  Filter (faculty)  ========== -->
					                            <div class="row" style="margin: 0px 5px 10px;">
					                            	
					                            	<!-- ====  faculty  ==== -->
					                            	<h6 style="display: inline-block; margin-bottom: 0; padding: 8px 2px; font-weight: bold;"><span>Faculty：</span></h6>
					                            	
					                            	<!-- ====  buttons  ==== -->
					                            	<div class="ctmn-rowFilter">
						                            	<div class="ctmn-rowFilterInner" style="display: inline-block; font-weight: bold;">
						                            		
						                            		<!-- ====  (All)  ==== -->
						                            		<?php
			                                                	if ($fid == 0){
			                                                		$filterActiveAll__show = 'ctm-btnFilter__active';
							                                		$filter__onFaculty = 'All';
							                                	}
							                                	else
							                                		$filterActiveAll__show = '';
							                                ?>

							                                <div class="animated fadeIn ctm-btnFilter <?php echo $filterActiveAll__show; ?>" onclick="location.href='school-info.php?id=<?php echo $id; ?>&fid=0&tid=<?php echo $tid; ?>'">
						                            			<span>All</span></div>

							                                <!-- ====  (currently-Filtered)  ==== -->
							                                <?php
							                                	// $dopage->GetPage("SELECT * FROM `#@__field` WHERE bh<=13");  //  get Faculty

								                                // while ( $row = $dosql->GetArray() ){
								                                // 	if ($fid == $row['bh']){
								                                // 		$filterActive__show = 'ctm-btnFilter__active';
								                                // 		$filter__onFaculty = $row['cname'];
								                                // 	}
								                                // }

								                                // if ($fid != 0){
							                          		?>
								                            		<!-- <div class="animated fadeIn ctm-btnFilter <?php echo $filterActive__show; ?>" onclick="location.href='school-info.php?id=<?php echo $id; ?>&fid=0&tid=<?php echo $tid; ?>'">
								                            			<span><?php echo $filter__onFaculty; ?></span></div> -->
								                            <?php
								                            	// }
								                            ?>
						                            		
						                            		<!-- ====  (Choose)  ==== -->
						                            		<!-- <div class="animated fadeIn ctm-btnFilter ctm-btnFilter__more">
						                            			<span>more</span></div> -->

								                            		<!-- ====  (Options)  ==== -->
								                            		<!-- <div class="ctm-btnFilter__moreInner"> -->
								                            			<?php
						                                                	$dopage->GetPage("SELECT * FROM `#@__field` WHERE bh<=13");  //  get Faculty

											                                while ( $row = $dosql->GetArray() ){

											                                	//  make relevant 'button' to 'active'
											                                	if ($fid == $row['bh']){
											                                		$filterActive__show = 'ctm-btnFilter__active';
											                                	}
											                                	else
											                                		$filterActive__show = '';

											                                	$facultyName = empty($row['ename']) ? emptyTmp_unavailable : $row['ename'];
										                          		?>
										                          				<div class="animated fadeIn ctm-btnFilter <?php echo $filterActive__show; ?>" onclick="location.href='school-info.php?id=<?php echo $id; ?>&fid=<?php echo $row['bh']; ?>&tid=<?php echo $tid; ?>'">
										                          					<span><?php echo $facultyName; ?></span></div>
										                          		<?php
										                          			}
										                          		?>
								                            		<!-- </div> -->
					                            		</div>
					                            	</div>

					                            </div>


					                            <!-- ==========  Filter (course-type)  ========== -->
					                            <div class="row" style="margin: 0px 5px 30px;">
					                            	
					                            	<!-- ====  course-type  ==== -->
					                            	<h6 style="display: inline-block; margin-bottom: 0; padding: 8px 2px; font-weight: bold;"><span>Education：</span></h6>
					                            	
					                            	<!-- ====  buttons  ==== -->
					                            	<div class="ctmn-rowFilter">
						                            	<div class="ctmn-rowFilterInner" style="display: inline-block; font-weight: bold;">
						                            		
						                            		<!-- ====  (All)  ==== -->
						                            		<?php
			                                                	if ($tid == 0){
			                                                		$filterActiveAll__showCType = 'ctm-btnFilter__active';
							                                		$filter__onCType = 'All';
							                                	}
							                                	else
							                                		$filterActiveAll__showCType = '';
							                                ?>

							                                <div class="animated fadeIn ctm-btnFilter <?php echo $filterActiveAll__showCType; ?>" onclick="location.href='school-info.php?id=<?php echo $id; ?>&fid=<?php echo $fid; ?>&tid=0'">
						                            			<span>All</span></div>

							                                <!-- ====  (currently-Filtered)  ==== -->
							                                <?php
							                                	// get Course-Type
							                                	// $r = $dosql->GetOne("SELECT `fieldsel` FROM `#@__diyfield` WHERE `id`=6");
														    	// $fieldsel = explode(',',$r['fieldsel']);

														    	// foreach($fieldsel as $value){
														    	// 	$vaT = explode('=',$value);  // va[0] =title | va[1] =id

														    	// 	if ($tid == $vaT[1]){
						                                				// $filterActive__showCType = 'ctm-btnFilter__active';
						                                				// $filter__onCType = getVal_en('typeEn',$vaT[1]);
						                                			// }
														    	// }

														    	// if ($tid !=0){
				                                				?>

					                                				<!-- <div class="animated fadeIn ctm-btnFilter <?php echo $filterActive__showCType; ?>" onclick="location.href='school-info.php?id=<?php echo $id; ?>&fid=<?php echo $fid; ?>&tid=0'">
					                                					<span><?php echo $filter__onCType; ?></span></div> -->

				                                				<?php
				                                				// }
														    ?>
						                            		
						                            		<!-- ====  (Choose)  ==== -->
						                            		<!-- <div class="animated fadeIn ctm-btnFilter ctm-btnFilter__moreCType">
						                            			<span>more</span></div> -->

								                            		<!-- ====  (Options)  ==== -->
								                            		<!-- <div class="ctm-btnFilter__moreInnerCType"> -->
								                            			
								                            			<?php
										                                	// get Course-Type
										                                	$r = $dosql->GetOne("SELECT `fieldsel` FROM `#@__diyfield` WHERE `id`=6");
																	    	$fieldsel = explode(',',$r['fieldsel']);

																	    	foreach($fieldsel as $value){
																	    		$vaT = explode('=',$value);  // va[0] =title | va[1] =id

																	    		// get Course-Type from each course for this School
																	    		$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=2  AND delstate='' AND cbh IS NOT NULL AND cbh='".$id."' AND checkinfo=true ORDER BY orderid DESC");
										                                		while ( $vaC = $dosql->GetArray() ){
										                                			
										                                			if ($tid == $vaC['type']){
										                                				$filterActive__showCType = 'ctm-btnFilter__active';
										                                			}
										                                			else
										                                				$filterActive__showCType = '';

										                                			if ($vaC['type'] == $vaT[1]){

										                                				$filter__onCType = getVal_en('typeEn',$vaT[1]);
										                                				?>

										                                				<div class="animated fadeIn ctm-btnFilter <?php echo $filterActive__showCType; ?>" onclick="location.href='school-info.php?id=<?php echo $id; ?>&fid=<?php echo $fid; ?>&tid=<?php echo $vaC['type']; ?>'">
										                                					<span><?php echo $filter__onCType; ?></span></div>

										                                				<?php
										                                				break;
										                                			}
										                                		}
																	    	}
																	    ?>

								                            		<!-- </div> -->
					                            		</div>
					                            	</div>

					                            </div>


                                                <!-- ==========  List-Course  ========== -->
                                                <?php

                                                	if ( $fid !=0 || $tid !=0 ){
                                                		$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=2  AND delstate='' AND cbh IS NOT NULL AND cbh='".$id."' ".$sql_fid." ".$sql_tid." AND checkinfo=true ORDER BY orderid DESC",10);
                                                	}
                                                	else
                                                		$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=2  AND delstate='' AND cbh IS NOT NULL AND cbh='".$id."' AND checkinfo=true ORDER BY orderid DESC",10);

					                                while ( $row = $dosql->GetArray() ){

				                          		?>

		                                                <div class="gdlr-core-course-item-list ctm-pgSchool__itemList" style="background-color: #f2f2f270; border: 1px solid #dbdbdb59; border-radius: 20px; box-shadow: 0px 0px 10px #c5c5c59e; padding: 30px 52px;"> <!-- #f7f7f7 -->
		                                                    <h3 class="gdlr-core-course-item-title"><!-- <span class="gdlr-core-course-item-id gdlr-core-skin-caption" ></span> --><?php echo($row['title']);?></h3>
		                                                    <div class="gdlr-core-course-item-info-wrap">
		                                                        <div class="gdlr-core-course-item-info"><span class="gdlr-core-head">Education type : </span><span class="gdlr-core-tail"><?php echo(getVal_en('typeEn',$row['type']));?></span></div>
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
															          $fees_format = emptyTmp_unavailable;
															        else
															          $fees_format = '$'.$fees_bf_3.','.$fees_last_3;

				                                                	// Get course's 'Faculty' & 'Major'
				                                                	if ( !empty($row['kcfw']) ){
				                                                		$Db = new MySql(false);
					                                                	$cMajor = $Db->GetOne("SELECT * FROM `#@__field` WHERE bh='".$row['kcfw']."' ");  //  Major

					                                                	if ( !empty($cMajor['pid']) ){
					                                                		$Db=new MySql(false);
																			$faculty = $Db->GetOne("SELECT * FROM `#@__field` WHERE bh=".$cMajor['pid']." ");  //  Faculty
																			
																			$facultyEn = empty($row['ename']) ? emptyTmp_unclassified : $row['ename'];
																			$faculty_cTitle = $facultyEn;
																			$cMajor_title = getEnameByBh($row['kcfw']);
					                                                	}else{
				                                                		$faculty_cTitle = 'Unclassified';
				                                                		$cMajor_title = 'Unclassified';
				                                                	}
				                                                	}
				                                                	else{
				                                                		$faculty_cTitle = 'Unclassified';
				                                                		$cMajor_title = 'Unclassified';
				                                                	}
								                          		?>

								                          		<div class="gdlr-core-course-item-info"><span class="gdlr-core-head">Faculty : </span><span class="gdlr-core-tail"><?php echo($faculty_cTitle);?></span></div>
		                                                        <div class="gdlr-core-course-item-info"><span class="gdlr-core-head">Major : </span><span class="gdlr-core-tail"><?php echo($cMajor_title);?></span></div>
		                                                        <div class="gdlr-core-course-item-info"><span class="gdlr-core-head">Duration : </span><span class="gdlr-core-tail"><?php echo($row['ks']);?> week(s)<?php echo $cDuration_yr; ?></span></div>
		                                                        <div class="gdlr-core-course-item-info"><span class="gdlr-core-head">Fees : </span><span class="gdlr-core-tail"><?php echo($fees_format);?></span></div>
		                                                    </div>
		                                                    <a href="course-info.php?cid=<?php echo($id);?>&id=<?php echo($row['id']);?>" class="gdlr-core-course-item-button gdlr-core-button custom-button_noBorder">See Details</a>
		                                                    <!-- <a href="#" class="gdlr-core-course-item-button gdlr-core-button">申请课程</a> -->
		                                                </div>
                                                <?php
                                                	}
                                                ?>
                                                <div class="ctm-table__pageBtn" style=""><?php echo $dopage->GetList(); ?></div>

                                                <!-- <div class="gdlr-core-pagination  gdlr-core-style-round gdlr-core-left-align"><span aria-current='page' class='page-numbers current'>1</span> <a class='page-numbers' href='page/2/index.html'>2</a>
                                                    <a class="next page-numbers" href="page/2/index.html"></a>
                                                </div> -->
                                            </div>
                                        </div>
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->

			                    <!-- ======================================================================================================= -->

			                    <!-- ====================     << Hotel >>     ==================== -->
			                    <div class="col-md-8" id="bodyHotel" style="display: none;">
			                        <div class="blog-title-single">
			                            
			                            <h4 class="title-1 bold ctm-widget-title">Hotel Management College</h4>
		                                
		                                <?php include_once('school-info_id23_hotel.php'); ?>
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->


			                    <!-- ====================     << Eng-Course >>     ==================== -->
			                    <div class="col-md-8" id="bodyEng" style="display: none;">
			                        <div class="blog-title-single">
			                            
			                            <h4 class="title-1 bold ctm-widget-title">English Course</h4>
		                                
		                                <h6>英语课程简介</h6>
		                                <p>TAFE西悉尼（TAFE Western Sydney Institute）是一家致力于提供高品质语言课程的职业教育和高等教育培训机构。TAFE西悉尼拥有120年的历史，并一直以为客户提供创新的服务和灵活的课程而自豪。</p>
		                                <p>
		                                	西悉尼（WSI）拥有10个校区，网上和远程教育中心以及一个坐落于西悉尼地区的专业培训中心，并一直为学生提供优秀的教师和良好的学习环境。西悉尼为学生提供各种英语课程培训和服务，包括为海外学生提供的英语强化课程（English Language Intensive Courses for Overseas Students）。西悉尼的英语强化课程专门为学生提供本科学习或研究生入学前对英文要求的专业培训。在西悉尼学校学习语言课程的同时还可以和当地学生一起感受到多文化之间的碰撞和交流，不仅有澳大利亚的学生，更有很多来自不同国家文化的国际留学生。此英语课程是通往西悉尼大学以及多所澳大利亚其他大学本科学位，文凭已经多项证书课程的捷径。
			                            </p>

			                            <h6>课程设置</h6>
			                            <ul>
					                        <li>
					                        	<p><b>学术类四级证书</b></p>
					                        	<p>本课程将有效提高学生的学术素养和英语水平，是学生能够将英语知识应用到各种各样的学术专业和背景下。成功完成本课程的学生，所获得的证书将作为在多所澳大利亚大学被认为有效的英语水平证明。</p>
					                        </li>
					                        <li>
					                        	<p><b>高级英语和继续类教育三级证书</b></p>
					                        	<p>这门课程主要为非英语背景且英语基础较差的学生提供听说读写四方面的培训使学生能应用英语作为媒介完成课程学习。本课程等同于申请职业培训学生的雅思5.5或6分的要求。</p>
					                        </li>
					                        <li>
					                        	<p><b>英语课程二级证书</b></p>
					                        	<p>本课程主要为非英语背景但是具有一定英语能力基础的学生提供听说读写的培训，其中主要包括澳大利亚地理，历史和英语科技方面的介绍。完成此课程将等同于满足雅思4.5分的要求。</p>
					                        </li>
					                    </ul>
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->


			                    <!-- ====================     << College >>     ==================== -->
			                    <div class="col-md-8" id="bodyCollege" style="display: none;">
			                        <div class="blog-title-single">
			                            
			                            <h4 class="title-1 bold ctm-widget-title">Foundation/Certficate Course</h4>
		                                
		                                
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->


			                    <!-- ====================     << News >>     ==================== -->
			                    <div class="col-md-8" id="bodyNews" style="display: none;">
			                        <div class="blog-title-single">
			                            
			                            <h4 class="title-1 bold ctm-widget-title">News</h4>
		                                
		                                
			                            
			                        </div><!-- /blog-title-single -->
			                    </div><!-- /col-md-8 -->


			                    <!-- =============================================================================================== -->
			                    <!-- ===================================        [Sidebar]        =================================== -->
			                    <!-- =============================================================================================== -->
			                    <div class="sidebar">
			                    	<!-- <div class="widget widget-categories">
			                            <h5 class="ctm-tab-side__title">概况</h5>
			                            <h5 class="ctm-tab-side__title">详情</h5>
			                            <h5 class="ctm-tab-side__title">图片</h5>
			                            <h5 class="ctm-tab-side__title">课程列表</h5>
			                        </div> -->

			                        <div class="widget widget-categories">
			                            <h5 class="widget-title">Popular Courses</h5>
			                            
			                            <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="">
                                            <?php
                                            	$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=2  AND delstate='' AND cbh='".$id."' AND checkinfo=true ORDER BY orderid DESC",5);

				                                while ( $row = $dosql->GetArray() ){
			                          				if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
			                          				else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
			                          				else $gourl = $row['linkurl'];

			                          				$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
			                          				if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
			                          				else $gourl2 = 'news-'.$row['classid'].'-1.html';

			                          				
			                          				$nameEn = empty($row['ename']) ? emptyTmp_updating : $row['ename'];
			                          		?>
			                          				<div class="gdlr-core-course-item-list ctm-itemList__sidebar"><a class="gdlr-core-course-item-link" href="course-info.php?cid=<?php echo($id);?>&id=<?php echo($row['id']);?>">
	                                                	<!-- <span class="gdlr-core-course-item-id gdlr-core-skin-caption" ></span> -->
	                                                	<span class="gdlr-core-course-item-title gdlr-core-skin-title" style="font-weight: bold;"><?php echo($nameEn);?></span>
	                                                	<!-- <span><?php //echo(getCType($row['type']));?></span> -->
	                                                	<i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" style="font-size: 16px;" ></i></a>
	                                                </div>
			                            	<?php
			                            	  }
			                            	?>
                                        </div>

			                        </div>

			                        <div class="widget widget-categories">
			                            <h5 class="widget-title">Universities Comparison</h5>
			                            
			                            <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="">
                                            <?php
                                            	$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=8  AND delstate='' AND checkinfo=true ORDER BY orderid DESC",5);

				                                while ( $row = $dosql->GetArray() ){
				                                	if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
			                          				else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
			                          				else $gourl = $row['linkurl'];

			                          				$nameEn = empty($row['ename']) ? emptyTmp_updating : $row['ename'];
			                          		?>
			                          				<div class="gdlr-core-course-item-list ctm-itemList__sidebar"><a class="gdlr-core-course-item-link" href="info-immigration-article.php?cid=<?php echo($row['id']);?>">
	                                                	<span class="gdlr-core-course-item-title gdlr-core-skin-title" style="font-weight: bold;"><?php echo($nameEn);?></span>
	                                                	<i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" style="font-size: 16px;" ></i></a>
	                                                </div>
			                            	<?php
			                            	  }
			                            	?>
                                        </div>

			                        </div>

			                        <!-- ====================     << School-Suggestions >>     ==================== -->
			                        <div class="widget widget-categories">
			                            <h5 class="widget-title">Suggested Educational Institution</h5>
			                            
			                            <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="padding-left: 0; padding-right: 0;">
                                            <?php
			                                	$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=10 AND delstate='' AND checkinfo=true ORDER BY posttime DESC",6);

			                                	while ( $sugSchool = $dosql->GetArray() ){
			                                		$data = $sugSchool['linkurl'];
			                                		$get_sID = substr($data, strpos($data, "?id=") + 1);
			                                		$get_sID_filter = filter_var($get_sID, FILTER_SANITIZE_NUMBER_INT);
			                                		// echo '<script>alert('.intval($tst).');</script>';
			                                		
			                                		$Db=new MySql(false);
			                                		$Db->Execute("SELECT * FROM `#@__infoimg` WHERE classid=3 AND id=".intval($get_sID_filter)." AND checkinfo=true ORDER BY hits ASC");

					                                while ( $nearbySchool = $Db->GetArray() ){

					                                	// $nUni_img = unserialize($nearbySchool['picarr']);
						                                // $img_V = explode(',', $nUni_img[0]);

					                                	$page="school-info.php";
			                          		?>
				                          				<div class="animated fadeIn gdlr-core-pbf-column gdlr-core-column-60" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='<?php echo($page);?>?id=<?php echo($nearbySchool['id']);?>';">
						                                	<div>
						                                		<img src="./../<?php echo($nearbySchool['picurl']);?>" class="ctm-nearbyUni__img" style="height: 120px !important;" loading="lazy" />
						                                	</div>
						                                	<h6 style="margin-top: 10px;"><?php echo($nearbySchool['title']);?></h6>
						                                </div>
			                            	<?php
			                            			}
			                            		}
			                            	?>
                                        </div>

			                        </div>

			                    </div><!-- /sidebar -->
			                </div><!-- /row -->

			                <!-- ===================================================================================================== -->
		                    <!-- ===================================        [Nearby-School]        =================================== -->
		                    <!-- ===================================================================================================== -->
			                <!-- <div class="animated fadeIn row row-otherSchool" style="margin-bottom: 5%; transform: scale(0.9); <?php echo $displayOverview; ?>">
			                	<h4 class="title-1 bold ctm-widget-title">Educational Institution Suggestions</h4> -->
	                                <?php
	                                	// $dopage->GetPage("SELECT * FROM `#@__infoimg` WHERE classid=3 AND state=".$Sch['state']." AND id!=".$Sch['id']." AND delstate='' AND checkinfo=true ORDER BY hits ASC",6);

		                                // while ( $nearbySchool = $dosql->GetArray() ){

		                                // 	// $nUni_img = unserialize($nearbySchool['picarr']);
			                               //  // $img_V = explode(',', $nUni_img[0]);

		                                // 	$page="school-info.php";
	                          		?>
	                          				<!-- <div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; margin-bottom: 10px;" onclick="parent.location.href='<?php echo($page);?>?id=<?php echo($nearbySchool['id']);?>';">
			                                	<div>
			                                		<img src="./../<?php echo($nearbySchool['picurl']);?>" class="ctm-nearbyUni__img" loading="lazy" />
			                                	</div>
			                                	<h6 style="margin-top: 10px;"><?php echo($nearbySchool['title']);?></h6>
			                                </div> -->
	                            	<?php
	                            	  // }
	                            	?>
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
    <!-- <script src="./../templates/default/js/jquery.min.js"></script> -->



    <!-- ==========  (custom) JavaScript  ========== -->
    <script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
    <!-- ==========  (custom) JavaScript  ========== -->


    <!-- =============================================================================================== -->
	<!-- ______________________________        (custom) Tab-button        ______________________________ -->
	<!-- =============================================================================================== -->
    <script type="text/javascript">

    	//  pasue Video in overview
    	jQuery('#promotionVid').trigger('pause');
    	
    	var btnTab_all = [jQuery('#tab-overview'), jQuery('#tab-description'), jQuery('#tab-gallery'), jQuery('#tab-cList'), jQuery('#tab-hotel'), jQuery('#tab-eng'), jQuery('#tab-college--'), jQuery('#tab-news')];
    	var tab_content = [jQuery('#bodyOverview'), jQuery('#bodyDescription'), jQuery('#bodyGallery'), jQuery('#bodyCList'), jQuery('#bodyHotel'), jQuery('#bodyEng'), jQuery('#bodyCollege--'), jQuery('#bodyNews')];

    	tabSwitch(btnTab_all);

    	function tabSwitch(btnTab_id) {
    		jQuery.each(btnTab_id, function(index, value){
    			this.click(function(mouseI, mouseV){
    				
    				//  change Tab btn color
    				jQuery('.ctm-tab-top__title').removeClass('ctm-tab-top__title-active');
		    		btnTab_all[index].addClass('ctm-tab-top__title-active');

		    		//  hide current page
		    		jQuery.each(tab_content, function(cI, cV){
		    			this.hide();
		    		});
		    		
		    		//  show target page
		    		tab_content[index].show();
		    		tab_content[index].addClass('animated fadeInLeft');

		    		//  hide school suggest at bottom
		    		if (index != 0){
		    			jQuery('.row-otherSchool').hide();
		    		}
		    		else
		    			jQuery('.row-otherSchool').show();
		    	});
    		});
    	}

    </script>

    <!-- ========================================================================================================= -->
	<!-- ______________________________        Course-List(show-more-Filter)        ______________________________ -->
	<!-- ========================================================================================================= -->
    <script type="text/javascript">
    	
    	var filtOpt__opened = 0;
    	var filtOpt__hover = 0;
    	var filtOpt__hoverBox = 0;

    	jQuery('.ctm-btnFilter__more').click(function(){
    		//  hide Filter-Opt [if opened]
    		if (filtOpt__opened == 1 && filtOpt__hoverBox == 0){
				filtOption_boxClose();
			}
			else{ //  show Filter-Opt
				jQuery('.ctm-btnFilter__moreInner').show();
	    		// jQuery('body').bind();
	    		filtOpt__opened = 1;
			}
    	});

    	/** == option (button-hover) == **/
    	jQuery('.ctm-btnFilter__more').hover(function(){
    		filtOpt__hover =1;
    	}, function(){ filtOpt__hover =0; });
    	/** == option (box-hover) == **/
    	jQuery('.ctm-btnFilter__moreInner').hover(function(){
    		filtOpt__hoverBox =1;
    	}, function(){ filtOpt__hoverBox =0; });
    	/** == non-box (click) == **/
    	jQuery('body').click(function(){
    		if (filtOpt__hover ==0 && filtOpt__opened == 1 && filtOpt__hoverBox == 0){
				filtOption_boxClose();
			}
    	});

    	function filtOption_boxClose(){
    		jQuery('.ctm-btnFilter__moreInner').hide();
    		// jQuery('body').unbind();
	    	filtOpt__opened = 0;
    	}



    	var filtOptCType__opened = 0;
    	var filtOptCType__hover = 0;
    	var filtOptCType__hoverBox = 0;

    	jQuery('.ctm-btnFilter__moreCType').click(function(){
    		//  hide Filter-Opt [if opened]
    		if (filtOptCType__opened == 1 && filtOptCType__hoverBox == 0){
				filtOption_boxCloseC();
			}
			else{ //  show Filter-Opt
				jQuery('.ctm-btnFilter__moreInnerCType').show();
	    		// jQuery('body').bind();
	    		filtOptCType__opened = 1;
			}
    	});

    	/** == option (button-hover) == **/
    	jQuery('.ctm-btnFilter__moreCType').hover(function(){
    		filtOptCType__hover =1;
    	}, function(){ filtOptCType__hover =0; });
    	/** == option (box-hover) == **/
    	jQuery('.ctm-btnFilter__moreInnerCType').hover(function(){
    		filtOptCType__hoverBox =1;
    	}, function(){ filtOptCType__hoverBox =0; });
    	/** == non-box (click) == **/
    	jQuery('body').click(function(){
    		if (filtOptCType__hover ==0 && filtOptCType__opened == 1 && filtOptCType__hoverBox == 0){
				filtOption_boxCloseC();
			}
    	});

    	function filtOption_boxCloseC(){
    		jQuery('.ctm-btnFilter__moreInnerCType').hide();
    		// jQuery('body').unbind();
	    	filtOptCType__opened = 0;
    	}

    </script>
    
</body>
</html>