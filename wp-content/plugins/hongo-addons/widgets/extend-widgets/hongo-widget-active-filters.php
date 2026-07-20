<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Layered Navigation Filters Widget
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
// Register and load the widget
if ( ! function_exists( 'hongo_addons_widget_active_filters' ) ) {
    function hongo_addons_widget_active_filters() {
        register_widget( 'Hongo_Addons_Widget_Active_Filters' );
    }
}
add_action( 'widgets_init', 'hongo_addons_widget_active_filters' );

class Hongo_Addons_Widget_Active_Filters extends WC_Widget_Layered_Nav_Filters {

	function __construct() {
        parent::__construct();
	}

    public function clear_filter_url() {

        if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
            $link = home_url();
        } elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) {
            $link = get_post_type_archive_link( 'product' );
        } elseif ( is_product_category() ) {
            $link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
        } elseif ( is_product_tag() ) {
            $link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
        } else {
            $queried_object = get_queried_object();
            $link = get_term_link( $queried_object->slug, $queried_object->taxonomy );
        }

        // Given filter for current page url
        $link = apply_filters( 'hongo_filter_current_page_url', $link );

        return $link;
    }

	public function widget( $args, $instance ) {
        if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) ) {
            return;
        }

        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        $min_price          = isset( $_GET['min_price'] ) ? wc_clean( $_GET['min_price'] ) : 0;
        $max_price          = isset( $_GET['max_price'] ) ? wc_clean( $_GET['max_price'] ) : 0;
        $rating_filter      = isset( $_GET['rating_filter'] ) ? array_filter( array_map( 'absint', explode( ',', $_GET['rating_filter'] ) ) ) : array();
        $base_link          = $this->get_page_base_url();

        // Given filter for current page url
        $base_link = apply_filters( 'hongo_filter_current_page_url', $base_link );

        ob_start();

            // Last link of active filter link
            do_action( 'hongo_active_filter_link', $base_link );

        $other_links = ob_get_contents();
        ob_get_clean();

        if ( 0 < count( $_chosen_attributes ) || 0 < $min_price || 0 < $max_price || ! empty( $rating_filter ) || ! empty( $other_links ) ) {

            $this->widget_start( $args, $instance );

            $hongo_enable_shop_all_filter_ajax = get_theme_mod( 'hongo_enable_shop_all_filter_ajax', '1' );
            $filter_class =  ( $hongo_enable_shop_all_filter_ajax == 1 ) ? ' hongo-active-filter-ajax' : '';

            echo '<ul class="hongo-active-filter'.$filter_class.'">';

                // Attributes
                if ( ! empty( $_chosen_attributes ) ) {
                    foreach ( $_chosen_attributes as $taxonomy => $data ) {
                        foreach ( $data['terms'] as $term_slug ) {
                            if ( ! $term = get_term_by( 'slug', $term_slug, $taxonomy ) ) {
                                continue;
                            }

                            $filter_name    = 'filter_' . sanitize_title( str_replace( 'pa_', '', $taxonomy ) );
                            $current_filter = isset( $_GET[ $filter_name ] ) ? explode( ',', wc_clean( $_GET[ $filter_name ] ) ) : array();
                            $current_filter = array_map( 'sanitize_title', $current_filter );
                            $new_filter     = array_diff( $current_filter, array( $term_slug ) );

                            $link = remove_query_arg( array( 'add-to-cart', $filter_name ), $base_link );

                            if ( sizeof( $new_filter ) > 0 ) {
                                $link = add_query_arg( $filter_name, implode( ',', $new_filter ), $link );
                            }

                            echo '<li class="chosen"><a rel="nofollow" aria-label="' . esc_attr__( 'Remove filter', 'hongo-addons' ) . '" href="' . esc_url( $link ) . '">' . esc_html( $term->name ) . '</a></li>';
                        }
                    }
                }

                if ( $min_price ) {
                    $link = remove_query_arg( 'min_price', $base_link );
                    echo '<li class="chosen"><a rel="nofollow" aria-label="' . esc_attr__( 'Remove filter', 'hongo-addons' ) . '" href="' . esc_url( $link ) . '">' . sprintf( __( 'Min %s', 'hongo-addons' ), wc_price( $min_price ) ) . '</a></li>';
                }

                if ( $max_price ) {
                    $link = remove_query_arg( 'max_price', $base_link );
                    echo '<li class="chosen"><a rel="nofollow" aria-label="' . esc_attr__( 'Remove filter', 'hongo-addons' ) . '" href="' . esc_url( $link ) . '">' . sprintf( __( 'Max %s', 'hongo-addons' ), wc_price( $max_price ) ) . '</a></li>';
                }

                if ( ! empty( $rating_filter ) ) {
                    foreach ( $rating_filter as $rating ) {
                        $link_ratings = implode( ',', array_diff( $rating_filter, array( $rating ) ) );
                        $link  = $link_ratings ? add_query_arg( 'rating_filter', $link_ratings ) : remove_query_arg( 'rating_filter', $base_link );
                        echo '<li class="chosen"><a rel="nofollow" aria-label="' . esc_attr__( 'Remove filter', 'hongo-addons' ) . '" href="' . esc_url( $link ) . '">' . sprintf( esc_html__( 'Rated %s out of 5', 'hongo-addons' ), esc_html( $rating ) ) . '</a></li>';
                    }
                }
                
                // Other active links
                echo sprintf( "%s", $other_links );

            echo '</ul>';

            $hongo_enable_shop_all_filter_ajax = get_theme_mod( 'hongo_enable_shop_all_filter_ajax', '1' );
            $filter_class =  ( $hongo_enable_shop_all_filter_ajax == 1 ) ? ' hongo-clear-all-filters-ajax' : '';

            // Clear all filters
            echo '<a class="hongo-clear-all-filters'.$filter_class.'" rel="nofollow" aria-label="' . esc_attr__( 'Clear', 'hongo-addons' ) . '" href="' . esc_url( $this->clear_filter_url() ) . '">' . esc_attr__( 'Clear', 'hongo-addons' ) . '</a>'
            ;

            $this->widget_end( $args );
        }
    }

    /**
     * Get current page URL for layered nav items.
     *
     * @return string
     */
    protected function get_page_base_url() {
        if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
            $link = home_url();
        } elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) {
            $link = get_post_type_archive_link( 'product' );
        } elseif ( is_product_category() ) {
            $link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
        } elseif ( is_product_tag() ) {
            $link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
        } else {
            $queried_object = get_queried_object();
            $link = get_term_link( $queried_object->slug, $queried_object->taxonomy );
        }

        // Brands
        if ( isset( $_GET['filter_brand'] ) ) {
            $link = add_query_arg( 'filter_brand', wc_clean( $_GET['filter_brand'] ), $link );
        }

        // Min/Max
        if ( isset( $_GET['min_price'] ) ) {
            $link = add_query_arg( 'min_price', wc_clean( $_GET['min_price'] ), $link );
        }

        if ( isset( $_GET['max_price'] ) ) {
            $link = add_query_arg( 'max_price', wc_clean( $_GET['max_price'] ), $link );
        }

        // Order by
        if ( isset( $_GET['orderby'] ) ) {
            $link = add_query_arg( 'orderby', wc_clean( $_GET['orderby'] ), $link );
        }

        /**
         * Search Arg.
         * To support quote characters, first they are decoded from &quot; entities, then URL encoded.
         */
        if ( get_search_query() ) {
            $link = add_query_arg( 's', rawurlencode( wp_specialchars_decode( get_search_query( false ) ) ), $link );
        }

        // Post Type Arg
        if ( isset( $_GET['post_type'] ) ) {
            $link = add_query_arg( 'post_type', wc_clean( $_GET['post_type'] ), $link );
        }

        // Min Rating Arg
        if ( isset( $_GET['rating_filter'] ) ) {
            $link = add_query_arg( 'rating_filter', wc_clean( $_GET['rating_filter'] ), $link );
        }

        // All current filters
        if ( $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes() ) {
            foreach ( $_chosen_attributes as $name => $data ) {
                $filter_name = sanitize_title( str_replace( 'pa_', '', $name ) );
                if ( ! empty( $data['terms'] ) ) {
                    $link = add_query_arg( 'filter_' . $filter_name, implode( ',', $data['terms'] ), $link );
                }
                if ( 'or' == $data['query_type'] ) {
                    $link = add_query_arg( 'query_type_' . $filter_name, 'or', $link );
                }
            }
        }

        // Add other active filter link
        $link = apply_filters( 'hongo_active_filter_base_link', $link );

        return $link;
    }
}
