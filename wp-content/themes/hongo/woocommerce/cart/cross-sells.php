<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $cross_sells ) :

	$hongo_single_product_enable_cross_sells_slider 	= get_theme_mod( 'hongo_single_product_enable_cross_sells_slider', '1' );
	$hongo_single_product_enable_cross_sells_pagination = get_theme_mod( 'hongo_single_product_enable_cross_sells_pagination','0' );
	$hongo_single_product_enable_cross_sells_navigation = get_theme_mod( 'hongo_single_product_enable_cross_sells_navigation','1' );
	$hongo_single_product_enable_cross_sells_loop 		= get_theme_mod( 'hongo_single_product_enable_cross_sells_loop','0' );
	$hongo_single_product_enable_cross_sells_autoplay 	= get_theme_mod( 'hongo_single_product_enable_cross_sells_autoplay','0' );
	$hongo_single_product_no_of_columns_cross_sells 	= get_theme_mod( 'hongo_single_product_no_of_columns_cross_sells', '4' );
	$hongo_single_product_enable_cross_sells_delay 		= get_theme_mod( 'hongo_single_product_enable_cross_sells_delay', '2000' );

	$slides_per_view_mini_desktop = get_theme_mod( 'hongo_single_product_cross_sells_slides_per_view_mini_desktop', '3' );
	$slides_per_view_tablet 	  = get_theme_mod( 'hongo_single_product_cross_sells_slides_per_view_tablet', '2' );
	$slides_per_view_mobile 	  = get_theme_mod( 'hongo_single_product_cross_sells_slides_per_view_mobile', '1' );

	$hongo_get_product_archive_list_style = hongo_get_product_archive_list_style();	

	global $hongo_slider_script;
	$slider_config = '';

	do_action( 'hongo_single_product_cross_sells_before', $hongo_single_product_enable_cross_sells_slider, $hongo_get_product_archive_list_style );
?>

	<div class="col-sm-12 col-xs-12 cross-sells">
	<?php 
		$hongo_single_product_cross_sells_title = get_theme_mod( 'hongo_single_product_cross_sells_title', __( 'You may be interested in&hellip;', 'hongo' ) );

		$hongo_single_product_cross_sells_title = apply_filters( 'woocommerce_product_cross_sells_products_heading', $hongo_single_product_cross_sells_title );
	?>
		<?php if( ! empty( $hongo_single_product_cross_sells_title ) ) { ?>
			<h2><?php echo esc_html( $hongo_single_product_cross_sells_title ); ?></h2>
		<?php } ?>

		<?php if( $hongo_single_product_enable_cross_sells_slider == '1' ){ ?>
			<div id="hongo-cross-sells-products" class="hongo-cross-sells-products swiper-pagination-dots pagination-bottom-space">
		<?php } ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
				 	$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

		<?php if( $hongo_single_product_enable_cross_sells_slider == '1' ){ ?>
				<!--Navigation -->
				<?php if( $hongo_single_product_enable_cross_sells_navigation == '1' ){ ?>
					<div class="swiper-button-next swiper-next"><i class="fa-solid fa-chevron-right"></i></div>
	    			<div class="swiper-button-prev swiper-prev"><i class="fa-solid fa-chevron-left"></i></div>
	    		<?php
	    			$slider_config .= "navigation: { nextEl: '.swiper-next', prevEl: '.swiper-prev', },";
	    		 } ?>
    			
    			<!--Pagination -->
    			<?php if( $hongo_single_product_enable_cross_sells_pagination == '1' ){ ?>
    				<div class="swiper-pagination"></div>

    			<?php 
    				$slider_config .= "pagination: { el: '.swiper-pagination',type: 'bullets', clickable: true },";
    			} ?>
			</div>
		<?php } ?>

	</div>

	<?php if( $hongo_single_product_enable_cross_sells_slider == '1' && hongo_load_javascript_by_key( 'swiper' ) ){

        $gutter_type = hongo_get_product_archive_gutter_type();
		$gutter_size = hongo_get_product_slider_gutter_size( $gutter_type );
		$slider_config .= 'spaceBetween: '. $gutter_size .',';

	    ( $hongo_single_product_enable_cross_sells_loop == 1 ) ? $slider_config .= 'loop: true,' : '';
	    ( $hongo_single_product_enable_cross_sells_slider == 1 && $hongo_single_product_enable_cross_sells_autoplay == 1 && $hongo_single_product_enable_cross_sells_delay ) ? $slider_config .= 'autoplay: { delay:' . $hongo_single_product_enable_cross_sells_delay . ', },' : $slider_config .= 'autoplay: false,';	    
	    ( $slides_per_view_mobile ) ? $slider_config .= 'slidesPerView: '.$slides_per_view_mobile.',' : '';
	    $slider_config .= "breakpoints: { 768: { slidesPerView: ".$slides_per_view_tablet." }, 992: { slidesPerView: ".$slides_per_view_mini_desktop." }, 1200: { slidesPerView: ".$hongo_single_product_no_of_columns_cross_sells." } },";
	    $slider_config .= "watchOverflow: true,";  
	    
		ob_start(); ?>
			$( '#hongo-cross-sells-products' ).addClass( 'swiper-container' ); $( '#hongo-cross-sells-products .products' ).addClass( 'swiper-wrapper' ); $( '#hongo-cross-sells-products .product' ).addClass( 'swiper-slide' ); var hongo_cross_sell_products = new Swiper('#hongo-cross-sells-products', { <?php echo sprintf( '%s', $slider_config ); ?> }); $( document.body ).on( 'wc_fragments_refreshed', function () { $( '#hongo-cross-sells-products' ).addClass( 'swiper-container' ); $( '#hongo-cross-sells-products .products' ).addClass( 'swiper-wrapper' ); $( '#hongo-cross-sells-products .product' ).addClass( 'swiper-slide' ); var hongo_cross_sell_products = new Swiper('#hongo-cross-sells-products', { <?php echo sprintf( '%s', $slider_config ); ?> }); });
		<?php 
			$hongo_slider_script .= ob_get_contents();
			ob_end_clean();

	}

	do_action( 'hongo_single_product_cross_sells_after', $hongo_single_product_enable_cross_sells_slider, $hongo_get_product_archive_list_style );

endif;

wp_reset_postdata();
