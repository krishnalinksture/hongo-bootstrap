<?php
/**
 * Loop Short Description
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

?>
<div class="<?php echo isset( $class ) ? esc_attr( $class ) : ''; ?>">

	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>

</div>
