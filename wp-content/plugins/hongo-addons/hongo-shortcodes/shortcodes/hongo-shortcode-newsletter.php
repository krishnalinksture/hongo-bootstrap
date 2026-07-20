<?php
/**
 * Shortcode For Newsletter
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Newsletter */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_newsletter_shortcode' ) ) {
	function hongo_newsletter_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_newsletter_unique_id;

		extract( shortcode_atts( array(
        	'id' => '',
        	'class' => '',
            'hongo_newsletter_id'=>'',

            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

        	'hongo_newsletter_style' => '',
        	'hongo_title' => '',
        	'hongo_subtitle' => '',
            'hongo_shortcode_id'=>'',
            'hongo_button_setting' => '',

            'content_desktop_width' => '',
            'content_desktop_mini_width' => '',
            'content_ipad_width' => '',
            'content_mobile_width' => '',

            'hongo_box_background' => '',
            'hongo_subtitle_bgcolor' => '',
            'hongo_box_bgcolor' => '',
            'hongo_box_text_color' => '',
            'hongo_box_border_color' => '',
            'hongo_button_bgcolor' => '',
            'hongo_button_hover_bgcolor' => '',
            'hongo_button_text_color' => '',
            'hongo_button_text_hover_color' => '',


            'hongo_font_title_setting' => '',
            'hongo_enable_alternate_font_title' => '1',
            'hongo_font_subtitle_setting' => '',
            'hongo_enable_alternate_font_subtitle' => '1',
            'hongo_font_content_setting' => '',
            'hongo_enable_alternate_font_content' => '1',
            
        ), $atts ) );

		$output = $srcset = '';
		$classes = $width_classes = array();

        $id     = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        $hongo_newsletter_style = ( $hongo_newsletter_style ) ? $hongo_newsletter_style : '';
        $hongo_title            = ! empty( $hongo_title ) ? str_replace( '||', '<br />', $hongo_title ) : '';
        $hongo_subtitle         = ! empty( $hongo_subtitle ) ? str_replace( '||', '<br />', $hongo_subtitle ) : '';
        $hongo_shortcode_id     = ( $hongo_shortcode_id ) ? $hongo_shortcode_id : '';

        // Content width settings
        $content_desktop_width = ( $content_desktop_width ) ?  $width_classes[] = $content_desktop_width : '';
        $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $width_classes[] = $content_desktop_mini_width : '';
        $content_ipad_width   = ( $content_ipad_width ) ? $width_classes[] = $content_ipad_width : '';
        $content_mobile_width = ( $content_mobile_width ) ? $width_classes[] = $content_mobile_width : '';

        // Alternative font class for style 1
        ( $hongo_newsletter_style == 'hongo-content-newsletter-1' ) ? $width_classes[] = 'alt-font' : '';

        // Responsive typography
        $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $font_setting_class_title    .= ( $hongo_enable_alternate_font_title == 1 ) ? ' alt-font' : '';
        $font_setting_class_subtitle = ! empty( $hongo_font_subtitle_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_subtitle_setting ) : '';
        $font_setting_class_subtitle .= ( $hongo_enable_alternate_font_subtitle == 1 ) ? ' alt-font' : '';
        $font_setting_class_content  = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
        $font_setting_class_content .= ( $hongo_enable_alternate_font_content == 1 ) ? ' alt-font' : '';
        $font_setting_class_button   = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box 
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Unique style class 
        $classes[] = ( $hongo_newsletter_style ) ? $hongo_newsletter_style : '';

        // Check if slider id and class
        $hongo_newsletter_unique_id = ! empty( $hongo_newsletter_unique_id ) ? $hongo_newsletter_unique_id : 1;
        $navigation_unique_id = $hongo_newsletter_unique_id;
        $hongo_newsletter_id = ( $hongo_newsletter_id ) ? $hongo_newsletter_id : $hongo_newsletter_style;
        $hongo_newsletter_id.= '-' . $hongo_newsletter_unique_id;
        $hongo_newsletter_unique_id++;
        $classes[] = $hongo_newsletter_id;

        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';
        $width_class_list = ! empty( $width_classes ) ? ' ' . implode( " ", $width_classes ) : '';

        // Check style 
        if ( $hongo_newsletter_style ) {

            if( ! empty( $hongo_subtitle_bgcolor ) ) {
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .newsletter-sub-title { background-color:'.$hongo_subtitle_bgcolor.'; }';
            }

            if( ! empty( $hongo_box_background ) ) {
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' { background-color:'.$hongo_box_background.'; }';
            }

            if( ! empty( $hongo_box_bgcolor ) ) {
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' input, .'.$hongo_newsletter_id. ' input:focus { background-color:'.$hongo_box_bgcolor.'; }';
            }

            if( ! empty( $hongo_box_text_color ) ) {
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .input-group input.form-control , .'.$hongo_newsletter_id.' .input-group input.form-control:focus { color:'.$hongo_box_text_color.'; }';
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .input-group input.form-control::-webkit-input-placeholder { color:'.$hongo_box_text_color.'; }';
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .input-group input.form-control::-moz-placeholder { color:'.$hongo_box_text_color.'; }';
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .input-group input.form-control:-ms-input-placeholder { color:'.$hongo_box_text_color.'; }';
            }

            if( ! empty( $hongo_box_border_color ) ){
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .input-group input.form-control, .'.$hongo_newsletter_id. ' .input-group input.form-control:focus { border-color:'.$hongo_box_border_color.'; }';
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn { border-left-color:'.$hongo_box_border_color.'; }';
            }

            if( ! empty( $hongo_button_bgcolor ) ){
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn { background-color:'.$hongo_button_bgcolor.'; }';
            }

            if( ! empty( $hongo_button_hover_bgcolor ) ){
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn:hover { background-color:'.$hongo_button_hover_bgcolor.'; }';
            }

            if( ! empty ( $hongo_button_text_color ) ){
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn { color:'.$hongo_button_text_color.'; }';
            }

            if( ! empty ( $hongo_button_text_hover_color ) ){
                $hongo_featured_array[] = '.'.$hongo_newsletter_id.' .btn:hover { color:'.$hongo_button_text_hover_color.'; }';
            }

            if ( $hongo_subtitle || $hongo_title || $content || $hongo_shortcode_id ) {

                $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';

                    if( ! empty( $hongo_subtitle ) ) {
                        $output .= '<div class="newsletter-sub-title'.esc_attr( $font_setting_class_subtitle ).'">'. $hongo_subtitle .'</div>';
                    }

                    if( ! empty( $hongo_title ) ) {
                        $output .= '<div class="newsletter-title'.esc_attr( $font_setting_class_title ).'">'. $hongo_title .'</div>';
                    }

                    if( ! empty( $content ) ) {
                        $output .= '<div class="newsletter-content'.esc_attr( $font_setting_class_content ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                    }

                    if( ! empty( $hongo_shortcode_id ) ) {

                        $output .= '<div class="newsletter-form-wrap' .esc_attr( $width_class_list ). '">';

                            $hongo_shortcode_id = hongo_get_strip_shortcode( $hongo_shortcode_id );
                            $output .= do_shortcode( $hongo_shortcode_id );

                        $output .= '</div>';
                    }
                $output.='</div>';
            }

        }

		return $output;
	}
}
add_shortcode('hongo_newsletter','hongo_newsletter_shortcode');