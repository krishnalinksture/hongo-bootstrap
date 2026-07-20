<?php
/**
 * Generate checkout css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Checkout Heading Settings */
$hongo_checkout_heading_font_size = get_theme_mod( 'hongo_checkout_heading_font_size', '' );
$hongo_checkout_heading_line_height = get_theme_mod( 'hongo_checkout_heading_line_height', '' );
$hongo_checkout_heading_latter_spacing = get_theme_mod( 'hongo_checkout_heading_latter_spacing', '' );
$hongo_checkout_heading_text_transform = get_theme_mod( 'hongo_checkout_heading_text_transform', '' );
$hongo_checkout_heading_font_weight = get_theme_mod( 'hongo_checkout_heading_font_weight', '' );
$hongo_checkout_heading_text_color = get_theme_mod( 'hongo_checkout_heading_text_color', '' );

/* Checkout Form Settings */
$hongo_checkout_label_font_size = get_theme_mod( 'hongo_checkout_label_font_size', '' );
$hongo_checkout_label_line_height = get_theme_mod( 'hongo_checkout_label_line_height', '' );
$hongo_checkout_label_letter_spacing = get_theme_mod( 'hongo_checkout_label_letter_spacing', '' );
$hongo_checkout_label_text_transform = get_theme_mod( 'hongo_checkout_label_text_transform', '' );
$hongo_checkout_label_font_weight = get_theme_mod( 'hongo_checkout_label_font_weight', '' );
$hongo_checkout_label_text_color = get_theme_mod( 'hongo_checkout_label_text_color', '' );
$hongo_checkout_input_border_color = get_theme_mod( 'hongo_checkout_input_border_color', '' );
$hongo_checkout_input_color = get_theme_mod( 'hongo_checkout_input_color', '' );
$hongo_checkout_input_placeholder_color = get_theme_mod( 'hongo_checkout_input_placeholder_color', '' );

/* Checkout Form Button Settings */
$hongo_checkout_button_font_size = get_theme_mod( 'hongo_checkout_button_font_size', '' );
$hongo_checkout_button_line_height = get_theme_mod( 'hongo_checkout_button_line_height', '' );
$hongo_checkout_button_letter_spacing = get_theme_mod( 'hongo_checkout_button_letter_spacing', '' );
$hongo_checkout_button_text_transform = get_theme_mod( 'hongo_checkout_button_text_transform', '' );
$hongo_checkout_button_font_weight = get_theme_mod( 'hongo_checkout_button_font_weight', '' );
$hongo_checkout_bg_button_color = get_theme_mod( 'hongo_checkout_bg_button_color', '' );
$hongo_checkout_bg_hover_button_color = get_theme_mod( 'hongo_checkout_bg_hover_button_color', '' );
$hongo_checkout_button_color = get_theme_mod( 'hongo_checkout_button_color', '' );
$hongo_checkout_button_hover_color = get_theme_mod( 'hongo_checkout_button_hover_color', '' );
$hongo_checkout_border_button_color = get_theme_mod( 'hongo_checkout_border_button_color', '' );
$hongo_checkout_border_hover_button_color = get_theme_mod( 'hongo_checkout_border_hover_button_color', '' );

/* Checkout Payment Box Settings */
$hongo_checkout_payment_background_color = get_theme_mod( 'hongo_checkout_payment_background_color', '' );
$hongo_checkout_payment_msgbox_background_color = get_theme_mod( 'hongo_checkout_payment_msgbox_background_color', '' );
$hongo_checkout_payment_text_font_size = get_theme_mod( 'hongo_checkout_payment_text_font_size', '' );
$hongo_checkout_payment_line_height = get_theme_mod( 'hongo_checkout_payment_line_height', '' );
$hongo_checkout_payment_latter_spacing = get_theme_mod( 'hongo_checkout_payment_latter_spacing', '' );
$hongo_checkout_payment_text_transform = get_theme_mod( 'hongo_checkout_payment_text_transform', '' );
$hongo_checkout_payment_font_weight = get_theme_mod( 'hongo_checkout_payment_font_weight', '' );
$hongo_checkout_payment_color = get_theme_mod( 'hongo_checkout_payment_color', '' );
$hongo_payment_content_box_font_size = get_theme_mod( 'hongo_payment_content_box_font_size', '' );
$hongo_payment_content_box_line_height = get_theme_mod( 'hongo_payment_content_box_line_height', '' );
$hongo_payment_content_box_letter_spacing = get_theme_mod( 'hongo_payment_content_box_letter_spacing', '' );
$hongo_payment_content_text_transform = get_theme_mod( 'hongo_payment_content_text_transform', '' );
$hongo_payment_content_font_weight = get_theme_mod( 'hongo_payment_content_font_weight', '' );
$hongo_payment_content_text_color = get_theme_mod( 'hongo_payment_content_text_color', '' );

/* Checkout General Settings */
$hongo_checkout_top_heading_text_color = get_theme_mod( 'hongo_checkout_top_heading_text_color', '' );
$hongo_checkout_top_heading_icon_color = get_theme_mod( 'hongo_checkout_top_heading_icon_color', '' );
$hongo_checkout_lost_pass_text_color = get_theme_mod( 'hongo_checkout_lost_pass_text_color', '' );
$hongo_checkout_right_box_bg_color = get_theme_mod( 'hongo_checkout_right_box_bg_color', '' );
$hongo_checkout_right_border_color = get_theme_mod( 'hongo_checkout_right_border_color', '' );
$hongo_checkout_total_color = get_theme_mod( 'hongo_checkout_total_color', '' );
$hongo_checkout_content_heading_text_color = get_theme_mod( 'hongo_checkout_content_heading_text_color', '' );
$hongo_checkout_content_text_color = get_theme_mod( 'hongo_checkout_content_text_color', '' );

?>

/* Checkout Heading Settings */
	<?php if( $hongo_checkout_heading_font_size ) : ?>
	    /* Checkout Heading Font Size */
	    .woocommerce-checkout form h4 { font-size: <?php echo sprintf( '%s', $hongo_checkout_heading_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_heading_line_height ) : ?>
	    /* Checkout Heading Line Height */
	    .woocommerce-checkout form h4 { line-height: <?php echo sprintf( '%s', $hongo_checkout_heading_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_heading_latter_spacing ) : ?>
	    /* Checkout Heading Letter Spacing */
	    .woocommerce-checkout form h4 { letter-spacing: <?php echo sprintf( '%s', $hongo_checkout_heading_latter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_heading_text_transform ) : ?>
	    /* Checkout Heading Text Transform */
	    .woocommerce-checkout form h4 { text-transform: <?php echo sprintf( '%s', $hongo_checkout_heading_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_heading_font_weight ) : ?>
	    /* Checkout Heading Font Weight */
	    .woocommerce-checkout form h4 { font-weight: <?php echo sprintf( '%s', $hongo_checkout_heading_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_heading_text_color ) : ?>
	    /* Checkout Heading Color */
	    .woocommerce-checkout form h4 { color: <?php echo sprintf( '%s', $hongo_checkout_heading_text_color ); ?>}
	<?php endif; ?>
/* End Checkout Heading Settings */

/* Checkout Form Label Settings */
	<?php if( $hongo_checkout_label_font_size ) : ?>
	    /* Checkout Form Label Font Size */
	    .woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label { font-size: <?php echo sprintf( '%s', $hongo_checkout_label_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_label_line_height ) : ?>
	    /* Checkout Form Label Line Height */
	    .woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label { line-height: <?php echo sprintf( '%s', $hongo_checkout_label_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_label_letter_spacing ) : ?>
	    /* Checkout Form Label Letter Spacing */
	    .woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label { letter-spacing: <?php echo sprintf( '%s', $hongo_checkout_label_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_label_text_transform ) : ?>
	    /* Checkout Form Label Text Transform */
	    .woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label { text-transform: <?php echo sprintf( '%s', $hongo_checkout_label_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_label_font_weight ) : ?>
	    /* Checkout Form Label Font Weight */
	    .woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label { font-weight: <?php echo sprintf( '%s', $hongo_checkout_label_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_label_text_color ) : ?>
	    /* Checkout Form Label Color */
	    .woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label, .woocommerce-checkout .create-account .form-row.woocommerce-invalid label { color: <?php echo sprintf( '%s', $hongo_checkout_label_text_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_input_border_color ) : ?>
	    /* Checkout Form Label Color */
	    .woocommerce-checkout .woocommerce form .form-row input, .woocommerce-checkout .woocommerce form .form-row textarea, .woocommerce-checkout .select2-container--default .select2-selection--single { border-color: <?php echo sprintf( '%s', $hongo_checkout_input_border_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_input_color ) : ?>
	    /* Checkout Form Input Color */
	   .woocommerce-checkout .woocommerce form .form-row input, .woocommerce-checkout .woocommerce form .form-row textarea, .woocommerce-checkout .select2-container--default .select2-selection--single .select2-selection__rendered { color: <?php echo sprintf( '%s', $hongo_checkout_input_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_input_placeholder_color ) : ?>
	    /* Checkout Form Input Placeholder Color */
	    .woocommerce-checkout .woocommerce form .form-row input::-webkit-input-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?> !important; }
        .woocommerce-checkout .woocommerce form .form-row input::-moz-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?>!important; }
        .woocommerce-checkout .woocommerce form .form-row input::-ms-input-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?> !important; }
        .woocommerce-checkout .woocommerce form .form-row input:-moz-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?> !important; }

        .woocommerce-checkout .woocommerce form .form-row textarea::-webkit-input-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?> !important; }
        .woocommerce-checkout .woocommerce form .form-row textarea::-moz-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?>!important; }
        .woocommerce-checkout .woocommerce form .form-row textarea::-ms-input-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?> !important; }
        .woocommerce-checkout .woocommerce form .form-row textarea:-moz-placeholder { color: <?php echo sprintf( '%s', $hongo_checkout_input_placeholder_color ); ?> !important; }
	<?php endif; ?>
/* End Checkout Form Label Settings */

/* Checkout Form Button Settings */
	<?php if( $hongo_checkout_button_font_size ) : ?>
	    /* My Account Form Button Font Size */
	    .woocommerce-checkout .woocommerce button { font-size: <?php echo sprintf( '%s', $hongo_checkout_button_font_size ); ?> !important;}
	<?php endif; ?>
	<?php if( $hongo_checkout_button_line_height ) : ?>
	    /* My Account Form Button Line Height */
	    .woocommerce-checkout .woocommerce button { line-height: <?php echo sprintf( '%s', $hongo_checkout_button_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_button_letter_spacing ) : ?>
	    /* My Account Form Button Letter Spacing */
	    .woocommerce-checkout .woocommerce button { letter-spacing: <?php echo sprintf( '%s', $hongo_checkout_button_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_button_text_transform ) : ?>
	    /* My Account Form Button Text Transform */
	    .woocommerce-checkout .woocommerce button { text-transform: <?php echo sprintf( '%s', $hongo_checkout_button_text_transform ); ?> !important;}
	<?php endif; ?>
	<?php if( $hongo_checkout_button_font_weight ) : ?>
	    /* My Account Form Button Font Weight */
	    .woocommerce-checkout .woocommerce button { font-weight: <?php echo sprintf( '%s', $hongo_checkout_button_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_bg_button_color ) : ?>
	    /* My Account Form Button Background Color */
	    .woocommerce-checkout .woocommerce button { background-color: <?php echo sprintf( '%s', $hongo_checkout_bg_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_bg_hover_button_color ) : ?>
	    /* My Account Form Button Hover Background Color */
	    .woocommerce-checkout .woocommerce button:hover, .woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover { background-color: <?php echo sprintf( '%s', $hongo_checkout_bg_hover_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_button_color ) : ?>
	    /* My Account Form Button Color */
	    .woocommerce-checkout .woocommerce button { color: <?php echo sprintf( '%s', $hongo_checkout_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_button_hover_color ) : ?>
	    /* My Account Form Button Hover Color */
	    .woocommerce-checkout .woocommerce button:hover, .woocommerce-checkout .woocommerce #payment #place_order:hover { color: <?php echo sprintf( '%s', $hongo_checkout_button_hover_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_border_button_color ) : ?>
	    /* My Account Form Button Border Color */
	    .woocommerce-checkout .woocommerce button { border-color: <?php echo sprintf( '%s', $hongo_checkout_border_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_border_hover_button_color ) : ?>
	    /* My Account Form Button Hover Border Color */
	    .woocommerce-checkout .woocommerce button:hover { border-color: <?php echo sprintf( '%s', $hongo_checkout_border_hover_button_color ); ?>}
	<?php endif; ?>
/* End Checkout Form Button Settings */

/* Checkout Payment Box Settings */
	<?php if( $hongo_checkout_payment_background_color ) : ?>
	    /* Checkout Payment Box Background Color */
	    .woocommerce-checkout #payment ul.payment_methods { background-color: <?php echo sprintf( '%s', $hongo_checkout_payment_background_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_msgbox_background_color ) : ?>
	    /* Checkout Payment Msg Box Background Color*/
	    .woocommerce-checkout #payment div.payment_box { background-color: <?php echo sprintf( '%s', $hongo_checkout_payment_msgbox_background_color ); ?>}
	    .woocommerce-checkout #payment div.payment_box::before { border-bottom-color: <?php echo sprintf( '%s', $hongo_checkout_payment_msgbox_background_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_text_font_size ) : ?>
	    /* Checkout Payment Label Font Size */
	    .woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label { font-size: <?php echo sprintf( '%s', $hongo_checkout_payment_text_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_line_height ) : ?>
	    /* Checkout Payment Label Line Height */
	    .woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label a { line-height: <?php echo sprintf( '%s', $hongo_checkout_payment_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_latter_spacing ) : ?>
	    /* Checkout Payment Label Letter Spacing */
	    .woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label a { letter-spacing: <?php echo sprintf( '%s', $hongo_checkout_payment_latter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_text_transform ) : ?>
	    /* Checkout Payment Label Text Transform */
	    .woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label a { text-transform: <?php echo sprintf( '%s', $hongo_checkout_payment_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_font_weight ) : ?>
	    /* Checkout Payment Label Font Weight */
	    .woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label a { font-weight: <?php echo sprintf( '%s', $hongo_checkout_payment_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_payment_color ) : ?>
	    /* Checkout Payment Label Color */
	    .woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label a { color: <?php echo sprintf( '%s', $hongo_checkout_payment_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_payment_content_box_font_size ) : ?>
	    /* Checkout Payment Content Font Size */
	    .woocommerce-checkout .payment_methods .payment_box p { font-size: <?php echo sprintf( '%s', $hongo_payment_content_box_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_payment_content_box_line_height ) : ?>
	    /* Checkout Payment Content Line Height */
	    .woocommerce-checkout .payment_methods .payment_box p { line-height: <?php echo sprintf( '%s', $hongo_payment_content_box_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_payment_content_box_letter_spacing ) : ?>
	    /* Checkout Payment Content Letter Spacing */
	    .woocommerce-checkout .payment_methods .payment_box p { letter-spacing: <?php echo sprintf( '%s', $hongo_payment_content_box_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_payment_content_text_transform ) : ?>
	    /* Checkout Payment Content Text Transform */
	    .woocommerce-checkout .payment_methods .payment_box p { text-transform: <?php echo sprintf( '%s', $hongo_payment_content_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_payment_content_font_weight ) : ?>
	    /* Checkout Payment Content Font Weight */
	    .woocommerce-checkout .payment_methods .payment_box p { font-weight: <?php echo sprintf( '%s', $hongo_payment_content_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_payment_content_text_color ) : ?>
	    /* Checkout Payment Content Color */
	    .woocommerce-checkout .payment_methods .payment_box p { color: <?php echo sprintf( '%s', $hongo_payment_content_text_color ); ?>}
	<?php endif; ?>
/* End Checkout Payment Box Settings */

/* Checkout General Settings */
	<?php if( $hongo_checkout_top_heading_text_color ) : ?>
	    /* Checkout Content Heading Color */
	    .woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info a, .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info a, .woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info, .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info { color: <?php echo sprintf( '%s', $hongo_checkout_top_heading_text_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_top_heading_icon_color ) : ?>
	    /* Checkout Content Heading Color */
	    .woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info i, .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info i { color: <?php echo sprintf( '%s', $hongo_checkout_top_heading_icon_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_lost_pass_text_color ) : ?>
	    /* Checkout Lost Password Color */
		.woocommerce-checkout .woocommerce form.login .lost_password a, .woocommerce-checkout .woocommerce form.login .lost_password a:hover span { color: <?php echo sprintf( '%s', $hongo_checkout_lost_pass_text_color ); ?>}
		.woocommerce-checkout .woocommerce form.login .lost_password a { border-color: <?php echo sprintf( '%s', $hongo_checkout_lost_pass_text_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_right_box_bg_color ) : ?>
	    /* Checkout Content Right Background Color */
	    .woocommerce-checkout .checkout-sidebar { background-color: <?php echo sprintf( '%s', $hongo_checkout_right_box_bg_color ); ?>}
	<?php endif; ?>
	
	<?php if( $hongo_checkout_right_border_color ) : ?>
	    /* Checkout Content Right Border Color */
	    .woocommerce-checkout .checkout-sidebar table.shop_table tr.cart_item:last-child td, .woocommerce-checkout .woocommerce table.shop_table tfoot td, .woocommerce-checkout form  table.shop_table th, .woocommerce-checkout form table.shop_table td { border-color: <?php echo sprintf( '%s', $hongo_checkout_right_border_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_total_color ) : ?>
	    /* Checkout Total Color */
	    .woocommerce-checkout .checkout-sidebar .order-total span { color: <?php echo sprintf( '%s', $hongo_checkout_total_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_content_heading_text_color ) : ?>
	    /* Checkout Content Heading Color */
	    .woocommerce-checkout form table.shop_table th { color: <?php echo sprintf( '%s', $hongo_checkout_content_heading_text_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_checkout_content_text_color ) : ?>
	    /* Checkout Content Color */
	    .woocommerce-checkout .woocommerce-checkout-review-order-table tbody td, .woocommerce-checkout .woocommerce-privacy-policy-text, .woocommerce-checkout .woocommerce-privacy-policy-text a, .woocommerce-checkout .woocommerce-terms-and-conditions-checkbox-text, .woocommerce-checkout .woocommerce-terms-and-conditions-checkbox-text a, .woocommerce-checkout .woocommerce-form-login p, .woocommerce-checkout .woocommerce-form-coupon p, .woocommerce-checkout form table.shop_table tfoot td, .woocommerce-checkout .woocommerce table.shop_table tfoot td a.woocommerce-remove-coupon, .woocommerce-checkout .woocommerce ul#shipping_method li label { color: <?php echo sprintf( '%s', $hongo_checkout_content_text_color ); ?>}
	<?php endif; ?>
/* End Checkout General Settings */
