<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

$hongo_product_archive_enable_pagination = hongo_get_product_archive_enable_shop_pagination();
$hongo_product_archive_product_pagination_style = hongo_get_product_archive_shop_pagination_style();

if ( $total <= 1 ) {
	return;
}

if( $hongo_product_archive_enable_pagination == '1' ) {
	
	// Animation
	global $animate_shop_product_count;

	$animation_class = $animation_attr = '';
	$hongo_product_archive_animation_delay 		= get_theme_mod( 'hongo_product_archive_animation_delay', '' );
	$hongo_product_archive_animation_duration 	= get_theme_mod( 'hongo_product_archive_animation_duration', '' );

	// Animation
	$animation_class .= ' wow fadeIn';

	if( ! empty( $hongo_product_archive_animation_delay ) ) {

		if( empty( $animate_shop_product_count ) ) {
			$animate_shop_product_count = 0;
		}
		if( ! empty( $hongo_product_archive_animation_delay ) ) {

			$animation_attr .= ' data-wow-delay="' . esc_attr( $animate_shop_product_count ) . 'ms"';
		}
		if( ! empty( $hongo_product_archive_animation_duration ) ) {

			$animation_attr .= ' data-wow-duration="' . esc_attr( $hongo_product_archive_animation_duration ) . 'ms"';
		}
	}

	if( $hongo_product_archive_product_pagination_style == 'infinite' ){
		$main_wrap = 'hongo-infinite-pagination-wrap hongo-common-pagination-wrap';
		$inner_wrap = 'pagination hongo-infinite-scroll hongo-common-scroll display-none';
		$pagination_type = 'scroll';
	} elseif( $hongo_product_archive_product_pagination_style == 'loadmore' ){
		$main_wrap = 'hongo-loadmore-pagination-wrap hongo-common-pagination-wrap';
		$inner_wrap = 'pagination hongo-loadmore-scroll hongo-common-scroll display-none';
		$pagination_type = 'scroll';
	} else {
		$main_wrap = 'hongo-default-pagination-wrap';
		$inner_wrap = 'woocommerce-pagination pagination';
		$pagination_type = 'plain';
	}

	$details = paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
		'base'         => $base,
		'format'       => $format,
		'add_args'     => false,
		'current'      => max( 1, $current ),
		'total'        => $total,
		'prev_text'    => '<i class="fa-solid fa-angle-left"></i>',
		'next_text'    => '<i class="fa-solid fa-angle-right"></i>',
		'type'         => $pagination_type,
		'end_size'     => 2,
		'mid_size'     => 2,
	) ) );
	?>
	<?php if( $hongo_product_archive_product_pagination_style != 'pagination' ){ ?>
		<div class="page-load-status">
			<div class="infinite-scroll-request loading"></div>
			<div class="infinite-scroll-error infinite-scroll-last"><div class="finish-load alt-font"><?php echo __( 'All products loaded', 'hongo' ); ?></div></div>
		</div>
	<?php } ?>
	<?php if( $hongo_product_archive_product_pagination_style == 'loadmore' ){ ?>
		<div class="hongo-view-more-button-wrap"><button class="button view-more-button"><?php echo __( 'View More', 'hongo' ); ?></button></div>
	<?php } ?>
	<div class="<?php echo esc_attr( $main_wrap ).esc_attr( $animation_class ); ?>"<?php echo wp_kses_post( $animation_attr ); ?>>
		<div class="<?php echo esc_attr( $inner_wrap ); ?>" data-pagination="<?php echo esc_attr( $total ); ?>">
			<?php echo sprintf( '%s', $details ); ?>
		</div>
	</div>
	<?php
}
