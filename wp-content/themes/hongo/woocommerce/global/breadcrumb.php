<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	printf( $wrap_before );
	
	foreach ( $breadcrumb as $key => $crumb ) {

		printf( $before );

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			?>
				<li><a href="<?php echo esc_url( $crumb[1] ); ?>"><?php echo esc_html( $crumb[0] ); ?></a></li>
			<?php
		} else {
			if ( is_singular('product') ) {				
				$hongo_single_product_enable_breadcrumb_heading = hongo_option( 'hongo_single_product_enable_breadcrumb_heading', '1' );
			    if( $hongo_single_product_enable_breadcrumb_heading == '1' ) { 
			?>
			        <li><?php echo apply_filters( 'hongo_breadcrumb_page_title', $crumb[0] ); ?></li>
			<?php }
			} elseif( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) {
				$hongo_product_archive_enable_breadcrumb_heading = get_theme_mod( 'hongo_product_archive_enable_breadcrumb_heading', '1' );
				if( $hongo_product_archive_enable_breadcrumb_heading == '1' ) {
			?>
					<li><?php echo apply_filters( 'hongo_breadcrumb_page_title', $crumb[0] ); ?></li>
			<?php
				}
			}
		}

		printf( $after );

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			printf( $delimiter );
		}

	}

	printf( $wrap_after );
}
