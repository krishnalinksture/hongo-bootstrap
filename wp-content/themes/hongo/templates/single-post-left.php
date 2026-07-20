<?php
/**
 * Displaying left template for single post
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_single_post_layout_setting 	= hongo_option( 'hongo_single_post_layout_setting', 'hongo_layout_right_sidebar' );
	$hongo_single_post_left_sidebar 	= hongo_option( 'hongo_single_post_left_sidebar', 'sidebar-1' );
	$hongo_single_post_right_sidebar 	= hongo_option( 'hongo_single_post_right_sidebar', 'sidebar-1' );
	
	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_single_post_layout_setting 	= apply_filters( 'hongo_page_layout_style', $hongo_single_post_layout_setting );	

	/* Left Sidebar */
	if( $hongo_single_post_layout_setting == 'hongo_layout_left_sidebar' ) {

		if ( ! empty( $hongo_single_post_left_sidebar ) && ! is_active_sidebar( $hongo_single_post_left_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_single_post_left_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Right Sidebar */
	if( $hongo_single_post_layout_setting == 'hongo_layout_right_sidebar' ) {

		if ( ! empty( $hongo_single_post_right_sidebar ) && ! is_active_sidebar( $hongo_single_post_right_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_single_post_right_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Both Sidebar */
	if( $hongo_single_post_layout_setting == 'hongo_layout_both_sidebar' ) {
		
		if ( ! empty( $hongo_single_post_left_sidebar ) && ! is_active_sidebar( $hongo_single_post_left_sidebar ) && ! empty( $hongo_single_post_right_sidebar ) && ! is_active_sidebar( $hongo_single_post_right_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';

		} elseif( ( ! empty( $hongo_single_post_left_sidebar ) && is_active_sidebar( $hongo_single_post_left_sidebar ) ) && ! empty( $hongo_single_post_right_sidebar ) && is_active_sidebar( $hongo_single_post_right_sidebar ) ) {
			
			$hongo_single_post_layout_setting = 'hongo_layout_both_sidebar';
		
		} elseif( ! empty( $hongo_single_post_left_sidebar ) && is_active_sidebar( $hongo_single_post_left_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_left_sidebar';
		
		} elseif( ! empty( $hongo_single_post_right_sidebar ) && is_active_sidebar( $hongo_single_post_right_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_right_sidebar';

		} else {
			
			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	$hongo_post_widget_style	= hongo_option( 'hongo_post_widget_style', 'sidebar-style-2' );
	$hongo_post_sidebar_class	= ( $hongo_post_widget_style ) ? ' hongo-' . $hongo_post_widget_style : '';

	switch( $hongo_single_post_layout_setting ) {
		case 'hongo_layout_left_sidebar':
			?>
				<div class="col-md-9 col-sm-12 col-xs-12 hongo-layout-left-sidebar pull-right no-padding-right hongo-content-right-part">
			<?php
			break;
		case 'hongo_layout_right_sidebar':
			?>
				<div class="col-md-9 col-sm-12 col-xs-12 hongo-layout-right-sidebar no-padding-left hongo-content-left-part">
			<?php
			break;
		case 'hongo_layout_both_sidebar':
			?>
				<div class="both-sidebar-wrap">
			        <div class="col-md-6 col-sm-12 col-xs-12 hongo-layout-both-sidebar no-padding-lr hongo-content-center-part">
	        <?php
	    	break;
	}
