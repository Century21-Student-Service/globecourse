<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>学费搜索 | 潮流搜索平台</title>
	<!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->

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
	<link rel="stylesheet" type="text/css" href="custom-css/tab-box.css">
	<link rel="stylesheet" type="text/css" href="custom-css/map-effect.css">


	<!-- ==========  (custom) Style [only this pg]  ========== -->
	<style type="text/css">
		.gdlr-core-item-pdb {
			padding-bottom: 15px !important;
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


										<!-- ______________________________        (Left) side        ______________________________ -->
										<!-- ======================================================================================= -->
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

										<form action="search-course__result" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post">
											<!-- <form action="<?php //include('_dynamic_siteSetting/folderLink_cn.php'); ;;;;;;;;?>search-course__result.php" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" > -->

											<!-- =============================================        Form [for submit button]        ============================================= -->
											<!-- ================================================================================================================================== -->


											<!-- ______________________________        (Left) side        ______________________________ -->
											<!-- ======================================================================================= -->
											<div class="gdlr-core-pbf-column gdlr-core-column-30">
												<div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
													<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">


														<!-- ================================================================================================== -->
														<!-- ===================================        [Page-Title]        =================================== -->
														<!-- ================================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
															<div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
																<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ctm-map-container">

																	<!-- 1st Element -->
																	<!-- ====================     << Title >> {page}     ==================== -->
																	<div class="gdlr-core-pbf-element">
																		<div
																			class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
																			<div class="gdlr-core-title-item-title-wrap clearfix">

																				<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																					style="font-size: 34px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #161616 ;">课程搜索</h3>
																			</div>
																			<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																					style="font-size: 16px ;font-style: normal ;color: #6c6c6c ;margin-top: 0 ;">Course Search</span></div>
																		</div>
																	</div>

																	<!-- 3rd Element -->
																	<!-- ====================     << (Green) Line >>     ==================== -->
																	<div class="gdlr-core-pbf-element">
																		<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																			style="margin-bottom: 25px ;">

																			<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style-title"></div>
																		</div>
																	</div>

																</div>
															</div>
														</div>

														<!-- =========================================================================================== -->
														<!-- ===================================        [州名]        =================================== -->
														<!-- =========================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-30">
															<div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
																<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">


																	<!-- 4th Element -->
																	<!-- ====================     << Title >> {1st paragraph}     ==================== -->
																	<!-- ===== (State - 州) ===== -->
																	<div class="gdlr-core-pbf-element">
																		<div
																			class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																			style="padding-bottom: 0 !important">
																			<div class="gdlr-core-title-item-title-wrap clearfix">
																				<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																					style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">州 名</h3>
																			</div>
																			<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																					style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;">State</span></div>
																		</div>
																	</div>

																	<!-- 5th Element -->
																	<!-- ====================     << Content >> {1st paragraph}     ==================== -->
																	<div class="gdlr-core-pbf-element">
																		<div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"
																			style="padding-bottom: 20px ;">
																			<div class="gdlr-core-text-box-item-content" style="font-size: 17px ;letter-spacing: 0px ;text-transform: none ;">
																				<!-- <div class="border-box_100">
						                                                        	<input type="radio" id="" name="state" value="0">
						                                                        	<div class="border-box_100_label">
						                                                        		<label for="state"><span>--请选择大州--</span></label><br>
						                                                        	</div>
						                                                        </div> -->


																				<!-- =====  (Get) State list [from database]  ===== -->

																				<!-- =====  (Insert) State [drop-down list]  ===== -->
																				<select name="state" class="dropdown_100" id="state">
																					<option value="0" id="">请选择「州」</option>
																				</select>
																			</div>
																		</div>
																	</div>


																</div>
															</div>
														</div>

														<!-- =============================================================================================== -->
														<!-- ===================================        [课程类别]        =================================== -->
														<!-- =============================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-30">
															<div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
																<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">


																	<!-- 7th Element -->
																	<!-- ====================     << Title >> {2nd paragraph}     ==================== -->
																	<!-- ===== (Category - 课程类别) ===== -->
																	<div class="gdlr-core-pbf-element">
																		<div
																			class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																			style="padding-bottom: 0 !important">
																			<div class="gdlr-core-title-item-title-wrap clearfix">
																				<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																					style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">课程类别</h3>
																			</div>
																			<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																					style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;">Type of Courses</span></div>
																		</div>
																	</div>

																	<!-- 8th Element -->
																	<!-- ====================     << Content >> {2nd paragraph}     ==================== -->
																	<div class="gdlr-core-pbf-element">
																		<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">

																			<!-- =====  (Insert) State [drop-down list]  ===== -->
																			<select name="schoolType" class="dropdown_100" id="schoolType">
																				<option value="0" id="">请选择「课程类别」</option>
																			</select>

																		</div>
																	</div>


																</div>
															</div>
														</div>

														<!-- ====================     << Empty-Space >>     ==================== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																style="margin-bottom: 50px ;">
																<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="border-color: white;"></div>
															</div>
														</div>


														<!-- ----------------------------------------------------------------------        [Faculty]        ---------------------------------------------------------------------- -->

														<!-- =================================================================================================== -->
														<!-- ===================================        [Tab-buttons]        =================================== -->
														<!-- =================================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-60">
															<!-- 11th Element -->
															<!-- ====================     << Content >> {3rd paragraph}     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
																	style="margin-bottom: 20px; padding: 0 !important;">


																	<!-- =====  (Insert) State [radio buttons]  ===== -->
																	<label>
																		<input type="radio" id="searchMode_faculty" name="searchMode_faculty" value="0" checked="true">
																		<div class="tab-box_2">
																			<div><span>以选择「学科」搜索</span><br></div>
																		</div>
																	</label>

																	<label>
																		<input type="radio" id="searchMode_faculty" name="searchMode_faculty" value="1">
																		<div class="tab-box_2">
																			<div><span>输入「课程名称」搜索</span><br></div>
																		</div>
																	</label>


																</div>
															</div>

														</div>



														<!-- ================================================================================================================= -->
														<!-- =============================================        [Tab 1]        ============================================= -->
														<!-- ================================================================================================================= -->
														<div class="animated fadeIn" id="search_tab1_faculty" style="">

															<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

															<!-- ====================     << Title >> {1st paragraph}     ==================== -->
															<!-- ===== (Faculty of Courses - 主要学科) ===== -->
															<div class="gdlr-core-pbf-element">
																<div
																	class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																	style="padding-bottom: 0 !important">
																	<div class="gdlr-core-title-item-title-wrap clearfix">
																		<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																			style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">主要学科</h3>
																	</div>
																	<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																			style="font-size: 12px ;font-style: normal ;color: #6c6c6c ;">Faculty of Courses</span></div>
																</div>
															</div>
															<!-- ====================     << Content >> {1st paragraph}     ==================== -->
															<div class="row ctm-disable" id="div_field">
																<div class="gdlr-core-pbf-element">
																	<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">


																		<!-- =====  (Insert) State [drop-down list]  ===== -->
																		<select name="broadField" class="dropdown_100" id="broadField">
																			<option value="0">请选择「学科」</option>

																			<?php
$dosql->Execute("SELECT * FROM `#@__field` WHERE `type`=0 ");

while ($row = $dosql->GetArray()) {
    echo ('<option value="' . $row['bh'] . '">' . $row['bh'] . ' - ' . $row['cname'] . '</option>');
}
?>
																		</select>


																	</div>
																</div>
															</div>
															<!-- ====================     << (Grey) Line >>     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																	style="margin-bottom: 25px ;">
																	<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="margin-top: 20px !important">
																	</div>
																</div>
															</div>

															<!-- ==================================================  << 2nd Tab-element >>  ================================================== -->

															<div class="row ctm-disable" id="div_Major">
																<!-- ====================     << Title >> {2nd paragraph}     ==================== -->
																<!-- ===== (Major of Courses - 具体范围) ===== -->
																<div class="gdlr-core-pbf-element">
																	<div
																		class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																		style="padding-bottom: 0 !important">
																		<div class="gdlr-core-title-item-title-wrap clearfix">
																			<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																				style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">具体范围</h3>
																		</div>
																		<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																				style="font-size: 12px ;font-style: normal ;color: #6c6c6c ;">Major of Courses</span></div>
																	</div>
																</div>
																<!-- ====================     << Content >> {2nd paragraph}     ==================== -->
																<div class="gdlr-core-pbf-element">
																	<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">

																		<!-- =====  (Insert) State [drop-down list]  ===== -->
																		<select name="narrowField" class="dropdown_100 ctm-dropdown__hide" id="narrowField" style="">
																			<option value="0">请选择「课程」</option>
																		</select>

																	</div>
																</div>
															</div>

															<!-- ====================     << (Grey) Line >>     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																	style="margin-bottom: 25px ;">
																	<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="margin-top: 20px !important">
																	</div>
																</div>
															</div>
														</div>


														<!-- ================================================================================================================= -->
														<!-- =============================================        [Tab 2]        ============================================= -->
														<!-- ================================================================================================================= -->
														<div class="animated fadeIn tab-box__hide" id="search_tab2_faculty" style="">

															<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

															<!-- ====================     << Title >> {3rd paragraph}     ==================== -->
															<!-- ===== (Category - 课程类别) ===== -->
															<div class="gdlr-core-pbf-element">
																<div
																	class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																	style="padding-bottom: 0 !important">
																	<div class="gdlr-core-title-item-title-wrap clearfix">
																		<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																			style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">课程名称</h3>
																	</div>
																	<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																			style="font-size: 12px ;font-style: normal ;color: #6c6c6c ;">Course Name</span></div>
																</div>
															</div>
															<!-- ====================     << Content >> {3rd paragraph}     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="text-align: center !important;">

																	<!-- =====  (Insert) Text Field  ===== -->
																	<input name="courseName" type="text" class="ctm-txtField" id="courseName" />


																</div>
															</div>
															<!-- ====================     << (Green) Line >>     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																	style="margin-bottom: 25px ;">
																	<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="margin-top: 20px !important">
																	</div>
																</div>
															</div>

														</div>


														<!-- ----------------------------------------------------------------------        [Fees]        ---------------------------------------------------------------------- -->

														<!-- =================================================================================================== -->
														<!-- ===================================        [Tab-buttons]        =================================== -->
														<!-- =================================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-60">
															<!-- 11th Element -->
															<!-- ====================     << Content >> {3rd paragraph}     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
																	style="margin-bottom: 20px; padding: 0 !important;">


																	<!-- =====  (Insert) State [radio buttons]  ===== -->
																	<label>
																		<input type="radio" id="searchMode_fees" name="searchMode_fees" value="0" checked="true">
																		<div class="tab-box_2">
																			<div><span>以选择「学费范围」搜索</span><br></div>
																		</div>
																	</label>

																	<label>
																		<input type="radio" id="searchMode_fees" name="searchMode_fees" value="1">
																		<div class="tab-box_2">
																			<div><span>输入「学费额数」搜索</span><br></div>
																		</div>
																	</label>


																</div>
															</div>

														</div>



														<!-- ================================================================================================================= -->
														<!-- =============================================        [Tab 1]        ============================================= -->
														<!-- ================================================================================================================= -->
														<div class="animated fadeIn" id="search_tab1_fees" style="">

															<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

															<!-- ====================     << Title >> {1st paragraph}     ==================== -->
															<!-- ===== (Faculty of Courses - 主要学科) ===== -->
															<div class="gdlr-core-pbf-element">
																<div
																	class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																	style="padding-bottom: 0 !important">
																	<div class="gdlr-core-title-item-title-wrap clearfix">
																		<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																			style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">学费范围</h3>
																	</div>
																	<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																			style="font-size: 12px ;font-style: normal ;color: #6c6c6c ;">Range of Fees</span></div>
																</div>
															</div>
															<!-- ====================     << Content >> {1st paragraph}     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">


																	<!-- =====  (Insert) State [drop-down list]  ===== -->
																	<select name="feesRange" class="dropdown_100" id="feesRange">
																		<option value="0">请选择「学费范围」</option>
																		<option value="1">（澳元）$10,000 以下</option>
																		<option value="2">（澳元）$10,000 - $19,999</option>
																		<option value="3">（澳元）$20,000 - $39,999</option>
																		<option value="4">（澳元）$40,000 - $59,999</option>
																		<option value="5">（澳元）$60,000 - $79,999</option>
																		<option value="6">（澳元）$80,000 以上</option>
																	</select>


																</div>
															</div>
															<!-- ====================     << (Grey) Line >>     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																	style="margin-bottom: 25px ;">
																	<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="margin-top: 20px !important">
																	</div>
																</div>
															</div>

														</div>


														<!-- ================================================================================================================= -->
														<!-- =============================================        [Tab 2]        ============================================= -->
														<!-- ================================================================================================================= -->
														<div class="animated fadeIn tab-box__hide" id="search_tab2_fees" style="">

															<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

															<!-- ====================     << Title >> {3rd paragraph}     ==================== -->
															<!-- ===== (Category - 课程类别) ===== -->
															<div class="gdlr-core-pbf-element">
																<div
																	class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																	style="padding-bottom: 0 !important">
																	<div class="gdlr-core-title-item-title-wrap clearfix">
																		<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																			style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">具体学费</h3>
																	</div>
																	<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																			style="font-size: 12px ;font-style: normal ;color: #6c6c6c ;">Specific Amount of Fees</span></div>
																</div>
															</div>
															<!-- ====================     << Content >> {3rd paragraph}     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="text-align: center !important;">

																	<!-- =====  (Insert) Text Field  ===== -->
																	<span>（澳元）$</span>
																	<input class="ctm-txtField_25" style="margin-left: 10px;" name="feesFrom" type="text" id="feesFrom" value="0" />至
																	<input class="ctm-txtField_25" name="feesTo" type="text" id="feesTo" value="0" />


																</div>
															</div>
															<!-- ====================     << (Green) Line >>     ==================== -->
															<div class="gdlr-core-pbf-element">
																<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																	style="margin-bottom: 25px ;">
																	<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="margin-top: 20px !important">
																	</div>
																</div>
															</div>

														</div>



														<!-- ===================================================================================================== -->
														<!-- ===================================        [Search-button]        =================================== -->
														<!-- ===================================================================================================== -->

														<!-- 13th Element -->
														<!-- ====================     << (Search) Button >>     ==================== -->
														<div class="gdlr-core-pbf-element" style="padding-left: 5%;">
															<button id="btnSearch" type="submit"
																class="gdlr-core-button gdlr-core-button-solid gdlr-core-button-no-border custom-button_noBorder" style="font-weight: bold;"
																id="button">立 即 搜 索</button>
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

					<!-- ===============        (Pop-up) Search Result        =============== -->
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
					<!-- <iframe name="SouJg" id="SouJg" style=" min-height:433px;" frameborder="0" width="100%"  src="" onLoad="iFrameHeight()"  ></iframe> -->
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


	<!-- <script type='text/javascript' src='kingster-js/jquery/jquery.js'></script> -->
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


	<!-- ==========  [from-ORIGINAL]  ========== -->
	<!-- <script src="./../templates/default/js/jquery.min.js"></script> -->

	<!-- ==========  (custom) JavaScript  ========== -->

	<!-- ===================================================================================================== -->
	<!-- ______________________________        (custom) Major of Courses        ______________________________ -->
	<!-- ===================================================================================================== -->


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

	<!-- ========================================================================================================= -->
	<!-- ______________________________        (custom) Tab-Switch [faculty]        ______________________________ -->
	<!-- ========================================================================================================= -->
	<script type="text/javascript">
		jQuery('input[name="searchMode_faculty"]').change(function () {

			var value = jQuery("input[name='searchMode_faculty']:checked").val();

			if (value == 0) {
				jQuery('#search_tab1_faculty').removeClass('tab-box__hide');
				jQuery('#search_tab2_faculty').addClass('tab-box__hide');
			}

			if (value == 1) {
				jQuery('#search_tab1_faculty').addClass('tab-box__hide');
				jQuery('#search_tab2_faculty').removeClass('tab-box__hide');
			}

			jQuery('#broadField').val(0);
			jQuery('#narrowField').val(0);
			jQuery('#courseName').val('');

			/** ====  (Disable) Major [dropdown]  ==== **/
			jQuery('#div_Major').addClass('ctm-disable');

		});
	</script>

	<!-- ====================================================================================================== -->
	<!-- ______________________________        (custom) Tab-Switch [fees]        ______________________________ -->
	<!-- ====================================================================================================== -->
	<script type="text/javascript">
		jQuery('input[name="searchMode_fees"]').change(function () {

			var value = jQuery("input[name='searchMode_fees']:checked").val();

			if (value == 0) {
				jQuery('#search_tab1_fees').removeClass('tab-box__hide');
				jQuery('#search_tab2_fees').addClass('tab-box__hide');
			}

			if (value == 1) {
				jQuery('#search_tab1_fees').addClass('tab-box__hide');
				jQuery('#search_tab2_fees').removeClass('tab-box__hide');
			}

			jQuery('#feesRange').val(0);
			jQuery('#feesFrom').val('0');
			jQuery('#feesTo').val('0');

			jQuery('#feesFrom').addClass('ctm__disable');

		});
	</script>

	<!-- ========================================================================================= -->
	<!-- ______________________________        (custom) Fees        ______________________________ -->
	<!-- ========================================================================================= -->
	<script type="text/javascript">
		jQuery('#feesFrom').addClass('ctm__disable');

		//  allow user to 'insert' fees-from
		jQuery('#feesTo').on('change keyup', function () {
			if (jQuery('#feesTo').val() != '0') {
				jQuery('#feesFrom').removeClass('ctm__disable');
			} else {
				jQuery('#feesFrom').addClass('ctm__disable');
				jQuery('#feesFrom').val('0');
			}

			//  validate 'fees-from' is 'smaller' than 'fees-to'
			if (jQuery('#feesTo').val() < jQuery('#feesFrom').val()) {
				var feesTo_intVal = parseInt(jQuery('#feesTo').val());
				jQuery('#feesFrom').val(feesTo_intVal - 1);
			}
		});

		//  validate 'fees-from' is 'smaller' than 'fees-to'
		jQuery('#feesFrom').on('change keyup', function () {
			if (jQuery('#feesFrom').val() > jQuery('#feesTo').val()) {
				var feesTo_intVal = parseInt(jQuery('#feesTo').val());
				jQuery('#feesFrom').val(feesTo_intVal - 1);
			}
		});

		jQuery('#feesFrom').focusout(function () {
			if (jQuery('#feesFrom').val() == '') {
				jQuery('#feesFrom').val('0');
			}
		});
		jQuery('#feesTo').focusout(function () {
			if (jQuery('#feesTo').val() == '') {
				jQuery('#feesTo').val('0');
			}
		});
	</script>

	<script type="text/javascript">
		//#region 以下代码添加于2021-02-23
		//载入初始「州」数据
		$.get("util/search-immigrationOperation?op=1", res => {
			res = JSON.parse(res);
			res.forEach(e => {
				$("#state").append(`<option value='${e.id}'>${e.name}</option>`);
			});
		});

		//载入「课程类别」类别数据
		$.get("util/search-immigrationOperation", res => {
			res = JSON.parse(res);
			$("#schoolType").html(`<option value="0">请选择「课程类别」</option>`);
			res.forEach(e => {
				$("#schoolType").append(`<option value='${e.id}'>${e.name}</option>`);
			});
		});

		//州变化时，课程类别选项对应变化
		$("#state").change(e => {
			$.get(`util/search-immigrationOperation?state=${e.currentTarget.value}`, res => {
				res = JSON.parse(res);
				$("#schoolType").html(`<option value="0">请选择「课程类别」</option>`);
				res.forEach(e => {
					$("#schoolType").append(`<option value='${e.id}'>${e.name}</option>`);
				});
			});
		});

		//课程类别时，选项对应变化
		$("#schoolType").change(e => {
			const state = $("#state").val();
			const level = $("#schoolType").val();
			$.post('util/search-immigrationOperation?op=2', {
				state,
				level
			}, res => {
				res = JSON.parse(res);
				allFields = res;
				$("#broadField").html(`<option value="0">请选择「学科」</option>`);
				res.forEach(e => {
					$("#broadField").append(`<option value="${e.id}">${("00" + e.id).substr(-2,2)} - ${e.name}</option>`);
				});
				if (level > 0)
					$("#div_field").removeClass('ctm-disable');
				else
					$("#div_field").addClass('ctm-disable');
			});
		});

		$("#broadField").change(e => {
			const field_id_p = e.currentTarget.value;
			$("#narrowField").html('<option value="0">请选择「主修」</option>')
			allFields.forEach(f => {
				if (f.id == field_id_p)
					f.children.forEach(c => {
						$("#narrowField").append(`<option value="${c.id}">${c.name}</option>`);
					});
			});
			if ($('#broadField').val() != '') {
				$('#div_Major').removeClass('ctm-disable');
			}
			if ($('#broadField').val() == '' || $('#broadField').val() == '0') {
				$('#div_Major').addClass('ctm-disable');
			}
		});
		//#endregion
	</script>
</body>

</html>