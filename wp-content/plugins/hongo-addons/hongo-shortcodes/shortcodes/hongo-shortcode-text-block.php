<?php
/**
 * Shortcode For Text Block
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Text Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_column_text' ) ) {
    function hongo_column_text( $atts, $content = null ) {

        global $hongo_text_block_uniq, $hongo_featured_array;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'initial_loading_animation' => '',
            'hongo_animation_delay' => '',
            'hongo_animation_duration' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

            'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'desktop_width' => '',
        ), $atts ) );
        
        $output  = $style = '';
        $classes = array();
        $id      = ($id) ? ' id='.$id : '';
        ( $class ) ? $classes[] = $class : ''; 

        $hongo_text_block_uniq = ! empty( $hongo_text_block_uniq ) ? $hongo_text_block_uniq : 0;
        $hongo_text_block_uniq = $hongo_text_block_uniq + 1;
        $classes[] = $hongo_text_block_uniq_class = 'hongo-text-block-'.$hongo_text_block_uniq;

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        $current_post_type = get_post_type();
        if ( ! is_singular( 'post' ) || $current_post_type = 'hongobuilder' ) {
            $classes[] = 'last-paragraph-no-margin';
        }

        // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Responsive CSS Box
        if ( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {
            
            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

         // Desktop width
        if ( ! empty( $desktop_width ) ) {
            $hongo_featured_array[] = '.'.$hongo_text_block_uniq_class.' { width:'.$desktop_width.'; }';
        }

        // For Animation
        $initial_loading_animation = ( $initial_loading_animation && $initial_loading_animation != 'none' ) ? $classes[] = 'wow '.$initial_loading_animation : '';
        $hongo_animation_delay_attr = ( $hongo_animation_delay ) ? ' data-wow-delay= '.$hongo_animation_delay.'ms' : '';
        $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

        // Class List
        $class_list = ! empty( $classes ) ? implode(" ", $classes) : '';

        if ( ! empty( $content ) ) {
            $output .='<div'.$id.' class="text-block-content '.$class_list.'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                $output.= hongo_remove_wpautop( $content );

            $output .='</div>';
        }

        return $output;
    }
}
add_shortcode( 'vc_column_text', 'hongo_column_text' );