<?php
/**
 * Shortcode Map For Product Slider
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product Slider */
/*-----------------------------------------------------------------------------------*/

$multiple_select_products = hongo_product_list_array();
$single_select_products = hongo_product_list_array( true );
vc_map( 
    array(
        'name' => esc_html__( 'Product Slider', 'hongo-addons' ),
        'base' => 'hongo_product_slider',
        'description' => esc_html__( 'Product block slider', 'hongo-addons' ),
        'icon' => 'fa-solid fa-arrows-alt-h hongo-shortcode-icon',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons'),
                'param_name' => 'hongo_product_slider_style',
                'admin_label' => true,
                'value' => array( 
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons') => 'product-slider-style-1',
                    esc_html__( 'Style 2', 'hongo-addons') => 'product-slider-style-2',
                    esc_html__( 'Style 3', 'hongo-addons') => 'product-slider-style-3',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style for product slider', 'hongo-addons'),
                'param_name' => 'hongo_product_slider_preview_image',
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'hongo_product_slides',
                'heading' => esc_html__( 'Slide', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'hongo-addons' ),
                        'param_name' => 'hongo_image',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                        'param_name' => 'hongo_image_srcset',
                        'value' => hongo_get_thumbnail_image_sizes(),
                        'std' => 'full',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Select product', 'hongo-addons' ),
                        'admin_label' => true,
                        'param_name' => 'hongo_single_products',
                        'value'     => array_flip( $single_select_products )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Product content display position', 'hongo-addons' ),
                        'param_name' => 'slider_product_position',
                        'value' => array( 
                            esc_html__( 'Left', 'hongo-addons' ) => 'left-side-product',
                            esc_html__( 'Right', 'hongo-addons') => 'right-side-product',
                        ),
                    ),
                ),
                'group'       => esc_html__( 'Slides', 'hongo-addons'),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-3' ) 
                ),
            ),
            array(
                'type' => 'hongo_multiple_select_dropdown',
                'heading' => esc_html__( 'Select products', 'hongo-addons' ),
                'param_name' => 'hongo_multiple_products',
                'admin_label' => true,
                'group'     => esc_html__( 'Slides', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2' ) ),
                'value'     => $multiple_select_products
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Product image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_shop_product_image_srcset',
                'value' => hongo_get_thumbnail_image_sizes(),
                'std' => 'full',
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Product title', 'hongo-addons'),
                'param_name' => 'show_product_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Product title in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array('product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3') ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Price', 'hongo-addons'),
                'param_name' => 'show_product_price',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Price in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Customer rating', 'hongo-addons'),
                'param_name' => 'show_product_rating',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Customer Rating in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Sale & New flash', 'hongo-addons'),
                'param_name' => 'show_product_sale_new_flash',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Sale & New flash in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Add to cart', 'hongo-addons'),
                'param_name' => 'show_product_add_to_cart',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Add to cart button in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Quick view', 'hongo-addons'),
                'param_name' => 'show_product_quick_view',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Quick view button in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Compare', 'hongo-addons'),
                'param_name' => 'show_product_compare',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Compare button in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Wishlist', 'hongo-addons'),
                'param_name' => 'show_product_wishlist',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show Wishlist button in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Product Settings', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Customer rating color', 'hongo-addons' ),
                'param_name' => 'custom_rating_color',
                'dependency' => array( 'element' => 'show_product_rating', 'value' => array( '1' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Pagination', 'hongo-addons'),
                'param_name' => 'show_pagination',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show pagination in slider', 'hongo-addons' ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Pagination style', 'hongo-addons'),
                'param_name' => 'show_pagination_style',
                'admin_label' => true,
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Dot style', 'hongo-addons') => 'swiper-pagination-dots',
                    esc_html__( 'Line style', 'hongo-addons') => 'swiper-pagination-square',
                    esc_html__( 'Dot border style', 'hongo-addons') => 'swiper-pagination-border',
                ),
                'dependency' => array( 'element' => 'show_pagination', 'value' => array( '1' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Pagination color', 'hongo-addons' ),
                'param_name' => 'pagination_color',
                'dependency' => array( 'element' => 'show_pagination', 'value' => array( '1' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Active pagination color', 'hongo-addons' ),
                'param_name' => 'active_pagination_color',
                'dependency' => array( 'element' => 'show_pagination', 'value' => array( '1' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'heading' => esc_html__( 'Navigation', 'hongo-addons' ),
                'param_name' => 'hongo_show_navigation',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show navigation in slider', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Navigation color', 'hongo-addons' ),
                'param_name' => 'navigation_color',
                'dependency' => array( 'element' => 'hongo_show_navigation', 'value' => array( '1' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Navigation background color', 'hongo-addons' ),
                'param_name' => 'navigation_bg_color',
                'dependency' => array( 'element' => 'hongo_show_navigation', 'value' => array( '1' ) ),
                'description' => esc_html__( 'Use only for style 1', 'hongo-addons' ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'heading' => esc_html__( 'Number navigation', 'hongo-addons' ),
                'param_name' => 'hongo_show_number_navigation',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show number navigation in slider', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'heading' => esc_html__( 'Mousewheel control', 'hongo-addons'),
                'param_name' => 'hongo_mousewheel_control',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to enables navigation through slides using mouse wheel', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Cursor color style', 'hongo-addons'),
                'param_name' => 'show_cursor_color_style',
                'admin_label' => true,
                'value' => array(
                    esc_html__( 'White cursor', 'hongo-addons') => 'white-move',
                    esc_html__( 'Black cursor', 'hongo-addons') => 'black-move',
                    esc_html__( 'Default cursor', 'hongo-addons') => 'cursor-default',
                    ),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2', 'product-slider-style-3' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Transition speed', 'hongo-addons'),
                'param_name' => 'hongo_slidespeed',
                'admin_label' => true,
                'value' => '',
                'description' => esc_html__( 'Enter slide speed time like 500, where 1000 = 1 second', 'hongo-addons'),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-1', 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Autoplay', 'hongo-addons'),
                'param_name' => 'autoplay',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                'std' => '1',
                'description' => esc_html__( 'Select On to autoplay slider', 'hongo-addons' ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slide delay', 'hongo-addons'),
                'param_name' => 'slidedelay',
                'admin_label' => true,
                'value' => '',
                'description' => esc_html__( 'Enter delay time (before switching to other slide) like 500, where 1000 = 1 second', 'hongo-addons'),
                'dependency'  => array( 'element' => 'autoplay', 'value' => array( '1' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Loop', 'hongo-addons'),
                'param_name' => 'autoloop',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Space between gap', 'hongo-addons'),
                'param_name' => 'hongo_space_between_gap',
                'std' => '30',
                'description' => esc_html__( 'Enter gap value in numeric value like 10', 'hongo-addons'),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2', 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Centered Slides', 'hongo-addons'),
                'param_name' => 'centered_slides',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                'std' => '1',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-3' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in desktop', 'hongo-addons'),
                'param_name' => 'slides_per_view_desktop',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( '1', 'hongo-addons') => '1',
                    esc_html__( '2', 'hongo-addons') => '2',
                    esc_html__( '3', 'hongo-addons') => '3',
                    esc_html__( '4', 'hongo-addons') => '4',
                    esc_html__( '5', 'hongo-addons') => '5',
                    esc_html__( '6', 'hongo-addons') => '6',
                    ),
                'std' => '3',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in mini desktop', 'hongo-addons'),
                'param_name' => 'slides_per_view_mini_desktop',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( '1', 'hongo-addons') => '1',
                    esc_html__( '2', 'hongo-addons') => '2',
                    esc_html__( '3', 'hongo-addons') => '3',
                    esc_html__( '4', 'hongo-addons') => '4',
                    esc_html__( '5', 'hongo-addons') => '5',
                    esc_html__( '6', 'hongo-addons') => '6',
                    ),
                'std' => '3',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in tablet', 'hongo-addons'),
                'param_name' => 'slides_per_view_tablet',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( '1', 'hongo-addons') => '1',
                    esc_html__( '2', 'hongo-addons') => '2',
                    esc_html__( '3', 'hongo-addons') => '3',
                    esc_html__( '4', 'hongo-addons') => '4',
                    esc_html__( '5', 'hongo-addons') => '5',
                    esc_html__( '6', 'hongo-addons') => '6',
                    ),
                'std' => '2',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in mobile', 'hongo-addons'),
                'param_name' => 'slides_per_view_mobile',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( '1', 'hongo-addons') => '1',
                    esc_html__( '2', 'hongo-addons') => '2',
                    esc_html__( '3', 'hongo-addons') => '3',
                    esc_html__( '4', 'hongo-addons') => '4',
                    esc_html__( '5', 'hongo-addons') => '5',
                    esc_html__( '6', 'hongo-addons') => '6',
                    ),
                'std' => '1',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency' => array( 'element' => 'hongo_product_slider_style', 'value' => array( 'product-slider-style-2' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'dependency'  => array( 'element' => 'show_product_title', 'value' => array( '1' ) ),    
                'hide_element_keys' => array( 'text-align' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'product_title_heading_tag',
                'value' => $hongo_element_tag,
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'dependency' => array( 'element' => 'show_product_title', 'value' => array( '1' ) ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons' ),
                'param_name' => 'additional_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '0',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'show_product_title', 'value' => array( '1' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_number_navigation_setting',
                'heading'     => esc_html__( 'Number navigation typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'hide_element_keys' => array( 'text-hover-color', 'text-align', 'font-transform' ),
                'dependency' => array( 'element' => 'hongo_show_number_navigation', 'value' => array( '1' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_price_setting',
                'heading'     => esc_html__( 'Price typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'hide_element_keys' => array( 'text-hover-color', 'font-transform', 'text-align' ),
                'dependency'  => array( 'element' => 'show_product_price', 'value' => array( '1' ) ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Element ID', 'hongo-addons' ),
                'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %s).', 'hongo-addons' ), '<a target="_blank" href="https://www.w3schools.com/tags/att_global_id.asp">w3c specification</a>'),
                'param_name'  => 'hongo_slider_id',
                'group'       => esc_html__( 'Extras', 'hongo-addons' )
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'hongo-addons' ),
                'description' => esc_html__( 'Add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2". You can write css code using this class and add it in customizer or your child theme css file.', 'hongo-addons' ),
                'param_name'  => 'hongo_slider_class',
                'group'       => esc_html__( 'Extras', 'hongo-addons' )
            ),
        ),
    )
);