<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

	$hongo_product_archive_enable_sale_box = hongo_get_product_archive_enable_sale_box();
	$hongo_product_archive_enable_new_box  = hongo_get_product_archive_enable_new_box();

	$hongo_new_product_shop = hongo_post_meta( 'hongo_new_product_shop', '0' );
	$hongo_product_archive_display_percentage_sale_box = get_theme_mod( 'hongo_product_archive_display_percentage_sale_box', '1' );

	$hongo_product_archive_new_text = get_theme_mod( 'hongo_product_archive_new_text', __( 'New', 'hongo' ) );

	$hongo_product_archive_sale_text = get_theme_mod( 'hongo_product_archive_sale_text', __( 'Sale!', 'hongo' ) );

	$hongo_product_archive_sold_text = get_theme_mod( 'hongo_product_archive_sold_text', __( 'Sold!', 'hongo' ) );

?>
<?php if ( $product->is_on_sale() || $hongo_new_product_shop || !$product->is_in_stock() ) : ?>
	<div class="sale-new-wrap">
		<?php if( $hongo_product_archive_enable_sale_box == '1' ) : ?>
			<?php if ( $product->is_on_sale() ) : ?>
				<?php 
					if( $hongo_product_archive_display_percentage_sale_box ) {

						$regular_price 	= $product->get_regular_price();
						$sale_price 	= $product->get_sale_price();
						$sale_label    = ( ( $regular_price && $sale_price ) && $regular_price > $sale_price ) ? '-' . ( ( 1 - number_format( $sale_price / $regular_price, 2 ) ) * 100 ) . '%' : $hongo_product_archive_sale_text;

					} else {
						
						$sale_label = $hongo_product_archive_sale_text;
					}
				?>
				<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale alt-font">' . esc_html( $sale_label ) . '</span>', $post, $product ); ?>
			<?php elseif ( !$product->is_in_stock() ) : ?>
				<?php echo apply_filters( 'woocommerce_sold_flash', '<span class="soldout alt-font">' . esc_html( $hongo_product_archive_sold_text ) . '</span>', $post, $product ); ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( $hongo_new_product_shop && $hongo_product_archive_enable_new_box == '1' ) : ?>
			<?php echo apply_filters( 'hongo_new_product_flash', '<span class="new alt-font">' . esc_html( $hongo_product_archive_new_text ) . '</span>', $post, $product ); ?>
		<?php endif; ?>
	</div>
<?php endif;
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
