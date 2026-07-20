<?php
/**
 * Multiple Category For Post Shortcode.
 *
 * @package Hongo
 */
?>
<?php
if ( function_exists( 'vc_add_shortcode_param' ) ) {

	vc_add_shortcode_param( 'hongo_image_hotspot', 'hongo_image_hotspot', HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/image-hotspot/backend/hongo-hotspot-script.js' );
}
if ( ! function_exists( 'hongo_image_hotspot' ) ) {

	function hongo_image_hotspot( $settings, $value ) {

	    $hongo_hotspot_uniqid = uniqid('hongo-hotspot-'.rand());
	    
	    $output = '<div class="hongo-hotspot-param-container clearboth">';

	        $output .= '<div class="hongo-hotspot-image-holder" data-popup-title="'.esc_html__('Hotspot Tooltip Content', 'hongo-addons').'" data-save-text="'.esc_html__('Save changes', 'hongo-addons').'" data-close-text="'.esc_html__('Close','hongo-addons').'"></div>';
	        
	        $output .= '<input type="hidden" id="'.esc_attr($hongo_hotspot_uniqid).'" name="'.$settings['param_name'].'" class="wpb_vc_param_value hongo_hotspot_var '.$settings['param_name'].' '.$settings['type'].'_field" value=\''.$value.'\' />';
	    
	    $output .= '</div>';
	   
	    return $output;
	}
}