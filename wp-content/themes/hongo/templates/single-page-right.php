<?php
/**
 * Displaying right sidebar for pages
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_page_widget_style	= hongo_option( 'hongo_page_widget_style', 'sidebar-style-2' );
	$hongo_page_layout_setting	= hongo_option( 'hongo_page_layout_setting', 'hongo_layout_no_sidebar' );
	$hongo_page_right_sidebar	= hongo_option( 'hongo_page_right_sidebar', '' );
	$hongo_page_left_sidebar	= hongo_option( 'hongo_page_left_sidebar', '' );

	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_page_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_page_layout_setting );

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

	switch ( $hongo_page_layout_setting ) {
		case 'hongo_layout_no_sidebar':
			?>
				</div>
			<?php
			break;
		case 'hongo_layout_left_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_class 	= ( hongo_is_woocommerce_activated() && is_account_page() ) ? '' : ' hongo-page-widget-area';
			$hongo_page_class   .= ( $hongo_page_widget_style ) ? ' hongo-' . $hongo_page_widget_style : '';
			?>
				</div>
				<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar hongo-page-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_page_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_page_left_sidebar );

						do_action( 'hongo_sidebar_content_end' );
					?>
				</div>
			<?php
			break;
		case 'hongo_layout_right_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_class	= ( hongo_is_woocommerce_activated() && is_account_page() ) ? '' : ' hongo-page-widget-area';
			$hongo_page_class	.= ( $hongo_page_widget_style ) ? ' hongo-' . $hongo_page_widget_style : '';
			?>
				</div>
				<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar hongo-page-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_page_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
					<?php
						do_action( 'hongo_sidebar_content_start' );

						hongo_page_sidebar_style( $hongo_page_right_sidebar );

						do_action( 'hongo_sidebar_content_end' );
					?>
				</div>
			<?php
			break;
		case 'hongo_layout_both_sidebar':
			/* if WooCommerce plugin is activated */
			$hongo_page_left_class 	= ( hongo_is_woocommerce_activated() && is_account_page() ) ? ' both-sidebar-left' : ' both-sidebar-left hongo-page-widget-area';
			$hongo_page_left_class .= ( $hongo_page_widget_style ) ? ' hongo-' . $hongo_page_widget_style : '';
			$hongo_page_right_class	= ( hongo_is_woocommerce_activated() && is_account_page() ) ? ' both-sidebar-right' : ' both-sidebar-right hongo-page-widget-area';
			$hongo_page_right_class	.= ( $hongo_page_widget_style ) ? ' hongo-' . $hongo_page_widget_style : '';
			?>
					</div>
					<div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar hongo-page-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_page_left_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
						<?php
							do_action( 'hongo_sidebar_content_start' );

							hongo_page_sidebar_style( $hongo_page_left_sidebar );

							do_action( 'hongo_sidebar_content_end' );
						?>
					</div>
		            <div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar hongo-page-sidebar hongo-blog-sidebar<?php echo esc_attr( $hongo_page_right_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
						<?php
							do_action( 'hongo_sidebar_content_start' );

							hongo_page_sidebar_style( $hongo_page_right_sidebar );

							do_action( 'hongo_sidebar_content_end' );
						?>
					</div>
				</div>
			<?php
			break;
	}
