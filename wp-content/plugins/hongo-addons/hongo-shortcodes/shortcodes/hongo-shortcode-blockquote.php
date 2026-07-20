<?php
/**
 * Shortcode For Blockquote
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blockquote */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists('hongo_blockquote_shortcode') ) {

    function hongo_blockquote_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_blockquote1, $hongo_blockquote2, $hongo_blockquote3;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            
            'hongo_blockquote_style' => '',
            'hongo_blockquote_author' => '',
            'additional_font_author' => '0',
            'additional_font_content' => '1 ',

            'hongo_enable_icon' => '1',
            'custom_icon' => '0',
            'custom_icon_image' => '',
            'custom_icon_max_width' => '',
            'hongo_icon_list' => 'fa-solid fa-quote-left',
            'hongo_icon_size' => 'icon-extra-medium',
            'hongo_icon_color' =>'',
            'hongo_separator_width' => '',
            'hongo_separator_color' => '',

            'hongo_font_auther_setting' =>'',
            'hongo_font_content_setting' =>'',
        ), $atts ) );
        
        $output = $hongo_separator_attr = '';
        $classes = array();

        // Custom class and id 
        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
        $classes[] = $hongo_blockquote_style;

        // For icon
        $hongo_icon_color = ( $hongo_icon_color ) ? $hongo_icon_color : '';
        $hongo_icon_list = ( $hongo_icon_list ) ? $hongo_icon_list : '';
        $hongo_enable_icon = ( $hongo_enable_icon ) ? $hongo_enable_icon : '';

        // Responsive typography & alt font
        $hongo_font_auther_class = ( $hongo_font_auther_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_auther_setting ) : '';
        $hongo_font_auther_class .= ( $additional_font_author == 1 ) ? ' alt-font' : '';
        $hongo_font_content_class = ( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
        $hongo_font_content_class .= ( $additional_font_content == 1 ) ? ' alt-font' : '';

        // Class list
        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';

        switch ( $hongo_blockquote_style ) {

            case 'blockquote-style-1':
                
                $hongo_blockquote1 = ( $hongo_blockquote1 ) ? $hongo_blockquote1 : 0;
                $hongo_blockquote1 = $hongo_blockquote1 + 1;

                // Border color 
                if ( ! empty( $hongo_separator_color ) ) {
                    $hongo_featured_array[] = '.hongo-blockquote-1-'.$hongo_blockquote1.' { border-left-color: '.$hongo_separator_color.' }';
                }
                // Border width 
                if ( ! empty( $hongo_separator_width ) ) {
                    $hongo_featured_array[] = '.hongo-blockquote-1-'.$hongo_blockquote1.' { border-left-width: '.$hongo_separator_width.' }';
                }

                if ( $content || $hongo_blockquote_author ) {

                    $output.='<blockquote'.$id.' class="'. esc_attr( $class_list ) .' hongo-blockquote-1-'. esc_attr( $hongo_blockquote1 ) .'">';

                        if ( $content ) {
                            $output .= '<div class="blockquote-content'. esc_attr( $hongo_font_content_class ) .'">' . hongo_remove_wpautop( $content ) . '</div>';
                        }

                        if ( $hongo_blockquote_author ) {
                            $output .= '<footer class="author'. esc_attr( $hongo_font_auther_class ) .'">'.$hongo_blockquote_author.'</footer>';
                        }
                        
                    $output.='</blockquote>';
                }

            break;

            case 'blockquote-style-2':

                $hongo_blockquote2 = ( $hongo_blockquote2 ) ? $hongo_blockquote2 : 0;
                $hongo_blockquote2 = $hongo_blockquote2 + 1;

                // Icon Size 
                $hongo_icon_size = ( $hongo_icon_size ) ? $hongo_icon_size : 'icon-extra-medium';

                // Icon Color 
                if ( $hongo_icon_color ) {
                    $hongo_featured_array[] = '.hongo-blockquote-2-'.$hongo_blockquote2.' i { color: '.$hongo_icon_color.' }';
                }

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-blockquote-2-'.$hongo_blockquote2.' .icon-set img { max-width: '.$custom_icon_max_width.' }';
                }

                if ( $content || $hongo_blockquote_author || $hongo_icon_list || $custom_icon_image ) {

                    $output.='<div'.$id.' class="'. esc_attr( $class_list ) .' hongo-blockquote-2-'. esc_attr( $hongo_blockquote2 ) .'">';

                        if ( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {

                            $output .= '<div class="icon-set">';
                                $output .= hongo_get_image_html( $custom_icon_image );
                            $output .= '</div>';

                        } elseif ( $hongo_icon_list &&  $hongo_enable_icon == 1 ) {

                            $output .= '<i class="'. esc_attr( $hongo_icon_list ) .' '.$hongo_icon_size.'"></i>';
                        }

                        if ( $content ) {
                            
                            $output .= '<div class="blockquote-content last-paragraph-no-margin'. esc_attr( $hongo_font_content_class ) .'">' . hongo_remove_wpautop( $content ) . '</div>';
                        }

                        if ( $hongo_blockquote_author ) {

                            $output .= '<div class="author'. esc_attr( $hongo_font_auther_class ) .'">'. esc_attr( $hongo_blockquote_author ) .'</div>';
                        }

                    $output.='</div>';
                }

            break;

            case 'blockquote-style-3':

                $hongo_blockquote3 = ( $hongo_blockquote3 ) ? $hongo_blockquote3 : 0;
                $hongo_blockquote3 = $hongo_blockquote3 + 1;

                // Icon Size 
                $hongo_icon_size = ( $hongo_icon_size ) ? $hongo_icon_size : 'icon-extra-medium';

                // Icon Color 
                if ( $hongo_icon_color ) {
                    $hongo_featured_array[] = '.hongo-blockquote-3-'.$hongo_blockquote3.' i { color: '.$hongo_icon_color.' }';
                }

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) ) {
                    $hongo_featured_array[] = '.hongo-blockquote-3-'.$hongo_blockquote3.' .icon-set img { max-width: '.$custom_icon_max_width.' }';
                }

                if ( $content || $hongo_blockquote_author || $hongo_icon_list || $custom_icon_image ) {

                    $output.='<div'.$id.' class="'. esc_attr( $class_list ) .' hongo-blockquote-3-'. esc_attr( $hongo_blockquote3 ) .'">';

                        if ( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {

                            $output .= '<div class="icon-set">';
                                $output .= hongo_get_image_html( $custom_icon_image );
                            $output .= '</div>';

                        } elseif ( $hongo_icon_list &&  $hongo_enable_icon == 1 ) {

                            $output .= '<i class="base-color '.$hongo_icon_list.' '.$hongo_icon_size.'"></i>';
                        }

                        if ( $content || $hongo_blockquote_author ) {
                            $output .= '<div class="blockquote-content last-paragraph-no-margin'. esc_attr( $hongo_font_content_class ) .'">';
                                if ( $content ) {

                                    $output .= hongo_remove_wpautop( $content );
                                }
                                if ( $hongo_blockquote_author ) {

                                   $output .= '<div class="author'. esc_attr( $hongo_font_auther_class ) .'">'.$hongo_blockquote_author.'</div>';
                                }
                            $output .= '</div>';
                        }

                    $output.='</div>';
                }

            break;

        }

        return $output;
    }
}
add_shortcode( 'hongo_blockquote', 'hongo_blockquote_shortcode' );