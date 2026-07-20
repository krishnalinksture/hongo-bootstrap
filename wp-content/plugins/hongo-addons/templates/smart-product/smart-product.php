<?php
/**
 * Smart Product
 *
 * This template can be overridden by copying it to yourtheme/hongo/smart-product.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="hongo-smart-product-wrap woocommerce">
    <div class="product-image">
        <a href="<?php echo esc_url( $title_url ); ?>"><?php echo get_the_post_thumbnail( $id ,'thumbnail'); ?></a>
    </div>
    <div class="smart-product-right-part">
        <div class="product-title alt-font">
            <a href="<?php echo esc_url( $title_url ); ?>"><?php echo esc_html( $title ); ?></a>
        </div>
        <?php if( ! empty( $price_html ) ) { ?>
            <div class="product-price"><?php echo wp_kses_post( $price_html ); ?></div>
        <?php } ?>
        <?php if( ! empty( $rating_html ) ) { ?>
            <div class="product-rating"><?php echo wp_kses_post( $rating_html ); ?></div>
        <?php } ?>
    </div>
    <div class="hongo-smart-product-close"><span class="ti-close"></span></div>
</div>