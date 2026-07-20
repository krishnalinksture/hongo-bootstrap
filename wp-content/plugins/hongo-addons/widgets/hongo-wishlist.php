<?php
/**
 * Wishlist Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_wishlist_widget' ) ) {
    function hongo_wishlist_widget() {
        register_widget( 'hongo_wishlist_widget' );
    }
}
add_action( 'widgets_init', 'hongo_wishlist_widget' );

// Creating the widget
if( ! class_exists( 'hongo_wishlist_widget' ) ) {
	class hongo_wishlist_widget extends WP_Widget {
	    function __construct() {
			parent::__construct(
				// Base ID of your widget
				'hongo_wishlist_widget', 

				// Widget name will appear in UI
				__( 'Hongo Wishlist', 'hongo-addons' ),

				// Widget description
				array( 'description' => __( 'Display the customer Wishlist details.', 'hongo-addons' ), ) 
			);
			// Refresh Wishlist Widget
            add_action( 'hongo_wishlist_refresh_details', array( $this, 'hongo_wishlist_refresh_details' ) );
		}

		// Widget Refresh Details
		public function hongo_wishlist_refresh_details( $data ) {			
			if( ! empty( $data ) ) {
		?>

			<ul>
				<?php
					$original_post = ! empty( $GLOBALS['post'] ) ? $GLOBALS['post'] : array();

	                foreach ( $data as $productid ) {
						
						$GLOBALS['post'] = get_post( $productid ); // WPCS: override ok.
                        setup_postdata( $GLOBALS['post'] );

						global $product;

						if( !$product || 'publish' !== $product->get_status() ) {
		                    continue;
		                }
	                    $image = $product->get_image();
            			$product_title = $product->get_title();
	            ?>
	                    <li>
	                    	<a href="javascript:void(0);" data-product_id="<?php echo $productid; ?>" class="hongo-remove-wish">×</a>
	                    	<a href="<?php echo get_permalink($productid); ?>"> 
		                    	<?php 
		                    		printf( '%s', $image );
		                        	printf( '%s', $product_title );
		                        ?>
	                        </a>
	                        <?php
	                        echo $product->get_price_html();
	                        $class = implode( ' ', 
	                        	array_filter( 
	                        		array(
	                                   'button',
	                                    'product_type_' . $product->get_type(),
	                                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button widget-add-to-cart' : '',
	                                    $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
	                                ) 
	                            ) 
	                        );
	                                
	                        echo $output = apply_filters( 'woocommerce_loop_add_to_cart_link',
	                        	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
	                            	esc_url( $product->add_to_cart_url() ),
	                            	esc_attr( 1 ),
	                            	esc_attr( $product->get_id() ),
	                            	esc_attr( $product->get_sku() ),
	                            	esc_attr( isset( $class ) ? $class : 'button' ),
	                                esc_html( $product->add_to_cart_text() )
	                            ),
	                        $product );
	                ?>
	                    </li>
	                <?php } ?>
	        </ul>
            <?php $hongo_wishlist_id =  get_option('woocommerce_wishlist_page_id'); 
            	if($hongo_wishlist_id != '') { ?>
            		<a href="<?php echo get_permalink($hongo_wishlist_id); ?>" class="hongo-view-wishlist"><?php esc_html_e( 'VIEW WISHLIST', 'hongo-addons' ); ?></a>
            	<?php
            	}
            ?>
	        
        <?php
    		}
		}

		// Creating widget front-end
		public function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', $instance['title'] );

	 		if( is_user_logged_in() ) {
				
				$user_id 	= get_current_user_id();
				$data 		= get_user_meta( $user_id, '_hongo_wishlist', true );
			} else {
				$siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
            	$cookie_name = 'hongo-wishlist'.$siteid;
            	$data = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
	        }
	        $data = ! empty( $data ) ? explode( ',', $data ) : array();
	 		echo $args['before_widget'];
	 		?>
		 		<div class="wishlist_list">

		 			<?php
		 			if ( ! empty( $title ) ) {

		 				echo $args['before_title'] . $title . $args['after_title'];
		 			}
		 			?>
		 			<div class="undo display-none"><?php esc_html_e( 'Product removed. ', 'hongo-addons' ); ?><a href="javascript:void(0);" data-product_id="" class="undo-product"><?php esc_html_e( 'Undo?', 'hongo-addons' ); ?></a></div>
		 			<div class="widget-wishlist-wrap">
			 		<?php
		 				
			 			if( ! empty( $data ) ) {

			 				do_action( 'hongo_wishlist_refresh_details', $data );

			 			} else {
			 				
			 				?>
			 					<p class="wishlist-empty"><?php esc_html_e( 'Your wishlist is currently empty.', 'hongo-addons' ); ?></p>
			 				<?php
				 		}
			 		?>
			 		</div>
		 		</div>
	 		<?php
	 		echo $args['after_widget'];
  
	    } // Widget Backend 
	        
	    public function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	        // Widget admin form
	    ?>
	        <p>
	            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hongo-addons' ); ?></label> 
	            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" />
	        </p>
	        <?php 
	    }

	     
	    // Updating widget replacing old instances with new
	    public function update( $new_instance, $old_instance ) {
	        $instance = array();
	        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

	        return $instance;
	    }

	} // Class hongo_wishlist_widget ends here
}