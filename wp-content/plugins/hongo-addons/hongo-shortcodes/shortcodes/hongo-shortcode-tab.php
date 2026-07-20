<?php
/**
 * Shortcode For Tabs
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/

$hongo_tabs_style='';
if ( ! function_exists( 'hongo_tabs' ) ) {
    function hongo_tabs( $atts, $content = null ) {

        global $hongo_tabs_style, $hongo_global_tabs, $hongo_featured_array, $hongo_tabs_style1, $hongo_tabs_style2, $hongo_tabs_style3;

        extract( shortcode_atts( array(
                    'id'        => '',
                    'class'     => '',
                    'tabs_style' => 'tab-style1',
                    'active_tab' => '',
                    'tabs_alignment' => '',
                    'hongo_icon_size' => 'icon-medium',

                    'hongo_title_bg_color' => '',
                    'hongo_title_active_bg_color' => '',
                    'hongo_title_active_color' => '',
                    'hongo_border_color' => '',

                    'hongo_font_title_setting' => '',
                ), $atts ) );

        // Remove animation
        add_filter( 'hongo_product_archive_animation', 'hongo_addons_product_archive_animation' );

        $output = $hongo_title_color = '';
        $hongo_global_tabs = $hongo_main_class = $hongo_style_array = array();

        $hongo_tabs_style = $tabs_style;

        do_shortcode( $content );

        if( empty( $hongo_global_tabs ) ) { return; }

        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        ( $class ) ? $hongo_main_class[] = $class : '';
        $hongo_main_class[] = $tabs_style;

        $active_tab = ( $active_tab ) ? $active_tab : '1';
        $tabs_alignment = ( $tabs_alignment ) ? ' '.$tabs_alignment : '';
        $hongo_icon_size = ( $hongo_icon_size ) ? ' '.$hongo_icon_size : '';

        // For get font title color from font settings
        if ( $hongo_font_title_setting ) {
            $hongo_title_color = hongo_get_vc_custom_settings_by_key( 'color_title' , $hongo_font_title_setting );
        }
        $hongo_font_title_class = ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';

        // Class list
        $hongo_main_class_list = ! empty( $hongo_main_class ) ? implode( " ", $hongo_main_class ) : '';

        // For uniqtab id
        $tabuniqtab = time().'-'.mt_rand();

        switch ($tabs_style) {

            case 'tab-style2':

                $hongo_tabs_style2 = ( $hongo_tabs_style2 ) ? $hongo_tabs_style2 : 0;
                $hongo_tabs_style2 = $hongo_tabs_style2 + 1;
                // Background Color
                if ( $hongo_title_bg_color ) {
                    $hongo_featured_array[] = '.tab-style-2-'.$hongo_tabs_style2.' .nav-tabs li a { background: '.$hongo_title_bg_color.' }';
                }
                // Active Background Color
                if ( $hongo_title_active_bg_color ) {
                    $hongo_featured_array[] = '.tab-style-2-'.$hongo_tabs_style2.' .nav-tabs li.active a { background: '.$hongo_title_active_bg_color.' }';
                }
                // Active Title Color
                if ( $hongo_title_active_color ) {
                    $hongo_featured_array[] = '.tab-style-2-'.$hongo_tabs_style2.' .nav-tabs li.active a span ,.tab-style-2-'.$hongo_tabs_style2.' .nav-tabs li.active a span i{ color: '.$hongo_title_active_color.' }';
                }
                // Border color
                if ( $hongo_border_color ) {
                    $hongo_featured_array[] = '.tab-style-2-'.$hongo_tabs_style2.' .nav-tabs li { border-color: '.$hongo_border_color.' }';
                    $hongo_featured_array[] = '.tab-style-2-'.$hongo_tabs_style2.' .tab-content { border-left-color: '.$hongo_border_color.' }';
                }
                //Icon Color 
                if ( $hongo_title_color ) {
                    $hongo_featured_array[] = '.tab-style-2-'.$hongo_tabs_style2.' .nav-tabs li a i { color: '.$hongo_title_color.' }';
                }

                $output .= '<div '.$id.' class="'.esc_attr( $hongo_main_class_list ).' tab-style-2-'.$hongo_tabs_style2.'">';
                    $output .= '<div class="row equalize xs-equalize-auto clearfix">';
                        $output .= '<div class="col-md-2 col-sm-3 col-xs-12 no-padding-right">';
                            $output .='<div class="display-table width-100 height-100">';
                                $output .= '<div class="display-table-cell vertical-align-middle">';
                                    $output .= '<ul class="nav nav-tabs">';
                                        foreach( $hongo_global_tabs as $key => $tab) {
                                            $title = ( array_key_exists('title', $tab['atts']) ) ?  $tab['atts']['title'] : '';
                                            $tab_icon = ( isset($tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';
                                            $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                                            $output .= '<li '.$active.'>';
                                                $output .= '<a href="#hongo-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="tab-title'.$hongo_font_title_class.'">';
                                                    if( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                                                        $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="' . esc_html__( 'Icon', 'hongo-addons' ) . '" class="tab-icon-image"/></span>';
                                                    } elseif($tab_icon) {
                                                        $output .= '<span><i class="'.esc_attr( $tab_icon.$hongo_icon_size ).'"></i></span>';
                                                    }
                                                    if(($title) && (isset($tab['atts']['show_title']) == 1)):
                                                        $output .= '<span class="alt-font">' . esc_html( $title ) . '</span>';
                                                    endif;
                                                $output .= '</a>';
                                            $output .= '</li>';
                                        }
                                    $output .= '</ul>';
                                $output .= '</div>'; 
                            $output .= '</div>'; 
                        $output .= '</div>';
                        $output .=' <div class="col-md-10 col-sm-9 col-xs-12 no-padding-left">';
                            $output .= '<div class="tab-content">';
                                foreach ( $hongo_global_tabs as $key => $tab ) {
                                    $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                                    $title = ( array_key_exists('title', $tab['atts']) ) ?  $tab['atts']['title'] : '';
                                    $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="hongo-'.$tabuniqtab.'-'.$key.'">';
                                        $output .= '<div class="inner-match-height">';
                                            $output .=  do_shortcode( $tab['content'] );
                                        $output .=  '</div>';
                                    $output .=  '</div>'; 
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>'; 
                $output .= '</div>';
            break;

            case 'tab-style3':

                $hongo_tabs_style3 = ( $hongo_tabs_style3 ) ? $hongo_tabs_style3 : 0;
                $hongo_tabs_style3 = $hongo_tabs_style3 + 1;
                // Title Active Color
                if ( $hongo_title_active_color ) {
                    $hongo_featured_array[] = '.tab-style-3-'.$hongo_tabs_style3.' .nav-tabs li.active { border-bottom-color: '.$hongo_title_active_color.' }';
                    $hongo_featured_array[] = '.tab-style-3-'.$hongo_tabs_style3.' .nav-tabs li.active a span i,.tab-style-3-'.$hongo_tabs_style3.' .nav-tabs li.active a span{ color: '.$hongo_title_active_color.' }';
                }
                //Icon Color 
                if ( $hongo_title_color ) {
                    if ( empty($hongo_title_active_color) ) {
                       $hongo_featured_array[] = '.tab-style-3-'.$hongo_tabs_style3.' .nav-tabs li.active{ border-bottom-color : '.$hongo_title_color.' }';
                    }
                    $hongo_featured_array[] = '.tab-style-3-'.$hongo_tabs_style3.' .nav-tabs li a i { color: '.$hongo_title_color.' }';
                }

                $output .= '<div '.$id.' class="'.esc_attr( $hongo_main_class_list ).' tab-style-3-'.$hongo_tabs_style3.'">';
                    $output .= '<div class="row">';
                        $output .= '<div class="col-md-12 col-sm-12">';
                            $output .= '<ul class="nav nav-tabs'.esc_attr( $tabs_alignment ).'">';
                                foreach( $hongo_global_tabs as $key => $tab ) {
                                    $title = ( array_key_exists('title', $tab['atts']) ) ?  $tab['atts']['title'] : '';
                                    $tab_icon  =  ( isset($tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';
                                    $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                                    $output .= '<li '.$active.'>';
                                        $output .= '<a href="#hongo-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="tab-title'.$hongo_font_title_class.'">';
                                            if( ( isset($tab['atts']['custom_tab_icon'] ) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                                              $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="' . esc_html__( 'Icon', 'hongo-addons' ) . '" class="tab-icon-image" class="margin-10px-bottom display-block"/></span>';
                                            } elseif( $tab_icon ) {
                                              $output .= '<span><i class="'.$tab_icon.$hongo_icon_size.'"></i></span>';
                                            }
                                            if( ( $title ) && ( isset( $tab['atts']['show_title'] ) == 1)):
                                              $output .= '<span class="alt-font">' . esc_html( $title ) . '</span>';
                                            endif;
                                        $output .= '</a>';
                                    $output .= '</li>';
                                }
                            $output .= '</ul>';
                            $output .= '<div class="tab-content">';
                                foreach ( $hongo_global_tabs as $key => $tab ) {
                                    $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                                    $title = ( array_key_exists('title', $tab['atts']) ) ?  $tab['atts']['title'] : '';
                                    $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="hongo-'.$tabuniqtab.'-'.$key.'">';
                                        $output .=  do_shortcode( $tab['content'] );
                                    $output .=  '</div>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'tab-style1':
            default:

                $hongo_tabs_style1 = ( $hongo_tabs_style1 ) ? $hongo_tabs_style1 : 0;
                $hongo_tabs_style1 = $hongo_tabs_style1 + 1;
                // Background color
                if ( $hongo_title_bg_color ) {
                    $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li a { background: '.$hongo_title_bg_color.' }';
                }
                // Active background color
                if ( $hongo_title_active_bg_color ) {
                    $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li.active a { background: '.$hongo_title_active_bg_color.' }';
                }
                // Active background color
                if ( $hongo_title_active_color ) {
                    $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li.active a span ,.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li.active a i { color: '.$hongo_title_active_color.' }';
                }
                // Border color
                if ( $hongo_border_color ) {
                    $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li { border-color: '.$hongo_border_color.' }';
                    $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .tab-content { border-top-color: '.$hongo_border_color.' }';
                }
                // Icon color 
                if ( $hongo_title_color ) {
                    if ( empty($hongo_title_active_color) ) {
                       $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li.active a i{ color : '.$hongo_title_color.' }';
                    }
                    $hongo_featured_array[] = '.tab-style-1-'.$hongo_tabs_style1.' .nav-tabs li a i { color: '.$hongo_title_color.' }';
                }

                $output .= '<div '.$id.' class="'.esc_attr( $hongo_main_class_list ).' tab-style-1-'.$hongo_tabs_style1.'">';
                    $output .= '<div class="row">';
                        $output .= '<div class="col-md-12 col-sm-12">';
                            $output .= '<ul class="nav nav-tabs'.esc_attr( $tabs_alignment ).'">';
                                foreach( $hongo_global_tabs as $key => $tab ) {
                                    $title = ( array_key_exists('title', $tab['atts']) ) ?  $tab['atts']['title'] : '';
                                    $tab_icon   = ( isset( $tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';
                                    $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                                    $output .= '<li '.$active.'>';
                                        $output .= '<a href="#hongo-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="tab-title'.$hongo_font_title_class.'">';
                                            if( $tab_icon ) {
                                                $output .= '<span><i class="'.esc_attr( $tab_icon ).esc_attr( $hongo_icon_size ).'"></i></span>';
                                            }
                                            elseif( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                                                $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="' . esc_html__( 'Icon', 'hongo-addons' ) . '" /></span>';
                                            }
                                            if( $title && ( isset($tab['atts']['show_title'] ) == 1 ) ){
                                              $output .= '<span class="alt-font">' . esc_html( $title ) . '</span>';
                                            }
                                        $output .= '</a>';
                                    $output .= '</li>';
                                }
                            $output .= '</ul>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div class="tab-content">';
                        foreach ( $hongo_global_tabs as $key => $tab ) {
                            $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                            $title = ( array_key_exists('title', $tab['atts'] ) ) ?  $tab['atts']['title'] : '';
                            $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="hongo-'.$tabuniqtab.'-'.$key.'">';
                                $output .=  do_shortcode( $tab['content'] );
                            $output .=  '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;
        }

        // Remove animation
        remove_filter( 'hongo_product_archive_animation', 'hongo_addons_product_archive_animation' );

        return $output;
    }
}
add_shortcode( 'vc_tabs', 'hongo_tabs' );

if ( ! function_exists( 'hongo_tab' ) ) {
    function hongo_tab( $atts, $content = null) {

        global $hongo_global_tabs;

        $hongo_global_tabs[]  = array( 'atts' => $atts, 'content' => $content );
        
        return;
    }
}
add_shortcode( 'vc_tab', 'hongo_tab' );