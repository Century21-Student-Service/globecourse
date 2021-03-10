<?php
	
	function pageTitle($c_pgTitle, $c_pgSubTitle){
		echo'<div class="gdlr-core-pbf-element">
                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                    <div class="gdlr-core-title-item-title-wrap clearfix">
                        
                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 34px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #161616 ;">'.$c_pgTitle.'</h3></div>
                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 16px ;font-style: normal ;color: #6c6c6c ;margin-top: 0 ;">'.$c_pgSubTitle.'</span></div>
                </div>
            </div>';
	}

	function titleLine(){
		echo'<div class="gdlr-core-pbf-element">
                <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 25px ;">
                    
                    <div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style-title"></div>
                </div>
            </div>';
	}

	function sectionTitle($c_sectionTitle, $c_sectionSubTitle){
		echo'<div class="gdlr-core-pbf-element">
                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
                    <div class="gdlr-core-title-item-title-wrap clearfix">
                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;">'.$c_sectionTitle.'</h3></div>
                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption ctm-subTitle">'.$c_sectionSubTitle.'</span></div>
                </div>
            </div>';
	}

	function sectionTitle_inTab($c_sectionTitle_inTab, $c_sectionSubTitle_inTab){
		echo'<div class="gdlr-core-pbf-element">
                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">   <!-- style="padding-bottom: 0 !important" -->
                    <div class="gdlr-core-title-item-title-wrap clearfix">
                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #464646 ;"><small>'.$c_sectionTitle_inTab.'</small></h3></div>
                        <div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 14px ;font-style: normal ;color: #6c6c6c ;"><small>'.$c_sectionSubTitle_inTab.'</small></span></div>
                </div>
            </div>';
	}
	
	function greyLine($margin_top){  //implement code: greyLine('margin-top: 60px;');
		empty($margin_top) ? $margin_top='margin-top: 20px !important;' : intval($margin_top);

        echo'<div class="gdlr-core-pbf-element">
                <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 25px ;">
                    <div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="'.$margin_top.'"></div>
                </div>
            </div>';
	}

    function emptySpace($gapSize){
        echo'<div class="gdlr-core-pbf-element">
                <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: '.$gapSize.' ;">
                    <div class="gdlr-core-divider-line gdlr-core-skin-divider" id="custom_greenLine-style" style="border-color: white;"></div>
                </div>
            </div>';
    }
?>