<?php
/**
 * Loop Wishlist
 *
 * This template can be overridden by copying it to yourtheme/hongo/loop/wishlist.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$product_id = $product->get_id();
// Get Wishlist Details
$data = hongo_addons_get_product_wishlist();
$product_archive_list_style = hongo_get_product_archive_list_style();

$wishlish_icon 		= get_theme_mod( 'hongo_single_product_wishlish_icon', 'icon-heart' );
$wishlist_text 		= get_theme_mod( 'hongo_product_archive_wishlist_text', esc_html__( 'Add to Wishlist', 'hongo-addons' ) );

$browse_title_attribute = ' title="'.esc_attr__( 'Browse Wishlist', 'hongo-addons' ) .'"';
$remove_title_attribute = ' title="'.esc_attr__( 'Remove Wishlist', 'hongo-addons' ) .'"';
$title_attribute = ' title="'.esc_attr( $wishlist_text ).'"';

$wishlist_id = get_option('woocommerce_wishlist_page_id');
if( ! empty( $data ) ) {
	if( ! empty( $wishlist_id ) ){
		if( ! empty( $data ) && in_array( $product_id, $data ) ) {
			echo apply_filters( 'hongo_loop_product_wishlist_link',
			sprintf( '<a rel="nofollow" href="%s" data-product_id="%s" class="alt-font %s">%s</a>',
				esc_url( get_permalink( $wishlist_id ) ),
				esc_attr( $product->get_id() ),
				esc_attr( isset( $class ) ? $class : 'button' ),
				'<i class="fa-solid fa-heart"'.$browse_title_attribute.'></i><span class="wish-list-text button-text">' . esc_html__( 'Browse Wishlist', 'hongo-addons' ) . '</span>'
				),
			$product );
		} else{
			echo apply_filters( 'hongo_loop_product_wishlist_link',
				sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
					esc_attr( $product->get_id() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					'<i class="'.esc_attr( $wishlish_icon ).'"'.$title_attribute.'></i><span class="wish-list-text button-text">' . esc_html( $wishlist_text ) . '</span>'
				),
			$product );    		
		}
	} else{
		if( ! empty( $data ) && in_array( $product_id, $data ) ) {
			echo apply_filters( 'hongo_loop_product_wishlist_link',
			sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="wishlist-added alt-font %s">%s</a>',
				esc_attr( $product->get_id() ),
				esc_attr( isset( $class ) ? $class : 'button' ),
				'<i class="fa-solid fa-heart"'.$remove_title_attribute.'></i><span class="wish-list-text button-text">' . esc_html__( 'Remove Wishlist', 'hongo-addons' ) . '</span>'
				),
			$product );
		} else{
			echo apply_filters( 'hongo_loop_product_wishlist_link',
				sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
					esc_attr( $product->get_id() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					'<i class="'.esc_attr( $wishlish_icon ).'"'.$title_attribute.'></i><span class="wish-list-text button-text">' . esc_html( $wishlist_text ) . '</span>'
				),
			$product );
		}
	}		
} else {
	echo apply_filters( 'hongo_loop_product_wishlist_link',
		sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
			esc_attr( $product->get_id() ),
			esc_attr( isset( $class ) ? $class : 'button' ),
			'<i class="'.esc_attr( $wishlish_icon ).'"'.$title_attribute.'></i><span class="wish-list-text button-text">' . esc_html( $wishlist_text ) . '</span>'
		),
	$product ); 
}
