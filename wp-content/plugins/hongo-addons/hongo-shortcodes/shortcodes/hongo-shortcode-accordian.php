<?php
/**
 * Shortcode For Accordian
 *
 * @package Hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

$hongo_accordian_tab = 0;

if ( ! function_exists( 'hongo_accordion_shortcode' ) ) {

    function hongo_accordion_shortcode( $atts, $content = null ) {

        global $hongo_accordion_unique_id, $hongo_accordian_tab, $hongo_featured_array, $hongo_slider_script;

        extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',
	        'hongo_accordion_style' => '',
            'additional_font_title' => '1',
	        'hongo_accordion' => '',

            'hongo_panel_box_shadow' => '1',
	        'hongo_title_bg_color' => '',
	        'hongo_content_bg_color' => '',
	        'hongo_icon_color' => '',
	        'hongo_active_icon_color' => '',
	        'hongo_border_color' => '',
	        'hongo_left_border_color' => '',
            
	        'hongo_font_title_setting' => '',
	        'hongo_font_content_setting' => '',
	    ), $atts ) );
        
        // Accordion JS
        wp_enqueue_script( 'jquery-ui-accordion' );

        $output = $active = $icon_class = '';

        if ( $hongo_accordion ) {

            $hongo_accordion = json_decode( urldecode( $hongo_accordion ) );

            // Check if accordion id and class
            $hongo_accordion_unique_id  = ! empty( $hongo_accordion_unique_id ) ? $hongo_accordion_unique_id : 1;
            $hongo_accordion_id = ( $id ) ? $id : $hongo_accordion_style;
            $hongo_accordion_id .= '-' . $hongo_accordion_unique_id;
            $hongo_accordion_unique_id++;

            // Panel box shadow
            if ( $hongo_panel_box_shadow == 0 ) {
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel-heading, .'.$hongo_accordion_id. '.panel-group{ box-shadow: none; }';
            }
            // Title BG color 
            if ( $hongo_title_bg_color ) {
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel-title { background-color:'.$hongo_title_bg_color.'; }';
            }
            // Content BG color 
            if ( $hongo_content_bg_color ) {
                if ( $hongo_accordion_style != 'accordion-style-1' ) {
                    $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel-body { background-color:'.$hongo_content_bg_color.'; }';
                } else {
                    $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel-body, .panel-group.'.$hongo_accordion_id. '.panel-heading+.panel-collapse>.panel-body { background-color:'.$hongo_content_bg_color.'!important; }';
                }
            }
            // Icon color 
            if ( $hongo_icon_color ) {
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .pull-right i { color:'.$hongo_icon_color.'; }';
            }
            // Active icon color 
            if ( $hongo_active_icon_color ) {
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .active-accordion i { color:'.$hongo_active_icon_color.'; }';
            }
            // Border color 
            if ( $hongo_border_color ) {
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel, .'.$hongo_accordion_id.' .panel-heading, .'.$hongo_accordion_id.' .panel-body { border-color:'.$hongo_border_color.'!important; }';
                $hongo_featured_array[] = '.panel-group.' . $hongo_accordion_id. ' .panel-heading+.panel-collapse>.panel-body { border-top-color:'.$hongo_border_color.'!important; }';
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .pull-right{ border-left-color:'.$hongo_border_color.'!important; }';
            }
            // Content left border color
            if ( $hongo_left_border_color ) {
                $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel-body, .' . $hongo_accordion_id. ' .pull-right { border-left-color:'.$hongo_left_border_color.'!important; }';
            }

            $font_setting_class_title   = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
            $font_setting_class_title  .= ( $additional_font_title == 1 ) ? ' alt-font' : '';
            $font_setting_class_content = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

            $id = 'id="'.$hongo_accordion_id.'"';
            $class  = ( $class ) ? $classes[] = $class : '';

            $classes[] = $hongo_accordion_style;
            $classes[] = $hongo_accordion_id;

            ( $hongo_accordion_style == 'toggle-style-1' ) ? $classes[] = 'toggles' : '';
            
            // Main class list
            $class_list = ! empty( $classes ) ? ' ' . implode( " ", $classes ) : '';

            $output .='<div '.$id.' class="panel-group'. esc_attr( $class_list ) .'">';
                    
                $hongo_number_count = 0;

                if ( ! empty( $hongo_accordion ) ) {

                    // Accordian slide loop
                    foreach ( $hongo_accordion as $accordion ) {

                        $hongo_accordian_tab++;
                        $hongo_number_count++;
                        $hongo_accordion_title   = ! empty( $accordion->hongo_accordion_title ) ? $accordion->hongo_accordion_title : '';
                        $hongo_accordion_active  = ! empty( $accordion->hongo_accordion_active ) ? $accordion->hongo_accordion_active : '';
                        $hongo_content           = ! empty( $accordion->hongo_content ) ? $accordion->hongo_content : '';

                        // Replace || to <br /> in title
                        $hongo_accordion_title = ( $hongo_accordion_title ) ? str_replace('||', '<br />',$hongo_accordion_title) : '';

                        // Active class & accodian class
                        $active = ( $hongo_accordion_active == '1' ) ? ' active-accordion' : '';
                        $accordion_class = ( $hongo_accordion_active == '1' ) ? ' in' : '';
                        
                        if ( $hongo_accordion_style != 'accordion-style-1' ) {
                            $icon_class = ( $hongo_accordion_active == '1' ) ? 'ti-minus' : 'ti-plus';
                        } else {
                            $icon_class = ( $hongo_accordion_active == '1' ) ? 'ti-arrow-circle-up' : 'ti-arrow-circle-down';    
                        }
                        
                        switch ( $hongo_accordion_style ) {
                            
                            case 'accordion-style-1':

                            	if ( $hongo_accordion_title ||  $hongo_content ) {
                                
    	                            $output .= '<div class="panel">';
    	                                $output .= '<div class="panel-heading'. esc_attr( $active ) .'">';
    	                                    $output .= '<a data-toggle="collapse" data-parent="#'.$hongo_accordion_id.'" href="#accordion-one-link-'.$hongo_accordian_tab.'">';
    	                                        $output .= '<div class="panel-title'. esc_attr( $font_setting_class_title ) .'">'. $hongo_accordion_title;
    	                                            $output .= '<span class="pull-right"><i class="'. esc_attr( $icon_class ) .'"></i></span>';
    	                                        $output .= '</div>';
    	                                    $output .= '</a>';
    	                                $output .= '</div>';
    	                                $output .= '<div id="accordion-one-link-'. esc_attr( $hongo_accordian_tab ) .'" class="panel-collapse collapse'.$accordion_class.'">';
    	                                    $output .= '<div class="panel-body'. esc_attr( $font_setting_class_content ) .'">';
    	                                        if ( ! empty( $hongo_content ) ) {
    	                                            $output .= hongo_remove_wpautop( $hongo_content );
                                                }
    	                                    $output .= '</div>';
    	                                $output .= '</div>';
    	                            $output .= '</div>';

                                        ob_start();
                                    ?>
                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'show.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).addClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-arrow-circle-up"></i>' );
                                            });

                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'hide.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).removeClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-arrow-circle-down"></i>' );
                                            });
                                    <?php 
                                        $hongo_slider_script .= ob_get_contents();
                                        ob_end_clean();
    	                        }
                            break;

                            case 'accordion-style-2':

                            	if ( $hongo_accordion_title ||  $hongo_content ) {                                

    	                            $output .= '<div class="panel panel-default">';
    	                                $output .= '<div class="panel-heading'. esc_attr( $active ) .'" >';
    	                                    $output .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$hongo_accordion_id.'" href="#accordion-one-link-'. esc_attr( $hongo_accordian_tab ) .'">';
    	                                        $output .= '<div class="panel-title'. esc_attr( $font_setting_class_title ) .'">';
    	                                            $output .= '<span class="accordion-title'. esc_attr( $font_setting_class_title ) .'">'.$hongo_accordion_title.'</span>';
    	                                                $output .= '<span class="pull-right"><i class="'. esc_attr( $icon_class ).'"></i></span>';
    	                                        $output .= '</div>';
    	                                    $output .= '</a>';
    	                                $output .= '</div>';
    	                                $output .= '<div id="accordion-one-link-'. esc_attr( $hongo_accordian_tab ) .'" class="panel-collapse collapse'.$accordion_class.'">';
    	                                    $output .= '<div class="panel-body'. esc_attr(  $font_setting_class_content ).'">';
    	                                        if ( ! empty( $hongo_content ) ) {
    	                                            $output .= hongo_remove_wpautop( $hongo_content );
                                                }
    	                                    $output .= '</div>';
    	                                $output .= '</div>';
    	                            $output .= '</div>';

                                        ob_start();
                                    ?>
                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'show.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).addClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title' ).find( 'i' ).addClass( 'ti-minus' ).removeClass( 'ti-plus' );
                                            });

                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'hide.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).removeClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title' ).find( 'i' ).removeClass( 'ti-minus' ).addClass( 'ti-plus' );
                                            });
                                    <?php 
                                        $hongo_slider_script .= ob_get_contents();
                                        ob_end_clean();
    	                        }
                            break;

                            case 'accordion-style-3':

                            	if ( $hongo_accordion_title ||  $hongo_content ) {                                
                                    
    	                            $output .= '<div class="panel">';
    	                                $output .= '<div class="panel-heading'. esc_attr( $active ) .'">';
    	                                    $output .= '<a data-toggle="collapse" data-parent="#'. esc_attr( $hongo_accordion_id ) .'" href="#accordion-one-link-'. esc_attr( $hongo_accordian_tab ) .'">';
    	                                        $output .= '<div class="panel-title'. esc_attr( $font_setting_class_title ).'">'. $hongo_accordion_title;
    	                                            $output .= '<span class="pull-right"><i class="'. esc_attr( $icon_class ).'"></i></span>';
    	                                        $output .= '</div>';
    	                                    $output .= '</a>';
    	                                $output .= '</div>';
    	                                $output .= '<div id="accordion-one-link-'. esc_attr( $hongo_accordian_tab ) .'" class="panel-collapse collapse'.$accordion_class.'">';
    	                                    $output .= '<div class="panel-body'. esc_attr( $font_setting_class_content ).'">';
    	                                        if ( ! empty( $hongo_content ) ) {
    	                                            $output .= hongo_remove_wpautop( $hongo_content );
                                                }
    	                                    $output .= '</div>';
    	                                $output .= '</div>';
    	                            $output .= '</div>';

                                        ob_start();
                                    ?>
                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'show.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).addClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-minus"></i>' );
                                            });

                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'hide.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).removeClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-plus"></i>' );
                                            });
                                    <?php 
                                        $hongo_slider_script .= ob_get_contents();
                                        ob_end_clean();
    	                        }
                            break;

                            case 'accordion-style-4':

                                // Title BG color 
                                if ( $hongo_title_bg_color ) {
                                    $hongo_featured_array[] = '.'.$hongo_accordion_id. ' .panel-heading { background-color:'.$hongo_title_bg_color.' !important; }';
                                }

                                if ( $hongo_accordion_title ||  $hongo_content ) {                                

                                    $output .= '<div class="panel panel-default">';
                                        $output .= '<div class="panel-heading'. esc_attr( $active ).'" >';
                                            $output .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#'. esc_attr( $hongo_accordion_id ) .'" href="#accordion-one-link-'. esc_attr( $hongo_accordian_tab ) .'">';                                            
                                                $output .= '<div class="panel-title'. esc_attr( $font_setting_class_title ) .'">'. $hongo_accordion_title;
                                                    $output .= '<span class="pull-right"><i class="'. esc_attr( $icon_class ).'"></i></span>';
                                                $output .= '</div>';
                                            $output .= '</a>';
                                        $output .= '</div>';
                                        $output .= '<div id="accordion-one-link-'. esc_attr( $hongo_accordian_tab ).'" class="panel-collapse collapse'.$accordion_class.'">';
                                            $output .= '<div class="panel-body'. esc_attr( $font_setting_class_content ) .'">';
                                                if ( ! empty( $hongo_content ) ) {
                                                    $output .= hongo_remove_wpautop( $hongo_content );
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';

                                        ob_start();
                                    ?>
                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'show.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).addClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-minus"></i>' );
                                            });

                                            $( '#<?php echo 'accordion-one-link-'. esc_attr( $hongo_accordian_tab ); ?>.collapse' ).on( 'hide.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).removeClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-plus"></i>' );
                                            });
                                    <?php 
                                        $hongo_slider_script .= ob_get_contents();
                                        ob_end_clean();
                                }
                            break;

                            case 'toggle-style-1':

                            	if ( $hongo_accordion_title ||  $hongo_content ) {                                
                                    
    	                            $output .= '<div class="panel panel-default">';
    	                                $output .= '<div role="tablist" id="toggles-'. esc_attr( $hongo_accordian_tab ).'" class="panel-heading'.esc_attr( $active ).'">';
    	                                    $output .= '<a data-toggle="collapse" href="#toggles-'. esc_attr( $hongo_accordian_tab ) .'Link">';
    	                                        $output .= '<div class="panel-title'. esc_attr( $font_setting_class_title ) .'">'.$hongo_accordion_title.'<span class="pull-right"><i class="'. esc_attr( $icon_class ) .'"></i></span>';
    	                                        $output .= '</div>';
    	                                    $output .= '</a>';
    	                                $output .= '</div>';
    	                                $output .= '<div id="toggles-'. esc_attr( $hongo_accordian_tab ) .'Link" class="panel-collapse collapse'. esc_attr( $accordion_class ) .'">';
    	                                    $output .= '<div class="panel-body'. esc_attr( $font_setting_class_content ) .'">';
    	                                        if ( ! empty( $hongo_content ) ) {
    	                                            $output .= hongo_remove_wpautop( $hongo_content );
                                                }
    	                                    $output .= '</div>';
    	                                $output .= '</div>';
    	                            $output .= '</div>';

                                        ob_start();
                                    ?>
                                            $( '#<?php echo 'toggles-'. esc_attr( $hongo_accordian_tab ) .'Link' ?>.collapse' ).on( 'show.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).addClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-minus"></i>' );
                                            });

                                            $( '#<?php echo 'toggles-'. esc_attr( $hongo_accordian_tab ) .'Link' ?>.collapse' ).on( 'hide.bs.collapse', function () {
                                                var id = $( this ).attr( 'id' );
                                                $( 'a[href="#' + id + '"]' ).closest( '.panel-heading' ).removeClass( 'active-accordion' );
                                                $( 'a[href="#' + id + '"] .panel-title span' ).html( '<i class="ti-plus"></i>' );
                                            });
                                    <?php 
                                        $hongo_slider_script .= ob_get_contents();
                                        ob_end_clean();
    	                        }
                            break;
                        }
                    }
                }
            $output .='</div>';
        }
        return $output;
    }
}
add_shortcode( 'hongo_accordion', 'hongo_accordion_shortcode' );