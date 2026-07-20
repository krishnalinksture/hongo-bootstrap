<?php
/**
 * Smart Section For Newsletter Popup
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Newsletter Popup*/
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_newsletter_popup_shortcode' ) ) {
    function hongo_newsletter_popup_shortcode( $atts, $content = null ) {
       global $hongo_featured_array, $hongo_newsletter_unique_id; 
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_newsletter_id'=>'',

            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

            'hongo_newsletter_popup_style' => '',
            'hongo_lable' => '',
            'hongo_shortcode_id' => '',
            'hongo_button_bgcolor' => '',
            'hongo_button_hover_bgcolor' => '',
            'hongo_button_text_color' => '',
            'hongo_button_text_hover_color' => '',

            'hongo_font_lable_setting' => '',
            'hongo_enable_alternate_font_lable' => '1',
        ), $atts ) );
        $output = '';

        $classes = array();

        $id     = ( $id ) ? ' id="'.$id.'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        $hongo_newsletter_popup_style = ( $hongo_newsletter_popup_style ) ? $hongo_newsletter_popup_style : '';
        $hongo_lable            = ! empty( $hongo_lable ) ? str_replace( '||', '<br />', $hongo_lable ) : '';
        $hongo_shortcode_id     = ( $hongo_shortcode_id ) ? $hongo_shortcode_id : '';

        // Responsive typography
        $font_setting_class_lable    = ! empty( $hongo_font_lable_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_lable_setting ) : '';
        $font_setting_class_lable    .= ( $hongo_enable_alternate_font_lable == 1 ) ? ' alt-font' : '';

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box 
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Unique style class 
        $classes[] = ( $hongo_newsletter_popup_style ) ? $hongo_newsletter_popup_style : '';

        // Check if slider id and class
        $hongo_newsletter_unique_id = ! empty( $hongo_newsletter_unique_id ) ? $hongo_newsletter_unique_id : 1;
        $navigation_unique_id = $hongo_newsletter_unique_id;
        $hongo_newsletter_id = ( $hongo_newsletter_id ) ? $hongo_newsletter_id : $hongo_newsletter_popup_style;
        $hongo_newsletter_id.= '-' . $hongo_newsletter_unique_id;
        $hongo_newsletter_unique_id++;
        $classes[] = $hongo_newsletter_id;

        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';

        switch ( $hongo_newsletter_popup_style ) {
            case 'hongo-popup-newsletter-1':

               if( ! empty( $hongo_button_bgcolor ) ) {
                    $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn { background-color:'.$hongo_button_bgcolor.'; }';
               } 
               if( ! empty( $hongo_button_hover_bgcolor ) ) {
                    $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn:hover { background-color:'.$hongo_button_hover_bgcolor.'; }';
               }

                if( ! empty ( $hongo_button_text_color ) ) {
                    $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn { color:'.$hongo_button_text_color.'; }';
               }

                if( ! empty ( $hongo_button_text_hover_color ) ) {
                    $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn:hover { color:'.$hongo_button_text_hover_color.'; }';
               }

                if ( $hongo_lable || $hongo_shortcode_id ) { 
                    $output .= '<div'.$id.' class="hongo-promo-popup-newsletter '.$class_list.'">';
                    if( ! empty( $hongo_shortcode_id ) ) {
                        $hongo_shortcode_id = hongo_get_strip_shortcode( $hongo_shortcode_id );
                        $output .= do_shortcode( $hongo_shortcode_id );
                     }    
                      $output .= '<label class="hongo-show-popup'.$font_setting_class_lable.'">';
                         $output .= '<input type="checkbox" class="hongo-promo-show-popup" id="hongo-promo-show-popup">'.$hongo_lable; 
                      $output .= '</label>';
                    $output .= '</div>';
                }
                break;
        }
        return $output;
    }
}
add_shortcode('hongo_newsletter_popup','hongo_newsletter_popup_shortcode');