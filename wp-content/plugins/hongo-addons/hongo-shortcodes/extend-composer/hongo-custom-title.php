<?php
/**
 * Hongo Custom Width Class List For VC.
 *
 * @package Hongo
 */
?>
<?php
if ( function_exists( 'vc_add_shortcode_param' ) ) {

	vc_add_shortcode_param( 'hongo_custom_title', 'hongo_custom_title_callback' );
}
if ( ! function_exists( 'hongo_custom_title_callback' ) ) {
  	function hongo_custom_title_callback( $settings, $value ) {
	   	return '<div class="hongo-custom-title"><div style="border-bottom: 1px solid #ddd; margin: 10px 0; padding-bottom: 5px;  font-weight: bold;">'.esc_attr( $value )
	             .'</div><input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
	             esc_attr( $settings['param_name'] ) . ' ' .
	             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />' .
	             '</div>'; // This is html markup that will be outputted in content elements edit form
	}
}