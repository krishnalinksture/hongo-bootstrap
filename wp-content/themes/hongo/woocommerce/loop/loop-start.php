<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
 * @version     3.3.0
 */

// Animation
global $animate_shop_product_count;

$animate_shop_product_count = 0;

	$product_archive_list_style = hongo_get_product_archive_list_style();
	$hongo_single_product_enable_cross_sells_slider = get_theme_mod( 'hongo_single_product_enable_cross_sells_slider', '1' );	
	/**
	 * Hook: woocommerce_before_shop_loop
	 *
	 * @hooked hongo_before_shop_loop_callback - 10
	 */
	do_action( 'hongo_before_shop_loop', $product_archive_list_style );

	/**
	 * Hook: hongo_before_shop_loop_***
	 *
	 * @hooked hongo_before_shop_loop_***_callback - 10
	 */
    do_action( 'hongo_before_shop_loop_' . $product_archive_list_style, $product_archive_list_style );

	/**
	 * Hook: hongo_before_shop_loop_style_after
	 */
	do_action( 'hongo_before_shop_loop_style_after', $product_archive_list_style );
?>
<ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); echo apply_filters( 'hongo_product_list_class', '' ); ?>" data-col="<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
	<?php if( is_cart() ) { ?>
		<?php if( $hongo_single_product_enable_cross_sells_slider == '0' ) { ?>
			<li class="grid-sizer"></li>
		<?php } ?>
	<?php } elseif( $product_archive_list_style != 'shop-list' ) { ?>
		<li class="grid-sizer"></li>
	<?php } ?>
