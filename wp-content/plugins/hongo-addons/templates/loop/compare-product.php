<?php
/**
 * Loop Compare
 *
 * This template can be overridden by copying it to yourtheme/hongo/loop/compare-product.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$product_archive_list_style = hongo_get_product_archive_list_style();
$hongo_single_product_compare_icon = get_theme_mod( 'hongo_single_product_compare_icon', 'ti-control-shuffle' );
$hongo_product_archive_compare_text = get_theme_mod( 'hongo_product_archive_compare_text', __( 'Compare', 'hongo-addons' ) );

$title_attribute = ' title="'.esc_attr( $hongo_product_archive_compare_text ).'"';

echo apply_filters( 'hongo_addons_loop_product_compare_link',
	sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
		esc_attr( $product->get_id() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		'<i class="'.esc_attr( $hongo_single_product_compare_icon ).'"'.$title_attribute.'></i><span class="compare-text button-text">' .$hongo_product_archive_compare_text. '</span>'
	),
$product );