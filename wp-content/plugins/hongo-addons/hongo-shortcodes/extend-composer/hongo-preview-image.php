<?php
/**
 * Hongo Slider Preview Image For Slider Shortcode In VC.
 *
 * @package Hongo
 */
?>
<?php 
if ( function_exists( 'vc_add_shortcode_param' ) ) {

	vc_add_shortcode_param( 'hongo_preview_image', 'hongo_custom_slider_image_settings_field', HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/custom.js');
}

if ( ! function_exists( 'hongo_custom_slider_image_settings_field' ) ) {
    function hongo_custom_slider_image_settings_field( $settings, $value ) {

        $output = '';
        $preview_image = ! empty( $settings['image_src'] ) ? $settings['image_src'] : '';
        $output .= '<div class="hongo-preview-image-main" data-url="'.HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE.'">';

          	$output .= '<div class="preview-image-hide"><img src="'.esc_url( $preview_image ).'" alt="'.__( 'Preview Image', 'hongo-addons' ).'" /></div>';
          	
        $output .= '</div>';

        return $output;
    }
}