<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Layered Navigation Widget
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
// Register and load the widget
if ( ! function_exists( 'hongo_addons_widget_color_attribute' ) ) {
    function hongo_addons_widget_color_attribute() {
        register_widget( 'Hongo_Addons_Widget_Color_Attribute' );
    }
}
add_action( 'widgets_init', 'hongo_addons_widget_color_attribute' );

class Hongo_Addons_Widget_Color_Attribute extends WC_Widget_Layered_Nav {
	function __construct() {
        parent::__construct();
	}

	public function widget( $args, $instance ) {
        if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) ) {
            return;
        }

        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        $taxonomy           = isset( $instance['attribute'] ) ? wc_attribute_taxonomy_name( $instance['attribute'] ) : $this->settings['attribute']['std'];
        $query_type         = isset( $instance['query_type'] ) ? $instance['query_type'] : $this->settings['query_type']['std'];
        $display_type       = isset( $instance['display_type'] ) ? $instance['display_type'] : $this->settings['display_type']['std'];

        if ( ! taxonomy_exists( $taxonomy ) ) {
            return;
        }

        $get_terms_args = array( 'hide_empty' => '1' );

        $orderby = wc_attribute_orderby( $taxonomy );

        switch ( $orderby ) {
            case 'name' :
                $get_terms_args['orderby']    = 'name';
                $get_terms_args['menu_order'] = false;
            break;
            case 'id' :
                $get_terms_args['orderby']    = 'id';
                $get_terms_args['order']      = 'ASC';
                $get_terms_args['menu_order'] = false;
            break;
            case 'menu_order' :
                $get_terms_args['menu_order'] = 'ASC';
            break;
        }

        $terms = get_terms( $taxonomy, $get_terms_args );

        if( empty( $terms ) || is_wp_error( $terms ) || 0 === count( $terms ) ) {
            return;
        }

        switch ( $orderby ) {
            case 'name_num' :
                usort( $terms, '_wc_get_product_terms_name_num_usort_callback' );
            break;
            case 'parent' :
                usort( $terms, '_wc_get_product_terms_parent_usort_callback' );
            break;
        }

        ob_start();

        $this->widget_start( $args, $instance );

        if ( 'dropdown' === $display_type ) {
            $found = $this->layered_nav_dropdown( $terms, $taxonomy, $query_type );
        } else {
            $found = $this->layered_nav_list( $terms, $taxonomy, $query_type );
        }

        $this->widget_end( $args );

        // Force found when option is selected - do not force found on taxonomy attributes
        if ( ! is_tax() && is_array( $_chosen_attributes ) && array_key_exists( $taxonomy, $_chosen_attributes ) ) {
            $found = true;
        }

        if ( $found ) {
            echo ob_get_clean();
        } else {
            ob_end_clean();
        }
    }

    protected function layered_nav_list( $terms, $taxonomy, $query_type ) {

        $hongo_enable_shop_all_filter_ajax = get_theme_mod( 'hongo_enable_shop_all_filter_ajax', '1' );
        $attribute_class =  ( $hongo_enable_shop_all_filter_ajax == 1 ) ? ' hongo-attribute-filter-ajax' : '';

        // List display
        echo '<ul class="'.str_replace( 'pa_', '', $taxonomy).' clearfix'.$attribute_class.' hongo-attribute-filter">';

        $term_counts = $this->get_filtered_term_product_counts( wp_list_pluck( $terms, 'term_id' ), $taxonomy, $query_type );
        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        $found = false;

        foreach ( $terms as $term ) {

            $current_values = isset( $_chosen_attributes[ $taxonomy ]['terms'] ) ? $_chosen_attributes[ $taxonomy ]['terms'] : array();
            $option_is_set = in_array( $term->slug, $current_values );
            $count = isset( $term_counts[ $term->term_id ] ) ? $term_counts[ $term->term_id ] : 0;

            // Only show options with count > 0
            if ( 0 < $count ) {
                $found = true;
            } elseif ( 'and' === $query_type && 0 === $count && ! $option_is_set ) {
                continue;
            }


            if( 0 === $count ) {
                continue;
            }

            $filter_name    = 'filter_' . sanitize_title( str_replace( 'pa_', '', $taxonomy ) );
            $current_filter = isset( $_GET[ $filter_name ] ) ? explode( ',', wc_clean( $_GET[ $filter_name ] ) ) : array();
            $current_filter = array_map( 'sanitize_title', $current_filter );

            if ( ! in_array( $term->slug, $current_filter ) ) {
                $current_filter[] = $term->slug;
            }

            $link = remove_query_arg( $filter_name, $this->get_current_page_url() );

            // Given filter for current page url
            $link = apply_filters( 'hongo_filter_current_page_url', $link );

            // Add current filters to URL.
            foreach ( $current_filter as $key => $value ) {
                // Exclude query arg for current term archive term
                if ( $value === $this->get_current_term_slug() ) {
                    unset( $current_filter[ $key ] );
                }

                // Exclude self so filter can be unset on click.
                if ( $option_is_set && $value === $term->slug ) {
                    unset( $current_filter[ $key ] );
                }
            }

            if ( ! empty( $current_filter ) ) {
                $link = add_query_arg( $filter_name, implode( ',', $current_filter ), $link );

                // Add Query type Arg to URL
                if ( $query_type === 'or' && ! ( 1 === sizeof( $current_filter ) && $option_is_set ) ) {
                    $link = add_query_arg( 'query_type_' . sanitize_title( str_replace( 'pa_', '', $taxonomy ) ), 'or', $link );
                }
            }

            echo '<li class="wc-layered-nav-term ' . ( $option_is_set ? 'chosen active' : '' ) . '">';

            $attribute_type = get_term_meta( $term->term_id, 'hongo_attribute_type', true );
            
            /* Change for bg color */
            if( ! empty( $attribute_type ) ) {
                // Color Attribute
                if( $attribute_type == 'hongo_color' ) {
                    
                    $taxonomy_color = get_term_meta( $term->term_id, 'hongo_color', true );

                    if( ! empty( $taxonomy_color ) ) {
                        $style = ! empty( $taxonomy_color ) ? ' style="background-color:'.$taxonomy_color.'"' : '';
                        echo ( $count > 0 || $option_is_set ) ? '<a class="attribute-round-link" href="' . esc_url( apply_filters( 'woocommerce_layered_nav_link', $link ) ) . '"><span class="attribute-color-filter" '.$style.'></span>' : '<span>';
                    }
                } else if( $attribute_type == 'hongo_image' ){

                    $taxonomy_image = get_term_meta( $term->term_id, 'hongo_image', true );

                    if( ! empty( $taxonomy_image ) ) {
                        $style = ! empty( $taxonomy_image ) ? ' style="background-image:url('.$taxonomy_image.'); background-size:cover; background-position:50% 50%;"' : '';
                        echo ( $count > 0 || $option_is_set ) ? '<a class="attribute-round-link" href="' . esc_url( apply_filters( 'woocommerce_layered_nav_link', $link ) ) . '"><span class="attribute-color-filter" '.$style.'></span>' : '<span>';
                    }

                } else {
                    echo ( $count > 0 || $option_is_set ) ? '<a class="attribute-square-link" href="' . esc_url( apply_filters( 'woocommerce_layered_nav_link', $link ) ) . '"><span class="attribute-checkbox-filter hongo-cb"></span>' : '<span>';
                }
                
            } else {
                echo ( $count > 0 || $option_is_set ) ? '<a class="attribute-square-link" href="' . esc_url( apply_filters( 'woocommerce_layered_nav_link', $link ) ) . '"><span class="attribute-checkbox-filter hongo-cb"></span>' : '<span>';
            }

            echo esc_html( $term->name );

            echo ( $count > 0 || $option_is_set ) ? '</a> ' : '</span> ';

            echo apply_filters( 'woocommerce_layered_nav_count', '<span class="count">(' . absint( $count ) . ')</span>', $count, $term );

            echo '</li>';
        }

        echo '</ul>';

        return $found;
    }

    /**
     * Show dropdown layered nav.
     *
     * @param  array  $terms Terms.
     * @param  string $taxonomy Taxonomy.
     * @param  string $query_type Query Type.
     * @return bool Will nav display?
     */
    protected function layered_nav_dropdown( $terms, $taxonomy, $query_type ) {
        global $wp;
        $found = false;

        if ( $taxonomy !== $this->get_current_taxonomy() ) {
            $term_counts          = $this->get_filtered_term_product_counts( wp_list_pluck( $terms, 'term_id' ), $taxonomy, $query_type );
            $_chosen_attributes   = WC_Query::get_layered_nav_chosen_attributes();
            $taxonomy_filter_name = wc_attribute_taxonomy_slug( $taxonomy );
            $taxonomy_label       = wc_attribute_label( $taxonomy );

            /* translators: %s: taxonomy name */
            $any_label      = apply_filters( 'woocommerce_layered_nav_any_label', sprintf( __( 'Any %s', 'hongo-addons' ), $taxonomy_label ), $taxonomy_label, $taxonomy );
            $multiple       = 'or' === $query_type;
            $current_values = isset( $_chosen_attributes[ $taxonomy ]['terms'] ) ? $_chosen_attributes[ $taxonomy ]['terms'] : array();

            if ( '' === get_option( 'permalink_structure' ) ) {
                $form_action = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
            } else {
                $form_action = preg_replace( '%\/page/[0-9]+%', '', home_url( trailingslashit( $wp->request ) ) );
            }

            echo '<form method="get" action="' . esc_url( $form_action ) . '" class="woocommerce-widget-layered-nav-dropdown">';
            echo '<select class="woocommerce-widget-layered-nav-dropdown dropdown_layered_nav_' . esc_attr( $taxonomy_filter_name ) . '"' . ( $multiple ? 'multiple="multiple"' : '' ) . '>';
            echo '<option value="">' . esc_html( $any_label ) . '</option>';

            foreach ( $terms as $term ) {

                // If on a term page, skip that term in widget list.
                if ( $term->term_id === $this->get_current_term_id() ) {
                    continue;
                }

                // Get count based on current view.
                $option_is_set = in_array( $term->slug, $current_values, true );
                $count         = isset( $term_counts[ $term->term_id ] ) ? $term_counts[ $term->term_id ] : 0;

                // Only show options with count > 0.
                if ( 0 < $count ) {
                    $found = true;
                } elseif ( 0 === $count && ! $option_is_set ) {
                    continue;
                }

                echo '<option value="' . esc_attr( urldecode( $term->slug ) ) . '" ' . selected( $option_is_set, true, false ) . '>' . esc_html( $term->name ) . '</option>';
            }

            echo '</select>';

            if ( $multiple ) {
                echo '<button class="woocommerce-widget-layered-nav-dropdown__submit" type="submit" value="' . esc_attr__( 'Apply', 'hongo-addons' ) . '">' . esc_html__( 'Apply', 'hongo-addons' ) . '</button>';
            }

            if ( 'or' === $query_type ) {
                echo '<input type="hidden" name="query_type_' . esc_attr( $taxonomy_filter_name ) . '" value="or" />';
            }

            echo '<input type="hidden" name="filter_' . esc_attr( $taxonomy_filter_name ) . '" value="' . esc_attr( implode( ',', $current_values ) ) . '" />';
            echo wc_query_string_form_fields( null, array( 'filter_' . $taxonomy_filter_name, 'query_type_' . $taxonomy_filter_name ), '', true ); // @codingStandardsIgnoreLine
            echo '</form>';

            echo "<script type='text/javascript'>( function($) { 
                // Update value on change.
                jQuery( '.dropdown_layered_nav_" . esc_js( $taxonomy_filter_name ) . "' ).change( function() {
                    var slug = jQuery( this ).val();
                    jQuery( ':input[name=\"filter_" . esc_js( $taxonomy_filter_name ) . "\"]' ).val( slug );

                    // Submit form on change if standard dropdown.
                    if ( ! jQuery( this ).attr( 'multiple' ) ) {
                        jQuery( this ).closest( 'form' ).submit();
                    }
                });

                // Use Select2 enhancement if possible
                if ( jQuery().selectWoo ) {
                    var wc_layered_nav_select = function() {
                        jQuery( '.dropdown_layered_nav_" . esc_js( $taxonomy_filter_name ) . "' ).selectWoo( {
                            placeholder: decodeURIComponent('" . rawurlencode( (string) wp_specialchars_decode( $any_label ) ) . "'),
                            minimumResultsForSearch: 5,
                            width: '100%',
                            allowClear: " . ( $multiple ? 'false' : 'true' ) . ",
                            language: {
                                noResults: function() {
                                    return '" . esc_js( _x( 'No matches found', 'enhanced select', 'hongo-addons' ) ) . "';
                                }
                            }
                        } );
                    };
                    wc_layered_nav_select();
                }
            })(jQuery);</script>";
        }

        return $found;
    }
}