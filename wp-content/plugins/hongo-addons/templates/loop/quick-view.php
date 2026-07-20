<?php
/**
 * Loop Quick View
 *
 * This template can be overridden by copying it to yourtheme/hongo/loop/quick-view.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$product_archive_list_style = hongo_get_product_archive_list_style();
$hongo_single_product_quick_view_icon = get_theme_mod( 'hongo_single_product_quick_view_icon', 'icon-eye icons' );
$hongo_product_archive_quick_view_text = get_theme_mod( 'hongo_product_archive_quick_view_text', __( 'Quick View', 'hongo-addons' ) );

$title_attribute = ' title="'.esc_attr( $hongo_product_archive_quick_view_text ).'"';

echo apply_filters( 'woocommerce_loop_product_quick_view_link',
	sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
		esc_attr( $product->get_id() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		'<i class="'.esc_attr( $hongo_single_product_quick_view_icon ).'"'.$title_attribute.'></i><span class="quick-view-text button-text">' . $hongo_product_archive_quick_view_text . '</span>'
	),
$product );