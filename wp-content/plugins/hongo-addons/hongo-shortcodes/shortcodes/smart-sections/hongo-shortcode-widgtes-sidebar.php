<?php
/**
 * Smart Section For Widgetised sidebar
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Widgetised sidebar */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_widgetised_sidebar' ) ) {
    function hongo_widgetised_sidebar( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'sidebar_id' => '',
            'hongo_enable_alternate_font_links' => '',

            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',

            'css' => '',
            'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

        ), $atts ) );

        $output = '';
        $classes = array();

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';

        // Column Display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // CSS Box 
        ( ! empty( $css ) ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';

        // Background Image 
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Alt-font
        $classes[] = ( $hongo_enable_alternate_font_links == 1 ) ? 'alt-font' : '';

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

        if ( is_active_sidebar( $sidebar_id ) ) {
            ob_start();
                dynamic_sidebar( $sidebar_id );
                $sidebar_value = ob_get_contents();
            ob_end_clean();

            $output .= '<div '.$id.' class="hongo-widgtes-sidebar'.$class_list.'">';
                $output .= $sidebar_value;
            $output .= '</div>';
        }

        return $output;
    }
}
add_shortcode( 'hongo_widget_sidebar', 'hongo_widgetised_sidebar' );