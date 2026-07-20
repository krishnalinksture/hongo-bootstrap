<?php
/**
 * Generate css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

    /* if WooCommerce plugin is activated */
    if ( hongo_is_woocommerce_activated() ) {

        /*Quick View product deal colors*/
        $hongo_quick_view_product_number_color = get_theme_mod( 'hongo_quick_view_product_number_color', '' );
        $hongo_quick_view_product_deal_text_color = get_theme_mod( 'hongo_quick_view_product_deal_text_color', '' );

        /* Quick View Sale typography*/
        $hongo_quick_view_product_sale_font_size = get_theme_mod( 'hongo_quick_view_product_sale_font_size', '' );
        $hongo_quick_view_product_sale_line_height = get_theme_mod( 'hongo_quick_view_product_sale_line_height', '' );
        $hongo_quick_view_product_sale_letter_spacing = get_theme_mod( 'hongo_quick_view_product_sale_letter_spacing', '' );
        $hongo_quick_view_product_sale_font_weight = get_theme_mod( 'hongo_quick_view_product_sale_font_weight', '' );
        $hongo_quick_view_product_sale_color = get_theme_mod( 'hongo_quick_view_product_sale_color', '' );
        $hongo_quick_view_product_sale_bg_color = get_theme_mod( 'hongo_quick_view_product_sale_bg_color', '' );
        $hongo_quick_view_product_new_color = get_theme_mod( 'hongo_quick_view_product_new_color', '' );
        $hongo_quick_view_product_new_bg_color = get_theme_mod( 'hongo_quick_view_product_new_bg_color', '' );
        $hongo_quick_view_product_soldout_color = get_theme_mod( 'hongo_quick_view_product_soldout_color', '' );
        $hongo_quick_view_product_soldout_bg_color = get_theme_mod( 'hongo_quick_view_product_soldout_bg_color', '' );

        /* Quick View title typography*/
        $hongo_quick_view_product_page_title_font_size = get_theme_mod( 'hongo_quick_view_product_page_title_font_size', '' );
        $hongo_quick_view_product_page_title_line_height = get_theme_mod( 'hongo_quick_view_product_page_title_line_height', '' );
        $hongo_quick_view_product_page_title_letter_spacing = get_theme_mod( 'hongo_quick_view_product_page_title_letter_spacing', '' );
        $hongo_quick_view_product_page_title_font_weight = get_theme_mod( 'hongo_quick_view_product_page_title_font_weight', '' );
        $hongo_quick_view_product_page_title_text_transform = get_theme_mod( 'hongo_quick_view_product_page_title_text_transform', '' );
        $hongo_quick_view_product_page_title_color = get_theme_mod( 'hongo_quick_view_product_page_title_color', '0' );

        /* Quick View rating star color typography*/
        $hongo_quick_view_product_rating_star_color = get_theme_mod( 'hongo_quick_view_product_rating_star_color', '0' );
        
        /*Quick View price typography*/
        $hongo_quick_view_product_price_font_size = get_theme_mod( 'hongo_quick_view_product_price_font_size', '' );
        $hongo_quick_view_product_price_line_height = get_theme_mod( 'hongo_quick_view_product_price_line_height', '' );
        $hongo_quick_view_product_price_letter_spacing = get_theme_mod( 'hongo_quick_view_product_price_letter_spacing', '' );
        $hongo_quick_view_product_price_font_weight = get_theme_mod( 'hongo_quick_view_product_price_font_weight', '' );
        $hongo_quick_view_product_price_color = get_theme_mod( 'hongo_quick_view_product_price_color', '' );
        $hongo_quick_view_product_regular_price_color = get_theme_mod( 'hongo_quick_view_product_regular_price_color', '' );

        /* Quick View short description typography*/
        $hongo_quick_view_product_short_description_font_size = get_theme_mod( 'hongo_quick_view_product_short_description_font_size', '' );
        $hongo_quick_view_product_short_description_line_height = get_theme_mod( 'hongo_quick_view_product_short_description_line_height', '' );
        $hongo_quick_view_product_short_description_letter_spacing = get_theme_mod( 'hongo_quick_view_product_short_description_letter_spacing', '' );
        $hongo_quick_view_product_short_description_font_weight = get_theme_mod( 'hongo_quick_view_product_short_description_font_weight', '' );
        $hongo_quick_view_product_short_description_color = get_theme_mod( 'hongo_quick_view_product_short_description_color', '' );

        /* Quick View stock typography*/
        $hongo_quick_view_product_stock_font_size = get_theme_mod( 'hongo_quick_view_product_stock_font_size', '' ); 
        $hongo_quick_view_product_stock_line_height = get_theme_mod( 'hongo_quick_view_product_stock_line_height', '' );
        $hongo_quick_view_product_stock_letter_spacing = get_theme_mod( 'hongo_quick_view_product_stock_letter_spacing', '' );
        $hongo_quick_view_product_stock_font_weight = get_theme_mod( 'hongo_quick_view_product_stock_font_weight', '' );
        $hongo_quick_view_product_stock_text_transform = get_theme_mod( 'hongo_quick_view_product_stock_text_transform', '' );
        $hongo_quick_view_product_stock_color = get_theme_mod( 'hongo_quick_view_product_stock_color', '' );
        $hongo_quick_view_product_out_of_stock_color = get_theme_mod( 'hongo_quick_view_product_out_of_stock_color', '' );

        /* Quick View button typography*/
        $hongo_quick_view_product_button_font_size = get_theme_mod( 'hongo_quick_view_product_button_font_size', '' );
        $hongo_quick_view_product_button_line_height = get_theme_mod( 'hongo_quick_view_product_button_line_height', '' );
        $hongo_quick_view_product_button_letter_spacing = get_theme_mod( 'hongo_quick_view_product_button_letter_spacing', '' );
        $hongo_quick_view_product_button_font_weight = get_theme_mod( 'hongo_quick_view_product_button_font_weight', '' );
        $hongo_quick_view_product_button_text_transform = get_theme_mod( 'hongo_quick_view_product_button_text_transform', '' );
        $hongo_quick_view_product_button_color = get_theme_mod( 'hongo_quick_view_product_button_color', '' );
        $hongo_quick_view_product_button_bg_color = get_theme_mod( 'hongo_quick_view_product_button_bg_color', '' );
        $hongo_quick_view_product_button_border_color = get_theme_mod( 'hongo_quick_view_product_button_border_color', '' );
        $hongo_quick_view_product_button_border_hover_color = get_theme_mod( 'hongo_quick_view_product_button_border_hover_color', '' );
        $hongo_quick_view_product_button_hover_color = get_theme_mod( 'hongo_quick_view_product_button_hover_color', '' );
        $hongo_quick_view_product_button_hover_bg_color = get_theme_mod( 'hongo_quick_view_product_button_hover_bg_color', '' );

        /* Quick View meta text typography*/
        $hongo_quick_view_product_page_meta_font_size = get_theme_mod( 'hongo_quick_view_product_page_meta_font_size', '' );
        $hongo_quick_view_product_page_meta_line_height = get_theme_mod( 'hongo_quick_view_product_page_meta_line_height', '' );
        $hongo_quick_view_product_page_meta_letter_spacing = get_theme_mod( 'hongo_quick_view_product_page_meta_letter_spacing', '' );
        $hongo_quick_view_product_page_meta_font_weight =  get_theme_mod( 'hongo_quick_view_product_page_meta_font_weight', '' );
        $hongo_quick_view_product_page_meta_color = get_theme_mod( 'hongo_quick_view_product_page_meta_color', '' );
        $hongo_quick_view_product_page_meta_link_hover_color = get_theme_mod( 'hongo_quick_view_product_page_meta_link_hover_color', '' );
        $hongo_quick_view_product_page_meta_heading_color = get_theme_mod( 'hongo_quick_view_product_page_meta_heading_color', '' );
        $hongo_quick_view_product_page_meta_social_icon_color = get_theme_mod( 'hongo_quick_view_product_page_meta_social_icon_color', '' );
        $hongo_quick_view_product_page_meta_social_icon_hover_color = get_theme_mod( 'hongo_quick_view_product_page_meta_social_icon_hover_color', '' );

        /* Compare Heading typography*/
        $hongo_compare_product_enable_heading = get_theme_mod( 'hongo_compare_product_enable_heading', '1' );
        $hongo_compare_product_heading_font_size = get_theme_mod( 'hongo_compare_product_heading_font_size', '' );
        $hongo_compare_product_enable_filter = get_theme_mod( 'hongo_compare_product_enable_filter', '1' );
        $hongo_compare_product_heading_line_height = get_theme_mod( 'hongo_compare_product_heading_line_height', '' );
        $hongo_compare_product_heading_letter_spacing = get_theme_mod( 'hongo_compare_product_heading_letter_spacing', '' );
        $hongo_compare_product_heading_font_weight = get_theme_mod( 'hongo_compare_product_heading_font_weight', '' );
        $hongo_compare_product_heading_color = get_theme_mod( 'hongo_compare_product_heading_color', '' );
        $hongo_compare_product_heading_link_hover_color = get_theme_mod( 'hongo_compare_product_heading_link_hover_color', '' );
        $hongo_compare_product_filter_errormsg_color = get_theme_mod( 'hongo_compare_product_filter_errormsg_color', '' );
        $hongo_compare_product_filter_errormsg_enable_border = get_theme_mod( 'hongo_compare_product_filter_errormsg_enable_border', '1' );
        $hongo_compare_product_filter_errormsg_border_size = get_theme_mod( 'hongo_compare_product_filter_errormsg_border_size', '' );
        $hongo_compare_product_filter_errormsg_border_type = get_theme_mod( 'hongo_compare_product_filter_errormsg_border_type', '' );
        $hongo_compare_product_filter_errormsg_border_color = get_theme_mod( 'hongo_compare_product_filter_errormsg_border_color', '' );
        $hongo_compare_product_filter_errormsg_border_radius = get_theme_mod( 'hongo_compare_product_filter_errormsg_border_radius', '' );

        /* Compare Label typography */
        $hongo_compare_product_label_font_size = get_theme_mod( 'hongo_compare_product_label_font_size','' );
        $hongo_compare_product_label_line_height = get_theme_mod( 'hongo_compare_product_label_line_height','' );
        $hongo_compare_product_label_letter_spacing = get_theme_mod( 'hongo_compare_product_label_letter_spacing','' );
        $hongo_compare_product_label_color = get_theme_mod( 'hongo_compare_product_label_color', '' );
        $hongo_compare_product_label_font_weight = get_theme_mod( 'hongo_compare_product_label_font_weight', '' );
        $hongo_compare_product_label_text_transform = get_theme_mod( 'hongo_compare_product_label_text_transform', '' );

        /* Title Label typography */
        $hongo_compare_product_title_font_size = get_theme_mod( 'hongo_compare_product_title_font_size','' );
        $hongo_compare_product_title_line_height = get_theme_mod( 'hongo_compare_product_title_line_height','' );
        $hongo_compare_product_title_letter_spacing = get_theme_mod( 'hongo_compare_product_title_letter_spacing','' );
        $hongo_compare_product_title_font_weight = get_theme_mod( 'hongo_compare_product_title_font_weight','' );
        $hongo_compare_product_title_text_transform = get_theme_mod( 'hongo_compare_product_title_text_transform','' );
        $hongo_compare_product_title_color = get_theme_mod( 'hongo_compare_product_title_color','' );
        $hongo_compare_product_title_hover_color = get_theme_mod( 'hongo_compare_product_title_hover_color','' );
        
        /* Compare Main Content typography*/
        $hongo_compare_product_font_size = get_theme_mod( 'hongo_compare_product_font_size', '' );
        $hongo_compare_product_line_height = get_theme_mod( 'hongo_compare_product_line_height', '' );
        $hongo_compare_product_letter_spacing = get_theme_mod( 'hongo_compare_product_letter_spacing', '' );
        $hongo_compare_product_font_weight = get_theme_mod( 'hongo_compare_product_font_weight', '' );
        $hongo_compare_product_color = get_theme_mod( 'hongo_compare_product_color', '' );
        $hongo_compare_product_link_hover_color = get_theme_mod( 'hongo_compare_product_link_hover_color', '' );
        $hongo_compare_product_primary_bg_color = get_theme_mod( 'hongo_compare_product_primary_bg_color', '' );
        $hongo_compare_product_secondary_bg_color = get_theme_mod( 'hongo_compare_product_secondary_bg_color', '' );

        /* Compare Button Typography*/
        $hongo_compare_product_button_font_size = get_theme_mod( 'hongo_compare_product_button_font_size', '' );
        $hongo_compare_product_button_line_height = get_theme_mod( 'hongo_compare_product_button_line_height', '' );
        $hongo_compare_product_button_letter_spacing = get_theme_mod( 'hongo_compare_product_button_letter_spacing', '' );
        $hongo_compare_product_button_font_weight = get_theme_mod( 'hongo_compare_product_button_font_weight', '' );
        $hongo_compare_product_button_text_transform = get_theme_mod( 'hongo_compare_product_button_text_transform', '' );
        $hongo_compare_product_button_color = get_theme_mod( 'hongo_compare_product_button_color', '' );
        $hongo_compare_product_button_bg_color = get_theme_mod( 'hongo_compare_product_button_bg_color', '' );
        $hongo_compare_product_button_border_color = get_theme_mod( 'hongo_compare_product_button_border_color', '' );
        $hongo_compare_product_button_border_hover_color = get_theme_mod( 'hongo_compare_product_button_border_hover_color','' );
        $hongo_compare_product_button_hover_color = get_theme_mod( 'hongo_compare_product_button_hover_color', '' );
        $hongo_compare_product_button_hover_bg_color = get_theme_mod( 'hongo_compare_product_button_hover_bg_color', '' );

        /* Compare Price Typography*/
        $hongo_compare_product_price_font_size = get_theme_mod( 'hongo_compare_product_price_font_size', '' );
        $hongo_compare_product_price_line_height = get_theme_mod( 'hongo_compare_product_price_line_height', '' );
        $hongo_compare_product_price_letter_spacing = get_theme_mod( 'hongo_compare_product_price_letter_spacing', '' );
        $hongo_compare_product_price_font_weight = get_theme_mod( 'hongo_compare_product_price_font_weight', '' );
        $hongo_compare_product_price_color = get_theme_mod( 'hongo_compare_product_price_color', '' );
        $hongo_compare_product_regular_price_color = get_theme_mod( 'hongo_compare_product_regular_price_color', '' );
        
     }

    /* Search Popup Typography */
    $hongo_search_popup_bgcolor = get_theme_mod('hongo_search_popup_bgcolor', '');
    $hongo_search_popup_labelcolor = get_theme_mod('hongo_search_popup_labelcolor', '');
    $hongo_search_popup_placeholder_text = get_theme_mod('hongo_search_popup_placeholder_text', '');
    $hongo_search_popup_text_color = get_theme_mod('hongo_search_popup_text_color', '');
    $hongo_search_popup_border_color = get_theme_mod('hongo_search_popup_border_color', '');
    $hongo_search_popup_search_icon_color = get_theme_mod('hongo_search_popup_search_icon_color', '');
    $hongo_search_popup_close_icon_color = get_theme_mod('hongo_search_popup_close_icon_color', '');
    $hongo_search_popup_close_icon_hover_color = get_theme_mod('hongo_search_popup_close_icon_hover_color', '');
    $hongo_search_popup_close_icon_bg_color = get_theme_mod('hongo_search_popup_close_icon_bg_color', '');
    $hongo_search_popup_close_icon_bg_hover_color = get_theme_mod('hongo_search_popup_close_icon_bg_hover_color', '');
?>

<?php if ( hongo_is_woocommerce_activated() ) {/* if WooCommerce plugin is activated */ ?>

    <?php if( $hongo_quick_view_product_sale_font_size ) : ?>
    /* Quick View Sale Font Size */
    .hongo-quick-view-popup .sale-new-wrap span.onsale, .hongo-quick-view-popup .sale-new-wrap span.new, .hongo-quick-view-popup .sale-new-wrap span.soldout { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_sale_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_sale_line_height ) : ?>
    /* Quick View Sale Line Height */
    .hongo-quick-view-popup .sale-new-wrap span.onsale, .hongo-quick-view-popup .sale-new-wrap span.new, .hongo-quick-view-popup .sale-new-wrap span.soldout  { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_sale_line_height ); ?>; }    
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_sale_letter_spacing ) : ?>
    /* Quick View Sale Letter Spacing */
    .hongo-quick-view-popup .sale-new-wrap span.onsale, .hongo-quick-view-popup .sale-new-wrap span.new, .hongo-quick-view-popup .sale-new-wrap span.soldout { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_sale_letter_spacing ); ?>; }    
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_sale_font_weight ) : ?>
    /* Quick View Sale Font Weight */
    .hongo-quick-view-popup .sale-new-wrap span.onsale, .hongo-quick-view-popup .sale-new-wrap span.new, .hongo-quick-view-popup .sale-new-wrap span.soldout { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_sale_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_number_color ) : ?>
    /* Quick View deal number color */
    .hongo-quick-view-deal-wrap > span { color: <?php echo sprintf( '%s', $hongo_quick_view_product_number_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_deal_text_color ) : ?>
    /* Quick View deal number color */
    .hongo-quick-view-deal-wrap span > span { color: <?php echo sprintf( '%s', $hongo_quick_view_product_deal_text_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_sale_color ) : ?>
    /* Quick View Sale Color */
    .hongo-quick-view-popup .sale-new-wrap span.onsale { color: <?php echo sprintf( '%s', $hongo_quick_view_product_sale_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_sale_bg_color ) : ?>
    /* Quick View Sale Color */
    .hongo-quick-view-popup .sale-new-wrap span.onsale { background-color: <?php echo sprintf( '%s', $hongo_quick_view_product_sale_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_new_color ) : ?>
    /* Quick View New Color */
    .hongo-quick-view-popup .sale-new-wrap span.new { color: <?php echo sprintf( '%s', $hongo_quick_view_product_new_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_new_bg_color ) : ?>
    /* Quick View New Color */
    .hongo-quick-view-popup .sale-new-wrap span.new { background-color: <?php echo sprintf( '%s', $hongo_quick_view_product_new_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_soldout_color ) : ?>
    /* Quick View Sold Box Color */
    .hongo-quick-view-popup .sale-new-wrap span.soldout { color: <?php echo sprintf( '%s', $hongo_quick_view_product_soldout_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_soldout_bg_color ) : ?>
    /* Quick View Sold box Color */
    .hongo-quick-view-popup .sale-new-wrap span.soldout { background-color: <?php echo sprintf( '%s', $hongo_quick_view_product_soldout_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_title_font_size ) : ?>
    /* Quick View Title Font Size */
    .hongo-quick-view-popup.woocommerce div.product .product_title { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_page_title_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_title_line_height ) : ?>
    /* Quick View Title Line Height */
    .hongo-quick-view-popup.woocommerce div.product .product_title { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_page_title_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_title_letter_spacing ) : ?>
    /* Quick View Title Letter Specing */
    .hongo-quick-view-popup.woocommerce div.product .product_title { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_page_title_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_title_font_weight ) : ?>
    /* Quick View Title Font Weight */
    .hongo-quick-view-popup.woocommerce div.product .product_title { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_page_title_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_title_text_transform ) : ?>
    /* Quick View Title Font Weight */
    .hongo-quick-view-popup.woocommerce div.product .product_title { text-transform: <?php echo sprintf( '%s', $hongo_quick_view_product_page_title_text_transform ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_title_color ) : ?>
    /* Quick View Title Color */
    .hongo-quick-view-popup.woocommerce div.product .product_title { color: <?php echo sprintf( '%s', $hongo_quick_view_product_page_title_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_rating_star_color ) : ?>
    /* Quick View Rating Color */
    .hongo-quick-view-popup.woocommerce .star-rating::before, .hongo-quick-view-popup.woocommerce .star-rating span, .hongo-quick-view-popup.woocommerce p.stars.selected a:not(.active)::before, .hongo-quick-view-popup.woocommerce p.stars a::before { color: <?php echo sprintf( '%s', $hongo_quick_view_product_rating_star_color ); ?>; }    
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_price_font_size ) : ?>
    /* Quick View Price Font Size */
    .hongo-quick-view-popup.woocommerce div.product .price { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_price_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_price_line_height ) : ?>
    /* Quick View Price Font line height */
    .hongo-quick-view-popup.woocommerce div.product .price { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_price_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_price_letter_spacing ) : ?>
    /* Quick View Price Font letter spacing */
    .hongo-quick-view-popup.woocommerce div.product .price { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_price_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_price_font_weight ) : ?>
    /* Quick View Price Font line weight */
    .hongo-quick-view-popup.woocommerce div.product .price, .hongo-quick-view-popup.woocommerce div.product p.price ins { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_price_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_price_color ) : ?>
    /* Quick View Price color */
    .hongo-quick-view-popup.woocommerce div.product .price , .hongo-quick-view-popup.woocommerce div.product .price ins { color: <?php echo sprintf( '%s', $hongo_quick_view_product_price_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_regular_price_color  ) : ?>
    /* Quick View Price Main color */
    .hongo-quick-view-popup.woocommerce div.product .price del { color: <?php echo sprintf( '%s', $hongo_quick_view_product_regular_price_color  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_short_description_font_size  ) : ?>
    /* Quick View Short Description Font Size */
    .hongo-quick-view-popup.woocommerce div.product .woocommerce-product-details__short-description p { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_short_description_font_size  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_short_description_line_height  ) : ?>
    /* Quick View Short Description Line Height */
    .hongo-quick-view-popup.woocommerce div.product .woocommerce-product-details__short-description p { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_short_description_line_height  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_short_description_letter_spacing  ) : ?>
    /* Quick View Short Description Letter Spacing */
    .hongo-quick-view-popup.woocommerce div.product .woocommerce-product-details__short-description p { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_short_description_letter_spacing  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_short_description_font_weight  ) : ?>
    /* Quick View Short Description Font Weight */
    .hongo-quick-view-popup.woocommerce div.product .woocommerce-product-details__short-description p { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_short_description_font_weight  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_short_description_color  ) : ?>
    /* Quick View Short Description Font Weight */
    .hongo-quick-view-popup.woocommerce div.product .woocommerce-product-details__short-description p { color: <?php echo sprintf( '%s', $hongo_quick_view_product_short_description_color  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_stock_font_size  ) : ?>
    /* Quick View Stock Text Font Size */
    .hongo-quick-view-popup.woocommerce div.product p.stock { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_font_size  ); ?>!important; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_stock_line_height  ) : ?>
    /* Quick View Stock Text Font line height */
    .hongo-quick-view-popup.woocommerce div.product p.stock { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_line_height  ); ?>!important; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_stock_letter_spacing  ) : ?>
    /* Quick View Stock Text Font letter spacing */
    .hongo-quick-view-popup.woocommerce div.product p.stock { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_letter_spacing  ); ?>!important; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_stock_font_weight  ) : ?>
    /* Quick View Stock Text Font weight */
    .hongo-quick-view-popup.woocommerce div.product p.stock { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_font_weight  ); ?>!important; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_stock_text_transform  ) : ?>
    /* Quick View Stock Text Font weight */
    .hongo-quick-view-popup.woocommerce div.product p.stock { text-transform: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_text_transform  ); ?>!important; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_stock_color  ) : ?>
    /* Quick View In Stock color */
    .hongo-quick-view-popup.woocommerce div.product p.in-stock { color: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_color  ); ?>; }
    .hongo-quick-view-popup.woocommerce div.product p.in-stock { border-color: <?php echo sprintf( '%s', $hongo_quick_view_product_stock_color  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_out_of_stock_color  ) : ?>
    /* Quick View Out Stock color */
    .hongo-quick-view-popup.woocommerce div.product p.out-of-stock { color: <?php echo sprintf( '%s', $hongo_quick_view_product_out_of_stock_color  ); ?>; }
    .hongo-quick-view-popup.woocommerce div.product p.out-of-stock { border-color: <?php echo sprintf( '%s', $hongo_quick_view_product_out_of_stock_color  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_font_size  ) : ?>
    /* Quick View Button Font Size */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_button_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_line_height  ) : ?>
    /* Quick View Button line height */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_button_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_letter_spacing  ) : ?>
    /* Quick View Button letter spacing */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_button_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_font_weight  ) : ?>
    /* Quick View Button font weight */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_button_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_text_transform  ) : ?>
    /* Quick View Button letter spacing */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { text-transform: <?php echo sprintf( '%s', $hongo_quick_view_product_button_text_transform ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_color  ) : ?>
    /* Quick View Button color */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { color: <?php echo sprintf( '%s', $hongo_quick_view_product_button_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_bg_color  ) : ?>
    /* Quick View Button Background color */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { background-color: <?php echo sprintf( '%s', $hongo_quick_view_product_button_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_border_color  ) : ?>
    /* Quick View Button Border color */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button { border-color: <?php echo sprintf( '%s', $hongo_quick_view_product_button_border_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_border_hover_color  ) : ?>
    /* Quick View Button Border color */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button:hover { border-color: <?php echo sprintf( '%s', $hongo_quick_view_product_button_border_hover_color ); ?>; }
    <?php endif; ?>
    
    <?php if( $hongo_quick_view_product_button_hover_color ) : ?>
    /* Product Button Hover Color */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button:hover { color: <?php echo sprintf( '%s', $hongo_quick_view_product_button_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_button_hover_bg_color ) : ?>
    /* Product Button Background Hover Color */
    .hongo-quick-view-popup.woocommerce div.product form.cart .button:hover { background-color: <?php echo sprintf( '%s', $hongo_quick_view_product_button_hover_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_font_size ) : ?>
    /* Product Meta Font Size */
    .hongo-quick-view-popup.woocommerce div.product .product_meta, .hongo-quick-view-popup.woocommerce div.product .product_meta span, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-wishlist, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-compare, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-wishlist i, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-compare i, .hongo-quick-view-popup.woocommerce div.product .summary .products-social-icon ul li a, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper { font-size: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_line_height ) : ?>
    /* Product Meta Line Height */
    .hongo-quick-view-popup.woocommerce div.product .product_meta, .hongo-quick-view-popup.woocommerce div.product .product_meta span, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-wishlist, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-compare, .hongo-quick-view-popup.woocommerce div.product .summary .products-social-icon ul li a, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper { line-height: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_letter_spacing ) : ?>
    /* Product Meta Letter Spacing */
    .hongo-quick-view-popup.woocommerce div.product .product_meta, .hongo-quick-view-popup.woocommerce div.product .product_meta span, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-wishlist, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-compare, .hongo-quick-view-popup.woocommerce div.product .summary .products-social-icon ul li a, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper { letter-spacing: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_font_weight ) : ?>
    /* Product Meta Font Weight */
    .hongo-quick-view-popup.woocommerce div.product .product_meta, .hongo-quick-view-popup.woocommerce div.product .product_meta span, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-wishlist, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-compare, .hongo-quick-view-popup.woocommerce .product_meta span a, .hongo-quick-view-popup.woocommerce div.product .summary .products-social-icon ul li a, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper { font-weight: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_color ) : ?>
    /* Product Meta color */
    .hongo-quick-view-popup.woocommerce div.product .product_meta .sku_wrapper span.sku, .hongo-quick-view-popup.woocommerce div.product .product_meta .posted_in a, .hongo-quick-view-popup .product_meta .tagged_as a, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-wishlist, .hongo-quick-view-popup.woocommerce div.product .summary a.hongo-compare, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper span { color: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_link_hover_color ) : ?>
    /* Product Meta link hover color */
    .hongo-quick-view-popup.woocommerce div.product .product_meta .posted_in a:hover, .hongo-quick-view-popup.woocommerce div.product .product_meta .tagged_as a:hover, .hongo-quick-view-popup.woocommerce div.product .summary a:hover.hongo-wishlist, .hongo-quick-view-popup.woocommerce div.product .summary a:hover.hongo-compare { color: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_link_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_heading_color ) : ?>
    /* Product Heading Meta color */
    .hongo-quick-view-popup.woocommerce div.product .product_meta .sku_wrapper, .hongo-quick-view-popup.woocommerce div.product .product_meta .posted_in, .hongo-quick-view-popup.woocommerce div.product .product_meta span.tagged_as, .hongo-quick-view-popup.woocommerce div.product .product_meta .products-social-icon span.hongo-product-sharebox-title, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper { color: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_heading_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_social_icon_color ) : ?>
    /* Product Social Icon color */
    .hongo-quick-view-popup.woocommerce div.product .product_meta .products-social-icon a { color: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_social_icon_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_quick_view_product_page_meta_social_icon_hover_color ) : ?>
    /* Product Social Icon Hover color */
    .hongo-quick-view-popup.woocommerce div.product .product_meta .products-social-icon a:hover { color: <?php echo sprintf( '%s', $hongo_quick_view_product_page_meta_social_icon_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_compare_product_enable_heading == '1' && $hongo_compare_product_enable_filter == '1' ) : ?>
    /* Compare Product Heading enable disable */
        <?php if( $hongo_compare_product_heading_font_size ) : ?>
            /*Compare Product Header font size*/
            .hongo-compare-popup .compare-popup-heading h3, .hongo-compare-popup .compare-popup-heading .actions a, .hongo-compare-popup .compare-error-msg { font-size: <?php echo sprintf( '%s', $hongo_compare_product_heading_font_size ); ?>; }            
        <?php endif; ?>

        <?php if( $hongo_compare_product_heading_line_height ) : ?>
            /*Compare Product Header line height*/
            .hongo-compare-popup .compare-popup-heading h3, .hongo-compare-popup .compare-popup-heading .actions a, .hongo-compare-popup .compare-error-msg { line-height: <?php echo sprintf( '%s', $hongo_compare_product_heading_line_height ); ?>; }            
        <?php endif; ?>

        <?php if( $hongo_compare_product_heading_letter_spacing ) : ?>
            /*Compare Product Header line height*/
            .hongo-compare-popup .compare-popup-heading h3, .hongo-compare-popup .compare-popup-heading .actions a, .hongo-compare-popup .compare-error-msg { letter-spacing: <?php echo sprintf( '%s', $hongo_compare_product_heading_letter_spacing ); ?>; }            
        <?php endif; ?>

        <?php if( $hongo_compare_product_heading_font_weight ) : ?>
            /*Compare Product Header line height*/
            .hongo-compare-popup .compare-popup-heading h3, .hongo-compare-popup .compare-popup-heading .actions a, .hongo-compare-popup .compare-error-msg { font-weight: <?php echo sprintf( '%s', $hongo_compare_product_heading_font_weight ); ?>; }            
        <?php endif; ?>

        <?php if( $hongo_compare_product_heading_color ) : ?>
            /*Compare Product Header color*/
            .hongo-compare-popup .compare-popup-heading h3, .hongo-compare-popup .compare-popup-heading .actions a { color: <?php echo sprintf( '%s', $hongo_compare_product_heading_color ); ?>; }            
        <?php endif; ?>

        <?php if( $hongo_compare_product_heading_link_hover_color ) : ?>
            /*Compare Product Header color*/
            .hongo-compare-popup .compare-popup-heading .actions a:hover { color: <?php echo sprintf( '%s', $hongo_compare_product_heading_link_hover_color ); ?>; }
        <?php endif; ?>        

    <?php endif; ?>

    <?php if( $hongo_compare_product_enable_filter == '1' ) : ?>
        <?php if( $hongo_compare_product_filter_errormsg_color ) : ?>
            /* Compare Product Error message color */
            .hongo-compare-popup .compare-error-msg { color: <?php echo sprintf( '%s', $hongo_compare_product_filter_errormsg_color ); ?>; } 
        <?php endif; ?>        
    <?php endif; ?>

    <?php if ( $hongo_compare_product_filter_errormsg_enable_border != '1' ) : ?>
        /*Error message box border enable disable*/
        .hongo-compare-popup .compare-error-msg { border: none; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_enable_filter == '1' || $hongo_compare_product_filter_errormsg_enable_border == '1' ) : ?>
        
        <?php if( $hongo_compare_product_filter_errormsg_border_size ) : ?>
            /* Compare Product Error message color */
            .hongo-compare-popup .compare-error-msg { border-width: <?php echo sprintf( '%s', $hongo_compare_product_filter_errormsg_border_size ); ?>; } 
        <?php endif; ?>

        <?php if( $hongo_compare_product_filter_errormsg_border_type ) : ?>
            /* Compare Product Error message color */
            .hongo-compare-popup .compare-error-msg { border-style: <?php echo sprintf( '%s', $hongo_compare_product_filter_errormsg_border_type ); ?>; } 
        <?php endif; ?>

        <?php if( $hongo_compare_product_filter_errormsg_border_color ) : ?>
            /* Compare Product Error message color */
            .hongo-compare-popup .compare-error-msg { border-color: <?php echo sprintf( '%s', $hongo_compare_product_filter_errormsg_border_color ); ?>; } 
        <?php endif; ?>

        <?php if( $hongo_compare_product_filter_errormsg_border_radius ) : ?>
            /* Compare Product Error message color */
            .hongo-compare-popup .compare-error-msg { border-radius: <?php echo sprintf( '%s', $hongo_compare_product_filter_errormsg_border_radius ); ?>; } 
        <?php endif; ?>

    <?php endif; ?>

    <?php if( $hongo_compare_product_font_size ) : ?>
        /*Compare Product Main content Font size*/
        .hongo-compare-popup .compare-popup-main-content .content-right .hongo-compare-product-remove-wrap .hongo-compare-product-remove, .hongo-compare-popup .compare-popup-main-content .content-right, .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li { font-size: <?php echo sprintf( '%s', $hongo_compare_product_font_size ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_line_height ) : ?>
        /*Compare Product Main content Line Height*/
        .hongo-compare-popup .compare-popup-main-content .content-right .hongo-compare-product-remove-wrap .hongo-compare-product-remove, .hongo-compare-popup .compare-popup-main-content .content-right, .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li { line-height: <?php echo sprintf( '%s', $hongo_compare_product_line_height ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_letter_spacing ) : ?>
        /*Compare Product Main content Line Height*/
        .hongo-compare-popup .compare-popup-main-content .content-right .hongo-compare-product-remove-wrap .hongo-compare-product-remove, .hongo-compare-popup .compare-popup-main-content .content-right, .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li { letter-spacing: <?php echo sprintf( '%s', $hongo_compare_product_letter_spacing ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_font_weight ) : ?>
        /*Compare Product Main content Font Weight*/
        .hongo-compare-popup .compare-popup-main-content .content-right .hongo-compare-product-remove-wrap .hongo-compare-product-remove, .hongo-compare-popup .compare-popup-main-content .content-right, .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li { font-weight: <?php echo sprintf( '%s', $hongo_compare_product_font_weight ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_color ) : ?>
        /*Compare Product Main content color*/
        .compare-popup-main-content .content-right .hongo-compare-product-remove-wrap .hongo-compare-product-remove, .hongo-compare-popup .compare-popup-main-content .content-right, .hongo-compare-popup .star-rating::before, .hongo-compare-popup .star-rating span, .hongo-compare-popup .star-rating { color: <?php echo sprintf( '%s', $hongo_compare_product_color ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_link_hover_color ) : ?>
        /*Compare Product Main Content link hover color*/
        .compare-popup-main-content .content-right .hongo-compare-product-remove-wrap .hongo-compare-product-remove:hover { color: <?php echo sprintf( '%s', $hongo_compare_product_link_hover_color ); ?> ; }            
    <?php endif; ?> 


    <?php if( $hongo_compare_product_primary_bg_color ) : ?>
        /*Compare Product Primary background color*/
        .hongo-compare-popup .compare-popup-main-content .even { background-color: <?php echo sprintf( '%s', $hongo_compare_product_primary_bg_color ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_secondary_bg_color ) : ?>
        /*Compare Product Secondary background color*/
        .hongo-compare-popup .compare-popup-main-content .odd { background-color: <?php echo sprintf( '%s', $hongo_compare_product_secondary_bg_color ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_label_font_size ) : ?>
        /*Compare Label font size*/
        .compare-popup-main-content .content-left ul > li { font-size: <?php echo sprintf( '%s', $hongo_compare_product_label_font_size ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_label_line_height ) : ?>
        /*Compare Label line height*/
        .compare-popup-main-content .content-left ul > li { line-height: <?php echo sprintf( '%s', $hongo_compare_product_label_line_height ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_label_letter_spacing ) : ?>
        /*Compare Label letter spacing*/
        .compare-popup-main-content .content-left ul > li { letter-spacing: <?php echo sprintf( '%s', $hongo_compare_product_label_letter_spacing ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_label_font_weight ) : ?>
        /*Compare Label Font Weight*/
        .compare-popup-main-content .content-left ul > li { font-weight: <?php echo sprintf( '%s', $hongo_compare_product_label_font_weight ); ?> ; }
    <?php endif; ?>

    <?php if( $hongo_compare_product_label_text_transform ) : ?>
        /*Compare Label Text case*/
        .compare-popup-main-content .content-left ul > li { text-transform: <?php echo sprintf( '%s', $hongo_compare_product_label_text_transform ); ?> ; }
    <?php endif; ?>

    <?php if( $hongo_compare_product_label_color ) : ?>
        /*Compare Label color*/
        .compare-popup-main-content .content-left ul > li { color: <?php echo sprintf( '%s', $hongo_compare_product_label_color ); ?> ; }            
    <?php endif; ?>    

    <?php if( $hongo_compare_product_title_font_size ) : ?>
        /*Compare Title font size*/
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2.compare-title a { font-size: <?php echo sprintf( '%s', $hongo_compare_product_title_font_size ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_title_line_height ) : ?>
        /*Compare Title line height*/
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a { line-height: <?php echo sprintf( '%s', $hongo_compare_product_title_line_height ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_title_letter_spacing ) : ?>
        /*Compare Title Letter Spacing */
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a { letter-spacing: <?php echo sprintf( '%s', $hongo_compare_product_title_letter_spacing ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_title_font_weight ) : ?>
        /*Compare Title Font Weight */
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a { font-weight: <?php echo sprintf( '%s', $hongo_compare_product_title_font_weight ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_title_text_transform ) : ?>
        /*Compare Title Text case */
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a { text-transform: <?php echo sprintf( '%s', $hongo_compare_product_title_text_transform ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_title_color ) : ?>
        /*Compare Title Color */
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a { color: <?php echo sprintf( '%s', $hongo_compare_product_title_color ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_title_hover_color ) : ?>
        /*Compare Title Hover Color */
        .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a:hover { color: <?php echo sprintf( '%s', $hongo_compare_product_title_hover_color ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_font_size ) : ?>
        /*Compare Product Button Main Font Size*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { font-size: <?php echo sprintf( '%s', $hongo_compare_product_button_font_size ); ?>; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_line_height ) : ?>
        /*Compare Product Button Main Line Height*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { line-height: <?php echo sprintf( '%s', $hongo_compare_product_button_line_height ); ?>; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_letter_spacing ) : ?>
        /*Compare Product Button Main Letter Spacing*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { letter-spacing: <?php echo sprintf( '%s', $hongo_compare_product_button_letter_spacing ); ?>; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_font_weight ) : ?>
        /*Compare Product Button Main Font Weight*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { font-weight: <?php echo sprintf( '%s', $hongo_compare_product_button_font_weight ); ?>; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_text_transform ) : ?>
        /*Compare Product Button Main Color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { text-transform: <?php echo sprintf( '%s', $hongo_compare_product_button_text_transform ); ?>; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_color ) : ?>
        /*Compare Product Button Main Color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { color: <?php echo sprintf( '%s', $hongo_compare_product_button_color ); ?>; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_bg_color ) : ?>
        /*Compare Product Button Main Background Color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { background-color: <?php echo sprintf( '%s', $hongo_compare_product_button_bg_color ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_border_color ) : ?>
        /*Compare Product Button Main border Color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button { border-color: <?php echo sprintf( '%s', $hongo_compare_product_button_border_color ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_border_hover_color ) : ?>
        /*Compare Product Button Hover border Color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button:hover { border-color: <?php echo sprintf( '%s', $hongo_compare_product_button_border_hover_color ); ?> ; } 
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_hover_color ) : ?>
        /*Compare Product Main Content link hover color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button:hover { color: <?php echo sprintf( '%s', $hongo_compare_product_button_hover_color ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_button_hover_bg_color ) : ?>
        /*Compare Product Main Content link hover color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button:hover { background-color: <?php echo sprintf( '%s', $hongo_compare_product_button_hover_bg_color ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_price_font_size ) : ?>
        /*Compare Price Font Size*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price { font-size: <?php echo sprintf( '%s', $hongo_compare_product_price_font_size ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_price_line_height ) : ?>
        /*Compare Price line height*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price { line-height: <?php echo sprintf( '%s', $hongo_compare_product_price_line_height ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_price_letter_spacing ) : ?>
        /*Compare Price letter spacing*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price { letter-spacing: <?php echo sprintf( '%s', $hongo_compare_product_price_letter_spacing ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_price_font_weight ) : ?>
        /*Compare Price font weight*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price { font-weight: <?php echo sprintf( '%s', $hongo_compare_product_price_font_weight ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_price_color ) : ?>
        /*Compare Price color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price { color: <?php echo sprintf( '%s', $hongo_compare_product_price_color ); ?> ; }            
    <?php endif; ?>

    <?php if( $hongo_compare_product_regular_price_color ) : ?>
        /*Compare Price color*/
        .hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price del { color: <?php echo sprintf( '%s', $hongo_compare_product_regular_price_color ); ?> ; }            
    <?php endif; ?>
    
<?php 
}/* if WooCommerce plugin is activated */ ?>

    <?php if( $hongo_search_popup_bgcolor  ) : ?>
    /* Search Popup Background */
    .show-search-popup .search-popup { background-color: <?php echo sprintf( '%s', $hongo_search_popup_bgcolor  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_labelcolor  ) : ?>
    /* Search Label Color */
    .show-search-popup .mfp-container .search-label{ color: <?php echo sprintf( '%s', $hongo_search_popup_labelcolor  ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_placeholder_text  ) : ?>
    /* Placeholder Color */
        .show-search-popup .search-form .search-input::-webkit-input-placeholder {color: <?php echo sprintf( '%s', $hongo_search_popup_placeholder_text ); ?> !important; opacity: 1;}
        .show-search-popup .search-form .search-input::-moz-placeholder {color: <?php echo sprintf( '%s', $hongo_search_popup_placeholder_text ); ?>!important; opacity: 1;}
        .show-search-popup .search-form .search-input::-ms-input-placeholder {color: <?php echo sprintf( '%s', $hongo_search_popup_placeholder_text ); ?> !important; opacity: 1;}
        .show-search-popup .search-form .search-input:-moz-placeholder {color: <?php echo sprintf( '%s', $hongo_search_popup_placeholder_text ); ?> !important; opacity: 1;}
    <?php endif; ?>

    <?php if( $hongo_search_popup_text_color  ) : ?>
    /* Search Text Color */
    .show-search-popup .search-form .search-input{ color: <?php echo sprintf( '%s', $hongo_search_popup_text_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_border_color  ) : ?>
    /* Search Border Color */
    .show-search-popup .search-popup .search-form:before{ border-bottom-color: <?php echo sprintf( '%s', $hongo_search_popup_border_color ); ?>; }
    <?php endif; ?>

     <?php if( $hongo_search_popup_search_icon_color  ) : ?>
    /* Search Icon Color */
    .show-search-popup .search-form .search-button{ color: <?php echo sprintf( '%s', $hongo_search_popup_search_icon_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_close_icon_color  ) : ?>
    /* Search Close Icon Color */
    .show-search-popup .mfp-close, .show-search-popup .mfp-close:active{ color: <?php echo sprintf( '%s', $hongo_search_popup_close_icon_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_close_icon_hover_color  ) : ?>
    /* Search Close Icon Hover Color */
    .show-search-popup .mfp-close:hover, .show-search-popup .mfp-close:hover{ color: <?php echo sprintf( '%s', $hongo_search_popup_close_icon_hover_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_close_icon_bg_color  ) : ?>
    /* Search Close BG Color */
    button.mfp-close, button.mfp-arrow{ background: <?php echo sprintf( '%s', $hongo_search_popup_close_icon_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_search_popup_close_icon_bg_hover_color  ) : ?>
    /* Search Close BG Hover Color */
    .show-search-popup button.mfp-close:hover, button.mfp-arrow:hover{ background: <?php echo sprintf( '%s', $hongo_search_popup_close_icon_bg_hover_color ); ?>; }
    <?php endif; ?>

<?php
// Only For Wishlist Page Css
if( hongo_is_woocommerce_activated() ) {
    if( is_hongo_wishlist() ) {
        
        /* Wishlist Genaral Settings */
        $hongo_wishlist_border_color = get_theme_mod( 'hongo_wishlist_border_color', '' );
        $hongo_wishlist_remove_empty_color = get_theme_mod( 'hongo_wishlist_remove_empty_color', '' );
        $hongo_wishlist_remove_checkbox_color = get_theme_mod( 'hongo_wishlist_remove_checkbox_color', '' );
        $hongo_wishlist_remove_checkbox_checked_color = get_theme_mod( 'hongo_wishlist_remove_checkbox_checked_color', '' );
        $hongo_wishlist_remove_icon_color = get_theme_mod( 'hongo_wishlist_remove_icon_color', '' );

        /* Wishlist Heading typography */
        $hongo_wishlist_product_heading_font_size = get_theme_mod('hongo_wishlist_product_heading_font_size','');
        $hongo_wishlist_product_heading_line_height = get_theme_mod('hongo_wishlist_product_heading_line_height','');
        $hongo_wishlist_product_heading_letter_spacing = get_theme_mod('hongo_wishlist_product_heading_letter_spacing','');
        $hongo_wishlist_product_heading_font_weight = get_theme_mod('hongo_wishlist_product_heading_font_weight','');
        $hongo_wishlist_product_heading_color = get_theme_mod('hongo_wishlist_product_heading_color','');
        $hongo_wishlist_product_heading_text_transform = get_theme_mod('hongo_wishlist_product_heading_text_transform','');

        /* Wishlist Content typography */
        $hongo_wishlist_product_content_font_size = get_theme_mod('hongo_wishlist_product_content_font_size', '');
        $hongo_wishlist_product_content_line_height = get_theme_mod('hongo_wishlist_product_content_line_height', '');
        $hongo_wishlist_product_content_letter_spacing = get_theme_mod('hongo_wishlist_product_content_letter_spacing', '');
        $hongo_wishlist_product_content_font_weight = get_theme_mod('hongo_wishlist_product_content_font_weight', '');
        $hongo_wishlist_product_content_text_transform = get_theme_mod('hongo_wishlist_product_content_text_transform', '');
        $hongo_wishlist_product_content_color = get_theme_mod('hongo_wishlist_product_content_color', '');
        $hongo_wishlist_product_content_hover_color = get_theme_mod('hongo_wishlist_product_content_hover_color', '');

        /* Wishlist Stock typography*/
        $hongo_wishlist_product_stock_font_size = get_theme_mod('hongo_wishlist_product_stock_font_size', '');
        $hongo_wishlist_product_stock_line_height = get_theme_mod('hongo_wishlist_product_stock_line_height', '');
        $hongo_wishlist_product_stock_letter_spacing = get_theme_mod('hongo_wishlist_product_stock_letter_spacing', '');
        $hongo_wishlist_product_stock_font_weight = get_theme_mod('hongo_wishlist_product_stock_font_weight', '');
        $hongo_wishlist_product_stock_text_transform = get_theme_mod('hongo_wishlist_product_stock_text_transform', '');
        $hongo_wishlist_product_instock_color = get_theme_mod('hongo_wishlist_product_instock_color','');
        $hongo_wishlist_product_outstock_color = get_theme_mod('hongo_wishlist_product_outstock_color','');

        /* Wishlist Button typography */
        $hongo_wishlist_product_button_font_size = get_theme_mod('hongo_wishlist_product_button_font_size', '');
        $hongo_wishlist_product_button_line_height = get_theme_mod('hongo_wishlist_product_button_line_height', '');
        $hongo_wishlist_product_button_letter_spacing = get_theme_mod('hongo_wishlist_product_button_letter_spacing', '');
        $hongo_wishlist_product_button_font_weight = get_theme_mod('hongo_wishlist_product_button_font_weight', '');
        $hongo_wishlist_product_button_text_transform = get_theme_mod('hongo_wishlist_product_button_text_transform', '');
        $hongo_wishlist_product_button_bg_color = get_theme_mod('hongo_wishlist_product_button_bg_color','');
        $hongo_wishlist_product_button_hover_bg_color = get_theme_mod('hongo_wishlist_product_button_hover_bg_color','');
        $hongo_wishlist_product_button_color = get_theme_mod('hongo_wishlist_product_button_color','');
        $hongo_wishlist_product_button_hover_color = get_theme_mod('hongo_wishlist_product_button_hover_color','');
        $hongo_wishlist_product_button_border_color = get_theme_mod('hongo_wishlist_product_button_border_color','');
        $hongo_wishlist_product_button_border_hover_color = get_theme_mod('hongo_wishlist_product_button_border_hover_color','');
    ?>

        <?php if( $hongo_wishlist_border_color  ) : ?>
        /* Wishlist Border Color */
        .hongo-wishlist-page table.table th, .hongo-wishlist-page table.table td { border-bottom-color: <?php echo sprintf( '%s', $hongo_wishlist_border_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_remove_empty_color  ) : ?>
        /* Wishlist Remove Empty Color */
        .hongo-wishlist-page table.table td a.btn-link, .hongo-wishlist-page table.table td a.btn-link:hover span{ color: <?php echo sprintf( '%s', $hongo_wishlist_remove_empty_color  ); ?>; border-bottom-color: <?php echo sprintf( '%s', $hongo_wishlist_remove_empty_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_remove_checkbox_color  ) : ?>
        /* Wishlist Remove Checkbox Border Color */
        .hongo-wishlist-page .hongo-cb { border-color: <?php echo sprintf( '%s', $hongo_wishlist_remove_checkbox_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_remove_checkbox_checked_color  ) : ?>
        /* Wishlist Remove Checkbox Checked Color */
        .hongo-wishlist-page .hongo-cb:after{ color: <?php echo sprintf( '%s', $hongo_wishlist_remove_checkbox_checked_color  ); ?> !important; }
        <?php endif; ?>

         <?php if( $hongo_wishlist_remove_icon_color  ) : ?>
        /* Wishlist Remove Icon Color */
        .hongo-wishlist-page a.hongo-page-remove-wish { color: <?php echo sprintf( '%s', $hongo_wishlist_remove_icon_color  ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_heading_font_size  ) : ?>
        /* Wishlist product heading Font Size */
        .hongo-wishlist-page table.table th { font-size: <?php echo sprintf( '%s', $hongo_wishlist_product_heading_font_size  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_heading_line_height  ) : ?>
        /* Wishlist Product Heading Line Height */
        .hongo-wishlist-page table.table th { line-height: <?php echo sprintf( '%s', $hongo_wishlist_product_heading_line_height  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_heading_letter_spacing  ) : ?>
        /* Wishlist Product Heading Line Height */
        .hongo-wishlist-page table.table th { letter-spacing: <?php echo sprintf( '%s', $hongo_wishlist_product_heading_letter_spacing  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_heading_font_weight  ) : ?>
        /* Wishlist Product Heading Font weight */
        .hongo-wishlist-page table.table th { font-weight: <?php echo sprintf( '%s', $hongo_wishlist_product_heading_font_weight  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_heading_color  ) : ?>
        /* Wishlist Product Heading Color */
        .hongo-wishlist-page table.table th { color: <?php echo sprintf( '%s', $hongo_wishlist_product_heading_color  ); ?>; }
        <?php endif; ?>
        
        <?php if( $hongo_wishlist_product_heading_text_transform  ) : ?>
        /* Wishlist Product Heading Text Transform */
        .hongo-wishlist-page table.table th { text-transform: <?php echo sprintf( '%s', $hongo_wishlist_product_heading_text_transform  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_content_font_size  ) : ?>
        /* Wishlist product Content Font Size */
        .hongo-wishlist-page .woocommerce-Price-amount.amount ,.hongo-wishlist-page .wishlist-product-title,.hongo-wishlist-page .no-product-wishlist { font-size: <?php echo sprintf( '%s', $hongo_wishlist_product_content_font_size  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_content_line_height  ) : ?>
        /* Wishlist Product Content Line Height */
        .hongo-wishlist-page .woocommerce-Price-amount.amount ,.hongo-wishlist-page .wishlist-product-title,.hongo-wishlist-page .no-product-wishlist { line-height: <?php echo sprintf( '%s', $hongo_wishlist_product_content_line_height  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_content_letter_spacing  ) : ?>
        /* Wishlist Product Content Line Height */
        .hongo-wishlist-page .woocommerce-Price-amount.amount ,.hongo-wishlist-page .wishlist-product-title,.hongo-wishlist-page .no-product-wishlist { letter-spacing: <?php echo sprintf( '%s', $hongo_wishlist_product_content_letter_spacing  ); ?>; }
        <?php endif; ?>

         <?php if( $hongo_wishlist_product_content_font_weight  ) : ?>
        /* Wishlist Product Content Font weight */
        .hongo-wishlist-page .woocommerce-Price-amount.amount ,.hongo-wishlist-page .wishlist-product-title ,.hongo-wishlist-page .no-product-wishlist{ font-weight: <?php echo sprintf( '%s', $hongo_wishlist_product_content_font_weight  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_content_color  ) : ?>
        /* Wishlist Product Content Color */
        .hongo-wishlist-page .woocommerce-Price-amount.amount ,.hongo-wishlist-page .wishlist-product-title , .hongo-wishlist-page table.table td del ,.hongo-wishlist-page table.table td,.hongo-wishlist-page .no-product-wishlist{ color: <?php echo sprintf( '%s', $hongo_wishlist_product_content_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_content_hover_color  ) : ?>
        /* Wishlist Product Content Hover Color */
        .hongo-wishlist-page .wishlist-product-title:hover { color: <?php echo sprintf( '%s', $hongo_wishlist_product_content_hover_color  ); ?>; }
        <?php endif; ?>
        
        <?php if( $hongo_wishlist_product_content_text_transform  ) : ?>
        /* Wishlist Product Content Text Transform */
        .hongo-wishlist-page .wishlist-product-title { text-transform: <?php echo sprintf( '%s', $hongo_wishlist_product_content_text_transform  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_stock_font_size  ) : ?>
        /* Wishlist product Stock Font Size */
        .hongo-wishlist-page td .stock { font-size: <?php echo sprintf( '%s', $hongo_wishlist_product_stock_font_size  ).'!important'; ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_stock_line_height  ) : ?>
        /* Wishlist Product Stock Line Height */
        .hongo-wishlist-page td .stock { line-height: <?php echo sprintf( '%s', $hongo_wishlist_product_stock_line_height  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_stock_letter_spacing  ) : ?>
        /* Wishlist Product Stock Line Height */
        .hongo-wishlist-page td .stock { letter-spacing: <?php echo sprintf( '%s', $hongo_wishlist_product_stock_letter_spacing  ); ?>; }
        <?php endif; ?>

         <?php if( $hongo_wishlist_product_stock_font_weight  ) : ?>
        /* Wishlist Product Stock Font weight */
        .hongo-wishlist-page td .stock { font-weight: <?php echo sprintf( '%s', $hongo_wishlist_product_stock_font_weight  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_stock_text_transform  ) : ?>
        /* Wishlist Product Stock Text Transform */
        .hongo-wishlist-page td .stock { text-transform: <?php echo sprintf( '%s', $hongo_wishlist_product_stock_text_transform  ); ?>; }
        <?php endif; ?>

         <?php if( $hongo_wishlist_product_instock_color  ) : ?>
        /* Wishlist Product Intock Color */
        .hongo-wishlist-page .in-stock { color: <?php echo sprintf( '%s', $hongo_wishlist_product_instock_color  ); ?>;border: 1px solid <?php echo sprintf( '%s', $hongo_wishlist_product_instock_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_outstock_color  ) : ?>
        /* Wishlist Product Outstock Color */
        .hongo-wishlist-page .out-of-stock { color: <?php echo sprintf( '%s', $hongo_wishlist_product_outstock_color  ); ?>;border: 1px solid <?php echo sprintf( '%s', $hongo_wishlist_product_outstock_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_font_size  ) : ?>
        /* Wishlist product Button Font Size */
        .hongo-wishlist-page .button span ,.hongo-wishlist-page a.button i,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected ,.hongo-wishlist-page a.wc-backward{ font-size: <?php echo sprintf( '%s', $hongo_wishlist_product_button_font_size  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_line_height  ) : ?>
        /* Wishlist Product Button Line Height */
        .hongo-wishlist-page .button span ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected,.hongo-wishlist-page a.wc-backward { line-height: <?php echo sprintf( '%s', $hongo_wishlist_product_button_line_height  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_letter_spacing  ) : ?>
        /* Wishlist Product Button Line Height */
        .hongo-wishlist-page .button span ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected,.hongo-wishlist-page a.wc-backward { letter-spacing: <?php echo sprintf( '%s', $hongo_wishlist_product_button_letter_spacing  ); ?>; }
        <?php endif; ?>

         <?php if( $hongo_wishlist_product_button_font_weight  ) : ?>
        /* Wishlist Product Button Font weight */
        .hongo-wishlist-page .button span ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected,.hongo-wishlist-page a.wc-backward { font-weight: <?php echo sprintf( '%s', $hongo_wishlist_product_button_font_weight  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_text_transform  ) : ?>
        /* Wishlist Product Button Text Transform */
        .hongo-wishlist-page .button span ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected,.hongo-wishlist-page table.table .btn,.hongo-wishlist-page a.wc-backward { text-transform: <?php echo sprintf( '%s', $hongo_wishlist_product_button_text_transform  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_bg_color  ) : ?>
        /* Wishlist product Button Background Color */
        .hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected { background-color: <?php echo sprintf( '%s', $hongo_wishlist_product_button_bg_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_hover_bg_color  ) : ?>
        /* Wishlist product Button  Background Hover Color */
        .hongo-wishlist-page a.button:hover ,.hongo-wishlist-page .btn.hongo-empty-wishlist:hover ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected:hover { background-color: <?php echo sprintf( '%s', $hongo_wishlist_product_button_hover_bg_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_color  ) : ?>
        /* Wishlist product Button color */
        .hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected { color: <?php echo sprintf( '%s', $hongo_wishlist_product_button_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_hover_color  ) : ?>
        /* Wishlist product Button color */
        .hongo-wishlist-page a.button:hover ,.hongo-wishlist-page .btn.hongo-empty-wishlist:hover ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected:hover { color: <?php echo sprintf( '%s', $hongo_wishlist_product_button_hover_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_border_color  ) : ?>
        /* Wishlist product Button border color */
        .hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected { border-color:<?php echo sprintf( '%s', $hongo_wishlist_product_button_border_color  ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_wishlist_product_button_border_hover_color  ) : ?>
        /* Wishlist product Button border hover color */
        .hongo-wishlist-page a.button:hover ,.hongo-wishlist-page .btn.hongo-empty-wishlist:hover ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected:hover { border-color:<?php echo sprintf( '%s', $hongo_wishlist_product_button_border_hover_color  ); ?>; }
        <?php endif; ?>
    <?php
    }
}/* if WooCommerce plugin is activated */