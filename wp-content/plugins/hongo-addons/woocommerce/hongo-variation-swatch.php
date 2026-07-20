<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/****** Variation Swatch template functions start ******/

// To add Color & Image Attribute Hooks
if( ! function_exists( 'hongo_addons_init_attribute_hooks' ) ) {
    function hongo_addons_init_attribute_hooks() {
        $attribute_taxonomies = wc_get_attribute_taxonomies();

        if ( empty( $attribute_taxonomies ) ) {
            return;
        }

        foreach ( $attribute_taxonomies as $tax ) {
            add_action( 'pa_' . $tax->attribute_name . '_add_form_fields', 'hongo_addons_add_attribute_fields' );
            add_action( 'pa_' . $tax->attribute_name . '_edit_form_fields', 'hongo_addons_edit_attribute_fields', 10 , 2 );

            add_filter( 'manage_edit-pa_' . $tax->attribute_name . '_columns', 'hongo_addons_add_attribute_columns' );
            add_filter( 'manage_pa_' . $tax->attribute_name . '_custom_column', 'hongo_addons_add_attribute_column_content', 10 , 3 );
        }

        add_action( 'created_term', 'hongo_addons_save_attribute_fields', 10, 3);
        add_action( 'edit_term', 'hongo_addons_save_attribute_fields', 10, 3 );
    }
}

// Add Attribute Types & Color Picker and Image Upload
if( ! function_exists( 'hongo_addons_add_attribute_fields' ) ) {
    function hongo_addons_add_attribute_fields() {

    	$output = '';

        $output .= '<div class="form-field">';
            $output .= '<label for="term-label">'. esc_html__( 'Select Type', 'hongo-addons' ) .'</label>';
            $output .= '<select name="hongo_attribute_type" id="hongo_attribute_type" class="hongo-attribute-type">';
                $output .= '<option value="">'.esc_html__( 'Select Type', 'hongo-addons' ).'</option>';
                $output .= '<option value="hongo_color">'.esc_html__( 'Color', 'hongo-addons' ).'</option>';
                $output .= '<option value="hongo_image">'.esc_html__( 'Image', 'hongo-addons' ).'</option>';
            $output .= '</select>';
        $output .= '</div>';

        // Color
        $output .= '<div class="form-field hongo-attribute-color">';
            $output .= '<label for="term-label">'. esc_html__( 'Select Color', 'hongo-addons' ) .'</label>';
            $output .= '<input type="textarea" id="hongo_attribute_color" class="hongo-color-picker" name="hongo_color" value="" />';
        $output .= '</div>';

        // Image
        $output .= '<div class="form-field hongo-attribute-image">';
            $output .= '<label for="hongo_attribute_image">'.esc_html__( 'Image', 'hongo-addons' ).'</label>';
            $output .= '<input name="hongo_attribute_image" class="upload_field" id="hongo_upload" type="text" value="" />';
            $output .= '<input name="hongo_attribute_image" class="hongo_attribute_image_thumb" id="hongo_attribute_image_thumb" type="hidden" value="" />';
            $output .= '<img class="upload_image_screenshort" src="" />';
            $output .= '<input class="hongo_upload_button_category" id="hongo_upload_button_category" type="button" value="'.esc_html__( 'Browse', 'hongo-addons' ).'" />';
            $output .= '<span class="hongo_remove_attribute button">'.esc_html__( 'Remove', 'hongo-addons' ) .'</span>';
        $output .= '</div>';

        printf( '%s', $output);
    }
}

// Edit Attribute Types & Color Picker and Image Upload
if( ! function_exists( 'hongo_addons_edit_attribute_fields' ) ) {
    function hongo_addons_edit_attribute_fields( $term, $taxonomy ) {

        $output = '';
        $attribute_value = ! empty( get_term_meta( $term->term_id, 'hongo_attribute_type', true ) ) ? get_term_meta( $term->term_id, 'hongo_attribute_type', true ) : ''; 
        $color_value = ! empty( get_term_meta( $term->term_id, 'hongo_color', true ) ) ? get_term_meta( $term->term_id, 'hongo_color', true ) : '';
        $image_value = ! empty( get_term_meta( $term->term_id, 'hongo_image', true ) ) ? get_term_meta( $term->term_id, 'hongo_image', true ) : '';          
        
        // attribute type
        $output .= '<tr class="form-field">';
            $output .= '<th scope="row" valign="top"><label for="hongo_attribute_type">'.esc_html__( 'Attribute Type', 'hongo-addons' ).'</label></th>';
            $output .= '<td>';
                $output .= '<select name="hongo_attribute_type" id="" class="hongo-attribute-type">';
                    $output .= '<option value="" '. selected( $attribute_value, '', false ) .'>'.esc_html__( 'None', 'hongo-addons' ).'</option>';
                    $output .= '<option value="hongo_color" '. selected( $attribute_value, 'hongo_color', false ) .'>'.esc_html__( 'Color', 'hongo-addons' ).'</option>';
                    $output .= '<option value="hongo_image" '. selected( $attribute_value, 'hongo_image', false ) .'>'.esc_html__( 'Image', 'hongo-addons' ).'</option>';
                $output .= '</select>';
            $output .= '</td>';
        $output .= '</tr>';

        // Color
        $output .= '<tr class="form-field hongo-attribute-color">';
            $output .= '<th scope="row" valign="top"><label for="hongo_color">'.esc_html__( 'Color', 'hongo-addons' ).'</label></th>';
            $output .= '<td>';
                $output .= '<input type="text" name="hongo_color" id="hongo_color" class="hongo-color-picker" value="'.esc_attr( $color_value ).'">';
            $output .= '</td>';
        $output .= '</tr>';

        // Image            
        $output .= '<tr class="form-field hongo-attribute-image">';
            $output .= '<th scope="row" valign="top"><label for="hongo_image">'.esc_html__( 'Image', 'hongo-addons' ).'</label></th>';
            $output .= '<td>';
                $output .= '<input name="hongo_attribute_image" class="upload_field" id="hongo_upload" type="text" value="'.esc_attr( $image_value ).'" />';
                $output .= '<input name="hongo_attribute_image" class="hongo_attribute_image_thumb" id="hongo_attribute_image_thumb" type="hidden" value="" />';
                $output .= '<img class="upload_image_screenshort_view" src="'.esc_attr( $image_value ).'" />';
                $output .= '<input class="hongo_upload_button_category" id="hongo_upload_button_category" type="button" value="'.esc_html__( 'Browse', 'hongo-addons' ).'" />';
                $output .= '<span class="hongo_remove_attribute button">'.esc_html__( 'Remove', 'hongo-addons' ) .'</span>';
            $output .= '</td>';
        $output .= '</tr>';

        printf( '%s', $output);
    }
}

// Save Attributes
if( ! function_exists( 'hongo_addons_save_attribute_fields' ) ) {
    function hongo_addons_save_attribute_fields( $term_id, $tt_id, $taxonomy ) {

        if( isset( $_POST['hongo_attribute_type'] ) && !is_wp_error( $_POST['hongo_attribute_type'] ) ) {

            update_term_meta( $term_id, 'hongo_attribute_type', $_POST['hongo_attribute_type'] );

            if ( isset( $_POST['hongo_color'] ) ) {
                update_term_meta( $term_id, 'hongo_color', $_POST['hongo_color'] );
            }

            if( isset( $_POST['hongo_attribute_image'] ) ) {
                update_term_meta( $term_id, 'hongo_image', $_POST['hongo_attribute_image'] );
            }

        }

    }
}

// Add Attribute Column In WordPress Admin
if( ! function_exists( 'hongo_addons_add_attribute_columns' ) ) {
    function hongo_addons_add_attribute_columns( $columns ) {

        $new_columns          = array();
        $new_columns['cb']    = ! empty( $columns['cb'] ) ? $columns['cb'] : '';
        $new_columns['thumb'] = '';
        unset( $columns['cb'] );

        return array_merge( $new_columns, $columns );

    }
}

// Add Attribute Column In WordPress Admin
if( ! function_exists( 'hongo_addons_add_attribute_column_content' ) ) {
    function hongo_addons_add_attribute_column_content( $columns, $column, $term_id ) {

        $attribute_value = ! empty( get_term_meta( $term_id, 'hongo_attribute_type', true ) ) ? get_term_meta( $term_id, 'hongo_attribute_type', true ) : '';

        if( ! empty( $attribute_value ) && !is_wp_error( $attribute_value ) ) {
            switch( $attribute_value) {
                case 'hongo_color':
                    $value = ! empty( get_term_meta( $term_id, 'hongo_color', true ) ) ? get_term_meta( $term_id, 'hongo_color', true ) : '';
                    printf( '<div class="swatch-preview swatch-color" style="background-color:%s;"></div>', esc_attr( $value ) );
                    break;

                case 'hongo_image':
                    $value = ! empty( get_term_meta( $term_id, 'hongo_image', true ) ) ? get_term_meta( $term_id, 'hongo_image', true ) : '';
                    echo wp_get_attachment_image_src( $value );
                    $image = $value ? $value : '';                  
                    $image = $image ? $image : WC()->plugin_url() . '/assets/images/placeholder.png';
                    printf( '<img class="swatch-preview swatch-image" src="%s" width="44px" height="44px">', esc_url( $image ) );
                    break;
            }   
        } else {
            $term = get_term( $term_id );
            printf( '<div class="swatch-preview swatch-label">%s</div>', esc_html( $term->name ) );
        }
    }
}

// Output a list of variation attributes for use in the cart forms.

if ( ! function_exists( 'hongo_addons_dropdown_variation_attribute_options' ) ) {

    function hongo_addons_dropdown_variation_attribute_options( $args = array() ) {

        $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected'         => false,
            'name'             => '',
            'id'               => '',
            'class'            => '',
            'show_option_none' => __( 'Choose an option', 'hongo-addons' ),
        ) );

        // Get selected value.
        if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
            $selected_key     = 'attribute_' . sanitize_title( $args['attribute'] );
            $args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] ); // WPCS: input var ok, CSRF ok, sanitization ok.
        }

        $options               = $args['options'];
        $product               = $args['product'];
        $attribute             = $args['attribute'];
        $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
        $class                 = ! empty( $args['class'] ) ? ' '.$args['class'] : '';
        $show_option_none      = (bool) $args['show_option_none'];
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'hongo-addons' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

        if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[ $attribute ];
        }

        $html  = '<div class="hongo-attribute-filter alt-font'. esc_attr( $class ).'" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';

        if ( ! empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms( $product->get_id(), $attribute, array(
                    'fields' => 'all',
                ) );
                $hongo_single_product_variation_swatch_tooltip = hongo_option('hongo_single_product_variation_swatch_tooltip', '0' );
                foreach ( $terms as $term ) {

                    $attrbute_type = get_term_meta( $term->term_taxonomy_id, 'hongo_attribute_type', true);
                    $hongo_color = get_term_meta( $term->term_taxonomy_id, 'hongo_color', true);
                    $hongo_image = get_term_meta( $term->term_taxonomy_id, 'hongo_image', true);
                    $variation_swatch_tooltip = ( $hongo_single_product_variation_swatch_tooltip == '1' ) ? ' data-original-title="' . esc_attr( $term->name ) . '" data-placement="top"' : '';

                    if ( in_array( $term->slug, $options, true ) ) {

                        if( ! empty( $attrbute_type ) && ( ! empty( $hongo_color ) || ! empty( $hongo_image ) ) ) {

                            if( ! empty( $hongo_color ) ) {

                                $active_class = sanitize_title( $args['selected'] ) == $term->slug ? ' active' : '';
                                $html .= '<div class="hongo-swatch hongo-attribute-color' . $active_class . '" style="background-color:' . $hongo_color . '"' . $variation_swatch_tooltip . 'data-value="' . esc_attr( $term->slug ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</div>';
                            } elseif( ! empty( $hongo_image ) ) {
                                $active_class = sanitize_title( $args['selected'] ) == $term->slug ? ' active' : '';

                                $html .= '<div class="hongo-swatch hongo-attribute-image'.$active_class.'" style="background-image:url('.$hongo_image.')"' . $variation_swatch_tooltip . ' data-value="' . esc_attr( $term->slug ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</div>';
                            }

                        } else {

                            $active_class = sanitize_title( $args['selected'] ) == $term->slug ? ' active' : '';
                            $html .= '<div class="hongo-swatch hongo-attribute-label' . $active_class . '"' . $variation_swatch_tooltip . 'data-value="' . esc_attr( $term->slug ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</div>';
                        }
                    }
                }
            } else {
                foreach ( $options as $option ) {
                    
                    $active_class = ( ( sanitize_title( $args['selected'] ) == $option ) || ( $args['selected'] == $option ) ) ? ' active' : '';
                    $html    .= '<div class="hongo-swatch hongo-attribute-label'.$active_class.'" data-value="' . esc_attr( $option ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</div>';
                }
            }
        }

        $html .= '</div>';

        echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args ); // WPCS: XSS ok.
    }
}

if( ! function_exists( 'hongo_single_product_variation_after' ) ) {
	function hongo_single_product_variation_after( $options, $attribute_name, $product ) {

		$hongo_single_product_variation_swatch_style = hongo_option( 'hongo_single_product_variation_swatch_style', 'boxed' );
		$variation_class = ( $hongo_single_product_variation_swatch_style == 'boxed' ) ? ' hongo-attribute-style' : '';

		if( $hongo_single_product_variation_swatch_style == 'boxed' ) {

			hongo_addons_dropdown_variation_attribute_options( array(
				'options'   => $options,
				'attribute' => $attribute_name,
				'product'   => $product,
			) );
		}
	}
}

/****** Variation Swatch template functions end ******/

/****** Variation Swatch hooks start ******/

/**
 * To add Color & Image Attribute Hooks
 *
 * @see hongo_addons_init_attribute_hooks()
 */

add_action( 'admin_init', 'hongo_addons_init_attribute_hooks' );

/**
 * Variation.php file template overright
 *
 * @see hongo_single_product_variation_after()
 */
add_action( 'hongo_single_product_variation_after', 'hongo_single_product_variation_after', 10, 3 );

/****** Variation Swatch hooks end ******/
