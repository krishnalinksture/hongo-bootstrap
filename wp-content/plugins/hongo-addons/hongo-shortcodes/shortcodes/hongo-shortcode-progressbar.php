<?php
/**
 * Shortcode For Progressbar
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Progressbar */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_progress_shortcode' ) ) {
    
    function hongo_progress_shortcode( $atts, $content = null ) {

        global $hongo_progress_unique_id, $hongo_featured_array, $hongo_slider_script;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_progress_style' => '',
            'hongo_progress_values' => '',
            'hongo_progress_height' => '',
            'hongo_default_color' => '',
            'hongo_progress_color' => '',
            'hongo_progress_border_color' => '',
            'hongo_title_element_tag' => '',
            'hongo_enable_alternate_font' => '1',
            'hongo_custom_title' => '',
            'hongo_custom_value' =>'',
        ), $atts ) );

        $output = $hongo_progress_bar_style  = $hongo_progress_id = '';
        $classes = array();

        if( ! empty( $hongo_progress_values ) ) {

            $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
            $class = ( $class ) ? $classes[] = $class : '';
            $classes[] = $hongo_progress_style;

            // Progress unique class
            $hongo_progress_unique_id = ! empty( $hongo_progress_unique_id ) ? $hongo_progress_unique_id : 1;
            $classes[] = $hongo_progress_id = 'hongo-progressbar-' . $hongo_progress_unique_id;
            $hongo_progress_unique_id++;

            $hongo_progress_values = json_decode( urldecode( $hongo_progress_values ) );

            $class_list = ! empty( $classes ) ? implode(" ", $classes) : '';

            // Responsive typography & alt font
            $hongo_custom_title_class  = ! empty( $hongo_custom_title ) ? hongo_shortcode_custom_css_class( $hongo_custom_title ) : '';
            ( $hongo_enable_alternate_font == 1 ) ? $hongo_custom_title_class .= ' alt-font' : '';
            $hongo_title_element_tag = ( $hongo_title_element_tag ) ? $hongo_title_element_tag : 'span';
            $hongo_custom_value_class  = ! empty( $hongo_custom_value ) ? hongo_shortcode_custom_css_class( $hongo_custom_value ) : '';
            ( $hongo_enable_alternate_font == 1 ) ? $hongo_custom_value_class .= ' alt-font' : '';

            // Process bar height
            if ( ! empty( $hongo_progress_height ) ) {
                $hongo_featured_array[] = '.'.$hongo_progress_id. ' .skillbar-bar,.'.$hongo_progress_id. ' .skillbar { height:'.$hongo_progress_height.'; }';
            }
            // Process bar default color
            if ( ! empty( $hongo_default_color ) ) {
                $hongo_featured_array[] = '.'.$hongo_progress_id. ' .skillbar { background-color:'.$hongo_default_color.'; }';
            }
            // Process bar process color
            if ( ! empty( $hongo_progress_color ) ) {
                $hongo_featured_array[] = '.'.$hongo_progress_id. ' .skillbar-bar { background-color:'.$hongo_progress_color.'; }';
            }

            // Process bar process border color
            if ( ! empty( $hongo_progress_border_color ) ) {
                $hongo_featured_array[] = '.'.$hongo_progress_id. ' .skillbar { border-color:'.$hongo_progress_border_color.'; }';
            }            

            $output .='<div'.$id.' class="skillbar-bar-main '.esc_attr( $class_list ).'">';

                if ( ! empty( $hongo_progress_values ) ) {
                    
                    foreach ( $hongo_progress_values as $progress_value ) {

                        $hongo_progress_width    = ! empty( $progress_value->hongo_progress_width ) ? $progress_value->hongo_progress_width : '0';
                        $hongo_progress_title    = ! empty( $progress_value->hongo_progress_title ) ? $progress_value->hongo_progress_title : '';

                        if ( $hongo_progress_width || $hongo_progress_title ) {
                            $output .= '<div class="skillbar" data-percent="'.esc_attr( $hongo_progress_width ).'" >';
                                $output .= '<'.$hongo_title_element_tag.' class="skill-bar-text'.esc_attr( $hongo_custom_title_class ).'">'.$hongo_progress_title.'</'.$hongo_title_element_tag.'>';
                                $output .= '<p class="skillbar-bar"> </p>';
                                $output .= '<span class="skill-bar-percent'.esc_attr( $hongo_custom_value_class ).'"></span>';
                            $output .= '</div>';
                        }
                    }
                }

            $output .='</div>';
        }

        if( hongo_load_javascript_by_key( 'skillbars' ) ) {

            // Skillbars JS
            wp_enqueue_script( 'skillbars' );

            $appear_flag = false;
            if( hongo_load_javascript_by_key( 'jquery-appear' ) ) {

                wp_enqueue_script( 'jquery-appear' );
                $appear_flag = true;
            }

            ob_start(); 
        ?>
                if( $( '.skillbar' ).length > 0 ) {
                    
                    <?php if( $appear_flag ) { ?>

                        $( '.skillbar' ).appear();

                        $( '.skillbar' ).trigger( 'resize' );

                    <?php } else { ?>

                        $( '.skillbar' ).skillBars({
                            from: 0,
                            speed: 4000,
                            interval: 100,
                            decimals: 0
                        });

                    <?php } ?>

                    $( document.body ).on( 'appear', '.skillbar', function (e) {
                        
                        if ( ! $( this ).hasClass( 'skillbar-appear' ) ) {

                            $( this ).addClass( 'skillbar-appear' );
                            $( this ).find('.skillbar-bar').css( "width", "0" );
                            $( this ).skillBars({
                                from: 0,
                                speed: 4000,
                                interval: 100,
                                decimals: 0
                            });
                        }
                    });
                }

        <?php 
            $hongo_slider_script .= ob_get_contents();
            ob_end_clean();
        }

        return $output;
    }
}
add_shortcode( 'hongo_progress', 'hongo_progress_shortcode' );