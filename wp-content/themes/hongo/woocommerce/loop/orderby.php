<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id_suffix = wp_unique_id();

$hongo_enable_shop_all_filter_ajax = get_theme_mod( 'hongo_enable_shop_all_filter_ajax', '1' );
$ordering_class =  ( $hongo_enable_shop_all_filter_ajax == 1 ) ? ' woocommerce-ordering-ajax' : '';
?>
<form class="woocommerce-ordering<?php echo esc_attr( $ordering_class ); ?>" method="get">
	<?php if ( $use_label ) : ?>
		<label for="woocommerce-orderby-<?php echo esc_attr( $id_suffix ); ?>"><?php echo esc_html__( 'Sort by', 'hongo' ); ?></label>
	<?php endif; ?>
	<select
		name="orderby"
		class="orderby"
		<?php if ( $use_label ) : ?>
			id="woocommerce-orderby-<?php echo esc_attr( $id_suffix ); ?>"
		<?php else : ?>
			aria-label="<?php esc_attr_e( 'Shop order', 'hongo' ); ?>"
		<?php endif; ?>
	>
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php 
		$exclude_args 	= array( 'orderby', 'submit', 'paged', 'product-page' );
		if( $hongo_enable_shop_all_filter_ajax == 1 ) {

			$hongo_params	= array( 'orderby', 'container', 'sidebar', 'column', 'style', 'layout', 'filter', 'off_canvas', 'sale', 'new', 'rating', 'sticky_add_to_cart', 'gutter' );
			$exclude_args	= array_merge( $exclude_args, $hongo_params );
		}
		wc_query_string_form_fields( null, $exclude_args );
	?>
</form>
