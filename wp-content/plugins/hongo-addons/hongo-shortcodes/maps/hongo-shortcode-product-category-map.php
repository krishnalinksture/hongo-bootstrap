<?php
/**
 * Shortcode Map For Product of Category
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product of Category */
/*-----------------------------------------------------------------------------------*/
   
$product_categories_data = hongo_product_taxonomy_array();
vc_map(
    array(
        'name'     => esc_html__( 'Category List', 'hongo-addons' ),
        'base'     => 'hongo_product_catagory',
        'icon'     => 'fa-solid fa-layer-group hongo-shortcode-icon',
        'description' => esc_html__( 'Category blocks listing', 'hongo-addons' ),
        'category' => 'Hongo',
        'params'   => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Select style', 'hongo-addons'),
                'param_name'  => 'hongo_category_style',
                'admin_label' => true,
                'value'       => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons') => 'category-style-1',
                    esc_html__( 'Style 2', 'hongo-addons') => 'category-style-2',
                    esc_html__( 'Style 3', 'hongo-addons') => 'category-style-3',
                    esc_html__( 'Style 4', 'hongo-addons') => 'category-style-4',
                    esc_html__( 'Style 5', 'hongo-addons') => 'category-style-5',
                    esc_html__( 'Style 6', 'hongo-addons') => 'category-style-6',
                    esc_html__( 'Style 7', 'hongo-addons') => 'category-style-7',
                    esc_html__( 'Style 8', 'hongo-addons') => 'category-style-8',
                    esc_html__( 'Style 9', 'hongo-addons') => 'category-style-9',
                    esc_html__( 'Style 10', 'hongo-addons') => 'category-style-10',
                    esc_html__( 'Style 11', 'hongo-addons') => 'category-style-11',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style for category style', 'hongo-addons' ),
                'param_name' => 'hongo_category_preview_images',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('No. of columns', 'hongo-addons'),
                'param_name' => 'hongo_grid_column',
                'std' => '4',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('1 column', 'hongo-addons') => '1',
                    esc_html__('2 columns', 'hongo-addons') => '2',
                    esc_html__('3 columns', 'hongo-addons') => '3',
                    esc_html__('4 columns', 'hongo-addons') => '4',
                    esc_html__('5 columns', 'hongo-addons') => '5',
                    esc_html__('6 columns', 'hongo-addons') => '6',
                ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9','category-style-10' ) ),
            ),
            array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => esc_html__( 'Spacing between columns', 'hongo-addons'),
                'param_name' => 'hongo_grid_gutter_type',
                'value' => array(
                    esc_html__( 'Gutter none', 'hongo-addons') => 'gutter-none',
                    esc_html__( 'Gutter very small', 'hongo-addons') => 'gutter-very-small',
                    esc_html__( 'Gutter small', 'hongo-addons') => 'gutter-small',
                    esc_html__( 'Gutter medium', 'hongo-addons') => 'gutter-medium',
                    esc_html__( 'Gutter large', 'hongo-addons') => 'gutter-large',
                    esc_html__( 'Gutter extra large', 'hongo-addons') => 'gutter-extra-large',
                ),
                'std' => 'gutter-medium',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-9','category-style-10','category-style-11') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Metro layout', 'hongo-addons'),
                'param_name' => 'hongo_grid_show_metro',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-9','category-style-10') ),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'heading' => esc_html__( 'Metro grid positions', 'hongo-addons'),
                'param_name' => 'hongo_double_grid_position',
                'description' => esc_html__( 'Please add grid position number with comma(,) separator. Like *,*,2-2,2-1,2-2,1-2', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_grid_show_metro', 'value' => array('1') ),
            ),
            array(
                'type'        => 'hongo_multiple_select_dropdown',
                'heading'     => esc_html__( 'Categories', 'hongo-addons'),
                'param_name'  => 'hongo_categories_list',
                'value'       => $product_categories_data,
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__('No. of columns', 'hongo-addons'),
                'param_name'  => 'hongo_category_column',
                'value'       => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Column 1', 'hongo-addons') => 'column-1',
                    esc_html__('Column 2', 'hongo-addons') => 'column-2',
                    esc_html__('Column 3', 'hongo-addons') => 'column-3',
                    esc_html__('Column 4', 'hongo-addons') => 'column-4',
                    esc_html__('Column 5', 'hongo-addons') => 'column-5',
                    esc_html__('Column 6', 'hongo-addons') => 'column-6',
                ),
                'std'           => 'column-4',
               'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type'          => 'hongo_custom_switch_option',
                'class'         => '',
                'heading'       => esc_html__( 'Product count', 'hongo-addons'),
                'param_name'    => 'hongo_enable_count',
                'value'         => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-2','category-style-6','category-style-8') ),
                'description'    => esc_html__( 'Select ON to show count in category', 'hongo-addons' ),
            ),
            array(
                'type'         => 'dropdown',
                'heading'      => esc_html__( 'Categories order by', 'hongo-addons' ),
                'param_name'   => 'hongo_orderby',
                'value'        => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Date', 'hongo-addons' ) => 'date',
                    esc_html__( 'ID', 'hongo-addons' ) => 'ID',
                    esc_html__( 'Author', 'hongo-addons' ) => 'author',
                    esc_html__( 'Title', 'hongo-addons' ) => 'name',
                    esc_html__( 'Modified', 'hongo-addons' ) => 'modified',
                    esc_html__( 'Random', 'hongo-addons' ) => 'rand',
                    esc_html__( 'Comment count', 'hongo-addons' ) => 'comment_count',
                    esc_html__( 'Menu order', 'hongo-addons' ) => 'menu_order',
                ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type'         => 'dropdown',
                'heading'      => esc_html__( 'Categories sort by', 'hongo-addons' ),
                'param_name'   => 'hongo_order',
                'std'          => 'ASC',
                'value'        => array(
                    esc_html__( 'Select by', 'hongo-addons') => '',
                    esc_html__( 'Descending', 'hongo-addons' ) => 'DESC',
                    esc_html__( 'Ascending', 'hongo-addons' ) => 'ASC',
                ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type'         => 'dropdown',
                'heading'      => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name'   => 'hongo_image_srcset',
                'value'        => hongo_get_thumbnail_image_sizes(),
                'std'          => 'full',
                'dependency'   => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type'         => 'hongo_custom_switch_option',
                'heading'      => esc_html__( 'Button', 'hongo-addons'),
                'param_name'   => 'hongo_enable_button',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'    => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-3','category-style-4','category-style-6' ) ),
                'description'  => esc_html__( 'Select ON to show button in category', 'hongo-addons' ),
            ),
            array(
                'type'         => 'textfield',
                'heading'      => esc_html__( 'Button text', 'hongo-addons'),
                'param_name'   => 'hongo_category_button',
                'std'          => esc_html__( 'View Product', 'hongo-addons'),
                'dependency'   => array( 'element' => 'hongo_enable_button', 'value' => array('1') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'class' => '',
                'heading' => esc_html__( 'Button icon', 'hongo-addons'),
                'param_name' => 'hongo_enable_icon',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'   => array( 'element' => 'hongo_enable_button', 'value' => array('1') ),
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon size', 'hongo-addons'),
                'param_name' => 'hongo_icon_type',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Extra large', 'hongo-addons') => 'icon-extra-large',
                    esc_html__('Large', 'hongo-addons') => 'icon-large',
                    esc_html__('Extra medium', 'hongo-addons') => 'icon-extra-medium',
                    esc_html__('Medium', 'hongo-addons') => 'icon-medium',
                    esc_html__('Extra small', 'hongo-addons') => 'icon-extra-small',
                    esc_html__('Small', 'hongo-addons') => 'icon-small',
                    esc_html__('Very small', 'hongo-addons') => 'icon-very-small',
                ),
                'dependency'   => array( 'element' => 'hongo_enable_icon', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon position', 'hongo-addons'),
                'param_name' => 'hongo_icon_position',
                'value' => array(
                    esc_html__('Left', 'hongo-addons') => 'left',
                    esc_html__('Right', 'hongo-addons') => 'right',
                ),
                'std' => 'left',
                'dependency'   => array( 'element' => 'hongo_enable_icon', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6'
            ),
            array(
                'type' => 'hongo_icon',
                'heading' => esc_html__('Font icon', 'hongo-addons'),
                'param_name' => 'hongo_button_icon',
                'admin_label' => true,
                'dependency'   => array( 'element' => 'hongo_enable_icon', 'value' => array('1') ),
            ),
            array(
                'type'         => 'hongo_custom_switch_option',
                'heading'      => esc_html__( 'Image link', 'hongo-addons'),
                'param_name'   => 'hongo_image_link',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation', 'hongo-addons' ),
                'param_name' => 'hongo_animation_style',
                'value' => '',
                'settings' => array(
                    'type' => array(
                        'in',
                        'other',
                    ),
                ),
                //'std' => 'fadeInUp',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-9','category-style-10','category-style-11' ) ),
                'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation delay', 'hongo-addons' ),
                'param_name' => 'hongo_animation_delay',
                'dependency' => array( 'element' => 'hongo_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation delay in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
                //'std' => '200',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation duration', 'hongo-addons' ),
                'param_name' => 'hongo_animation_duration',
                'dependency' => array( 'element' => 'hongo_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation duration in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'param_name' => 'hongo_product_category_grid_slides', // all params must have a unique name
                'type' => 'param_group', // this param type
                'heading' => esc_html__( 'Grid', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Category', 'hongo-addons'),
                        'param_name'  => 'hongo_categories',
                        'value'       => array_flip( $product_categories_data ),
                        'admin_label' => true,
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                        'param_name' => 'hongo_image_srcset',
                        'value' => hongo_get_thumbnail_image_sizes(),
                        'std' => 'full',
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type' => 'hongo_custom_switch_option',
                        'class' => '',
                        'heading' => esc_html__( 'Image link', 'hongo-addons'),
                        'param_name' => 'hongo_show_image_link',
                        'value' => array(
                            esc_html__( 'Off', 'hongo-addons') => '0', 
                            esc_html__( 'On', 'hongo-addons') => '1'
                        ),
                        'std' => '0',
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__( 'Text horizontal alignment', 'hongo-addons'),
                        'param_name' => 'hongo_show_text_detail_horizontal',
                        'value' => array(
                            esc_html__( 'Left', 'hongo-addons') => 'left', 
                            esc_html__( 'Center', 'hongo-addons') => 'center',
                            esc_html__( 'Right', 'hongo-addons') => 'right'
                        ),
                        'std' => 'left',
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__( 'Text vertical alignment', 'hongo-addons'),
                        'param_name' => 'hongo_show_text_detail_vertical',
                        'value' => array(
                            esc_html__( 'Top', 'hongo-addons') => 'top', 
                            esc_html__( 'Middle', 'hongo-addons') => 'middle',
                            esc_html__( 'Bottom', 'hongo-addons') => 'bottom'
                        ),
                        'std' => 'top',
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type'          => 'hongo_custom_switch_option',
                        'class'         => '',
                        'heading'       => esc_html__( 'Product count', 'hongo-addons'),
                        'param_name'    => 'hongo_enable_count_product',
                        'value'         => array(
                            esc_html__( 'Off', 'hongo-addons') => '0',
                            esc_html__( 'On', 'hongo-addons') => '1'
                        ),
                        'std' => '1',
                        'description'    => esc_html__( 'Use only for style 9', 'hongo-addons' ),
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type'         => 'textfield',
                        'heading'      => esc_html__('Bottom text', 'hongo-addons'),
                        'param_name'   => 'bottom_text',
                        'edit_field_class' => 'vc_col-sm-6',
                        'description'   => esc_html__( 'Use only for style 9', 'hongo-addons' )
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Button configuration', 'hongo-addons' ),
                        'param_name'  => 'hongo_button_text',                        
                        'description'    => esc_html__( 'Use only for style 9', 'hongo-addons' ),
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'group' => esc_html__( 'Categories', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-9','category-style-10') ),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Hover box background color', 'hongo-addons' ),
                'param_name'   => 'hongo_button_box_bg_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-6') ),
                'group'        => esc_html__('Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Title background color', 'hongo-addons'),
                'param_name'   => 'hongo_title_bg_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-5', 'category-style-10' ) ),
                'group'        => esc_html__('Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Title hover background color', 'hongo-addons'),
                'param_name'   => 'hongo_title_hover_bg_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1', 'category-style-5', 'category-style-7', 'category-style-9', 'category-style-10') ),
                'group'        => esc_html__('Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Separator color', 'hongo-addons'),
                'param_name'   => 'hongo_separator_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-5' ) ),
                'group'        => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Hover separator color', 'hongo-addons' ),
                'param_name'   => 'hongo_separator_hover_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-5' ) ),
                'group'        => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Button hover background color', 'hongo-addons'),
                'param_name'   => 'hongo_button_hover_bg_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9' ) ),
                'group'        => esc_html__('Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Count hover background color', 'hongo-addons'),
                'param_name'   => 'hongo_count_hover_bg_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9' ) ),
                'group'        => esc_html__('Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Count background color', 'hongo-addons'),
                'param_name'   => 'hongo_count_background_color',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-2' ) ),
                'group'        => esc_html__('Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'hongo_custom_switch_option',
                'heading'      => esc_html__( 'Box hover image overlay', 'hongo-addons'),
                'param_name'   => 'hongo_background_hover_effect',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-7', 'category-style-10' ) ),
                'group'          => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Image effect on hover', 'hongo-addons' ),
                'param_name' => 'hongo_enable_image_zoom_effect',
                'value' => array(
                            esc_html__( 'Off', 'hongo-addons' ) => '0', 
                            esc_html__( 'On', 'hongo-addons' ) => '1'
                        ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-1', 'category-style-2', 'category-style-4', 'category-style-5', 'category-style-6', 'category-style-9' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Box border', 'hongo-addons' ),
                'param_name' => 'hongo_box_border',
                'value' => array(
                            esc_html__( 'Off', 'hongo-addons' ) => '0', 
                            esc_html__( 'On', 'hongo-addons' ) => '1'
                        ),
                'std' => '0',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Box border color', 'hongo-addons'),
                'param_name'   => 'hongo_box_border_color',
                'dependency'  => array( 'element' => 'hongo_box_border', 'value' => array( '1' ) ),
                'edit_field_class' => 'vc_col-sm-6',
                'group'        => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'textfield',
                'heading'      => esc_html__('Box border width', 'hongo-addons'),
                'param_name'   => 'hongo_box_border_width',
                'dependency'   => array( 'element' => 'hongo_box_border', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group'        => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type'         => 'hongo_custom_switch_option',
                'heading'      => esc_html__( 'Overlay / Background hover', 'hongo-addons'),
                'param_name'   => 'hongo_enable_overlay',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-2', 'category-style-3', 'category-style-4', 'category-style-5', 'category-style-6') ),
                'group'          => esc_html__('Overlay', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Overlay color', 'hongo-addons'),
                'param_name'   => 'hongo_overlay_color',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'   => array( 'element' => 'hongo_enable_overlay', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group'        => esc_html__('Overlay', 'hongo-addons'),
            ),
            array(
                'type'         => 'colorpicker',
                'heading'      => esc_html__( 'Overlay gradient color', 'hongo-addons'),
                'param_name'   => 'hongo_overlay_gradient_color',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'   => array( 'element' => 'hongo_enable_overlay', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group'        => esc_html__('Overlay', 'hongo-addons'),
            ),
            array(
                'type'         => 'dropdown',
                'heading'      => esc_html__('Opacity', 'hongo-addons'),
                'param_name'   => 'hongo_opacity',
                'dependency'   => array( 'element' => 'hongo_enable_overlay', 'value' => array('1') ),
                'std'          =>'0.7',
                'value'       => array(
                    esc_html__('No opacity', 'hongo-addons') => 0,
                    esc_html__('0.1', 'hongo-addons') => '0.1',
                    esc_html__('0.2', 'hongo-addons') => '0.2',
                    esc_html__('0.3', 'hongo-addons') => '0.3',
                    esc_html__('0.4', 'hongo-addons') => '0.4',
                    esc_html__('0.5', 'hongo-addons') => '0.5',
                    esc_html__('0.6', 'hongo-addons') => '0.6',
                    esc_html__('0.7', 'hongo-addons') => '0.7',
                    esc_html__('0.8', 'hongo-addons') => '0.8',
                    esc_html__('0.9', 'hongo-addons') => '0.9',
                    esc_html__('1', 'hongo-addons') => '1',
                 ),
                'edit_field_class' => 'vc_col-sm-6',
                'group'        => esc_html__('Overlay', 'hongo-addons'),
            ),
            array(
                'type'         => 'textfield',
                'heading'      => esc_html__('Z-index', 'hongo-addons'),
                'param_name'   => 'hongo_zindex',
                'dependency'   => array( 'element' => 'hongo_enable_overlay', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group'        => esc_html__('Overlay', 'hongo-addons'),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'group'        => esc_html__('Typography', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-11') ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_grid_font_title_setting',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'group'        => esc_html__('Typography', 'hongo-addons'),
                'hide_element_keys' => array( 'text-align' ),
                'dependency'  => array( 'element' => 'hongo_category_style', 'value' => array('category-style-9','category-style-10') ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Category title element tag', 'hongo-addons'),
                'param_name' => 'category_title_heading_tag',
                'value' => $hongo_element_tag,
                'group'        => esc_html__('Typography', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'dependency'   => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-9','category-style-10','category-style-11') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for category title', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'group'        => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency'   => array( 'element' => 'hongo_category_style', 'value' => array('category-style-1','category-style-2','category-style-3','category-style-4','category-style-5','category-style-6','category-style-7','category-style-8','category-style-9','category-style-10','category-style-11') ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_count_setting',
                'heading'     => esc_html__( 'Count typography', 'hongo-addons' ),
                'group'        => esc_html__('Typography', 'hongo-addons'),
                'hide_element_keys' => array( 'text-hover-color' ),
                'dependency'  => array( 'element' => 'hongo_enable_count', 'value' => array('1') ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_grid_font_count_setting',
                'heading'     => esc_html__( 'Count typography', 'hongo-addons' ),
                'group'        => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'dependency'   => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_bottom_text_setting',
                'heading'     => esc_html__( 'Bottom text typography', 'hongo-addons' ),
                'group'        => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'dependency'   => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_icon_setting',
                'heading'     => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'        => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-align' ),
                'dependency'    => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-4','category-style-6' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_shop_button_setting',
                'heading'     => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'        => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-align' ),
                'dependency'   => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-9' ) ),
            ),
            array(
                'type'        => 'hongo_button_settings',
                'param_name'  => 'hongo_button_setting',
                'heading'     => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'        => esc_html__( 'Button Settings', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-align', 'border-color', 'border-hover-color', 'text-decoration', 'border-width' ),
                'dependency'    => array( 'element' => 'hongo_category_style', 'value' => array( 'category-style-3' ) ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);