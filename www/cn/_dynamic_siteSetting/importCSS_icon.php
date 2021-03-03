<script type="text/javascript">
    
    importCSS_Icon();

    /** ====================  << Icon  >> ==================== **/
    function importCSS_Icon(){

        var icon_imported =0;
        
        jQuery(window).on('load resize', function(){

            var w = jQuery('body').width();
            if (w <= 1270 && icon_imported == 0){
                jQuery.ajax({
                    type :'GET',
                    url  :'./../ext/ajaxCSS.php?act=importCSS_Icon',
                    date :'',
                    success:function(m){
                        jQuery('#cssIcon').remove();
                        jQuery('head').append(m);

                        icon_imported =1;
                    }
                });
            }
        });
    }
</script>