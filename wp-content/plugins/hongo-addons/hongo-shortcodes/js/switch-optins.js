if (function($) {
    // vc hongo switch options
    vc.atts.hongo_custom_switch_option = {
        init: function(param, $field) {
            $('.switch-option-enable').on('click',function(){
                //alert();
                if (!$(this).hasClass('selected')) {
                    var c = $(this).parent().find('select');
                    $(this).parent().find('.selected').removeClass('selected');
                    $(this).addClass('selected');
                    c.val(1).trigger('change');
                }
            });
            $('.switch-option-disable').on('click',function(){
                if (!$(this).hasClass('selected')) {
                    var c = $(this).parent().find('select');
                    $(this).parent().find('.selected').removeClass('selected');
                    $(this).addClass('selected');
                    c.val(0).trigger('change');
                }
            });
        },
    }

}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);