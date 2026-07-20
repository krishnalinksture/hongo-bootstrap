<?php
/**
 * Generate cart css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Cross sells Product Slider color*/
$hongo_single_product_cross_sells_product_pagination_color = hongo_option( 'hongo_single_product_cross_sells_product_pagination_color', '' );
$hongo_single_product_cross_sells_product_active_pagination_color = hongo_option( 'hongo_single_product_cross_sells_product_active_pagination_color', '' );
$hongo_single_product_cross_sells_product_navigation_color = hongo_option( 'hongo_single_product_cross_sells_product_navigation_color', '' );

/* Cross Sells Product Heading */
$hongo_single_product_cross_sells_product_heading_font_size = get_theme_mod( 'hongo_single_product_cross_sells_product_heading_font_size', '' );
$hongo_single_product_cross_sells_product_heading_line_height = get_theme_mod( 'hongo_single_product_cross_sells_product_heading_line_height', '' );
$hongo_single_product_cross_sells_product_heading_letter_spacing = get_theme_mod( 'hongo_single_product_cross_sells_product_heading_letter_spacing', '' );
$hongo_single_product_cross_sells_product_heading_font_weight = get_theme_mod( 'hongo_single_product_cross_sells_product_heading_font_weight', '' );
$hongo_single_product_cross_sells_product_heading_color = get_theme_mod( 'hongo_single_product_cross_sells_product_heading_color', '' );

/* Cart Table Heading Settings */
$hongo_cart_table_heading_font_size = get_theme_mod( 'hongo_cart_table_heading_font_size', '' );
$hongo_cart_table_heading_line_height = get_theme_mod( 'hongo_cart_table_heading_line_height', '' );
$hongo_cart_table_heading_letter_spacing = get_theme_mod( 'hongo_cart_table_heading_letter_spacing', '' );
$hongo_cart_table_heading_text_transform = get_theme_mod( 'hongo_cart_table_heading_text_transform', '' );
$hongo_cart_table_heading_font_weight = get_theme_mod( 'hongo_cart_table_heading_font_weight', '' );
$hongo_cart_table_heading_color = get_theme_mod( 'hongo_cart_table_heading_color', '' );

/* Cart Table Content Settings */
$hongo_cart_table_content_font_size = get_theme_mod( 'hongo_cart_table_content_font_size', '' );
$hongo_cart_table_content_line_height = get_theme_mod( 'hongo_cart_table_content_line_height', '' );
$hongo_cart_table_content_letter_spacing = get_theme_mod( 'hongo_cart_table_content_letter_spacing', '' );
$hongo_cart_table_content_text_transform = get_theme_mod( 'hongo_cart_table_content_text_transform', '' );
$hongo_cart_table_content_font_weight = get_theme_mod( 'hongo_cart_table_content_font_weight', '' );
$hongo_cart_table_content_color = get_theme_mod( 'hongo_cart_table_content_color', '' );
$hongo_cart_table_content_hover_color = get_theme_mod( 'hongo_cart_table_content_hover_color', '' );
$hongo_cart_table_quantity_border_color = get_theme_mod( 'hongo_cart_table_quantity_border_color', '' );

/* Cart Heading Settings */
$hongo_cart_heading_font_size = get_theme_mod( 'hongo_cart_heading_font_size', '' );
$hongo_cart_heading_line_height = get_theme_mod( 'hongo_cart_heading_line_height', '' );
$hongo_cart_heading_letter_spacing = get_theme_mod( 'hongo_cart_heading_letter_spacing', '' );
$hongo_cart_heading_text_transform = get_theme_mod( 'hongo_cart_heading_text_transform', '' );
$hongo_cart_heading_font_weight = get_theme_mod( 'hongo_cart_heading_font_weight', '' );
$hongo_cart_heading_color = get_theme_mod( 'hongo_cart_heading_color', '' );

/* Cart Form Button Settings */
$hongo_cart_button_font_size = get_theme_mod( 'hongo_cart_button_font_size', '' );
$hongo_cart_button_line_height = get_theme_mod( 'hongo_cart_button_line_height', '' );
$hongo_cart_button_letter_spacing = get_theme_mod( 'hongo_cart_button_letter_spacing', '' );
$hongo_cart_button_text_transform = get_theme_mod( 'hongo_cart_button_text_transform', '' );
$hongo_cart_button_font_weight = get_theme_mod( 'hongo_cart_button_font_weight', '' );
$hongo_cart_bg_button_color = get_theme_mod( 'hongo_cart_bg_button_color', '' );
$hongo_cart_bg_hover_button_color = get_theme_mod( 'hongo_cart_bg_hover_button_color', '' );
$hongo_cart_button_color = get_theme_mod( 'hongo_cart_button_color', '' );
$hongo_cart_button_hover_color = get_theme_mod( 'hongo_cart_button_hover_color', '' );
$hongo_cart_border_button_color = get_theme_mod( 'hongo_cart_border_button_color', '' );
$hongo_cart_border_hover_button_color = get_theme_mod( 'hongo_cart_border_hover_button_color', '' );

/* General Settings */
$hongo_cart_right_box_bg_color = get_theme_mod( 'hongo_cart_right_box_bg_color', '' );
$hongo_cart_border_color = get_theme_mod( 'hongo_cart_border_color', '' );
$hongo_cart_box_content_heading_color = get_theme_mod( 'hongo_cart_box_content_heading_color', '' );
$hongo_cart_box_content_color = get_theme_mod( 'hongo_cart_box_content_color', '' );
$hongo_cart_total_color = get_theme_mod( 'hongo_cart_total_color', '' );
$hongo_cart_coupon_color = get_theme_mod( 'hongo_cart_coupon_color', '' );
$hongo_cart_coupon_placeholder_color = get_theme_mod( 'hongo_cart_coupon_placeholder_color', '' );
$hongo_cart_coupon_border_color = get_theme_mod( 'hongo_cart_coupon_border_color', '' );
$hongo_cart_coupon_button_color = get_theme_mod( 'hongo_cart_coupon_button_color', '' );
$hongo_cart_empty_cart_color = get_theme_mod( 'hongo_cart_empty_cart_color', '' );

?>

/* Cross sells Product Slider color*/
	<?php if( $hongo_single_product_cross_sells_product_pagination_color ) : ?>
	    /* Cross Sells Product Slider Pagination */
	    .hongo-cross-sells-products .swiper-pagination .swiper-pagination-bullet { background-color: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_pagination_color ); ?>; }
	<?php endif; ?>
	<?php if( $hongo_single_product_cross_sells_product_active_pagination_color ) : ?>
	/* Cross Sells Product Slider active Pagination */
	.hongo-cross-sells-products .swiper-pagination .swiper-pagination-bullet-active { background-color: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_active_pagination_color ); ?>; }
	<?php endif; ?>
	<?php if( $hongo_single_product_cross_sells_product_navigation_color ) : ?>
	/* cross Sells Product Slider Navigation */
	.woocommerce-cart .cross-sells .swiper-button-next i, .woocommerce-cart .cross-sells .swiper-button-prev i { color: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_navigation_color ); ?>; }
	<?php endif; ?>
/* End Cross sells Product Slider color*/

/* Cross Sells Product Heading */
	<?php if( $hongo_single_product_cross_sells_product_heading_font_size ) : ?>
	/* Cross Sells Product Heading Font Size */
	.woocommerce .cross-sells > h2 { font-size: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_heading_font_size ); ?>; }
	<?php endif; ?>
	<?php if( $hongo_single_product_cross_sells_product_heading_line_height ) : ?>
	/* Cross Sells Product Heading Line Height */
	.woocommerce .cross-sells > h2 { line-height: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_heading_line_height ); ?>; }
	<?php endif; ?>
	<?php if( $hongo_single_product_cross_sells_product_heading_letter_spacing ) : ?>
	/* Cross Sells Product Heading Letter Spacing */
	.woocommerce .cross-sells > h2 { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_heading_letter_spacing ); ?>; }
	<?php endif; ?>
	<?php if( $hongo_single_product_cross_sells_product_heading_font_weight ) : ?>
	/* Cross Sells Product Heading Font Weight */
	.woocommerce .cross-sells > h2 { font-weight: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_heading_font_weight ); ?>; }
	<?php endif; ?>
	<?php if( $hongo_single_product_cross_sells_product_heading_color ) : ?>
	/* Cross Sells Product Heading Color */
	.woocommerce .cross-sells > h2 { color: <?php echo sprintf( '%s', $hongo_single_product_cross_sells_product_heading_color ); ?>; }
	<?php endif; ?>
/* End Cross Sells Product Heading */

/* Cart Table Heading Settings */
	<?php if( $hongo_cart_table_heading_font_size ) : ?>
	    /* Cart Table Heading Font Size */
	    .woocommerce-cart .woocommerce table.shop_table thead th { font-size: <?php echo sprintf( '%s', $hongo_cart_table_heading_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_heading_line_height ) : ?>
	    /* Cart Table Heading Line Height */
	    .woocommerce-cart .woocommerce table.shop_table thead th { line-height: <?php echo sprintf( '%s', $hongo_cart_table_heading_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_heading_letter_spacing ) : ?>
	    /* Cart Table Heading Letter Spacing */
	    .woocommerce-cart .woocommerce table.shop_table thead th { letter-spacing: <?php echo sprintf( '%s', $hongo_cart_table_heading_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_heading_text_transform ) : ?>
	    /* Cart Table Heading Text Transform */
	    .woocommerce-cart .woocommerce table.shop_table thead th { text-transform: <?php echo sprintf( '%s', $hongo_cart_table_heading_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_heading_font_weight ) : ?>
	    /* Cart Table Heading Font Weight */
	    .woocommerce-cart .woocommerce table.shop_table thead th { font-weight: <?php echo sprintf( '%s', $hongo_cart_table_heading_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_heading_color ) : ?>
	    /* Cart Table Heading Color */
	    .woocommerce-cart .woocommerce table.shop_table thead th { color: <?php echo sprintf( '%s', $hongo_cart_table_heading_color ); ?>}
	<?php endif; ?>
/* End Cart Table Heading Settings */

/* Cart Table Content Settings */
	<?php if( $hongo_cart_table_content_font_size ) : ?>
	    /* Cart Table Content Font Size */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td { font-size: <?php echo sprintf( '%s', $hongo_cart_table_content_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_content_line_height ) : ?>
	    /* Cart Table Content Line Height */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td { line-height: <?php echo sprintf( '%s', $hongo_cart_table_content_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_content_letter_spacing ) : ?>
	    /* Cart Table Content Letter Spacing */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td { letter-spacing: <?php echo sprintf( '%s', $hongo_cart_table_content_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_content_text_transform ) : ?>
	    /* Cart Table Content Text Transform */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td { text-transform: <?php echo sprintf( '%s', $hongo_cart_table_content_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_content_font_weight ) : ?>
	    /* Cart Table Content Font Weight */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td { font-weight: <?php echo sprintf( '%s', $hongo_cart_table_content_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_table_content_color ) : ?>
	    /* Cart Table Content Color */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td, .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td.product-name a, .woocommerce-cart .woocommerce div.quantity .qty, .woocommerce-cart .woocommerce div.quantity .hongo-qtyplus, .woocommerce-cart .woocommerce div.quantity .hongo-qtyminus { color: <?php echo sprintf( '%s', $hongo_cart_table_content_color ); ?>}
	    .woocommerce-cart .woocommerce a.remove { color: <?php echo sprintf( '%s', $hongo_cart_table_content_color ); ?> !important; }
	<?php endif; ?>
	<?php if( $hongo_cart_table_content_hover_color ) : ?>
	    /* Cart Table Content Hover Color */
	    .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td.product-name a:hover { color: <?php echo sprintf( '%s', $hongo_cart_table_content_hover_color ); ?>}
	    .woocommerce-cart .woocommerce a.remove:hover { color: <?php echo sprintf( '%s', $hongo_cart_table_content_hover_color ); ?> !important; }
	<?php endif; ?>
	<?php if( $hongo_cart_table_quantity_border_color ) : ?>
	    /* Cart Table Quantity Border Color */
	    .woocommerce-cart .woocommerce div.quantity .qty, .woocommerce-cart .woocommerce div.quantity .hongo-qtyminus, .woocommerce-cart .woocommerce div.quantity .hongo-qtyplus { border-color: <?php echo sprintf( '%s', $hongo_cart_table_quantity_border_color ); ?>}
	<?php endif; ?>
/* End Cart Table Heading Settings */

/* Cart Heading Settings */
	<?php if( $hongo_cart_heading_font_size ) : ?>
	    /* Cart Heading Font Size */
	    .woocommerce-cart .cart-collaterals .cart_totals h4 { font-size: <?php echo sprintf( '%s', $hongo_cart_heading_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_heading_line_height ) : ?>
	    /* Cart Heading Line Height */
	    .woocommerce-cart .cart-collaterals .cart_totals h4 { line-height: <?php echo sprintf( '%s', $hongo_cart_heading_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_heading_letter_spacing ) : ?>
	    /* Cart Heading Letter Spacing */
	    .woocommerce-cart .cart-collaterals .cart_totals h4 { letter-spacing: <?php echo sprintf( '%s', $hongo_cart_heading_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_heading_text_transform ) : ?>
	    /* Cart Heading Text Transform */
	    .woocommerce-cart .cart-collaterals .cart_totals h4 { text-transform: <?php echo sprintf( '%s', $hongo_cart_heading_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_heading_font_weight ) : ?>
	    /* Cart Heading Font Weight */
	    .woocommerce-cart .cart-collaterals .cart_totals h4 { font-weight: <?php echo sprintf( '%s', $hongo_cart_heading_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_heading_color ) : ?>
	    /* Cart Heading Color */
	    .woocommerce-cart .cart-collaterals .cart_totals h4 { color: <?php echo sprintf( '%s', $hongo_cart_heading_color ); ?>}
	<?php endif; ?>
/* End Cart Heading Settings */

/* Cart Form Button Settings */
	<?php if( $hongo_cart_button_font_size ) : ?>
	    /* Cart Form Button Font Size */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { font-size: <?php echo sprintf( '%s', $hongo_cart_button_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_button_line_height ) : ?>
	    /* Cart Form Button Line Height */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { line-height: <?php echo sprintf( '%s', $hongo_cart_button_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_button_letter_spacing ) : ?>
	    /* Cart Form Button Letter Spacing */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { letter-spacing: <?php echo sprintf( '%s', $hongo_cart_button_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_button_text_transform ) : ?>
	    /* Cart Form Button Text Transform */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { text-transform: <?php echo sprintf( '%s', $hongo_cart_button_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_button_font_weight ) : ?>
	    /* Cart Form Button Font Weight */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { font-weight: <?php echo sprintf( '%s', $hongo_cart_button_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_bg_button_color ) : ?>
	    /* Cart Form Button Background Color */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { background-color: <?php echo sprintf( '%s', $hongo_cart_bg_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_bg_hover_button_color ) : ?>
	    /* Cart Form Button Hover Background Color */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover { background-color: <?php echo sprintf( '%s', $hongo_cart_bg_hover_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_button_color ) : ?>
	    /* Cart Form Button Color */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { color: <?php echo sprintf( '%s', $hongo_cart_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_button_hover_color ) : ?>
	    /* Cart Form Button Hover Color */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover { color: <?php echo sprintf( '%s', $hongo_cart_button_hover_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_border_button_color ) : ?>
	    /* Cart Form Button Border Color */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button { border-color: <?php echo sprintf( '%s', $hongo_cart_border_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_border_hover_button_color ) : ?>
	    /* Cart orm Button Hover Border Color */
	    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover { border-color: <?php echo sprintf( '%s', $hongo_cart_border_hover_button_color ); ?>}
	<?php endif; ?>
/* End Cart Form Button Settings */

/* General Settings */
	<?php if( $hongo_cart_right_box_bg_color ) : ?>
	    /* Cart Right Content Box bg Color */
	    .woocommerce-cart .checkout-sidebar { background-color: <?php echo sprintf( '%s', $hongo_cart_right_box_bg_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_border_color ) : ?>
	    /* Cart Border Color */
	    .woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce-cart .woocommerce table.shop_table th, .woocommerce-cart .woocommerce table.shop_table td { border-color: <?php echo sprintf( '%s', $hongo_cart_border_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_box_content_heading_color ) : ?>
	    /* Cart Right Content Heading Color */
	    .woocommerce-cart .checkout-sidebar table.shop_table th, .woocommerce-cart .cart-collaterals .shipping-calculator-button { color: <?php echo sprintf( '%s', $hongo_cart_box_content_heading_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_box_content_color ) : ?>
	    /* Cart Right Content Color */
	    .woocommerce-cart .checkout-sidebar table.shop_table td, .woocommerce-cart .checkout-sidebar table.shop_table td a.woocommerce-remove-coupon, .woocommerce-cart ul#shipping_method li label, .woocommerce-cart .cart-collaterals .cart_totals table small { color: <?php echo sprintf( '%s', $hongo_cart_box_content_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_total_color ) : ?>
	    /* Cart Total Color */
	    .woocommerce-cart .cart-collaterals .cart_totals table.shop_table tr.order-total td { color: <?php echo sprintf( '%s', $hongo_cart_total_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_coupon_color ) : ?>
	    /* Cart Coupon Input Color */
	    .woocommerce-cart table.cart td.actions .coupon .input-text { color: <?php echo sprintf( '%s', $hongo_cart_coupon_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_coupon_placeholder_color ) : ?>
	    /* Cart Coupon Input Color */
	    .woocommerce-cart table.cart td.actions .coupon .input-text::-webkit-input-placeholder {color: <?php echo sprintf( '%s', $hongo_cart_coupon_placeholder_color ); ?> !important; }
        .woocommerce-cart table.cart td.actions .coupon .input-text::-moz-placeholder {color: <?php echo sprintf( '%s', $hongo_cart_coupon_placeholder_color ); ?>!important; }
        .woocommerce-cart table.cart td.actions .coupon .input-text::-ms-input-placeholder {color: <?php echo sprintf( '%s', $hongo_cart_coupon_placeholder_color ); ?> !important; }
        .woocommerce-cart table.cart td.actions .coupon .input-text:-moz-placeholder {color: <?php echo sprintf( '%s', $hongo_cart_coupon_placeholder_color ); ?> !important; }
	<?php endif; ?>
	<?php if( $hongo_cart_coupon_border_color ) : ?>
	    /* Cart Coupon Border Color */
	    .woocommerce-cart table.cart td.actions .coupon .input-text { border-bottom-color: <?php echo sprintf( '%s', $hongo_cart_coupon_border_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_coupon_button_color ) : ?>
	    /* Cart Coupon Button Color */
	    .woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon button { color: <?php echo sprintf( '%s', $hongo_cart_coupon_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_cart_empty_cart_color ) : ?>
	    /* Cart Empty Cart Button Color */
	    .woocommerce-cart table.cart td.actions .btn, .woocommerce-cart table.cart td.actions .button, .woocommerce-cart button.button:disabled:hover, .woocommerce-cart button.button:disabled[disabled]:hover { color: <?php echo sprintf( '%s', $hongo_cart_empty_cart_color ); ?>}
	    .woocommerce-cart table.cart td.actions .btn, .woocommerce-cart table.cart td.actions .button { border-color: <?php echo sprintf( '%s', $hongo_cart_empty_cart_color ); ?>}
	<?php endif; ?>
/* End General Settings */
