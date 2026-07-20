<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.0.0
 */

defined( 'ABSPATH' ) || exit;

$hongo_mini_cart_usp_text 		= get_theme_mod( 'hongo_mini_cart_usp_text', '' );
$hongo_mini_cart_layout_style 	= get_theme_mod( 'hongo_mini_cart_layout_style', 'mini-cart-style-1' );
$hongo_mini_cart_layout_style 	= apply_filters( 'hongo_mini_cart_layout_style', $hongo_mini_cart_layout_style );
$hongo_top_cart_class 			= $hongo_mini_cart_layout_style == 'mini-cart-style-1' ? '' : ' mini-cart-slide';
$hongo_header_minicart_icon 	= get_theme_mod( 'hongo_header_minicart_icon', 'icon-basket' );
?>
<div class="hongo-top-cart-wrapper<?php echo esc_attr( $hongo_top_cart_class ); ?>">
	<div class="hongo-cart-top-counter">
		<i class="<?php echo esc_attr( $hongo_header_minicart_icon ); ?> hongo-cart-icon"></i>
		<span class="hongo-mini-cart-counter alt-font"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	</div>
</div>
<?php if( $hongo_mini_cart_layout_style == 'mini-cart-style-1' ) { ?>
	
	<?php if ( ! WC()->cart->is_empty() ) { ?>

		<div class="hongo-mini-cart-content-wrap">

			<div class="hongo-mini-cart-content-inner alt-font">

				<?php do_action( 'woocommerce_before_mini_cart' ); ?>

				<div class="hongo-mini-cart-lists-wrap">
					<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
						<?php
						do_action( 'woocommerce_before_mini_cart_contents' );

						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								/**
								 * This filter is documented in woocommerce/templates/cart/cart.php.
								 *
								 * @since 2.1.0
								 */
								$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
								$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'hongo-popular-posts-thumb' ), $cart_item, $cart_item_key );
								$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
									<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link', 
										sprintf(
											'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_attr__( 'Remove this item', 'hongo' ),
											esc_attr( $product_id ),
											esc_attr( $cart_item_key ),
											esc_attr( $_product->get_sku() )
										), 
										$cart_item_key 
									);
									?>
									<?php if ( ! $_product->is_visible() ) : ?>
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . wp_kses_post ( $product_name ) . '&nbsp;';  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<?php else : ?>
										<a href="<?php echo esc_url( $product_permalink ); ?>">
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . wp_kses_post ( $product_name ) . '&nbsp;';  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</a>
									<?php endif; ?>
									<?php echo wc_get_formatted_cart_item_data( $cart_item );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</li>
								<?php
							}
						}

						do_action( 'woocommerce_mini_cart_contents' );
						?>
					</ul>
				</div>

				<p class="woocommerce-mini-cart__total total alt-font">
					<?php
					/**
					 * woocommerce_widget_shopping_cart_total hook.
					 *
					 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
					 */
					do_action( 'woocommerce_widget_shopping_cart_total' );
					?>
				</p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<p class="woocommerce-mini-cart__buttons buttons alt-font"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

				<?php if( ! empty( $hongo_mini_cart_usp_text ) ) { ?>
					<div class="hongo-mini-cart-info alt-font"><?php echo esc_html( $hongo_mini_cart_usp_text ); ?></div>
				<?php } ?>
				
				<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

				<?php do_action( 'woocommerce_after_mini_cart' ); ?>

			</div>
			
		</div>
		
	<?php
	} else {
		?>
		<div class="hongo-mini-cart-content-wrap">
			<div class="hongo-mini-cart-content-inner">
				<?php do_action( 'woocommerce_before_mini_cart' ); ?>
				<p class="woocommerce-mini-cart__empty-message alt-font"><span><i class="<?php echo esc_attr( $hongo_header_minicart_icon ); ?> hongo-cart-icon"></i></span><?php echo esc_html__( 'No products in the cart', 'hongo' ); ?></p>
				<?php do_action( 'woocommerce_after_mini_cart' ); ?>
			</div>
		</div>
	<?php
	}
} else { 

	$hongo_mini_cart_slide_class = $hongo_mini_cart_layout_style == 'mini-cart-style-2' ? ' mini-cart-left-side' : ' mini-cart-right-side';
	?>
	<div class="hongo-mini-cart-slide-overlay"></div>
	<div class="hongo-mini-cart-slide-sidebar<?php echo esc_attr( $hongo_mini_cart_slide_class ); ?>">

		<?php if ( ! WC()->cart->is_empty() ) { ?>

		    <div class="mini-cart-slide-sidebar-heading">
		        <span class="alt-font"><?php echo esc_html__( 'Shopping Cart', 'hongo' ); ?></span>
		        <span class="alt-font"><a class="hongo-close-mini-cart-slide" href="javascript:void(0);">X</a></span>
		    </div>
	        <div class="mini-cart-slide-sidebar-scroll">

				<?php do_action( 'woocommerce_before_mini_cart' ); ?>

            	<div class="mini-cart-slide-middle">
	                <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
						<?php
							do_action( 'woocommerce_before_mini_cart_contents' );
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
									$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'hongo-popular-posts-thumb' ), $cart_item, $cart_item_key );
									$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
									?>
									<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
										<?php
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
											'woocommerce_cart_item_remove_link', 
											sprintf(
												'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												esc_attr__( 'Remove this item', 'hongo' ),
												esc_attr( $product_id ),
												esc_attr( $cart_item_key ),
												esc_attr( $_product->get_sku() )
											), 
											$cart_item_key 
										);
										?>
										<?php if ( ! $_product->is_visible() ) : ?>
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . wp_kses_post ( $product_name ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										<?php else : ?>
											<a href="<?php echo esc_url( $product_permalink ); ?>">
												<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . wp_kses_post ( $product_name ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</a>
										<?php endif; ?>
										<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
									</li>
									<?php
								}
							}
							do_action( 'woocommerce_mini_cart_contents' );
						?>
					</ul>
				</div>
				<div class="mini-cart-slide-bottom">
					<p class="woocommerce-mini-cart__total total alt-font">
						<?php
						/**
						 * woocommerce_widget_shopping_cart_total hook.
						 *
						 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
						 */
						do_action( 'woocommerce_widget_shopping_cart_total' );
						?>
					</p>

					<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

					<p class="woocommerce-mini-cart__buttons buttons alt-font"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

					<?php if( ! empty( $hongo_mini_cart_usp_text ) ) { ?>
						<div class="hongo-mini-cart-info alt-font"><?php echo esc_html( $hongo_mini_cart_usp_text ); ?></div>
					<?php } ?>
					
					<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
				</div>
				
				<?php do_action( 'woocommerce_after_mini_cart' ); ?>

	        </div>

		<?php } else { ?>

			<div class="mini-cart-slide-sidebar-scroll">
				
			    <div class="mini-cart-slide-sidebar-heading">
			        <span class="alt-font"><?php echo esc_html__( 'Shopping Cart', 'hongo' ); ?></span>
			        <span class="alt-font"><a class="hongo-close-mini-cart-slide" href="javascript:void(0);">X</a></span>
			    </div>
				<div class="hongo-mini-cart-content-inner">
					
					<?php do_action( 'woocommerce_before_mini_cart' ); ?>

					<p class="woocommerce-mini-cart__empty-message alt-font"><span><i class="<?php echo esc_attr( $hongo_header_minicart_icon ); ?> hongo-cart-icon"></i></span><?php echo esc_html__( 'No products in the cart', 'hongo' ); ?></p>
					
					<?php do_action( 'woocommerce_after_mini_cart' ); ?>

				</div>

			</div>

		<?php } ?>
    </div>
	<?php
}
