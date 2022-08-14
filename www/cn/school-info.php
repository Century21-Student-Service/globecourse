<?php

session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
require_once dirname(__FILE__) . './../../vendor/autoload.php';
require_once dirname(__FILE__) . './../../config/credentials.php';
include_once './../ext/news.php';
use Aws\S3\S3Client;

if (strpos($_SERVER['REQUEST_URI'], '&') !== false) {
    $onTab_overview = '';
    $onTab_cList = 'ctm-tab-top__title-active';

    $displayOverview = 'display: none;';
    $displayCList = 'display: ;';
} else {
    $displayOverview = '';
    $onTab_cList = '';
    $onTab_overview = 'ctm-tab-top__title-active';
    $displayCList = 'display: none;';
}

if (empty($id)) {
    header("Location: search-school");
    die;
}
// $sch = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=" . $id);
$sch = $dosql->GetOne("SELECT * FROM `institution` WHERE id=" . $id);
if (empty($sch)) {
    header("Location: search-school");
    die;
}
$state = getCountryAndState($sch['state_id']);
$videos = [];
if ($sch['video']) {
    $dosql->Execute("SELECT id, title, title_en, `path` FROM `upload_video` WHERE `status`=1 AND id IN(" . $sch['video'] . ")");

    $client = new S3Client([
        'version' => 'latest',
        'region' => 'sgp1',
        'endpoint' => S3ENDPOINT,
        'credentials' => [
            'key' => S3KEY,
            'secret' => S3SECRECT,
        ],
    ]);
    while ($row = $dosql->GetArray()) {
        $cmd = $client->getCommand('GetObject', [
            'Bucket' => S3BUCKET,
            'Key' => $row['path'],
        ]);
        $request = $client->createPresignedRequest($cmd, '+45 minutes');
        $row['path'] = (string) $request->getUri();
        array_push($videos, $row);
    }
}
$db = new MySql(false);

// Filter-Buttons -- get session
@$fid = $_GET['fid'];
@$tid = $_GET['tid'];

if (empty($fid)) {
    $fid = 0;
}
if (empty($tid)) {
    $tid = 0;
}

if ($fid == 0) {
    $sql_fid = '';
} else {
    $sql_fid = "AND kcfw LIKE '" . $fid . "__'";
}

if ($tid == 0) {
    $sql_tid = '';
} else {
    $sql_tid = "AND type='" . $tid . "'";
}
; // if( !empty($fid) ){; //     $_SESSION['fid'] = $fid;; //     $sessFaculty = $_SESSION['fid'];; // }; // else{; //     if( empty($_SESSION['fid']) ){; //         $sessFaculty =0;; //     }; //     else{; //         $sessFaculty = $_SESSION['fid'];; //     }; // }; // if( !empty($tid) ){; //     $_SESSION['tid'] = $tid;; //     $sessType = $_SESSION['tid'];; // }; // else{; //     if(empty($_SESSION['tid'])){; //         $sessType =0;; //     }; //     else{; //         $sessType = $_SESSION['tid'];; //     }; // }
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo ($sch['name']); ?> | 潮流搜索平台</title>
	<!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->

	<!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
	<?php include_once '_dynamic_siteSetting/icon-setting.php';?>
	<!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


	<!-- (Theme) kingster -->
	<link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.min.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-css/style-core.min.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-css/kingster-style-custom.min.css' type='text/css' media='all' />

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
	<link rel='stylesheet'
		href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3'
		type='text/css' media='all' />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Bootstrap  -->
	<link rel="stylesheet" type="text/css" href="educate-stylesheets/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="educate-stylesheets/responsive.css">
	<link rel="stylesheet" type="text/css" href="educate-stylesheets/animate.css">

	<!-- (Theme) custom -->
	<link rel="stylesheet" type="text/css" href="custom-css/font.css">
	<link rel="stylesheet" type="text/css" href="custom-css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="custom-css/style_school-info.css">
	<link rel="stylesheet" type="text/css" href="custom-css/style_school-info__fromTemplate.css">
	<link rel="stylesheet" type="text/css" href="custom-css/tab-box.css">

	<style>
		.pagination {
			display: inline-block;
		}

		.pagination button {
			color: black;
			float: left;
			padding: 8px 16px;
			text-decoration: none;
			background-color: transparent;
			line-height: normal;
			height: 40px;
		}

		.pagination button.active {
			background-color: #027dfa;
			color: white;
			border-radius: 5px;
		}

		.pagination button:hover:not(.active) {
			background-color: #ddd;
			border-radius: 5px;
		}

		.course-info-detail {
			width: 45%;
			display: inline-block;
		}

		.video-tab {
			display: none;
			width: 100%;
			height: auto;
			padding-top: 0%;
		}

		.video-tab.active {
			display: inline;
		}

		.tab-panel-video-button {
			cursor: pointer;
			float: left;
			width: auto;
			min-height: 36px;
			display: block;
			outline: 0;
			padding: 8px 16px;
			border: solid 1px #204d74;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			min-width: 75px;
			text-align: center;
		}

		.tab-panel-video-button:hover {
			background-color: #027dfa;
			color: #fff;
		}

		.tab-panel-video-button.active {
			background-color: #027dfa;
			color: #fff;
		}
	</style>
</head>

<body
	class="home page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full  kingster-with-sticky-navigation  kingster-blockquote-style-1 gdlr-core-link-to-lightbox">

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

					<!-- ============================================================================================== -->
					<!-- ===================================        [Header]        =================================== -->
					<!-- ============================================================================================== -->
					<?php

$picarr = unserialize($sch['pics']);
if (empty($picarr)) {
    $v = [''];
} else {
    $v = explode(',', $picarr[0]);
}

?>
					<div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url('./../<?php echo $v[0]; ?>');"
						loading="lazy">
						<!-- [Background-Image] -->

						<div class="kingster-header-transparent-substitute"></div>
						<div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div>

						<div class="kingster-page-title-container kingster-container">
							<div class="kingster-page-title-content kingster-item-pdlr ctm-header__content"
								style="padding-top: 2.5% !important; padding-bottom: 2.5% !important;">

								<a href="school-info.php?id=<?php echo ($sch['id']); ?>"><img class="animated fadeIn ctm-header__logo" src="./../<?php echo ($sch['badge']); ?>"
										width="" height="" style="border-radius: 10px;" loading="lazy" /></a> <!-- [Logo] -->

							</div>
						</div>

					</div>

					<!-- ===============        (theme) educate        =============== -->
					<section class="main-content blog-posts course-single ctm-pgSchool__section" style="">
						<!-- padding:100px -->
						<div class="container">

							<div class="animated fadeInUp" style="text-align: center; margin-bottom: 50px;">

								<!-- ====================     << Title >>     ==================== -->
								<h1 class="bold ctm-pgSchool__title" style="font-size: 40px; margin-bottom: 0; line-height: normal;"><?php echo ($sch['name']); ?></h1>
								<!-- (Chinese) -->
								<h1 class="ctm-pgSchool__title-en" style="font-size: 40px; margin-bottom: 16px;"><small><?php echo ($sch['name_en']); ?></small></h1>
								<!-- (English) -->


								<!-- ====================     << Location >>     ==================== -->
								<ul class="course-meta review style2 clearfix" style="display: flex; justify-content: center; list-style-type: none;">
									<li class="author">
										<p>所属国家</p>
										<a style="color: #545454 !important;"><strong><?php echo $state['country']; ?></strong></a>
									</li>
									<li class="author">
										<p>所属州</p>
										<a style="color: #545454 !important;"><strong><?php echo $state['state']; ?></strong></a>
									</li>
								</ul>
							</div>

							<!-- ====================     << Tab-top >>     ==================== -->
							<div class="ctm-tab-top">
								<div style="border-bottom: 2px solid #027dfa;">

									<h5 id="tab-overview" class="ctm-tab-top__title <?php echo $onTab_overview; ?>">概况</h5>
									<!-- <h5 id="tab-description" class="ctm-tab-top__title">介绍</h5> -->
									<!-- <h5 id="tab-gallery" class="ctm-tab-top__title">图片</h5> -->
									<h5 id='tab-cList' class='ctm-tab-top__title $onTab_cList'>课程列表</h5>

									<?php
if ($sch['id'] == 23) {
    echo '<h5 id="tab-hotel" class="ctm-tab-top__title">酒店管理学院</h5><h5 id="tab-eng" class="ctm-tab-top__title">英语课程</h5>';
}

if ($sch['id'] == 13) {
    echo '<h5 id="tab-publicSchool" class="ctm-tab-top__title">各公立学校介绍</h5>';
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
										<h4 class="title-1 bold ctm-widget-title">院校概述</h4>
										<p style="margin-bottom: 30px; padding: 0 2%;">
											<?php echo ($sch['intro']); ?>
										</p>

										<!-- ====  Video  ==== -->
										<div class="feature-post">
											<?php
if (!empty($videos)) {
    if (count($videos) == 1) {
        echo '<video class="video" controls="controls" src="' . $videos[0]['path'] . '" width="100%" loading="lazy">';
    } else {
        echo '<div class="inner_mid left video_wrap block">';
        echo '<div class="tab-panel">';
        foreach ($videos as $index => $v) {
            $title = empty($v['title']) ? "简介" : $v['title'];
            $active = $index == 0 ? "active" : "";
            echo '<div class="tab-panel-video-button btn-default ' . $active . '" data-for="#v_' . $index . '">' . $title . '</div>';
        }
        echo '</div>';
        echo '<div class="tab-panel-content">';
        foreach ($videos as $index => $v) {
            $active = $index == 0 ? "active" : "";
            echo '<div class=tab-panel-item id="v_' . $index . '">'
                . '<video src="' . $v['path'] . '" controls class="video video-tab ' . $active . '" width="100%" loading="lazy"> 您的浏览器不支持 video 标签。</video>'
                . '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
}?>

											<!-- <img src="./../<?php //echo $v[0]; ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?>" loading="lazy" /> -->
											<!-- <img src="educate-images/blog/bs1.jpg" alt="image"> -->
										</div><!-- /.feature-post -->

										<!-- ====  Description  ==== -->
										<h4 class="title-1 bold ctm-widget-title">院校介绍</h4>
										<p style="margin-bottom: 30px; padding: 0 2%;">
											<?php echo ($sch['description']); ?>
										</p>


										<div class="gdlr-core-portfolio-item-holder gdlr-core-js-2  filter-container clearfix" data-layout="fitrows">

											<?php
if(is_array($picarr)){
foreach ($picarr as $k) {
    $v = explode(',', $k);
    ?>
											<!-- <li><img src="<?php //echo($v[0]);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?>" width="204" height="125" /><div><?php //echo($v[1]);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div></li> -->
											<div class="gdlr-core-item-list class1 gdlr-core-item-pdlr gdlr-core-column-20" style="padding-left: 10px; padding-right: 10px;">
												<div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
													<div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
														<div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover"
															style="border-radius: 6px; box-shadow: 0px 2px 8px #0000008a; transition: all .3s ease;">

															<a class="gdlr-core-lightgallery gdlr-core-js " href="./../<?php echo ($v[0]); ?>" data-lightbox-group="gdlr-core-img-group-1">

																<img src="./../<?php echo ($v[0]); ?>" width="100%" height="100%" alt="" style="height: 140px; object-fit: cover;"
																	loading="lazy" />

																<span class="gdlr-core-image-overlay  gdlr-core-portfolio-overlay gdlr-core-image-overlay-center-icon gdlr-core-js"
																	style="display: flex; justify-content: center; align-items: center; border-radius: 6px;">
																	<span style="line-height: 1.55;">
																		<!-- class="gdlr-core-image-overlay-content" -->
																		<span class="gdlr-core-portfolio-icon-wrap"><i class="gdlr-core-portfolio-icon arrow_expand"></i></span>
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
}
?>

										</div>

									</div><!-- /blog-title-single -->
								</div><!-- /col-md-8 -->

								<!-- ====================     << Course-List >>     ==================== -->
								<div class="col-md-8" id="bodyCList" style="<?php echo $displayCList; ?>" loading="lazy">
									<div class="blog-title-single">

										<!-- ==========  Title  ========== -->
										<h4 class="title-1 bold ctm-widget-title" id="title_course">课程列表</h4>

										<!-- ==========  Content  ========== -->
										<div class="gdlr-core-pbf-element">
											<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list-info ctm-itemList_cList_mob">


												<!-- ==========  Filter (faculty)  ========== -->
												<div class="row" style="margin: 0px 5px 10px;">

													<!-- ====  faculty  ==== -->
													<h6 style="display: inline-block; margin-bottom: 0; padding: 8px 2px; font-weight: bold;"><span>学科类别：</span></h6>

													<!-- ====  buttons  ==== -->
													<div class="ctmn-rowFilter">
														<div class="ctmn-rowFilterInner btn-fields" style="display: inline-block; font-weight: bold;">

															<!-- ====  (All)  ==== -->
															<div class="animated fadeIn ctm-btnFilter btn-filter-field ctm-btnFilter__active" data-fieldid="0"><span>全部</span></div>
															<!-- ====  (currently-Filtered)  ==== -->
														</div>
													</div>

												</div>


												<!-- ==========  Filter (course-type)  ========== -->
												<div class="row" style="margin: 0px 5px 30px;">
													<h6 style="display: inline-block; margin-bottom: 0; padding: 8px 2px; font-weight: bold;"><span>课程学位：</span></h6>
													<div class="ctmn-rowFilter">
														<div class="ctmn-rowFilterInner btn-levels" style="display: inline-block; font-weight: bold;">
															<div class="animated fadeIn ctm-btnFilter btn-filter-level ctm-btnFilter__active" data-levelid="0"> <span>全部</span></div>
														</div>
													</div>

												</div>


												<!-- ==========  List-Course  ========== -->
												<div class="ctm-table__pageBtn"></div>
												<div class="courses-list"></div>
												<div class="ctm-table__pageBtn"></div>
											</div>
										</div>

									</div><!-- /blog-title-single -->
								</div><!-- /col-md-8 -->

								<!-- ======================================================================================================= -->
								<!-- ====================     << Public-School-Info >>     ==================== -->
								<div class="col-md-8" id="bodyPublicSchool" style="display: none;">
									<div class="blog-title-single">

										<?php echo ($sch['extra']); ?>

									</div><!-- /blog-title-single -->
								</div><!-- /col-md-8 -->
								<!-- ====================     << Hotel >>     ==================== -->

								<!-- =============================================================================================== -->
								<!-- ===================================        [Sidebar]        =================================== -->
								<!-- =============================================================================================== -->
								<div class="sidebar">
									<!-- ====================     << Popular-Courses >>     ==================== -->
									<div class="widget widget-categories">
										<h5 class="widget-title">热门课程</h5>

										<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="">
											<?php
$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=2  AND delstate='' AND cbh='" . $id . "' AND checkinfo=true ORDER BY orderid DESC", 5);

while ($row = $dosql->GetArray()) {
    if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
        $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
    } else if ($cfg_isreurl == 'Y') {
        $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
    } else {
        $gourl = $row['linkurl'];
    }

    $row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=" . $row['classid']);
    if ($cfg_isreurl != 'Y') {
        $gourl2 = 'news.php?cid=' . $row['classid'];
    } else {
        $gourl2 = 'news-' . $row['classid'] . '-1.html';
    }

    ?>
											<div class="gdlr-core-course-item-list ctm-itemList__sidebar"><a class="gdlr-core-course-item-link"
													href="course-info.php?cid=<?php echo ($id); ?>&id=<?php echo ($row['id']); ?>">
													<!-- <span class="gdlr-core-course-item-id gdlr-core-skin-caption" ></span> -->
													<span class="gdlr-core-course-item-title gdlr-core-skin-title" style="font-weight: bold;"><?php echo ($row['title']); ?></span>
													<!-- <span><?php //echo(getCType($row['type']));;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></span> -->
													<i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" style="font-size: 16px;"></i></a>
											</div>
											<?php
}
?>
										</div>

									</div>

									<!-- ====================     << Universities-Comparison >>     ==================== -->
									<div class="widget widget-categories">
										<h5 class="widget-title">各大学评比</h5>

										<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="">
											<?php
$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=8  AND delstate='' AND checkinfo=true ORDER BY orderid DESC", 5);

while ($row = $dosql->GetArray()) {
    if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
        $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
    } else if ($cfg_isreurl == 'Y') {
        $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
    } else {
        $gourl = $row['linkurl'];
    }

    ?>
											<div class="gdlr-core-course-item-list ctm-itemList__sidebar"><a class="gdlr-core-course-item-link"
													href="info-immigration-article.php?cid=<?php echo ($row['id']); ?>">
													<span class="gdlr-core-course-item-title gdlr-core-skin-title" style="font-weight: bold;"><?php echo ($row['title']); ?></span>
													<i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" style="font-size: 16px;"></i></a>
											</div>
											<?php
}
?>
										</div>

									</div>

									<!-- ====================     << School-Suggestions >>     ==================== -->
									<div class="widget widget-categories">
										<h5 class="widget-title">推荐院校</h5>

										<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list"
											style="padding-left: 0; padding-right: 0;">
											<?php
$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=10 AND delstate='' AND checkinfo=true ORDER BY posttime DESC", 6);

while ($sugSchool = $dosql->GetArray()) {
    $data = $sugSchool['linkurl'];
    $get_sID = substr($data, strpos($data, "?id=") + 1);
    $get_sID_filter = filter_var($get_sID, FILTER_SANITIZE_NUMBER_INT);
    // echo '<script>alert('.intval($tst).');</script>';

    $db = new MySql(false);
    $db->Execute("SELECT * FROM `#@__infoimg` WHERE classid=3 AND id=" . intval($get_sID_filter) . " AND checkinfo=true ORDER BY hits ASC");

    while ($nearbySchool = $db->GetArray()) {

        // $nUni_img = unserialize($nearbySchool['picarr']);
        // $img_V = explode(',', $nUni_img[0]);

        $page = "school-info.php";
        ?>
											<div class="animated fadeIn gdlr-core-pbf-column gdlr-core-column-60" style="text-align: center; margin-bottom: 10px;"
												onclick="parent.location.href='<?php echo ($page); ?>?id=<?php echo ($nearbySchool['id']); ?>';">
												<div>
													<img src="./../<?php echo ($nearbySchool['picurl']); ?>" class="ctm-nearbyUni__img" style="height: 120px !important;"
														loading="lazy" />
												</div>
												<h6 style="margin-top: 10px;"><?php echo ($nearbySchool['title']); ?></h6>
											</div>
											<?php
}
}
?>
										</div>

									</div>

								</div><!-- /sidebar -->
							</div><!-- /row -->

						</div><!-- /container -->
					</section><!-- /main-content -->

					<!-- ===============        /(theme) educate        =============== -->
				</div>
			</div>
			<div style="padding: 20px 0;"></div>

			<!-- ================================================================================== -->
			<!-- ______________________________        Footer        ______________________________ -->
			<!-- ================================================================================== -->
			<?php include_once '_dynamic_siteSetting/footer.php';?>

			<!-- ============================================================================================== -->
			<!-- ______________________________        (end) Body [outer]        ______________________________ -->
			<!-- ============================================================================================== -->
		</div>
	</div>

	<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<script type='text/javascript' src='kingster-js/jquery/jquery-migrate.min.js'></script>
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


	<!-- ==========  (custom) JavaScript  ========== -->
	<script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
	<!-- ==========  (custom) JavaScript  ========== -->

	<!-- =============================================================================================== -->
	<!-- ______________________________        (custom) Tab-button        ______________________________ -->
	<!-- =============================================================================================== -->
	<script type="text/javascript">
		//  pasue Video in overview
		jQuery('#promotionVid').trigger('pause');

		var btnTab_all = [jQuery('#tab-overview'), jQuery('#tab-description'), jQuery('#tab-gallery'), jQuery('#tab-cList'), jQuery('#tab-hotel'), jQuery('#tab-eng'),
			jQuery('#tab-college--'), jQuery('#tab-news'), jQuery('#tab-publicSchool')
		];
		var tab_content = [jQuery('#bodyOverview'), jQuery('#bodyDescription'), jQuery('#bodyGallery'), jQuery('#bodyCList'), jQuery('#bodyHotel'), jQuery(
			'#bodyEng'), jQuery('#bodyCollege--'), jQuery('#bodyNews'), jQuery('#bodyPublicSchool')];

		tabSwitch(btnTab_all);

		function tabSwitch(btnTab_id) {
			jQuery.each(btnTab_id, function (index, value) {
				this.click(function (mouseI, mouseV) {

					//  change Tab btn color
					jQuery('.ctm-tab-top__title').removeClass('ctm-tab-top__title-active');
					btnTab_all[index].addClass('ctm-tab-top__title-active');

					//  hide current page
					jQuery.each(tab_content, function (cI, cV) {
						this.hide();
					});

					//  show target page
					tab_content[index].show();
					tab_content[index].addClass('animated fadeInLeft');

					//  hide school suggest at bottom
					if (index != 0) {
						jQuery('.row-otherSchool').hide();
					} else
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

		jQuery('.ctm-btnFilter__more').click(function () {
			//  hide Filter-Opt [if opened]
			if (filtOpt__opened == 1 && filtOpt__hoverBox == 0) {
				filtOption_boxClose();
			} else { //  show Filter-Opt
				jQuery('.ctm-btnFilter__moreInner').show();
				// jQuery('body').bind();
				filtOpt__opened = 1;
			}
		});

		/** == option (button-hover) == **/
		jQuery('.ctm-btnFilter__more').hover(function () {
			filtOpt__hover = 1;
		}, function () {
			filtOpt__hover = 0;
		});
		/** == option (box-hover) == **/
		jQuery('.ctm-btnFilter__moreInner').hover(function () {
			filtOpt__hoverBox = 1;
		}, function () {
			filtOpt__hoverBox = 0;
		});
		/** == non-box (click) == **/
		jQuery('body').click(function () {
			if (filtOpt__hover == 0 && filtOpt__opened == 1 && filtOpt__hoverBox == 0) {
				filtOption_boxClose();
			}
		});

		function filtOption_boxClose() {
			jQuery('.ctm-btnFilter__moreInner').hide();
			// jQuery('body').unbind();
			filtOpt__opened = 0;
		}



		var filtOptCType__opened = 0;
		var filtOptCType__hover = 0;
		var filtOptCType__hoverBox = 0;

		jQuery('.ctm-btnFilter__moreCType').click(function () {
			//  hide Filter-Opt [if opened]
			if (filtOptCType__opened == 1 && filtOptCType__hoverBox == 0) {
				filtOption_boxCloseC();
			} else { //  show Filter-Opt
				jQuery('.ctm-btnFilter__moreInnerCType').show();
				// jQuery('body').bind();
				filtOptCType__opened = 1;
			}
		});

		/** == option (button-hover) == **/
		jQuery('.ctm-btnFilter__moreCType').hover(function () {
			filtOptCType__hover = 1;
		}, function () {
			filtOptCType__hover = 0;
		});
		/** == option (box-hover) == **/
		jQuery('.ctm-btnFilter__moreInnerCType').hover(function () {
			filtOptCType__hoverBox = 1;
		}, function () {
			filtOptCType__hoverBox = 0;
		});
		/** == non-box (click) == **/
		jQuery('body').click(function () {
			if (filtOptCType__hover == 0 && filtOptCType__opened == 1 && filtOptCType__hoverBox == 0) {
				filtOption_boxCloseC();
			}
		});

		function filtOption_boxCloseC() {
			jQuery('.ctm-btnFilter__moreInnerCType').hide();
			// jQuery('body').unbind();
			filtOptCType__opened = 0;
		}
	</script>

	<!-- Philip 2021-02-19 -->
	<script>
		const urlParams = new URLSearchParams(window.location.search);
		const inst_id = urlParams.get('id');
		let ALLCOURSE, ALLLEVELS, ALLFIELDS, DISPLAYCOURSE;
		$(function () {
			$.get("util/getCourseByInst?iid=" + inst_id, res => {
				res = JSON.parse(res);
				// console.log(res);
				ALLCOURSE = res.course;
				ALLLEVELS = res.levels;
				ALLFIELDS = res.fields;

				res.fields.forEach(e => {
					$(".ctmn-rowFilterInner.btn-fields").append(
						`<div class="animated fadeIn ctm-btnFilter btn-filter-field" data-fieldid="${e.id}"><span>${e.name}</span></div>`);
				});

				res.levels.forEach(e => {
					$(".ctmn-rowFilterInner.btn-levels").append(
						`<div class="animated fadeIn ctm-btnFilter btn-filter-level" data-levelid="${e.id}"><span>${e.name}</span></div>`);
				});

				$(".btn-filter-field").click(e => {
					$(".btn-filter-field").removeClass('ctm-btnFilter__active');
					$(e.currentTarget).addClass('ctm-btnFilter__active');
					refreshCourse(1);
				});

				$(".btn-filter-level").click(e => {
					$(".btn-filter-level").removeClass('ctm-btnFilter__active');
					$(e.currentTarget).addClass('ctm-btnFilter__active');
					refreshCourse(1);
				});

				refreshCourse(1);
			});
			$(".tab-panel-video-button").click(function (e) {
				const target = e.currentTarget;
				$(".tab-panel-video-button").removeClass("active");
				target.classList.add("active");
				$(".video-tab").removeClass("active");
				$(".video-tab").each((i, e) => e.pause());
				$(target.dataset.for+">video").addClass("active");
				$(target.dataset.for+">video").removeAttr("muted");
				document.querySelector(target.dataset.for+">video").play();
			});
		});

		function refreshCourse(page) {
			if (ALLCOURSE.length == 0) {
				$("#tab-cList").hide();
				return;
			}
			const fieldid = $(".btn-filter-field.ctm-btnFilter__active").data("fieldid");
			const levelid = $(".btn-filter-level.ctm-btnFilter__active").data("levelid");
			// console.log(fieldid, levelid);
			let data = [...ALLCOURSE];
			$(".courses-list").html("");

			if (fieldid > 0) {
				data = data.filter(e => e.field_id_p == fieldid);
			}
			if (levelid > 0) {
				data = data.filter(e => e.level_id == levelid);
			}

			const maxPage = Math.ceil(data.length / 10);
			renderCourse(data.slice(10 * page - 10, 10 * page));
			if (data.length > 0) {
				let str = `<div class="pagination"><button class="a-page " data-page="1">首页</a>`;
				str += `<button class="a-page  active" data-page="1">1</a>`;
				for (let i = 2; i <= maxPage; i++) {
					str += `<button class="a-page " data-page="${i}">${i}</a>`;
				}
				str += `<button class="a-page " data-page="${maxPage}">尾页</a></div>`;
				$(".ctm-table__pageBtn").html(str);

				$(".a-page").click(e => {
					const p = $(e.currentTarget).data("page");
					$(".a-page").removeClass("active");
					$(`.a-page[data-page=${p}]`).addClass("active");
					renderCourse(data.slice(10 * p - 10, 10 * p));
				});
			} else {
				$(".ctm-table__pageBtn").html("");
			}
		}



		function renderCourse(data) {
			let str_course = "";
			data.forEach(e => {
				let level = "",
					field_c = "暂无",
					field_p = "暂无",
					hours = isNaN(e.hours) ? "暂无" : e.hours + " 周 / 约 " + Math.ceil(e.hours / 52) + " 年",
					months = isNaN(e.months) ? "暂无" : e.months + " 个月 / 约 " + Math.round(e.months / 12) + " 年",
					fees = e.fees == 0 ? "无法显示" : "$" + formatMoney(e.fees, 0, '.', ',') + " / 年";

				for (let i = 0; i < ALLFIELDS.length; i++) {
					if (ALLFIELDS[i].id == e.field_id_p) {
						field_p = ALLFIELDS[i].name;
						for (let j = 0; j < ALLFIELDS[i].children.length; j++) {
							if (ALLFIELDS[i].children[j].id == e.field_id_c) {
								field_c = ALLFIELDS[i].children[j].name;
								break;
							}
						}
						break;
					}
				}

				for (let i = 0; i < ALLLEVELS.length; i++) {
					if (ALLLEVELS[i].id == e.level_id) {
						level = ALLLEVELS[i].name;
						break;
					}
				}

				str_course += `<div class="gdlr-core-course-item-list ctm-pgSchool__itemList"
													style="background-color: #f2f2f270; border: 1px solid #dbdbdb59; border-radius: 20px; box-shadow: 0px 0px 10px #c5c5c59e; padding: 30px 52px;">
													<h3 class="gdlr-core-course-item-title"> ${e.name}</h3>
													<div class="gdlr-core-course-item-info-wrap">
														<div class="gdlr-core-course-item-info"><span class="gdlr-core-head">课程类别 : </span><span
																class="gdlr-core-tail">${level}</span></div>
														<div class="gdlr-core-course-item-info course-info-detail"><span class="gdlr-core-head">学科 : </span><span
																class="gdlr-core-tail">${field_p}</span></div>
														<div class="gdlr-core-course-item-info course-info-detail"><span class="gdlr-core-head">主修领域 : </span><span
																class="gdlr-core-tail">${field_c}</span></div>
														<div class="gdlr-core-course-item-info course-info-detail"><span class="gdlr-core-head">课时 : </span><span
																class="gdlr-core-tail">${months}</span></div>
														<div class="gdlr-core-course-item-info course-info-detail"><span class="gdlr-core-head">学费 : </span><span
																class="gdlr-core-tail">${fees}</span></div>
													</div>
													<a href="course-info.php?cid=${inst_id}&id=${e.id}"
														class="gdlr-core-course-item-button gdlr-core-button custom-button_noBorder">查看详情</a>
												</div>`;
			});
			$(".courses-list").html(str_course);
		}

		function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
			try {
				decimalCount = Math.abs(decimalCount);
				decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

				const negativeSign = amount < 0 ? "-" : "";

				let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
				let j = (i.length > 3) ? i.length % 3 : 0;

				return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math
					.abs(amount - i).toFixed(decimalCount).slice(2) : "");
			} catch (e) {
				console.log(e)
			}
		}
	</script>
</body>

</html>