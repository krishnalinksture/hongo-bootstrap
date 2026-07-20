<?php
/**
 * Loop Product SLider Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/product-loop-slider.php.
 *
 * @package Hongo
 * @version 1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
if( empty( $gallery_ids ) ) { ?>

	<?php echo sprintf( '%s', $main_image ); ?>

<?php } else { ?>
	<div class="swiper-container hongo-loop-product-slider" data-attr="1">
	    <div class="swiper-wrapper">
	        <div class="swiper-slide"><?php echo sprintf( '%s', $main_image ); ?></div>
	        <?php
		        if( ! empty( $gallery_ids ) ) {
		            $i = 2;
		            foreach( $gallery_ids as $gallery_id ) {
		            	if( ! empty( $gallery_slide ) ) {
			            	if ( $i > $gallery_slide ) {
			            		break;
			            	}
			            }
		                echo '<div class="swiper-slide">';
		                	echo wp_get_attachment_image( $gallery_id, apply_filters( 'woocommerce_product_thumbnails_large_size', 'woocommerce_thumbnail' ) );
		                echo '</div>';
		                $i++;
		            }
		        }
		    ?>
	    </div>	    
	    <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
	    <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>		
	</div>

<?php }
