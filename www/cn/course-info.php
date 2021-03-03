<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';

$cid = empty($cid) ? 5 : intval($cid);
$sch = $dosql->GetOne("SELECT * FROM `institution` WHERE id=" . $cid);

//检测文档正确性
$row = $dosql->GetOne("SELECT c.id,c.name,c.ename,c.fees,c.hours,c.intro,c.description,c.field_id_p,c.field_id_c,l.name AS `level` FROM course c LEFT JOIN level l ON l.id=c.level_id WHERE c.id=$id");

#region philip 2021-02-19
if (is_array($row)) {
//增加一次点击量
    // $dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");

    $newsTit = $row['name'];
    // $time = GetDateTime($row['posttime']);
    // $hits = $row['hits'];
    // $author = $row['author'];

    if ($row['description'] != '') {
        $cont = GetContPage($row['description']);
    } else {
        $cont = '网站资料更新中...';
    }
}

#endregion

// check if duration contain '-'
if (strpos($row['hours'], '-')) {
    $cDuration_yr = '';
} else {
    $cDuration_yr = ' / 大约 ' . ceil($row['hours'] / 52) . ' 年';
}

// formatting 'fees' to $2,000 etc
$fees = $row['fees'];

$fees_bf_3 = substr($fees, 0, -3);
$fees_last_3 = substr($fees, -3);

if ($row['fees'] == 0) {
    $fees_format = '无法显示';
} else {
    $fees_format = '$' . $fees_bf_3 . ',' . $fees_last_3 . ' 澳元';
}

$faculty = $dosql->GetOne("SELECT * FROM `field` WHERE id='" . $row['field_id_p'] . "' ");
$cMajor = $dosql->GetOne("SELECT * FROM `field` WHERE id='" . $row['field_id_c'] . "' ");

$faculty_cTitle = empty($faculty['name']) ? '暂无' : $faculty['name'];
$cMajor_title = empty($cMajor['name']) ? '暂无' : $cMajor['name'];

?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo ($newsTit); ?> | 潮流搜索平台</title>
	<!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->

	<!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
	<?php include_once '_dynamic_siteSetting/icon-setting.php';?>
	<!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->


	<!-- (Theme) kingster -->
	<link rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-css/style-core.css' type='text/css' media='all' />
	<link rel='stylesheet' href='kingster-css/kingster-style-custom.css' type='text/css' media='all' />

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
	<link rel='stylesheet'
		href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3'
		type='text/css' media='all' />


	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Bootstrap  -->
	<link rel="stylesheet" type="text/css" href="educate-stylesheets/bootstrap.css">

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
			.course-widget-price {
				width: 80% !important;
			}
		}

		@media only screen and (max-width: 448px) {
			.course-widget-price {
				width: 100%;
			}
		}
	</style>
	<!-- ==========  (custom) Style [only this pg]  ========== -->


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
					<?php $picarr = unserialize($sch['pics']);?>

					<?php
// foreach($picarr as $k){
//   $v = explode(',', $k);
$v = explode(',', $picarr[0]);
?>
					<div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url('./../<?php echo $v[0]; ?>');"
						loading="lazy">
						<!-- [Background-Image] -->

						<div class="kingster-header-transparent-substitute"></div>
						<div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div>
						<div class="kingster-page-title-overlay"
							style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)) !important; opacity: 0.9;"></div>

						<div class="kingster-page-title-container kingster-container">
							<div class="kingster-page-title-content kingster-item-pdlr ctm-header__content"
								style="padding-top: 2.5% !important; padding-bottom: 2.5% !important;">

								<a href="school-info.php?id=<?php echo ($sch['id']); ?>"><img class="animated fadeIn ctm-header__logo"
										src="./../<?php echo ($sch['badge']); ?>" width="" height="" style="border-radius: 10px;" loading="lazy"
										title="院校 - <?php echo ($sch['name']); ?>" /></a> <!-- [Logo] -->
								<!-- <div class="kingster-page-caption"><?php //echo($sch['cname']);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
								<!-- <h1 class="kingster-page-title"><?php //echo($sch['title']);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></h1> -->

							</div>
						</div>

					</div>

					<!-- ===============        (theme) educate        =============== -->
					<section class="main-content blog-posts course-single ctm-pgSchool__section" style="">
						<!-- padding:100px -->
						<div class="container">

							<div class="row">
								<div class="animated fadeInUp" style="text-align: center; margin-bottom: 50px;">
									<!-- ====================     << Title >>     ==================== -->
									<h1 class="bold ctm-pgSchool__title" style="font-size: 40px; margin-bottom: 0; line-height: normal;"><?php echo ($newsTit); ?></h1>
									<!-- (Chinese) -->


									<!-- ====================     << Location >>     ==================== -->

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
			                            </div> -->
										<!-- /.feature-post -->


										<div class="entry-content">

											<!-- <h4 class="title-1 bold">ABOUT THE COURSES</h4> -->
											<p style="padding: 0 2%;">
												<?php echo ($cont); ?>
											</p>

										</div><!-- /.entry-post -->

									</div><!-- /blog-title-single -->
								</div><!-- /col-md-8 -->


								<!-- ============================================================================================= -->
								<!-- ===================================        [Right]        =================================== -->
								<!-- ============================================================================================= -->
								<div class="col-md-5" style="display: flex; justify-content: center; align-items: center;">

									<div class="course-widget-price" style="float: none !important; margin-right: 0;">

										<h4 class="course-title">课程资讯</h4>

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
												<i class="fa fa-clock-o" aria-hidden="true"></i> <!-- fa-leanpub -->
												<span><b>学时（周/年）</b></span>
												<span class="time"><?php echo ($row['hours']); ?> 周<?php echo $cDuration_yr; ?></span>
											</li>
											<li>
												<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
												<span><b>课程类别</b></span>
												<span class="time"><?php echo $row['level']; ?></span>
											</li>
											<li>
												<i class="fa fa-university" aria-hidden="true"></i>
												<span><b>院校名称</b></span>
												<span class="time"><?php echo ($sch['name']); ?></span>
											</li>
											<!-- <li>
		                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
		                                        <span>Seats Available</span>
		                                        <span class="time">23 Student</span>
		                                    </li> -->
											<li>
												<i class="fa fa-users" aria-hidden="true"></i>
												<span><b>学科</b></span>
												<span class="time"><?php echo ($faculty_cTitle); ?></span>
											</li>
											<li>
												<i class="fa fa-graduation-cap" aria-hidden="true"></i>
												<span><b>主修领域</b></span>
												<span class="time"><?php echo ($cMajor_title); ?></span>
											</li>
										</ul>

										<h5 class="bt-course">学费: <span><?php echo $fees_format; ?></span></h5>
										<a class="flat-button bg-orange custom-button_noBorder" style="color: white; font-weight: bold; font-size:18px;padding:0px 25px;"
											href="http://www.ct21.com.cn/online/online.php?zy=<?php echo urlencode(($newsTit)); ?>&sx=<?php echo urlencode(($sch['name'])); ?>">申请课程</a>
									</div>

								</div>
								<div class="sidebar col-md-5" style="margin-top: 20px; margin-right: 86px;">
									<div class="widget widget-categories">
										<h4 class="course-title">推荐院校</h4>

										<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list"
											style="padding-left: 0; padding-right: 0;">
											<?php
$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=10 AND delstate='' AND checkinfo=true ORDER BY posttime DESC", 6);

while ($sugSchool = $dosql->GetArray()) {
    $data = $sugSchool['linkurl'];
    $get_sID = substr($data, strpos($data, "?id=") + 1);
    $get_sID_filter = filter_var($get_sID, FILTER_SANITIZE_NUMBER_INT);
    // echo '<script>alert('.intval($tst).');</script>';

    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__infoimg` WHERE classid=3 AND id=" . intval($get_sID_filter) . " AND checkinfo=true ORDER BY hits ASC");

    while ($nearbySchool = $Db->GetArray()) {

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
								</div>
							</div>

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
		var btnTab_all = [$('#tab-overview'), $('#tab-description'), $('#tab-gallery'), $('#tab-cList'), $('#tab-hotel'), $('#tab-eng'), $('#tab-college'), $(
			'#tab-news')];
		var tab_content = [$('#bodyOverview'), $('#bodyDescription'), $('#bodyGallery'), $('#bodyCList'), $('#bodyHotel'), $('#bodyEng'), $('#bodyCollege'), $(
			'#bodyNews')];

		tabSwitch(btnTab_all);

		function tabSwitch(btnTab_id) {
			jQuery.each(btnTab_id, function (index, value) {
				this.click(function (mouseI, mouseV) {

					//  change Tab btn color
					$('.ctm-tab-top__title').removeClass('ctm-tab-top__title-active');
					btnTab_all[index].addClass('ctm-tab-top__title-active');

					//  pasue Video in overview
					$('#promotionVid').trigger('pause');

					//  hide current page
					jQuery.each(tab_content, function (cI, cV) {
						this.hide();
					});

					//  show target page
					tab_content[index].show();
					tab_content[index].addClass('animated fadeInLeft');

					//  hide school suggest at bottom
					if (index != 0) {
						$('.row-otherSchool').hide();
					} else
						$('.row-otherSchool').show();
				});
			});
		}
	</script>

</body>

</html>