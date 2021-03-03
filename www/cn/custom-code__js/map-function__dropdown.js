

/** ======================================================================================== **/
/** ______________________________        (custom) Map        ______________________________ **/
/** ======================================================================================== **/

// var stateName = [jQuery('#TAS'), jQuery('#VIC'), jQuery('#NSW'), jQuery('#QLD'), jQuery('#SA'), jQuery('#NT'), jQuery('#WA')];
// var stateName_hover = [jQuery('#TAS-light'), jQuery('#VIC-light'), jQuery('#NSW-light'), jQuery('#QLD-light'), jQuery('#SA-light'), jQuery('#NT-light'), jQuery('#WA-light')];
// var stateName_DB_order = [jQuery('#NSW-light'), jQuery('#VIC-light'), jQuery('#QLD-light'), jQuery('#SA-light'), jQuery('#NT-light'), jQuery('#WA-light'), jQuery('#ACT-light'), jQuery('#TAS-light'), jQuery('#NZ_North-light'), jQuery('#NZ_South-light')];
// var stateTxt_DB_order = [jQuery('#NSW_txt'), jQuery('#VIC_txt'), jQuery('#QLD_txt'), jQuery('#SA_txt'), jQuery('#NT_txt'), jQuery('#WA_txt'), jQuery('#ACT_txt'), jQuery('#TAS_txt'), jQuery('#NZ_North_txt'), jQuery('#NZ_South_txt')];
// var stateTxt_DB_order_Cn = [jQuery('#NSW_txt-cn'), jQuery('#VIC_txt-cn'), jQuery('#QLD_txt-cn'), jQuery('#SA_txt-cn'), jQuery('#NT_txt-cn'), jQuery('#WA_txt-cn'), jQuery('#ACT_txt-cn'), jQuery('#TAS_txt-cn'), jQuery('#NZ_North_txt-cn'), jQuery('#NZ_South_txt-cn')];

var stateName_DB_order = [jQuery('#NSW-light'), jQuery('#QLD-light'), jQuery('#SA-light'), jQuery('#TAS-light'), jQuery('#VIC-light'), jQuery('#WA-light'), jQuery('#ACT-light'), jQuery('#NT-light'), jQuery('#NZ_North-light'), jQuery('#NZ_South-light')];
var stateTxt_DB_order = [jQuery('#NSW_txt'), jQuery('#QLD_txt'), jQuery('#SA_txt'), jQuery('#TAS_txt'), jQuery('#VIC_txt'), jQuery('#WA_txt'), jQuery('#ACT_txt'), jQuery('#NT_txt'), jQuery('#NZ_North_txt'), jQuery('#NZ_South_txt')];
var stateTxt_DB_order_Cn = [jQuery('#NSW_txt-cn'), jQuery('#QLD_txt-cn'), jQuery('#SA_txt-cn'), jQuery('#TAS_txt-cn'), jQuery('#VIC_txt-cn'), jQuery('#WA_txt-cn'), jQuery('#ACT_txt-cn'), jQuery('#NT_txt-cn'), jQuery('#NZ_North_txt-cn'), jQuery('#NZ_South_txt-cn')];

/**  =============== (pre-Set) Map Version [dark/light] =============== **/
map_Light();
/**  =============== (pre-Set) Map Version [dark/light] =============== **/


/** ======================================================================================================== **/
/** ______________________________        Radio & Dropdown [selection]        ______________________________ **/
/** ======================================================================================================== **/

/**  =============== [Dropdown] =============== **/
jQuery('select[name="state"]').change(function () {

    var state_DropDown = jQuery('select[name="state"]').val();
    var index = state_DropDown - 1;

    fromMap__setValue(index);
    state_responseToSelection(index);
});

/**  =============== [Select on Map] =============== **/
function state_responseToSelection(index) {

    if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')) {

        stateToLight__init();
        stateToLight__specific(index);
        txtShow(index);
    }

    if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')) {

        stateToDark__init();
        stateToDark__specific(index);
    }
}


/** ===================================================================================================== **/
/** ______________________________        State-Map [hover & click]        ______________________________ **/
/** ===================================================================================================== **/
set_StateListener(stateName_DB_order);
set_StateListener(stateTxt_DB_order);
set_StateListener(stateTxt_DB_order_Cn);

/**  =============== (Add) state-Map [hover & click] =============== **/
function set_StateListener(stateAsset) {
    jQuery.each(stateAsset, function (index, value) {

        /**  ========== (Add) Hover [listener] ========== **/
        this.hover(function () {

            stateToDark__specific(index);
            txtShow(index);

        }, function () {

            if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')) {

                stateToLight__init();
                txtHide(index);

                stateToDark__chosen();
            }

            if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')) {

                if (jQuery('#state').val() == 0) {
                    stateToDark__init();
                }
                else {
                    stateToDark__chosen();
                }
            }
        });

        /**  ========== (Add) Click [listener] ========== **/
        this.click(function () {

            if (jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')) {
                stateToLight__init();
                txtHide(index);
            }

            if (jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')) {
                stateToLight__init();
                txtShow_All();
            }

            /* ====  (Select) radio button & dropdown  ==== */
            fromMap__setValue(index);
            /* ====  refresh  ==== */
            stateToDark__chosen();


            /* ====  (Set) Situation [Immigration-only]  ==== */
            courseLv_ShowHide();
            // courseLv_forImmi__chg();

            // if (regional_val.includes(jQuery('#state').attr("value"))) {
            //     jQuery('input[name=area][value=regional]').prop('checked', true);
            //     regional_show();
            // }
            // else {
            //     jQuery('input[name=area][value=normal]').prop('checked', true);
            //     normal_show();
            // }
        });
    });
}

/** ============================================================== **/
/** ===============        Confirm [show]        =============== **/
/** ============================================================== **/
function stateToDark__chosen() {

    /* ====  (Refresh) show selected [map]  ==== */  /* == radio == */
    // stateToDark__specific(jQuery('#state').val() -1);
    // txtShow(jQuery('#state').val() -1);

    /* ====  (Refresh) show selected [map]  ==== */  /* == dropdown == */
    stateToDark__specific(jQuery('#state').val() - 1);
    txtShow(jQuery('#state').val() - 1);
}

/** ================================================================================= **/
/** ______________________________        Value        ______________________________ **/
/** ================================================================================= **/
function fromMap__setValue(index) {
    /* ====  (Select) radio button & dropdown  ==== */
    //jQuery('input[name="state"][value='+ (index+1) +']').prop('checked',true);
    console.log(index);
    jQuery('#state').val(index + 1);
}


/** =================================================================================== **/
/** ______________________________        Initial        ______________________________ **/
/** =================================================================================== **/

/**  =============== [Light] =============== **/
function stateToLight__init() {

    jQuery.each(stateName_DB_order, function (index, value) {

        this.css({ 'transition': 'all .6s ease' });
        this.removeClass('ctm-mapState__Dark');
        txtHide(index);

        /* ==  (remove) white border to ACT  == */
        if (index == 6) {
            this.css({ 'stroke': '', 'stroke-width': '' });
        }
    });
}
/**  =============== [Dark] =============== **/
function stateToDark__init() {
    jQuery.each(stateName_DB_order, function (index, value) {

        this.css({ 'transition': 'all .6s ease' });
        this.addClass('ctm-mapState__Dark');
        txtShow(index);

        /* ==  (remove) white border to ACT  == */
        if (index == 6) {
            this.removeClass('ctm-mapState__Dark');
            this.css({ 'stroke': '', 'stroke-width': '' });
        }
    });
}

/** ========================================================================================================= **/
/** ______________________________        Switch Color [only one-state]        ______________________________ **/
/** ========================================================================================================= **/

/**  =============== [Light] =============== **/
function stateToLight__specific(mouseI) {
    jQuery.each(stateName_DB_order, function (index, value) {

        console.log(mouseI);
        /* ====  focused one  ==== */
        if (index == mouseI) {
            this.addClass('ctm-mapState__Dark'); //  to Light
            txtShow(mouseI);
            // (add) white border to ACT
            if (mouseI == 6) {
                this.css({ 'stroke': '#ffffff', 'stroke-width': '2px' });
            }
        } else {
            /* ====  the others  ==== */
            if (this.hasClass('ctm-mapState__Dark')) {
                this.removeClass('ctm-mapState__Dark'); //  to Dark
            }
        }
    });
}
/**  =============== [Dark] =============== **/
function stateToDark__specific(mouseI) {
    jQuery.each(stateName_DB_order, function (index, value) {

        /* ====  focused one  ==== */
        if (index == mouseI) {
            this.addClass('ctm-mapState__Dark'); //  to Dark
            txtShow(mouseI);

            // (add) white border to ACT
            if (mouseI == 6) {
                this.css({ 'stroke': '#ffffff', 'stroke-width': '2px' });
            }
        }
        /* ====  the others  ==== */
        if (index != mouseI) {
            if (this.hasClass('ctm-mapState__Dark')) {
                this.removeClass('ctm-mapState__Dark'); //  to Light
            }
        }
    });
}

/** ======================================================================================= **/
/** ______________________________        Text Manage        ______________________________ **/
/** ======================================================================================= **/
function txtShow(mouseI) {
    jQuery.each(stateTxt_DB_order, function (index, value) {
        if (index == mouseI) {
            this.removeClass('custom-hide');
        }
    });
    jQuery.each(stateTxt_DB_order_Cn, function (index, value) {
        if (index == mouseI) {
            this.removeClass('custom-hide');
        }
    });
}

function txtHide(mouseI) { //  light_HoverClick
    jQuery.each(stateTxt_DB_order, function (index, value) {

        if (index == mouseI) {
            // if (light_HoverClick == true){
            // 	this.removeClass('custom-hide');
            // }
            // else
            this.addClass('custom-hide');
        }
    });
    jQuery.each(stateTxt_DB_order_Cn, function (index, value) {

        if (index == mouseI) {
            // if (light_HoverClick == true){
            // 	this.removeClass('custom-hide');
            // }
            // else
            this.addClass('custom-hide');
        }
    });
}
/** ======================================================================================= **/
function txtShow_All() {
    jQuery.each(stateTxt_DB_order, function (index, value) {
        this.removeClass('custom-hide');
        stateTxt_DB_order_Cn[index].removeClass('custom-hide');
    });
}

function txtHide_All() { //  light_HoverClick
    jQuery.each(stateTxt_DB_order, function (index, value) {
        this.addClass('custom-hide');
        stateTxt_DB_order_Cn[index].addClass('custom-hide');
    });
}
/** ======================================================================================= **/
function txtDark(mouseI) {
    jQuery.each(stateTxt_DB_order, function (index, value) {
        if (index == mouseI) {
            this.children().css({ 'fill': '#000000', 'cursor': 'pointer' });

            stateDB_order__Line[index].css({ 'stroke': '#000000' });
            stateDB_order__LineHor[index].css({ 'stroke': '#000000' });
        }
    });
}
function txtLight(mouseI) {
    jQuery.each(stateTxt_DB_order, function (index, value) {
        if (index == mouseI) {
            this.children().css({ 'fill': '', 'cursor': 'pointer' });

            stateDB_order__Line[index].css({ 'stroke': '' });
            stateDB_order__LineHor[index].css({ 'stroke': '' });
        }
    });
}


/** =============================================================================================== **/
/** ______________________________        (custom) Map-Button        ______________________________ **/
/** =============================================================================================== **/


/** ============================================================== **/
/** ===============        Hover [listener]        =============== **/
/** ============================================================== **/

/**  =============== [Light] =============== **/
jQuery('#mapBtn_Light').hover(
    function () {
        if (!jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')) {

            jQuery('#mapBtn_Light').addClass('custom-mapState_button_Hovered');

            //  (Show) Map [light]
            stateToLight__init();
        }
    }, function () {
        if (!jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')) {

            jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Hovered');

            //  (Hide) Map [light]
            if (jQuery('#state').val() == null) {
                stateToDark__init();
            }
            else {
                stateToDark__chosen();
                txtShow_All();
            }
        }
    }
);
/**  =============== [Dark] =============== **/
jQuery('#mapBtn_Dark').hover(
    function () {
        if (!jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')) {

            jQuery('#mapBtn_Dark').addClass('custom-mapState_button_Hovered');

            //  (Show) Map [dark]
            stateToDark__init();
        }
    }, function () {
        if (!jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')) {
            jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Hovered');

            //  (Hide) Map [dark]
            stateToLight__init();
            stateToDark__chosen();
        }
    }
);

/** ============================================================== **/
/** ===============        Click [listener]        =============== **/
/** ============================================================== **/
jQuery('#mapBtn_Light').click(function () {
    map_Light()
});

jQuery('#mapBtn_Dark').click(function () {
    map_Dark()
});

/** ====================================================================== **/
/** ===============        Initiator [light & dark]        =============== **/
/** ====================================================================== **/
function map_Light() {
    if (!jQuery('#mapBtn_Light').hasClass('custom-mapState_button_Clicked')) {

        jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Hovered');
        jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Clicked');
        jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Hovered');

        /**  =============== [Light-pressed] =============== **/
        jQuery('#mapBtn_Light').addClass('custom-mapState_button_Clicked');

        /**  ===== to-Light ===== **/
        stateToLight__init();
        stateToDark__chosen();
    }
}

function map_Dark() {
    if (!jQuery('#mapBtn_Dark').hasClass('custom-mapState_button_Clicked')) {

        jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Hovered');
        jQuery('#mapBtn_Light').removeClass('custom-mapState_button_Clicked');
        jQuery('#mapBtn_Dark').removeClass('custom-mapState_button_Hovered');

        /**  =============== [Dark-pressed] =============== **/
        jQuery('#mapBtn_Dark').addClass('custom-mapState_button_Clicked');

        /**  ===== to-Dark ===== **/
        if (jQuery('#state').val() == 0) {
            stateToDark__init();
        }
        else {
            stateToLight__init();
            stateToDark__chosen();
            txtShow_All();
        }
    }
}