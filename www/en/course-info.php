<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';

define('EMPTYTMP_UPDATING', 'Updating...');
define('EMPTYTMP_UNAVAILABLE', 'Unavailable');

// /en/course-info.php

if (empty($id)) {
    header("Location: search-course");
    die;
}

//检测文档正确性
$row = $dosql->GetOne("SELECT c.id,c.inst_id,c.name,c.name_en,c.fees,c.hours,c.months,c.intro,c.description,c.description_en,c.field_id_p,c.field_id_c,l.name_en AS `level` FROM course c LEFT JOIN level l ON l.id=c.level_id WHERE c.id=$id");

if (empty($row)) {
    header("Location: search-course");
    die;
}

$sch = $dosql->GetOne("SELECT * FROM `institution` WHERE id=" . $row['inst_id']);
if (is_array($row)) {
    //增加一次点击量
    // $dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");

    $newsTit = $row['name_en'];
    // $time = GetDateTime($row['posttime']);
    // $hits = $row['hits'];
    // $author = $row['author'];

    if ($row['description_en'] != '') {
        $cont = GetContPage($row['description_en']);
    } else if ($row['description'] != '') {
        $cont = GetContPage($row['description']);
    } else {
        $cont = EMPTYTMP_UPDATING;
    }
}

if (strpos($row['months'], '-')) {
    $cDuration_yr = '';
} else {
    $cDuration_yr = ' / approx. ' . round($row['months'] / 12) . ' year(s)';
}

if ($row['fees'] == 0) {
    $fees_format = EMPTYTMP_UNAVAILABLE;
} else {
    $fees = $row['fees'];
    if (empty($_COOKIE['gc_currency'])) {
        $currency_code = 'AUD';
    } else {
        $currency_code = str_replace('"', "", $_COOKIE['gc_currency']);
    }
    $c_base = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE id = 1;");
    $c_base = $c_base['rate'];
    $c_target = $dosql->GetOne("SELECT code,name,rate,symbol FROM `currency` WHERE code = '$currency_code' ;");
    $fees = $fees * $c_target['rate'] / $c_base;
    $fees = round($fees, -3);
    $fees_bf_3 = substr($fees, 0, -3);
    $fees_last_3 = substr($fees, -3);
    $fees_format = $c_target['symbol'] . $fees_bf_3 . ',' . $fees_last_3 . ' ' . $c_target['code'];
}

$faculty = $dosql->GetOne("SELECT * FROM `field` WHERE id='" . $row['field_id_p'] . "' ");
$cMajor = $dosql->GetOne("SELECT * FROM `field` WHERE id='" . $row['field_id_c'] . "' ");

$faculty_cTitle = empty($faculty['name_en']) ? $faculty['name'] : $faculty['name_en'];
$cMajor_title = empty($cMajor['name_en']) ? $cMajor['name'] : $cMajor['name_en'];

?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo ($newsTit); ?> | CT21 Search Platform</title>
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

		/* .ul-course-feat li span {
			display: inline-block;
		} */

		.course-feat-li {
			font-size: 13px;
			line-height: 49px;
			border-bottom: 1px solid #e3e3e3;
		}

		.course-feat-ul {
			margin-bottom: 28px;
		}

		.course-feat-li .time {
			float: right;
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
					<?php $picarr = unserialize($sch['pics']);
if (!empty($picarr)) {
    $v = explode(',', $picarr[0]);
} else {
    $v = [''];
}

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

								<a href="school-info.php?id=<?php echo ($sch['id']); ?>"><img class="animated fadeIn ctm-header__logo" src="./../<?php echo ($sch['badge']); ?>"
										width="" height="" style="border-radius: 10px;" loading="lazy" title="Insititution - <?php echo ($sch['name_en']); ?>" /></a>
								<!-- [Logo] -->
								<!-- <div class="kingster-page-caption"><?php //echo($sch['cname']);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></div> -->
								<!-- <h1 class="kingster-page-title"><?php //echo($sch['title']);;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?></h1> -->

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




									<div class="course-widget-price">
										<h4 class="course-title">Course Features</h4>
										<div class="course-feat-ul">
											<div class="course-feat-li">
												<i class="fa fa-clock-o" aria-hidden="true"></i> <!-- fa-leanpub -->
												<span><b>Duration</b></span> <!-- （weekly/yearly） -->
												<span class="time"><?php echo ($row['months']); ?> month(s)<?php echo $cDuration_yr; ?></span>
											</div>
											<div class="course-feat-li">
												<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
												<span><b>Education type</b></span>
												<span class="time"><?php echo $row['level']; ?></span>
											</div>
											<div class="course-feat-li">
												<i class="fa fa-university" aria-hidden="true"></i>
												<span><b>Institution</b></span>
												<span class="time"><?php echo ($sch['name_en']); ?></span>
											</div>
											<div class="course-feat-li">
												<i class="fa fa-users" aria-hidden="true"></i>
												<span><b>Faculty</b></span>
												<span class="time"><?php echo ($faculty_cTitle); ?></span>
											</div>
											<div class="course-feat-li">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i>
												<span><b>Major</b></span>
												<span class="time"><?php echo ($cMajor_title); ?></span>
											</div>
										</div>

										<h5 class="bt-course">Fees: <span><?php echo $fees_format; ?></span></h5>
										<div class="apply">
											<a class="flat-button bg-orange custom-button_noBorder course-apply"
												style="color: white; font-weight: bold; font-size:18px;padding:0px 25px;" href="#">APPLY</a>
										</div>
									</div>
								</div>

								<div class="sidebar col-md-5" style="margin-top: 20px; margin-right: 86px;">
									<div class="widget widget-categories">
										<h4 class="course-title">Suggested Institution</h4>
										<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list"
											style="padding-left: 0; padding-right: 0;">
											<?php
// $dopage->GetPage("SELECT * FROM `#@__infoimg` WHERE classid=10 AND state=" . $sch['state'] . " AND id!=" . $sch['id'] . " AND delstate='' AND checkinfo=true ORDER BY hits ASC", 6);
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

	<iframe name="apply_popup" id="apply_popup" style="border-radius: 10px;" frameborder="0" width="100%" height="100%" src=""></iframe>
	<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/layer/3.3.0/layer.min.js"
		integrity="sha512-ivbamoACV0tsZQmTH/TYOxU405DRH76I5hJCvK2+i8x7Vv+FE/w1Ouc/v+W5ISLg/2wliVjZe2+lo6DXvrEjoQ==" crossorigin="anonymous"></script>
	<!-- <script type='text/javascript' src='kingster-js/jquery/jquery.js'></script> -->
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

		$(".course-apply").click(e => {
			const urlParams = new URLSearchParams(window.location.search);
			const course_id = urlParams.get('id');
			form = layer.open({
				type: 2,
				title: 'Course Apply',
				shade: 0.8,
				area: ['680px', '90%'],
				content: `course-apply?cid=${course_id}`,
			});
			return false;
		});
	</script>

</body>

</html>