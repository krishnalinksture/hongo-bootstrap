if (function($) {
  // vc hongo button settings js
  var link_color = $( '.Hongo-color-picker' );
  link_color.each( function (){
      $(this).alphaColorPicker();
  });
  // $( '.Hongo-color-picker' ).wpColorPicker();

  vc.atts.hongo_button_settings = {
    parse: function(param) {
      var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
      var $block = $field.parent();
      var options = {};
      var string_pieces;
      var string;
    
      // Color Settings
      options.color_text = $block.find('[data-type="color_text"]').val();
      options.color_text_hover = $block.find('[data-type="color_text_hover"]').val();
      options.color_bg = $block.find('[data-type="color_bg"]').val();
      options.color_bg_hover = $block.find('[data-type="color_bg_hover"]').val();
      options.color_border = $block.find('[data-type="color_border"]').val();
      options.color_border_hover = $block.find('[data-type="color_border_hover"]').val();
      options.color_icon = $block.find('[data-type="color_icon"]').val();
      options.color_icon_hover = $block.find('[data-type="color_icon_hover"]').val();
      
      // Font Settings for Desktop
      options.font_lg = $block.find('[data-type="font-lg"]').val();
      options.line_lg = $block.find('[data-type="line-lg"]').val();
      options.transform_lg = $block.find('[data-type="transform-lg"]').val();
      options.letter_lg = $block.find('[data-type="letter-lg"]').val();
      options.weight_lg = $block.find('[data-type="weight-lg"]').val();
      options.margin_top_lg = $block.find('[data-type="margin-top-lg"]').val();
      options.margin_bottom_lg = $block.find('[data-type="margin-bottom-lg"]').val();
      options.border_lg = $block.find('[data-type="border-lg"]').val();
      options.text_decoration_lg = $block.find('[data-type="text-decoration-lg"]').val();
      options.border_width_lg = $block.find('[data-type="border-width-lg"]').val();

      // Font Settings for Laptop
      options.font_lt = $block.find('[data-type="font-lt"]').val();
      options.line_lt = $block.find('[data-type="line-lt"]').val();
      options.transform_lt = $block.find('[data-type="transform-lt"]').val();
      options.letter_lt = $block.find('[data-type="letter-lt"]').val();
      options.weight_lt = $block.find('[data-type="weight-lt"]').val();
      options.margin_top_lt = $block.find('[data-type="margin-top-lt"]').val();
      options.margin_bottom_lt = $block.find('[data-type="margin-bottom-lt"]').val();
      options.border_lt = $block.find('[data-type="border-lt"]').val();
      options.text_decoration_lt = $block.find('[data-type="text-decoration-lt"]').val();
      options.border_width_lt = $block.find('[data-type="border-width-lt"]').val();

      // Font Settings for Mini Desktop
      options.font_md = $block.find('[data-type="font-md"]').val();
      options.line_md = $block.find('[data-type="line-md"]').val();
      options.transform_md = $block.find('[data-type="transform-md"]').val();
      options.letter_md = $block.find('[data-type="letter-md"]').val();
      options.weight_md = $block.find('[data-type="weight-md"]').val();
      options.margin_top_md = $block.find('[data-type="margin-top-md"]').val();
      options.margin_bottom_md = $block.find('[data-type="margin-bottom-md"]').val();
      options.border_md = $block.find('[data-type="border-md"]').val();
      options.text_decoration_md = $block.find('[data-type="text-decoration-md"]').val();
      options.border_width_md = $block.find('[data-type="border-width-md"]').val();

      // Font Settings for Tablet
      options.font_sm = $block.find('[data-type="font-sm"]').val();
      options.line_sm = $block.find('[data-type="line-sm"]').val();
      options.transform_sm = $block.find('[data-type="transform-sm"]').val();
      options.letter_sm = $block.find('[data-type="letter-sm"]').val();
      options.weight_sm = $block.find('[data-type="weight-sm"]').val();
      options.margin_top_sm = $block.find('[data-type="margin-top-sm"]').val();
      options.margin_bottom_sm = $block.find('[data-type="margin-bottom-sm"]').val();
      options.border_sm = $block.find('[data-type="border-sm"]').val();
      options.text_decoration_sm = $block.find('[data-type="text-decoration-sm"]').val();
      options.border_width_sm = $block.find('[data-type="border-width-sm"]').val();

      // Font Settings for Mobile
      options.font_xs = $block.find('[data-type="font-xs"]').val();
      options.line_xs = $block.find('[data-type="line-xs"]').val();
      options.transform_xs = $block.find('[data-type="transform-xs"]').val();
      options.letter_xs = $block.find('[data-type="letter-xs"]').val();
      options.weight_xs = $block.find('[data-type="weight-xs"]').val();
      options.margin_top_xs = $block.find('[data-type="margin-top-xs"]').val();
      options.margin_bottom_xs = $block.find('[data-type="margin-bottom-xs"]').val();
      options.border_xs = $block.find('[data-type="border-xs"]').val();
      options.text_decoration_xs = $block.find('[data-type="text-decoration-xs"]').val();
      options.border_width_xs = $block.find('[data-type="border-width-xs"]').val();

      string_pieces = _.map(options, function(value, key) {
        if (_.isString(value) && 0 < value.length) {
          if( ! ( key == 'transform_lg' || key == 'transform_md' || key == 'transform_sm' || key == 'transform_xs' || key == 'color_text' || key == 'color_text_hover' || key == 'color_bg' || key == 'color_bg_hover' || key == 'color_border' || key == 'color_border_hover' ) && $.isNumeric( value ) ) {
            value = value + 'px';
          }
        return key + ':' + value;
        }
      });
      button_setting_string = $.grep(string_pieces, function(value) {
        return _.isString(value) && 0 < value.length;
      }).join('|');
      if ( button_setting_string ) {
        return ".hongo_button_" + Date.now() + "{" + button_setting_string + "},";
      }
    },
    init: function(param, $field) {
      $('h3.font-setting-button', $field).click( function(e) {
        var selected_tab = $(this).attr('data-device');
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parents('.hongo-font-settings-container').find( '.'+selected_tab ).addClass('active');
      });
    },
  }
}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);