<?php
/**
 * Map For Product Lists
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product List */
/*-----------------------------------------------------------------------------------*/

if( hongo_is_woocommerce_activated() ) {

    $taxonomy_params = array();

    $products_lists_show = array( 
        ''      => esc_html__( 'Select', 'hongo-addons'),
        'types' => esc_html__( 'Types', 'hongo-addons' )
    );

    $dependency_keys = array( 'types' );

    $args = array(
            'public'   => true,
            '_builtin' => false,
            'object_type' => array( 'product' )
        ); 
    $output = 'objects'; // or objects
    $custom_taxonomies = get_taxonomies( $args, $output );
    if ( ! empty( $custom_taxonomies ) ) {
        foreach ( $custom_taxonomies as $taxonomy_key => $custom_taxonomy ) {
            $option_label = isset( $custom_taxonomy->label ) ? $custom_taxonomy->label : $taxonomy_key;
            $option_key = ( $taxonomy_key == 'product_cat' ) ? 'category' : $taxonomy_key;
            $products_lists_show[$option_key] = $option_label;

            $taxonomy_data = hongo_product_taxonomy_array( $taxonomy_key,true );
            $taxonomy_params[] = array(
                'type'      => 'dropdown',
                'heading'   => $option_label,
                'param_name'=> 'hongo_products_lists_' . $option_key,
                'dependency'=> array( 
                                    'element'   => 'hongo_products_lists_show',
                                    'value'     => array( $option_key )
                                ),
                'value'     => array_flip( $taxonomy_data ),   
            );

            $dependency_keys[] = $option_key;
        }
    }

    $param = array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Product collection by', 'hongo-addons' ),
            'param_name' => 'hongo_products_lists_show',
            'value' => array_flip( $products_lists_show ),
            'admin_label' => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Product type', 'hongo-addons' ),
            'param_name' => 'hongo_product_lists_type',
            'admin_label' => true,
            'value' => array(
                esc_html__( 'Select', 'hongo-addons') => '',
                esc_html__( 'Recent products', 'hongo-addons' ) => 'recent_products',
                esc_html__( 'Featured products', 'hongo-addons' ) => 'featured_products',
                esc_html__( 'Sale products', 'hongo-addons' ) => 'sale_products',
                esc_html__( 'Best selling products', 'hongo-addons' ) => 'best_selling_products',
                esc_html__( 'Top rated products', 'hongo-addons' ) => 'top_rated_products',
                esc_html__( 'New products', 'hongo-addons' ) => 'new_products'
            ),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => array('types') ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Shop style', 'hongo-addons' ),
            'param_name' => 'hongo_shop_style',
            'admin_label' => true,
            'value' => array(
                esc_html__( 'Select', 'hongo-addons') => '',
                esc_html__( 'Classic', 'hongo-addons' ) => 'classic',
                esc_html__( 'Minimalist', 'hongo-addons' ) => 'minimalist',
                esc_html__( 'Metro', 'hongo-addons' ) => 'metro',
                esc_html__( 'Flat', 'hongo-addons' ) => 'flat',
                esc_html__( 'Modern', 'hongo-addons' ) => 'modern',
                esc_html__( 'Clean', 'hongo-addons' ) => 'clean',
                esc_html__( 'Masonry', 'hongo-addons' ) => 'masonry',
                esc_html__( 'Standard', 'hongo-addons' ) => 'standard',
                esc_html__( 'List', 'hongo-addons' ) => 'list',
                esc_html__( 'Simple', 'hongo-addons' ) => 'simple',
                esc_html__( 'Boxed', 'hongo-addons' ) => 'boxed',
                esc_html__( 'Default', 'hongo-addons' ) => 'default',
            ),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
        ),
        array(
            'type' => 'hongo_preview_image',
            'param_name' => 'hongo_shop_preview_image',
            'heading' => esc_html__( 'Select pre-made style', 'hongo-addons'),
        ),
        array(
            'type' => 'hongo_custom_switch_option',
            'heading' => esc_html__( 'Slider', 'hongo-addons'),
            'param_name' => 'hongo_enable_slider',
            'value' => array(
                esc_html__( 'Off', 'hongo-addons') => '0',
                esc_html__( 'On', 'hongo-addons') => '1'
            ),
            'dependency'  => array( 'element' => 'hongo_shop_style', 'value' => array('','default','gradient','classic','clean','flat','masonry','metro','modern','standard','simple','minimalist','boxed') ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
            'param_name' => 'hongo_image_srcset',
            'value'      => hongo_get_thumbnail_image_sizes(),
            'std'        => 'woocommerce_thumbnail',
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Metro', 'hongo-addons' ),
            'param_name' => 'hongo_enable_metro',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'std' => '1',
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_shop_style', 'value' => array('metro','modern') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Metro grid position', 'hongo-addons'),
            'param_name' => 'hongo_metro_position',
            'value'      => '',
            'description' => esc_html__( 'Please add grid position number with comma(,) separator. Like *,*,2-2,2-1,2-2,1-2','hongo-addons' ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'std' => '*,*,2-2,2-1,2-2,1-2',
            'dependency'  => array( 'element' => 'hongo_enable_metro', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Product image gallery slider', 'hongo-addons' ),
            'param_name' => 'hongo_enable_gallery_slider',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => 'default',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'No. of image gallery slide', 'hongo-addons'),
            'param_name' => 'hongo_gallery_slide',
            'value'      => '',
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'std' => '3',
            'dependency'  => array( 'element' => 'hongo_enable_gallery_slider', 'value' => array('default','1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),                
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Product countdown deal', 'hongo-addons' ),
            'param_name' => 'hongo_enable_deal',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => 'default',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Sale box', 'hongo-addons' ),
            'param_name' => 'hongo_enable_sale_box',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'New box', 'hongo-addons' ),
            'param_name' => 'hongo_enable_new_box',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Rating', 'hongo-addons' ),
            'param_name' => 'hongo_enable_star_rating',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Alternate image on hover', 'hongo-addons' ),
            'param_name' => 'hongo_enable_alternate_image',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Overlay', 'hongo-addons' ),
            'param_name' => 'hongo_enable_overlay',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_shop_style', 'value' => array( 'clean','flat','metro','masonry' ) ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Add to cart', 'hongo-addons' ),
            'param_name' => 'hongo_enable_add_to_cart',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Blur effect', 'hongo-addons' ),
            'param_name' => 'hongo_enable_blur_effect',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'description' => esc_html__( 'Only use for shop clean style', 'hongo-addons' ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Quick view', 'hongo-addons' ),
            'param_name' => 'hongo_enable_quick_view',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Wishlist', 'hongo-addons' ),
            'param_name' => 'hongo_enable_wishlist',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Compare', 'hongo-addons' ),
            'param_name' => 'hongo_enable_compare',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Short description', 'hongo-addons' ),
            'param_name' => 'hongo_enable_short_desc',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_shop_style', 'value' => array('list') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Pagination', 'hongo-addons' ),
            'param_name' => 'hongo_enable_shop_pagination',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'On', 'hongo-addons' ) => '1',
                esc_html__( 'Off', 'hongo-addons' ) => '0',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('0') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Shop pagination type', 'hongo-addons' ),
            'param_name' => 'hongo_shop_pagination_style',
            'value' => array(                        
                esc_html__( 'Pagination', 'hongo-addons' ) => 'pagination',
                esc_html__( 'Infinite', 'hongo-addons' ) => 'infinite',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_enable_shop_pagination', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Products per page', 'hongo-addons'),
            'param_name' => 'hongo_per_page',
            'value'      => '',
            'std'        => '4',
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),                
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'No. of columns', 'hongo-addons' ),
            'param_name' => 'hongo_column',
            'std' => '4',
            'value' => array( 
                esc_html__( 'Select', 'hongo-addons' ) => '',
                esc_html__( '1 columns', 'hongo-addons' ) => '1',
                esc_html__( '2 columns', 'hongo-addons' ) => '2',
                esc_html__( '3 columns', 'hongo-addons' ) => '3',
                esc_html__( '4 columns', 'hongo-addons' ) => '4',
                esc_html__( '5 columns', 'hongo-addons' ) => '5',
                esc_html__( '6 columns', 'hongo-addons' ) => '6',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'No. of columns in mobile', 'hongo-addons' ),
            'param_name' => 'hongo_mobile_column',
            'std' => '4',
            'value' => array( 
                esc_html__( 'Default', 'hongo-addons' ) => '',
                esc_html__( '1 columns', 'hongo-addons' ) => '1',
                esc_html__( '2 columns', 'hongo-addons' ) => '2',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Spacing between products', 'hongo-addons' ),
            'param_name' => 'hongo_gutter_type',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'Gutter none', 'hongo-addons') => 'gutter-none',
                esc_html__( 'Gutter very small', 'hongo-addons') => 'gutter-very-small',
                esc_html__( 'Gutter small', 'hongo-addons') => 'gutter-small',
                esc_html__( 'Gutter medium', 'hongo-addons') => 'gutter-medium',
                esc_html__( 'Gutter large', 'hongo-addons') => 'gutter-large',
                esc_html__( 'Gutter extra large', 'hongo-addons') => 'gutter-extra-large',
            ),
            'std' => 'gutter-medium',
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order by', 'hongo-addons' ),
            'param_name' => 'hongo_orderby',
            'value' => array(
                esc_html__( 'Select', 'hongo-addons') => '',
                esc_html__( 'Date', 'hongo-addons' ) => 'date',
                esc_html__( 'ID', 'hongo-addons' ) => 'ID',
                esc_html__( 'Author', 'hongo-addons' ) => 'author',
                esc_html__( 'Title', 'hongo-addons' ) => 'title',
                esc_html__( 'Modified', 'hongo-addons' ) => 'modified',
                esc_html__( 'Random', 'hongo-addons' ) => 'rand',
                esc_html__( 'Comment count', 'hongo-addons' ) => 'comment_count',
                esc_html__( 'Menu order', 'hongo-addons' ) => 'menu_order',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Order', 'hongo-addons' ),
            'param_name' => 'hongo_sortby',
            'value' => array(
                esc_html__( 'Select', 'hongo-addons') => '',
                esc_html__( 'Descending', 'hongo-addons' ) => 'DESC',
                esc_html__( 'Ascending', 'hongo-addons' ) => 'ASC',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_products_lists_show', 'value' => $dependency_keys ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Content alignment', 'hongo-addons' ),
            'param_name' => 'hongo_content_alignment',
            'value' => array(
                esc_html__( 'Default', 'hongo-addons') => '',
                esc_html__( 'Left', 'hongo-addons' ) => 'left',
                esc_html__( 'Center', 'hongo-addons' ) => 'center',
                esc_html__( 'Right', 'hongo-addons' ) => 'right',
            ),
            'group' => esc_html__( 'Settings', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_shop_style', 'value' => array( 'default', 'minimalist', 'classic', 'masonry', 'standard' ) ),
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
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
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
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
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
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),                    
        ),
        array(
            'type'          => 'hongo_custom_switch_option',
            'heading'       => esc_html__( 'Loop', 'hongo-addons'),
            'param_name'    => 'hongo_enable_loop',
            'value'         => array(
                esc_html__( 'Off', 'hongo-addons') => '0',
                esc_html__( 'On', 'hongo-addons') => '1'
            ),
            'group'         => esc_html__('Slider Configuration', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type'          => 'hongo_custom_switch_option',
            'heading'       => esc_html__( 'Autoplay', 'hongo-addons'),
            'param_name'    => 'hongo_enable_autoplay',
            'value'         => array(
                esc_html__( 'Off', 'hongo-addons') => '0',
                esc_html__( 'On', 'hongo-addons') => '1'
            ),
            'group'         =>esc_html__('Slider Configuration', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Slide delay', 'hongo-addons'),
            'param_name'    => 'slidedelay',
            'group'         => esc_html__('Slider Configuration', 'hongo-addons'),
            'dependency'    => array( 'element' => 'hongo_enable_autoplay', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'hongo_custom_switch_option',
            'heading' => esc_html__( 'Pagination', 'hongo-addons'),
            'param_name' => 'show_pagination',
            'value' => array(
                esc_html__( 'Off', 'hongo-addons') => '0',
                esc_html__( 'On', 'hongo-addons') => '1'
            ),
            'group'         => esc_html__('Slider Configuration','hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
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
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ), 
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Pagination color', 'hongo-addons' ),
            'param_name' => 'pagination_color',
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
            'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Active pagination color', 'hongo-addons' ),
            'param_name' => 'active_pagination_color',
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
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
            'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            'description' => esc_html__( 'Select ON to show navigation in slider', 'hongo-addons' ),
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Navigation color', 'hongo-addons' ),
            'param_name' => 'navigation_color',
            'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            'dependency'  => array( 'element' => 'hongo_show_navigation', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),  
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Cursor color style', 'hongo-addons'),
            'param_name' => 'show_cursor_color_style',
            'admin_label' => true,
            'value' => array(
                esc_html__( 'Select', 'hongo-addons') => '',
                esc_html__( 'White cursor', 'hongo-addons') => 'white-move',
                esc_html__( 'Black cursor', 'hongo-addons') => 'black-move',
                esc_html__( 'Default cursor', 'hongo-addons') => 'cursor-default',
                ),
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
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
            'dependency'  => array( 'element' => 'hongo_enable_slider', 'value' => array('1') ),
            'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
        ),
        $hongo_vc_extra_id,
        $hongo_vc_extra_class,
    );

    array_splice( $param, 2, 0, $taxonomy_params );

    vc_map( array(
            'name'          => esc_html__( 'Product List', 'hongo-addons' ), 
            'base'          => 'hongo_product_lists', 
            'description'   => esc_html__( 'Different types of products list', 'hongo-addons' ), 
            'icon'          => 'hongo-shortcode-icon fa-solid fa-th',
            'category'      => 'Hongo',
            'params'        => $param,
        )
    );
}
