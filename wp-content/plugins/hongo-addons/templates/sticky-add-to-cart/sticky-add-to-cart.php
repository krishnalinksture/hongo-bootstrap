<?php
/**
 * Single product sticky add to cart
 *
 * This template can be overridden by copying it to yourtheme/hongo/single-product/sticky-add-to-cart.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="sticky-add-to-cart-wrapper">
    <div class="sticky-add-to-cart-wrap container">
        <div class="product-left-part">
            <div class="product-image">
                <?php echo get_the_post_thumbnail( $id ,'thumbnail'); ?>
            </div>
            <div class="product-left-part-right">
                <div class="product-title alt-font">
                    <?php echo esc_html( $title ); ?>
                </div>
                <div class="product-price">
                   <?php echo wp_kses_post( $price_html ); ?>
                </div>
            </div>
        </div>
        <div class="product-right-part">
            <?php if ( $type == 'variable' || $type == 'grouped' ) { ?>
                <a class="sticky-add-to-cart btn alt-font" href="javascript:void(0)" ><?php echo esc_attr( $add_to_cart_text ); ?></a>
            <?php } else {
                /**
                 * Hook: hongo_addons_sticky_add_to_cart_content.
                 *
                 * @hooked woocommerce_template_single_add_to_cart - 10
                 */
                do_action( 'hongo_addons_sticky_add_to_cart_content' );
            } ?>
        </div>

    </div>
</div>