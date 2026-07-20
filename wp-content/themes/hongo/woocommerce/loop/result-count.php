<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product_archive_list_style = hongo_get_product_archive_list_style();
$hongo_product_archive_page_column = hongo_get_product_archive_column();
$column_switch_class = $product_archive_list_style == 'shop-list' ? ' display-none' : '';
?>
<div class="hongo-list-grid-switch-wrap">
	<div class="hongo-list-grid-layout-wrap">

		<?php if( $product_archive_list_style == 'shop-list' ) { ?>

			<div class="hongo-view-switch">
				<a href="javascript:void(0);" data-view="grid"><img class="grid-img" src="<?php echo esc_url( HONGO_THEME_IMAGES_URI . '/grid-icon.svg' ); ?>" alt="grid-img" /><img class="active" src="<?php echo esc_url( HONGO_THEME_IMAGES_URI . '/grid-icon-active.svg' ); ?>" alt="grid-active-img" /></a>
				<a class="active" href="javascript:void(0);" data-view="list"><img class="list-img" src="<?php echo esc_url( HONGO_THEME_IMAGES_URI . '/list-icon.svg' ); ?>" alt="list-img" /><img class="active" src="<?php echo esc_url( HONGO_THEME_IMAGES_URI . '/list-icon-active.svg' ); ?>" alt="list-active-img" /></a>
			</div>

		<?php } ?>

		<div class="woocommerce-result-count">
			<?php
				if ( 1 === $total ) {
					_e( 'Showing the single result', 'hongo' );
				}elseif ( $total <= $per_page || -1 === $per_page ) {
					/* translators: %d: total results */
					printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'hongo' ), $total );
				} else {
					$first = ( $per_page * $current ) - $per_page + 1;
					$last  = min( $total, $per_page * $current );
					/* translators: 1: first result 2: last result 3: total results */
					printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'hongo' ), $first, $last, $total );
				}
			?>
		</div>
	</div>

	<?php if( $product_archive_list_style != 'shop-metro' && $product_archive_list_style != 'shop-modern' && $product_archive_list_style != 'shop-list' && $hongo_product_archive_page_column <= 4 ) { ?>

		<div class="hongo-column-switch<?php echo esc_attr( $column_switch_class ); ?>">
			<?php

				$total_columns = 4;
				for( $i=2; $i <= $total_columns; $i++ ) {
					$active_class_attr = ( $hongo_product_archive_page_column == $i ) ? ' class="active"' : '';
			?>
					<a <?php echo sprintf( '%s', $active_class_attr ); ?> href="javascript:void(0);" data-col="<?php echo esc_attr( $i ); ?>">
						<?php if( $i == 2 ) { ?>
							<span></span>
							<span></span>
						<?php } elseif( $i == 3 ) { ?>
							<span></span>
							<span></span>
							<span></span>
						<?php } elseif( $i == 4 ) { ?>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						<?php } ?>
					</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>
