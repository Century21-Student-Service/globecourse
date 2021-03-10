

/** =================================================================================================== **/
/** ______________________________        (custom) Map [for home]        ______________________________ **/
/** =================================================================================================== **/

var stateName_DB_order = [jQuery('#NSW-light'), jQuery('#VIC-light'), jQuery('#QLD-light'), jQuery('#SA-light'), jQuery('#NT-light'), jQuery('#WA-light'), jQuery('#ACT-light'), jQuery('#TAS-light'), jQuery('#NZ_South-light, #NZ_North-light')];
var stateTxt_DB_order = [jQuery('#NSW_txt'), jQuery('#VIC_txt'), jQuery('#QLD_txt'), jQuery('#SA_txt'), jQuery('#NT_txt'), jQuery('#WA_txt'), jQuery('#ACT_txt'), jQuery('#TAS_txt'), jQuery('#NZ_txt')];

var stateDB_order__Line = [jQuery('#NSW_line'), jQuery('#VIC_line'), jQuery('#QLD_line'), jQuery('#SA_line'), jQuery('#NT_line'), jQuery('#WA_line'), jQuery('#ACT_line'), jQuery('#TAS_line'), jQuery('#NZ_line, #NZ_line_2')];
var stateDB_order__LineHor = [jQuery('#NSW_line_hor'), jQuery('#VIC_line_hor'), jQuery('#QLD_line_hor'), jQuery('#SA_line_hor'), jQuery('#NT_line_hor'), jQuery('#WA_line_hor'), jQuery('#ACT_line_hor'), jQuery('#TAS_line_hor'), jQuery('#NZ_line_hor')];


/**  =============== (Add) state-Map [hover & click] =============== **/
set_StateListener(stateName_DB_order);
set_StateListener(stateTxt_DB_order);

function set_StateListener(stateAsset) {
	jQuery.each(stateAsset, function(index, value){
		//  (Add) Hover [listener]
		this.hover(function(){

			stateToDark__hover(index);
			txtDark(index);

		}, function(){
			stateToDark__init();
			txtLight(index);
		});

		//  (Add) Click [listener]
		// this.click(function(){
		// 	stateSelect_forLight(index);
		// 	stateSelect_forDark(index);
		// });
	});
}

/** ============================================================== **/
/** ===============        Click [listener]        =============== **/
/** ============================================================== **/


/** =================================================================================== **/
/** ______________________________        Initial        ______________________________ **/
/** =================================================================================== **/
//var map_isDark = false;
/**  =============== [Light] =============== **/
function stateToLight__init(){
	
	jQuery.each(stateName_DB_order, function(index, value){
		this.css({'transition': 'all .6s ease'});
		this.removeClass('ctm-mapState__Dark');

		if (index == 6){
			this.removeClass('ctm-mapState__Dark');
			this.css({'stroke': '', 'stroke-width': ''});
		}
	});

	txtShow();
}
/**  =============== [Dark] =============== **/
function stateToDark__init(){
	
	jQuery.each(stateName_DB_order, function(index, value){
		this.css({'transition': 'all .6s ease'});
		this.addClass('ctm-mapState__Dark');

		if (index == 6){
			this.removeClass('ctm-mapState__Dark');
			this.css({'stroke': '', 'stroke-width': ''});
		}
	});

	txtShow();
}

/** ============================================================================================ **/
/** ______________________________        Hover [listener]        ______________________________ **/
/** ============================================================================================ **/
function stateToDark__hover(mouseI){
	jQuery.each(stateName_DB_order, function(index, value){
		
		/* ====  focused one  ==== */
		if (index == mouseI){
			this.addClass('ctm-mapState__Dark'); //  to Dark
			// (add) white border to ACT
			if (mouseI == 6){
				this.css({'stroke': '#ffffff', 'stroke-width': '6px'});
			}
		}
		/* ====  the others  ==== */
		if (index != mouseI){
			if (this.hasClass('ctm-mapState__Dark')){
				this.removeClass('ctm-mapState__Dark'); //  to Light
			}
		}
	});
}

/** ======================================================================================= **/
/** ______________________________        Text Manage        ______________________________ **/
/** ======================================================================================= **/
function txtShow(){
	jQuery.each(stateTxt_DB_order, function(index, value){
		this.removeClass('custom-hide');
	});
}

function txtDark(mouseI){
	jQuery.each(stateTxt_DB_order, function(index, value){
		if (index == mouseI){
			this.children().css({'fill': '#000000', 'cursor': 'pointer'});

			stateDB_order__Line[index].css({'stroke': '#000000'});
			stateDB_order__LineHor[index].css({'stroke': '#000000'});
		}
	});
}
function txtLight(mouseI){
	jQuery.each(stateTxt_DB_order, function(index, value){
		if (index == mouseI){
			this.children().css({'fill': '', 'cursor': 'pointer'});

			stateDB_order__Line[index].css({'stroke': ''});
			stateDB_order__LineHor[index].css({'stroke': ''});
		}
	});
}