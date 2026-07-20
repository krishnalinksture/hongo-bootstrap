<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) :

	// To get you may also like product text
	$hongo_single_product_up_sells_title = hongo_option( 'hongo_single_product_up_sells_title', esc_html__( 'You may also like', 'hongo' ) );
	$hongo_single_product_enable_product_list_tab = hongo_option( 'hongo_single_product_enable_product_list_tab', '0' );
	$hongo_single_product_list_enable_slider = hongo_option( 'hongo_single_product_list_enable_slider', '0' );
	$hongo_single_product_enable_up_sells_pagination = hongo_option( 'hongo_single_product_list_enable_pagination','1' );
	$hongo_single_product_enable_up_sells_navigation = hongo_option( 'hongo_single_product_list_enable_navigation','0' );

	// Autoplay, Loop & Delay
	$autoloop = hongo_option( 'hongo_single_product_list_enable_loop', '0' );
	$autoplay = hongo_option( 'hongo_single_product_list_enable_autoplay', '1' );
	$slidedelay = hongo_option( 'hongo_single_product_list_enable_delay', '2000' );

	$slides_per_view_desktop  = hongo_option( 'hongo_single_product_no_of_columns_list', '4' );
	$slides_per_view_mini_desktop = hongo_option( 'hongo_single_product_list_slides_per_view_mini_desktop', '3' );
	$slides_per_view_tablet = hongo_option( 'hongo_single_product_list_slides_per_view_tablet', '3' );
	$slides_per_view_mobile = hongo_option( 'hongo_single_product_list_slides_per_view_mobile', '1' );

	$slides_per_view_mini_desktop = ( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
	$slides_per_view_tablet = ( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
	$slides_per_view_mobile = ( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

	$hongo_get_product_archive_list_style = hongo_get_product_archive_list_style();	

	/* To filter Product lists column */
	$slides_per_view_desktop = apply_filters( 'hongo_product_lists_column', $slides_per_view_desktop );

	global $hongo_slider_script;
	$slider_config = $pagination_class = '';

	do_action( 'hongo_single_product_up_sells_before', $hongo_single_product_list_enable_slider, $hongo_get_product_archive_list_style );
?>

	<section class="up-sells-products-content">
		<div class="up-sells upsells products">
			<?php if( ! empty( $hongo_single_product_up_sells_title ) && ( $hongo_single_product_enable_product_list_tab != 1 ) ) { ?>
				<h2 class="alt-font"><?php echo sprintf( $hongo_single_product_up_sells_title ); ?></h2>
			<?php } ?>

			<?php if( $hongo_single_product_list_enable_slider == '1' ){
				if( $hongo_single_product_enable_up_sells_pagination == '1' ){
					$pagination_class = ' swiper-pagination-dots';
					if( $hongo_get_product_archive_list_style != 'shop-default' ) {
						$pagination_class = ' pagination-bottom-space swiper-pagination-dots';
					}
				}
			 ?>
				<div id="hongo-up-sells-products" class="hongo-up-sells-products <?php echo esc_attr( $pagination_class ); ?>">				
			<?php } ?>

				<?php woocommerce_product_loop_start(); ?>

					<?php foreach ( $upsells as $upsell ) : ?>

						<?php
						 	$post_object = get_post( $upsell->get_id() );

							setup_postdata( $GLOBALS['post'] =& $post_object );

							wc_get_template_part( 'content', 'product' ); ?>

					<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>

			<?php if( $hongo_single_product_list_enable_slider == '1' ){ ?>
					<!--Navigation -->
					<?php if( $hongo_single_product_enable_up_sells_navigation == '1' ){ ?>
						<div class="swiper-button-next swiper-next"><i class="fa-solid fa-chevron-right"></i></div>
		    			<div class="swiper-button-prev swiper-prev"><i class="fa-solid fa-chevron-left"></i></div>
		    		<?php
		    			$slider_config .= "navigation: { nextEl: '.swiper-next', prevEl: '.swiper-prev', },";
		    		 } ?>
	    			
	    			<!--Pagination -->
	    			<?php if( $hongo_single_product_enable_up_sells_pagination == '1' ){ ?>
	    				<div class="swiper-pagination"></div>

	    			<?php 
	    				$slider_config .= "pagination: { el: '.swiper-pagination',type: 'bullets', clickable: true },";
	    			} ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<?php if( $hongo_single_product_list_enable_slider == '1' && hongo_load_javascript_by_key( 'swiper' ) ){

        $gutter_type = hongo_get_product_archive_gutter_type();
		$gutter_size = hongo_get_product_slider_gutter_size( $gutter_type );
		$slider_config .= 'spaceBetween: '. $gutter_size .',';

	    ( $slides_per_view_mobile ) ? $slider_config .= 'slidesPerView: '.$slides_per_view_mobile.',' : '';
	    $slider_config .= "breakpoints: { 768: { slidesPerView: ".$slides_per_view_tablet." }, 992: { slidesPerView: ".$slides_per_view_mini_desktop." }, 1200: { slidesPerView: ".$slides_per_view_desktop." } },";
	    $slider_config .= "watchOverflow: true,";
	    ( $autoplay == 1 ) ? $slider_config .= 'autoplay: { delay:' . $slidedelay . ', disableOnInteraction: false, },' : $slider_config .= 'autoplay: false,';
        ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';

		ob_start(); ?>
			$( '#hongo-up-sells-products' ).addClass( 'swiper-container' ); $( '#hongo-up-sells-products .products' ).addClass( 'swiper-wrapper' ); $( '#hongo-up-sells-products .product' ).addClass( 'swiper-slide' ); var hongo_up_sell_products = new Swiper('#hongo-up-sells-products', { <?php echo sprintf( '%s', $slider_config ); ?> }); $( document ).on( 'click', '.hongo-tabs a', function () { setTimeout(function () { hongo_up_sell_products.update(); }, 300 ); });
		<?php 
			$hongo_slider_script .= ob_get_contents();
			ob_end_clean();
	}

	do_action( 'hongo_single_product_up_sells_after', $hongo_single_product_list_enable_slider, $hongo_get_product_archive_list_style );

endif;

wp_reset_postdata();
