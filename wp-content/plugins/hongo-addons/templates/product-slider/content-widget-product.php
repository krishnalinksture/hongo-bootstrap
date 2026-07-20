<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/hongo/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

$product_id = $product->get_id();
$li_tag = ! empty( $li_wrap ) ? $li_wrap : 'li';

$tooltip = ! empty( $tooltip ) ? $tooltip : '';
$tooltip_attribute = '';
?>
<<?php echo sprintf( '%s', $li_tag ); ?> class="hongo-widget-item">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	<div class="left-part-image">
		<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
			<?php echo wp_kses_post( $product->get_image( 'thumbnail' ) ); ?>
		</a>
	</div>
	<div class="right-part-content">
		<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
			<span class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?></span>
		</a>
		<?php echo wp_kses_post( $product->get_price_html() ); ?>
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
		<?php endif; ?>
		<?php $tooltip_attribute = ( $tooltip == 'on' ) ? ' data-tooltip-position="top"' : ''; ?>
        <div class="widget-product-buttons-wrap product-buttons-wrap"<?php echo sprintf( '%s', $tooltip_attribute ); ?>>
	        <?php
	        	/**
				 * hongo_content_widget_button hook.
				 *
				 * @hooked hongo_addons_common_add_to_cart - 10
			     * @hooked hongo_addons_template_loop_product_quick_view - 20
				 * @hooked hongo_addons_template_loop_product_compare - 30
				 * @hooked hongo_addons_template_loop_product_wishlist - 40
				 */
	            do_action( 'hongo_content_widget_button', $product ); // Content widget button
	        ?>
        </div>
	</div>
	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</<?php echo sprintf( '%s', $li_tag ); ?>>