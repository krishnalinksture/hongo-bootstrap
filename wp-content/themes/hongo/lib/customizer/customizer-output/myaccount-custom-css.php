<?php
/**
 * Generate my account css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* My Account Tab Settings */
$hongo_account_tabtitle_font_size = get_theme_mod( 'hongo_account_tabtitle_font_size', '' );
$hongo_account_tabicon_font_size = get_theme_mod( 'hongo_account_tabicon_font_size', '' );
$hongo_account_tabtitle_line_height = get_theme_mod( 'hongo_account_tabtitle_line_height', '' );
$hongo_account_tabtitle_letter_spacing = get_theme_mod( 'hongo_account_tabtitle_letter_spacing', '' );
$hongo_account_tabtitle_text_transform = get_theme_mod( 'hongo_account_tabtitle_text_transform', '' );
$hongo_account_tabtitle_font_weight = get_theme_mod( 'hongo_account_tabtitle_font_weight', '' );
$hongo_account_tab_bg_color = get_theme_mod( 'hongo_account_tab_bg_color', '' );
$hongo_account_tabtitle_color = get_theme_mod( 'hongo_account_tabtitle_color', '' );
$hongo_account_active_tabtitle_color = get_theme_mod( 'hongo_account_active_tabtitle_color', '' );
$hongo_account_tab_border_color = get_theme_mod( 'hongo_account_tab_border_color', '' );

/* My Account General Settings */
$hongo_account_heading_color = get_theme_mod( 'hongo_account_heading_color', '' );
$hongo_account_content_color = get_theme_mod( 'hongo_account_content_color', '' );
$hongo_account_order_table_border_color = get_theme_mod( 'hongo_account_order_table_border_color', '' );
$hongo_account_order_next_prev_color = get_theme_mod( 'hongo_account_order_next_prev_color', '' );
$hongo_account_order_next_prev_hover_color = get_theme_mod( 'hongo_account_order_next_prev_hover_color', '' );
$hongo_account_loginbox_bg_color = get_theme_mod( 'hongo_account_loginbox_bg_color', '' );
$hongo_account_registerbox_bg_color = get_theme_mod( 'hongo_account_registerbox_bg_color', '' );

/* My Account Form Label Settings */
$hongo_label_text_font_size = get_theme_mod( 'hongo_label_text_font_size', '' );
$hongo_account_label_line_height = get_theme_mod( 'hongo_account_label_line_height', '' );
$hongo_account_label_letter_spacing = get_theme_mod( 'hongo_account_label_letter_spacing', '' );
$hongo_label_text_transform = get_theme_mod( 'hongo_label_text_transform', '' );
$hongo_label_font_weight = get_theme_mod( 'hongo_label_font_weight', '' );
$hongo_label_text_color = get_theme_mod( 'hongo_label_text_color', '' );
$hongo_text_field_border_text_color = get_theme_mod( 'hongo_text_field_border_text_color', '' );

/* My Account Table Heading Settings */
$hongo_table_heading_font_size = get_theme_mod( 'hongo_table_heading_font_size', '' );
$hongo_table_heading_line_height = get_theme_mod( 'hongo_table_heading_line_height', '' );
$hongo_table_heading_letter_spacing = get_theme_mod( 'hongo_table_heading_letter_spacing', '' );
$hongo_table_heading_text_transform = get_theme_mod( 'hongo_table_heading_text_transform', '' );
$hongo_table_heading_font_weight = get_theme_mod( 'hongo_table_heading_font_weight', '' );
$hongo_table_heading_color = get_theme_mod( 'hongo_table_heading_color', '' );

/* My Account Form Button Settings */
$hongo_account_button_font_size = get_theme_mod( 'hongo_account_button_font_size', '' );
$hongo_account_button_line_height = get_theme_mod( 'hongo_account_button_line_height', '' );
$hongo_account_button_letter_spacing = get_theme_mod( 'hongo_account_button_letter_spacing', '' );
$hongo_account_button_text_transform = get_theme_mod( 'hongo_account_button_text_transform', '' );
$hongo_account_button_font_weight = get_theme_mod( 'hongo_account_button_font_weight', '' );
$hongo_account_bg_button_color = get_theme_mod( 'hongo_account_bg_button_color', '' );
$hongo_account_bg_hover_button_color = get_theme_mod( 'hongo_account_bg_hover_button_color', '' );
$hongo_account_button_color = get_theme_mod( 'hongo_account_button_color', '' );
$hongo_account_button_hover_color = get_theme_mod( 'hongo_account_button_hover_color', '' );
$hongo_account_border_button_color = get_theme_mod( 'hongo_account_border_button_color', '' );
$hongo_account_border_hover_button_color = get_theme_mod( 'hongo_account_border_hover_button_color', '' );
?>

/* My Account Tab Settings */
	<?php if( $hongo_account_tabtitle_font_size ) : ?>
	    /* My Account Tab Title Font Size */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a { font-size: <?php echo sprintf( '%s', $hongo_account_tabtitle_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tabicon_font_size ) : ?>
	    /* My Account Tab Icon Font Size */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:before { font-size: <?php echo sprintf( '%s', $hongo_account_tabicon_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tabtitle_line_height ) : ?>
	    /* My Account Tab Title Line Height */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a { line-height: <?php echo sprintf( '%s', $hongo_account_tabtitle_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tabtitle_letter_spacing ) : ?>
	    /* My Account Tab Title Letter Spacing */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a { letter-spacing: <?php echo sprintf( '%s', $hongo_account_tabtitle_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tabtitle_text_transform ) : ?>
	    /* My Account Tab Title Text Transform */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a { text-transform: <?php echo sprintf( '%s', $hongo_account_tabtitle_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tabtitle_font_weight ) : ?>
	    /* My Account Tab Title Font Weight */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a { font-weight: <?php echo sprintf( '%s', $hongo_account_tabtitle_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tab_bg_color ) : ?>
	    /* My Account Tab Background Color */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation { background-color: <?php echo sprintf( '%s', $hongo_account_tab_bg_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tabtitle_color ) : ?>
	    /* My Account Tab Title Color */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a { color: <?php echo sprintf( '%s', $hongo_account_tabtitle_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_active_tabtitle_color ) : ?>
	    /* My Account Active Tab Title Color */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a { color: <?php echo sprintf( '%s', $hongo_account_active_tabtitle_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_tab_border_color ) : ?>
	    /* My Account Tab Border Color */
	    .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li { border-bottom-color: <?php echo sprintf( '%s', $hongo_account_tab_border_color ); ?>}
	<?php endif; ?>
/* End My Account Tab Settings */

/* My Account General Settings */
	<?php if( $hongo_account_heading_color ) : ?>
	    /* My Account Tab Title Color */
	    .woocommerce-MyAccount-content h3, h4.woocommerce-order-details__title, .woocommerce-EditAccountForm legend, .woocommerce-account h4 { color: <?php echo sprintf( '%s', $hongo_account_heading_color ); ?>}
	<?php endif; ?>
	
	<?php if( $hongo_account_content_color ) : ?>
	    /* My Account Form Content Color */
	    .woocommerce-account td, .woocommerce-account .woocommerce-MyAccount-content a, .woocommerce-account address, .woocommerce-account .edit-account em, .woocommerce-account .woocommerce table.shop_table tfoot td, .woocommerce-account .woocommerce form .woocommerce-privacy-policy-text, .woocommerce-account .woocommerce form .woocommerce-privacy-policy-text a, .woocommerce-account .woocommerce-MyAccount-content p { color: <?php echo sprintf( '%s', $hongo_account_content_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_order_table_border_color ) : ?>
	    /* My Account Order Table Border Color */
	    .woocommerce-account .woocommerce table.shop_table td, .woocommerce-account .woocommerce table.shop_table th, .woocommerce-account .woocommerce .woocommerce-pagination--without-numbers { border-color: <?php echo sprintf( '%s', $hongo_account_order_table_border_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_order_next_prev_color ) : ?>
	    /* My Account Order Pagination */
	    .woocommerce-account .woocommerce .woocommerce-pagination a { color: <?php echo sprintf( '%s', $hongo_account_order_next_prev_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_order_next_prev_hover_color ) : ?>
	    /* My Account Order Pagination Hover */
	    .woocommerce-account .woocommerce .woocommerce-pagination a:hover { color: <?php echo sprintf( '%s', $hongo_account_order_next_prev_hover_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_loginbox_bg_color ) : ?>
	    /* My Account Form Button Font Size */
	    .woocommerce-account .woocommerce form.login { background-color: <?php echo sprintf( '%s', $hongo_account_loginbox_bg_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_registerbox_bg_color ) : ?>
	    /* My Account Form Button Line Height */
	    .woocommerce-account .woocommerce form.register { background-color: <?php echo sprintf( '%s', $hongo_account_registerbox_bg_color ); ?>}
	<?php endif; ?>
/* End My Account General Settings */

/* My Account Form Label Settings */
	<?php if( $hongo_label_text_font_size ) : ?>
	    /* My Account Form Label Font Size */
	    .woocommerce-account .woocommerce form .form-row label { font-size: <?php echo sprintf( '%s', $hongo_label_text_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_label_line_height ) : ?>
	    /* My Account Form Label Line Height */
	    .woocommerce-account .woocommerce form .form-row label { line-height: <?php echo sprintf( '%s', $hongo_account_label_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_label_letter_spacing ) : ?>
	    /* My Account Form Label Letter Spacing */
	    .woocommerce-account .woocommerce form .form-row label { letter-spacing: <?php echo sprintf( '%s', $hongo_account_label_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_label_text_transform ) : ?>
	    /* My Account Form Label Text Transform */
	    .woocommerce-account .woocommerce form .form-row label { text-transform: <?php echo sprintf( '%s', $hongo_label_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_label_font_weight ) : ?>
	    /* My Account Form Label Font Weight */
	    .woocommerce-account .woocommerce form .form-row label { font-weight: <?php echo sprintf( '%s', $hongo_label_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_label_text_color ) : ?>
	    /* My Account Form Label Color */
	    .woocommerce-account .woocommerce form .form-row label { color: <?php echo sprintf( '%s', $hongo_label_text_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_text_field_border_text_color ) : ?>
	    /* My Account Form Field Border Color */
	    .woocommerce-account .woocommerce form .form-row input, .woocommerce-account .select2-container--default .select2-selection--single { border-color: <?php echo sprintf( '%s', $hongo_text_field_border_text_color ); ?>}
	<?php endif; ?>
/* End My Account Form Label Settings */

/* My Account Table Heading Settings */
	<?php if( $hongo_table_heading_font_size ) : ?>
	    /* My Account Form Content Font Size */
	   .woocommerce-account .woocommerce table.shop_table th { font-size: <?php echo sprintf( '%s', $hongo_table_heading_font_size ); ?>!important;}
	<?php endif; ?>
	<?php if( $hongo_table_heading_line_height ) : ?>
	    /* My Account Form Content Line Height */
	    .woocommerce-account .woocommerce table.shop_table th { line-height: <?php echo sprintf( '%s', $hongo_table_heading_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_table_heading_letter_spacing ) : ?>
	    /* My Account Form Content Letter Spacing */
	   .woocommerce-account .woocommerce table.shop_table th { letter-spacing: <?php echo sprintf( '%s', $hongo_table_heading_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_table_heading_text_transform ) : ?>
	    /* My Account Form Content Text Transform */
	   .woocommerce-account .woocommerce table.shop_table th { text-transform: <?php echo sprintf( '%s', $hongo_table_heading_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_table_heading_font_weight ) : ?>
	    /* My Account Form Content Font Weight */
	   .woocommerce-account .woocommerce table.shop_table th { font-weight: <?php echo sprintf( '%s', $hongo_table_heading_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_table_heading_color ) : ?>
	    /* My Account Form Content Color */
	    .woocommerce-account .woocommerce table.shop_table th { color: <?php echo sprintf( '%s', $hongo_table_heading_color ); ?>}
	<?php endif; ?>
/* End My Account Table Heading Settings */

/* My Account Form Button Settings */
	<?php if( $hongo_account_button_font_size ) : ?>
	    /* My Account Form Button Font Size */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { font-size: <?php echo sprintf( '%s', $hongo_account_button_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_button_line_height ) : ?>
	    /* My Account Form Button Line Height */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { line-height: <?php echo sprintf( '%s', $hongo_account_button_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_button_letter_spacing ) : ?>
	    /* My Account Form Button Letter Spacing */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { letter-spacing: <?php echo sprintf( '%s', $hongo_account_button_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_button_text_transform ) : ?>
	    /* My Account Form Button Text Transform */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button, .woocommerce-account .hongo-my-account-full .btn { text-transform: <?php echo sprintf( '%s', $hongo_account_button_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_button_font_weight ) : ?>
	    /* My Account Form Button Font Weight */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { font-weight: <?php echo sprintf( '%s', $hongo_account_button_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_bg_button_color ) : ?>
	    /* My Account Form Button Background Color */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { background-color: <?php echo sprintf( '%s', $hongo_account_bg_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_bg_hover_button_color ) : ?>
	    /* My Account Form Button Hover Background Color */
	    .woocommerce-account .woocommerce table.my_account_orders .button:hover, .woocommerce-account .woocommerce button:hover { background-color: <?php echo sprintf( '%s', $hongo_account_bg_hover_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_button_color ) : ?>
	    /* My Account Form Button Color */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { color: <?php echo sprintf( '%s', $hongo_account_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_button_hover_color ) : ?>
	    /* My Account Form Button Hover Color */
	    .woocommerce-account .woocommerce table.my_account_orders .button:hover, .woocommerce-account .woocommerce button:hover { color: <?php echo sprintf( '%s', $hongo_account_button_hover_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_border_button_color ) : ?>
	    /* My Account Form Button Border Color */
	    .woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button { border-color: <?php echo sprintf( '%s', $hongo_account_border_button_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_account_border_hover_button_color ) : ?>
	    /* My Account Form Button Hover Border Color */
	    .woocommerce-account .woocommerce table.my_account_orders .button:hover, .woocommerce-account .woocommerce button:hover { border-color: <?php echo sprintf( '%s', $hongo_account_border_hover_button_color ); ?>}
	<?php endif; ?>
/* End My Account Form Button Settings */
