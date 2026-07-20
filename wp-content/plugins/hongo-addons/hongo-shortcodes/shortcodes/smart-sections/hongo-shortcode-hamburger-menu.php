<?php
/**
 * Smart Section For Hamburger Menu
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Hamburger menu */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_hamburger_navigation_menu_shortcode' ) ) {

    function hongo_hamburger_navigation_menu_shortcode( $atts, $content = null ) {

    global $hongo_hamburger_menu_font_class, $hongo_hamburger_submenu_font_class, $hongo_navigation_hamburger_menu_uniq, $hongo_featured_array;

    extract( shortcode_atts( array(
        'id' => '',
        'class' => '',
        'hongo_menu_select' => '',
        'hongo_mobile_menu_text' => '',
        'hongo_menu_bottom_sidebar' => '',
        'hongo_menu_position' => '',
        'hongo_hamburger_logo_image' => '',
        'hongo_hamburger_ratina_logo_image' => '',
        'hongo_hamburger_bg_image' => '',
        'hongo_hamburger_copyrighttext' => '',

        'desktop_display' => '',
        'desktop_mini_display' => '',
        'ipad_display' => '',
        'mobile_display' => '',
        'hongo_toggle_color' => '',
        'hongo_close_icon_color' => '',
        'hongo_navigation_icon_color' => '',
        'hongo_navigation_icon_size' => '',
        'hongo_menu_bg_color' => '',

        'hongo_overlay_color' => '',
        'hongo_overlay_opacity' => '',

        'hongo_font_menu_setting' => '',
        'hongo_font_submenu_setting' => '',
        'hongo_font_copyright_setting' => '',

        'css' => '',
        'hongo_bg_image_type' => '',
        'desktop_bg_image_position' => '',
        'hongo_enable_responsive_css' => '',
        'responsive_css' => '',
    ), $atts ) );

    $output = $menu_output = $image_output = '';
    $classes = array();

    $id         = ( $id ) ? ' id="'.$id.'"' : '';
    $class      = ( $class ) ? $classes[] = $class : '';

    // Hamburger menu uniq id
    $hongo_navigation_hamburger_menu_uniq = ( $hongo_navigation_hamburger_menu_uniq ) ? $hongo_navigation_hamburger_menu_uniq : 1;
    $classes[] = $hongo_navigation_hamburger_menu_uniq_class = 'hongo-hamburger-menu-'.$hongo_navigation_hamburger_menu_uniq;
    $hongo_navigation_hamburger_menu_uniq++;

    $hongo_hamburger_bg_image = ! empty( $hongo_hamburger_bg_image ) ? ' style="background-image:url('.wp_get_attachment_image_url( $hongo_hamburger_bg_image, 'full' ).')"' : '';

    // Column Display setting
    $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
    $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
    $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
    $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';
    // Toggle button color
    if ( ! empty( $hongo_toggle_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .navbar-toggle span { background-color:'.$hongo_toggle_color.'!important; }';
    }
    // Close icon color
    if ( ! empty( $hongo_close_icon_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .close-button-menu { color:'.$hongo_close_icon_color.'!important; }';
    }
    // Navigation menu icon color
    if ( ! empty( $hongo_navigation_icon_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .menu-content-inner-wrap .dark .menu-dropdown-toggle:before, .'.$hongo_navigation_hamburger_menu_uniq_class. ' .menu-content-inner-wrap .dark .menu-dropdown-toggle:after { background-color:'.$hongo_navigation_icon_color.'; }';
    }
    // Navigation menu icon size
    if ( ! empty( $hongo_navigation_icon_size ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .menu-content-inner-wrap .dark .menu-dropdown-toggle:before, .'.$hongo_navigation_hamburger_menu_uniq_class. ' .menu-content-inner-wrap .dark .menu-dropdown-toggle:after { width:'.$hongo_navigation_icon_size.'; }';
    }
    // Navigation menu background color
    if ( ! empty( $hongo_menu_bg_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .hongo-hamburger-menu-bg { background-color:'.$hongo_menu_bg_color.'; }';
    }
    // Navigation menu overlay color
    if ( ! empty( $hongo_overlay_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .hongo-overlay { background-color:'.$hongo_overlay_color.'; }';
    }
    // Navigation menu overlay opacity
    if ( ! empty( $hongo_overlay_opacity ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_hamburger_menu_uniq_class. ' .hongo-overlay { opacity:'.$hongo_overlay_opacity.'; }';
    }

    // Hamburger menu responsive font settings
    $hongo_hamburger_menu_font_class = ( $hongo_font_menu_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_menu_setting ) : '';

    // Responsive font settigs Hamburger menu
    if ( $hongo_font_menu_setting ) {
        add_filter( 'hongo_hamburger_link_css_class', 'hongo_hamburger_menu_class', 10, 2 );
    } else{
        remove_filter( 'hongo_hamburger_link_css_class', 'hongo_hamburger_menu_class' );
    }

    // Hamburger Submenu responsive font settings
    $hongo_hamburger_submenu_font_class = ( $hongo_font_submenu_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_submenu_setting ) : '';

    // Responsive font settigs Hamburger Submenu
    if ( $hongo_font_submenu_setting ) {
        add_filter( 'hongo_hamburger_link_css_class', 'hongo_hamburger_submenu_class', 10, 2 );
    } else{
        remove_filter( 'hongo_hamburger_link_css_class', 'hongo_hamburger_submenu_class' );
    }

    // Hamburger Copyright text font settings
    $hongo_font_copyright_setting_class = ( $hongo_font_copyright_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_copyright_setting ) : '';


    // CSS Box 
    ( ! empty( $css ) ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';

    // Background Image 
    ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
    ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

    // Responsive CSS Box
    if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

        $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
    }

    $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

    if ( ! empty( $hongo_menu_select ) || ! empty( $hongo_hamburger_logo_image ) || ! empty( $hongo_hamburger_ratina_logo_image ) ) {

        $output .= '<div class="hongo-hamburger-menu '.$hongo_navigation_hamburger_menu_uniq_class.'">';
            $output .= '<div class="menu-wrap full-screen">';
                $output .= '<div class="animation-box">';

                    // Navigation Menu
                    if ( ! empty( $hongo_menu_select ) && class_exists( 'Hongo_Hamburger_Menu_Walker' ) ) {

                        $menu_output .= '<div class="col-sm-6 hongo-hamburger-menu-bg full-screen height-100 h-menu" >';
                            $menu_output .= '<div class="hongo-hamburger-menu-content-wrap" >';
                                $menu_output .= '<div class="menu-content-inner-wrap" >';

                                    if( $hongo_menu_select ) {

                                        $hongo_header_menu_default  = array(
                                                                        'menu'          => $hongo_menu_select,
                                                                        'container'     => 'ul',
                                                                        'items_wrap'    => '<ul id="%1$s" class="%2$s menu-hamburger-menu-wrap dark alt-font" data-in="fadeIn" data-out="fadeOut" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                                                                        'echo'          => false,
                                                                        'fallback_cb'   => false,
                                                                        'walker'        => new Hongo_Hamburger_Menu_Walker(),
                                                                    );
                                        $menu_output .= wp_nav_menu( $hongo_header_menu_default );

                                    } elseif( has_nav_menu( 'primary-menu' ) ) {

                                        $hongo_header_menu_default = array(
                                                                        'theme_location'=> 'primary-menu',
                                                                        'container'     => 'ul',
                                                                        'items_wrap'    => '<ul id="%1$s" class="%2$s menu-hamburger-menu-wrap dark alt-font" data-in="fadeIn" data-out="fadeOut" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                                                                        'echo'          => false,
                                                                        'fallback_cb'   => false,
                                                                        'walker'        => new Hongo_Hamburger_Menu_Walker(),
                                                                    );                                        
                                        $menu_output .= wp_nav_menu( $hongo_header_menu_default );

                                    } else {

                                        $hongo_header_menu_default = array(
                                                                        'menu_id'       => '',
                                                                        'container'     => 'ul',
                                                                        'items_wrap'    => '<ul id="%1$s" class="%2$s menu-hamburger-menu-wrap dark alt-font" data-in="fadeIn" data-out="fadeOut" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                                                                        'menu_class'    => 'hongo-normal-hamburger-menu',
                                                                        'echo'          => false,
                                                                        'fallback_cb'   => false,
                                                                        'walker'        => new Hongo_Hamburger_Menu_Walker(),
                                                                    );
                                        
                                        $menu_output .= wp_nav_menu( $hongo_header_menu_default );
                                    }

                                $menu_output .= '</div>';
                                if( ! empty( $hongo_menu_bottom_sidebar ) && hongo_check_active_sidebar( $hongo_menu_bottom_sidebar ) ) {
                                    $menu_output .= '<div class="hongo-hamburger-menu-widget-wrap" >';
                                         ob_start();
                                            dynamic_sidebar( $hongo_menu_bottom_sidebar );
                                            $menu_output .= ob_get_contents();
                                        ob_end_clean();
                                    $menu_output .= '</div>';
                                }
                            $menu_output .= '</div>';
                            $menu_output .= '<a href="#" class="close-button-menu" id="close-button"><i class="ti-close"></i></a>';
                        $menu_output .= '</div>';
                    }

                    // Background image section
                    $image_output .= '<div class="col-sm-6 no-padding cover-background full-screen height-100 h-image" '.$hongo_hamburger_bg_image.'>';
                        $image_output .= '<div class="hongo-overlay"></div>';
                    if ( ! empty( $hongo_hamburger_logo_image ) || ! empty( $hongo_hamburger_ratina_logo_image ) ) {

                            $image_output .= '<div class="hamburger-image-content">';
                                if ( ! empty( $hongo_hamburger_logo_image ) || ! empty( $hongo_hamburger_ratina_logo_image ) ) {
                                    $image_output .= '<a class="hamburger-logo" href="'.get_site_url().'" >';
                                        if ( ! empty( $hongo_hamburger_logo_image ) ) {
                                            $image_output .= wp_get_attachment_image( $hongo_hamburger_logo_image, 'full', "", array( "class" => "logo" ) );
                                        }
                                        if ( ! empty( $hongo_hamburger_ratina_logo_image ) ) {
                                            $image_output .= wp_get_attachment_image( $hongo_hamburger_ratina_logo_image, 'full', "", array( "class" => "retina-logo" ) );
                                        }
                                    $image_output .= '</a>';
                                }
                                if ( ! empty( $hongo_hamburger_copyrighttext ) ) {
                                    $image_output .= '<div class="hongo-copyright-text alt-font'.$hongo_font_copyright_setting_class.'">';
                                        $image_output .= hongo_remove_wpautop( $hongo_hamburger_copyrighttext );
                                    $image_output .= '</div>';
                                }
                            $image_output .= '</div>';
                    }
                    $image_output .= '</div>';

                    // Menu Position
                    if ( $hongo_menu_position == 'left' ) {                        
                        $output .= $menu_output.$image_output;
                    } else {
                        $output .= $image_output.$menu_output;
                    }

                $output .= '</div>'; // animation-box end
            $output .= '</div>'; // menu-wrap end
        $output .= '</div>'; // hongo-hamburger-menu end

        // Toggle menu button
        $output .= '<div'.$id.' class="hamburger-menu-button header-menu-button'.$class_list.'">';
            if ( ! empty( $hongo_mobile_menu_text ) ) {
                $output .= '<span class="mobile-menu-text sr-only alt-font" >'.$hongo_mobile_menu_text.'</span>';
            }
            $mobile_menu_text_class = ! empty( $hongo_mobile_menu_text ) ? ' hamburger-mobile-menu-text' : '';
            $output .= '<button class="navbar-toggle mobile-toggle'.$mobile_menu_text_class.'" type="button" >';
                $output .= '<span></span>';
                $output .= '<span></span>';
                $output .= '<span></span>';
            $output .= '</button>';
        $output .= '</div>';
    }

    return $output;
    }
}
add_shortcode( 'hongo_hamburger_navigation_menu', 'hongo_hamburger_navigation_menu_shortcode' );