<?php
/**
 * The Template for displaying single product content wrapper
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-after.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$hongo_single_product_layout_setting	= hongo_option( 'hongo_single_product_layout_setting', 'hongo_layout_no_sidebar' );
$hongo_single_product_right_sidebar		= hongo_option( 'hongo_single_product_right_sidebar', '' );
$hongo_single_product_left_sidebar		= hongo_option( 'hongo_single_product_left_sidebar', '' );

// Filter for change layout style for ex. ?sidebar=right_sidebar
$hongo_single_product_layout_setting			= apply_filters( 'hongo_page_layout_style', $hongo_single_product_layout_setting );
$hongo_single_product_content_container_fluid	= hongo_option( 'hongo_single_product_container_style', 'container' );

// Filter for change container style for ex. ?container=full
$hongo_single_product_content_container_fluid = apply_filters( 'hongo_page_container_style', $hongo_single_product_content_container_fluid );

$hongo_product_widget_style 	= hongo_option( 'hongo_product_widget_style', 'sidebar-style-1' );
$hongo_product_sidebar_class 	= ( $hongo_product_widget_style ) ? ' hongo-' . $hongo_product_widget_style : '';
$hongo_product_sidebar_class 	.= ( $hongo_single_product_content_container_fluid == 'container' ) ? ' col-lg-3' :  ' col-lg-2';

// Left Sidebar
if( $hongo_single_product_layout_setting == 'hongo_layout_left_sidebar' ) {

	if ( ! empty( $hongo_single_product_left_sidebar ) && ! is_active_sidebar( $hongo_single_product_left_sidebar ) ) {

		$hongo_single_product_layout_setting = 'hongo_layout_no_sidebar';

	} elseif ( empty( $hongo_single_product_left_sidebar ) ) {

		$hongo_single_product_layout_setting = 'hongo_layout_no_sidebar';
	}
}

// Right Sidebar
if( $hongo_single_product_layout_setting == 'hongo_layout_right_sidebar' ) {

	if ( ! empty( $hongo_single_product_right_sidebar ) && ! is_active_sidebar( $hongo_single_product_right_sidebar ) ) {

		$hongo_single_product_layout_setting = 'hongo_layout_no_sidebar';

	} elseif ( empty( $hongo_single_product_right_sidebar ) ) {

		$hongo_single_product_layout_setting = 'hongo_layout_no_sidebar';
	}
}

// Both Sidebar
if( $hongo_single_product_layout_setting == 'hongo_layout_both_sidebar' ) {
	
	if ( ! empty( $hongo_single_product_left_sidebar ) && ! is_active_sidebar( $hongo_single_product_left_sidebar ) && ! empty( $hongo_single_product_right_sidebar ) && ! is_active_sidebar( $hongo_single_product_right_sidebar ) ) {

		$hongo_single_product_layout_setting = 'hongo_layout_no_sidebar';

	} elseif( ( ! empty( $hongo_single_product_left_sidebar ) && is_active_sidebar( $hongo_single_product_left_sidebar ) ) && ! empty( $hongo_single_product_right_sidebar ) && is_active_sidebar( $hongo_single_product_right_sidebar ) ) {
		
		$hongo_single_product_layout_setting = 'hongo_layout_both_sidebar';
	
	} elseif( ! empty( $hongo_single_product_left_sidebar ) && is_active_sidebar( $hongo_single_product_left_sidebar ) ) {


		$hongo_single_product_layout_setting = 'hongo_layout_left_sidebar';
	
	} elseif( ! empty( $hongo_single_product_right_sidebar ) && is_active_sidebar( $hongo_single_product_right_sidebar ) ) {


		$hongo_single_product_layout_setting = 'hongo_layout_right_sidebar';

	} else {
		
		$hongo_single_product_layout_setting = 'hongo_layout_no_sidebar';
	}

}

switch ($hongo_single_product_layout_setting) {
	case 'hongo_layout_no_sidebar':
		?>
			</div>
		<?php
		break;
	case 'hongo_layout_left_sidebar':
		?>
			</div>
			<div class="hongo-product-common-sidebar-left-overlay"></div>
			<div id="secondary" class="sidebar hongo-product-sidebar hongo-woocommerce-sidebar hongo-product-common-sidebar-left<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-left-sidebar sidebar-close" href="javascript:void(0);">X</a>
					<div class="hongo-product-common-sidebar-left-wrap">
						<?php hongo_page_sidebar_style( $hongo_single_product_left_sidebar ); ?>
					</div>
			</div>
		<?php
		break;
	case 'hongo_layout_right_sidebar':
		?>
			</div>
			<div class="hongo-product-common-sidebar-right-overlay"></div>
			<div id="secondary" class="sidebar hongo-product-sidebar hongo-woocommerce-sidebar hongo-product-common-sidebar-right<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-right-sidebar sidebar-close" href="javascript:void(0);">X</a>
					<div class="hongo-product-common-sidebar-right-wrap">
						<?php hongo_page_sidebar_style( $hongo_single_product_right_sidebar ); ?>
					</div>		
			</div>
		<?php
		break;
	case 'hongo_layout_both_sidebar':
		?>
			</div>
			<div class="hongo-product-common-sidebar-left-overlay"></div>
			<div id="secondary" class="sidebar hongo-product-sidebar hongo-woocommerce-sidebar both-sidebar-left hongo-product-common-sidebar-left<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
				<a class="hongo-close-left-sidebar sidebar-close" href="javascript:void(0);">X</a>
				<div class="hongo-product-common-sidebar-left-wrap">
					<?php hongo_page_sidebar_style( $hongo_single_product_left_sidebar ); ?>
				</div>
			</div>
			<div class="hongo-product-common-sidebar-right-overlay"></div>
        	<div id="secondary" class="sidebar hongo-product-sidebar hongo-woocommerce-sidebar both-sidebar-right hongo-product-common-sidebar-right<?php echo esc_attr( $hongo_product_sidebar_class ); ?>" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
    			<a class="hongo-close-right-sidebar sidebar-close" href="javascript:void(0);">X</a>
				<div class="hongo-product-common-sidebar-right-wrap">
					<?php hongo_page_sidebar_style( $hongo_single_product_right_sidebar ); ?>
				</div>
			</div>
		</div>
	<?php
	break;
}
