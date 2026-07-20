<?php
/**
 * The Template for displaying product archives content wrapper
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product-before.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Check if page container style */
$hongo_product_archive_container_style	= hongo_option( 'hongo_product_archive_container_style', 'container-fluid-with-padding' );

/* Filter for change container style for ex. ?container=full */
$hongo_product_archive_container_style	= apply_filters( 'hongo_page_container_style', $hongo_product_archive_container_style );

$hongo_product_archive_layout_setting	= get_theme_mod( 'hongo_product_archive_layout_setting', 'hongo_layout_left_sidebar' );

/* Filter for change layout style for ex. ?sidebar=right_sidebar */
$hongo_product_archive_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_product_archive_layout_setting );
$hongo_product_sidebar_class			= ( $hongo_product_archive_container_style == 'container' ) ? ' col-lg-9 col-md-12 col-sm-12' :  ' col-lg-10 col-md-12 col-sm-12';
$hongo_product_both_sidebar_class		= ( $hongo_product_archive_container_style == 'container' ) ? ' col-lg-6 col-md-12 col-sm-12' :  ' col-lg-8 col-md-12 col-sm-12';

$hongo_product_archive_right_sidebar 	= get_theme_mod( 'hongo_product_archive_right_sidebar', 'hongo-shop-1' );
$hongo_product_archive_left_sidebar 	= get_theme_mod( 'hongo_product_archive_left_sidebar', 'hongo-shop-1' );

/* Left Sidebar */
if( $hongo_product_archive_layout_setting == 'hongo_layout_left_sidebar' ) {

	if ( ! empty( $hongo_product_archive_left_sidebar ) && ! is_active_sidebar( $hongo_product_archive_left_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';

	} elseif ( empty( $hongo_product_archive_left_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';
	}
}

/* Right Sidebar */
if( $hongo_product_archive_layout_setting == 'hongo_layout_right_sidebar' ) {

	if ( ! empty( $hongo_product_archive_right_sidebar ) && ! is_active_sidebar( $hongo_product_archive_right_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';

	} elseif ( empty( $hongo_product_archive_right_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';
	}
}

/* Both Sidebar */
if( $hongo_product_archive_layout_setting == 'hongo_layout_both_sidebar' ) {
	
	if ( ! empty( $hongo_product_archive_left_sidebar ) && ! is_active_sidebar( $hongo_product_archive_left_sidebar ) && ! empty( $hongo_product_archive_right_sidebar ) && ! is_active_sidebar( $hongo_product_archive_right_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';

	} elseif( ( ! empty( $hongo_product_archive_left_sidebar ) && is_active_sidebar( $hongo_product_archive_left_sidebar ) ) && ! empty( $hongo_product_archive_right_sidebar ) && is_active_sidebar( $hongo_product_archive_right_sidebar ) ) {
		
		$hongo_product_archive_layout_setting = 'hongo_layout_both_sidebar';
	
	} elseif( ! empty( $hongo_product_archive_left_sidebar ) && is_active_sidebar( $hongo_product_archive_left_sidebar ) ) {


		$hongo_product_archive_layout_setting = 'hongo_layout_left_sidebar';
	
	} elseif( ! empty( $hongo_product_archive_right_sidebar ) && is_active_sidebar( $hongo_product_archive_right_sidebar ) ) {


		$hongo_product_archive_layout_setting = 'hongo_layout_right_sidebar';

	} else {
		
		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';
	}

}

switch( $hongo_product_archive_layout_setting ) {
	case 'hongo_layout_no_sidebar':
		?>
			<div class="col-sm-12 col-xs-12 hongo-content-full-part hongo-shop-content-part">
		<?php
			do_action( 'hongo_shop_content_part_start' );
		break;
	case 'hongo_layout_left_sidebar':
		?>
			<div class="col-xs-12 pull-right hongo-content-right-part hongo-shop-content-part<?php echo esc_attr( $hongo_product_sidebar_class ); ?>">
		<?php
			do_action( 'hongo_shop_content_part_start' );
		break;
	case 'hongo_layout_right_sidebar':
		?>
			<div class="col-xs-12 hongo-content-left-part hongo-shop-content-part<?php echo esc_attr( $hongo_product_sidebar_class ); ?>">
		<?php
			do_action( 'hongo_shop_content_part_start' );
		break;
	case 'hongo_layout_both_sidebar':
		?>
			<div class="both-sidebar-wrap">
				<div class="col-xs-12 both-content-center post-center hongo-content-center-part hongo-shop-content-part<?php echo esc_attr( $hongo_product_both_sidebar_class ); ?>">
		<?php
				do_action( 'hongo_shop_content_part_start' );
		break;
}
