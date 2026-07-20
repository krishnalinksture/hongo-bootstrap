<?php
/**
 * Shortcode For Feature Product Box
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Feature Product Box */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_section_feature_product_box_shortcode' ) ) {
    function hongo_section_feature_product_box_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $section_product_featurebox;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '', 

            'hongo_section_product_feature_type' => '',
            
        	'hongo_feature_title' => '',
            'hongo_featurebox_image' => '',

            'hongo_title_link' => '',
            'hongo_link_url' => '',
            'hongo_link_target' => '',
            'hongo_feature_content' => '',
            'hongo_button_config' => '',

            'hongo_box_bg_color' => '',
            'hongo_box_hover_bg_color' => '',
            'hongo_box_hover_border_color' => '',
            'hongo_title_hover_color' => '',
            'hongo_title_hover_bg_color' => '',

            'hongo_font_title_setting' => '',
            'hongo_enable_alternate_font_title' => '1',
            'hongo_font_content_setting' => '',
            'hongo_button_enable_icon' => '',
            'hongo_button_icon_type' => '',
            'hongo_button_icon_position' => '',
            'hongo_button_icon' => '',
            'hongo_button_style' => '',
            'hongo_button_type' => '',
            'hongo_button_setting' => '',

            'hongo_icon_list' => '',
            'hongo_icon_size' => '',
            'hongo_icon_color' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'custom_icon_max_width' => '',
            
        ), $atts));

        $output = $hongo_icon_output = $hongo_button_style_class = $hongo_button_type_class = '';

        $classes = array();

        // For button style
        if ( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }

        // Button configuration
        $hongo_button_parse_args = ! empty( $hongo_button_config ) ? vc_parse_multi_attribute( $hongo_button_config ) : array();
        $hongo_button_link     = isset( $hongo_button_parse_args['url'] ) ? $hongo_button_parse_args['url'] : '#';
        $hongo_button_title    = isset( $hongo_button_parse_args['title'] ) ? $hongo_button_parse_args['title'] : '';
        $hongo_button_target   = isset( $hongo_button_parse_args['target'] ) ? trim( $hongo_button_parse_args['target'] ) : '_self';

        $hongo_button_icon_type    = ! empty( $hongo_button_icon_type ) ? ' ' . $hongo_button_icon_type : '';

        // Button Icon
        if ( ! empty( $hongo_button_icon ) && $hongo_button_enable_icon == '1' ) {
            $icon_title_gap = ( $hongo_button_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            if ( $hongo_button_icon ) {
                $button_icon = '<i class="'.$hongo_button_icon.$hongo_button_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';
            }

            // Icon Position
            if ( $hongo_button_icon_position == 'right' ) {
                $hongo_button_title = $hongo_button_title . $button_icon;
            } else {
                $hongo_button_title = $button_icon . $hongo_button_title;
            }
        }

        // Icon Size
        $hongo_icon_size     = ( $hongo_icon_size ) ? ' '.$hongo_icon_size : ' icon-medium';

        // Icon output 
        if ( $hongo_icon_list || ( $custom_icon == '1' && $custom_icon_image ) ) {

            $hongo_icon_output.= '<div class="hongo-featurebox-img">';
                if ( $hongo_icon_list ) {

                    $hongo_icon_output.= '<i class="'.$hongo_icon_list.$hongo_icon_size.' base-color"></i>';

                } elseif ( $custom_icon == '1' && $custom_icon_image ) {
                    
                    $hongo_icon_output .= hongo_get_image_html( $custom_icon_image );
                }
            $hongo_icon_output.= '</div>';
        }

        // Responsive typography & alt font
        $button_setting_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
        $font_setting_class_title = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        ( $hongo_enable_alternate_font_title == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
        $font_setting_class_content = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

        $id     = ( $id ) ? ' id="'.$id.'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        $classes[] = $hongo_section_product_feature_type;

        $section_product_featurebox = ! empty( $section_product_featurebox ) ? $section_product_featurebox : 0;
        $section_product_featurebox = $section_product_featurebox + 1;

        $classes[] = 'product_section_featurebox-'.$section_product_featurebox;

        // Classes and style attribute
        $class_list = ! empty( $classes ) ? ' ' . implode( " ", $classes ) : '';

        // Image Configuraion
        $hongo_featurebox_image = ( $hongo_featurebox_image ) ? $hongo_featurebox_image : '';
        
        // Title link & target
        $hongo_link_url      = ( $hongo_link_url ) ? $hongo_link_url : '';
        $hongo_link_target   = ( $hongo_link_target ) ? ' target="'.$hongo_link_target.'"' : '';        

        // Feature product box title 
        $hongo_feature_title        = ! empty( $hongo_feature_title ) ? str_replace( '||', '<br />', $hongo_feature_title ) : '';

        switch ( $hongo_section_product_feature_type ) {

            case 'hongo-section-product-featurebox-1':

                // Box Background color
                if( ! empty( $hongo_box_bg_color ) ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.' { background-color : '.$hongo_box_bg_color.'; }';
                }

                // Box Background hover color
                if( ! empty( $hongo_box_hover_bg_color ) ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.':hover { background-color : '.$hongo_box_hover_bg_color.'; }';
                }

                // Box hover border color
                if( ! empty ( $hongo_box_hover_border_color ) ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.':hover { border-color : '.$hongo_box_hover_border_color.'; }';
                }

                // Title hover text color
                if( ! empty( $hongo_title_hover_color ) ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.':hover span { color : '.$hongo_title_hover_color.'; }';
                }                 

                // Title hover bg color
                if( ! empty( $hongo_title_hover_bg_color ) ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.':hover span { background-color : '.$hongo_title_hover_bg_color.'; }';
                }

    			if ( $hongo_featurebox_image || $hongo_feature_title ) {

                    $output.='<div'.$id.' class="hongo-section-product-featurebox'.$class_list.'">';

                        if( ( $hongo_title_link == 1 ) && ! empty( $hongo_link_url ) ) {
                            $output .= '<a href="'.esc_url( $hongo_link_url ).'" '.$hongo_link_target.'>';
                        }
                            
                            // Image
                            if ( $hongo_featurebox_image ) {
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, 'full' );
                            }
                            // Title
                            if( $hongo_feature_title ) {
                                $output .= '<span class="hongo-section-featurebox-title'.$font_setting_class_title.'">'.$hongo_feature_title.'</span>';
                            }
                        
                        if( ( $hongo_title_link == 1 ) && ! empty( $hongo_link_url ) ) {                            
                            $output .= '</a>';
                        }

                    $output.='</div>';
                }
            break;

            case 'hongo-section-product-featurebox-2':

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.product_section_featurebox-'.$section_product_featurebox.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title ) {

                    $output .= '<div'.$id.' class="hongo-section-product-featurebox'.$class_list.'">';

                        $output .= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {

                                $output.='<div class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if( ( $hongo_title_link == 1 ) && ! empty( $hongo_link_url ) ) {
                                        $output .= '<a class="hongo-featurebox-link'.$font_setting_class_title.'" href="'.esc_url( $hongo_link_url ).'" '.$hongo_link_target.'>';
                                    }

                                        $output.= $hongo_feature_title;

                                    if( ( $hongo_title_link == 1 ) && ! empty( $hongo_link_url ) ) {
                                        $output .= '</a>';
                                    }
                                $output.='</div>';
                            }

                            if ( ! empty( $hongo_feature_content ) ) {

                                $output.='<div class="content alt-font'.$font_setting_class_content.'">';
                                    $output.= $hongo_feature_content;
                                $output.='</div>';
                            }

                            if ( $hongo_button_title ) {

                                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-link alt-font';
                                $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  ' btn-medium';

                                $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                                    $output .= $hongo_button_title;

                               $output .= '</a>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;
        }

        return $output;
    }
}
add_shortcode( 'hongo_sfeature_box', 'hongo_section_feature_product_box_shortcode' );