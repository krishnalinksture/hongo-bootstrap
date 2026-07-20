<?php
/**
 * The Template for displaying product archives sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product-after.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Check if page container style */
$hongo_product_archive_container_style	= hongo_option( 'hongo_product_archive_container_style', 'container-fluid-with-padding' );

// Filter for change container style for ex. ?container=full
$hongo_product_archive_container_style 	= apply_filters( 'hongo_page_container_style', $hongo_product_archive_container_style );

$hongo_product_archive_layout_setting 	= get_theme_mod( 'hongo_product_archive_layout_setting', 'hongo_layout_left_sidebar' );
$hongo_product_archive_right_sidebar 	= get_theme_mod( 'hongo_product_archive_right_sidebar', 'hongo-shop-1' );
$hongo_product_archive_left_sidebar 	= get_theme_mod( 'hongo_product_archive_left_sidebar', 'hongo-shop-1' );

// Filter for change layout style for ex. ?sidebar=hongo_layout_right_sidebar
$hongo_product_archive_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_product_archive_layout_setting );

$hongo_product_widget_style 	= hongo_option( 'hongo_product_widget_style', 'sidebar-style-1' );
$hongo_product_sidebar_class 	= ( $hongo_product_widget_style ) ? ' hongo-' . $hongo_product_widget_style : '';
$hongo_product_sidebar_class 	.= ( $hongo_product_archive_container_style == 'container' ) ? ' col-md-3' :  ' col-lg-2 col-md-3';

// Left Sidebar
if( $hongo_product_archive_layout_setting == 'hongo_layout_left_sidebar' ) {

	if ( ! empty( $hongo_product_archive_left_sidebar ) && ! is_active_sidebar( $hongo_product_archive_left_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';

	} elseif ( empty( $hongo_product_archive_left_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';
	}
}

// Right Sidebar
if( $hongo_product_archive_layout_setting == 'hongo_layout_right_sidebar' ) {

	if ( ! empty( $hongo_product_archive_right_sidebar ) && ! is_active_sidebar( $hongo_product_archive_right_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';

	} elseif ( empty( $hongo_product_archive_right_sidebar ) ) {

		$hongo_product_archive_layout_setting = 'hongo_layout_no_sidebar';
	}
}

// Both Sidebar
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

switch ($hongo_product_archive_layout_setting) {
	case 'hongo_layout_no_sidebar':
			do_action( 'hongo_shop_content_part_end' );
		echo '</div>'; // @codingStandardsIgnoreLine
		break;
	case 'hongo_layout_left_sidebar':
			do_action( 'hongo_shop_content_part_end' );
		?>
			</div>
			<div class="hongo-product-common-sidebar-left-overlay"></div>
			<div id="secondary" class="col-sm-4 col-xs-12 sidebar hongo-product-sidebar hongo-woocommerce-sidebar hongo-product-common-sidebar-left<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-left-sidebar sidebar-close" href="javascript:void(0);">X</a>
				<div class="hongo-product-common-sidebar-left-wrap">
					<?php hongo_page_sidebar_style( $hongo_product_archive_left_sidebar ); ?>
				</div>
			</div>
		<?php
		break;
	case 'hongo_layout_right_sidebar':
			do_action( 'hongo_shop_content_part_end' );
		?>
			</div>
			<div class="hongo-product-common-sidebar-right-overlay"></div>
			<div id="secondary" class="col-sm-4 col-xs-12 sidebar hongo-product-sidebar hongo-woocommerce-sidebar hongo-product-common-sidebar-right<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-right-sidebar sidebar-close" href="javascript:void(0);">X</a>
				<div class="hongo-product-common-sidebar-right-wrap">
					<?php hongo_page_sidebar_style( $hongo_product_archive_right_sidebar ); ?>
				</div>
			</div>
		<?php
		break;
	case 'hongo_layout_both_sidebar':
			do_action( 'hongo_shop_content_part_end' );
		?>
			</div>
			<div class="hongo-product-common-sidebar-left-overlay"></div>
			<div id="secondary" class="col-sm-6 col-xs-12 sidebar hongo-product-sidebar hongo-woocommerce-sidebar both-sidebar-left hongo-product-common-sidebar-left<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-left-sidebar sidebar-close" href="javascript:void(0);">X</a>
					<div class="hongo-product-common-sidebar-left-wrap">
						<?php hongo_page_sidebar_style( $hongo_product_archive_left_sidebar ); ?>
					</div>
			</div>
			<div class="hongo-product-common-sidebar-right-overlay"></div>
			<div id="secondary" class="col-sm-6 col-xs-12 sidebar hongo-product-sidebar hongo-woocommerce-sidebar both-sidebar-right hongo-product-common-sidebar-right<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-right-sidebar sidebar-close" href="javascript:void(0);">X</a>
				<div class="hongo-product-common-sidebar-right-wrap">
					<?php hongo_page_sidebar_style( $hongo_product_archive_right_sidebar ); ?>
				</div>
			</div>
		<?php
			break;
}
