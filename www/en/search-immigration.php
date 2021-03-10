<?php session_start();
require_once(dirname(__FILE__).'./../include/config.inc.php');
include_once('./../ext/news.php');
include_once('_dynamic_siteSetting/directoryLang.php');  /***  '$directory' / '$fType_php' from 'directoryLang.php'  ***/
include_once('custom-append/append__List.php');

unset($_SESSION['states']);
unset($_SESSION['cType']);
unset($_SESSION['cN']);
unset($_SESSION['bField']);
unset($_SESSION['narrowField']);
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Immigration Search | CT21 Search Platform</title>
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
		                                        	<?php include('map.php'); ?>
		                                        	<!-- ====================     << Map >>     ==================== -->

		                                        	<img src="custom-images/map-Aus_pureLight.png" width="60px" height="60px" class="custom-mapState_button" title="原始" id="mapBtn_Light">
		                                        	<img src="custom-images/map-Aus_pureBlueTxt.png" width="60px" height="60px" class="custom-mapState_button" title="全显示" id="mapBtn_Dark">
		                                        </div>
		                                    </div>
		                                </div>


		                                <!-- ================================================================================================================================== -->
		                                <!-- =============================================        Form [for submit button]        ============================================= -->
		                                <!-- ================================================================================================================================== -->
		                                <?php $toFile = 'search-immigration__result' ?>
		                                
		                                <form action="<?php echo $toFile.$fType_php; ?>" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" >
		                                <!-- <form action="<?php //include('_dynamic_siteSetting/folderLink_cn.php'); ?>search-immigration__result.php" id="showResult" target="Result_Popup" onsubmit="ShowResult()" method="post" > -->


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
						                                            <?php pageTitle('Immigration Search', '');  // title, subtitle ?>

						                                            
						                                            <!-- ====================     << (Blue) Line >>     ==================== -->
						                                            <?php titleLine(); ?>

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
						                                            <?php
		                                                        		/***  (Set) recognition-Name  ***/
	                                                        			$tab_Name = 'area';
	                                                        			$tab_ID = 'area';
	                                                        			
	                                                        			/***  (Set) 1st Value  ***/
	                                                        			$tab_Value_1 = 'normal'; $tab_Title_1 = 'Non-Regional';

		                                                        		/***  (Set) 2nd Value  ***/
	                                                        			$tab_Value_2 = 'regional'; $tab_Title_2 = 'Regional';

		                                                        		/***  (Insert) Tab-bar  ***/
			                                                        	include('custom-append/append_Tab2.php');
			                                                        ?>

						                                            <!-- ============================================================= -->
						                                            <!-- ====================        [州名]        ==================== -->
						                                            <!-- ============================================================= -->
						                                            <div class="gdlr-core-pbf-column gdlr-core-column-60" id="div_state">
									                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
									                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
									                                        	

									                                        	<!-- ===== (State - 州) ===== -->
									                                            <?php sectionTitle_inTab('State', '');  // title, subtitle ?>

									                                            <!-- =====  (Drop-down)  ===== -->
									                                            <div class="gdlr-core-pbf-element">
									                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding: 0 30px;">
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
							                                                        			$dropdown_optionID = '';
								                                                        		/***  (Set) Button-Percentage  ***/
								                                                        		$dropdown_Class = 'dropdown_100';

								                                                        		/***  (Set) 1st Value  ***/
								                                                        		$dropdown_valueNil = 'Please choose "State"';
								                                                        		/***  (Get) Value [from database]  ***/
								                                                        		$dropdown_tableID = 'stateEn';

								                                                        		/***  (Set) SQL code  ***/
								                                                        		$sql = "SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='$dropdown_tableID'";

								                                                        		/***  (Insert) State [dropdown]  ***/
									                                                        	include('custom-append/append_State__dropdown.php');
								                                                        		
									                                                        ?>


									                                                    </div>
									                                                </div>
									                                            </div>


									                                        </div>
									                                    </div>
									                                </div>

									                                <!-- ====================     << (Grey) Line >>     ==================== -->
						                                            <?php greyLine(''); ?>

									                                <!-- =========================================================================== -->
						                                            <!-- ====================        [课程类别 (移民所需)]        ==================== -->
						                                            <!-- =========================================================================== -->
									                                <div class="gdlr-core-pbf-column gdlr-core-column-60 ctm-disable" id="div_courseLevel">
									                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 20px 0px;padding: 0px 0px 0px 0px;">
									                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
									                                        	

									                                        	<!-- =====  (Type of Courses - 课程类别)  ===== -->
									                                            <?php sectionTitle_inTab('Type of Courses<small> (for immigration)</small>', '');  // title, subtitle ?>

									                                            <!-- =====  (Drop-down)  ===== -->
									                                            <div class="gdlr-core-pbf-element">
									                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="padding: 0 30px;">
									                                                    
									                                                    <!--  (Insert) [drop-down list]  -->
								                                                        <?php

							                                                        		/***  (Set) recognition-Name  ***/
						                                                        			$dropdown_Name = 'schoolType';
						                                                        			$dropdown_ID = 'schoolType';
						                                                        			$dropdown_optionID = 'schoolType_option';
							                                                        		/***  (Set) Button-Percentage  ***/
							                                                        		$dropdown_Class = 'dropdown_100';

							                                                        		/***  (Set) 1st Value  ***/
							                                                        		$dropdown_valueNil = 'Please choose "Type of Courses"';
							                                                        		/***  (Get) Value [from database]  ***/
							                                                        		$dropdown_tableID = 'typeEn';

							                                                        		/***  (Set) SQL code  ***/
							                                                        		$sql = "SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='$dropdown_tableID'";

							                                                        		/***  (Insert) State [dropdown]  ***/
								                                                        	include('custom-append/append_State__dropdown.php');
							                                                        		
								                                                        ?>

									                                                </div>
									                                            </div>
									                                            

									                                        </div>
									                                    </div>
									                                </div>

						                                        </div>
						                                    </div>
						                                </div>


			                                            <!-- ====================     << Empty-Space >>     ==================== -->
			                                            <?php emptySpace('5%'); ?>




			                                            <!-- ==================================================================================================== -->
			                                            <!-- ===================================        [Bottom-Layer]        =================================== -->
			                                            <!-- ==================================================================================================== -->
						                                <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" style="padding: 0 5%;">
						                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
						                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ctm-map-container">


						                                        	<!-- ===================================================================== -->
						                                            <!-- ====================        [Tab-buttons]        ==================== -->
						                                            <!-- ===================================================================== -->
						                                            <?php
		                                                        		/***  (Set) recognition-Name  ***/
	                                                        			$tab_Name = 'searchMode';
	                                                        			$tab_ID = 'searchMode';
	                                                        			
	                                                        			/***  (Set) 1st Value  ***/
	                                                        			$tab_Value_1 = '0'; $tab_Title_1 = 'Search by "Faculty"';

		                                                        		/***  (Set) 2nd Value  ***/
	                                                        			$tab_Value_2 = '1'; $tab_Title_2 = 'Search by "Course Name"';

		                                                        		/***  (Insert) Tab-bar  ***/
			                                                        	include('custom-append/append_Tab2.php');
			                                                        ?>


						                                            <!-- ============================================================= -->
						                                            <!-- ====================        [学科]        ==================== -->
						                                            <!-- ============================================================= -->
						                                            <div class="animated fadeIn" id="search_tab1" style="">
						                                            	
						                                            	<!-- ==================================================  << Faculty of Courses - 主要学科 >>  ================================================== -->
							                                            
							                                            <!-- ===== (Faculty of Courses - 主要学科)  ===== -->
							                                            <?php sectionTitle_inTab('Faculty of Courses', '');  // title, subtitle ?>


							                                            <!-- =====  (Drop-down)  ===== -->
							                                            <div class="gdlr-core-pbf-element">
							                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="padding: 0 30px;">
							                                                    
							                                                    
							                                                    <!--  (Insert) [drop-down list]  -->
						                                                        <select name="broadField" class="dropdown_100" id="broadField">
																                  <option value="0">Please choose "Faculty"</option>
																        					
																                  <?php
																                    $dosql->Execute("SELECT * FROM `#@__field` WHERE `type`=0 ");

																                    while($row = $dosql->GetArray()){
																                    	$facultyName = empty($row['ename']) ? '** Title - Could not be loaded' : $row['ename'];
																                    	
																                    	echo('<option value="'.$row['bh'].'">'.$row['bh'].' - '.$facultyName.'</option>');
																                    }
																        					?>
																                </select>


							                                                </div>
							                                            </div>
							                                            <!-- ====================     << (Grey) Line >>     ==================== -->
							                                            <?php greyLine(''); ?>

							                                            <!-- ==================================================  << Major of Course - 主修课程 >>  ================================================== -->

							                                            <!-- ===== (Major of Course - 主修课程) ===== -->
							                                            <div class="row ctm-disable" id="div_Major">
							                                            	<!-- ====================     << Title >> {2nd paragraph}     ==================== -->
								                                            <?php sectionTitle_inTab('Major of Courses', '');  // title, subtitle ?>

								                                            <!-- =====  (Drop-down)  ===== -->
								                                            <div class="gdlr-core-pbf-element">
								                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="padding: 0 30px;">
								                                                    
								                                                    <!--  (Insert) [drop-down list]  -->
							                                                        <select name="narrowField" class="dropdown_100" id="narrowField" style="">
																	                  <option value="0">Please choose "Major"</option>
																	                </select>

								                                                </div>
								                                            </div>
							                                            </div>
							                                            
							                                            <!-- ====================     << (Grey) Line >>     ==================== -->
							                                            <?php greyLine(''); ?>

						                                            </div>

						                                            


						                                            <!-- ============================================================= -->
						                                            <!-- ====================        [输入]        ==================== -->
						                                            <!-- ============================================================= -->
						                                            <div class="animated fadeIn tab-box__hide" id="search_tab2" style="">
						                                            	
						                                            	<!-- ==================================================  << Course Name - 课程名称 >>  ================================================== -->

							                                            <!-- ===== (Course Name - 课程名称) ===== -->
							                                            <?php sectionTitle_inTab('Course Name', '');  // title, subtitle ?>

							                                            <!-- =====  (Text-Field)  ===== -->
							                                            <div class="gdlr-core-pbf-element">
							                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix " style="text-align: center !important;">

							                                                	<!--  (Insert) Text Field  -->
						                                                        <input name="courseName" type="text" class="ctm-txtField" id="courseName" />

							                                                </div>
							                                            </div>

							                                            <!-- ====================     << (Grey) Line >>     ==================== -->
							                                            <?php greyLine(''); ?>

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
			        <?php echo include('custom-append/append_Popup__searchResult.php'); ?>

                </div>
            </div>

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

	

	<!-- ==========  [from-ORIGINAL]  ========== -->
    <!-- <script src="./../templates/default/js/jquery.min.js"></script> -->


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

    <!-- ============================================================================================= -->
	<!-- ______________________________        (custom) Tab-Area        ______________________________ -->
	<!-- ============================================================================================= -->
    <script type="text/javascript">

    	jQuery('input[name=area][value=normal]').prop('checked', true);

    	var regional_val = ["4","5","8"];

    	/**  =============== [Initial-Area] =============== **/
    	if (jQuery('input[name=area][value=normal]').is(':checked')){
    		normal_show();
    	}
    	
    	/**  =============== [Changed-Area] =============== **/
    	jQuery('input[type=radio][name=area]').change(function() {

    		if (this.value == 'regional') {
            	regional_show()
            }
            else if (this.value == 'normal') {
            	normal_show()
            }

            jQuery('#state').val(0);
            jQuery('#schoolType').val(0);
            jQuery('#div_courseLevel').addClass('ctm-disable');
            // jQuery('#div_courseLevel').hide();

            /** ====  Clear Map  ==== **/
            stateToLight__init();
            return;
        });

        /**  ===== [function] ===== **/
        function normal_show(){
        	jQuery("#state option").each(function(){
        		if( regional_val.includes(jQuery(this).attr("value")) )
                	jQuery(this).hide();
                else
                	jQuery(this).show();
        	});
        }
        function regional_show(){
        	jQuery("#state option").each(function(index){
        		if( regional_val.includes(jQuery(this).attr("value")) )
                	jQuery(this).show();
                else if ( index != 0 )
                	jQuery(this).hide();
        	});
        }

    </script>

    <!-- ========================================================================================== -->
	<!-- ______________________________        (custom) State        ______________________________ -->
	<!-- ========================================================================================== -->
	<script type="text/javascript">

		/**  =============== [Selected-State] =============== **/
		jQuery('#state').change(function() {
			// alert(jQuery('#state').val());
			courseLv_ShowHide();
		});

		function courseLv_ShowHide(){
			if (jQuery('#state').attr("value") == '0'){
				jQuery('#div_courseLevel').addClass('ctm-disable');
				// jQuery('#div_courseLevel').hide();
			}
			else
				jQuery('#div_courseLevel').removeClass('ctm-disable');
				// jQuery('#div_courseLevel').show();
		}

	</script>

	<!-- ==================================================================================================== -->
	<!-- ______________________________        (custom) Type of Courses        ______________________________ -->
	<!-- ==================================================================================================== -->
	<script type="text/javascript">

		jQuery('#state').change(function(){
			courseLv_forImmi__chg();
		});

		function courseLv_forImmi__chg(){
		    var options=jQuery("#state").children("option:selected").val();

		    jQuery.ajax({
		    	url: 'search-immigration__getCourseLevel<?php echo $fType_php; ?>', 
		    	data: {'state':options},
		    	method:'post',
		    	dataType:'json',
		    	// header: { 'Content-Type': 'application/x-www-form-urlencoded' },

		    	success: function (ops) {
		    		console.log(ops);
		    		var str='';
		    		jQuery("#schoolType_option").siblings("option").remove();

		    		for(var i in ops){
		    			console.log(ops[i].title);
		    			str= "<option value='"+ops[i][1]+"'>"+ops[i][0]+"</option>";
		    			console.log(str);
		    			jQuery("#schoolType").append(str);
		    		}
		    	}
		    });
		}

	</script>

    <!-- ======================================================================================== -->
	<!-- ______________________________        (custom) Tab        ______________________________ -->
	<!-- ======================================================================================== -->
    <script type="text/javascript">
    	
    	jQuery('input[type=radio][name="searchMode"]').change(function(){

    		var value = jQuery("input[name='searchMode']:checked").val();
    		
    		if(this.value == 0){
    			jQuery('#search_tab1').show();
    			jQuery('#search_tab2').hide();
    		}

    		if(this.value == 1){
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
				}
				if (jQuery('#broadField').val() == '' || jQuery('#broadField').val() == '0'){
					jQuery('#div_Major').addClass('ctm-disable');
				}
		   });

		});
	</script>
</body>
</html>