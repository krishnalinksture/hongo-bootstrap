<?php
/**
 * List of Wishlist data
 *
 * This template can be overridden by copying it to yourtheme/hongo/wishlist/product-wishlist.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="hongo-wishlist-page woocommerce">
    <?php if( ! empty( $data ) ) { ?>
        <div class="wishlistlink" link="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
            <div class="woocommerce-error hongo-wishlist-error-message display-none">
                <span class=""><?php esc_html_e( 'Please select atleast one product', 'hongo-addons' ); ?></span>
            </div>
            <table class="table">
                <tr>
                    <th class="product-check"><a class="hongo-all-wishlits-opt" href="javascript:void(0);"><span class="hongo-wishlist-cb hongo-cb"></span></a></th>
                    <th class="product-thumbnail"></th>
                    <th class="product-name alt-font"><?php esc_html_e( 'Product Name', 'hongo-addons' ); ?></th>
                    <th class="product-price alt-font"><?php esc_html_e( 'Unit Price', 'hongo-addons' ); ?></th>
                    <th class="product-stock-status alt-font"><?php esc_html_e( 'Stock Status', 'hongo-addons' ); ?></th>
                    <th class="product-add-to-cart"></th>
                    <th class="product-remove"></th>
                </tr>
            <?php

                $original_post = $GLOBALS['post'];

                foreach ( $data as $productid ) {

                    if( ! empty( $productid ) ) {
                        
                        $GLOBALS['post'] = get_post( $productid ); // WPCS: override ok.
                        setup_postdata( $GLOBALS['post'] );
                        
                        global $product;
                        
                        if( !$product || 'publish' !== $product->get_status() ) {

                            hongo_addons_remove_product_wishlist( array( $productid ) );
                            continue;
                        }
                        $image = $product->get_image();
                        $product_title = $product->get_title();
                        $price_html = $product->get_price_html();

                        ob_start();
                            wc_get_template( 'single-product/stock.php', array(
                                'product'      => $product,
                                'class'        => 'in-stock',
                                'availability' => esc_html__( 'In stock', 'hongo-addons' ),
                            ) );
                            $in_stock_html = ob_get_contents();
                        ob_end_clean();

                        $stock_html = wc_get_stock_html( $product );
                        $stock_html = ! empty( $stock_html ) ? $stock_html : $in_stock_html;
                ?>
                    <tr>
                        <td class="product-check-single">
                            <a class="hongo-wishlits-opt" data-product_id="<?php echo esc_html( $productid ); ?>" href="javascript:void(0);">
                                <span class="hongo-wishlist-cb hongo-cb"></span>
                            </a>
                        </td>                        
                        <td class="product-thumbnail"><a href="<?php echo get_permalink( $productid ); ?>"><?php printf( '%s', $image ); ?></a></td>
                        <td><a class="wishlist-product-title" href="<?php echo get_permalink( $productid ); ?>"><?php printf( '%s', $product_title ); ?></a></td>
                        <td><?php printf( '%s', $price_html ); ?></td>
                        <td class="product-stock-status"><?php printf( '%s', $stock_html ); ?></td>
                        <td><?php do_action( 'hongo_wishlist_page_add_to_cart', $product, 'single-add-to-cart' ); // Add To Cart Button ?></td>
                        <td><a href="javascript:void(0);" data-product_id="<?php echo esc_html( $productid ); ?>" class="hongo-page-remove-wish">×</a></td>
                    </tr>
                <?php
                    }
                }
                $GLOBALS['post'] = $original_post;
                ?>
                <tr>
                    <td colspan="3"><a class="hongo-remove-wishlist-selected alt-font btn-link btn-medium font-weight-500" href="javascript:void(0);"><?php esc_html_e( 'REMOVE', 'hongo-addons' ); ?></a></td>
                    <td colspan="4"><a class="hongo-empty-wishlist alt-font btn-link btn-medium font-weight-500" href="javascript:void(0);"><?php esc_html_e( 'EMPTY WISHLIST', 'hongo-addons' ); ?></a></td>
                </tr>
            </table>
        </div>
    <?php } else { ?>
        <p class="no-product-wishlist alt-font"><i class="icon-heart base-color"></i><?php echo esc_html__( 'Your wishlist is currently empty.', 'hongo-addons' ); ?></p>
        <p class="return-to-shop">
            <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php echo esc_html__( 'Return to Shop', 'hongo-addons' ); ?></a>
        </p>
    <?php } ?>
</div>