<?php
/**
 * Quick view product short description
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/short-description.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description">
	<?php printf( '%s', $short_description ); // WPCS: XSS ok. ?>
</div>
