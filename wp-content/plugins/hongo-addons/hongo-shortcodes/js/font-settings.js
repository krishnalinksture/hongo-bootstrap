if (function($) {
  // vc hongo responsive font settings js
    vc.atts.responsive_font_settings = {
      parse: function(param) {
      var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
      var $block = $field.parent();
      var options = {},
      string_pieces,
      string;

      // Desktop values
      options.font_lg = $block.find('[data-type="font-lg"]').val();
      options.line_lg = $block.find('[data-type="line-lg"]').val();
      options.transform_lg = $block.find('[data-type="transform-lg"]').val();
      options.align_lg = $block.find('[data-type="alignment-lg"]').val();
      options.letter_lg = $block.find('[data-type="letter-lg"]').val();
      options.weight_lg = $block.find('[data-type="weight-lg"]').val();
      options.margin_top_lg = $block.find('[data-type="margin-top-lg"]').val();
      options.margin_bottom_lg = $block.find('[data-type="margin-bottom-lg"]').val();
      options.color_title = $block.find('[data-type="color_title"]').val();
      options.color_title_hover = $block.find('[data-type="color_title_hover"]').val();
      // Laptop Values
      options.font_lt = $block.find('[data-type="font-lt"]').val();
      options.line_lt = $block.find('[data-type="line-lt"]').val();
      options.transform_lt = $block.find('[data-type="transform-lt"]').val();
      options.align_lt = $block.find('[data-type="alignment-lt"]').val();
      options.letter_lt = $block.find('[data-type="letter-lt"]').val();
      options.weight_lt = $block.find('[data-type="weight-lt"]').val();
      options.margin_top_lt = $block.find('[data-type="margin-top-lt"]').val();
      options.margin_bottom_lt = $block.find('[data-type="margin-bottom-lt"]').val();
      // Mini Desktop Values
      options.font_md = $block.find('[data-type="font-md"]').val();
      options.line_md = $block.find('[data-type="line-md"]').val();
      options.transform_md = $block.find('[data-type="transform-md"]').val();
      options.align_md = $block.find('[data-type="alignment-md"]').val();
      options.letter_md = $block.find('[data-type="letter-md"]').val();
      options.weight_md = $block.find('[data-type="weight-md"]').val();
      options.margin_top_md = $block.find('[data-type="margin-top-md"]').val();
      options.margin_bottom_md = $block.find('[data-type="margin-bottom-md"]').val();
      // Tablet values
      options.font_sm = $block.find('[data-type="font-sm"]').val();
      options.line_sm = $block.find('[data-type="line-sm"]').val();
      options.transform_sm = $block.find('[data-type="transform-sm"]').val();
      options.align_sm = $block.find('[data-type="alignment-sm"]').val();
      options.letter_sm = $block.find('[data-type="letter-sm"]').val();
      options.weight_sm = $block.find('[data-type="weight-sm"]').val();
      options.margin_top_sm = $block.find('[data-type="margin-top-sm"]').val();
      options.margin_bottom_sm = $block.find('[data-type="margin-bottom-sm"]').val();
      // Mobile values
      options.font_xs = $block.find('[data-type="font-xs"]').val();
      options.line_xs = $block.find('[data-type="line-xs"]').val();
      options.transform_xs = $block.find('[data-type="transform-xs"]').val();
      options.align_xs = $block.find('[data-type="alignment-xs"]').val();
      options.letter_xs = $block.find('[data-type="letter-xs"]').val();
      options.weight_xs = $block.find('[data-type="weight-xs"]').val();
      options.margin_top_xs = $block.find('[data-type="margin-top-xs"]').val();
      options.margin_bottom_xs = $block.find('[data-type="margin-bottom-xs"]').val();
        string_pieces = _.map(options, function(value, key) {
          if (_.isString(value) && 0 < value.length) {
            if( ! ( key == 'transform_lg' || key == 'transform_md' || key == 'transform_sm' || key == 'transform_xs' || key == 'align_lg' || key == 'align_md' || key == 'align_sm' || key == 'align_xs' ) && $.isNumeric( value ) ) { // if not used pixel
            value = value + 'px';
          }
            return key + ':' + encodeURIComponent(value);
          }
        });
        font_setting_string = $.grep(string_pieces, function(value) {
          return _.isString(value) && 0 < value.length;
        }).join('|');
        if ( font_setting_string ) {
          return ".hongo_font_" + Date.now() + "{" + font_setting_string + "},";
        }
      },
      init: function(param, $field) {
      $('h3.font-setting-button', $field).click(function(e) {
        var selected_tab = $(this).attr('data-device');
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parents('.hongo-font-settings-container').find('.'+selected_tab).addClass('active');
      });
      },
    }

}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);