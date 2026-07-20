<?php
/**
 * Loop Quick View Product Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/size-guide/size-guide.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$hongo_single_product_enable_size_guide = hongo_option( 'hongo_single_product_enable_size_guide','' );
$hongo_single_product_size_guide_content = hongo_option( 'hongo_single_product_size_guide_content', '' );
$hongo_single_product_size_guide_title = hongo_option( 'hongo_single_product_size_guide_title', '' );

if( $hongo_single_product_enable_size_guide == '1' && ! empty( $hongo_single_product_size_guide_content ) ) {
?>
	<div class="hongo-size-chart-wrap">
		<?php
			if( ! empty( $hongo_single_product_size_guide_content ) ) {
		
				if( ! empty( $hongo_single_product_size_guide_title ) ) {
			?>
					<div class="size-chart-popup-heading">
						<h3><?php echo wp_kses_post( $hongo_single_product_size_guide_title ); ?></h3>
					</div>
			<?php
				}
				if( ! empty( $hongo_single_product_size_guide_content ) ) {
			?>
					<div class="size-guide-content">
						<?php echo wp_kses_post( $hongo_single_product_size_guide_content ); ?>
					</div>
			<?php
				}
			} else {
			?>
				<h3 class="hongo-no-size-guide">
					<?php _e( 'No Content in size chart', 'hongo' ); ?>
				</h3>
			<?php
			}
		?>
	</div>
<?php
}
