<?php
/**
 * The Template for displaying single product sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-before.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$hongo_single_product_layout_setting = hongo_option( 'hongo_single_product_layout_setting', 'hongo_layout_no_sidebar' );

// Filter for change layout style for ex. ?sidebar=right_sidebar
$hongo_single_product_layout_setting = apply_filters( 'hongo_page_layout_style', $hongo_single_product_layout_setting );

$hongo_single_product_content_container_fluid = hongo_option( 'hongo_single_product_container_style', 'container' );

// Filter for change container style for ex. ?container=full
$hongo_single_product_content_container_fluid = apply_filters( 'hongo_page_container_style', $hongo_single_product_content_container_fluid );

$hongo_product_sidebar_class = ( $hongo_single_product_content_container_fluid == 'container' ) ? ' col-lg-9 col-md-12 col-sm-12' :  ' col-lg-10 col-md-12 col-sm-12';
$hongo_product_both_sidebar_class = ( $hongo_single_product_content_container_fluid == 'container' ) ? ' col-lg-6 col-md-12 col-sm-12' :  ' col-lg-8 col-md-12 col-sm-12';

switch( $hongo_single_product_layout_setting ) {
	case 'hongo_layout_no_sidebar':
		?>
			<div class="col-sm-12 col-xs-12 hongo-full-width-layout hongo-full-width-no-padding hongo-content-full-part">
		<?php
		break;
	case 'hongo_layout_left_sidebar':
		?>
			<div class="col-xs-12 pull-right hongo-full-width-no-padding hongo-content-right-part<?php echo esc_attr( $hongo_product_sidebar_class ); ?>">
				<div class="hongo-sidebar-btn-wrap">
					<div class="hongo-left-common-sidebar-link alt-font">
						<?php $hongo_single_left_sidebar_text = apply_filters( 'hongo_single_left_sidebar_text', esc_html__( 'Show Sidebar', 'hongo' ) ); ?>
						<i class="fa-solid fa-bars"></i><?php echo sprintf( '%s', $hongo_single_left_sidebar_text ); ?>
					</div>
				</div>
		<?php
		break;
	case 'hongo_layout_right_sidebar':
		?>
			<div class="col-xs-12 hongo-full-width-no-padding hongo-content-left-part<?php echo esc_attr( $hongo_product_sidebar_class ); ?>">
				<div class="hongo-sidebar-btn-wrap">
					<div class="hongo-right-common-sidebar-link alt-font">
						<?php $hongo_single_right_sidebar_text = apply_filters( 'hongo_single_right_sidebar_text', esc_html__( 'Show Sidebar', 'hongo' ) ); ?>
						<i class="fa-solid fa-bars"></i><?php echo sprintf( '%s', $hongo_single_right_sidebar_text ); ?>
					</div>
				</div>
		<?php
		break;
	case 'hongo_layout_both_sidebar':
		?>
			<div class="both-sidebar-wrap">
	        	<div class="col-xs-12 both-content-center post-center hongo-full-width-no-padding hongo-content-center-part<?php echo esc_attr( $hongo_product_both_sidebar_class ); ?>">
					<div class="hongo-sidebar-btn-wrap">
						<div class="hongo-left-common-sidebar-link alt-font">
							<?php $hongo_single_left_sidebar_text = apply_filters( 'hongo_single_left_sidebar_text', esc_html__( 'Show Sidebar', 'hongo' ) ); ?>
							<i class="fa-solid fa-bars"></i><?php sprintf( '%s', $hongo_single_left_sidebar_text ); ?>
						</div>
						<div class="hongo-right-common-sidebar-link alt-font">
							<?php $hongo_single_right_sidebar_text = apply_filters( 'hongo_single_right_sidebar_text', esc_html__( 'Show Sidebar', 'hongo' ) ); ?>
							<i class="fa-solid fa-bars"></i><?php echo sprintf( '%s', $hongo_single_right_sidebar_text ); ?>
						</div>
					</div>
		<?php
		break;
}
