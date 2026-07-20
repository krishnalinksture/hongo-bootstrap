<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

$hongo_single_product_variation_swatch_style = hongo_option( 'hongo_single_product_variation_swatch_style', 'boxed' );
$variation_class = ( $hongo_single_product_variation_swatch_style == 'boxed' ) ? ' hongo-attribute-style' : '';
do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo esc_attr( $variations_attr ); // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'hongo' ) ) ); ?></p>
	<?php else : ?>
		<table class="variations<?php echo esc_attr( $variation_class ); ?>">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label alt-font"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></td>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options( array(
									'options'   => $options,
									'attribute' => $attribute_name,
									'product'   => $product,
								) );

								do_action( 'hongo_single_product_variation_after', $options, $attribute_name, $product );								
								$size_guide_position = hongo_option('hongo_single_product_position_size_guide','');
								$size_guide_position = ! empty( $size_guide_position ) ? $size_guide_position : end( $attribute_keys );
								if( $size_guide_position === $attribute_name ) {
									$hongo_single_product_enable_size_guide = hongo_option( 'hongo_single_product_enable_size_guide', 0 );
									$hongo_single_product_size_guide_text = hongo_option( 'hongo_single_product_size_guide_text', __( 'Size Guide', 'hongo' ) );
									$hongo_single_product_size_guide_content = hongo_option( 'hongo_single_product_size_guide_content', '' );
									if( $hongo_single_product_enable_size_guide == '1' && ! empty( $hongo_single_product_size_guide_text ) && ! empty( $hongo_single_product_size_guide_content ) ) {
										?>
											<div class="size-chart">
												<a class="size-guide-link alt-font" href="javascript:void(0);" ><?php echo esc_html( $hongo_single_product_size_guide_text ); ?></a>
												<div id="hongo-size-chart" class="hongo-size-guide-details hongo-white-popup mfp-hide">
													<?php wc_get_template( 'size-guide/size-guide.php', get_the_ID() ); ?>
												</div>
											</div>
										<?php
									}
								}

								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations alt-font" href="#">' . esc_html__( 'Clear', 'hongo' ) . '</a>' ) ) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
					
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>	

		<div class="single_variation_wrap">
			<?php
				/**	
				 * Hook: woocommerce_before_single_variation.	
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**	
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.	
				 *	
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**	
				 * Hook: woocommerce_after_single_variation.	
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
