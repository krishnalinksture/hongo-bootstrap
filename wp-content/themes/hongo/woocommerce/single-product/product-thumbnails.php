<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

if ( ! $product || ! $product instanceof WC_Product ) {
    return '';
}

$attachment_ids = $product->get_gallery_image_ids();

// To get single product style
$hongo_get_single_content_product_style = hongo_get_single_content_product_style();
$hongo_single_product_page_enable_slider = hongo_option( 'hongo_single_product_page_enable_slider', '1' );
$flag = false;

if( $hongo_single_product_page_enable_slider == '1' && ( $hongo_get_single_content_product_style == 'single-product-default' || $hongo_get_single_content_product_style == 'single-product-extended-descriptions' || $hongo_get_single_content_product_style == 'single-product-classic' || $hongo_get_single_content_product_style == 'single-product-modern' ) && has_post_thumbnail() && $attachment_ids ) {

	global $product, $post;
    ?>
    <div class="hongo-single-product-thumb-wrap">
    	<div class="swiper-container hongo-single-product-thumb">
            <ol class="swiper-wrapper flex-control-nav">
            <?php

                $attachment_id     = get_post_thumbnail_id( $post->ID );
                $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
                $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
                $image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
                $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
                
                if( ! empty( $thumbnail_src[0] ) ) {
                    $image = sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( $thumbnail_src[0] ), get_post_field( 'post_title', $attachment_id ) );
                } else {
                    $image = sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'hongo' ) );
                }

                // Main Image
                echo sprintf( '<li class="swiper-slide">%s</li>', $image );

                foreach ( $attachment_ids as $attachment_id ) {
                    
                    $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
                    $thumbnail_size    = apply_filters(
                        'woocommerce_gallery_thumbnail_size', 
                        array( 
                            $gallery_thumbnail['width'], 
                            $gallery_thumbnail['height'], 
                        ) 
                    );
                    $image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
                    $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );

                    if( ! empty( $thumbnail_src[0] ) ) {
                        $image = sprintf( '<img src="%s" alt="%s" />', esc_url( $thumbnail_src[0] ), get_post_field( 'post_title', $attachment_id ) );
                    } else {
                        $image = sprintf( '<img src="%s" alt="%s" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'hongo' ) );
                    }

                    // Gallery Image
                    echo sprintf( '<li class="swiper-slide">%s</li>', $image );
                }
            ?>
            </ol>
        </div>
        <?php
            if( $hongo_get_single_content_product_style == 'single-product-modern' || $hongo_get_single_content_product_style == 'single-product-classic' || $hongo_get_single_content_product_style == 'single-product-extended-descriptions' ){
                $next_arrow = 'fa-solid fa-angle-down';
                $prev_arrow = 'fa-solid fa-angle-up';
            } else{
                $next_arrow = 'fa-solid fa-angle-right';
                $prev_arrow = 'fa-solid fa-angle-left';
            }
        ?>
        <div class="swiper-thumb-next"><i class="<?php echo esc_attr( $next_arrow ); ?>"></i></div>
        <div class="swiper-thumb-prev"><i class="<?php echo esc_attr( $prev_arrow ); ?>"></i></div>
    </div>
    <?php
} else {

	if ( $hongo_get_single_content_product_style == 'single-product-right-content' || $hongo_get_single_content_product_style == 'single-product-carousel' || $hongo_get_single_content_product_style == 'single-product-left-content' || $hongo_get_single_content_product_style == 'single-product-sticky'  ) {
		
		$flag = true;
	}

	if ( $attachment_ids && $product->get_image_id() ) {
		foreach ( $attachment_ids as $attachment_id ) {
            /**
             * Filter product image thumbnail HTML string.
             *
             * @since 1.6.4
             *
             * @param string $html          Product image thumbnail HTML string.
             * @param int    $attachment_id Attachment ID.
             */
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id, $flag ), $attachment_id ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}
