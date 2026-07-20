<?php
/**
 * Quick View Product title
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/title.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$hongo_quick_view_product_enable_title_link = get_theme_mod( 'hongo_quick_view_product_enable_title_link', '1' );

echo '<h1 class="product_title entry-title alt-font">';
	if( $hongo_quick_view_product_enable_title_link == '1' ) {
		echo '<a href="'. get_the_permalink() .'">';
	}
		echo get_the_title();

	if( $hongo_quick_view_product_enable_title_link == '1' ) {
		echo '</a>';
	}
echo '</h1>';