<?php
/**
 * Smart Section For Left Navigation Menu
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Left Navigation menu */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_left_navigation_menu_shortcode' ) ) {
    function hongo_left_navigation_menu_shortcode( $atts, $content = null ) {

    global $hongo_navigation_left_menu_uniq, $hongo_featured_array, $hongo_left_menu_font_class, $hongo_left_submenu_font_class;

    extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_menu_select' => '',
            'hongo_mobile_menu_text' => '',

            'hongo_navigation_icon_color' => '',
            'hongo_navigation_active_icon_color' => '',
            'hongo_navigation_icon_size' => '',
            'hongo_enable_close_toggle' => '1',

            'hongo_font_menu_setting' => '',
            'hongo_font_submenu_setting' => '',
        ), $atts ) );

     $output = '';
    
    $classes = array();

    $id         = ( $id ) ? ' id="'.$id.'"' : '';
    $class      = ( $class ) ? $classes[] = $class : '';

    // Left menu uniq id
    $hongo_navigation_left_menu_uniq = ( $hongo_navigation_left_menu_uniq ) ? $hongo_navigation_left_menu_uniq : 1;
    $classes[] = $hongo_navigation_left_menu_uniq_class = 'hongo-left-menu-'.$hongo_navigation_left_menu_uniq;
    $hongo_navigation_left_menu_uniq++;

    // Navigation menu icon color
    if ( ! empty( $hongo_navigation_icon_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_left_menu_uniq_class. ' .hongo-left-menu > li span i.ti-angle-down { color:'.$hongo_navigation_icon_color.'; }';
    }
    // Navigation menu active icon color
    if ( ! empty( $hongo_navigation_active_icon_color ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_left_menu_uniq_class. ' .hongo-left-menu li.menu-item.on > span .ti-angle-down:before { color:'.$hongo_navigation_active_icon_color.'; }';
    }
    // Navigation menu icon size
    if ( ! empty( $hongo_navigation_icon_size ) ) {
        $hongo_featured_array[] = '.'.$hongo_navigation_left_menu_uniq_class. ' .hongo-left-menu > li span i.ti-angle-down { font-size:'.$hongo_navigation_icon_size.'; }';
    }

    // Enable close icon in toggle
    $hongo_enable_close_toggle_class = ( $hongo_enable_close_toggle == '1' ) ? ' toggle-mobile' : ' no-toggle-mobile';

    // Left menu responsive font settings
    $hongo_left_menu_font_class = ( $hongo_font_menu_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_menu_setting ) : '';

    // Responsive font settigs Left menu
    if ( $hongo_font_menu_setting ) {
        add_filter( 'hongo_left_link_css_class', 'hongo_left_menu_class', 10, 2 );
    } else{
        remove_filter( 'hongo_left_link_css_class', 'hongo_left_menu_class' );
    }

    // Left Submenu responsive font settings
    $hongo_left_submenu_font_class = ( $hongo_font_submenu_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_submenu_setting ) : '';

    // Responsive font settigs Left Submenu
    if ( $hongo_font_submenu_setting ) {
        add_filter( 'hongo_left_link_css_class', 'hongo_left_submenu_class', 10, 2 );
    } else{
        remove_filter( 'hongo_left_link_css_class', 'hongo_left_submenu_class' );
    }

    $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

        // Navigation Menu
        if ( ! empty( $hongo_menu_select ) && class_exists( 'Hongo_Left_Menu_Walker' ) ) {

            $output .= '<div class="hongo-left-menu-wrap'.$class_list.'">';

                $output .= '<button type="button" class="navbar-toggle collapsed'.$hongo_enable_close_toggle_class.'" data-toggle="collapse" data-target="#'.$hongo_navigation_left_menu_uniq_class.'">';
                    $output .= '<span class="icon-bar"></span>';
                    $output .= '<span class="icon-bar"></span>';
                    $output .= '<span class="icon-bar"></span>';
                    $output .= '<span class="icon-bar"></span>';
                $output .= '</button>';
                if ( ! empty( $hongo_mobile_menu_text ) ) {
                    $output .= '<span class="navbar-toggle collapsed sr-only mobile-menu-text alt-font" data-toggle="collapse" data-target="#'.$hongo_navigation_left_menu_uniq_class.'">'.$hongo_mobile_menu_text.'</span>';
                }
                $output .= '<div id="'.$hongo_navigation_left_menu_uniq_class.'" class="hongo-left-menu-wrapper" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                    
                    if( $hongo_menu_select ) {

                        $hongo_header_menu_default = array(
                                                        'menu'          => $hongo_menu_select,
                                                        'container'     => 'ul',
                                                        'items_wrap'    => '<ul id="%1$s" class="%2$s nav alt-font hongo-left-menu" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                        'echo'          => false,
                                                        'fallback_cb'   => false,
                                                        'walker'        => new Hongo_Left_Menu_Walker(),
                                                    );
                        $output .= wp_nav_menu( $hongo_header_menu_default );

                    } elseif( has_nav_menu( 'primary-menu' ) ) {

                        $hongo_header_menu_default = array(
                                                        'theme_location'=> 'primary-menu',
                                                        'container'     => 'ul',
                                                        'items_wrap'    => '<ul id="%1$s" class="%2$s nav alt-font hongo-left-menu" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                        'echo'          => false,
                                                        'fallback_cb'   => false,
                                                        'walker'        => new Hongo_Left_Menu_Walker(),
                                                    );
                        $output .= wp_nav_menu( $hongo_header_menu_default );

                    } else {

                        $hongo_header_menu_default = array(
                                                        'menu_id'       => '',
                                                        'container'     => 'ul',
                                                        'items_wrap'    => '<ul id="%1$s" class="%2$s nav alt-font hongo-left-menu" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                        'menu_class'    => 'hongo-normal-left-menu',
                                                        'echo'          => false,
                                                        'fallback_cb'   => false,
                                                        'walker'        => new Hongo_Left_Menu_Walker(),
                                                    );

                        $output .= wp_nav_menu( $hongo_header_menu_default );
                    }
                $output .= '</div>';
            $output .= '</div>';
        }
        return $output;
    }
}
add_shortcode( 'hongo_left_navigation_menu', 'hongo_left_navigation_menu_shortcode' );