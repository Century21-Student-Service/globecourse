<!-- ======================================================================================== -->
<!-- ______________________________        (custom) Map        ______________________________ -->
<!-- ======================================================================================== -->
<script>
	// var stateName = [jQuery('#TAS'), jQuery('#VIC'), jQuery('#NSW'), jQuery('#QLD'), jQuery('#SA'), jQuery('#NT'), jQuery('#WA')];
	// var stateName_hover = [jQuery('#TAS-light'), jQuery('#VIC-light'), jQuery('#NSW-light'), jQuery('#QLD-light'), jQuery('#SA-light'), jQuery('#NT-light'), jQuery('#WA-light')];
	var stateName_DB_order = [jQuery('#NSW-light'), jQuery('#VIC-light'), jQuery('#QLD-light'), jQuery('#SA-light'), jQuery('#NT-light'), jQuery('#WA-light'), jQuery('#ACT-light'), jQuery('#TAS-light')];
	var stateTxt_DB_order = [jQuery('#NSW_txt'), jQuery('#VIC_txt'), jQuery('#QLD_txt'), jQuery('#SA_txt'), jQuery('#NT_txt'), jQuery('#WA_txt'), jQuery('#ACT_txt'), jQuery('#TAS_txt')];
	var stateTxt_DB_order_Cn = [jQuery('#NSW_txt-cn'), jQuery('#VIC_txt-cn'), jQuery('#QLD_txt-cn'), jQuery('#SA_txt-cn'), jQuery('#NT_txt-cn'), jQuery('#WA_txt-cn'), jQuery('#ACT_txt-cn'), jQuery('#TAS_txt-cn')];
	

	jQuery('select[name="state"]').change(function(){
		var index = jQuery('select[name="state"]').val() -1;

		if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')){
			
			if (index ==6){
				stateName_DB_order[index].addClass('ctm-mapState__ACT--click');
			}
			else stateName_DB_order[index].addClass('ctm-mapState__Light--click');
			
			stateToLight_Text();

    		//  (de-Highlight) non-Selected [state-map]
			jQuery.each(stateName_DB_order, function(i, v){
				if (i != index){
					stateName_DB_order[i].removeClass('ctm-mapState__Light--click');
					stateName_DB_order[i].removeClass('ctm-mapState__ACT--click');
				}
			});
		}

		if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')){
			
			if (index ==6){
				stateName_DB_order[index].addClass('ctm-mapState__ACT--click');
			}
			else stateName_DB_order[index].addClass('ctm-mapState__Dark--click');
			
			//stateToDark_Text();
			stateToDark();
			
    		//  (de-Highlight) non-Selected [state-map]
			jQuery.each(stateName_DB_order, function(i, v){
				if (i != index){
					stateName_DB_order[i].removeClass('ctm-mapState__Dark--click');
					stateName_DB_order[i].removeClass('ctm-mapState__ACT--click');
				}
			});
		}
	});
	/**  =============== (Add) state-Map [click] =============== **/
	jQuery.each(stateName_DB_order, function(index, value){
		//  (Add) Hover [listener]
    	this.hover(function(){

			stateHover_forLight(index);
			stateHover_forDark(index);

		}, function(){
			stateHover_forLight_remove(index);
			stateHover_forDark_remove(index);
		});

		//  (Add) Click [listener]
    	this.click(function(){
			stateSelect_forLight(index);
			stateSelect_forDark(index);
		});    		
	});

	/**  =============== (Add) state-Text [click] =============== **/
	jQuery.each(stateTxt_DB_order, function(index, value){
		//  (Add) Hover [listener]
    	this.hover(function(){

			stateHover_forLight(index);
			stateHover_forDark(index);

		}, function(){
			stateHover_forLight_remove(index);
			stateHover_forDark_remove(index);
		});

		//  (Add) Click [listener]
    	this.click(function(){
			stateSelect_forLight(index);
			stateSelect_forDark(index);
		});    		
	});
	/**  =============== (Add) state-Text-Cn [click] =============== **/
	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
		//  (Add) Hover [listener]
    	this.hover(function(){
			stateHover_forLight(index);
			stateHover_forDark(index);
		}, function(){
			stateHover_forLight_remove(index);
			stateHover_forDark_remove(index);
		});

		//  (Add) Click [listener]
    	this.click(function(){
			stateSelect_forLight(index);
			stateSelect_forDark(index);
		});    		
	});

	/** ============================================================== **/
	/** ===============        Click [listener]        =============== **/
	/** ============================================================== **/

	/**  =============== [Light] =============== **/
	function stateSelect_forLight(index){
		if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')){
			
			jQuery('#state').val(index +1);
			
			if (index == 6){
				stateName_DB_order[index].addClass('ctm-mapState__ACT--click');
			}
			else
				stateName_DB_order[index].addClass('ctm-mapState__Light--click');
			stateTxt_DB_order[index].removeClass('custom-hide');
			stateTxt_DB_order_Cn[index].removeClass('custom-hide');

			//  (de-Highlight) non-Selected [state]
            jQuery.each(stateName_DB_order, function(i, v){
                if (i != index){
                    stateName_DB_order[i].removeClass('ctm-mapState__Light--click');
                    stateTxt_DB_order[i].addClass('custom-hide');
                    stateTxt_DB_order_Cn[i].addClass('custom-hide');

                    stateName_DB_order[i].removeClass('ctm-mapState__ACT--click');
                }
            });
		}
	}
	/**  =============== [Dark] =============== **/
	function stateSelect_forDark(index){
		if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')){
			
			jQuery('#state').val(index +1);
			
			stateToDark();
			if (index == 6){
				stateName_DB_order[index].addClass('ctm-mapState__ACT--click');
			}
			else
				stateName_DB_order[index].addClass('ctm-mapState__Dark--click');

			//  (de-Highlight) non-Selected [state]
            jQuery.each(stateName_DB_order, function(i, v){
                if (i != index){
                    stateName_DB_order[i].removeClass('ctm-mapState__Dark--click');
                    stateName_DB_order[i].removeClass('ctm-mapState__ACT--click');
                }
            });
		}
	}
	
	/** ============================================================== **/
	/** ===============        Hover [listener]        =============== **/
	/** ============================================================== **/

	/**  =============== [Light] =============== **/
	function stateHover_forLight(index){
		if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')){
			if (index == 6){
				stateName_DB_order[index].addClass('ctm-mapState__ACT--hover');
			}
			else
				stateName_DB_order[index].addClass('ctm-mapState__Light--hover');
			
			stateTxt_DB_order[index].addClass('ctm-mapState__txtShow');
			stateTxt_DB_order_Cn[index].addClass('ctm-mapState__txtShow');
		}
	}
	function stateHover_forLight_remove(index){
		if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')){
			if (index == 6){
				stateName_DB_order[index].removeClass('ctm-mapState__ACT--hover');
			}
			else
				stateName_DB_order[index].removeClass('ctm-mapState__Light--hover');
			
			stateTxt_DB_order[index].removeClass('ctm-mapState__txtShow');
			stateTxt_DB_order_Cn[index].removeClass('ctm-mapState__txtShow');
		}
	}

	/**  =============== [Dark] =============== **/
	function stateHover_forDark(index){
		if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')){
			stateName_DB_order[index].addClass('ctm-mapState__Dark--hover');
		}
	}
	function stateHover_forDark_remove(index){
		if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')){
			stateName_DB_order[index].removeClass('ctm-mapState__Dark--hover');
		}
	}
	/** =============================================================================================== **/
	/** ______________________________        (custom) Map-Button        ______________________________ **/
	/** =============================================================================================== **/
	jQuery('#mapBtn_Light').addClass('custom-mapState_button_Clicked');

	/** ===============        Click [listener]        =============== **/
	jQuery('#mapBtn_Light').click(function(){
		if (!jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')){
			
			jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Hovered');
			jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Clicked');
    		jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Hovered');

    		jQuery('#mapBtn_Light').addClass('custom-mapState_button_Clicked');
    		stateToLight();
    		stateToLight_Text();
		}
	});

	jQuery('#mapBtn_Dark').click(function(){
		if (!jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')){
			
			jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Hovered');
			jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Clicked');
			jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Hovered');

    		jQuery('#mapBtn_Dark').addClass('custom-mapState_button_Clicked');
    		stateToDark();
		}
	});

	/** ===============        Hover [listener]        =============== **/
	
	/**  ===== Light [btn] ===== **/
	jQuery('#mapBtn_Light').hover(
		function(){
    		if ( !jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked') ){
    			
    			jQuery('#mapBtn_Light').addClass('custom-mapState_button_Hovered');
    			//jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Clicked');
    			
    			//  (Show) Map [light]
    			jQuery.each(stateName_DB_order, function(index, value){
    				if (index == 6){
    					this.removeClass('ctm-mapState__ACT--click');
    				}
    				else
    					this.addClass('ctm-mapState__toLight--hoverBtn');
		    	});
		    	//  (Show) Text [light]
    			jQuery.each(stateTxt_DB_order, function(index, value){
    				this.removeClass('ctm-mapState__txtShow');
    				this.addClass('custom-hide');
		    	});
		    	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
    				this.removeClass('ctm-mapState__txtShow');
    				this.addClass('custom-hide');
		    	});
    		}
    	}, function(){
    		if ( !jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked') ){

    			jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Hovered');

    			//  (Hide) Map [light]
    			jQuery.each(stateName_DB_order, function(index, value){
    				if (index == 6){
    					this.addClass('ctm-mapState__ACT--click');
    				}
    				else
    					this.removeClass('ctm-mapState__toLight--hoverBtn');
		    	});
		    	//  (Hide) Light [text]
    			jQuery.each(stateTxt_DB_order, function(index, value){
    				this.addClass('ctm-mapState__txtShow');
    				this.removeClass('custom-hide');
		    	});
		    	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
    				this.addClass('ctm-mapState__txtShow');
    				this.removeClass('custom-hide');
		    	});
    		}
    	}
    );
	/**  ===== Dark [btn] ===== **/
	jQuery('#mapBtn_Dark').hover(
		function(){
    		if ( !jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked') ){
    			
    			jQuery('#mapBtn_Dark').addClass('custom-mapState_button_Hovered');
    			//jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Clicked');
    			
    			//  (Show) Map [dark]
    			jQuery.each(stateName_DB_order, function(index, value){
    				if (index == 6){
    					//this.addClass('ctm-mapState__ACT--hover');
    				}
    				else
    					this.addClass('ctm-mapState__toDark--hoverBtn');
		    	});
		    	//  (Show) Text [dark]
    			jQuery.each(stateTxt_DB_order, function(index, value){
    				this.addClass('ctm-mapState__txtShow');
		    	});
		    	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
    				this.addClass('ctm-mapState__txtShow');
		    	});

		    	//stateText_toggle();
    		}
    	}, function() {
    		if ( !jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked') ){
    			jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Hovered');

    			//  (Hide) Map [dark]
    			jQuery.each(stateName_DB_order, function(index, value){
    				if (index == 6){
    					//this.removeClass('ctm-mapState__ACT--hover');
    				}
    				else
    					this.removeClass('ctm-mapState__toDark--hoverBtn');
		    	});
		    	//  (Hide) Text [dark]
    			jQuery.each(stateTxt_DB_order, function(index, value){
    				this.removeClass('ctm-mapState__txtShow');
		    	});
		    	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
    				this.removeClass('ctm-mapState__txtShow');
		    	});
    		}
    	}
    );

	/** ===============        (Change) Light & Dark        =============== **/
	function stateToDark(){
		jQuery.each(stateName_DB_order, function(index, value){
			
			//  All States [to dark]
			this.removeClass('ctm-mapState__toDark--hoverBtn');
			this.removeClass('ctm-mapState__Light--click');
			this.removeClass('ctm-mapState__Light');

			//stateText_show();

			if (index != 6){
				if (index == (jQuery('#state').val() -1)){
					if (index == 6){
						this.addClass('ctm-mapState__ACT--click');
					}
					else this.addClass('ctm-mapState__Dark--click');
				} else {
					if (index == 6){
						this.removeClass('ctm-mapState__ACT--click');
					}
					else this.addClass('ctm-mapState__Dark');
				}
			}
    	});
	}

	function stateToLight(){
		jQuery.each(stateName_DB_order, function(index, value){
			
			//  All States [to light] -except selected
			this.removeClass('ctm-mapState__toLight--hoverBtn');
			this.removeClass('ctm-mapState__Dark--click');
			this.removeClass('ctm-mapState__Dark');

			// (Remove) ACT - Dark
			
			//stateText_hide();
			if (index == (jQuery('#state').val() -1)){
				if (index == 6){
					this.addClass('ctm-mapState__ACT--click');
				}
				else this.addClass('ctm-mapState__Light--click');
				// stateText_show();
			} else {
				if (index == 6){
					this.removeClass('ctm-mapState__ACT--click');
				}
				else this.addClass('ctm-mapState__Light');
			}
    	});
	}

	/** ===============        (Show) Text        =============== **/
	function stateToLight_Text() {
		jQuery.each(stateTxt_DB_order, function(index, value){
			if (index == (jQuery('#state').val() -1)){
				this.removeClass('custom-hide');
			}
			else this.addClass('custom-hide');
    	});
    	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
			if (index == (jQuery('#state').val() -1)){
				this.removeClass('custom-hide');
			}
			else this.addClass('custom-hide');
    	});
	}
	function stateToDark_Text() {
// 		jQuery.each(stateTxt_DB_order, function(index, value){
			// this.addClass('custom-hide');
   //  	});
   //  	jQuery.each(stateTxt_DB_order_Cn, function(index, value){
			// this.addClass('custom-hide');
   //  	});
	}
</script>