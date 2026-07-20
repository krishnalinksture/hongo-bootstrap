<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</ul>
<?php

	$product_archive_list_style = hongo_get_product_archive_list_style();

	/**
	 * Hook: hongo_after_shop_loop_style_before
	 */
	do_action( 'hongo_after_shop_loop_style_before', $product_archive_list_style );

	/**
	 * Hook: hongo_after_shop_loop_***
	 *
	 * @hooked hongo_after_shop_loop_***_callback - 10
	 */
    do_action( 'hongo_after_shop_loop_' . $product_archive_list_style, $product_archive_list_style );

	/**
	 * Hook: hongo_before_shop_loop
	 */
	do_action( 'hongo_after_shop_loop', $product_archive_list_style );
