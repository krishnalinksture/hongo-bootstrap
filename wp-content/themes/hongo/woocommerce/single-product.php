<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php

	$hongo_single_product_content_container_fluid = hongo_option( 'hongo_single_product_container_style', 'container' );

	// Filter for change container style for ex. ?container=full
	$hongo_single_product_content_container_fluid = apply_filters( 'hongo_page_container_style', $hongo_single_product_content_container_fluid );

	// Padding Top & Bottom
	$hongo_single_product_header_top_spacing = hongo_option( 'hongo_single_product_header_top_spacing', '1' );
	$top_space_class = ( $hongo_single_product_header_top_spacing == 1 ) ? ' top-space' : '';
	$hongo_single_product_padding_top = hongo_option( 'hongo_single_product_padding_top', '' );
	$hongo_single_product_padding_bottom = hongo_option( 'hongo_single_product_padding_bottom', '' );

	// To get single content product
	$single_content_product_style = hongo_get_single_content_product_style();

	$single_product_class = ! empty( $single_content_product_style ) ? ' ' . $single_content_product_style : '';

	/* For page sidebar and content */
?>
	<section class="hongo-single-product-main-wrap hongo-main-content-wrap<?php echo esc_attr( $top_space_class ); ?>">
		<div class="<?php echo esc_attr( $hongo_single_product_content_container_fluid ) . esc_attr( $single_product_class ); ?>">
			<div class="row">

				<?php
					/* Start sidebar Div */
					wc_get_template_part( 'single', 'product-before' );
				?>

				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>

				<?php

					/* End sidebar Div*/
					wc_get_template_part( 'single', 'product-after' );
				?>

			</div>
		</div>
	</section>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
