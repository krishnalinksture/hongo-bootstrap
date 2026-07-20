<?php
/**
 * Shortcode For Popup
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_popup_shortcode' ) ) {

    function hongo_popup_shortcode( $atts, $content = null ) {

        global $button_contact_class, $hongo_popup_uniq_id, $hongo_featured_array;

        extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'hongo_popup_type' => '',
                'hongo_popup_styles' => 'popup-button',
                'hongo_popup_button_title' => '',
                'hongo_icon_middle' => '0',
                'hongo_enable_icon' => '',
                'hongo_icon_image_position' => 'icon-image-left',
                'hongo_custom_icon' => '',
                'hongo_custom_icon_image' => '',
                'custom_icon_max_width' => '',
                'hongo_icon_list' => '',
                'hongo_icon_size' => 'icon-medium',
                'hongo_popup_youtube_url' => '',
                'hongo_popup_vimeo_url' => '',
                'hongo_popup_google_map_url' => '',
                'hongo_icon_color' => '',
                'hongo_icon_border_color' => '',
                'hongo_contact_forms_shortcode' => '',
                'hongo_dismiss_text' => esc_html__( 'DISMISS','hongo-addons' ),
                'hongo_popup_form_id' => '',
                'hongo_popup_animation_effect' => '',
                'hongo_inside_popup_title' => '',
                'hongo_mp4_video' => '',
                'hongo_webm_video' => '',
                'hongo_ogg_video' => '',

                'hongo_button_style' => '',
                'hongo_button_size' => 'btn-medium',
                'hongo_font_button_setting' => '',
                'hongo_font_title_setting' => '',
                'hongo_font_content_setting' => '',

                'hongo_width' => '',
                'hongo_offset' => '',
            ), $atts ) );

        $output = $hongo_button_style_class = $hongo_button_class = $custom_icon_image = '';
        $classes = array();

        // Extra class & id
        $id     = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        ! empty( $hongo_popup_type ) ? $classes[] = $hongo_popup_type : '';
        ! empty( $hongo_popup_styles ) ? $classes[] = $hongo_popup_styles : '';

        // Check if popup id and class
        $hongo_popup_uniq_id = ! empty( $hongo_popup_uniq_id ) ? $hongo_popup_uniq_id : 1;
        $classes[] = $hongo_popup_id = 'popup-button-' . $hongo_popup_uniq_id;
        $hongo_popup_uniq_id++;

        // Responsive font settings
        $button_setting_class = ( $hongo_font_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_button_setting ) : '';
        $hongo_font_title_class = ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $hongo_font_content_class = ( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

        // For button style
        if( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }

        // Button title
        $hongo_popup_button_title = ! empty( $hongo_popup_button_title ) ? str_replace( '||', '<br />', $hongo_popup_button_title ) : '';

        // Custom icon or image
        $hongo_icon_list = ( $hongo_icon_list ) ? $hongo_icon_list : '';
        if( $hongo_enable_icon == 1 ) {
            $hongo_icon_size = ( $hongo_icon_size ) ? ' '.$hongo_icon_size : '';
            if( $hongo_custom_icon == 1 && ! empty( $hongo_custom_icon_image ) ) {
                $custom_icon_image .= hongo_get_image_html( $hongo_custom_icon_image, 'full', $hongo_icon_size );
            } elseif( $hongo_icon_list ){
                $custom_icon_image .= '<i class="'.$hongo_icon_list.$hongo_icon_size.'"></i>';
            }
        }

        // Column Offset and sm width
        $hongo_offset = ( $hongo_offset ) ? ' '. str_replace( 'vc_', '', $hongo_offset ) : '';
        
        if($hongo_width != ''){
            $hongo_width = explode('/', $hongo_width);
            $hongo_width = ( $hongo_width[0] != '1' ) ? ' col-sm-'.$hongo_width[0] * floor(12 / $hongo_width[1]) : ' col-sm-'.floor(12 / $hongo_width[1]);
        }

        // Button size
        $hongo_button_size = ! empty( $hongo_button_size ) ? ' '.$hongo_button_size : '';

        // Class list
        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : ''; 

        switch ( $hongo_popup_type )
        {
            case 'popup-form-1':

                $hongo_width = ! empty( $hongo_width ) ? $hongo_width : '';
                $hongo_offset = ! empty( $hongo_offset ) ? $hongo_offset : ' col-lg-3 col-md-6 col-sm-7 col-xs-11';

                // Icon Width
                if( ! empty( $custom_icon_max_width ) && $hongo_custom_icon == 1 ) {
                    $hongo_featured_array[] = '.popup-with-form img { max-width:'. $custom_icon_max_width .' }'; 
                }

                if( strchr( $hongo_offset,'col-xs' ) ) {
                    $hongo_offset = $hongo_offset;
                } else {
                    $hongo_offset = $hongo_offset." col-xs-mobile-fullwidth";
                }

                $contact_form = do_shortcode( '[contact-form-7 id='.$hongo_contact_forms_shortcode.']' );

                if ( $hongo_popup_button_title || $custom_icon_image ) {

                    switch( $hongo_popup_styles ){

                        case 'popup-button':
                            // Button Class
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-round';

                            if( $hongo_popup_button_title ) {
                                $output .= '<a '.$id.' class="popup-with-form alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $hongo_button_size ).esc_attr( $button_setting_class ).'" href="#popup-form-'.$hongo_popup_form_id.'">';
                                    if ( ! empty( $custom_icon_image ) ) {
                                        $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                            $output .= $custom_icon_image;
                                        $output .= '</span>';
                                    }
                                    $output .= $hongo_popup_button_title;
                                $output .= '</a>';
                            }

                        break;

                        case 'popup-icon':

                            $hongo_icon_middle = ( $hongo_icon_middle == '1' ) ? ' popup-icon-middle' : '';
                            if ( $hongo_icon_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.' i { color: '.$hongo_icon_color.'}';
                            }
                            if ( $hongo_icon_border_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.'.popup-icon span:before { box-shadow: 0 0 0 4px '.$hongo_icon_border_color.'}';
                            }
                            $output .= '<a '.$id.' class="popup-with-form alt-font '.esc_attr( $class_list ).esc_attr( $hongo_icon_middle ).'" href="#popup-form-'.$hongo_popup_form_id.'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span>';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                            $output .= '</a>';
                        break;

                        case 'popup-icon-title':

                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn-with-text' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : '';

                            $output .= '<a '.$id.' class="popup-with-form alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $button_setting_class ).'" href="#popup-form-'.$hongo_popup_form_id.'">';

                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }

                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }

                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                            $output .= '</a>';
                        break;
                    }

                    // Popup modal content
                    $output .= '<div id="popup-form-'.$hongo_popup_form_id.'" class="'.esc_attr( $hongo_width ).esc_attr( $hongo_offset ).' hongo-popup-contact-form mfp-hide center-col bg-white">';
                        $output .= $contact_form;
                    $output .= '</div>';
                }
            break;

            case 'modal-popup':

                $hongo_width = ! empty( $hongo_width ) ? $hongo_width : '';
                $hongo_offset = ! empty( $hongo_offset ) ? $hongo_offset : ' col-lg-3 col-md-6 col-sm-7 col-xs-11';

                $animation_dialog = ! empty( $hongo_popup_animation_effect ) ? 'zoom-anim-dialog ' : '';

                // Icon Width
                if( ! empty( $custom_icon_max_width ) && $hongo_custom_icon == 1 ) {
                    $hongo_featured_array[] = '.modal-popup img { max-width:'. $custom_icon_max_width .' }'; 
                }

                if ( $hongo_popup_button_title || $custom_icon_image ) {

                    switch( $hongo_popup_styles ){

                        case 'popup-button':
                            // Button Class
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-round';

                            if( $hongo_popup_button_title ){
                                $output .= '<a '.$id.' class="modal-popup alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $hongo_button_size ).esc_attr( $button_setting_class ).'" href="#modal-popup-'.$hongo_popup_form_id.'">';

                                    if ( ! empty( $custom_icon_image ) ) {
                                        $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                            $output .= $custom_icon_image;
                                        $output .= '</span>';
                                    }

                                    $output .= $hongo_popup_button_title;
                                $output .='</a>';
                            }

                        break;

                        case 'popup-icon':
                            $hongo_icon_middle = ( $hongo_icon_middle == '1' ) ? ' popup-icon-middle' : '';
                            if ( $hongo_icon_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.' i { color: '.$hongo_icon_color.'}';
                            }
                            if ( $hongo_icon_border_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.'.popup-icon span:before { box-shadow: 0 0 0 4px '.$hongo_icon_border_color.'}';
                            }
                            $output .= '<a '.$id.' class="modal-popup alt-font '.esc_attr( $class_list ).esc_attr( $hongo_icon_middle ).'" href="#modal-popup-'.$hongo_popup_form_id.'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span>';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                            $output .= '</a>';

                        break;

                        case 'popup-icon-title':

                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn-with-text' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : '';

                            $output .= '<a '.$id.' class="modal-popup alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $button_setting_class ).'" href="#modal-popup-'.$hongo_popup_form_id.'">';

                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                            $output .= '</a>';

                        break;
                    }

                    // Popup modal content
                    $output .= '<div id="modal-popup-'.$hongo_popup_form_id.'" class="'.esc_attr( $animation_dialog ).esc_attr( $hongo_width ).esc_attr( $hongo_offset ).' hongo-popup-simple-modal mfp-hide center-col bg-white text-center">';

                        $hongo_inside_popup_title = ! empty( $hongo_inside_popup_title ) ? str_replace( '||', '<br />', $hongo_inside_popup_title ) : '';
                        if( $hongo_inside_popup_title ){
                            $output .= '<h4 class="popup-title'.esc_attr( $hongo_font_title_class ).'">'.$hongo_inside_popup_title.'</h4>';
                        }
                        if($content){
                            $output .= '<div class="simple-modal-content'.esc_attr( $hongo_font_content_class ).'">';
                                $output .= hongo_remove_wpautop( $content );
                            $output .= '</div>';
                        }

                        $hongo_dismiss_text = ( $hongo_dismiss_text ) ? $hongo_dismiss_text : '';

                        if( ! empty( $hongo_dismiss_text ) ) {
                            $output .= '<a class="btn btn-round btn-dark-gray popup-modal-dismiss" href="#">'.$hongo_dismiss_text.'</a>';    
                        }                        
                    $output .= '</div>';
                }
            break;

            case 'youtube-video-1':

                $hongo_icon_image_position = ( $hongo_icon_image_position ) ? $hongo_icon_image_position : 'icon-image-left';
                $hongo_popup_youtube_url = ( $hongo_popup_youtube_url ) ? $hongo_popup_youtube_url : '';

                // Icon Width
                if( ! empty( $custom_icon_max_width ) && $hongo_custom_icon == 1 ) {
                    $hongo_featured_array[] = '.popup-youtube img { max-width:'. $custom_icon_max_width .' }'; 
                }

                if ( $hongo_popup_button_title || $custom_icon_image ) {

                    switch( $hongo_popup_styles ){

                        case 'popup-button':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-round btn-transparent-white';

                            $output .= '<a '.$id.' class="popup-youtube alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $hongo_button_size ).esc_attr( $button_setting_class ).'" href="'.esc_url( $hongo_popup_youtube_url ).'">';
                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= $hongo_popup_button_title;
                                }
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= $hongo_popup_button_title;
                                }

                            $output .= '</a>';
                        break;

                        case 'popup-icon':
                            $hongo_icon_middle = ( $hongo_icon_middle == '1' ) ? ' popup-icon-middle' : '';
                            if ( $hongo_icon_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.' i { color: '.$hongo_icon_color.'}';
                            }
                            if ( $hongo_icon_border_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.'.popup-icon span:before { box-shadow: 0 0 0 4px '.$hongo_icon_border_color.'}';
                            }
                            $output .= '<a '.$id.' class="popup-youtube alt-font '.esc_attr( $class_list ).esc_attr( $hongo_icon_middle ).'" href="'.esc_url( $hongo_popup_youtube_url ).'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span>';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                            $output .= '</a>';

                        break;

                        case 'popup-icon-title':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn-with-text' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : '';

                            $output .= '<a '.$id.' class="popup-youtube alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $button_setting_class ).'" href="'.esc_url( $hongo_popup_youtube_url ).'">';
                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                            $output .= '</a>';

                        break;
                    }
                }
            break;

            case 'vimeo-video-1':

                $hongo_popup_vimeo_url = ( $hongo_popup_vimeo_url ) ? $hongo_popup_vimeo_url : '';

                // Icon Width
                if( ! empty( $custom_icon_max_width ) && $hongo_custom_icon == 1 ) {
                    $hongo_featured_array[] = '.popup-vimeo img { max-width:'. $custom_icon_max_width .' }'; 
                }

                if ( $hongo_popup_button_title || $custom_icon_image ) {

                    switch( $hongo_popup_styles ){

                        case 'popup-button':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-round btn-transparent-white';

                            $output .= '<a '.$id.' class="popup-vimeo alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $hongo_button_size ).esc_attr( $button_setting_class ).'" href="'.esc_url( $hongo_popup_vimeo_url ).'">';
                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= $hongo_popup_button_title;
                                }
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= $hongo_popup_button_title;
                                }
                            $output .= '</a>';
                        break;

                        case 'popup-icon':
                            $hongo_icon_middle = ( $hongo_icon_middle == '1' ) ? ' popup-icon-middle' : '';
                            if ( $hongo_icon_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.' i { color: '.$hongo_icon_color.'}';
                            }
                            if ( $hongo_icon_border_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.'.popup-icon span:before { box-shadow: 0 0 0 4px '.$hongo_icon_border_color.'}';
                            }
                            $output .= '<a '.$id.' class="popup-vimeo alt-font '.esc_attr( $class_list ).esc_attr( $hongo_icon_middle ).'" href="'.esc_url( $hongo_popup_vimeo_url ).'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span>';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                            $output .= '</a>';

                        break;

                        case 'popup-icon-title':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn-with-text' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : '';

                            $output .= '<a '.$id.' class="popup-vimeo alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $button_setting_class ).'" href="'.esc_url( $hongo_popup_vimeo_url ).'">';
                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }

                            $output .= '</a>';

                        break;
                    }
                }
            break;

            case 'google-map-1':

                $hongo_popup_google_map_url = ($hongo_popup_google_map_url) ? $hongo_popup_google_map_url : '';

                // Icon Width
                if( ! empty( $custom_icon_max_width ) && $hongo_custom_icon == 1 ) {
                    $hongo_featured_array[] = '.popup-googlemap img { max-width:'. $custom_icon_max_width .' }'; 
                }

                if ( $hongo_popup_button_title || $custom_icon_image ) {

                    switch( $hongo_popup_styles ){

                        case 'popup-button':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-round';

                            if( $hongo_popup_button_title ){

                                $output .='<a '.$id.' class="popup-googlemap alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $hongo_button_size ).esc_attr( $button_setting_class ).'" href="'.esc_url( $hongo_popup_google_map_url ).'">';
                                    if ( ! empty( $custom_icon_image ) ) {
                                        $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                            $output .= $custom_icon_image;
                                        $output .= '</span>';
                                    }
                                    $output .= $hongo_popup_button_title;
                                $output .='</a>';
                            }

                        break;

                        case 'popup-icon':
                            $hongo_icon_middle = ( $hongo_icon_middle == '1' ) ? ' popup-icon-middle' : '';
                            if ( $hongo_icon_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.' i { color: '.$hongo_icon_color.'}';
                            }
                            if ( $hongo_icon_border_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.'.popup-icon span:before { box-shadow: 0 0 0 4px '.$hongo_icon_border_color.'}';
                            }
                            $output .= '<a '.$id.' class="popup-googlemap alt-font '.esc_attr( $class_list ).esc_attr( $hongo_icon_middle ).'" href="'.esc_url( $hongo_popup_google_map_url ).'">';
                                $output .= '<span>';
                                    $output .= $custom_icon_image;
                                $output .= '</span>';
                            $output .= '</a>';

                        break;

                        case 'popup-icon-title':

                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn-with-text' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : '';

                            $output .= '<a '.$id.' class="popup-googlemap alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $button_setting_class ).'" href="'.esc_url( $hongo_popup_google_map_url ).'">';

                                if( $hongo_icon_image_position == 'icon-image-right' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.$hongo_icon_image_position.'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                if( $hongo_icon_image_position == 'icon-image-left' ){
                                    $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                        $output .= $hongo_popup_button_title;
                                    $output .= '</div>';
                                }
                            $output .= '</a>';

                        break;
                    }
                }
            break;

            case 'html5-video-1':

                if ( $hongo_popup_button_title || $custom_icon_image ) {

                    // Icon Width
                    if( ! empty( $custom_icon_max_width ) && $hongo_custom_icon == 1 ) {
                        $hongo_featured_array[] = '.html-video-1 img { max-width:'. $custom_icon_max_width .' }'; 
                    }

                    switch( $hongo_popup_styles ){
                        
                        case 'popup-button':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-round btn-transparent-white';

                            $output .= '<a '.$id.' class="html-video-1 alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $hongo_button_size ).esc_attr( $button_setting_class ).'" href="#html5-video-1-'.$hongo_popup_form_id.'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                $output .= $hongo_popup_button_title;
                            $output .= '</a>';
                        break;

                        case 'popup-icon':
                            $hongo_icon_middle = ( $hongo_icon_middle == '1' ) ? ' popup-icon-middle' : '';
                            if ( $hongo_icon_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.' i { color: '.$hongo_icon_color.'}';
                            }
                            if ( $hongo_icon_border_color ) {
                                $hongo_featured_array[] = '.'.$hongo_popup_id.'.popup-icon span:before { box-shadow: 0 0 0 4px '.$hongo_icon_border_color.'}';
                            }
                            $output .= '<a '.$id.' class="html-video-1 alt-font '.esc_attr( $class_list ).esc_attr( $hongo_icon_middle ).'" href="#html5-video-1-'.$hongo_popup_form_id.'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span>';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                            $output .= '</a>';

                        break;

                        case 'popup-icon-title':
                            $hongo_button_class = ! empty( $hongo_popup_button_title ) ? ' btn-with-text' : '';
                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : '';

                            $output .= '<a '.$id.' class="html-video-1 alt-font '.esc_attr( $class_list ).esc_attr( $hongo_button_class ).esc_attr( $button_setting_class ).'" href="#html5-video-1-'.$hongo_popup_form_id.'">';
                                if ( ! empty( $custom_icon_image ) ) {
                                    $output .= '<span class="'.esc_attr( $hongo_icon_image_position ).'">';
                                        $output .= $custom_icon_image;
                                    $output .= '</span>';
                                }
                                $output .= '<div class="popup-btn-title '.esc_attr( $hongo_button_class ).'">';
                                    $output .= $hongo_popup_button_title;
                                $output .= '</div>';
                            $output .= '</a>';

                        break;
                    }

                    $output .= '<div id="html5-video-1-'.$hongo_popup_form_id.'" class="white-popup-block mfp-hide html5-video-1-main">';
                        $output .= '<video class="hongo-popup-video" controls>';
                            if( $hongo_mp4_video ) {
                                $output .= '<source type="video/mp4" src="'.esc_url( $hongo_mp4_video ).'">';
                            }
                            if( $hongo_ogg_video ) {
                                $output .= '<source type="video/ogg" src="'.esc_url( $hongo_ogg_video ).'">';
                            }
                            if( $hongo_webm_video ) {
                                $output .= '<source type="video/webm" src="'.esc_url( $hongo_webm_video ).'">';
                            }
                        $output .= '</video>';
                    $output .= '</div>';
                }
            break;
        }
        return $output;
    }
}
add_shortcode( 'hongo_popup', 'hongo_popup_shortcode' );