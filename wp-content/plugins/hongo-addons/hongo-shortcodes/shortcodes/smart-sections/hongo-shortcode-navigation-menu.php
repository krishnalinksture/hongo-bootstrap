<?php
/**
 * Smart Section For Navigation Menu
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Navigation menu */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists('hongo_navigation_menu_shortcode') ) {
    function hongo_navigation_menu_shortcode( $atts, $content = null ) {

        global $hongo_navigation_menu_uniq, $hongo_category_menu_uniq, $hongo_featured_array, $hongo_navigation_menu_font_class, $hongo_category_menu_font_class;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_enable_main_menu' => '1',
            'hongo_menu_select' => '',
            'hongo_mobile_menu_text' => '',
            'hongo_mobile_menu_tab_text' => __( 'Menu', 'hongo-addons' ),
            'hongo_space_between_menu' => '',
            'hongo_menu_border_color' => '',
            'hongo_sticky_menu_border_color' => '',
            'hongo_enable_menu_ipad_icon' => '0',
            'hongo_enable_close_toggle' => '1',

            'hongo_enable_category_menu' => '0',
            'hongo_menu_category_select' => '',
            'hongo_category_menu_title' => __( 'Browse Categories', 'hongo-addons' ),
            'hongo_mobile_category_menu_tab_text' => __( 'Browse Categories', 'hongo-addons' ),
            'hongo_space_between_menu_category' => '',
            'hongo_category_button_background_color' => '',
            'hongo_category_button_text_color' => '',
            'hongo_category_menu_background_color' => '',
            'hongo_category_menu_border_color' => '',
            'hongo_category_sticky_button_background_color' => '',
            'hongo_category_sticky_button_text_color' => '',
            'hongo_category_sticky_menu_background_color' => '',
            'hongo_category_sticky_menu_border_color' => '',

            'hongo_font_title_setting' => '',
            'additional_font_main_menu' => '1',
            'hongo_category_font_title_setting' => '',
            'additional_font_category_menu' => '1',

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

        // Responsive font settings
        $hongo_navigation_menu_font_class = ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $hongo_category_menu_font_class = ( $hongo_category_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_category_font_title_setting ) : '';

        if ( $hongo_font_title_setting ) {
            add_filter( 'hongo_main_link_css_class', 'hongo_navigation_menu_class', 10, 2 );
        } else{
            remove_filter( 'hongo_main_link_css_class', 'hongo_navigation_menu_class' );
        }

        if ( $hongo_category_font_title_setting ) {
            add_filter( 'hongo_category_link_css_class', 'hongo_category_menu_class', 10, 2 );
        } else{
            remove_filter( 'hongo_category_link_css_class', 'hongo_category_menu_class' );
        }

        // Navigation menu uniq id
        $hongo_navigation_menu_uniq = ( $hongo_navigation_menu_uniq ) ? $hongo_navigation_menu_uniq : 1;
        $hongo_navigation_menu_uniq_class = 'hongo-navigation-menu-'.$hongo_navigation_menu_uniq;
        $hongo_navigation_menu_uniq++;

        // Category menu uniq id
        $hongo_category_menu_uniq = ( $hongo_category_menu_uniq ) ? $hongo_category_menu_uniq : 1;
        $hongo_category_menu_uniq_class = 'hongo-category-menu-'.$hongo_category_menu_uniq;
        $hongo_category_menu_uniq++;

        // Column display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Enable close icon in toggle
        $hongo_enable_close_toggle_class = ( $hongo_enable_close_toggle == '1' ) ? ' toggle-mobile' : ' no-toggle-mobile';

        // Main menu title hover color
        if ( ! empty( $hongo_font_title_setting ) ) {
            $title_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title_hover', $hongo_font_title_setting );
            if ( $title_hover_color ) {
                $hongo_featured_array[] = '.'.$hongo_navigation_menu_uniq_class.' .nav > li:hover > a, .'.$hongo_navigation_menu_uniq_class.' .nav > li.on > a, .'.$hongo_navigation_menu_uniq_class.' .nav > li.current-menu-item > a, .'.$hongo_navigation_menu_uniq_class.' .nav > li > a.active, .'.$hongo_navigation_menu_uniq_class.' .nav > li.active > a, .'.$hongo_navigation_menu_uniq_class.' .nav > li.current-menu-ancestor > a { color:'.$title_hover_color.' !important; }';

            }
        }
        
        /* Category Menu Css */

        // Space between menu and category menu
        if ( ! empty( $hongo_space_between_menu_category ) ) {
            $hongo_featured_array[] = '.'.$hongo_navigation_menu_uniq_class.' .hongo-shop-dropdown-menu.hongo-tab.panel { margin-right:'.$hongo_space_between_menu_category.'; }';
        }
        // Category menu button background color
        if ( ! empty( $hongo_category_button_background_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_category_menu_uniq_class. ' .shop-dropdown-toggle{ background-color:'.$hongo_category_button_background_color.'; }';
        }
        // Sticky Category menu button background color
        if ( ! empty( $hongo_category_sticky_button_background_color ) ) {
            $hongo_featured_array[] = '.sticky-appear .'.$hongo_category_menu_uniq_class. ' .shop-dropdown-toggle{ background-color:'.$hongo_category_sticky_button_background_color.'; }';
        }
        // Category menu button text color
        if ( ! empty( $hongo_category_button_text_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_category_menu_uniq_class. ' .shop-dropdown-toggle{ color:'.$hongo_category_button_text_color.'; }';
            $hongo_featured_array[] = '.'.$hongo_category_menu_uniq_class. ' .shop-dropdown-toggle .icon-bar{ background-color:'.$hongo_category_button_text_color.'; }';
        }
        // Sticky Category menu button text color
        if ( ! empty( $hongo_category_sticky_button_text_color ) ) {
            $hongo_featured_array[] = '.sticky-appear .'.$hongo_category_menu_uniq_class. ' .shop-dropdown-toggle{ color:'.$hongo_category_sticky_button_text_color.'; }';
            $hongo_featured_array[] = '.sticky-appear .'.$hongo_category_menu_uniq_class. ' .shop-dropdown-toggle .icon-bar{ background-color:'.$hongo_category_sticky_button_text_color.'; }';
        }
        // Category menu background color
        if ( ! empty( $hongo_category_menu_background_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_category_menu_uniq_class. ' .hongo-shop-dropdown-button-menu{ background-color:'.$hongo_category_menu_background_color.'; }';
        }
        // Sticky Category menu background color
        if ( ! empty( $hongo_category_sticky_menu_background_color ) ) {
            $hongo_featured_array[] = '.sticky-appear .'.$hongo_category_menu_uniq_class. ' .hongo-shop-dropdown-button-menu{ background-color:'.$hongo_category_sticky_menu_background_color.'; }';
        }
        // Category menu border color
        if ( ! empty( $hongo_category_menu_border_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_category_menu_uniq_class. ' .navbar-nav > li{ border-color:'.$hongo_category_menu_border_color.'; }';
        }
        // Sticky Category menu border color
        if ( ! empty( $hongo_category_sticky_menu_border_color ) ) {
            $hongo_featured_array[] = '.sticky-appear .'.$hongo_category_menu_uniq_class. ' .navbar-nav > li{ border-color:'.$hongo_category_sticky_menu_border_color.'; }';
        }

        /* Main Menu Css */

        // Main menu space betweeen gap
        if ( ! empty( $hongo_space_between_menu ) ) {
            
            // Mobile Menu Breakpoint
            $hongo_enable_header_general         = hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
            $hongo_header_section                = hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );
            $hongo_header_mobile_menu_breakpoint = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_breakpoint' );
            $hongo_header_mobile_menu_breakpoint = ! empty( $hongo_header_mobile_menu_breakpoint ) ? $hongo_header_mobile_menu_breakpoint : '991';

            $hongo_featured_array[] = '@media (min-width: ' . ( $hongo_header_mobile_menu_breakpoint + 1 ) . 'px) { .' . $hongo_navigation_menu_uniq_class . ' .hongo-navigation-menu .nav > li > a{ padding-left: '.$hongo_space_between_menu.'; padding-right: '.$hongo_space_between_menu.'; } }';
        }
        // Main menu border color
        if ( ! empty( $hongo_menu_border_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_navigation_menu_uniq_class. ' .nav > li > a .menu-hover-line:after{ background-color:'.$hongo_menu_border_color.'; }';
        }
        // Sticky Main menu border color
        if ( ! empty( $hongo_sticky_menu_border_color ) ) {
            $hongo_featured_array[] = '.sticky-appear .'.$hongo_navigation_menu_uniq_class. ' .nav > li > a .menu-hover-line:after{ background-color:'.$hongo_sticky_menu_border_color.'; }';
        }

        // Tab class 
        $tab_class = ( $hongo_enable_category_menu == '1' && ! empty( $hongo_menu_category_select ) ) ? ' hongo-woocommerce-tabs-wrapper hongo-navigation-tab-wrap' : '';

        // Ipad Icon Show class
        $ipad_icon_class = ( $hongo_enable_menu_ipad_icon == '1' && ( $hongo_enable_main_menu == '1' && ! empty( $hongo_menu_select ) ) ) ? ' hongo-ipad-icon' : '';
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

        if ( ! empty( $hongo_menu_category_select ) || ! empty( $hongo_menu_select ) ) {

            $output .= '<div'.$id.' class="hongo-navigation-main-wrapper'.$class_list.'">';

                // Mobile Menu Button
                $output .= '<button type="button" class="navbar-toggle collapsed'.$hongo_enable_close_toggle_class.'" data-toggle="collapse" data-target="#'.$hongo_navigation_menu_uniq_class.'">';
                    $output .= '<span class="icon-bar"></span>';
                    $output .= '<span class="icon-bar"></span>';
                    $output .= '<span class="icon-bar"></span>';
                    $output .= '<span class="icon-bar"></span>';
                $output .= '</button>';
                if ( ! empty( $hongo_mobile_menu_text ) ) {
                    $output .= '<span class="navbar-toggle collapsed sr-only mobile-menu-text alt-font" data-toggle="collapse" data-target="#'.$hongo_navigation_menu_uniq_class.'">'.$hongo_mobile_menu_text.'</span>';
                }

                $output .= '<div class="navbar-collapse collapse'.$tab_class.$ipad_icon_class.'" id="'.$hongo_navigation_menu_uniq_class.'" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';

                    $without_tab_category_active_class = ' active';

                    if ( ( $hongo_enable_category_menu == '1' && ! empty( $hongo_menu_category_select ) ) && ( $hongo_enable_main_menu == '1' && ! empty( $hongo_menu_select ) ) ) {

                        $output .= '<ul class="tabs hongo-tabs navigation-tab alt-font">';
                            if ( $hongo_enable_main_menu == '1' && ! empty( $hongo_menu_select ) ) {
                                $hongo_mobile_menu_tab_text = ( ! empty( $hongo_mobile_menu_tab_text ) ) ? $hongo_mobile_menu_tab_text : __( 'Menu', 'hongo-addons' );
                                $output .= '<li class="active" id="tab-title-menu" aria-controls="'.$hongo_navigation_menu_uniq_class.'-tab-menu">';
                                    $output .= '<a href="#'.$hongo_navigation_menu_uniq_class.'-tab-menu">'. esc_html( $hongo_mobile_menu_tab_text ) .'</a>';
                                $output .= '</li>';
                            }
                            if ( $hongo_enable_category_menu == '1' && ! empty( $hongo_menu_category_select ) ) {
                                $hongo_mobile_category_menu_tab_text = ( ! empty( $hongo_mobile_category_menu_tab_text ) ) ? $hongo_mobile_category_menu_tab_text : __( 'Browse Categories', 'hongo-addons' );
                                $output .= '<li id="tab-title-category" aria-controls="'.$hongo_navigation_menu_uniq_class.'-tab-category">';
                                    $output .= '<a href="#'.$hongo_navigation_menu_uniq_class.'-tab-category">'. esc_html( $hongo_mobile_category_menu_tab_text ) .'</a>';
                                $output .= '</li>';
                            }
                        $output .= '</ul>';
                        $without_tab_category_active_class = '';
                    }

                    // Category menu enabled and main menu disabled
                    if ( ( $hongo_enable_category_menu == '1' && ! empty( $hongo_menu_category_select ) ) && ( $hongo_enable_main_menu == '0' || ( $hongo_enable_main_menu == '1' && empty( $hongo_menu_select ) ) ) ) {
                        $without_tab_category_active_class = '';
                    }

                    //  Category menu
                    if ( $hongo_enable_category_menu == '1' && ! empty( $hongo_menu_category_select ) ) {

                        $alt_font_category_menu_class = $additional_font_category_menu == '1' ? ' alt-font' : '';

                        $output .= '<div class="hongo-shop-dropdown-menu panel hongo-tab '.$hongo_category_menu_uniq_class.$without_tab_category_active_class.'" id="'.$hongo_navigation_menu_uniq_class.'-tab-category" role="tabpanel" aria-labelledby="tab-title-category">';
                            $output .= '<button type="button" class="shop-dropdown-toggle" data-target="#'.$hongo_category_menu_uniq_class.'">';
                                $output .= '<span class="icon-bar"></span>';
                                $output .= '<span class="icon-bar"></span>';
                                $output .= '<span class="icon-bar"></span>';
                                if ( ! empty( $hongo_category_menu_title ) ) {
                                    $output .= '<span class="sr-only alt-font">'.$hongo_category_menu_title.'</span>';
                                }
                            $output .= '</button>';
                            $output .= '<div id="'.$hongo_category_menu_uniq_class.'" class="hongo-shop-dropdown-button-menu" >';
                                
                                $hongo_header_menu_default = array(
                                                                'menu'       => $hongo_menu_category_select,
                                                                'container'  => 'ul',
                                                                'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav' . $alt_font_category_menu_class . ' navbar-left no-margin" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                                'echo'       => false,
                                                                'fallback_cb'=> false,
                                                                'walker'     => new Hongo_Shop_Menu_Walker(),
                                                            );
                                $output .= wp_nav_menu( $hongo_header_menu_default );

                            $output .= '</div>';
                        $output .= '</div>';
                    }

                    //  Main menu
                    if ( $hongo_enable_main_menu == '1' && ! empty( $hongo_menu_select ) ) {

                        $alt_font_main_menu_class = $additional_font_main_menu == '1' ? ' alt-font' : '';

                        $output .= '<div class="hongo-navigation-menu panel hongo-tab active '.$hongo_navigation_menu_uniq_class.'" id="'.$hongo_navigation_menu_uniq_class.'-tab-menu" role="tabpanel" >';

                            if( $hongo_menu_select ) {

                                $hongo_header_menu_default = array(
                                                                'menu'          => $hongo_menu_select,
                                                                'container'     => 'ul',
                                                                'items_wrap'    => '<ul id="%1$s" class="%2$s nav' . $alt_font_main_menu_class . ' hongo-menu-wrap" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                                'echo'          => false,
                                                                'fallback_cb'   => false,
                                                                'walker'        => new Hongo_Mega_Menu_Walker(),
                                                            );
                                $output .= wp_nav_menu( $hongo_header_menu_default );

                            } elseif( has_nav_menu( 'primary-menu' ) ) {

                                $hongo_header_menu_default = array(
                                                                'theme_location'=> 'primary-menu',
                                                                'container'     => 'ul',
                                                                'items_wrap'    => '<ul id="%1$s" class="%2$s nav' . $alt_font_main_menu_class . ' hongo-menu-wrap" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                                'echo'          => false,
                                                                'fallback_cb'   => false,
                                                                'walker'        => new Hongo_Mega_Menu_Walker(),
                                                            );
                                $output .= wp_nav_menu( $hongo_header_menu_default );

                            } else {

                                $hongo_header_menu_default = array( 
                                                                'menu_id'       => '',
                                                                'container'     => 'ul',
                                                                'items_wrap'    => '<ul id="%1$s" class="simple-dropdown %2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                                'menu_class'    => 'nav navbar-nav' . $alt_font_main_menu_class . ' hongo-normal-menu navbar-left no-margin',
                                                                'echo'          => false,
                                                                'fallback_cb'   => false,
                                                            );
                                $output .= wp_nav_menu( $hongo_header_menu_default );
                            }
                        $output .= '</div>';
                    }
                $output .= '</div>';
            $output .= '</div>';
            remove_filter( 'hongo_main_link_css_class', 'hongo_navigation_menu_class' );
            remove_filter( 'hongo_category_link_css_class', 'hongo_category_menu_class' );
        }

        return $output;
    }
}
add_shortcode( 'hongo_navigation_menu', 'hongo_navigation_menu_shortcode' );