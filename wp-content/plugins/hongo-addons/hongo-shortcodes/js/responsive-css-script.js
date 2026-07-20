(function($) {
	"use strict";
	// VC Responsive CSS parameter js
	vc.atts.responsive_css_editor = {
		parse: function(param) {
			var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
			var $block = $field.parent();
			var options = {},
			string_pieces,
			string;

			// Desktop values
			options.margin_top_laptop = $block.find('[data-name="margin-top-laptop"]').val();
			options.margin_right_laptop = $block.find('[data-name="margin-right-laptop"]').val();
			options.margin_bottom_laptop = $block.find('[data-name="margin-bottom-laptop"]').val();
			options.margin_left_laptop = $block.find('[data-name="margin-left-laptop"]').val();

			options.border_top_laptop = $block.find('[data-name="border-top-laptop"]').val();
			options.border_right_laptop = $block.find('[data-name="border-right-laptop"]').val();
			options.border_bottom_laptop = $block.find('[data-name="border-bottom-laptop"]').val();
			options.border_left_laptop = $block.find('[data-name="border-left-laptop"]').val();

			options.padding_top_laptop = $block.find('[data-name="padding-top-laptop"]').val();
			options.padding_right_laptop = $block.find('[data-name="padding-right-laptop"]').val();
			options.padding_bottom_laptop = $block.find('[data-name="padding-bottom-laptop"]').val();
			options.padding_left_laptop = $block.find('[data-name="padding-left-laptop"]').val();

			options.background_position_laptop = $block.find('[data-name="background-position-laptop"]').val();
			options.hide_image_laptop = $block.find('[data-name="hide-image-laptop"]').val();
			options.height_laptop = $block.find('[data-name="height-laptop"]').val();
			options.width_laptop = $block.find('[data-name="width-laptop"]').val();

			// Desktop values
			options.margin_top_desktop = $block.find('[data-name="margin-top-desktop"]').val();
			options.margin_right_desktop = $block.find('[data-name="margin-right-desktop"]').val();
			options.margin_bottom_desktop = $block.find('[data-name="margin-bottom-desktop"]').val();
			options.margin_left_desktop = $block.find('[data-name="margin-left-desktop"]').val();

			options.border_top_desktop = $block.find('[data-name="border-top-desktop"]').val();
			options.border_right_desktop = $block.find('[data-name="border-right-desktop"]').val();
			options.border_bottom_desktop = $block.find('[data-name="border-bottom-desktop"]').val();
			options.border_left_desktop = $block.find('[data-name="border-left-desktop"]').val();

			options.padding_top_desktop = $block.find('[data-name="padding-top-desktop"]').val();
			options.padding_right_desktop = $block.find('[data-name="padding-right-desktop"]').val();
			options.padding_bottom_desktop = $block.find('[data-name="padding-bottom-desktop"]').val();
			options.padding_left_desktop = $block.find('[data-name="padding-left-desktop"]').val();

			options.background_position_desktop = $block.find('[data-name="background-position-desktop"]').val();
			options.hide_image_desktop = $block.find('[data-name="hide-image-desktop"]').val();
			options.height_desktop = $block.find('[data-name="height-desktop"]').val();
			options.width_desktop = $block.find('[data-name="width-desktop"]').val();

			// Tablet values
			options.margin_top_tablet = $block.find('[data-name="margin-top-tablet"]').val();
			options.margin_right_tablet = $block.find('[data-name="margin-right-tablet"]').val();
			options.margin_bottom_tablet = $block.find('[data-name="margin-bottom-tablet"]').val();
			options.margin_left_tablet = $block.find('[data-name="margin-left-tablet"]').val();

			options.border_top_tablet = $block.find('[data-name="border-top-tablet"]').val();
			options.border_right_tablet = $block.find('[data-name="border-right-tablet"]').val();
			options.border_bottom_tablet = $block.find('[data-name="border-bottom-tablet"]').val();
			options.border_left_tablet = $block.find('[data-name="border-left-tablet"]').val();

			options.padding_top_tablet = $block.find('[data-name="padding-top-tablet"]').val();
			options.padding_right_tablet = $block.find('[data-name="padding-right-tablet"]').val();
			options.padding_bottom_tablet = $block.find('[data-name="padding-bottom-tablet"]').val();
			options.padding_left_tablet = $block.find('[data-name="padding-left-tablet"]').val();

			options.background_position_tablet = $block.find('[data-name="background-position-tablet"]').val();
			options.hide_image_tablet = $block.find('[data-name="hide-image-tablet"]').val();
			options.height_tablet = $block.find('[data-name="height-tablet"]').val();
			options.width_tablet = $block.find('[data-name="width-tablet"]').val();

			// Mobile values
			options.margin_top_mobile = $block.find('[data-name="margin-top-mobile"]').val();
			options.margin_right_mobile = $block.find('[data-name="margin-right-mobile"]').val();
			options.margin_bottom_mobile = $block.find('[data-name="margin-bottom-mobile"]').val();
			options.margin_left_mobile = $block.find('[data-name="margin-left-mobile"]').val();

			options.border_top_mobile = $block.find('[data-name="border-top-mobile"]').val();
			options.border_right_mobile = $block.find('[data-name="border-right-mobile"]').val();
			options.border_bottom_mobile = $block.find('[data-name="border-bottom-mobile"]').val();
			options.border_left_mobile = $block.find('[data-name="border-left-mobile"]').val();

			options.padding_top_mobile = $block.find('[data-name="padding-top-mobile"]').val();
			options.padding_right_mobile = $block.find('[data-name="padding-right-mobile"]').val();
			options.padding_bottom_mobile = $block.find('[data-name="padding-bottom-mobile"]').val();
			options.padding_left_mobile = $block.find('[data-name="padding-left-mobile"]').val();

			options.background_position_mobile = $block.find('[data-name="background-position-mobile"]').val();
			options.hide_image_mobile = $block.find('[data-name="hide-image-mobile"]').val();
			options.height_mobile = $block.find('[data-name="height-mobile"]').val();
			options.width_mobile = $block.find('[data-name="width-mobile"]').val();

			string_pieces = _.map(options, function(value, key) {
				if (_.isString(value) && 0 < value.length) {
					if( ! ( key == 'hide_image_desktop' || key == 'hide_image_tablet' || key == 'hide_image_mobile' ) && $.isNumeric( value ) ) { // if not used pixel
						value = value + 'px';
					}
					return key + ':' + encodeURIComponent(value);
				}
			});
			string = $.grep(string_pieces, function(value) {
				return _.isString(value) && 0 < value.length;
			}).join('|');
			if (string) {
				return ".hongo_responsive_" + Date.now() + "{" + string + "},";
			}
		},
		init: function(param, $field) {
			$('h3.hongo-responsive-css-heading', $field).click(function(e) {
				var selected_tab = $(this).attr('data-device');
				$(this).parent().parent().find('.active').removeClass('active');
				$(this).addClass('active');
				$(this).parents('.hongo-responsive-css-container').find('.'+selected_tab).addClass('active');
			});
		},
	};

})(jQuery);