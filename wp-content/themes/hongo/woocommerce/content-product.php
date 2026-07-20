<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $animate_shop_product_count;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Animation
$animation_class = $animation_attr = '';
$hongo_product_archive_animation 			= get_theme_mod( 'hongo_product_archive_animation', '' );
$hongo_product_archive_animation_delay 		= get_theme_mod( 'hongo_product_archive_animation_delay', '' );
$hongo_product_archive_animation_duration 	= get_theme_mod( 'hongo_product_archive_animation_duration', '' );

// Product archive animation filter
$hongo_product_archive_animation = apply_filters( 'hongo_product_archive_animation', $hongo_product_archive_animation );

// Animation
if( ! empty( $hongo_product_archive_animation ) ) {

	$animation_class .= ' wow ' . $hongo_product_archive_animation;

	if( empty( $animate_shop_product_count ) ) {
		$animate_shop_product_count = 0;
	}
	if( ! empty( $hongo_product_archive_animation_delay ) ) {

		$animation_attr .= ' data-wow-delay="' . esc_attr( $animate_shop_product_count ) . 'ms"';
	}
	if( ! empty( $hongo_product_archive_animation_duration ) ) {

		$animation_attr .= ' data-wow-duration="' . esc_attr( $hongo_product_archive_animation_duration ) . 'ms"';
	}
}
?>
	<li <?php wc_product_class( $animation_class, $product ); ?><?php echo wp_kses_post( $animation_attr ); ?>>
		<?php

			// Display loop product with different style.
			do_action( 'hongo_shop_loop_content_product' );
		?>
	</li>
<?php

if( ! empty( $hongo_product_archive_animation ) && ! empty( $hongo_product_archive_animation_delay ) ) {

	$animate_shop_product_count += $hongo_product_archive_animation_delay;
}
