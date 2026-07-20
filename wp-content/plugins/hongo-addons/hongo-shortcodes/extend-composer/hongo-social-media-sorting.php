<?php
/**
 * Hongo Custom Social Media Sorting For VC.
 *
 * @package Hongo
 */
?>
<?php

if ( function_exists( 'vc_add_shortcode_param' ) ) {
    
    vc_add_shortcode_param( 'hongo_custom_social_sorting', 'hongo_custom_social_sorting_settings_field', HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/custom.js' );
}

if ( ! function_exists( 'hongo_custom_social_sorting_settings_field' ) ) {
    function hongo_custom_social_sorting_settings_field( $settings, $value ) {

        $output = '';
        if ( ! empty( $settings['value'] ) ) {

            $multi_values = ! empty( $value ) && !is_array( $value ) ? explode( ',', $value ) : $settings['value'];

            // Get all social icons
            $social_icons = hongo_get_social_icons();

            $output .= '<ul class="hongo-social-icon-sorting">';
                foreach ( $multi_values as $key ) {
                    if ( ! empty( $social_icons[$key] ) ) {
                        if ( $social_icons[$key] == 'rss' || $social_icons[$key] == 'envelope' ) {
                            $icon_class = 'fa-solid fa-'.$social_icons[$key];
                        } else {
                            $icon_class = 'fa-brands fa-'.$social_icons[$key];
                        }
                        $title = ! empty( $settings['value'] ) && ! empty( $settings['value'][$key] ) ? esc_attr( $settings['value'][$key] ) : '';
                        $output .= '<li data-key="'.esc_attr( $key ).'"><span title="'.esc_attr( $title ).'"><i class="'.esc_attr( $icon_class ).'"></i></span></li>';
                    }
                }
            $output .= '</ul>';
            $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hongo-social-icon-sorting-list wpb-textinput ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( implode( ',', $multi_values ) ) . '" />';
        }

        return $output;
    }
}