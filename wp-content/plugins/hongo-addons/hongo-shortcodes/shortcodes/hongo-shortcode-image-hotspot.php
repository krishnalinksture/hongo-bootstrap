<?php
/**
 * Shortcode For Image Hotspot
 *
 * @package hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Image Hotspot */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_image_hotspot_shortcode' ) ) {
    function hongo_image_hotspot_shortcode( $atts, $content = null ) {

        global $hongo_testimonial_unique_id, $hongo_featured_array, $hongo_slider_script, $product_details;

        extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'image' => '',
                'hongo_hotspot_data' => '',
                'hongo_hotspot_action' => 'hover',
                'hongo_image_srcset' => '',

                'hongo_box_background_color' => '',
                'hongo_hotspot_background_color' => '',
                'hongo_hotspot_color' => '',
                'hongo_hotspot_spread_color' => '',
                'hongo_hotspot_spread_size' => '',
                'hongo_hotspot_size' => '',
                
                'hongo_button_style' => '',
                'hongo_button_type' => '',
                'hongo_button_setting' => '',

                'hongo_font_title_setting' => '',
                'hongo_enable_alternate_font_title' => '1',

                'hongo_font_price_setting' => '',
                'hongo_enable_alternate_font_price' => '1',
                
                'hongo_font_content_setting' => '',

            ), $atts ) );

        $output = $el_class = $data_atts = $hongo_button_style_class = $data = '';
        $classes = array();

        if( isset( $image ) && ! empty( $image ) ) {
            
            $id = (! empty($id)) ? $id : uniqid('hongo-hotspoted-image-') ;

            wp_register_script( 'hongo-hotspot', HONGO_ADDONS_ROOT_DIR .'/hongo-shortcodes/js/image-hotspot/frontend/hongo-hotspot-frontend.js' );
            wp_enqueue_script( 'hongo-hotspot' );

            $hongo_image_srcset = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';

            // Button Settings
            $button_setting_class   =  ( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
            
            // Product Title Setting  + Alt Font
            $font_setting_class_title  =  ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
            $font_setting_class_title .= ( $hongo_enable_alternate_font_title == 1 ) ? ' alt-font' : '';

            // Product Price Setting  + Alt Font
            $font_setting_class_price  =  ( $hongo_font_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_price_setting ) : '';
            $font_setting_class_price .= ( $hongo_enable_alternate_font_price == 1 ) ? ' alt-font' : '';

            // Product content Setting
            $font_setting_class_content = ( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

            // For button style
            if ( ! empty( $hongo_button_style ) ) {

                $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
            }            

            $hongo_product_data = array();            
            $product_details = ! empty( $product_details ) ? $product_details : array();
            if( hongo_is_woocommerce_activated() ) {

                $main_data = json_decode( urldecode( $hongo_hotspot_data ) );

                // Button Style and Type
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-small';
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                
                if( ! empty( $main_data ) ) {
                    foreach( $main_data as $product_data ) {

                        $product_id = $product_data->Product;

                        $product = wc_get_product( $product_id );

                        if ( is_wp_error( $product ) || empty( $product ) ) {
                            continue;
                        }

                        // All Product Details
                        $product_image  = $product->get_image( $hongo_image_srcset );
                        $product_title  = $product->get_title();
                        $description    = $product->get_short_description();
                        $rating         = wc_get_rating_html( $product->get_average_rating() );
                        $price_html     = $product->get_price_html();                        

                        $class = implode( ' ',
                            array_filter(
                                array(
                                    'product_type_' . $product->get_type(),
                                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button single-add-to-cart' : '',
                                    $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                                    $button_setting_class,
                                )
                            )
                        );

                        $hongo_product_button = apply_filters( 'woocommerce_loop_add_to_cart_link',
                            sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
                                esc_url( $product->add_to_cart_url() ),
                                1,
                                esc_attr( $product->get_id() ),
                                esc_attr( $product->get_sku() ),
                                esc_attr( isset( $class ) ? $class : 'button alt-font btn btn-transparent-black btn-small' ),
                                esc_html( $product->add_to_cart_text() )
                            ),
                        $product );

                        $product_details[$product_id] = $hongo_product_data[$product_id] = array(
                                                                        'ID'                => $product_id,
                                                                        'product_image'     => $product_image,
                                                                        'title'             => $product_title,
                                                                        'description'       => $description,
                                                                        'rating'            => $rating,
                                                                        'price_html'        => $price_html,
                                                                        'page_url'          => get_permalink( $product_id ),
                                                                        'button'            => $hongo_product_button,
                                                                        'title_class'       => $font_setting_class_title,
                                                                        'button_class'      => $button_setting_class,
                                                                        'price_class'       => $font_setting_class_price,
                                                                        'content_class'     => $font_setting_class_content,
                                                                     );

                        $hongo_product_position = array(
                                                    'left'  => esc_html__( 'Left', 'hongo-addons' ),
                                                    'right' => esc_html__( 'Right', 'hongo-addons' ),
                                                    'top'   => esc_html__( 'Top', 'hongo-addons' ),
                                                    'bottom'=> esc_html__( 'Botttom', 'hongo-addons' ),
                        );
                    }
                }
            }

            $hongo_products_json = ! empty( $hongo_product_data ) ? $hongo_product_data : '';            

            $hongo_product_position = ! empty( $hongo_product_position ) ? $hongo_product_position : '';

            wp_localize_script( 'hongo-hotspot', 'hongoHotspotFrontend', array( 'products_json' => $product_details, 'products_position' => $hongo_product_position ) );

            /* Hotspot data */
            if( ! empty( $hongo_hotspot_data ) ) {
                $data_atts .= ' data-hotspot-content="'.esc_attr($hongo_hotspot_data).'" ';               
            }
            
            if(! empty($hongo_hotspot_action)) {
                $el_class .= ' hongo-action-'.$hongo_hotspot_action;
                $data_atts .= ' data-action="'.esc_attr($hongo_hotspot_action).'" ';
            }

            // Box Background color
            if( $hongo_box_background_color ) {
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo-hotspot-common { background-color : '.$hongo_box_background_color.' }';
            }

            // Hotspot Background color
            if( $hongo_hotspot_background_color ) {
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo_addons_hotspot:not(.hongoHotspotImageMarker):before { background-color : '.$hongo_hotspot_background_color.' }';
            }

            // Hotspot color
            if( $hongo_hotspot_color ) {
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo_addons_hotspot:not(.hongoHotspotImageMarker):before { color : '.$hongo_hotspot_color.' }';
            }

            // Hotspot Spread color
            if( $hongo_hotspot_spread_color ) {
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo_addons_hotspot:after { background-color : '.$hongo_hotspot_spread_color.' }';
            }

            // Hotspot Spread size
            if( $hongo_hotspot_spread_size ) {
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo_addons_hotspot:after { top : '.$hongo_hotspot_spread_size.'; left : '.$hongo_hotspot_spread_size.'; right : '.$hongo_hotspot_spread_size.'; bottom : '.$hongo_hotspot_spread_size.' }';
            }

            // Hotspot size
            if( $hongo_hotspot_size ) {
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo_addons_hotspot:not(.hongoHotspotImageMarker) { width : '.$hongo_hotspot_size.'; height : '.$hongo_hotspot_size.' }';
                $hongo_featured_array[] =  '#'.$id.' .hongo-hotspot-wrapper .hongo_addons_hotspot:not(.hongoHotspotImageMarker):before { width : '.$hongo_hotspot_size.'; height : '.$hongo_hotspot_size.'; line-height : '.$hongo_hotspot_size.' }';
            }

            $output .= '<div id="'.esc_attr($id).'" class="hongo-hotspot-main-wrapper">';
                $output .= '<div class="hongo-hotspot-wrapper" '.$data_atts.'>';
                    $output .= '<div class="hongo-hotspot-image-cover'.esc_attr( $el_class ).'">';
                        $output .= wp_get_attachment_image( $image, 'full' );
                    $output .= '</div>';
                $output .= '</div>';
                        
            $output .= '</div>';
        
        }

        return $output;
    }
}
add_shortcode( 'hongo_hotspot', 'hongo_image_hotspot_shortcode' );