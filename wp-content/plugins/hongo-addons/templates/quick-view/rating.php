<?php
/**
 * Quick View Product Rating
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/rating.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">		

		<?php if ( comments_open() ) { ?>
			<a href="#reviews" data-placement="left" data-original-title="<?php echo sprintf( _n( '%s review', '%s reviews', $review_count, 'hongo-addons' ),  esc_html( $review_count ) ); ?>" class="woocommerce-review-link hongo-tooltip" rel="nofollow">
		<?php } ?>

			<?php echo wc_get_rating_html( $average, $rating_count ); ?>

		<?php if ( comments_open() ) { ?>
			</a>
		<?php } ?>
		
	</div>

<?php endif; ?>
