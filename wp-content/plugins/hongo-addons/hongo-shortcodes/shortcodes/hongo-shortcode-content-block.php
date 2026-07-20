<?php
/**
 * Shortcode For Content Block 
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Content Block  */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_content_block_shortcode' ) ) {
    function hongo_content_block_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_content_block;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',

            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

            'hongo_block_premade_style' => '',
            'title_heading_tag' => '',
            'hongo_image_srcset' => 'full',
            'hongo_show_separator' => '1',
            'hongo_logo' => '',
            'hongo_logo_srcset' => 'full',
            'hongo_block_title' => '',
            'hongo_offer_text' => '',
            'hongo_image' => '',

            'hongo_separator_color' => '',
            'hongo_separator_thickness' => '',
            'hongo_offertext_border_color' => '',
            'hongo_content_bg_color' => '',

            'hongo_enable_box_link' => '',
            'hongo_box_link_url' => '',
            'hongo_box_link_target' => '',

            'hongo_font_title_setting' => '',
            'additional_font_title' => '1',
            'hongo_font_offer_text_setting' => '',
            'additional_font_offer_text' => '1',
            'hongo_font_content_setting' => '',

        ), $atts ) );

        $output = '';
        $classes = array();

        // Custom id and class 
        $id     = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';
        ( $hongo_block_premade_style ) ? $classes[] = $hongo_block_premade_style : '';

        // Image, Logo & Image, Logo scrset
        $hongo_image_srcset = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';

        $hongo_logo_srcset  = ! empty( $hongo_logo_srcset ) ? $hongo_logo_srcset : 'full';

        // Unique Id
        $hongo_content_block = ( $hongo_content_block ) ? $hongo_content_block : 0;
        $hongo_content_block = $hongo_content_block + 1;
        $unique_id = 'block-style-1-' . $hongo_content_block;
        $classes[] = $unique_id;

        // CSS Box 
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Separator
        $hongo_show_separator = ( $hongo_show_separator == '1' ) ? '<div class="hongo-separator"></div>' : '';
        if ( $hongo_separator_color ) {
            $hongo_featured_array[] = '.'.$unique_id. ' .hongo-separator { background-color: '.$hongo_separator_color.'; }';
        }
        if( $hongo_separator_thickness ){
            $hongo_featured_array[] = '.'.$unique_id. ' .hongo-separator { height: '.$hongo_separator_thickness.'; }';
        }

        // Title
        $hongo_block_title  = ! empty( $hongo_block_title ) ? str_replace( '||', '<br />', $hongo_block_title ) : '';

        // Responsive typography & alt font
        $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $font_setting_class_title   .= ( $additional_font_title == 1 ) ? ' alt-font' : '';
        $font_setting_class_offer_text = ! empty( $hongo_font_offer_text_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_offer_text_setting ) : '';
        $font_setting_class_offer_text .= ( $additional_font_offer_text == 1 ) ? ' alt-font' : '';
        $font_setting_class_content  = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

        // Custom Link
        $hongo_box_link_url      = ( $hongo_box_link_url ) ? $hongo_box_link_url : '';
        $hongo_box_link_target   = ( $hongo_box_link_target ) ? ' target="'.$hongo_box_link_target.'"' : '';

        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';

        switch ($hongo_block_premade_style) {

            case 'special-content-block-1':

                // Title heading tag        
                $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'h1';

                // Content box bg color
                if( $hongo_content_bg_color ) {
                    $hongo_featured_array[] = '.'.$unique_id. ' .block-content { background-color: '.$hongo_content_bg_color.'; }';
                }

                if ( ! empty( $hongo_image ) || ! empty( $hongo_block_title ) || ! empty( $content ) ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';

                        if( ! empty( $hongo_image ) ) {
                            $output .= '<div class="block-img">';
                                $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                            $output .= '</div>';
                        }
                        if ( ! empty( $hongo_block_title ) || ! empty( $content ) ) {
                            $output .= '<div class="block-content">';
                                if( ! empty( $hongo_block_title ) ){
                                    $output .= '<'.$title_heading_tag.' class="content-block-title'.esc_attr( $font_setting_class_title ).'">'. $hongo_block_title .'</'.$title_heading_tag.'>';
                                }
                                if( ! empty( $content ) ) {
                                    $output .= '<div class="hongo-content'.esc_attr( $font_setting_class_content ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'special-content-block-2':

                // Title Heading Tag        
                $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'h1';

                // Content box bg color
                if( $hongo_content_bg_color ) {
                    $hongo_featured_array[] = '.'.$unique_id. ' .block-content { background-color: '.$hongo_content_bg_color.'; }';
                }

                // Offer text border color
                if( $hongo_offertext_border_color ){
                    $hongo_featured_array[] = '.'.$unique_id. ' .offer { border-color: '.$hongo_offertext_border_color.'; }';
                }

                if ( ! empty( $hongo_image ) || ! empty( $hongo_block_title ) || ! empty( $hongo_offer_text ) || ! empty( $hongo_logo ) ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';

                        if ( ! empty( $hongo_block_title ) || ! empty( $hongo_logo ) || ! empty( $hongo_offer_text ) ) {
                            $output .= '<div class="block-content">';

                                if( ! empty( $hongo_logo ) ) {
                                    $output .= hongo_get_image_html( $hongo_logo, $hongo_logo_srcset );
                                }

                                $output .= $hongo_show_separator;

                                if( ! empty( $hongo_block_title ) ) {
                                    $output .= '<'.$title_heading_tag.' class="content-block-title'.esc_attr( $font_setting_class_title ).'">'. $hongo_block_title .'</'.$title_heading_tag.'>';
                                }
                                $hongo_offer_text  = ! empty( $hongo_offer_text ) ? str_replace( '||', '<br />', $hongo_offer_text ) : '';
                                if( ! empty( $hongo_offer_text ) ) {  
                                    $output .= '<div class="offer'.esc_attr( $font_setting_class_offer_text ).'">' . $hongo_offer_text . '</div>';
                                }
                            $output .= '</div>';
                        }

                        if( ! empty( $hongo_image ) ) {
                            $output .= '<div class="block-img">';
                                $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'special-content-block-3':

                // Title heading tag        
                $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

                    if ( ! empty( $hongo_image ) || ! empty( $hongo_block_title ) || ! empty( $content ) ) {

                        $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';
                            if ( $hongo_enable_box_link == 1 && ( $hongo_box_link_url ) ) {
                                $output .= '<a'.$hongo_box_link_target.' href="'.esc_url( $hongo_box_link_url ).'">';
                            }

                                if( ! empty( $hongo_image ) ) {
                                    $output .= '<div class="block-img">';
                                        $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                                    $output .= '</div>';
                                }
                                if ( ! empty( $hongo_block_title ) || ! empty( $content ) ) {
                                    if( ! empty( $hongo_block_title ) ) {
                                        $output .= '<'.$title_heading_tag.' class="content-block-title'.esc_attr( $font_setting_class_title ).'">'. $hongo_block_title .'</'.$title_heading_tag.'>';
                                    }
                                }

                            if ( $hongo_enable_box_link == 1 && ( $hongo_box_link_url ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</div>';
                    }
            break;

        }
        return $output;
    }
}
add_shortcode( 'hongo_content_block', 'hongo_content_block_shortcode' );