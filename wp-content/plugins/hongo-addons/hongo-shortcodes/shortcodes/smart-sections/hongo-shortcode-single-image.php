<?php
/**
 * Smart Section For Single Image
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Single Image */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_single_image_shortcode' ) ) {
    function hongo_single_image_shortcode( $atts, $content = null ) {

        extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'css' => '',
                'hongo_enable_responsive_css' => '',
                'responsive_css' => '',

                'custom_image' => '',
                'custom_image_ratina' => '',
                'hongo_image_size' => '',
                'hongo_image_alignment' => '',
                'image_hover_effect' => '1',
                'hongo_image_action' => '',
                'hongo_image_link' => '',
                'hongo_image_target' => '',
                'hongo_bg_image_type' => '',
                'desktop_bg_image_position' => '',
                'hongo_column_animation_style' => '',
                'hongo_animation_duration' => '',

                'desktop_display' => '',
                'desktop_mini_display' => '',
                'ipad_display' => '',
                'mobile_display' => '',

            ), $atts ) );

        $output = '';

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';

        $img_alt        = ! empty( $custom_image ) ? hongo_option_image_alt( $custom_image ) : array();
        $img_title      = ! empty( $custom_image ) ? hongo_option_image_title( $custom_image ) : array();
        $image_alt      = ! empty( $img_alt['alt'] ) ? ' alt="'.esc_attr( $img_alt['alt'] ).'"' : ' alt="' . esc_attr__( 'Image', 'hongo-addons' ) . '"'; 
        $image_title    = ! empty( $img_title['title'] ) ? ' title="'.esc_attr( $img_title['title'] ).'"' : '';

        $single_image = ! empty( $custom_image ) ? wp_get_attachment_image_url( $custom_image, $hongo_image_size ) : '';
        $single_image_ratina = ! empty( $custom_image_ratina ) ? wp_get_attachment_image_url( $custom_image_ratina, $hongo_image_size ) : '';

        // Get Image srcset
        $srcset_data = empty( $custom_image_ratina ) ? hongo_get_image_srcset_sizes( $custom_image, $hongo_image_size ) : '';

        $classes[] = ! empty( $hongo_image_alignment ) ? $hongo_image_alignment : 'text-left';
        $image_hover_effect = ( $image_hover_effect == '1' ) ? ' hongo-single-hover-effect' : '';
        $hongo_image_link = ( $hongo_image_link ) ? $hongo_image_link : '';
        $hongo_link_target_attr = ! empty( $hongo_image_target ) ? ' target="'.$hongo_image_target.'"' : '';

        // Column Animation
        $classes[] = ( $hongo_column_animation_style ) && $hongo_column_animation_style != 'none' ? 'wow '.$hongo_column_animation_style : '';
        $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';
        
        // CSS Box 
        ! empty( $css ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Column Display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Class List
        $class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

        if( ! empty( $single_image ) || ! empty( $single_image_ratina ) ) {
            $output .= '<div '.$id.' class="hongo-single-image'.$class_list.'"'.$hongo_animation_duration_attr.'>';

                if( $hongo_image_action == 1 ) {
                    $output .= '<a class="hongo-single-image-link'.$image_hover_effect.'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_image_link ).'"  '.$image_title.'>';
                }
                    if( ! empty( $single_image_ratina ) ) {

                        $output .= '<img class="skip-lazy" src="'.esc_url( $single_image ).'" data-rjs="'.esc_url( $single_image_ratina ).'" '.$image_alt.$image_title.$srcset_data.' />';

                    } else {

                        $output .= wp_get_attachment_image( $custom_image, $hongo_image_size );
                    }
                
                if( $hongo_image_action == 1 ) {
                    $output .= '</a>';
                }

            $output .= '</div>';
        }
        
        return $output;
    }
}
add_shortcode( 'hongo_single_image', 'hongo_single_image_shortcode' );