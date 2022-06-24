<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';

define('EMPTYTMP_UPDATING', 'Updating...');
define('EMPTYTMP_UNAVAILABLE', 'Unavailable');

// /en/course-info.php

$id = $_GET['id'];
if (empty($id)) {
    header("Location: search-course");
    die;
}

//检测文档正确性
$row = $dosql->GetOne("SELECT * FROM course_spe WHERE id=$id");

if (empty($row)) {
    header("Location: search-course");
    die;
}

$dosql->ExecNoneQuery("UPDATE course_spe SET read_count=read_count+1 WHERE id=$id");


if (is_array($row)) {
    //增加一次点击量
    // $dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");

    $newsTit = $row['title_en'];
    // $time = GetDateTime($row['posttime']);
    // $hits = $row['hits'];
    // $author = $row['author'];

    if ($row['content_en'] != '') {
        $cont = GetContPage($row['content_en']);
    } else if ($row['content'] != '') {
        $cont = GetContPage($row['content']);
    } else {
        $cont = EMPTYTMP_UPDATING;
    }
}


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
					
					<div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align" style="background-image: url('<?php echo $row['image']; ?>');"
						loading="lazy">
						<!-- [Background-Image] -->

						<div class="kingster-header-transparent-substitute"></div>
						<div class="kingster-page-title-overlay" style="background-color: #192f59; opacity: 0.9;"></div>
						<div class="kingster-page-title-overlay"
							style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)) !important; opacity: 0.9;"></div>

						<div class="kingster-page-title-container kingster-container">
							<div class="kingster-page-title-content kingster-item-pdlr ctm-header__content"
								style="padding-top: 2.5% !important; padding-bottom: 2.5% !important;">

								<img class="animated fadeIn ctm-header__logo" src="<?php echo $row['image']; ?>"
										width="" height="" style="border-radius: 10px;" loading="lazy" title="Insititution - <?php echo ($row['tag_en']); ?>" />
										
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
									<h1 class="bold ctm-pgSchool__title" style="font-size: 30px; margin-bottom: 0; line-height: normal;"><?php echo ($newsTit); ?></h1>
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
								



								<div class="sidebar col-md-5" style="margin-top: 20px; margin-right: 86px;">
									<div class="widget widget-categories">
										<h4 class="course-title">Suggested Institution</h4>
										<div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list"
											style="padding-left: 0; padding-right: 0;">
											<?php
$course_spe_list = array();
$dosql->Execute("select id, title, title_en, tag, tag_en, image from course_spe where id != {$id} order by sort desc, id desc");
while(1){
	$item = $dosql->GetArray();
	if($item == null) break;
	$course_spe_list[] = $item;
}
foreach ($course_spe_list as $item){
        ?>
											<div class="animated fadeIn gdlr-core-pbf-column gdlr-core-column-60" style="text-align: center; margin-bottom: 10px;"
												onclick="parent.location.href='course-spe-info.php?id=<?php echo ($item['id']); ?>';">
												<div>
													<img src="<?php echo ($item['image']); ?>" class="ctm-nearbyUni__img" style="height: 120px !important;"
														loading="lazy" />
												</div>
												<h6 style="margin-top: 10px;"><?php echo ($item['title_en']); ?></h6>
											</div>
											<?php
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