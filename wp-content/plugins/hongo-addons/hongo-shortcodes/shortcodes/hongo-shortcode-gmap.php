<?php
/**
 * Shortcode For Google Map
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Google Map */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_gmap' ) ) {
    function hongo_gmap( $atts, $content = null ) {

        global $hongo_gmap_unique_id;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_gmap_style' => '',
            'hongo_link' => '',
            'hongo_full_height' => '',
            'hongo_size' => '',
            'hongo_animation_style' => '',
            'hongo_animation_delay' => '',
            'hongo_animation_duration' => '',
            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',
            'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            
        ), $atts ) );
        
        $output = '';
        $classes = array();

        // Check if slider id and class
        $hongo_gmap_unique_id  = ! empty( $hongo_gmap_unique_id ) ? $hongo_gmap_unique_id : 1;
        $hongo_gmap_id = ! empty( $id ) ? $id : 'hongo-gmap';
        $hongo_gmap_id .= '-' . $hongo_gmap_unique_id;
        $hongo_gmap_unique_id++;

        // Column Animation
        $classes[]= ( $hongo_animation_style ) && $hongo_animation_style != 'none' ? ' wow '.$hongo_animation_style : '';
        $hongo_animation_delay = ( $hongo_animation_delay ) ? $hongo_animation_delay : '0';
        $hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) ? ' data-wow-delay="' . ( $hongo_animation_delay ) . 'ms"' : '';
        $hongo_animation_duration_attr = ! empty( $hongo_animation_duration ) ? ' data-wow-duration="' . ( $hongo_animation_duration ) . 'ms"' : '';

        $id = ! empty( $hongo_gmap_id ) ? ' id="'.esc_attr( $hongo_gmap_id ).'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        $classes[] = $hongo_gmap_id;

        ( $hongo_gmap_style ) ? $classes[] = $hongo_gmap_style : '';

        $hongo_link = ! empty( $hongo_link ) ? trim( vc_value_from_safe( $hongo_link ) ) :'';

        if( $hongo_full_height != '1' ) {
            $hongo_size = str_replace( array('px',' ',), array('','',), $hongo_size );

            if ( is_numeric( $hongo_size ) ) {
                $hongo_link = preg_replace( '/height="[0-9]*"/', 'height="' . $hongo_size . '"', $hongo_link );
            }
        } else {
            $hongo_size = '';
            $classes[] = 'hongo-gmap-full-height';
        }
        
        // Class List
        $class_list= ! empty( $classes ) ? implode( ' ', $classes ) : '';
        
        if( $hongo_link ) {
            $output .= '<div'.$id.' class="google-map'.esc_attr( $class_list ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
            if ( preg_match( '/^\<iframe/', $hongo_link ) ) {
                $output .= $hongo_link;
            } else {
                $output .= '<iframe width="100%" height="' . $hongo_size . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . esc_url( $hongo_link ) . '"></iframe>';
            }
            $output .='</div>';
        }

        return $output;
    }
}
add_shortcode( 'hongo_gmap', 'hongo_gmap' );