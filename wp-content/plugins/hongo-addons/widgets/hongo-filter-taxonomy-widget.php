<?php
/**
 * WooCommerce Filter Products by Taxonomy Widget.
 *
 * @package Hongo
 */

use Automattic\WooCommerce\Internal\ProductAttributesLookup\LookupDataStore;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register and load the widget.
if ( ! function_exists( 'hongo_addons_taxonomy_filter_widget' ) ) {
	function hongo_addons_taxonomy_filter_widget() {
		register_widget( 'Hongo_Addons_Taxonomy_Filter_Widget' );
	}
}
add_action( 'widgets_init', 'hongo_addons_taxonomy_filter_widget' );

if ( ! class_exists( 'Hongo_Addons_Taxonomy_Filter_Widget' ) ) {
	class Hongo_Addons_Taxonomy_Filter_Widget extends WC_Widget {

		/**
		 * Register hongo taxonomy widget.
		 */
		function __construct() {
			$this->widget_cssclass    = 'woocommerce hongo-product-taxonomy-filter';
			$this->widget_description = __( 'Display a list of categories, brands, tags and other to filter products in your store.', 'hongo-addons' );
			$this->widget_id          = 'Hongo_Addons_Taxonomy_Filter_Widget';
			$this->widget_name        = __( 'Hongo Filter Products by Taxonomy', 'hongo-addons' );
			parent::__construct();

			// Display products based on taxonomy filter.
			add_filter( 'woocommerce_product_query_tax_query', array( $this, 'hongo_override_woocommerce_product_query_tax_query' ) );

			// Append filter taxonomy into filter url.
			add_filter( 'woocommerce_layered_nav_link', array( $this, 'hongo_override_filter_link' ) );
			add_filter( 'woocommerce_rating_filter_link', array( $this, 'hongo_override_filter_link' ) );

			add_filter( 'hongo_active_filter_base_link', array( $this, 'hongo_active_filter_base_link' ) );
			add_filter( 'hongo_taxonomy_filter_link', array( $this, 'hongo_active_filter_base_link' ) );
			add_action( 'hongo_active_filter_link', array( $this, 'hongo_active_filter_link' ) );
		}

		/**
		 * Get attribute lookup table name.
		 *
		 * @return string
		 */
		public function lookup_table_name() {
			return wc_get_container()->get( LookupDataStore::class )->get_lookup_table_name();
		}

		public function hongo_active_filter_base_link( $base_link ) {

			$filter_widget_data = $this->hongo_get_filter_category_data();

			if ( ! empty( $filter_widget_data ) ) {
				foreach ( $filter_widget_data as $taxonomy ) { // $data
					if ( ! empty( $taxonomy ) ) { // $data['taxonomy_type']

						//$taxonomy     = $data['taxonomy_type'];
						$filter_name  = ! empty( $taxonomy ) ? str_replace( 'product', 'sorting', $taxonomy ) : '';
						if ( ! empty( $_GET[ $filter_name ] ) ) {
							$sorting_query_type = isset( $_GET['sorting_query_type'] ) ? $_GET['sorting_query_type'] : '';
							$base_link = add_query_arg( 'sorting_query_type', $sorting_query_type, $base_link );
							$base_link = add_query_arg( $filter_name, wc_clean( $_GET[ $filter_name ] ), $base_link );
						}
					}
				}
			}
			return $base_link;
		}

		public function hongo_active_filter_link( $base_link ) {

			$filter_widget_data = $this->hongo_get_filter_category_data();

			if ( ! empty( $filter_widget_data ) ) {

				foreach ( $filter_widget_data as $taxonomy ) {

					if ( ! empty( $taxonomy ) ) {
						//$taxonomy 		= $data['taxonomy_type'];
						$filter_name = ! empty( $taxonomy ) ? str_replace( 'product', 'sorting', $taxonomy ) : '';
						if ( ! empty( $_GET[ $filter_name ] ) ) { // Check filter taxonomy in request url.

							$current_terms = explode( ',', wc_clean( $_GET[ $filter_name ] ) );
							if ( ! empty( $current_terms ) ) {

								if ( 1 == count( $current_terms ) ){
									$base_link = remove_query_arg( 'sorting_query_type', $base_link );
								}

								foreach ( $current_terms as $key => $term_slug ) {

									$new_filter_terms = $current_terms;

									if ( ! $term = get_term_by( 'slug', $term_slug, $taxonomy ) ) {
										continue;
									}

									$link = remove_query_arg( $filter_name, $base_link );

									unset( $new_filter_terms[ $key ] ); // Remove Current Taxonomy.
									if ( ! empty( $new_filter_terms ) ) {

										$link = add_query_arg( $filter_name, implode( ',', $new_filter_terms ), $link );
									}

									echo '<li class="chosen"><a rel="nofollow" aria-label="' . esc_attr__( 'Remove filter', 'hongo-addons' ) . '" href="' . esc_url( $link ) . '">' . esc_html( $term->name ) . '</a></li>';
								}
							}
						}
					}
				}
			}
		}

		/**
		 * Checks if the product attribute filtering via lookup table feature is enabled.
		 *
		 * @return bool
		 */
		public function filtering_via_lookup_table_is_active() {
			return 'yes' === get_option( 'woocommerce_attribute_lookup_enabled' );
		}

		/**
		 * Get the query for counting products by terms NOT using the product attributes lookup table.
		 *
		 * @param \WP_Tax_Query  $tax_query The current main tax query.
		 * @param \WP_Meta_Query $meta_query The current main meta query.
		 * @param array          $term_ids The term ids to include in the search.
		 * @return array An array of SQL query parts.
		 */
		public function get_product_counts_query_not_using_lookup_table( $tax_query, $meta_query, $term_ids ) {
			global $wpdb;

			$meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
			$tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

			// Generate query.
			$query           = array();
			$query['select'] = "SELECT COUNT( DISTINCT {$wpdb->posts}.ID ) AS term_count, terms.term_id AS term_count_id";
			$query['from']   = "FROM {$wpdb->posts}";
			$query['join']   = "
				INNER JOIN {$wpdb->term_relationships} AS term_relationships ON {$wpdb->posts}.ID = term_relationships.object_id
				INNER JOIN {$wpdb->term_taxonomy} AS term_taxonomy USING( term_taxonomy_id )
				INNER JOIN {$wpdb->terms} AS terms USING( term_id )
				" . $tax_query_sql['join'] . $meta_query_sql['join'];

			$term_ids_sql   = '(' . implode( ',', array_map( 'absint', $term_ids ) ) . ')';
			$query['where'] = "
				WHERE {$wpdb->posts}.post_type IN ( 'product' )
				AND {$wpdb->posts}.post_status = 'publish'
				{$tax_query_sql['where']} {$meta_query_sql['where']}
				AND terms.term_id IN $term_ids_sql";

			$search_query_sql = \WC_Query::get_main_search_query_sql();
			if ( $search_query_sql ) {
				$query['where'] .= ' AND ' . $search_query_sql;
			}

			$query['group_by'] = 'GROUP BY terms.term_id';

			return $query;
		}

		/**
		 * Get the query for counting products by terms using the product attributes lookup table.
		 *
		 * @param \WP_Tax_Query  $tax_query The current main tax query.
		 * @param \WP_Meta_Query $meta_query The current main meta query.
		 * @param string         $taxonomy The attribute name to get the term counts for.
		 * @param array          $term_ids The term ids to include in the search.
		 * @return array An array of SQL query parts.
		 */
		public function get_product_counts_query_using_lookup_table( $tax_query, $meta_query, $taxonomy, $term_ids ) {
			global $wpdb;

			$meta_query_sql    = $meta_query->get_sql( 'post', $this->lookup_table_name(), 'product_or_parent_id' );
			$tax_query_sql     = $tax_query->get_sql( $this->lookup_table_name(), 'product_or_parent_id' );
			$hide_out_of_stock = 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' );
			$in_stock_clause   = $hide_out_of_stock ? ' AND in_stock = 1' : '';

			$query           = array();
			$query['select'] = 'SELECT COUNT(DISTINCT product_or_parent_id) as term_count, term_id as term_count_id';
			$query['from']   = "FROM {$this->lookup_table_name()}";
			$query['join']   = "
				{$tax_query_sql['join']} {$meta_query_sql['join']}
				INNER JOIN {$wpdb->posts} ON {$wpdb->posts}.ID = {$this->lookup_table_name()}.product_or_parent_id";

			$encoded_taxonomy = sanitize_title( $taxonomy );
			$term_ids_sql     = '(' . implode( ',', array_map( 'absint', $term_ids ) ) . ')';
			$query['where']   = "
				WHERE {$wpdb->posts}.post_type IN ( 'product' )
				AND {$wpdb->posts}.post_status = 'publish'
				{$tax_query_sql['where']} {$meta_query_sql['where']}
				AND {$this->lookup_table_name()}.taxonomy='{$encoded_taxonomy}'
				AND {$this->lookup_table_name()}.term_id IN $term_ids_sql
				{$in_stock_clause}";

			if ( ! empty( $term_ids ) ) {
				$attributes_to_filter_by = \WC_Query::get_layered_nav_chosen_attributes();

				if ( ! empty( $attributes_to_filter_by ) ) {
					$and_term_ids = array();

					foreach ( $attributes_to_filter_by as $taxonomy => $data ) {
						if ( 'and' !== $data['query_type'] ) {
							continue;
						}
						$all_terms             = get_terms( $taxonomy, array( 'hide_empty' => false ) );
						$term_ids_by_slug      = wp_list_pluck( $all_terms, 'term_id', 'slug' );
						$term_ids_to_filter_by = array_values( array_intersect_key( $term_ids_by_slug, array_flip( $data['terms'] ) ) );
						$and_term_ids          = array_merge( $and_term_ids, $term_ids_to_filter_by );
					}

					if ( ! empty( $and_term_ids ) ) {
						$terms_count   = count( $and_term_ids );
						$term_ids_list = '(' . join( ',', $and_term_ids ) . ')';
						// The extra derived table ("SELECT product_or_parent_id FROM") is needed for performance
						// (causes the filtering subquery to be executed only once).
						$query['where'] .= "
							AND product_or_parent_id IN ( SELECT product_or_parent_id FROM (
								SELECT product_or_parent_id
								FROM {$this->lookup_table_name()} lt
								WHERE is_variation_attribute=0
								{$in_stock_clause}
								AND term_id in {$term_ids_list}
								GROUP BY product_id
								HAVING COUNT(product_id)={$terms_count}
								UNION
								SELECT product_or_parent_id
								FROM {$this->lookup_table_name()} lt
								WHERE is_variation_attribute=1
								{$in_stock_clause}
								AND term_id in {$term_ids_list}
							) temp )";
					}
				} else {
					$query['where'] .= $in_stock_clause;
				}
			} elseif ( $hide_out_of_stock ) {
				$query['where'] .= " AND {$this->lookup_table_name()}.in_stock=1";
			}

			$search_query_sql = \WC_Query::get_main_search_query_sql();
			if ( $search_query_sql ) {
				$query['where'] .= ' AND ' . $search_query_sql;
			}

			$query['group_by'] = 'GROUP BY terms.term_id';
			$query['group_by'] = "GROUP BY {$this->lookup_table_name()}.term_id";

			return $query;
		}

		/**
		 * Get data from database for this widget
		 *
		 * @return string
		 */
		protected function hongo_get_filter_category_data() {

			$filter_widget_data = array();

			$args = array(
				'public'      => true,
				'_builtin'    => false,
				'object_type' => array( 'product' ),
			);

			$all_public_product_taxonomies = get_taxonomies( $args );

			if ( $all_public_product_taxonomies ) {
				foreach ( $all_public_product_taxonomies as $taxonomy_name => $taxonomy_data ) {
					$filter_widget_data[] = $taxonomy_name;
				}
			}

			return $filter_widget_data;
		}

		/**
		 * Display products based on taxonomy filter
		 *
		 * @return string
		 */
		public function hongo_override_woocommerce_product_query_tax_query( $tax_query ) {

			$filter_widget_data = $this->hongo_get_filter_category_data();

			if ( ! empty( $filter_widget_data ) ) {
				foreach ( $filter_widget_data as $taxonomy ) {
					if ( ! empty( $taxonomy ) ) {

						//$taxonomy = $data['taxonomy_type'];
						$filter_name = ! empty( $taxonomy ) ? str_replace( 'product', 'sorting', $taxonomy ) : '';
						if ( isset( $_GET['sorting_query_type'] ) && 'and' == $_GET['sorting_query_type'] ) {
							if ( ! empty( $_GET[ $filter_name ] ) ) { // Check filter taxonomy in request url.
								$current_terms  = explode( ',', wc_clean( $_GET[ $filter_name ] ) );
								if ( count( $current_terms ) > 1 ) {
									$tax_query[] = array(
										'taxonomy'         => $taxonomy,
										'field'            => 'slug',
										'terms'            => $current_terms,
										'include_children' => false,
										'operator'         => 'and',
									);
								} else {
									$tax_query[] = array(
										'taxonomy'         => $taxonomy,
										'field'            => 'slug',
										'include_children' => false,
										'terms'            => $current_terms,
									);
								}
							}
						} else {
							if ( ! empty( $_GET[ $filter_name ] ) ) { // Check filter taxonomy in request url.
								$current_terms  = explode( ',', wc_clean( $_GET[ $filter_name ] ) );

								$tax_query[] = array(
									'taxonomy' => $taxonomy,
									'field'    => 'slug',
									'terms'    => $current_terms,
								);
							}
						}
					}
				}
			}
			return $tax_query;
		}

		/**
		 * Append filter taxonomy into filter url
		 *
		 * @return string
		 */
		public function hongo_override_filter_link( $link ) {

			$filter_widget_data = $this->hongo_get_filter_category_data();

			if ( ! empty( $filter_widget_data ) ) {
				foreach ( $filter_widget_data as $taxonomy ) {
					if ( ! empty( $taxonomy ) ) {
						$filter_name = ! empty( $taxonomy ) ? str_replace( 'product', 'sorting', $taxonomy ) : '';
						if ( ! empty( $_GET[ $filter_name ] ) ) {
							$link = add_query_arg( $filter_name, wc_clean( wp_unslash( $_GET[ $filter_name ] ) ), $link );
						}
					}
				}
			}
			return $link;
		}

		public function form( $instance ) {
			$this->init_settings();
			parent::form( $instance );
		}

		public function update( $new_instance, $old_instance ) {
			$this->init_settings();
			return parent::update( $new_instance, $old_instance );
		}

		/**
		 * Init settings after post types are registered.
		 */
		public function init_settings() {

			$all_public_product_taxonomies_options = array( '' => esc_attr__( 'Select', 'hongo-addons' ) );

			$args = array(
				'public'      => true,
				'_builtin'    => false,
				'object_type' => array( 'product' ),
			);

			$output = 'objects'; // or objects.

			$all_public_product_taxonomies = get_taxonomies( $args, $output );

			if ( $all_public_product_taxonomies ) {

				foreach ( $all_public_product_taxonomies as $taxonomy_name => $taxonomy_data ) {

					$all_public_product_taxonomies_options[ $taxonomy_name ] = ! empty( $taxonomy_data->label ) ? $taxonomy_data->label : $taxonomy_name;
				}
			}

			$this->settings = array(
				'title'         => array(
					'type'  => 'text',
					'std'   => esc_attr__( 'Filter by category', 'hongo-addons' ),
					'label' => esc_attr__( 'Title', 'hongo-addons' ),
				),
				'taxonomy_type' => array(
					'type'    => 'select',
					'label'   => esc_attr__( 'Select taxonomy', 'hongo-addons' ),
					'std'     => '',
					'options' => $all_public_product_taxonomies_options,
				),
				'query_type'    => array(
					'type'    => 'select',
					'label'   => esc_attr__( 'Query type', 'hongo-addons' ),
					'std'     => '',
					'options' => array(
						'and' => __( 'AND', 'hongo-addons' ),
						'or'  => __( 'OR', 'hongo-addons' ),
					),
				),
				'orderby'       => array(
					'type'    => 'select',
					'label'   => esc_attr__( 'Order by', 'hongo-addons' ),
					'std'     => '',
					'options' => array(
						''        => __( 'Default', 'hongo-addons' ),
						'term_id' => __( 'Term ID', 'hongo-addons' ),
						'name'    => __( 'Name', 'hongo-addons' ),
						'count'   => __( 'Count', 'hongo-addons' ),
						'parent'  => __( 'Parent', 'hongo-addons' ),
					),
				),
				'order'         => array(
					'type'    => 'select',
					'label'   => esc_attr__( 'Order', 'hongo-addons' ),
					'std'     => '',
					'options' => array(
						''     => __( 'Default', 'hongo-addons' ),
						'asc'  => __( 'ASC', 'hongo-addons' ),
						'desc' => __( 'DESC', 'hongo-addons' ),
					),
				),
				'include'       => array(
					'type'  => 'text',
					'std'   => '',
					'label' => __( 'Include', 'hongo-addons' ),
				),
				'exclude'       => array(
					'type'  => 'text',
					'std'   => '',
					'label' => __( 'Exclude', 'hongo-addons' ),
				),
				'number'        => array(
					'type'  => 'text',
					'std'   => '',
					'label' => __( 'Number', 'hongo-addons' ),
				),
			);
		}

		/**
		 * Get current page URL with append filter parameter
		 */
		public function hongo_get_current_page_url( $taxonomy ) {

			$link = $this->get_current_page_url();

			$filter_widget_data = $this->hongo_get_filter_category_data();
			if ( ! empty( $filter_widget_data ) ) {
				foreach ( $filter_widget_data as $data ) {
					if ( ! empty( $data ) && $data != $taxonomy ) {

						$request_filter_name = ! empty( $data['taxonomy_type'] ) ? str_replace( 'product', 'sorting', $data['taxonomy_type'] ) : '';
						if ( ! empty( $_GET[ $request_filter_name ] ) ) {
							$link = add_query_arg( $request_filter_name, wc_clean( wp_unslash( $_GET[ $request_filter_name ] ) ), $link );
						}
					}
				}
			}
			return $link;
		}

		public function widget( $args, $instance ) {

			if ( ! is_shop() && ! is_product_taxonomy() ) {
				return;
			}

			if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) ) {
				return;
			}

			$taxonomy    = ! empty( $instance['taxonomy_type'] ) ? $instance['taxonomy_type'] : '';
			$query_type  = ! empty( $instance['query_type'] ) ? $instance['query_type'] : 'and';
			$filter_name = ! empty( $taxonomy ) ? str_replace( 'product', 'sorting', $taxonomy ) : '';

			// Skip the term for the current archive.
			if ( $this->get_current_taxonomy() === $taxonomy ) {
				return;
			}

			if ( ! empty( $taxonomy ) && ! taxonomy_exists( $taxonomy ) ) {
				return;
			}

			$get_terms_args = array( 'hide_empty' => '1' );

			if ( ! empty( $instance['include'] ) ) {

				$get_terms_args['include'] = $instance['include'];
			}
			if ( ! empty( $instance['exclude'] ) ) {

				$get_terms_args['exclude'] = $instance['exclude'];
			}

			if ( ! empty( $instance['number'] ) ) {

				$get_terms_args['number'] = $instance['number'];
			}
			if ( ! empty( $instance['orderby'] ) ) {

				$get_terms_args['orderby'] = $instance['orderby'];
			}
			if ( ! empty( $instance['order'] ) ) {

				$get_terms_args['order'] = $instance['order'];
			}

			$terms = get_terms( $taxonomy, $get_terms_args );
			if ( empty( $terms ) || is_wp_error( $terms ) || 0 === count( $terms ) ) {
				return;
			}

			$term_counts = $this->get_filtered_term_product_counts( wp_list_pluck( $terms, 'term_id' ), $taxonomy, $query_type );

			if ( 0 === count( $term_counts ) ) {
				return;
			}

			$this->widget_start( $args, $instance );

			$hongo_enable_shop_all_filter_ajax = get_theme_mod( 'hongo_enable_shop_all_filter_ajax', '1' );
			$taxonomy_filter_class             = ( $hongo_enable_shop_all_filter_ajax == 1 ) ? ' hongo-product-taxonomy-filter-wrap-ajax' : '';

			echo '<ul class="hongo-product-taxonomy-filter-wrap' . esc_html( $taxonomy_filter_class ) . '">';
			foreach ( (array) $terms as $term ) {

				$count = $current_taxonomy = '';

				$current_filter = ! empty( $_GET[ $filter_name ] ) ? explode( ',', wc_clean( $_GET[ $filter_name ] ) ) : array();
				$current_filter = ! empty( $current_filter ) ? array_map( 'sanitize_title', $current_filter ) : array();

				$option_is_set = in_array( $term->slug, $current_filter );
				$count         = isset( $term_counts[ $term->term_id ] ) ? $term_counts[ $term->term_id ] : 0;

				// Only show options with count > 0.
				if ( 0 === $count ) {
					continue;
				}

				$current_taxonomy = ( $option_is_set ) ? ' chosen active' : '';

				$link = $this->hongo_get_current_page_url( $taxonomy );
				$link = apply_filters( 'hongo_taxonomy_filter_link', $link );

				if ( ! in_array( $term->slug, $current_filter ) ) {
					$current_filter[] = $term->slug;
				}

				// Add current filters to URL.
				foreach ( $current_filter as $key => $value ) {

					// Exclude self so filter can be unset on click.
					if ( $option_is_set && $value === $term->slug ) {
						unset( $current_filter[ $key ] );
					}
				}

				if ( ! empty( $current_filter ) ) {

					$link = add_query_arg( 'sorting_query_type', $query_type, $link );
					$link = add_query_arg( $filter_name, implode( ',', $current_filter ), $link );
				} else {
					$link = remove_query_arg( $filter_name, $link );
					$link = remove_query_arg( 'sorting_query_type', $link );
				}

				if ( $count > 0 || $option_is_set ) {
					$link      = esc_url( apply_filters( 'hongo_product_taxonomy_filter_link', $link, $term ) );
					$term_html = '<a class="product-taxonomy-square-link" href="' . esc_url( $link ) . '"><span class="product-taxonomy-checkbox-filter hongo-cb"></span>' . esc_html( $term->name ) . '</a>';
				} else {
					$link      = false;
					$term_html = '<span>' . esc_html( $term->name ) . '</span>';
				}

				$term_html .= ' ' . apply_filters( 'hongo_product_taxonomy_filter_link_count', '<span class="count"><span> ' . str_pad( absint( $count ), 2, 0, STR_PAD_LEFT ) . '</span></span>', $count, $term );

				echo '<li class="wc-layered-nav-term' . esc_attr( $current_taxonomy ) . '">';

				echo wp_kses_post( apply_filters( 'hongo_product_taxonomy_filter_link_html', $term_html, $term, $link, $count ) );

				echo '</li>';
			}
			echo '</ul>';
			$this->widget_end( $args );
		}

		/**
		 * Return the currently viewed taxonomy name.
		 *
		 * @return string
		 */
		protected function get_current_taxonomy() {
			$queried_object = get_queried_object();
			return is_tax() && isset( $queried_object->taxonomy ) ? $queried_object->taxonomy : '';
		}

		/**
		 * Count products within certain terms, taking the main WP query into consideration.
		 *
		 * This query allows counts to be generated based on the viewed products, not all products.
		 *
		 * @param  array  $term_ids Term IDs.
		 * @param  string $taxonomy Taxonomy.
		 * @param  string $query_type Query Type.
		 * @return array
		 */
		protected function get_filtered_term_product_counts( $term_ids, $taxonomy, $query_type ) {

			global $wpdb;

			if ( empty( $term_ids ) ) {

				return;
			}

			$use_lookup_table = $this->filtering_via_lookup_table_is_active();

			$tax_query  = WC_Query::get_main_tax_query();
			$meta_query = WC_Query::get_main_meta_query();

			if ( 'or' === $query_type ) {
				foreach ( $tax_query as $key => $query ) {
					if ( is_array( $query ) && $taxonomy === $query['taxonomy'] ) {
						unset( $tax_query[ $key ] );
					}
				}
			}

			$meta_query = new WP_Meta_Query( $meta_query );
			$tax_query  = new WP_Tax_Query( $tax_query );

			$query = array();
			if ( $use_lookup_table && ( 'product_cat' !== $taxonomy || 'product_tag' !== $taxonomy || 'product_brand' !== $taxonomy ) ) {
				$query = $this->get_product_counts_query_using_lookup_table( $tax_query, $meta_query, $taxonomy, $term_ids );
			} else {
				$query = $this->get_product_counts_query_not_using_lookup_table( $tax_query, $meta_query, $term_ids );
			}

			$query = apply_filters( 'woocommerce_get_filtered_term_product_counts_query', $query );
			$query = implode( ' ', $query );

			// We have a query - let's see if cached results of this query already exist.
			$query_hash = md5( $query );

			$cache = apply_filters( 'woocommerce_layered_nav_count_maybe_cache', true );

			if ( true === $cache ) {
				$cached_counts = (array) get_transient( 'wc_layered_nav_counts_' . sanitize_title( $taxonomy ) );
			} else {
				$cached_counts = array();
			}

			if ( ! isset( $cached_counts[ $query_hash ] ) ) {
			// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				$results                      = $wpdb->get_results( $query, ARRAY_A ); // @codingStandardsIgnoreLine
				$counts                       = array_map( 'absint', wp_list_pluck( $results, 'term_count', 'term_count_id' ) );
				$cached_counts[ $query_hash ] = $counts;
				if ( true === $cache ) {
					set_transient( 'wc_layered_nav_counts_' . sanitize_title( $taxonomy ), $cached_counts, DAY_IN_SECONDS );
				}
			}

			return array_map( 'absint', (array) $cached_counts[ $query_hash ] );
		}
	}
}
