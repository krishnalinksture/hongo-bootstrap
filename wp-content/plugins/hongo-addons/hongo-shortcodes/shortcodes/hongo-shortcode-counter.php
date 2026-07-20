<?php
/**
 * Shortcode For Counter 
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Counter  */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_counter_or_skill_shortcode' ) ) {
    function hongo_counter_or_skill_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_counter_style1, $hongo_counter_style2, $hongo_counter_style3;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_counter_style' => '',

            'custom_icon' => '',
            'custom_icon_image' => '',
            'custom_icon_max_width' => '',
            'counter_icon' =>'',
            'hongo_icon_color' => '',
            'hongo_icon_hover_color' => '',
            'hongo_counter_icon_size' => '',

            'title' => '',
            'hongo_title_element_tag' => '',
            'counter_number' => '',
            'number_postfix' => '',
            'hongo_counter_element_tag' => '',
            'hongo_enable_counter_alternate_font' => '1',
            'hongo_enable_title_alternate_font' => '1',

            'hongo_enable_link' => '',
            'hongo_link_url' => '',
            'hongo_link_target' => '',
            'hongo_link_on' => '',
            'hongo_link_hover_color' => '',

            'hongo_enable_border' => '1',
            'hongo_box_hover_border_color' => '',
            'hongo_box_hover_border_size' => '',

            'hongo_enable_separator' => '1',
            'hongo_separator_color' => '',

            'hongo_font_title_setting' =>'',
            'hongo_font_counter_setting' => '',

            'hongo_counter_animation_duration' => '2000',
            'initial_loading_animation' => '',
            'hongo_animation_duration' => '',
        ), $atts ) );

        $output = '';
        $classes = $classes_icon = array();

        // Custom Id and Class
        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
        ( $hongo_counter_style ) ? $classes[] = $hongo_counter_style : '';

        // Icon And Icon Image
        $counter_icon = ( $counter_icon ) ? $classes_icon[] = $counter_icon : '';
        $classes_icon[] = ( $hongo_counter_icon_size ) ? $hongo_counter_icon_size : 'icon-extra-medium';

        // Title & Number
        $title = ( $title ) ? str_replace('||', '<br />',$title) : '';
        $hongo_title_element_tag = ( $hongo_title_element_tag ) ? $hongo_title_element_tag : 'span';
        $counter_number = ( $counter_number ) ? $counter_number : '';
        $number_postfix = ( $number_postfix ) ? $number_postfix : '';

        // Link Urls 
        $hongo_link_url = ( $hongo_link_url ) ? $hongo_link_url : '';
        $hongo_link_on = ( $hongo_link_on ) ? $hongo_link_on : '';
        $hongo_link_target_attr = ( $hongo_link_target && $hongo_link_target != 'one_page' ) ? ' target="'.esc_attr( $hongo_link_target ).'"' : '';
        $section_link_class = ( $hongo_link_target == 'one_page' ) ? ' section-link' : '';

        // Responsive typography & alt font
        $hongo_custom_title_class  = ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        ( $hongo_enable_title_alternate_font == 1 ) ? $hongo_custom_title_class .= ' alt-font' : '';
        $hongo_custom_counter_class  = ( $hongo_font_counter_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_counter_setting ) : '';
        ( $hongo_enable_counter_alternate_font == 1 ) ? $hongo_custom_counter_class .= ' alt-font' : '';

        // Animation 
        $hongo_counter_animation_duration = ( $hongo_counter_animation_duration ) ? $hongo_counter_animation_duration : '2000';
        ( $initial_loading_animation && $initial_loading_animation != 'none' ) ? $classes[] = 'wow '.$initial_loading_animation : '';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

        $classes[] = 'counter-style';

        // Class List
        $class_list = ( $classes ) ? implode(" ", $classes) : '';
        $class_icon_attr = ( $classes_icon ) ? ' ' . implode( " ", $classes_icon ) : '';

        switch ( $hongo_counter_style ) {

            case 'counter-style1':

                $hongo_counter_element_tag = ( $hongo_counter_element_tag ) ? $hongo_counter_element_tag : 'h6';
                $hongo_counter_style1 = ( $hongo_counter_style1 ) ? $hongo_counter_style1 : 0;
                $hongo_counter_style1 = $hongo_counter_style1 + 1;

                // Hover Border Style & Size
                if( $hongo_box_hover_border_size ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.' { border-width: '.$hongo_box_hover_border_size.' !important; }';
                }
                if( $hongo_box_hover_border_color ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.':hover { border-color: '.$hongo_box_hover_border_color.' !important; }';
                }
                if( $hongo_enable_border == 0 ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.':hover ,.counter-style1-'.$hongo_counter_style1.'{ border: none; }';
                }

                // Link Color Style
                if( $hongo_icon_color ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.' a.counter-icon-link, .counter-style1-'.$hongo_counter_style1.' i { color: '.$hongo_icon_color.'; }';
                }
                // Link hover Color Style
                if( $hongo_icon_hover_color ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.' a.counter-icon-link, .counter-style1-'.$hongo_counter_style1.' i:hover { color: '.$hongo_icon_hover_color.'; }';
                }
                if( $hongo_link_hover_color ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.' a:hover i.link-icon, .counter-style1-'.$hongo_counter_style1.' a.counter-number-link:hover '.$hongo_counter_element_tag.', .counter-style1-'.$hongo_counter_style1.' a.counter-title-link:hover { color: '.$hongo_link_hover_color.'!important; }';
                }

                // custom icon width
                if( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.counter-style1-'.$hongo_counter_style1.' .counter-box img { max-width:'.$custom_icon_max_width.' }';
                }

                if ( $custom_icon_image || $counter_icon || $counter_number || $title ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).' counter-style1-'.$hongo_counter_style1.'"'.$hongo_animation_duration.'>';

                        $output .= '<div class="counter-box">';

                            // Icon & Custom Icon Image
                            if ( ( $custom_icon == 1 && ! empty( $custom_icon_image ) ) || $counter_icon ) {

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-icon-link'. esc_attr( $section_link_class ) .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                }

                                    if( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {

                                        $output .= hongo_get_image_html( $custom_icon_image, 'full', 'icon-image' );

                                    } elseif( $counter_icon ) {

                                        $output .= '<i class="link-icon'.esc_attr( $class_icon_attr ).'"></i>';
                                    }

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }

                            }
                            // Counter Number
                            if( $counter_number ) {

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'counter' || $hongo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-number-link'. esc_attr( $section_link_class ) .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                }

                                    $output .= '<'.$hongo_counter_element_tag.' data-postfix="'.$number_postfix.'" data-to="'.esc_attr( $counter_number ).'" data-speed="'.esc_attr( $hongo_counter_animation_duration ).'" class="timer'.esc_attr( $hongo_custom_counter_class ).'">';
                                        $output .= $counter_number;
                                    $output .= '</'.$hongo_counter_element_tag.'>';

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'counter' || $hongo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }

                            }
                            // Title
                            if( $title ) {

                                $output .= '<'.$hongo_title_element_tag.' class="counter-title'.esc_attr( $hongo_custom_title_class ).'">';

                                    if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '<a class="counter-title-link'. esc_attr( $section_link_class ). esc_attr( $hongo_custom_title_class ) .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                    }

                                        $output .= $title;

                                    if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }

                                $output .= '</'.$hongo_title_element_tag.'>';

                            }

                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'counter-style2':

                $hongo_counter_style2 = ! empty( $hongo_counter_style2 ) ? $hongo_counter_style2 : 0;
                $hongo_counter_style2 = $hongo_counter_style2 + 1;
                $hongo_counter_element_tag = ( $hongo_counter_element_tag ) ? $hongo_counter_element_tag : 'h6';
                // Link Color Style
                if( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.counter-style2-'.$hongo_counter_style2.' a.counter-icon-link, .counter-style2-'.$hongo_counter_style2.' i { color: '.$hongo_icon_color.'; }';
                }
                // Link hover Color Style
                if( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.counter-style2-'.$hongo_counter_style2.':hover i { color: '.$hongo_icon_hover_color.'; }';
                }
                if( ! empty( $hongo_link_hover_color ) ) {
                    $hongo_featured_array[] = '.counter-style2-'.$hongo_counter_style2.' a.counter-icon-link:hover i.link-icon, .counter-style2-'.$hongo_counter_style2.' a.counter-number-link:hover '.$hongo_counter_element_tag.', .counter-style2-'.$hongo_counter_style2.' a.counter-title-link:hover { color: '.$hongo_link_hover_color.'!important; }';
                }

                // Seprator Style
                if( $hongo_enable_separator == 1 ) {
                    if( ! empty( $hongo_separator_color ) ) {
                        $hongo_featured_array[] = '.counter-style2-'.$hongo_counter_style2.' i ~ .feature-content:after, .counter-style2-'.$hongo_counter_style2.' .icon-image ~ .feature-content:after, .counter-style2-'.$hongo_counter_style2.' a ~ .feature-content:after { background-color:'.$hongo_separator_color.'; }';
                    }
                } else{
                    $hongo_featured_array[] = '.counter-style2-'.$hongo_counter_style2.' i ~ .feature-content:after, .counter-style2-'.$hongo_counter_style2.' .icon-image ~ .feature-content:after{ display:none }';
                }

                // custom icon width
                if( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.counter-style2-'.$hongo_counter_style2.' img { max-width:'.$custom_icon_max_width.' }';
                }

                if ( $custom_icon_image || $counter_icon || $counter_number || $title ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).' counter-style2-'.$hongo_counter_style2.'"'.$hongo_animation_duration.'>';

                        // Icon & Custom Icon Image
                        if ( ( $custom_icon == 1 && ! empty( $custom_icon_image ) ) || $counter_icon ) {

                            if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                $output .= '<a class="counter-icon-link'. $section_link_class .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                            }

                                if( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {

                                    $output .= hongo_get_image_html( $custom_icon_image, 'full', 'icon-image' );
                                    
                                } elseif( $counter_icon ) {

                                    $output .= '<i class="link-icon'.esc_attr( $class_icon_attr ).'"></i>';
                                }

                            if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }

                        $output .= '<div class="feature-content">';
                            // Counter Number
                            if( $counter_number ) {

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'counter' || $hongo_link_on == 'all' ) ) {
                                    $output .= '<a class="text-extra-dark-gray counter-number-link'. esc_attr( $section_link_class ) .esc_attr( $hongo_custom_counter_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                }

                                    $output .= '<'.$hongo_counter_element_tag.' data-postfix="'.esc_attr( $number_postfix ).'" data-to="'.esc_attr( $counter_number ).'" data-speed="'.esc_attr( $hongo_counter_animation_duration ).'" class="timer'.esc_attr( $hongo_custom_counter_class ).'">';
                                        $output .= $counter_number;
                                    $output .= '</'.$hongo_counter_element_tag.'>';

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'counter' || $hongo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }
                            // Title
                            if( $title ) {

                                $output .= '<'.$hongo_title_element_tag.' class="counter-title'.esc_attr( $hongo_custom_title_class ).'">';

                                    if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '<a class="counter-title-link'. esc_attr( $section_link_class ). esc_attr( $hongo_custom_title_class ) .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                    }

                                        $output .= $title;

                                    if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$hongo_title_element_tag.'>';
                            }

                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'counter-style3':

                $hongo_counter_style3 = ! empty( $hongo_counter_style3 ) ? $hongo_counter_style3 : 0;
                $hongo_counter_style3 = $hongo_counter_style3 + 1;

                // Link Color Style
                if( ! empty( $hongo_link_hover_color ) ) {
                    $hongo_featured_array[] = '.counter-style3-'.$hongo_counter_style3.' a.counter-number-link:hover, .counter-style3-'.$hongo_counter_style3.' a.counter-title-link:hover { color: '.$hongo_link_hover_color.'!important; }';
                }
                // Seprator Style
                if( $hongo_enable_separator == 1 ) {
                    if( ! empty( $hongo_separator_color ) ) {
                        $hongo_featured_array[] = '.counter-style3-'.$hongo_counter_style3.':before{ background-color:'.$hongo_separator_color.'; }';
                    }
                } else{
                    $hongo_featured_array[] = '.counter-style3-'.$hongo_counter_style3.':before{ display:none }';
                }

                $hongo_counter_element_tag = ( $hongo_counter_element_tag ) ? $hongo_counter_element_tag : 'h5';

                if ( $counter_number || $title ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).' counter-style3-'.$hongo_counter_style3.'"'.$hongo_animation_duration.'>';

                            // Counter Number
                            if( $counter_number ) {

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'counter' || $hongo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-number-link'. esc_attr( $section_link_class ).esc_attr( $hongo_custom_counter_class ) .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                }

                                    $output .= '<'.$hongo_counter_element_tag.' data-postfix="'.esc_attr( $number_postfix ).'" data-to="'.esc_attr( $counter_number ).'" data-speed="'.esc_attr( $hongo_counter_animation_duration ).'" class="timer'.esc_attr( $hongo_custom_counter_class ).'">';
                                        $output .= $counter_number;
                                    $output .= '</'.$hongo_counter_element_tag.'>';

                                if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'counter' || $hongo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }
                            // Title
                            if( $title ) {

                                $output .= '<'.$hongo_title_element_tag.' class="counter-title'.esc_attr( $hongo_custom_title_class ).'">';

                                    if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '<a class="counter-title-link'. esc_attr( $section_link_class ). esc_attr( $hongo_custom_title_class ) .'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                                    }

                                        $output .= $title;

                                    if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }

                                $output .= '</'.$hongo_title_element_tag.'>';
                            }

                    $output .= '</div>';
                }
            break;

        }
        return $output;
    }
}
add_shortcode( 'hongo_counter_or_skill', 'hongo_counter_or_skill_shortcode' );