<?php session_start();
require_once dirname(__FILE__) . './../include/config.inc.php';
include_once './../ext/news.php';
include_once '_dynamic_siteSetting/directoryLang.php'; /***  '$directory' / '$fType_php' from 'directoryLang.php'  ***/
include_once 'custom-append/append__List.php';

// unset($_SESSION['states']);
// unset($_SESSION['cType']);
// unset($_SESSION['f_Range']);
// unset($_SESSION['f_From']);
// unset($_SESSION['f_To']);
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fees Search | CT21 Search Platform</title>
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
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />

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
        .gdlr-core-item-pdb{ padding-bottom: 15px !important; }

        /*green line*/
        #custom_greenLine-style-title{ border-color: #027dfa; border-bottom-width: 3px; }
        #custom_greenLine-style{ border-color: #d6d6d6; border-bottom-width: 2px; margin-top: 40px; }
    </style>
    <!-- ==========  (custom) Style [only this pg]  ========== -->


</head>
<body class="home page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full  kingster-with-sticky-navigation  kingster-blockquote-style-1 gdlr-core-link-to-lightbox">

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
		                                        	<img src="custom-images/map-Aus_pureBlueTxt.png" width="60px" height="60px" class="custom-mapState_button" title="全显示" id="mapBtn_Dark">
		                                        </div>
		                                    </div>
		                                </div>


		                                <!-- ================================================================================================================================== -->
		                                <!-- =============================================        Form [for submit button]        ============================================= -->
		                                <!-- ================================================================================================================================== -->
		                                <?php $toFile = 'search-fees__result';?>

		                                <form action="<?php echo $toFile . $fType_php; ?>" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" >
		                                <!-- <form action="<?php //include('_dynamic_siteSetting/folderLink_cn.php'); ;?>search-fees__result.php" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" > -->


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


						                                        	<!-- ====================     << Title >> {page}     ==================== -->
						                                            <?php pageTitle('Fees Search', ''); // title, subtitle ?>


						                                            <!-- ====================     << (Blue) Line >>     ==================== -->
						                                            <?php titleLine();?>

						                                        </div>
						                                    </div>
						                                </div>

			                                            <!-- =========================================================================================== -->
			                                            <!-- ===================================        [州名]        =================================== -->
			                                            <!-- =========================================================================================== -->
			                                            <div class="gdlr-core-pbf-column gdlr-core-column-30">
						                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
						                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">


						                                        	<!-- ===== (State - 州) ===== -->
						                                        	<?php sectionTitle_inTab('State', ''); // title, subtitle ?>

						                                            <!-- 5th Element -->
						                                            <!-- ====================     << Content >> {1st paragraph}     ==================== -->
						                                            <div class="gdlr-core-pbf-element">
						                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 20px ;">
						                                                    <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;letter-spacing: 0px ;text-transform: none ;">
						                                                        <!-- <div class="border-box_100">
						                                                        	<input type="radio" id="" name="state" value="0">
						                                                        	<div class="border-box_100_label">
						                                                        		<label for="state"><span>--请选择大州--</span></label><br>
						                                                        	</div>
						                                                        </div> -->


						                                                        <!-- =====  (Get) State list [from database]  ===== -->

						                                                        <!-- =====  (Insert) State [drop-down list]  ===== -->
						                                                        <?php

/***  (Set) recognition-Name  ***/
$dropdown_Name = 'state';
$dropdown_ID = 'state';
/***  (Set) Button-Percentage  ***/
$dropdown_Class = 'dropdown_100';

/***  (Set) 1st Value  ***/
$dropdown_valueNil = 'Please choose "State"';
/***  (Get) Value [from database]  ***/
$dropdown_tableID = 'stateEn';

/***  (Set) SQL code  ***/
$sql = "SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='$dropdown_tableID'";

/***  (Insert) State [dropdown]  ***/
include 'custom-append/append_State__dropdown.php';

?>


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


						                                        	<!-- ===== (State - 州) ===== -->
						                                        	<?php sectionTitle_inTab('Type of Courses', ''); // title, subtitle ?>

						                                            <!-- 8th Element -->
						                                            <!-- ====================     << Content >> {2nd paragraph}     ==================== -->
						                                            <div class="gdlr-core-pbf-element">
						                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">

						                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
					                                                        <?php

/***  (Set) recognition-Name  ***/
$dropdown_Name = 'courseType';
$dropdown_ID = 'courseType';
/***  (Set) Button-Percentage  ***/
$dropdown_Class = 'dropdown_100';

/***  (Set) 1st Value  ***/
$dropdown_valueNil = 'Please choose "Type of Courses"';
/***  (Get) Value [from database]  ***/
$dropdown_tableID = 'typeEn';

/***  (Set) SQL code  ***/
$sql = "SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='$dropdown_tableID'";

/***  (Insert) State [dropdown]  ***/
include 'custom-append/append_State__dropdown.php';

?>

						                                                </div>
						                                            </div>


						                                        </div>
						                                    </div>
						                                </div>

			                                            <!-- ====================     << Empty-Space >>     ==================== -->
			                                            <?php emptySpace('5%');?>


			                                            <!-- ----------------------------------------------------------------------        [Faculty]        ---------------------------------------------------------------------- -->

			                                            <!-- =================================================================================================== -->
			                                            <!-- ===================================        [Tab-buttons]        =================================== -->
			                                            <!-- =================================================================================================== -->
			                                            <?php
/***  (Set) recognition-Name  ***/
$tab_Name = 'searchMode_faculty';
$tab_ID = 'searchMode_faculty';

/***  (Set) 1st Value  ***/
$tab_Value_1 = '0';
$tab_Title_1 = 'Search by "Faculty"';

/***  (Set) 2nd Value  ***/
$tab_Value_2 = '1';
$tab_Title_2 = 'Search by "Course Name"';

/***  (Insert) Tab-bar  ***/
include 'custom-append/append_Tab2.php';
?>



			                                            <!-- ================================================================================================================= -->
			                                            <!-- =============================================        [Tab 1]        ============================================= -->
			                                            <!-- ================================================================================================================= -->
			                                            <div class="animated fadeIn" id="search_tab1_faculty" style="">

			                                            	<!-- ==================================================  << Faculty of Courses - 主要学科 >>  ================================================== -->

				                                            <!-- ===== (Faculty of Courses - 主要学科)  ===== -->
				                                            <?php sectionTitle_inTab('Faculty of Courses', ''); // title, subtitle ?>


				                                            <!-- ====================     << Content >> {1st paragraph}     ==================== -->
				                                            <div class="gdlr-core-pbf-element">
				                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">


				                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
			                                                        <select name="broadField" class="dropdown_100" id="broadField">
													                  <option value="0">Please choose "Faculty"</option>

													                  <?php
$dosql->Execute("SELECT * FROM `#@__field` WHERE `type`=0 ");

while ($row = $dosql->GetArray()) {
    $facultyName = empty($row['name_en']) ? '** Title - Could not be loaded' : $row['name_en'];

    echo ('<option value="' . $row['bh'] . '">' . $row['bh'] . ' - ' . $facultyName . '</option>');
}
?>
													                </select>


				                                                </div>
				                                            </div>
				                                            <!-- ====================     << (Grey) Line >>     ==================== -->
				                                            <?php greyLine('');?>

				                                            <!-- ==================================================  << Major of Course - 主修课程 >>  ================================================== -->

				                                            <div class="row ctm-disable" id="div_Major">
				                                            	<!-- ====================     << Title >> {2nd paragraph}     ==================== -->
				                                            	<?php sectionTitle_inTab('Major of Courses', ''); // title, subtitle ?>

					                                            <!-- ====================     << Content >> {2nd paragraph}     ==================== -->
					                                            <div class="gdlr-core-pbf-element">
					                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">

					                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
				                                                        <select name="narrowField" class="dropdown_100 ctm-dropdown__hide" id="narrowField" style="">
														                  <option value="0">Please choose "Major</option>
														                </select>

					                                                </div>
					                                            </div>
				                                            </div>

				                                            <!-- ====================     << (Grey) Line >>     ==================== -->
				                                            <?php greyLine('');?>

			                                            </div>


			                                            <!-- ================================================================================================================= -->
			                                            <!-- =============================================        [Tab 2]        ============================================= -->
			                                            <!-- ================================================================================================================= -->
			                                            <div class="animated fadeIn tab-box__hide" id="search_tab2_faculty" style="">

			                                            	<!-- ==================================================  << Course Name - 课程名称 >>  ================================================== -->

				                                            <!-- ===== (Course Name - 课程名称) ===== -->
				                                            <?php sectionTitle_inTab('Course Name', ''); // title, subtitle ?>


				                                            <!-- ====================     << Content >> {3rd paragraph}     ==================== -->
				                                            <div class="gdlr-core-pbf-element">
				                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="text-align: center !important;">

				                                                    <!-- =====  (Insert) Text Field  ===== -->
			                                                        <input name="courseName" type="text" class="ctm-txtField" id="courseName" />


				                                                </div>
				                                            </div>
				                                            <!-- ====================     << (Green) Line >>     ==================== -->
				                                            <?php greyLine('');?>

			                                            </div>


			                                            <!-- ----------------------------------------------------------------------        [Fees]        ---------------------------------------------------------------------- -->

			                                            <!-- =================================================================================================== -->
			                                            <!-- ===================================        [Tab-buttons]        =================================== -->
			                                            <!-- =================================================================================================== -->
			                                            <?php
/***  (Set) recognition-Name  ***/
$tab_Name = 'searchMode_fees';
$tab_ID = 'searchMode_fees';

/***  (Set) 1st Value  ***/
$tab_Value_1 = '0';
$tab_Title_1 = 'Search by "Range of Fees"';

/***  (Set) 2nd Value  ***/
$tab_Value_2 = '1';
$tab_Title_2 = 'Search by "Fees Amount"';

/***  (Insert) Tab-bar  ***/
include 'custom-append/append_Tab2.php';
?>



			                                            <!-- ================================================================================================================= -->
			                                            <!-- =============================================        [Tab 1]        ============================================= -->
			                                            <!-- ================================================================================================================= -->
			                                            <div class="animated fadeIn" id="search_tab1_fees" style="">

			                                            	<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

				                                            <!-- ====================     << Title >> {1st paragraph}     ==================== -->		<!-- ===== (Faculty of Courses - 主要学科) ===== -->
				                                            <?php sectionTitle_inTab('Range of Fees', ''); // title, subtitle ?>

				                                            <!-- ====================     << Content >> {1st paragraph}     ==================== -->
				                                            <div class="gdlr-core-pbf-element">
				                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">


				                                                    <!-- =====  (Insert) State [drop-down list]  ===== -->
			                                                        <select name="feesRange" class="dropdown_100" id="feesRange">
			                                                        	<option value="0">Please Choose "Range of Fees</option>
			                                                        	<option value="1">（AUD）$10,000 below</option>
			                                                        	<option value="2">（AUD）$10,000 - $20,000</option>
			                                                        	<option value="3">（AUD）$20,000 - $40,000</option>
			                                                        	<option value="4">（AUD）$40,000 - $60,000</option>
			                                                        	<option value="5">（AUD）$60,000 - $80,000</option>
			                                                        	<option value="6">（AUD）$80,000 above</option>

			                                                        	<?php
// $dosql->Execute("SELECT * FROM `#@__field` WHERE `type`=0 ");

// while($row = $dosql->GetArray()){
//     echo('<option value="'.$row['bh'].'">'.$row['bh'].' - '.$row['cname'].'</option>');
// }
;?>
													                </select>


				                                                </div>
				                                            </div>
				                                            <!-- ====================     << (Grey) Line >>     ==================== -->
				                                            <div class="gdlr-core-pbf-element">
				                                                <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 25px ;">
				                                                    <div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="margin-top: 20px !important"></div>
				                                                </div>
				                                            </div>

			                                            </div>


			                                            <!-- ================================================================================================================= -->
			                                            <!-- =============================================        [Tab 2]        ============================================= -->
			                                            <!-- ================================================================================================================= -->
			                                            <div class="animated fadeIn tab-box__hide" id="search_tab2_fees" style="">

			                                            	<!-- ==================================================  << 1st Tab-element >>  ================================================== -->

				                                            <!-- ====================     << Title >> {3rd paragraph}     ==================== -->		<!-- ===== (Category - 课程类别) ===== -->
				                                            <?php sectionTitle_inTab('Specific Amount of Fees', ''); // title, subtitle ?>

				                                            <!-- ====================     << Content >> {3rd paragraph}     ==================== -->
				                                            <div class="gdlr-core-pbf-element">
				                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="text-align: center !important;">

				                                                    <!-- =====  (Insert) Text Field  ===== -->
			                                                        <span>（AUD）$</span>
			                                                        <input class="ctm-txtField_25" style="margin-left: 10px;" name="feesFrom" type="text" id="feesFrom" value="0" />to
			                                                        <input class="ctm-txtField_25" name="feesTo" type="text" id="feesTo" value="0" />


				                                                </div>
				                                            </div>
				                                            <!-- ====================     << (Green) Line >>     ==================== -->
				                                            <?php greyLine('');?>

			                                            </div>



			                                            <!-- ===================================================================================================== -->
			                                            <!-- ===================================        [Search-button]        =================================== -->
			                                            <!-- ===================================================================================================== -->

			                                            <!-- 13th Element -->
			                                            <!-- ====================     << (Search) Button >>     ==================== -->
			                                            <div class="gdlr-core-pbf-element" style="padding-left: 5%;">
			                                            	<button id="btnSearch" type="submit" class="gdlr-core-button gdlr-core-button-solid gdlr-core-button-no-border custom-button_noBorder" style="font-weight: bold;" id="button">Search</button>
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
			        <?php echo include 'custom-append/append_Popup__searchResult.php'; ?>

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
    <script>
		jQuery(function(){
			jQuery('#broadField').change(function(){
				var pid=jQuery(this).val();
				//alert(pid);
				jQuery.ajax({
					type :'GET',
					url  :'./../ext/ajaxFun.php?act=getSecField&type=1&pid='+pid,
					date :'',
					success:function(m){
						jQuery('#narrowField option').remove();
						jQuery('#narrowField').append(m);
					}
				});

				if (jQuery('#broadField').val() != ''){
					jQuery('#narrowField').removeClass('ctm-dropdown__hide');
				}
				if (jQuery('#broadField').val() == ''){
					jQuery('#narrowField').addClass('ctm-dropdown__hide');
				}
		   });

		});
	</script>
	<!-- ==========  (custom) JavaScript  ========== -->


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

    	if (w < 1260){
    		jQuery('.ctm-map-svg').css({'margin-right': '0%'});
    		jQuery('.ctm-map-container').css({'margin-bottom': '15%'});
    	}
    </script>

    <!-- ========================================================================================================= -->
	<!-- ______________________________        (custom) Tab-Switch [faculty]        ______________________________ -->
	<!-- ========================================================================================================= -->
    <script type="text/javascript">

    	jQuery('input[name="searchMode_faculty"]').change(function(){

    		var value = jQuery("input[name='searchMode_faculty']:checked").val();

    		if(value == 0){
    			jQuery('#search_tab1_faculty').removeClass('tab-box__hide');
    			jQuery('#search_tab2_faculty').addClass('tab-box__hide');
    		}

    		if(value == 1){
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

    <!-- ===================================================================================================== -->
	<!-- ______________________________        (custom) Major of Courses        ______________________________ -->
	<!-- ===================================================================================================== -->
    <script>
		jQuery(function(){
			jQuery('#broadField').change(function(){
				var pid=jQuery(this).val();
				//alert(pid);
				jQuery.ajax({
					type :'GET',
					url  :'./../ext/ajaxFun.php?act=getSecField_en&type=1&pid='+pid,
					date :'',
					success:function(m){
						jQuery('#narrowField option').remove();
						jQuery('#narrowField').append(m);
					}
				});

				if (jQuery('#broadField').val() != ''){
					jQuery('#div_Major').removeClass('ctm-disable');
					// jQuery('#narrowField').removeClass('ctm-dropdown__hide');
				}
				if (jQuery('#broadField').val() == '' || jQuery('#broadField').val() == '0'){
					jQuery('#div_Major').addClass('ctm-disable');
					// jQuery('#narrowField').addClass('ctm-dropdown__hide');
				}
		   });

		});
	</script>

    <!-- =============================================================================================== -->
	<!-- ______________________________        (custom) Tab-Switch        ______________________________ -->
	<!-- =============================================================================================== -->
    <script type="text/javascript">

    	jQuery('input[name="searchMode_fees"]').change(function(){

    		var value = jQuery("input[name='searchMode_fees']:checked").val();

    		if(value == 0){
    			jQuery('#search_tab1_fees').removeClass('tab-box__hide');
    			jQuery('#search_tab2_fees').addClass('tab-box__hide');
    		}

    		if(value == 1){
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
    	jQuery('#feesTo').on('change keyup', function(){
    		if (jQuery('#feesTo').val() != '0'){
	    		jQuery('#feesFrom').removeClass('ctm__disable');
	    	}
	    	else{
	    		jQuery('#feesFrom').addClass('ctm__disable');
	    		jQuery('#feesFrom').val('0');
	    	}

	    		//  validate 'fees-from' is 'smaller' than 'fees-to'
	    		if (jQuery('#feesTo').val() < jQuery('#feesFrom').val()){
	    			var feesTo_intVal = parseInt(jQuery('#feesTo').val());
	    			jQuery('#feesFrom').val(feesTo_intVal -1);
		    	}
    	});

    	//  validate 'fees-from' is 'smaller' than 'fees-to'
    	jQuery('#feesFrom').on('change keyup', function(){
    		if (jQuery('#feesFrom').val() > jQuery('#feesTo').val()){
    			var feesTo_intVal = parseInt(jQuery('#feesTo').val());
    			jQuery('#feesFrom').val(feesTo_intVal -1);
	    	}
    	});

    	jQuery('#feesFrom').focusout(function(){
    		if (jQuery('#feesFrom').val() == ''){
    			jQuery('#feesFrom').val('0');
    		}
    	});
    	jQuery('#feesTo').focusout(function(){
    		if (jQuery('#feesTo').val() == ''){
    			jQuery('#feesTo').val('0');
    		}
    	});

    </script>
</body>
</html>