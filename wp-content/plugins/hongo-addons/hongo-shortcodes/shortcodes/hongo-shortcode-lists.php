<?php
/**
 * Shortcode For Lists
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Lists */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_lists_shortcode' ) ) {
    function hongo_lists_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $hongo_list_style1, $hongo_list_style2, $hongo_list_style3, $hongo_list_style4, $hongo_list_style5, $hongo_list_style6, $hongo_list_style7, $hongo_list_style8, $hongo_list_style9;

        extract( 
            shortcode_atts( 
                array(
                    'id' => '',
                    'class' => '',
                    'hongo_list_style' => '',
                    'hongo_list_values' => '',

                    'hongo_main_bg_color' => '',
                    'hongo_alternative_bg_color' => '',
                    'hongo_border_color' => '',
                    'hongo_border_size' => '',

                    'hongo_list_number_font' => '',
                    'hongo_list_title_font' => '',
                    'hongo_list_content_font' => '',
                ), $atts
            )
        );

        $output = '';

        if( ! empty( $hongo_list_values ) ) {

            $classes = array();

            $hongo_list_values = ! empty( $hongo_list_values ) ? json_decode( urldecode( $hongo_list_values ) ) : array();

            $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
            $class = ( $class ) ? $classes[] = $class : '';

            // Responsive typography
            $font_settings_number_class = ! empty( $hongo_list_number_font ) ? hongo_shortcode_custom_css_class( $hongo_list_number_font ) : '';
            $font_settings_title_class = ! empty( $hongo_list_title_font ) ? hongo_shortcode_custom_css_class( $hongo_list_title_font ) : '';
            $font_settings_content_class = ! empty( $hongo_list_content_font ) ? hongo_shortcode_custom_css_class( $hongo_list_content_font ) : '';

            $class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

            if( ! empty( $hongo_list_values ) ) {

                switch ( $hongo_list_style ) {

                    case 'list-style-1':

                        $hongo_list_style1 = ! empty( $hongo_list_style1 ) ? $hongo_list_style1 : 0;
                        $hongo_list_style1 = $hongo_list_style1 + 1;

                        $output .= '<ul'.$id.' class="list-style list-style-1 list-style1-'.$hongo_list_style1.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ($hongo_list_values as $values) {
                                if( ! empty( $values->hongo_list_value ) ){
                                    $output .= '<li>'.$values->hongo_list_value.'</li>';
                                }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-2':
                        
                        $hongo_list_style2 = ! empty( $hongo_list_style2 ) ? $hongo_list_style2 : 0;
                        $hongo_list_style2 = $hongo_list_style2 + 1;

                        // Border Color & size
                        if ( $hongo_border_color ) {
                            $hongo_featured_array[] = '.list-style2-'.$hongo_list_style2. ' li { border-bottom-color:'.$hongo_border_color.'!important; }';
                        }
                        if ( $hongo_border_size ) {
                            $hongo_featured_array[] = '.list-style2-'.$hongo_list_style2. ' li { border-bottom-width:'.$hongo_border_size.' !important; }';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-2 list-style2-'.$hongo_list_style2.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            $list_count = 0;
                            $i = 1;
                            $list_count=count( $hongo_list_values );
                            foreach ( $hongo_list_values as $values ) {
                                if( ! empty( $values->hongo_list_value ) ){
                                    if( $i <= $list_count ){
                                        $i = ( $i <= 9 ) ? '0'.$i : $i;
                                        $output .= '<li><b class="base-color list-lable-number'.esc_attr( $font_settings_number_class ).'">'.$i.'.</b><span>'.$values->hongo_list_value.'</span></li>';
                                        $i++;
                                    }
                                }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-3':

                        $hongo_list_style3 = ! empty( $hongo_list_style3 ) ? $hongo_list_style3 : 0;
                        $hongo_list_style3 = $hongo_list_style3 + 1;

                        // Border Color & size
                        if ( $hongo_border_color ) {
                            $hongo_featured_array[] = '.list-style3-'.$hongo_list_style3. ' li { border-bottom-color:'.$hongo_border_color.' !important; }';
                        }
                        if ( $hongo_border_size ) {
                            $hongo_featured_array[] = '.list-style3-'.$hongo_list_style3. ' li { border-bottom-width:'.$hongo_border_size.' !important; }';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-3 list-style3-'.$hongo_list_style3.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ( $hongo_list_values as $values ) {
                                if( ! empty( $values->hongo_list_value ) ){
                                   $output .= '<li><i class="base-color fa-solid fa-check'.esc_attr( $font_settings_number_class ).'"></i><span>'.$values->hongo_list_value.'</span></li>';
                                }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-4':

                        $hongo_list_style4 = ! empty( $hongo_list_style4 ) ? $hongo_list_style4 : 0;
                        $hongo_list_style4 = $hongo_list_style4 + 1;

                        // Border Color & size
                        if ( $hongo_border_color ) {
                            $hongo_featured_array[] = '.list-style4-'.$hongo_list_style4. ' li { border-color:'.$hongo_border_color.' !important; border-bottom-color:'.$hongo_border_color.' !important;}';
                        }
                        if ( $hongo_border_size ) {
                            $hongo_featured_array[] = '.list-style4-'.$hongo_list_style3. ' li { border-width:'.$hongo_border_size.' !important; border-bottom-width:'.$hongo_border_size.' !important;}';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-4 list-style4-'.$hongo_list_style4.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ( $hongo_list_values as $values ) {
                               if( ! empty( $values->hongo_list_value ) ){
                                   $output .= '<li><i class="fa-regular fa-dot-circle'.esc_attr( $font_settings_number_class ).'"></i><span>'.$values->hongo_list_value.'</span></li>';
                               }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-5':

                        $hongo_list_style5 = ! empty( $hongo_list_style5 ) ? $hongo_list_style5 : 0;
                        $hongo_list_style5 = $hongo_list_style5 + 1;

                        $output .= '<ul'.$id.' class="list-style list-style-5 list-style5-'.$hongo_list_style5.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ( $hongo_list_values as $values ) {
                               if( ! empty( $values->hongo_list_value ) ){
                                   $output .= '<li><i class="base-color fa-solid fa-minus'.esc_attr( $font_settings_number_class ).'"></i><span>'.$values->hongo_list_value.'</span></li>';
                               }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-6':

                        $hongo_list_style6 = ! empty( $hongo_list_style6 ) ? $hongo_list_style6 : 0;
                        $hongo_list_style6 = $hongo_list_style6 + 1;

                        // Main bg color
                        if ( $hongo_main_bg_color ) {
                            $hongo_featured_array[] = '.list-style6-'.$hongo_list_style6. ' li:nth-child(2n+1) { background-color:'.$hongo_main_bg_color.'!important; }';
                        }

                        // Alternative bg color
                        if ( $hongo_alternative_bg_color ) {
                            $hongo_featured_array[] = '.list-style6-'.$hongo_list_style6. ' li:nth-child(2n) { background-color:'.$hongo_alternative_bg_color.'!important; }';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-6 list-style6-'.$hongo_list_style6.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ( $hongo_list_values as $values ) {
                               if( ! empty( $values->hongo_list_value ) ){
                                   $output .= '<li><i class="base-color fa-solid fa-check'.esc_attr( $font_settings_number_class ).'"></i><span>'.$values->hongo_list_value.'</span></li>';
                               }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-7':

                        $hongo_list_style7 = ! empty( $hongo_list_style7 ) ? $hongo_list_style7 : 0;
                        $hongo_list_style7 = $hongo_list_style7 + 1;

                        // Border Color & size
                        if ( $hongo_border_color ) {
                            $hongo_featured_array[] = '.list-style7-'.$hongo_list_style7. ' li { border-bottom-color:'.$hongo_border_color.' !important; }';
                        }
                        if ( $hongo_border_size ) {
                            $hongo_featured_array[] = '.list-style7-'.$hongo_list_style7. ' li { border-bottom-width:'.$hongo_border_size.' !important; }';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-7 list-style7-'.$hongo_list_style7.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ( $hongo_list_values as $values ) {
                               if( ! empty( $values->hongo_list_value ) ){
                                   $output .= '<li><span>'.$values->hongo_list_value.'</span></li>';
                               }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-8':

                        $hongo_list_style8 = ! empty( $hongo_list_style8 ) ? $hongo_list_style8 : 0;
                        $hongo_list_style8 = $hongo_list_style8 + 1;

                        // Border Color & size
                        if ( $hongo_border_color ) {
                            $hongo_featured_array[] = '.list-style8-'.$hongo_list_style8. ' li { border-bottom-color:'.$hongo_border_color.' !important; }';
                        }
                        if ( $hongo_border_size ) {
                            $hongo_featured_array[] = '.list-style8-'.$hongo_list_style8. ' li { border-bottom-width:'.$hongo_border_size.' !important; }';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-8 list-style8-'.$hongo_list_style8.esc_attr( $class_list ).esc_attr( $font_settings_title_class ).'">';
                            foreach ( $hongo_list_values as $values ) {
                               if( ! empty( $values->hongo_list_value ) ){
                                   $output .= '<li><i class="base-color fa-solid fa-arrow-right'.esc_attr( $font_settings_number_class ).'"></i><span>'.$values->hongo_list_value.'</span></li>';
                               }
                            }
                        $output .= '</ul>';
                    break;

                    case 'list-style-9':

                        $hongo_list_style9 = ! empty( $hongo_list_style9 ) ? $hongo_list_style9 : 0;
                        $hongo_list_style9 = $hongo_list_style9 + 1;

                        // Border Color & size
                        if ( $hongo_border_color ) {
                            $hongo_featured_array[] = '.list-style9-'.$hongo_list_style9. ' li { border-bottom-color:'.$hongo_border_color.' !important; }';
                        }
                        if ( $hongo_border_size ) {
                            $hongo_featured_array[] = '.list-style9-'.$hongo_list_style9. ' li { border-bottom-width:'.$hongo_border_size.' !important; }';
                        }

                        $output .= '<ul'.$id.' class="list-style list-style-9 list-style9-'.$hongo_list_style9.esc_attr( $class_list ).'">';
                            foreach ($hongo_list_values as $values) {
                                if( ! empty( $values->hongo_list_value ) || ! empty( $values->hongo_list_content ) ) {
                                    $output .= '<li>';
                                        if( ! empty( $values->hongo_list_value ) ) {
                                            $output .= '<div class="alt-font'.esc_attr( $font_settings_title_class ).'">' . $values->hongo_list_value . '</div>';
                                        }
                                        if( ! empty( $values->hongo_list_content ) ) {
                                            $output .= '<p class="'.esc_attr( $font_settings_content_class ).'">' . $values->hongo_list_content . '</p>';
                                        }
                                    $output .= '</li>';
                                }
                            }
                        $output .= '</ul>';
                    break;

                }
            }
        }
        return $output;
    }
}
add_shortcode( 'hongo_lists', 'hongo_lists_shortcode' );