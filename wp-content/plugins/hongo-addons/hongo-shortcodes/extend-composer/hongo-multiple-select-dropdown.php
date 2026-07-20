<?php
/**
 * Multiple Category For Post Shortcode.
 *
 * @package Hongo
 */
?>
<?php
if ( function_exists( 'vc_add_shortcode_param' ) ) {

    vc_add_shortcode_param( 'hongo_multiple_select_dropdown', 'hongo_multiple_select_dropdown' );
}
if ( ! function_exists( 'hongo_multiple_select_dropdown' ) ) {

    function hongo_multiple_select_dropdown( $settings, $value ) {

        if ( ! is_array( $value ) ) {
          $value = explode( ',', $value );
        }

        $value1 = $output = '';
        foreach ($value as $k => $v) {
            $value1 .= $v;
        }

        $multiple_param = isset( $settings['multiple'] ) && $settings['multiple'] == false ? '' : ' multiple="multiple"';
        $output  = '<select '.$multiple_param.' name="'. $settings['param_name'] .'" class="wpb_vc_param_value icon-select wpb-input wpb-rs-select '. $settings['param_name'] .' '. $settings['type'] .'">';

            if ( ! empty( $value1 ) ) {
                $selected_all = ( in_array( 'all', $value ) ) ? ' selected="selected"' : '';
                $output .= '<option value="all" '.$selected_all.'>'.esc_html__( 'All', 'hongo-addons' ).'</option>';
            }else {
                $output .= '<option value="all">'.esc_html__( 'All', 'hongo-addons' ).'</option>';
            }
            if ( ! empty( $settings['value'] ) ) {

        	    foreach ( $settings['value'] as $key => $data ) {
                    $selected = in_array( $key, $value );
                    $output .= '<option value="'. $key .'"'. selected( true, $selected, false ) .'>'.htmlspecialchars( $data ).'</option>';
        	    }
            }
        $output .= '</select>' . "\n";

        return $output;
    }
}