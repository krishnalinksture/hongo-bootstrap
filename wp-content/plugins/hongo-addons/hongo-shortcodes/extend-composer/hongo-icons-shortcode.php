<?php
/**
 * Hongo Custom Icon (font awesome and et line) List For VC.
 *
 * @package Hongo
 */

if ( function_exists( 'vc_add_shortcode_param' ) ) {
    
    vc_add_shortcode_param( 'hongo_icon', 'hongo_icon_shortcode', HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/custom.js' );
}

if ( ! function_exists( 'hongo_icon_shortcode' ) ) {
    function hongo_icon_shortcode( $settings, $value ) {

        $hongo_et_line_icons      = hongo_et_line_icons();
        $hongo_fontawesome_solid  = hongo_fontawesome_solid();
        $hongo_fontawesome_reg    = hongo_fontawesome_reg();
        $hongo_fontawesome_brand  = hongo_fontawesome_brand();
        $hongo_fontawesome_light  = hongo_fontawesome_light();
        $hongo_fontawesome_duotone= hongo_fontawesome_duotone();
        $hongo_themify_icons      = hongo_themify_icons();
        $hongo_simple_icons       = hongo_simple_icons();

        $hongo_custom_icons  = apply_filters( 'hongo_custom_font_icons', array() );

        $output = '';
        
        /* Search icons */
        $output .= '<div class="vc_col-xs-12 hongo-find-icon-wrap">';
            $output .= "<input type='text' class='search_icon_text' placeholder='".esc_html__( 'Search icon', 'hongo-addons' )."'>";
            $output .= "<button type='button' class='button button-primary search_icon_button'>".esc_html__( 'Find', 'hongo-addons' )."</button>";
            $output .= "<button type='button' class='button clear_search_icon_button'>".esc_html__( 'Clear', 'hongo-addons' )."</button>";
        $output .= '</div>';

        $output .= "<div class='hongo_icon_container_main'>";

            /* ET-Line icons */
            if ( ! empty( $hongo_et_line_icons ) ) {

                foreach ( $hongo_et_line_icons as $ikey => $ivalue ) {

                    $selected_icon = ( $ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Font awesome solid icons */
            if ( ! empty( $hongo_fontawesome_solid ) ) {

                foreach ( $hongo_fontawesome_solid as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fas '.$ivalue == $value || 'fa-solid '.$ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="fas '.esc_attr( $ivalue ).'" data-name="fas '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Font awesome regular icons */
            if ( ! empty( $hongo_fontawesome_reg ) ) {

                foreach ( $hongo_fontawesome_reg as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'far '.$ivalue == $value || 'fa-regular '.$ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="far '.esc_attr( $ivalue ).'" data-name="far '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Font awesome brand icons */
            if ( ! empty( $hongo_fontawesome_brand ) ) {

                foreach ( $hongo_fontawesome_brand as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fab '.$ivalue == $value || 'fa-brands '.$ivalue == $value  ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="fab '.esc_attr( $ivalue ).'" data-name="fab '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Font awesome light icons */
            if ( ! empty( $hongo_fontawesome_light ) ) {

                foreach ( $hongo_fontawesome_light as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fal '.$ivalue == $value || 'fa-light '.$ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="fal '.esc_attr( $ivalue ).'" data-name="fal '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Font awesome duotone icons */
            if ( ! empty( $hongo_fontawesome_duotone ) ) {

                foreach ( $hongo_fontawesome_duotone as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fad '.$ivalue == $value || 'fa-duotone '.$ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="fad '.esc_attr( $ivalue ).'" data-name="fad '.esc_attr( $ivalue ).'"></i></span>';
                }
            }
          
            /* Themify icons */
            if ( ! empty( $hongo_themify_icons ) ) {

                foreach ( $hongo_themify_icons as $ikey => $ivalue ) {
                    
                    $selected_icon = ( $ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Simple icons */
            if ( ! empty( $hongo_simple_icons ) ) {

                foreach ( $hongo_simple_icons as $ikey => $ivalue ) {
                    
                    $selected_icon = ( $ivalue == $value ) ? ' active_icon' : '';
                    $output .= '<span class="hongo_icon_preview'.$selected_icon.'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            /* Custom Icon using filter */
            if( ! empty( $hongo_custom_icons ) ) {
                foreach( $hongo_custom_icons as $hongo_custom_icon ) {
                    foreach( $hongo_custom_icon['fonts'] as $ikey => $ivalue  ) {

                        $selected_icon = ( $ivalue == $value ) ? " active_icon" : '';
                        $output .= '<span class="hongo_icon_preview'.esc_attr( $selected_icon ).'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                    }
                }
            }
    
            $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hongo_icon_field wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

        $output .= '</div>'; 

        return $output;
    }
}