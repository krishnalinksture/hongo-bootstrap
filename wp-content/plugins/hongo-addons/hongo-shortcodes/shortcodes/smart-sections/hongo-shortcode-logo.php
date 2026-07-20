<?php
/**
 * Smart Section For Header Logo
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Header Logo */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists('hongo_header_logo_shortcode') ) {

    function hongo_header_logo_shortcode( $atts, $content = null ) {

    	global $hongo_featured_array;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_logo' => '',
            'hongo_logo_light' => '',
            'hongo_logo_ratina' => '',
            'hongo_logo_light_ratina' => '',
            'hongo_h1_logo_font_page' => '',

            'hongo_sticky_show_logo' => '0',
            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',
            'logo_max_height' => '',
            'logo_svg_width' => '',

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

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Sticky show logo 
        ( $hongo_sticky_show_logo == 1 ) ? $classes[] = 'sticky-show-logo' : '';

        $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

        // Logo from shortcode
        $hongo_logo = ! empty( $hongo_logo ) ? wp_get_attachment_image_url( $hongo_logo, 'full' ) : '';
        $hongo_logo_light = ! empty( $hongo_logo_light ) ? wp_get_attachment_image_url( $hongo_logo_light, 'full' ) : '';
        $hongo_logo_ratina = ! empty( $hongo_logo_ratina ) ? wp_get_attachment_image_url( $hongo_logo_ratina, 'full' ) : '';
        $hongo_logo_light_ratina = ! empty( $hongo_logo_light_ratina ) ? wp_get_attachment_image_url( $hongo_logo_light_ratina, 'full' ) : '';

        // Get Logo From Customizer
        empty( $hongo_logo ) ? $hongo_logo = get_theme_mod( 'hongo_logo', '' ) : '';
        empty( $hongo_logo_light ) ? $hongo_logo_light = get_theme_mod( 'hongo_logo_light', '' ) : '';
        empty( $hongo_logo_ratina ) ? $hongo_logo_ratina = get_theme_mod( 'hongo_logo_ratina', '' ) : '';
        empty( $hongo_logo_light_ratina ) ? $hongo_logo_light_ratina = get_theme_mod( 'hongo_logo_light_ratina', '' ) : '';

        // For Svg Width
        empty( $logo_svg_width ) ? $logo_svg_width = get_theme_mod( 'hongo_header_svg_width', '' ) : '';
        
            $output .= '<div class="header-logo-wrapper'.$class_list.'">';
                if( is_front_page() && $hongo_h1_logo_font_page == '1' ) {
                    $output .= '<h1>';
                }

                $hongo_logo_extension = $hongo_logo_light_extension = '';
                if( ! empty( $hongo_logo ) ) {
                    $data = wp_check_filetype( $hongo_logo );
                    $hongo_logo_extension = ! empty( $data['ext'] ) ? $data['ext'] : '';
                }
                if( ! empty( $hongo_logo_light ) ) {
                    $data = wp_check_filetype( $hongo_logo_light );
                    $hongo_logo_light_extension = ! empty( $data['ext'] ) ? $data['ext'] : '';
                }

                if( $hongo_logo || $hongo_logo_light ) {

				        // logo maximum height
				        if ( ! empty( $logo_max_height ) ) {

				            $hongo_featured_array[] = 'header .logo { max-height: '.$logo_max_height.'; }';
				        }

                        if( ! empty( $hongo_logo_extension ) && $hongo_logo_extension == 'svg' && ! empty( $logo_svg_width ) ) { 
                            $hongo_featured_array[] = 'header a.logo-light img {width: '.$logo_svg_width.'!important; max-height:inherit;}';
                        }

                        if( ! empty( $hongo_logo_light_extension ) && $hongo_logo_light_extension == 'svg' && ! empty( $logo_svg_width ) ) {
                            $hongo_featured_array[] = 'header a.logo-dark img {width: '.$logo_svg_width.'!important; max-height:inherit;}';
                        }

                        if( $hongo_logo_ratina ) {
                            if( $hongo_logo ) {
                                $output .= '<a'.$id.' href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-light">';
                                    $output .= '<img class="logo skip-lazy" src="'.esc_url( $hongo_logo ).'" data-rjs="'.esc_url( $hongo_logo_ratina ).'" alt="'.get_bloginfo("name").'">';
                                $output .= '</a>';
                            }
                        } else {
                            if( $hongo_logo ) {
                                $output .= '<a'.$id.' href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-light">';
                                    $output .= '<img class="logo skip-lazy" src="'.esc_url( $hongo_logo ).'" data-no-retina="" alt="'.get_bloginfo("name").'">';
                                $output .= '</a>';
                            }
                        }
                        
                        if( $hongo_logo_light_ratina ) {
                            if( $hongo_logo_light ) {
                                $output .= '<a'.$id.' href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-dark">';
                                    $output .= '<img class="logo skip-lazy" src="'.esc_url( $hongo_logo_light ).'" data-rjs="'.esc_url( $hongo_logo_light_ratina ).'" alt="'.get_bloginfo("name").'">';
                                $output .= '</a>';
                            }
                        } else {
                            if( $hongo_logo_light ) {
                                $output .= '<a'.$id.' href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-dark">';
                                    $output .= '<img class="logo skip-lazy" src="'.esc_url( $hongo_logo_light ).'" data-no-retina="" alt="'.get_bloginfo("name").'">';
                                $output .= '</a>';
                            }
                        }
                } else {
                    $output .= '<span'.$id.' class="site-title"><a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'">'.get_bloginfo( "name" ).'</a></span>';
                }
                if( is_front_page() && $hongo_h1_logo_font_page == '1' ) {
                    $output .= '</h1>';
                }
            $output .= '</div>';

        return $output;
    }
}
add_shortcode( 'hongo_header_logo', 'hongo_header_logo_shortcode' );