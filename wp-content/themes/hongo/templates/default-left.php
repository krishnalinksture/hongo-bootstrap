<?php
/**
 * Displaying left template for default post
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_default_layout_setting	= get_theme_mod( 'hongo_post_layout_setting_default', 'hongo_layout_right_sidebar' );
	$hongo_default_right_sidebar	= get_theme_mod( 'hongo_post_right_sidebar_default', 'sidebar-1' );
	$hongo_default_left_sidebar		= get_theme_mod( 'hongo_post_left_sidebar_default', '' );

	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_default_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_default_layout_setting );

	/* Left Sidebar */
	if( $hongo_default_layout_setting == 'hongo_layout_left_sidebar' ) {

		if ( ! empty( $hongo_default_left_sidebar ) && ! is_active_sidebar( $hongo_default_left_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_default_left_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Right Sidebar */
	if( $hongo_default_layout_setting == 'hongo_layout_right_sidebar' ) {

		if ( ! empty( $hongo_default_right_sidebar ) && ! is_active_sidebar( $hongo_default_right_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_default_right_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Both Sidebar */
	if( $hongo_default_layout_setting == 'hongo_layout_both_sidebar' ) {
		
		if ( ! empty( $hongo_default_left_sidebar ) && ! is_active_sidebar( $hongo_default_left_sidebar ) && ! empty( $hongo_default_right_sidebar ) && ! is_active_sidebar( $hongo_default_right_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_no_sidebar';

		} elseif( ( ! empty( $hongo_default_left_sidebar ) && is_active_sidebar( $hongo_default_left_sidebar ) ) && ! empty( $hongo_default_right_sidebar ) && is_active_sidebar( $hongo_default_right_sidebar ) ) {
			
			$hongo_default_layout_setting = 'hongo_layout_both_sidebar';
		
		} elseif( ! empty( $hongo_default_left_sidebar ) && is_active_sidebar( $hongo_default_left_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_left_sidebar';
		
		} elseif( ! empty( $hongo_default_right_sidebar ) && is_active_sidebar( $hongo_default_right_sidebar ) ) {

			$hongo_default_layout_setting = 'hongo_layout_right_sidebar';

		} else {
			
			$hongo_default_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	switch( $hongo_default_layout_setting ) {
		case 'hongo_layout_left_sidebar':
			?>
				<div class="col-md-9 col-sm-8 col-xs-12 hongo-layout-left-sidebar pull-right no-padding-right hongo-content-right-part">
			<?php
			break;
		case 'hongo_layout_right_sidebar':
			?>
				<div class="col-md-9 col-sm-8 col-xs-12 hongo-layout-right-sidebar no-padding-left hongo-content-left-part">
			<?php
			break;
		case 'hongo_layout_both_sidebar':
			?>
				<div class="both-sidebar-wrap">
	        		<div class="col-md-6 col-sm-12 col-xs-12 hongo-layout-both-sidebar hongo-content-center-part">
			<?php
	    	break;
	}
