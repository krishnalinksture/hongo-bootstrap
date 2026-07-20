<?php
/**
 * Smart Section For Header With Push
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Header With Push */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists('hongo_header_push_shortcode') ) {
    function hongo_header_push_shortcode( $atts, $content = null ) {

        global $hongo_header_with_push_uniq, $hongo_featured_array;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_widget_select' => '',

            'hongo_toggle_button_color' => '',
            'hongo_content_bg_color' => '',
            'hongo_close_button_color' => '',
            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',
        ), $atts ) );

        $output = '';
        $classes = array();

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';

        // Navigation menu uniq id
        $hongo_header_with_push_uniq = ( $hongo_header_with_push_uniq ) ? $hongo_header_with_push_uniq : 1;
        $classes[] = $hongo_header_pushmenu_class = 'hongo-header-pushmenu-'.$hongo_header_with_push_uniq;
        $hongo_header_with_push_uniq++;

        // Content background color
        if ( ! empty( $hongo_toggle_button_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_header_pushmenu_class.' .navbar-toggle span{ background-color:'.$hongo_toggle_button_color.'!important; }';
        }
        // Content background color
        if ( ! empty( $hongo_content_bg_color ) ) {
            $hongo_featured_array[] = '.cbp-spmenu.'.$hongo_header_pushmenu_class. '{ background-color:'.$hongo_content_bg_color.'; }';
        }
        // Main menu text hover color
        if ( ! empty( $hongo_close_button_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_header_pushmenu_class. ' .close-button-menu, .'.$hongo_header_pushmenu_class. ' .close-button-menu:focus{ color:'.$hongo_close_button_color.'; }';
        }

        // Column Display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

        if ( ! empty( $hongo_widget_select ) ) {

            $output .= '<div'.$id.' class="header-menu-button header-push-menu-button'.$class_list.'">';
                $output .= '<button class="navbar-toggle mobile-toggle" type="button" id="showRightPush">';
                    $output .= '<span></span>';
                    $output .= '<span></span>';
                    $output .= '<span></span>';
                    $output .= '<span></span>';
                $output .= '</button>';
            $output .= '</div>';

            if( hongo_check_active_sidebar( $hongo_widget_select ) ) {
            
                $output .= '<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right '.$hongo_header_pushmenu_class.'" id="cbp-spmenu-s2">';
                    $output .= '<button class="close-button-menu side-menu-close" id="close-pushmenu"><i class="ti-close"></i></button>';
                    $output .= '<div class="slide-menu-wrapper">';
                        $output .= '<div class="slide-menu-wrap">';
                            $output .= '<div id="main_sidebar" class="widget-area">';
                                ob_start();
                                    dynamic_sidebar( $hongo_widget_select );
                                    $output .= ob_get_contents();
                                ob_end_clean();
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }
         }

        return $output;
    }
}
add_shortcode( 'hongo_header_push', 'hongo_header_push_shortcode' );