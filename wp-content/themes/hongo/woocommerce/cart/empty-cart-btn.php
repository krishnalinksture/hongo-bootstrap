<?php
/**
 * Empty cart button
 *
 */

defined( 'ABSPATH' ) || exit;
?>
<a href="<?php echo esc_url( $cart_url ); ?>" class="btn btn-black hongo-empty-cart"><?php esc_html_e( 'Empty cart', 'hongo' ); ?></a>
