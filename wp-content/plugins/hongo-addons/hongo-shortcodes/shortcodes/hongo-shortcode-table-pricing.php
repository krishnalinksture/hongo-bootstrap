<?php
/**
 * Shortcode For Pricing Table
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Pricing Table */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_pricing_table_shortcode' ) ) {
    function hongo_pricing_table_shortcode( $atts, $content = null ) {

        global $hongo_featured_array,$hongo_pricing1;

        extract(
            shortcode_atts( 
                array(
                    'id' => '',
                    'class' => '',
                    'hongo_pricing_style' => '',
                    'custom_icon' => '',
                    'custom_icon_image' => '',
                    'custom_icon_max_width' => '',
                    'pricing_table_icon' => '',
                    'sale_type' => '',
                    'price' => '',
                    'per_price' => '',
                    'hongo_button_config' => '',

                    'hongo_button_enable_icon' => '0',
                    'hongo_button_custom_icon' => '',
                    'hongo_button_icon_type' => '',
                    'hongo_button_custom_icon_image' => '',
                    'hongo_button_custom_icon_max_width' => '',
                    'hongo_button_icon_position' => '',
                    'hongo_button_icon' => '',

                    'hongo_box_background_color' => '',
                    'hongo_title_background_color' => '',
                    'hongo_features_border_color' => '',
                    'hongo_pricing_table_icon_size' => '',
                    'hongo_icon_color' => '',

                    'hongo_button_style' => '',
                    'hongo_button_type' => '',
                    'hongo_button_setting' => '',

                    'hongo_font_title_setting' => '',
                    'hongo_font_price_setting' => '',
                    'hongo_font_duraction_setting' => '',
                    'hongo_font_content_setting' => '',
                ), $atts
            )
        );

        $output = $hongo_button_style_class = $hongo_button_class = '';

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        $class_list = ! empty( $classes ) ? ' ' . implode( ' ', $classes) : '';

        $sale_type = ! empty( $sale_type ) ? str_replace( '||', '<br />', $sale_type ) : '';
        $price = ! empty( $price ) ? $price : '';
        $per_price = ! empty( $per_price ) ? str_replace( '||', '<br />', $per_price ) : '';

        $pricing_table_icon = ( $pricing_table_icon ) ? $classes_icon[] = $pricing_table_icon : '';
        $classes_icon[] = ! empty( $hongo_pricing_table_icon_size ) ? $hongo_pricing_table_icon_size : 'icon-medium';
        $hongo_icon_type = ! empty( $hongo_icon_type ) ? $classes_icon[] = $hongo_icon_type : '';

        $classes_icon_list = ! empty( $classes_icon ) ? implode( " ", $classes_icon ) : '';

        if( ( $custom_icon == 1 && ! empty( $custom_icon_image ) ) || ! empty( $classes_icon_list ) ) {
            if( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {
                $icon = hongo_get_image_html( $custom_icon_image );
            } else {
                $icon = '<i class="'.$classes_icon_list.'" aria-hidden="true"></i>';
            }
        }

        // Button Style
        $hongo_button_parse_args = ! empty( $hongo_button_config ) ? vc_parse_multi_attribute( $hongo_button_config ) : array();
        $hongo_button_link     = ( isset($hongo_button_parse_args['url']) ) ? $hongo_button_parse_args['url'] : '#';
        $hongo_button_title    = ( isset($hongo_button_parse_args['title']) ) ? $hongo_button_parse_args['title'] : '';
        $hongo_button_target   = ( isset($hongo_button_parse_args['target']) ) ? trim($hongo_button_parse_args['target']) : '_self';
        $hongo_button_target   = ! empty( $hongo_button_target ) ? ' target="' . $hongo_button_target . '"' : '';

        // Button icon or custom image
        $hongo_button_icon_type    = ! empty( $hongo_button_icon_type ) ? ' ' . $hongo_button_icon_type : '';
        if ( $hongo_button_enable_icon == 1 && (  $hongo_button_icon || ! empty( $hongo_button_custom_icon_image ) ) ) {
            $icon_title_gap = ( $hongo_button_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            if ( $hongo_button_custom_icon == 1 && ! empty( $hongo_button_custom_icon_image ) ) {

                $button_icon = hongo_get_image_html( $hongo_button_custom_icon_image, 'full', $icon_title_gap );

            } else {
                
                $button_icon = '<i class="'.$hongo_button_icon.$hongo_button_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';
            }

            // Icon position
            if( $hongo_button_icon_position == 'right' ) {
                $hongo_button_title = $hongo_button_title . $button_icon;
            } else {
                $hongo_button_title = $button_icon . $hongo_button_title;
            }
        }

        // Responsive typography
        $button_setting_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
        $hongo_font_title_class     = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $hongo_font_price_class   = ! empty( $hongo_font_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_price_setting ) : '';
        $hongo_font_duraction_class = ! empty( $hongo_font_duraction_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_duraction_setting ) : '';          
        $hongo_font_content_class   = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

        // For button style
        if( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }

        // For button type
        if( ! empty( $hongo_button_type ) ) {

            switch( $hongo_button_type ) {

                case 'extra-large':
                    $hongo_button_class = ' btn-extra-large';
                break;
                case 'large':
                    $hongo_button_class = ' btn-large';
                break;
                case 'medium':
                    $hongo_button_class = ' btn-medium';
                break;
                case 'small':
                    $hongo_button_class = ' btn-small';
                break;
                case 'vsmall':
                    $hongo_button_class = ' btn-very-small';
                break;
            }
        }

        $hongo_pricing1 = ! empty( $hongo_pricing1 ) ? $hongo_pricing1 : 0;
        $hongo_pricing1 = $hongo_pricing1 + 1;

        // Icon Width
        if( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
            $hongo_featured_array[] = '.pricing-1-'.$hongo_pricing1.' .pricing-icon img { max-width:'.$custom_icon_max_width.'; }';  
        }

        // Icon color 
        if( ! empty( $hongo_icon_color ) ){
            $hongo_featured_array[] = '.pricing-style-1.pricing-1-'.$hongo_pricing1.' i { color:'.$hongo_icon_color.';  }';    
        }
        // Box background color
        if( ! empty( $hongo_box_background_color ) ){
            $hongo_featured_array[] = '.pricing-1-'.$hongo_pricing1.' { background-color:'.$hongo_box_background_color.'; }';    
        }

        // Title background color
        if( ! empty( $hongo_title_background_color ) ){
            $hongo_featured_array[] = '.pricing-1-'.$hongo_pricing1.' .pricing-title { background-color:'.$hongo_title_background_color.'; }';    
        }
        
        // Featured Border color
        if( ! empty( $hongo_features_border_color ) ){
            $hongo_featured_array[] = '.pricing-1-'.$hongo_pricing1.' .pricing-features ul li { border-color:'.$hongo_features_border_color.'; }';
        }
        
        // Custom Button Icon Max Width
        if( ! empty( $hongo_button_custom_icon_max_width ) && $hongo_button_custom_icon == 1 ) {
            $hongo_featured_array[] = '.pricing-1-'.$hongo_pricing1.' .pricing-action a img { max-width: '.$hongo_button_custom_icon_max_width.' }';
        }

        if( ! empty( $icon ) || ! empty( $price ) || ! empty( $per_price ) || ! empty( $sale_type ) || ! empty( $content ) || ! empty( $hongo_button_title ) ) {

            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-transparent-black alt-font';
            $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';
            
            $output .='<div '.$id.' class="pricing-style-1 pricing-1-'.esc_attr( $hongo_pricing1 ).esc_attr( $class_list ).'">';
                $output .='<div class="pricing-table-layout">';
                    if ( ! empty( $icon ) ) {
                        $output .='<div class="pricing-icon">'.$icon.'</div>';
                    }
                    $output .='<div class="pricing-price-box">';
                        if ( ! empty( $price ) ) {
                            $output .= '<h4 class="base-color pricing-price alt-font'.esc_attr( $hongo_font_price_class ).'">'.$price.'</h4>';
                        }
                        if ( ! empty( $per_price ) ) {
                            $output .= '<div class="pricing-month'.esc_attr( $hongo_font_duraction_class ).'">'.$per_price.'</div>';
                        }
                        if ( ! empty( $sale_type ) ) {
                            $output .= '<span class="pricing-title alt-font'.esc_attr( $hongo_font_title_class ).'">'.$sale_type.'</span>';
                        }
                    $output .='</div>';
                $output .='</div>';
                $output .='<div class="pricing-features">';
                    if( ! empty( $content ) ) {
                        $output .= '<div class="features-list last-paragraph-no-margin'.esc_attr( $hongo_font_content_class ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                    }
                    if( ! empty( $hongo_button_title ) ) {
                        $output .= '<div class="pricing-action">';
                            $output .= '<a href="'.esc_url( $hongo_button_link ).'" class="'.trim( $button_setting_class ).'"'.$hongo_button_target.'>'.$hongo_button_title.'</a>';
                        $output .= '</div>';
                    }
                $output .=' </div>';
            $output .='</div>';
        }

        return $output;
    }
}
add_shortcode( 'hongo_pricing_table', 'hongo_pricing_table_shortcode' );