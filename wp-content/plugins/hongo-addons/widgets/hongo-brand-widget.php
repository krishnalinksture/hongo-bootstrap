<?php
/**
 * WooCommerce Product Brand Widget.
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_addons_brand_widget' ) ) {
    function hongo_addons_brand_widget() {
        register_widget( 'Hongo_Addons_Brand_Widget' );
    }
}
add_action( 'widgets_init', 'hongo_addons_brand_widget' );

if ( ! class_exists('Hongo_Addons_Brand_Widget') ) {
	class Hongo_Addons_Brand_Widget extends WP_Widget {

		/**
		 * Register hongo brand widget.
		 */
		function __construct() {
			parent::__construct(
				'Hongo_Addons_Brand_Widget', // Base ID
				__('Hongo Product Brands', 'hongo-addons'), // Name
				array( 'description' => __( 'Display a list of your Brands on your site.', 'hongo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			global $wp_query, $post;
	                
	        if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) ) {
	            return;
	        }
	            
			$current_brand_obj = false;
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before_widget'];
				if ( ! empty( $title ) ) {
					echo $args['before_title'] . $title . $args['after_title'];
				}
					$get_terms="product_brand";
				
				if ( is_tax( 'product_brand' ) ) {
					$current_brand_obj = $wp_query->queried_object;
				}	
				if ( is_tax( 'product_cat' ) ) {

					$current_brand_obj = $wp_query->queried_object;

				} elseif ( is_singular( 'product' ) ) {

					$product_brand = wc_get_product_terms( $post->ID, 'product_brand', array( 'orderby' => 'parent' ) );

					if ( $product_brand ) {
						$current_brand_obj   = end( $product_brand );
					}

				}
				
		        $get_terms_args = array( 'hide_empty' => '1', 'orderby' => 'name' );

				$categories = get_terms( 'product_brand', $get_terms_args );

				if ( ! empty( $categories ) && !is_wp_error( $categories ) ) {
					echo '<ul class="product-brands">';
				 	foreach( (array) $categories as $term ) { 
				  		$count = $current_brand = '';

	                    if( $current_brand_obj != false ){
	                        $current_brand = ( $current_brand_obj->term_id == $term->term_id ) ? ' current-cat' : '';
	                    }

					  	if($instance['post_counts']==1) {
					   		$count='<span class="count"><span> '. str_pad($term->count, 2, 0, STR_PAD_LEFT) .'</span></span>';
					   	}
						echo'<li class="cat-item cat-item-'.$term->term_id.$current_brand.'"><a href="'.get_term_link( $term ).'">'.esc_html( $term->name ).'</a>'.$count.'</li>';
					}
					echo '</ul>';
					
				}
			echo $args['after_widget'];
		}

		public function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'post_counts' => '' ) );
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','hongo-addons'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked( '1', $instance['post_counts'] ); ?> id="<?php echo $this->get_field_id('post_counts'); ?>" name="<?php echo $this->get_field_name('post_counts'); ?>" value="1" />
				<label for="<?php echo $this->get_field_id('post_counts'); ?>"><?php _e('Show product counts','hongo-addons'); ?></label>
			</p>
			<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['post_counts'] = isset($new_instance['post_counts'] ) ? (int) $new_instance['post_counts'] : 0;
			return $instance;
		}
	}
}