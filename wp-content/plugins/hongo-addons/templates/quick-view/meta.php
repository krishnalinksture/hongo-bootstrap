<?php
/**
 * Quick View Product Meta
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/meta.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$hongo_quick_view_product_enable_category 		= get_theme_mod( 'hongo_quick_view_product_enable_category', '1' );
$hongo_quick_view_product_enable_tag 			= get_theme_mod( 'hongo_quick_view_product_enable_tag', '1' );
$hongo_quick_view_product_enable_social_share	= get_theme_mod( 'hongo_quick_view_product_enable_social_share', '1' );

if( $hongo_quick_view_product_enable_category || $hongo_quick_view_product_enable_tag || $hongo_quick_view_product_enable_social_share ) {
?>
	<div class="product_meta alt-font">

		<?php do_action( 'hongo_quick_view_product_meta_start' ); ?>

		<?php if ( $hongo_quick_view_product_enable_category == '1' ) { ?>

			<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'hongo-addons' ) . ' ', '</span>' ); ?>

		<?php } ?>

		<?php if ( $hongo_quick_view_product_enable_tag == '1' ) { ?>

			<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'hongo-addons' ) . ' ', '</span>' ); ?>

		<?php } ?>

		<?php if ( $hongo_quick_view_product_enable_social_share == '1' && function_exists( 'hongo_single_product_share_shortcode' ) ) { ?>

		    <?php echo do_shortcode( "[hongo_single_product_share]" ); ?>

		<?php } ?>

		<?php do_action( 'hongo_quick_view_product_meta_end' ); ?>

	</div>
<?php } ?>