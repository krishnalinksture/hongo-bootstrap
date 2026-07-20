<?php
/**
 * Displaying left template for archive post
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_archive_layout_setting	= get_theme_mod( 'hongo_post_layout_setting_archive', 'hongo_layout_right_sidebar' );
	$hongo_archive_right_sidebar	= get_theme_mod( 'hongo_post_right_sidebar_archive', 'sidebar-1' );
	$hongo_archive_left_sidebar		= get_theme_mod( 'hongo_post_left_sidebar_archive', '' );

	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_archive_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_archive_layout_setting );

	/* Left Sidebar */
	if( $hongo_archive_layout_setting == 'hongo_layout_left_sidebar' ) {

		if ( ! empty( $hongo_archive_left_sidebar ) && ! is_active_sidebar( $hongo_archive_left_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_archive_left_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Right Sidebar */
	if( $hongo_archive_layout_setting == 'hongo_layout_right_sidebar' ) {

		if ( ! empty( $hongo_archive_right_sidebar ) && ! is_active_sidebar( $hongo_archive_right_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_archive_right_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	/* Both Sidebar */
	if( $hongo_archive_layout_setting == 'hongo_layout_both_sidebar' ) {
		
		if ( ! empty( $hongo_archive_left_sidebar ) && ! is_active_sidebar( $hongo_archive_left_sidebar ) && ! empty( $hongo_archive_right_sidebar ) && ! is_active_sidebar( $hongo_archive_right_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_no_sidebar';

		} elseif( ( ! empty( $hongo_archive_left_sidebar ) && is_active_sidebar( $hongo_archive_left_sidebar ) ) && ! empty( $hongo_archive_right_sidebar ) && is_active_sidebar( $hongo_archive_right_sidebar ) ) {
			
			$hongo_archive_layout_setting = 'hongo_layout_both_sidebar';
		
		} elseif( ! empty( $hongo_archive_left_sidebar ) && is_active_sidebar( $hongo_archive_left_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_left_sidebar';
		
		} elseif( ! empty( $hongo_archive_right_sidebar ) && is_active_sidebar( $hongo_archive_right_sidebar ) ) {

			$hongo_archive_layout_setting = 'hongo_layout_right_sidebar';

		} else {
			
			$hongo_archive_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	switch( $hongo_archive_layout_setting ) {
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
