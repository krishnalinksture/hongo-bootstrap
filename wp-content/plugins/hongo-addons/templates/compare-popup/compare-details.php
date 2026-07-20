<?php
/**
 * Popup Compare Details
 *
 * This template can be overridden by copying it to yourtheme/hongo/compare-popup/compare-details.php
 *
 * @package Hongo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<?php if( $enable_heading || $enable_filter ) { ?>
    
    <div class="compare-popup-heading">
        <?php if( $enable_heading ) { ?>
            <h3><?php echo esc_html( $heading_text ); ?></h3>
        <?php } ?>
        <?php if( $enable_filter ) { ?>
            <div class="actions">
                <span class="compare-error-msg display-none"><i class="fa-solid fa-exclamation-triangle"></i>
                    <?php
                        echo apply_filters( 'hongo_addons_compare_product_error_message', esc_html__( 'PLEASE SELECT ATLEAST TWO PRODUCTS', 'hongo-addons' ) );
                    ?>
                </span>
                <a href="javascript:void(0);" class="hongo-compare-reset">
                    <?php esc_html_e( 'RESET', 'hongo-addons' ); ?>
                </a>

                <a href="javascript:void(0);" class="hongo-compare-filter">
                    <?php esc_html_e( 'FILTER', 'hongo-addons' ); ?>
                </a>
            </div>
        <?php } ?>
    </div>

<?php } ?>
<div class="compare-popup-main-content">
    <div class="content-left">
        <ul class="compare-table">
            <li></li>
            <li><?php echo esc_html__( 'Rating', 'hongo-addons' ); ?></li>
            <li><?php echo esc_html__( 'Description', 'hongo-addons' ); ?></li>
            <li><?php echo esc_html__( 'SKU', 'hongo-addons' ); ?></li>
            <li><?php echo esc_html__( 'Availability', 'hongo-addons' ); ?></li>
            <li><?php echo esc_html__( 'Weight', 'hongo-addons' ); ?></li>
            <li><?php echo esc_html__( 'Dimensions', 'hongo-addons' ); ?></li>
            <?php
            $attributes = wc_get_attribute_taxonomies();
            if( ! empty( $attributes ) ) {
                foreach ( $attributes as $attributes_details ) { ?>
                    <li><?php echo esc_html( $attributes_details->attribute_label ); ?></li>
                    <?php
                }
            } ?>
            <li><?php echo esc_html__( 'Additional Information', 'hongo-addons' ); ?></li>
            <li><?php echo esc_html__( 'Price', 'hongo-addons' ); ?></li>
            <li class="display-none"></li>
            <?php do_action( 'hongo_compare_list_heading' ); ?>
        </ul>
    </div>

    <div class="content-right">
        <?php if( ! empty( $productids ) ) { ?>
            <ul class="compare-lists-wrap">
                <?php
                    $original_post = $GLOBALS['post'];
                    foreach( $productids as $productid ) {
                        
                        $GLOBALS['post'] = get_post( $productid ); // WPCS: override ok.
                        setup_postdata( $GLOBALS['post'] );

                        global $product;
                        if( !$product || 'publish' !== $product->get_status() ) {
                            continue;
                        }

                        $image          = $product->get_image();
                        $product_title  = $product->get_title();
                        $description    = ! empty ( $product->get_short_description() ) ? $product->get_short_description() : '-';
                        $sku            = ! empty( $product->get_sku() ) ? $product->get_sku() : '-';
                        $rating         = ! empty ( wc_get_rating_html( $product->get_average_rating() ) ) ? wc_get_rating_html( $product->get_average_rating() ) : '-';
                        $availability   = ! empty( $product->get_stock_status() ) ? ucfirst( $product->get_stock_status() ) : '-';
                        $weight         = ! empty( $product->get_weight() ) ? $product->get_weight() : '-';
                        $dimentions     = ( $product->has_dimensions() ) ? wc_format_dimensions( $product->get_dimensions(false) ) : '-';
                        $price_html     = ! empty( $product->get_price_html() ) ? $product->get_price_html() : '';
                ?>

                        <li class="list-details">
                            <ul class="compare-table">                                
                                <li>
                                    <div class="hongo-compare-product-remove-wrap">
                                        <?php if( $enable_filter ) { ?>
                                            <a class="hongo-compare-product-filter-opt" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>'" href="javascript:void(0);">
                                                <span class="hongo-compare-product-cb hongo-cb"></span>
                                            </a>
                                        <?php } ?>
                                        
                                        <a href="javascript:void(0);" class="hongo-compare-product-remove" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>">
                                            <?php esc_html_e( 'X REMOVE', 'hongo-addons' ); ?>
                                        </a>
                                    </div>

                                    <?php printf( '%s', $image ); ?>
                                    <h2 class="compare-title"><a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo esc_html( $product_title ); ?></a></h2>
                                    <span class="price"><?php printf( '%s', $price_html ); ?></span>
                                    <?php do_action( 'hongo_addons_compare_list_add_to_cart', $product, '' ); ?>
                                </li>
                                <li><?php printf( '%s', $rating ); ?></li> 
                                <li><?php printf( '%s', $description ); ?></li>
                                <li><?php echo esc_html( $sku ); ?></li>
                                <li><?php echo esc_html( $availability ); ?></li>
                                <li><?php echo esc_html( $weight ); ?></li>
                                <li><?php echo esc_html( $dimentions ); ?></li>

                                <?php
                                    $attributes_details = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );
                                    // Variation
                                    if( $product->is_type( 'variable' ) ) {
                                        $attributes = wc_get_attribute_taxonomies();
                                        
                                        foreach( $attributes as $attribute ) {
                                            $name = 'pa_'.$attribute->attribute_name;
                                            if( isset( $attributes_details[$name] ) ){
                                                $terms = wc_get_product_terms( $productid, $name, array( 'fields' => 'names' ) ); ?>
                                                <li>
                                                    <?php
                                                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                                            $terms_data = ( ! empty( $terms ) ) ? implode( ', ', $terms ) : '';
                                                            echo esc_html( $terms_data );
                                                        } else {
                                                            echo '-';
                                                        }
                                                    ?>
                                                </li>
                                            <?php } else { ?>
                                                <li>-</li>
                                            <?php } ?>
                                        <?php } // End Foreach ?>
                                    <?php } else {
                                        $attributes = wc_get_attribute_taxonomies();
                                        $attributes_count = count($attributes);
                                        for($i = 0 ; $i<$attributes_count; $i++) {
                                            echo '<li>-</li>';
                                        }
                                    } // End Main If Variation

                                    // Additional Information
                                    if( ! empty( $attributes_details ) ) {

                                        echo '<li>';
                                            echo '<table>';
                                            foreach ( $attributes_details as $attribute_detail ) {
                                                if ( ! $attribute_detail->is_taxonomy() ) {

                                                    $label = wc_attribute_label( $attribute_detail->get_name() );
                                                    $values = $attribute_detail->get_options();

                                                    echo '<tr>';
                                                        echo '<th>' . $label . '</th>';
                                                        echo '<td>';
                                                        foreach ( $values as &$value ) {
                                                            $value = make_clickable( esc_html( $value ) );

                                                            echo $value;
                                                        }
                                                        echo '</td>';
                                                    echo '</tr>';
                                                }
                                            }
                                            echo '</table>';
                                        echo '</li>';
                                    } else {
                                        echo '<li>-</li>';
                                    }
                                ?>

                                <li><?php printf( '%s', $price_html ); ?></li>
                                <li class="display-none"></li>

                                <?php do_action( 'hongo_compare_list_content', $product ); ?>
                            </ul>
                        </li>
                    <?php } // End Foreach ?>
                <?php $GLOBALS['post'] = $original_post; ?>
            </ul>
        <?php } ?>
    </div>
</div>