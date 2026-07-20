<?php
/**
 * Displaying right sidebar for single post
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_single_post_layout_setting	= hongo_option( 'hongo_single_post_layout_setting', 'hongo_layout_right_sidebar' );
	$hongo_single_post_right_sidebar	= hongo_option( 'hongo_single_post_right_sidebar', 'sidebar-1' );
	$hongo_single_post_left_sidebar		= hongo_option( 'hongo_single_post_left_sidebar', 'sidebar-1' );

	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_single_post_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_single_post_layout_setting );
	
	$hongo_post_widget_style			= hongo_option( 'hongo_post_widget_style', 'sidebar-style-2' );
	$hongo_post_sidebar_class			= ( $hongo_post_widget_style ) ? ' hongo-' . $hongo_post_widget_style : '';

	// Left Sidebar */
	if( $hongo_single_post_layout_setting == 'hongo_layout_left_sidebar' ) {

		if ( ! empty( $hongo_single_post_left_sidebar ) && ! is_active_sidebar( $hongo_single_post_left_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_single_post_left_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	// Right Sidebar */
	if( $hongo_single_post_layout_setting == 'hongo_layout_right_sidebar' ) {

		if ( ! empty( $hongo_single_post_right_sidebar ) && ! is_active_sidebar( $hongo_single_post_right_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';

		} elseif ( empty( $hongo_single_post_right_sidebar ) ) {

			$hongo_single_post_layout_setting = 'hongo_layout_no_sidebar';
		}
	}

	// Both Sidebar */
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

	switch ( $hongo_single_post_layout_setting ) {
		case 'hongo_layout_left_sidebar':
			?>
				</div>
				<div id="secondary" class="col-md-3 col-sm-12 col-xs-12 sidebar hongo-post-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_single_post_left_sidebar );

						do_action( 'hongo_sidebar_content_end' );
					?>
				</div>
			<?php
			break;
		case 'hongo_layout_right_sidebar':
			?>
				</div>
				<div id="secondary" class="col-md-3 col-sm-12 col-xs-12 sidebar hongo-post-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_single_post_right_sidebar );

						do_action( 'hongo_sidebar_content_end' );
					?>
				</div>
			<?php
			break;
		case 'hongo_layout_both_sidebar':
			?>
					</div>
					<div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar hongo-post-sidebar both-sidebar-left hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
						<?php
							do_action( 'hongo_sidebar_content_start' );

							hongo_page_sidebar_style( $hongo_single_post_left_sidebar );

							do_action( 'hongo_sidebar_content_end' );
						?>
					</div>
					<div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar hongo-post-sidebar both-sidebar-right hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_single_post_right_sidebar );

						do_action( 'hongo_sidebar_content_end' );
					?>
					</div>
				</div>
			<?php
			break;
	}
