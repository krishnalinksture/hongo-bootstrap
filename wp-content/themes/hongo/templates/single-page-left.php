<?php
/**
 * Displaying left template for pages
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_page_widget_style 	= hongo_option( 'hongo_page_widget_style', 'sidebar-style-2' );
	$hongo_page_layout_setting 	= hongo_option( 'hongo_page_layout_setting', 'hongo_layout_no_sidebar' );
	$hongo_page_right_sidebar 	= hongo_option( 'hongo_page_right_sidebar', '' );
	$hongo_page_left_sidebar 	= hongo_option( 'hongo_page_left_sidebar', '' );
	
	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_page_layout_setting 	= apply_filters( 'hongo_page_layout_style', $hongo_page_layout_setting );

	/* Left Sidebar */
	if( $hongo_page_layout_setting == 'hongo_layout_left_sidebar' ) {

		if ( ! empty( $hongo_page_left_sidebar ) && ! is_active_sidebar( $hongo_page_left_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_page_left_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Right Sidebar */
	if( $hongo_page_layout_setting == 'hongo_layout_right_sidebar' ) {

		if ( ! empty( $hongo_page_right_sidebar ) && ! is_active_sidebar( $hongo_page_right_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_page_right_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Both Sidebar */
	if( $hongo_page_layout_setting == 'hongo_layout_both_sidebar' ) {
		
		if ( ! empty( $hongo_page_left_sidebar ) && ! is_active_sidebar( $hongo_page_left_sidebar ) && ! empty( $hongo_page_right_sidebar ) && ! is_active_sidebar( $hongo_page_right_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_no_sidebar';

		} elseif( ( ! empty( $hongo_page_left_sidebar ) && is_active_sidebar( $hongo_page_left_sidebar ) ) && ! empty( $hongo_page_right_sidebar ) && is_active_sidebar( $hongo_page_right_sidebar ) ) {
			
			$hongo_page_layout_setting = 'hongo_layout_both_sidebar';
		
		} elseif( ! empty( $hongo_page_left_sidebar ) && is_active_sidebar( $hongo_page_left_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_left_sidebar';
		
		} elseif( ! empty( $hongo_page_right_sidebar ) && is_active_sidebar( $hongo_page_right_sidebar ) ) {

			$hongo_page_layout_setting = 'hongo_layout_right_sidebar';

		} else {
			
			$hongo_page_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	switch( $hongo_page_layout_setting ) {
		case 'hongo_layout_no_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_class = ( hongo_is_woocommerce_activated() && is_account_page() ) ? ' hongo-my-account-full' : '';
			?>
				<div class="col-md-12 col-sm-12 col-xs-12 hongo-content-full-part<?php echo esc_attr( $hongo_page_class ); ?>">
		    <?php
			break;
		case 'hongo_layout_left_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_class = ( hongo_is_woocommerce_activated() && is_account_page() ) ? ' pull-right' : ' pull-right hongo-page-content-area';
			?>
				<div class="col-md-9 col-sm-8 col-xs-12 hongo-content-right-part<?php echo esc_attr( $hongo_page_class ); ?>">
		    <?php
			break;
		case 'hongo_layout_right_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_class = ( hongo_is_woocommerce_activated() && is_account_page() ) ? '' : ' hongo-page-content-area';
			?>
				<div class="col-md-9 col-sm-8 col-xs-12 hongo-content-left-part<?php echo esc_attr( $hongo_page_class ); ?>">
		    <?php
			break;
		case 'hongo_layout_both_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_class 		= ( hongo_is_woocommerce_activated() && is_account_page() ) ? ' both-content-center' : ' both-content-center hongo-page-content-area';
			?>
				<div class="both-sidebar-wrap">
		        	<div class="col-md-6 col-sm-12 col-xs-12 hongo-content-center-part<?php echo esc_attr( $hongo_page_class ); ?>">
		    <?php
	    	break;
	}
