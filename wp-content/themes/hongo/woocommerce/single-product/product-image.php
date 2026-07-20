<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.5.0
 */

use Automattic\WooCommerce\Enums\ProductType;

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$photoswipe_enabled= apply_filters( 'woocommerce_single_product_photoswipe_enabled', get_theme_support( 'wc-product-gallery-lightbox' ) );
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );

//to get single content product
$hongo_get_single_content_product_style = hongo_get_single_content_product_style();
$hongo_single_product_page_enable_slider = hongo_option( 'hongo_single_product_page_enable_slider', '1' );

$attachment_ids = $product->get_gallery_image_ids();

$lighbox_wrap_class = ( $photoswipe_enabled ) ? ' photoswipe-lightbox' : '';
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
	<?php do_action( 'hongo_product_gallery_before' ); ?>
	<?php if( $hongo_single_product_page_enable_slider == '1' && ( $hongo_get_single_content_product_style == 'single-product-default' || $hongo_get_single_content_product_style == 'single-product-extended-descriptions' || $hongo_get_single_content_product_style == 'single-product-classic' || $hongo_get_single_content_product_style == 'single-product-modern' ) && has_post_thumbnail() && $attachment_ids ) { ?>
			
			<?php if( $hongo_get_single_content_product_style == 'single-product-modern' || $hongo_get_single_content_product_style == 'single-product-classic' ) { ?>
				<div class="hongo-single-product-image-wrap hongo-single-product-slider-wrap hongo-single-product-verticle-slider-wrap">
			<?php } else { ?>
				<div class="hongo-single-product-image-wrap hongo-single-product-slider-wrap">
			<?php } ?>
				<?php do_action( 'hongo_single_product_image_before' ); ?>
				<figure class="woocommerce-product-gallery__wrapper swiper-container hongo-single-product-slider<?php echo esc_attr( $lighbox_wrap_class ); ?>">
					<div class="swiper-wrapper">
		                <?php
			                $attachment_id = $product->get_image_id();
		                    if ( has_post_thumbnail() ) {

		                        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		                        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		                        $image_size        = apply_filters( 'woocommerce_gallery_image_size', 'woocommerce_single' );
		                        $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		                        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		                        $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
		                        $image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
		                            'title'                   => get_post_field( 'post_title', $attachment_id ),
		                            'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
		                            'data-src'                => $full_src[0],
		                            'data-large_image'        => $full_src[0],
		                            'data-large_image_width'  => $full_src[1],
		                            'data-large_image_height' => $full_src[2],
		                            'class'                   => 'wp-post-image',
		                        ) );

		                        $html = '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image swiper-slide"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';

		                    } else {
		                        $html  = '<div class="swiper-slide woocommerce-product-gallery__image--placeholder">';
		                        $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'hongo' ) );
		                        $html .= '</div>';
		                    }

		                    // Main Image
		                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

		                    if ( $attachment_ids && $product->get_image_id() ) {
		                        foreach ( $attachment_ids as $attachment_id ) {

		                            $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		                            $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		                            $image_size        = apply_filters( 'woocommerce_gallery_image_size', 'woocommerce_single' );
		                            $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		                            $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		                            $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
									$alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
		                            $image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
		                                'title'                   => get_post_field( 'post_title', $attachment_id ),
		                                'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
		                                'data-src'                => $full_src[0],
		                                'data-large_image'        => $full_src[0],
		                                'data-large_image_width'  => $full_src[1],
		                                'data-large_image_height' => $full_src[2],
		                                'class'                   => 'hongo-product-gallery-image',
		                            ) );

		                            $html = '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image swiper-slide"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
		                            
		                            // Gallery Image
		                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
		                        }
		                    }
		                ?>
		            </div>
					<div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
					<div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
		        </figure>
				<?php do_action( 'hongo_single_product_image_after' ); ?>
			</div>
	    <?php do_action( 'woocommerce_product_thumbnails' ); ?>
	<?php } else { ?>
		<?php $product_carousel_single_img_class = ( ( $hongo_get_single_content_product_style == 'single-product-carousel' || $hongo_get_single_content_product_style == 'single-product-left-content' || $hongo_get_single_content_product_style == 'single-product-right-content' ) && empty( $attachment_ids ) ) ? ' product-single-img' : ''; ?>
		<div class="hongo-single-product-image-wrap<?php echo esc_attr( $product_carousel_single_img_class ); ?>">
			<?php do_action( 'hongo_single_product_image_before' ); ?>
			<figure class="woocommerce-product-gallery__wrapper<?php echo esc_attr( $lighbox_wrap_class ); ?>">
				<?php if ( $hongo_get_single_content_product_style == 'single-product-carousel' && $attachment_ids ) { ?>
					<div id="single-product-carousel" class="swiper-container">
						<div class="swiper-wrapper">
				<?php }
					if ( has_post_thumbnail() ) {
						$html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
					} else {
						$wrapper_classname = $product->is_type( ProductType::VARIABLE ) && ! empty( $product->get_available_variations( 'image' ) ) ?
							'woocommerce-product-gallery__image woocommerce-product-gallery__image--placeholder' :
							'woocommerce-product-gallery__image--placeholder';
						$html  = sprintf( '<div class="%s">', esc_attr( $wrapper_classname ) );
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'hongo' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

					do_action( 'woocommerce_product_thumbnails' );

					if ( $hongo_get_single_content_product_style == 'single-product-carousel' && $attachment_ids ) {
						?>
						</div>
						<div class="swiper-button-next"><i class="ti-angle-right"></i></div>
						<div class="swiper-button-prev"><i class="ti-angle-left"></i></div>
					</div>	
				<?php } ?>

			</figure>
	<?php do_action( 'hongo_single_product_image_after' ); ?>
		</div>
	<?php } ?>
	<?php do_action( 'hongo_product_gallery_after' ); ?>
</div>
