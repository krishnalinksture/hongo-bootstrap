<?php
/**
 * Shortcode For Separator
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_separator_shortcode' ) ) {
    function hongo_separator_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_separator_count_style1, $hongo_separator_count_style2;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',

            'hongo_separator_style' => '',
            'hongo_separator_type' => '',
            'hongo_sep_bg_color' => '',

            'hongo_separator_height' => '',
            'hongo_separator_width' => '',

            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',

            'hongo_css' => '',
            'hongo_enable_responsive_css' => '',
            'hongo_responsive_css' => '',
        ), $atts ) );

        $hongo_output = '';
        $classes = array();

        // Extra id and class 
        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        // Separator style class 
        ( $hongo_separator_style ) ? $classes[] = $hongo_separator_style : '';

        // Separator type 
        $hongo_separator_type = ( $hongo_separator_type ) ? $hongo_separator_type : 'solid';

        // Separator height and width 
        $hongo_separator_height = ( $hongo_separator_height ) ? $hongo_separator_height : '1px';
        $hongo_separator_width = ( $hongo_separator_width ) ? $hongo_separator_width : '100%';

        // Css box 
        $css_class = ( ! empty( $hongo_css ) ) ? vc_shortcode_custom_css_class( $hongo_css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Column Display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Responsive css box 
        if( $hongo_enable_responsive_css == 1 && ! empty( $hongo_responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $hongo_responsive_css );
        }

        // Separator class 
        $class_list = ( $classes ) ? implode( " ", $classes ) : '';

        switch ( $hongo_separator_style ) {

            case 'separator-style-1':

                $hongo_separator_count_style1 = ( $hongo_separator_count_style1 ) ? $hongo_separator_count_style1 : 0;
                $hongo_separator_count_style1 = $hongo_separator_count_style1 + 1;

                // Style for separator 
                $hongo_sep_bg_color = ( $hongo_sep_bg_color ) ? $hongo_sep_bg_color : '#ededed';
                $hongo_featured_array[] = '.separator-style1-'.$hongo_separator_count_style1.'{ background-color: '.$hongo_sep_bg_color.'; height: '.$hongo_separator_height.'; width: '.$hongo_separator_width.'}';

                $hongo_output = '<div'.$id.' class="'.esc_attr( $class_list ).' separator-style1-'.$hongo_separator_count_style1.'"></div>';

            break;

            case 'separator-style-2':

                $hongo_separator_count_style2 = ( $hongo_separator_count_style2 ) ? $hongo_separator_count_style2 : 0;
                $hongo_separator_count_style2 = $hongo_separator_count_style2 + 1;

                // Style for separator 
                $hongo_sep_bg_color = ( $hongo_sep_bg_color ) ? $hongo_sep_bg_color : '#dbdbdb';
                $hongo_featured_array[] = '.separator-style2-'.$hongo_separator_count_style2.'{ border-top: '.$hongo_separator_height.' '.$hongo_separator_type.' '.$hongo_sep_bg_color.';width:'.$hongo_separator_width.'}';

                $hongo_output = '<div'.$id.' class="'.esc_attr( $class_list ).' separator-style2-'.$hongo_separator_count_style2.'"></div>';

            break;

        }

        return $hongo_output;
    }
}
add_shortcode( 'hongo_separator', 'hongo_separator_shortcode' );