<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';
include_once '_dynamic_siteSetting/directoryLang.php'; /***  '$directory' / '$fType_php' from 'directoryLang.php'  ***/
include_once 'custom-append/append__List.php';
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>School Search | CT21 Search Platform</title>
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
		.gdlr-core-item-pdb {
			padding-bottom: 15px !important;
		}

		.ctm-subTitle {
			font-size: 12px !important;
			font-style: normal !important;
			color: #6c6c6c;
		}

		/*green line*/
		#custom_greenLine-style-title {
			border-color: #027dfa;
			border-bottom-width: 3px;
		}

		#custom_greenLine-style {
			border-color: #d6d6d6;
			border-bottom-width: 2px;
			margin-top: 40px;
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

					<!-- ===============        (theme) custom        =============== -->
					<div class="kingster-page-wrapper" id="kingster-page-wrapper">
						<div class="gdlr-core-page-builder-body">
							<div class="gdlr-core-pbf-wrapper " style="padding: 70px 0px 100px 0px;">
								<div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
									<div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">

										<!-- ===============        (Left) side        =============== -->
										<div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
											<div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
												<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ctm-map-container">

													<!-- ====================     << Map >>     ==================== -->
													<?php include 'map.php';?>
													<!-- ====================     << Map >>     ==================== -->

													<img src="custom-images/map-Aus_pureLight.png" width="60px" height="60px" class="custom-mapState_button" title="原始" id="mapBtn_Light">
													<img src="custom-images/map-Aus_pureBlueTxt.png" width="60px" height="60px" class="custom-mapState_button" title="全显示"
														id="mapBtn_Dark">
												</div>
											</div>
										</div>


										<!-- ================================================================================================================================== -->
										<!-- =============================================        Form [for submit button]        ============================================= -->
										<!-- ================================================================================================================================== -->


										<form action="search-school__result" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post">
											<!-- <form action="<?php //include('_dynamic_siteSetting/folderLink_cn.php'); ;;;;;;;;;;;;;;;;;?>search-school__result.php" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" > -->


											<!-- ===============        (Right) side        =============== -->
											<div class="gdlr-core-pbf-column gdlr-core-column-30">
												<div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
													<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">

														<!-- ====================     << Title >> {page}     ==================== -->
														<div class="gdlr-core-pbf-element">
															<div
																class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
																<div class="gdlr-core-title-item-title-wrap clearfix">
																	<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																		style="font-size: 34px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #161616 ;">School Search</h3>
																</div>
															</div>
														</div>
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																style="margin-bottom: 25px ;">

																<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style-title"></div>
															</div>
														</div>
														
														<!-- ===== (country - 国家) ===== -->
														<div class="gdlr-core-pbf-element">
															<div
																class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
																<div class="gdlr-core-title-item-title-wrap clearfix">
																	<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																		style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">Country</h3>
																</div>
															</div>
														</div>

														<!-- =====  (Drop-down)  ===== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 20px ;">
																<div class="gdlr-core-text-box-item-content" style="font-size: 17px ;letter-spacing: 0px ;text-transform: none ;">
																	<select name="country" class="dropdown_100" id="country">
																		<option value="0" id="">Please Choose "Country"</option>
																	</select>
																</div>
															</div>
														</div>


														<!-- ===== (State - 州) ===== -->
														<div class="gdlr-core-pbf-element">
															<div
																class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
																<div class="gdlr-core-title-item-title-wrap clearfix">
																	<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																		style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">State</h3>
																</div>
															</div>
														</div>

														<!-- =====  (Drop-down)  ===== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 20px ;">
																<div class="gdlr-core-text-box-item-content" style="font-size: 17px ;letter-spacing: 0px ;text-transform: none ;">
																	<select name="state" class="dropdown_100" id="state">
																		<option value="0" id="">Please Choose "State"</option>
																	</select>
																</div>
															</div>
														</div>

														<!-- ========================================     << (Grey) Line >>     ======================================== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																style="margin-bottom: 25px ;">
																<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style"></div>
															</div>
														</div>


														<!-- ===== (Category - 课程类别) ===== -->
														<div class="gdlr-core-pbf-element">
															<div
																class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
																<div class="gdlr-core-title-item-title-wrap clearfix">
																	<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																		style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">Type of Courses</h3>
																</div>

															</div>
														</div>

														<!-- =====  (Drop-down)  ===== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">
																<select name="schoolType" class="dropdown_100" id="schoolType">
																	<option value="0" id="">Please Choose "Type of Courses"</option>
																</select>

															</div>
														</div>

														<!-- ========================================     << (Grey) Line >>     ======================================== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																style="margin-bottom: 25px ;">
																<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style"></div>
															</div>
														</div>

														<!-- 10th Element -->
														<!-- ====================     << (Search) Button >>     ==================== -->
														<div class="gdlr-core-pbf-element" style="padding-left: 5%;">
															<button id="btnSearch" type="submit"
																class="gdlr-core-button gdlr-core-button-solid gdlr-core-button-no-border custom-button_noBorder" style="font-weight: bold;"
																id="button">Search</button>
															<!-- <input name="button" type="submit" class="" style="font-weight: bold;" id="button" value="立 即 搜 索"></div> -->
														</div>
														<!-- ==========    /Element    ========== -->
													</div>
												</div>
											</div>
											<!-- ==========    /(Right) side    ========== -->
										</form>

										<!-- ===============        (Center) below        =============== -->
										<!-- <iframe name="SouJg" id="SouJg" style=" min-height:433px;" frameborder="0" width="100%"  src="" onLoad="iFrameHeight()"  ></iframe> -->

									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ===============        /(theme) custom        =============== -->

					<!-- ============================================================================================================== -->
					<!-- ===================================        [(Pop-up) Search Result]        =================================== -->
					<!-- ============================================================================================================== -->
					<div id="Result_Background" class="custom-overlay--hidden">
						<div id="Result_Frame" class="custom-popup__Frame--hidden">
							<div id="Result_Content" class="custom-popup__content">
								<div id="Result_Close" class="custom-popup__close-bar">
									<span>X</span>
								</div>
								<iframe name="Result_Popup" id="Result_Popup" style="border-radius: 10px;" frameborder="0" width="100%" height="100%" src=""></iframe>
							</div>
						</div>
					</div>

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


	<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
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



	<!-- ==========  (custom) JavaScript  ========== -->
	<script type="text/javascript" src="custom-code__js/search-animation__popupWin.js"></script>
	<script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
	<!-- ==========  (custom) JavaScript  ========== -->


	<!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Map        ______________________________ -->
	<!-- ======================================================================================== -->
	<script type="text/javascript" src="custom-code__js/map-function__dropdown.js"></script>

	<script type="text/javascript">
		//  show Map after-load
		jQuery('.ctm-map-svg').show();
		// jQuery('.ctm-map-svg').load(function(){
		// 	jQuery('.ctm-map-svg').show();
		// });

		var w = window.innerWidth;

		if (w < 1260) {
			jQuery('.ctm-map-svg').css({
				'margin-right': '0%'
			});
			jQuery('.ctm-map-container').css({
				'margin-bottom': '15%'
			});
		}
	</script>

	<script>
		//加入国家
		$.get("util/search-immigrationOperation?op=4", res => {
			res = JSON.parse(res);
			res.forEach(e => {
				$("#country").append(`<option value='${e.id}'>${e.name}</option>`);
			});
		});
	
		$("#country").change(e => {
			$.get(`util/search-immigrationOperation?op=1&country_id=${e.currentTarget.value}`, res => {
				res = JSON.parse(res);
				$("#state").html(`<option value="0">Please Choose "State"</option>`);
				res.forEach(e => {
					$("#state").append(`<option value='${e.id}'>${e.name}</option>`);
				});
			});
		});
		
		//#region 以下代码添加于2021-04-14
		/*
		$.get("util/search-immigrationOperation?op=1", res => {
			res = JSON.parse(res);
			res.forEach(e => {
				$("#state").append(`<option value='${e.id}'>${e.name}(${e.code})</option>`);
			});
		});
		*/

		$.get("util/search-immigrationOperation", res => {
			res = JSON.parse(res);
			$("#schoolType").html(`<option value="0">Please Choose "Type of Courses"</option>`);
			res.forEach(e => {
				$("#schoolType").append(`<option value='${e.id}'>${e.name}</option>`);
			});
		});

		$("#state").change(e => {
			$.get(`util/search-immigrationOperation?state=${e.currentTarget.value}`, res => {
				res = JSON.parse(res);
				$("#schoolType").html(`<option value="0">Please Choose "Type of Courses"</option>`);
				res.forEach(e => {
					$("#schoolType").append(`<option value='${e.id}'>${e.name}</option>`);
				});
			});
		});
		//#endregion

		function changeState(){
			$.get(`util/search-immigrationOperation?state=`+$("#state").val(), res => {
				res = JSON.parse(res);
				$("#schoolType").html(`<option value="0">Please Choose "Type of Courses"</option>`);
				res.forEach(e => {
					$("#schoolType").append(`<option value='${e.id}'>${e.name}</option>`);
				});
			});
		}
	</script>
</body>

</html>