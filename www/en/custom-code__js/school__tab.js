var btnTab_all = [jQuery('#tab-overview'), jQuery('#tab-description'), jQuery('#tab-gallery'), jQuery('#tab-cList'), jQuery('#tab-hotel'), jQuery('#tab-eng'), jQuery('#tab-college'), jQuery('#tab-news')];
    	
tab_switch(btnTab_all);

function tab_switch(btnPressed) {
	jQuery.each(btnPressed, function(index, value){
		this.click(function(){
			alert();
			jQuery('.ctm-tab-top__title').removeClass('ctm-tab-top__title-active');
			this.addClass('ctm-tab-top__title-active');
		});
	}
}

// function tab_switch(btnPressed) {
// 	jQuery('.ctm-tab-top__title').removeClass('ctm-tab-top__title-active');
// 			this.addClass('ctm-tab-top__title-active');
// }