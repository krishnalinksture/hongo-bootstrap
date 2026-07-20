<?php
/**
 * Shortcode For Navigation Links
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Navigation Links */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_navigation_links_shortcode' ) ) {
    function hongo_navigation_links_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_navigation_links_uniq;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_navigation_main_title' => '',
            'hongo_title_link_horizontal_enable' => '0',
            'hongo_title_link_separator' => '1',
            'hongo_enable_link' => '0',
            'hongo_link_url' => '',

            'hongo_title_link_icon_enable' => '0',
            'hongo_title_custom_icon_image_enable' => '0',
            'hongo_title_icon_position' => 'left',
            'hongo_title_custom_icon_image' => '',
            'hongo_title_custom_icon_max_width' => '',
            'hongo_title_link_icon' => '',
            'hongo_navigation_links_slides' => '',

            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',

            'hongo_font_title_setting' => '',
            'hongo_enable_alternate_font_title' => '0',
            'hongo_font_links_setting' => '',
            'hongo_enable_alternate_font_links' => '0',

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

        // Navigation links unique id 
        $hongo_navigation_links_uniq  = ! empty( $hongo_navigation_links_uniq ) ? $hongo_navigation_links_uniq : 1;
        $classes[] = $hongo_navigation_links_uniq_class =  'navigation-links-unique-' . $hongo_navigation_links_uniq;
        $hongo_navigation_links_uniq++;

        // Navigation links horizontal or vertical
        if( $hongo_title_link_horizontal_enable == 1 ) {

            $classes[] = 'navigation-link-horizontal';
            if( $hongo_title_link_separator == 1 ) {

                $classes[] = 'navigation-link-separator';
            }

        } else {

            $classes[] = 'navigation-link-vertical';
        }

        // Title Icon or custom image
        if ( ( $hongo_title_custom_icon_image_enable == 1 && ! empty( $hongo_title_custom_icon_image ) ) || $hongo_title_link_icon ) {
            $icon_title_gap = ( $hongo_title_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            if ( $hongo_title_custom_icon_image_enable == 1 && ! empty( $hongo_title_custom_icon_image ) ) {

                $icon = hongo_get_image_html( $hongo_title_custom_icon_image, 'full', $icon_title_gap );

            } else {
                
                $icon = '<i class="'.$hongo_title_link_icon.$icon_title_gap.'" aria-hidden="true"></i>';
            }

            // Icon position
            if ( $hongo_title_icon_position == 'right' ) {
                $hongo_navigation_main_title = $hongo_navigation_main_title . $icon;
            } else {
                $hongo_navigation_main_title = $icon . $hongo_navigation_main_title;
            }
        }

        if ( ! empty( $hongo_title_custom_icon_max_width ) && $hongo_title_custom_icon_image_enable == 1 ) {
            $hongo_featured_array[] = 'ul.'.$hongo_navigation_links_uniq_class.' li.menu-title img { max-width: '.$hongo_title_custom_icon_max_width.' }';
        }

        // Column Display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Responsive font settings
        $hongo_font_title_setting = ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $hongo_font_title_setting .= ( $hongo_enable_alternate_font_title == 1 ) ? ' alt-font' : '';

        $hongo_font_links_setting = ( $hongo_font_links_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_links_setting ) : '';
        $hongo_font_links_setting .= ( $hongo_enable_alternate_font_links == 1 ) ? ' alt-font' : '';

        // CSS Box 
        ( ! empty( $css ) ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';

        // Background Image 
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Responsive CSS Box
        if ( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

        $_root_relative_current = untrailingslashit( $_SERVER['REQUEST_URI'] );
        $current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_root_relative_current );
        if ( is_customize_preview() ) {
            $_root_relative_current = strtok( untrailingslashit( $_SERVER['REQUEST_URI'] ), '?' );
        }

        $current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_root_relative_current );

        if ( ! empty( $hongo_navigation_links_slides ) ) {

            $hongo_navigation_links_slides = json_decode( urldecode( $hongo_navigation_links_slides ) );

            $output .= '<ul'.$id.' class="hongo-link-menu navigation-menu menu'.esc_attr( $class_list ).'">';

                if ( ! empty( $hongo_navigation_main_title ) ) {
                    $output .= '<li class="menu-item menu-title'.esc_attr( $hongo_font_title_setting ).'">';
                        if ( $hongo_enable_link == '1' && ! empty( $hongo_link_url ) ) {
                            $output .= '<a class="menu-title-link'.esc_attr( $hongo_font_title_setting ).'" href="'.esc_url( $hongo_link_url ).'">'.$hongo_navigation_main_title.'</a>';
                        } else{

                            $output .= $hongo_navigation_main_title;
                        }
                    $output .= '</li>';
                }

                if ( ! empty( $hongo_navigation_links_slides ) ) {
                    
                    $image_uniq_id = 1;
                    foreach ( $hongo_navigation_links_slides as $slide ) {

                        $icon = $hongo_naviagation_link = '';
                        $navigation_links_args = ! empty( $slide->hongo_navigation_links ) ? vc_parse_multi_attribute( $slide->hongo_navigation_links ) : array();

                        $hongo_naviagation_postid = isset( $navigation_links_args['postid'] ) ? $navigation_links_args['postid'] : '';

                        if ( $hongo_naviagation_postid ) {
                            $hongo_naviagation_link = get_permalink( $hongo_naviagation_postid );
                            if ( ! empty( $hongo_naviagation_link ) ) {
                                $hongo_naviagation_link = $hongo_naviagation_link;
                                if( ! empty( $navigation_links_args['url'] ) ) {
                                    $hashID = strstr( $navigation_links_args['url'], '#' );
                                    if( ! empty( $hashID ) ) {
                                        $hongo_naviagation_link .= $hashID;
                                    }
                                }                                
                            } elseif ( isset( $navigation_links_args['url'] ) ) {
                                $hongo_naviagation_link = $navigation_links_args['url'];
                            } else{
                                $hongo_naviagation_link = '#';
                            }

                        } else {
                            $hongo_naviagation_link = isset( $navigation_links_args['url'] ) ? $navigation_links_args['url'] : '#';
                        }
                        $active_class = ( rtrim ( $hongo_naviagation_link, '/' ) == rtrim( $current_url, '/' ) ) ? ' current-menu-item' : '';

                        $hongo_navigation_title = isset( $navigation_links_args['title'] ) ? $navigation_links_args['title'] : '';
                        $hongo_naviagation_link_target = isset( $navigation_links_args['target'] ) ? trim( $navigation_links_args['target'] ) : '_self';

                        $hongo_link_icon_enable = ! empty( $slide->hongo_link_icon_enable ) ? $slide->hongo_link_icon_enable : '';
                        $hongo_custom_icon_image_enable = ! empty( $slide->hongo_custom_icon_image_enable ) ? $slide->hongo_custom_icon_image_enable : '';
                        $hongo_custom_icon_image = ! empty( $slide->hongo_custom_icon_image ) ? $slide->hongo_custom_icon_image : '';
                        $hongo_link_icon = ! empty( $slide->hongo_link_icon ) ? $slide->hongo_link_icon : '';
                        $hongo_icon_position = ! empty( $slide->hongo_icon_position ) ? $slide->hongo_icon_position : '';

                        // Link Icon || Link Icon Img
                        if ( $hongo_link_icon_enable == 1 ) {
                            if ( $hongo_link_icon || ( $hongo_custom_icon_image_enable == 1 && $hongo_custom_icon_image ) ) {

                                $hongo_icon_title_position = ( $hongo_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
                                if ( $hongo_custom_icon_image_enable == 1 && $hongo_custom_icon_image ) {

                                    $icon = hongo_get_image_html( $hongo_custom_icon_image, 'full', array( 'link-image-'.$image_uniq_id, $hongo_icon_title_position ) );

                                } else {
                                    $icon = ( $hongo_link_icon ) ? '<i class="'.$hongo_link_icon.$hongo_icon_title_position.'" aria-hidden="true"></i>' : '';
                                }

                                // Icon Position
                                if ( $hongo_icon_position == 'right' ) {
                                    $hongo_navigation_title = $hongo_navigation_title . $icon;
                                } else {
                                    $hongo_navigation_title = $icon . $hongo_navigation_title;
                                }
                            }
                        }

                        // custom image width
                        if ( ! empty( $slide->custom_icon_max_width ) && $hongo_custom_icon_image_enable == 1 && $hongo_link_icon_enable == 1 ) {
                            $hongo_featured_array[] = 'ul.'.$hongo_navigation_links_uniq_class.' li a img.link-image-'.$image_uniq_id.' { max-width: '.$slide->custom_icon_max_width.' }';
                        }

                        // custom link class
                        $extra_class = ! empty( $slide->hongo_link_class_name ) ? ' ' . $slide->hongo_link_class_name : '';

                        if ( ! empty( $hongo_navigation_title ) ) {

                            $output .= '<li class="menu-item'.esc_attr( $active_class ).esc_attr( $hongo_font_links_setting ).esc_attr( $extra_class ).'">';
                                $output .= '<a class="navigation-links'.esc_attr( $hongo_font_links_setting ).'" href="'.esc_url( $hongo_naviagation_link ).'" target="'.esc_attr( $hongo_naviagation_link_target ).'">'.$hongo_navigation_title.'</a>';
                            $output .= '</li>';
                        }
                        $image_uniq_id++;
                    }
                }

            $output .= '</ul>';
        }

        return $output;
    }
}
add_shortcode( 'hongo_navigation_links', 'hongo_navigation_links_shortcode' );