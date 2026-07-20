<?php
/**
 * Displaying right sidebar for default post
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

	$hongo_post_widget_style		= hongo_option( 'hongo_post_widget_style', 'sidebar-style-2' );
	$hongo_post_sidebar_class		= ( $hongo_post_widget_style ) ? ' hongo-' . $hongo_post_widget_style : '';

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

	switch ( $hongo_default_layout_setting ) {
		case 'hongo_layout_left_sidebar':
			?>
				</div>
				<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar hongo-post-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_default_left_sidebar );

						do_action( 'hongo_sidebar_content_end' );
					?>
				</div>
			<?php
			break;
		case 'hongo_layout_right_sidebar':
			?>
				</div>
				<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar hongo-post-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_default_right_sidebar );

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

							hongo_page_sidebar_style( $hongo_default_left_sidebar );

							do_action( 'hongo_sidebar_content_end' );
						?>
					</div>
		        	<div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar hongo-post-sidebar both-sidebar-right hongo-blog-sidebar<?php echo esc_attr( $hongo_post_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
						<?php
							do_action( 'hongo_sidebar_content_start' );

							hongo_page_sidebar_style( $hongo_default_right_sidebar );

							do_action( 'hongo_sidebar_content_end' );
						?>
					</div>
				</div>
			<?php
			break;
	}
