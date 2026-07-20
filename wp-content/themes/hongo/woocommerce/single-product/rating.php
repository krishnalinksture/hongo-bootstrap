<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$hongo_get_single_content_product_style = hongo_get_single_content_product_style();

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">		
		
		<?php if ( $hongo_get_single_content_product_style == 'single-product-default' ) { ?>

			<?php echo wc_get_rating_html( $average, $rating_count ); ?>
			
			<?php if ( comments_open() ) { ?>
				<a href="#reviews" class="woocommerce-review-link hongo-tooltip" rel="nofollow">(<?php printf( _n( '%s review', '%s reviews', $review_count, 'hongo' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a>
			<?php } ?>
		
		<?php } else { ?>
			
			<?php if ( comments_open() ) { ?>
				<a href="#reviews" data-placement="top" data-original-title="<?php echo sprintf( _n( '%s review', '%s reviews', $review_count, 'hongo' ),  esc_html( $review_count ) ); ?>" class="woocommerce-review-link hongo-tooltip" rel="nofollow">
			<?php } ?>

				<?php echo wc_get_rating_html( $average, $rating_count ); ?>

			<?php if ( comments_open() ) { ?>
				</a>
			<?php } ?>

		<?php } ?>

	</div>

	<?php
endif;
