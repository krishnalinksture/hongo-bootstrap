<?php
/**
 * Single Product Tabbing
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-list-tabs.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

// Get upto sell Product
ob_start();
woocommerce_upsell_display();
$woocommerce_upsell_output = ob_get_contents();
ob_end_clean();

// Get related Product
ob_start();
woocommerce_output_related_products();
$woocommerce_related_output = ob_get_contents();
ob_end_clean();

$hongo_single_product_enable_related = hongo_option( 'hongo_single_product_enable_related', '1' );
$hongo_single_product_enable_up_sells = hongo_option( 'hongo_single_product_enable_up_sells', '1' );

$slides_per_view_desktop  = hongo_option( 'hongo_single_product_no_of_columns_list', '4' );

/* To filter Product lists column */
$slides_per_view_desktop = apply_filters( 'hongo_product_lists_column', $slides_per_view_desktop );

if ( $hongo_single_product_enable_up_sells == 1 && ! empty( $woocommerce_upsell_output ) ) {
	$active[] = 'up-sell';
}
if ( $hongo_single_product_enable_related == 1 && ! empty( $woocommerce_related_output ) ) {
	$active[] = 'related';
}
?>
<div class="hongo-woocommerce-tabs hongo-woocommerce-tabs-wrapper">
	<ul class="tabs hongo-tabs" role="tablist">
	<?php

		if( $hongo_single_product_enable_up_sells && ! empty( $woocommerce_upsell_output ) ) {
			$active_class = ( $active[0] == 'up-sell' ) ? ' active' : '';
	?>
			<li class="upsell_tab<?php echo esc_attr( $active_class ); ?>" id="tab-title-upsell" role="tab" aria-controls="tab-upsell">
				<?php

					$hongo_single_product_up_sells_title = hongo_option( 'hongo_single_product_up_sells_title', esc_html__( 'You May Also Like', 'hongo' ) ) ? hongo_option( 'hongo_single_product_up_sells_title', esc_html__( 'You May Also Like', 'hongo' ) ) : esc_html__( 'You May Also Like', 'hongo' );
				?>
				<a href="#tab-upsell" class="alt-font"><?php echo esc_html( $hongo_single_product_up_sells_title ); ?></a>
			</li>
		<?php
		}

		if( $hongo_single_product_enable_related == 1 && ! empty( $woocommerce_related_output ) ) {
			$active_class = ( $active[0] == 'related' ) ? ' active' : '';
		?>
			<li class="related_tab<?php echo esc_attr( $active_class ); ?>" id="tab-title-related" role="tab" aria-controls="tab-related">
			<?php
				$hongo_single_product_related_title = hongo_option( 'hongo_single_product_related_title', esc_html__( 'Related products', 'hongo' ) ) ? hongo_option( 'hongo_single_product_related_title', esc_html__( 'Related products', 'hongo' ) ) : esc_html__( 'Related products', 'hongo' );
			?>				
				<a href="#tab-related" class="alt-font"><?php echo esc_html( $hongo_single_product_related_title ); ?></a>
			</li>
		<?php } ?>
	</ul>
	<?php	
		if( $hongo_single_product_enable_up_sells && ! empty( $woocommerce_upsell_output ) ) {
			$panel_class = ( $active[0] == 'up-sell' ) ? ' active' : '';
	?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--upsell panel entry-content hongo-tab<?php echo esc_attr( $panel_class ); ?>" id="tab-upsell" role="tabpanel" aria-labelledby="tab-title-upsell">
					
				<?php woocommerce_upsell_display(); ?>

			</div>
		<?php
		}

		if( $hongo_single_product_enable_related == 1 && ! empty( $woocommerce_related_output ) ) {
			$panel_class = ( $active[0] == 'related' ) ? ' active' : '';
		?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--related panel entry-content hongo-tab<?php echo esc_attr( $panel_class ); ?>" id="tab-related" role="tabpanel" aria-labelledby="tab-title-related">

		        <?php woocommerce_output_related_products(); ?>

			</div>
		<?php } ?>
</div>
