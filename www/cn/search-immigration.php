<?php

/*******************************\
这个页面之前是在phpWind 5.1 Beta之上做的二次开发。我猜测还用了wordpress的样式Kingster
我摒弃了phpwind，用jQuery3.5+php7重做了一下，仅保留了样式。
根据我接手时这个文件夹下的文件命名记录，应该不止一个人一次参与了这个project，祝你好运。

根据要求
1.各个下拉菜单应该联动，即根据自身变化，调整其他下拉菜单的选项
2.【偏远】和【非偏远】是必须项，其他都可以留空
3.【主要学科】和【主修课程】默认disabled，在选了【课程类别】之后才开启

2021-02-23 Philip Wu
\*******************************/

;?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>移民搜索 | 潮流搜索平台</title>
	<!-- <title>Kingster &#8211; School, College &amp; University HTML Template</title> -->

	<!-- (Theme) custom  ==  << Favicon and touch icons >>  ====================          Icon          -->
	<!-- <?php include_once '_dynamic_siteSetting/icon-setting.php';?> -->
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

										<form action="search-immigration__result" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post">
											<!-- <form action="<?php //include('_dynamic_siteSetting/folderLink_cn.php'); ;;;;;;;;;;;;;;;;;;;;;?>search-immigration__result.php" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" > -->
											<input name="regional" type="hidden" id=i_regional>
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
																					style="font-size: 34px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #161616 ;">移民搜索</h3>
																			</div>
																			<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																					style="font-size: 16px ;font-style: normal ;color: #6c6c6c ;margin-top: 0 ;">Immigration Search</span></div>
																		</div>
																	</div>

																	<!-- 2nd Element -->
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


														<!-- =================================================================================================== -->
														<!-- ===================================        [Upper-Layer]        =================================== -->
														<!-- =================================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" style="padding: 0 5%;">
															<div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
																<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ctm-map-container">

																	<!-- ===================================================================== -->
																	<!-- ====================        [Tab-buttons]        ==================== -->
																	<!-- ===================================================================== -->
																	<div class="gdlr-core-pbf-column gdlr-core-column-60">
																		<!-- 11th Element -->
																		<!-- ====================     << Content >> {3rd paragraph}     ==================== -->
																		<div class="gdlr-core-pbf-element">
																			<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
																				style="margin-bottom: 20px; padding: 0 !important;">


																				<!-- =====  (Insert) State [radio buttons]  ===== -->
																				<label>
																					<input type="radio" class='radio-area' id="area" name="area" value="0" checked="">
																					<div class="tab-box_2">
																						<div><span>非偏远地区</span><br></div>
																					</div>
																				</label>

																				<label>
																					<input type="radio" class='radio-area' id="area" name="area" value="1">
																					<div class="tab-box_2">
																						<div><span>偏远地区</span><br></div>
																					</div>
																				</label>


																			</div>
																		</div>

																	</div>

																	<!-- ============================================================= -->
																	<!-- ====================        [州名]        ==================== -->
																	<!-- ============================================================= -->
																	<div class="gdlr-core-pbf-column gdlr-core-column-60" id="div_state">
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
																								style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;"><small>州
																									名</small></h3>
																						</div>
																						<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																								style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;"><small>State</small></span></div>
																					</div>
																				</div>

																				<!-- 5th Element -->
																				<!-- ====================     << Content >> {1st paragraph}     ==================== -->
																				<div class="gdlr-core-pbf-element">
																					<div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"
																						style="padding: 0 30px;">
																						<div class="gdlr-core-text-box-item-content" style="font-size: 17px ;letter-spacing: 0px ;text-transform: none ;">
																							<!-- <div class="border-box_100">
									                                                        	<input type="radio" id="" name="state" value="0">
									                                                        	<div class="border-box_100_label">
									                                                        		<label for="state"><span>--请选择大州--</span></label><br>
									                                                        	</div>
									                                                        </div> -->


																							<!-- =====  (Get) State list [from database]  ===== -->

																							<!-- =====  (Insert) State [drop-down list]  ===== -->
																							<select name="state" class="dropdown_100" id="state"></select>

																						</div>
																					</div>
																				</div>


																			</div>
																		</div>
																	</div>

																	<!-- ====================     << (Grey) Line >>     ==================== -->
																	<div class="gdlr-core-pbf-element">
																		<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																			style="margin-bottom: 25px ;">
																			<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style"
																				style="margin-top: 20px !important"></div>
																		</div>
																	</div>

																	<!-- =========================================================================== -->
																	<!-- ====================        [课程类别 (移民所需)]        ==================== -->
																	<!-- =========================================================================== -->
																	<div class="gdlr-core-pbf-column gdlr-core-column-60" id="div_courseLevel">
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
																								style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">
																								<small>课程类别<small>(移民所需)</small></small></h3>
																						</div>
																						<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																								style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;"><small>Type of Courses <small>(for
																										Immigration)</small></small></span></div>
																					</div>
																				</div>

																				<!-- 8th Element -->
																				<!-- ====================     << Content >> {2nd paragraph}     ==================== -->
																				<div class="gdlr-core-pbf-element">
																					<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="padding: 0 30px;">

																						<!-- =====  (Insert) State [drop-down list]  ===== -->
																						<select name="schoolType" class="dropdown_100" id="schoolType"></select>
																					</div>
																				</div>


																			</div>
																		</div>
																	</div>

																</div>
															</div>
														</div>


														<!-- ====================     << Empty-Space >>     ==================== -->
														<div class="gdlr-core-pbf-element">
															<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																style="margin-bottom: 5% ;">
																<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="border-color: white;"></div>
															</div>
														</div>




														<!-- =================================================================================================== -->
														<!-- ===================================        [Bottom-Layer]        =================================== -->
														<!-- =================================================================================================== -->
														<div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" style="padding: 0 5%;">
															<div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
																<div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ctm-map-container">


																	<!-- ===================================================================== -->
																	<!-- ====================        [Tab-buttons]        ==================== -->
																	<!-- ===================================================================== -->
																	<div class="gdlr-core-pbf-column gdlr-core-column-60">
																		<!-- 11th Element -->
																		<!-- ====================     << Content >> {3rd paragraph}     ==================== -->
																		<div class="gdlr-core-pbf-element">
																			<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
																				style="margin-bottom: 20px; padding: 0 !important;">


																				<!-- =====  (Insert) State [radio buttons]  ===== -->
																				<label>
																					<input type="radio" id="searchMode" name="searchMode" value="0" checked="true">
																					<div class="tab-box_2">
																						<div><span>以选择「学科」搜索</span><br></div>
																					</div>
																				</label>

																				<label>
																					<input type="radio" id="searchMode" name="searchMode" value="1">
																					<div class="tab-box_2">
																						<div><span>输入「课程名称」搜索</span><br></div>
																					</div>
																				</label>


																			</div>
																		</div>

																	</div>


																	<!-- ============================================================= -->
																	<!-- ====================        [学科]        ==================== -->
																	<!-- ============================================================= -->
																	<div class="animated fadeIn" id="search_tab1">

																		<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

																		<!-- ===== (Faculty of Courses - 主要学科) ===== -->
																		<div class="row ctm-disable" id="div_field">
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
																			<div class="gdlr-core-pbf-element">
																				<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="padding: 0 30px;">


																					<!-- =====  (Insert) State [drop-down list]  ===== -->
																					<select name="broadField" class="dropdown_100" id="broadField">
																						<option value="0">请选择「学科」</option>
																					</select>


																				</div>
																			</div>
																		</div>
																		<!-- ====================     << (Grey) Line >>     ==================== -->
																		<div class="gdlr-core-pbf-element">
																			<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																				style="margin-bottom: 25px ;">
																				<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style"
																					style="margin-top: 20px !important"></div>
																			</div>
																		</div>

																		<!-- ==================================================  << 2nd Tab-element >>  ================================================== -->

																		<!-- ===== (Major of Course - 主修课程) ===== -->
																		<div class="row ctm-disable" id="div_Major">
																			<!-- ====================     << Title >> {2nd paragraph}     ==================== -->
																			<div class="gdlr-core-pbf-element">
																				<div
																					class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
																					style="padding-bottom: 0 !important">
																					<div class="gdlr-core-title-item-title-wrap clearfix">
																						<h3 class="gdlr-core-title-item-title gdlr-core-skin-title "
																							style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">主修课程</h3>
																					</div>
																					<div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption"
																							style="font-size: 12px ;font-style: normal ;color: #6c6c6c ;">Major of Courses</span></div>
																				</div>
																			</div>
																			<!-- ====================     << Content >> {2nd paragraph}     ==================== -->
																			<div class="gdlr-core-pbf-element">
																				<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="padding: 0 30px;">

																					<!-- =====  (Insert) State [drop-down list]  ===== -->
																					<select name="narrowField" class="dropdown_100" id="narrowField">
																						<option value="0">请选择「主修」</option>
																					</select>

																				</div>
																			</div>
																		</div>

																		<!-- ====================     << (Grey) Line >>     ==================== -->
																		<div class="gdlr-core-pbf-element">
																			<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																				style="margin-bottom: 25px ;">
																				<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style"
																					style="margin-top: 20px !important"></div>
																			</div>
																		</div>
																	</div>


																	<!-- ============================================================= -->
																	<!-- ====================        [输入]        ==================== -->
																	<!-- ============================================================= -->
																	<div class="animated fadeIn tab-box__hide" id="search_tab2">

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
																			<div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
																				style="text-align: center !important;">

																				<!-- =====  (Insert) Text Field  ===== -->
																				<input name="courseName" type="text" class="ctm-txtField" id="courseName" />


																			</div>
																		</div>
																		<!-- ====================     << (Green) Line >>     ==================== -->
																		<div class="gdlr-core-pbf-element">
																			<div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align"
																				style="margin-bottom: 25px ;">
																				<div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style"
																					style="margin-top: 20px !important"></div>
																			</div>
																		</div>

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
	<!-- <script type='text/javascript' src='kingster-js/plugins.min.js'></script> -->



	<!-- ==========  [from-ORIGINAL]  ========== -->
	<!-- <script src="./../templates/default/js/jquery.min.js"></script> -->


	<!-- ==========  (custom) JavaScript  ========== -->
	<script type="text/javascript" src="custom-code__js/search-animation__popupWin.js"></script>
	<script type="text/javascript" src="_dynamic_siteSetting/footer-setting.js"></script>
	<!-- ==========  (custom) JavaScript  ========== -->


	<!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Map        ______________________________ -->
	<!-- ======================================================================================== -->
	<script type="text/javascript" src="custom-code__js/map-function__dropdown.js?202102231409"></script>

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

		/**  =============== [Initial-Area] =============== **/
	</script>

	<!-- ==================================================================================================== -->
	<!-- ______________________________        (custom) Type of Courses        ______________________________ -->
	<!-- ==================================================================================================== -->
	<script type="text/javascript">
		$('#state').change(function () {
			var state = $("#state").children("option:selected").val();
			var regional = $(".radio-area:checked")[0].value;

			$.ajax({
				url: 'util/search-immigrationOperation',
				data: {
					state,
					regional,
				},
				method: 'post',
				dataType: 'json',
				success: function (ops) {
					var str = '';
					$("#schoolType").html("<option value='0' selected='selected'>请选择「课程类别」</option>");
					for (var i in ops) {
						str = "<option value='" + ops[i]['id'] + "'>" + ops[i]['name'] + "</option>";
						$("#schoolType").append(str);
					}
				}
			});
		});

		function refreshFields(event) {
			var state = $("#state").children("option:selected").val();
			var regional = $(".radio-area:checked")[0].value;
			var level = $("#schoolType").val();
			$("#broadField").html("<option value='0'>请选择「学科」</option>");
			$.get(`util/search-immigrationOperation?op=2&state=${state}&regional=${regional}&level=${level}`, res => {
				res = JSON.parse(res);
				allFields = res;
				res.forEach(e => {
					$("#broadField").append(`<option value="${e.id}">${("00" + e.id).substr(-2,2)} - ${e.name}</option>`);
				});
				$("#div_field").removeClass("ctm-disable");
			});
		}
		$("#schoolType").change(refreshFields);
	</script>

	<!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Tab        ______________________________ -->
	<!-- ======================================================================================== -->
	<script type="text/javascript">
		jQuery('input[type=radio][name="searchMode"]').change(function () {

			var value = jQuery("input[name='searchMode']:checked").val();

			if (this.value == 0) {
				jQuery('#search_tab1').show();
				jQuery('#search_tab2').hide();
			}

			if (this.value == 1) {
				jQuery('#search_tab1').hide();
				jQuery('#search_tab2').show();
			}

			/** ====  (Clear) Text-Field [value]  ==== **/
			jQuery('#broadField').val(0);
			jQuery('#narrowField').val(0);
			jQuery('#courseName').val('');

			/** ====  (Disable) Major [dropdown]  ==== **/
			jQuery('#div_Major').addClass('ctm-disable');

		});
	</script>

	<!-- ===================================================================================================== -->
	<!-- ______________________________        (custom) Major of Courses        ______________________________ -->
	<!-- ===================================================================================================== -->
	<script>
		//#region 以下代码添加于2021-02-23

		$(".radio-area").change(e => {
			//更新州
			$("#div_field").addClass("ctm-disable");
			$("#div_Major").addClass("ctm-disable");
			$("#state").html("<option value='0'>请选择「州」</option>");
			const regional = e.currentTarget.value;
			$("#i_regional").val(regional);
			$.post("util/search-immigrationOperation?op=1", {
					regional
				},
				res => {
					res = JSON.parse(res);
					res.forEach(el => {
						if (regional == 0) {
							//根据要求，非偏远地区要显示城市而不是州
							//还好一个州只有一个非偏远城市。
							//如果一个州有两个的话，可能需要更改数据库结构
							if (el.id == 1) el.name = "悉尼";
							else if (el.id == 2) el.name = "布里斯班";
							else if (el.id == 5) el.name = "墨尔本";
						}
						$("#state").append(`<option value='${el.id}'>${el.name}</option>`);
					});
					/** ====  Clear Map  ==== **/
					stateToLight__init();
				});

			//更新课程类别
			$.ajax({
				url: 'util/search-immigrationOperation',
				data: {
					state: 0,
					regional,
				},
				method: 'post',
				dataType: 'json',
				success: function (ops) {
					$("#schoolType").html("<option value='0' selected='selected'>请选择「课程类别」</option>");
					for (var i in ops) {
						$("#schoolType").append(`<option value='${ops[i]['id']}'>${ops[i]['name']}</option>`);
					}
				}
			});
		});

		$('input[name=area][value=0]').prop('checked', true).change();

		$('#broadField').change(function (e) {
			const field_p = e.currentTarget.value;
			const state = $("#state").children("option:selected").val();
			const regional = $(".radio-area:checked")[0].value;
			const level = $("#schoolType").val();

			$("#narrowField").html('<option value="0">请选择「主修」</option>')
			$.post('util/search-immigrationOperation?op=3', {
				field_p,
				regional,
				state,
				level,
			}, res => {
				res = JSON.parse(res);
				res.forEach(c => $("#narrowField").append(`<option value="${c.id}">${c.name}</option>`));
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