<?php
/**
 * Shortcode For Button
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Button */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_button_shortcode' ) ) {
    function hongo_button_shortcode( $atts, $content = null ) {
        
        global $hongo_button, $hongo_featured_array;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

            'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',

            'hongo_button_style' =>'',
            'hongo_button_type' => '',
            'hongo_enable_border' => '1',
            'hongo_enable_icon' => '',
            'custom_icon' => '',
            'hongo_icon_type' => '',
            'custom_icon_image' => '',
            'custom_icon_max_width' => '',
            'hongo_button_icon' => '',
            'hongo_icon_position' => 'left',
            'hongo_button_text' => '',
            'hongo_button_one_page' => '',

            'hongo_button_setting' => '',

            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',

            'hongo_animation_style' => '',
            'hongo_animation_delay' => '',
            'hongo_animation_duration' => '',

        ), $atts ) );

        $output = $icon = '';
        $classes = array();

        // Custom id and class
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        ( ! empty( $class ) ) ? $classes[] = $class : '';

        $hongo_button = ! empty( $hongo_button ) ? $hongo_button : 0;
        $hongo_button = $hongo_button + 1;
        $classes[] = 'hongo-button-'.$hongo_button;

        // $classes[] = 'button-' . $hongo_button_style;

        // Button url,title,target
        $first_button_parse_args = ! empty( $hongo_button_text ) ? vc_parse_multi_attribute( $hongo_button_text ) : array();
        $first_button_link     = isset( $first_button_parse_args['url'] ) ? $first_button_parse_args['url'] : '#';
        $first_button_title    = isset( $first_button_parse_args['title'] ) ? $first_button_parse_args['title'] : '';
        $first_button_target   = isset( $first_button_parse_args['target'] ) ? 'target= "'.trim( $first_button_parse_args['target'] ).'"' : '';
        $first_button_nofollow = isset( $first_button_parse_args['rel'] ) ? ' rel= "'.$first_button_parse_args['rel'].'"' : '';

        if( $hongo_button_one_page == 1 ) {

            $classes[] = 'section-link';
        }

        // CSS Box
        ( ! empty( $css ) ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';

        // Responsive CSS box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {
            
            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Background image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // For button style
        switch( $hongo_button_style ) {
            case 'style1':
                $classes[] = 'btn btn-dark-gray alt-font';
            break;
            case 'style2':
                $classes[] = 'btn btn-white alt-font';
            break;
            case 'style3':
                $classes[] = 'btn btn-transparent-black alt-font';
            break;
            case 'style4':
                $classes[] = 'btn btn-transparent-white alt-font';
            break;
            case 'style5':
                $classes[] = 'btn btn-dark-gray btn-round alt-font';
            break;
            case 'style6':
                $classes[] = 'btn btn-white btn-round alt-font';
            break;
            case 'style7':
                $classes[] = 'btn btn-transparent-black btn-round alt-font';
            break;
            case 'style8':
                $classes[] = 'btn btn-transparent-white btn-round alt-font';
            break;
            case 'style9':
                $classes[] = 'btn-link alt-font';
            break;
            case 'style10':
                $classes[] = 'btn btn-base alt-font';
            break;
            case 'style11':
                $classes[] = 'btn btn-transparent-base alt-font';
            break;
            case 'style12':
                $classes[] = 'btn btn-base btn-round alt-font';
            break;
            case 'style13':
                $classes[] = 'btn btn-transparent-base btn-round alt-font';
            break;
            case 'style14':
                $classes[] = 'btn-link btn-base-link alt-font';
            break;
        }

        // For button type
        switch( $hongo_button_type ) {
            case 'extra-large':
                $classes[] = 'btn-extra-large';
            break;
            case 'large':
                $classes[] = 'btn-large';
            break;
            case 'medium':
                $classes[] = 'btn-medium';
            break;
            case 'small':
                $classes[] = 'btn-small';
            break;
            case 'vsmall':
                $classes[] = 'btn-very-small';
            break;
        }

        $hongo_icon_type    = ! empty( $hongo_icon_type ) ? ' ' . $hongo_icon_type : '';

        // Icon or custom image
        if( ( $hongo_enable_icon == 1 && ! empty( $custom_icon_image ) ) || $hongo_button_icon ) {
            $icon_title_gap = ( $hongo_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            if( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {

                $icon = hongo_get_image_html( $custom_icon_image, 'full', $icon_title_gap );

            } else {
                
                $icon = '<i class="'.$hongo_button_icon.$hongo_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';
            }

            // Icon position
            if( $hongo_icon_position == 'right' ) {
                $first_button_title = $first_button_title . $icon;
            } else {
                $first_button_title = $icon . $first_button_title;
            }
        }

        // Animation
        $hongo_animation_style = ! empty( $hongo_animation_style ) && $hongo_animation_style != 'none' ? $classes[] = 'wow '.$hongo_animation_style : '';
        $hongo_animation_delay = ( $hongo_animation_delay ) ? ' data-wow-delay= '.$hongo_animation_delay.'ms' : '';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';
         
        // Display setting
        $desktop_display        = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display   = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display           = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display         = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Responsive typography
        $hongo_button_setting_class = ! empty( $hongo_button_setting ) ? $classes[] = hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

        //Custom Icon Max Width
        if( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
            $hongo_featured_array[] = '.hongo-button-'.$hongo_button.' img { max-width: '.$custom_icon_max_width.' }';
        }

        // Class list        
        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';

        if( ! empty( $first_button_title ) ) {

            $output .= '<a'.$id.' href="'.esc_url($first_button_link).'" '.$first_button_target.$first_button_nofollow.' class="'.esc_attr( $class_list ).'"'.$hongo_animation_delay.$hongo_animation_duration.'>'.$first_button_title.'</a>';
        }

      return $output;
    }
}
add_shortcode( 'hongo_button', 'hongo_button_shortcode' );