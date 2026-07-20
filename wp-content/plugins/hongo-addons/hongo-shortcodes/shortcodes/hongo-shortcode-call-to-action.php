<?php
/**
 * Shortcode For Call To Action
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Call To Action */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_call_to_action_shortcode' ) ) {
	function hongo_call_to_action_shortcode( $atts, $content = null ) {

        global $hongo_call_to_action_unique_id, $hongo_featured_array;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_call_to_action_style' => '',

            'hongo_title' => '',
            'hongo_title_heading_tag' => '',
            'hongo_enable_alternate_font_title' => '1',
            'hongo_subtitle' => '',
            'hongo_subtitle_heading_tag' => '',
            'hongo_enable_alternate_font_subtitle' => '1',
            'hongo_enable_alternate_font_content' => '',

            'hongo_button_text' => '',

            'hongo_show_separator' => '1',
            'hongo_separator_color' => '',
            'hongo_title_border_color' => '',

            'hongo_button_icon_enable' => '',
            'hongo_custom_icon_image_enable' => '',
            'hongo_button_icon' => '',
            'hongo_custom_icon_image' => '',
            'custom_icon_max_width' => '',
            'hongo_icon_position' => 'left',

            'hongo_button_style' => '',
            'hongo_button_type' => '',
            'hongo_button_setting' => '',
            'hongo_font_title_setting' => '',
            'hongo_font_subtitle_setting' => '',
            'hongo_font_content_setting' => '',
        ), $atts ) );

        $hongo_classes = array();
        $hongo_output = $hongo_class_list = $hongo_button_style_class = $hongo_button_class = '';

        // Custom Id and Class
        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $hongo_classes[] = $class : '';
        ( $hongo_call_to_action_style ) ? $hongo_classes[] = $hongo_call_to_action_style : '';

        // Check if accordion id and class
        $hongo_call_to_action_unique_id  = ! empty( $hongo_call_to_action_unique_id ) ? $hongo_call_to_action_unique_id : 1;
        $hongo_classes[] = $hongo_call_to_action_class = 'hongo-call-to-action-' . $hongo_call_to_action_unique_id;
        $hongo_call_to_action_unique_id++;

        // Title / Subtitle / Content
        $hongo_title = ( $hongo_title ) ? str_replace( '||', '<br />', $hongo_title ) : '';
        $hongo_subtitle = ( $hongo_subtitle ) ? str_replace('||', '<br />',$hongo_subtitle) : '';

        // Button 
        $hongo_button_parse_args = ! empty( $hongo_button_text ) ? vc_parse_multi_attribute( $hongo_button_text ) : array();
        $hongo_button_link     = isset( $hongo_button_parse_args['url'] ) ? $hongo_button_parse_args['url'] : '#';
        $hongo_button_title    = isset( $hongo_button_parse_args['title'] ) ? $hongo_button_parse_args['title'] : '';
        $hongo_button_target   = isset( $hongo_button_parse_args['target'] ) ? trim( $hongo_button_parse_args['target'] ) : '_self';

        // Button Icon || Button Icon Img
        if ( $hongo_button_icon || ( $hongo_custom_icon_image_enable == 1 && $hongo_custom_icon_image ) ) {

            $hongo_icon_title_position = ( $hongo_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            if ( $hongo_custom_icon_image_enable == 1 && $hongo_custom_icon_image ) {

                $icon = hongo_get_image_html( $hongo_custom_icon_image, 'full', $hongo_icon_title_position );

            } else {
                $icon = ( $hongo_button_icon ) ? '<i class="'.$hongo_button_icon.$hongo_icon_title_position.'" aria-hidden="true"></i>' : '';
            }

            // Icon Position
            if ( $hongo_icon_position == 'right' ) {
                $hongo_button_title = $hongo_button_title . $icon;
            } else {
                $hongo_button_title = $icon . $hongo_button_title;
            }
        }

        if ( ! empty( $custom_icon_max_width ) && $hongo_custom_icon_image_enable == 1 ) {
            $hongo_featured_array[] = '.'.$hongo_call_to_action_class. ' a img { max-width: '.$custom_icon_max_width.'; }';
        }

        // Responsive typography & alt font
        $button_setting_class = ( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

        // For button style
        if ( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }

        // For button type
        if ( ! empty( $hongo_button_type ) ) {

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

        $hongo_font_title_setting = ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $hongo_font_title_setting .= ( $hongo_enable_alternate_font_title == 1 ) ? ' alt-font' : '';

        $hongo_font_subtitle_setting = ( $hongo_font_subtitle_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_subtitle_setting ) : '';
        $hongo_font_subtitle_setting .= ( $hongo_enable_alternate_font_subtitle == 1 ) ? ' alt-font' : '';

        $hongo_font_content_setting = ( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
        $hongo_font_content_setting .= ( $hongo_enable_alternate_font_content == 1 ) ? ' alt-font' : '';

        // Class List 
        $hongo_class_list = ( $hongo_classes ) ? implode(" ", $hongo_classes) : '';

        switch ( $hongo_call_to_action_style ) {

            case 'call-to-action-style-1':

                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $hongo_subtitle_heading_tag = ( $hongo_subtitle_heading_tag ) ? $hongo_subtitle_heading_tag : 'span';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black btn-round alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

                if ( $hongo_title || $hongo_subtitle || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.esc_attr( $hongo_class_list ).'">';
                        if ( $hongo_subtitle ) {
                            $hongo_output .='<'.$hongo_subtitle_heading_tag.' class="base-color call-to-action-sub-title'.esc_attr( $hongo_font_subtitle_setting ).'">'.$hongo_subtitle.'</'.$hongo_subtitle_heading_tag.'>';
                        }
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        if ( $hongo_button_title ) {
                           $hongo_output .= '<a href="'.esc_url($hongo_button_link).'" target="'.esc_attr($hongo_button_target).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                        }
                    $hongo_output .= '</div>';
                }

            break;

            case 'call-to-action-style-2':

                // Separator
                $hongo_show_separator = ( $hongo_show_separator == '1' ) ? '<span class="separator"></span>' : '';
                if ( $hongo_separator_color ) {
                    $hongo_featured_array[] = '.'.$hongo_call_to_action_class. ' .separator { background-color: '.$hongo_separator_color.'; }';
                }

                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $hongo_subtitle_heading_tag = ( $hongo_subtitle_heading_tag ) ? $hongo_subtitle_heading_tag : 'span';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

                if ( $hongo_title || $hongo_subtitle || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.esc_attr( $hongo_class_list ).'">';
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        $hongo_output .= $hongo_show_separator;
                        if ( $hongo_subtitle ) {
                            $hongo_output .='<'.$hongo_subtitle_heading_tag.' class="call-to-action-sub-title'.esc_attr( $hongo_font_subtitle_setting ).'">'.$hongo_subtitle.'</'.$hongo_subtitle_heading_tag.'>';
                        }
                        if ( $hongo_button_title ) {
                            $hongo_output .= '<div class="action-button">';
                                $hongo_output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.esc_attr( $hongo_button_target ).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                            $hongo_output .= '</div>';
                        }
                    $hongo_output .= '</div>';
                }

            break;

            case 'call-to-action-style-3':

                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-transparent-base btn-round alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';

                if ( $hongo_title || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.$hongo_class_list.'">';
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        if ( $hongo_button_title ) {
                            $hongo_output .= '<div class="action-button">';
                                $hongo_output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.esc_attr( $hongo_button_target ).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                            $hongo_output .= '</div>';
                        }
                    $hongo_output .= '</div>';
                }
                
            break;

            case 'call-to-action-style-4':
                
                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-base btn-round alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';

                if ( $hongo_title || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.esc_attr( $hongo_class_list ).'">';
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        if ( $hongo_button_title ) {
                            $hongo_output .= '<div class="action-button">';
                                $hongo_output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.esc_attr( $hongo_button_target ).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                            $hongo_output .= '</div>';
                        }
                    $hongo_output .= '</div>';
                }

            break;

            case 'call-to-action-style-5':

                if ( $hongo_title_border_color ) {
                    $hongo_featured_array[] = '.'.$hongo_call_to_action_class. ' .call-to-action-title { border-color: '.$hongo_title_border_color.'; }';
                }
                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-extra-large';

                if ( $hongo_title || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.esc_attr( $hongo_class_list ).'">';
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        if ( $hongo_button_title ) {
                            $hongo_output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.esc_attr( $hongo_button_target ).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                        }
                    $hongo_output .= '</div>';
                }

            break;

            case 'call-to-action-style-6':

                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $hongo_subtitle_heading_tag = ( $hongo_subtitle_heading_tag ) ? $hongo_subtitle_heading_tag : 'span';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-base btn-round alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';

                if ( $hongo_title || $hongo_subtitle || $content || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.esc_attr( $hongo_class_list ).'">';
                        if ( $hongo_subtitle ) {
                            $hongo_output .='<'.$hongo_subtitle_heading_tag.' class="base-color call-to-action-sub-title '.esc_attr( $hongo_font_subtitle_setting ).'">'.$hongo_subtitle.'</'.$hongo_subtitle_heading_tag.'>';
                        }
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        if ( $content ) {
                            $hongo_output .='<div class="call-to-action-content'.$hongo_font_content_setting.'">' . hongo_remove_wpautop( $content ) . '</div>';
                        }
                        if ( $hongo_button_title ) {
                            $hongo_output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.esc_attr( $hongo_button_target ).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                        }
                    $hongo_output .= '</div>';
                }

            break;

            case 'call-to-action-style-7':

                $hongo_title_heading_tag = ( $hongo_title_heading_tag ) ? $hongo_title_heading_tag : 'h2';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-base btn-round alt-font';
                $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-very-small';

                if ( $hongo_title || $hongo_subtitle || $hongo_button_title ) {

                    $hongo_output .= '<div'.$id.' class="'.esc_attr( $hongo_class_list ).'">';
                        if ( $hongo_title ) {
                            $hongo_output .='<'.$hongo_title_heading_tag.' class="call-to-action-title'.esc_attr( $hongo_font_title_setting ).'">'.$hongo_title.'</'.$hongo_title_heading_tag.'>';
                        }
                        if ( $content ) {
                            $hongo_output .='<div class="call-to-action-content'.esc_attr( $hongo_font_content_setting ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                        }
                        if ( $hongo_button_title ) {
                            $hongo_output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.esc_attr( $hongo_button_target ).'" class="'.trim( $button_setting_class ).'">'.$hongo_button_title.'</a>';
                        }
                    $hongo_output .= '</div>';
                }

            break;
        }
        return $hongo_output;
    }
}
add_shortcode( 'hongo_call_to_action', 'hongo_call_to_action_shortcode' );