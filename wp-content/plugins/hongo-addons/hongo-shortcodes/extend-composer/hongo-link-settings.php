<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

vc_add_shortcode_param('hongo_link', 'hongo_link_form_field', HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/link-setting.js' );

if ( ! function_exists( 'hongo_link_form_field' ) ) {
	
	function hongo_link_form_field( $settings, $value ) {
		$link = vc_build_link( $value );

		return '<div class="hongo_link">'
		       . '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . htmlentities( $value, ENT_QUOTES, 'utf-8' ) . '" data-json="' . htmlentities( json_encode( $link ), ENT_QUOTES, 'utf-8' ) . '" />'
		       . '<a href="#" class="button hongo_link-build ' . $settings['param_name'] . '_button">' . __( 'Select URL', 'hongo-addons' ) . '</a> <span class="hongo_link_label_title hongo_link_label">' . __( 'Title', 'hongo-addons' ) . ':</span> <span class="title-label">' . $link['title'] . '</span> <span class="hongo_link_label">' . __( 'URL', 'hongo-addons' ) . ':</span> <span class="url-label">' . $link['url'] . ' ' . $link['target'] . '</span>'
		       . '</div>';
	}
}
