<?php
/**
 * Shortcode Map For Client Image Slider
 *
 * @package hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Client Image Slider */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Client Image Slider', 'hongo-addons' ),
        'base' => 'hongo_client_image_slider',
        'description' => esc_html__( 'Client logo slider', 'hongo-addons' ),
        'icon' => 'fa-solid fa-arrows-alt-h hongo-shortcode-icon',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'hongo_preview_image',
                'param_name' => 'hongo_client_slider_preview_image',
                'image_src' => HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE.'/client-slider.jpg',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_image_srcset',
                'value' => hongo_get_thumbnail_image_sizes(),
                'std' => 'full',                
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Separator', 'hongo-addons'),
                'param_name' => 'enable_separator',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',                
            ),            
            array(
                'param_name' => 'hongo_image_slides',
                'type' => 'param_group',
                'heading' => esc_html__( 'Slide', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'hongo-addons'),
                        'param_name' => 'hongo_image',
                        'holder' => 'div'
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Link target', 'hongo-addons'),
                        'param_name' => 'hongo_link_target',
                        'value' => array(
                            esc_html__('Self', 'hongo-addons') => '_self', 
                            esc_html__('New tab / window', 'hongo-addons') => '_blank'
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__( 'Link / URL', 'hongo-addons'),
                        'param_name' => 'hongo_link_url',
                        'description' => esc_html__( 'Enter full URL with http, like http://www.example.com', 'hongo-addons' ),
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'group' => esc_html__( 'Slides', 'hongo-addons'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in desktop', 'hongo-addons'),
                'param_name' => 'slides_view_desktop',
                'admin_label' => true,
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( '1', 'hongo-addons') => '1',
                    esc_html__( '2', 'hongo-addons') => '2',
                    esc_html__( '3', 'hongo-addons') => '3',
                    esc_html__( '4', 'hongo-addons') => '4',
                    esc_html__( '5', 'hongo-addons') => '5',
                    esc_html__( '6', 'hongo-addons') => '6',
                ),
                'std' => '4',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),                
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in mini desktop', 'hongo-addons'),
                'param_name' => 'slides_view_mini_desktop',
                'admin_label' => true,
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
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in tablet', 'hongo-addons'),
                'param_name' => 'slides_view_tablet',
                'admin_label' => true,
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
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Slides per view in mobile', 'hongo-addons'),
                'param_name' => 'slides_view_mobile',
                'admin_label' => true,
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
                'std' => '',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
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
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Pagination color', 'hongo-addons' ),
                'param_name' => 'pagination_color',
                'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Navigation', 'hongo-addons'),
                'param_name' => 'enable_navigation',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Navigation color', 'hongo-addons' ),
                'param_name' => 'hongo_navigation_color',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons' ),
                'dependency' => array( 'element' => 'enable_navigation', 'value' => array('1') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Active pagination color', 'hongo-addons' ),
                'param_name' => 'active_pagination_color',
                'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Cursor color style', 'hongo-addons'),
                'param_name' => 'show_cursor_color_style',
                'admin_label' => true,
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'White cursor', 'hongo-addons') => 'white-move',
                    esc_html__( 'Black cursor', 'hongo-addons') => 'black-move',
                    esc_html__( 'Default cursor', 'hongo-addons') => 'no-move',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Transition speed', 'hongo-addons'),
                'param_name' => 'slidespeed',
                'admin_label' => true,
                'value' => '',
                'description' => esc_html__( 'Enter slide speed time like 500, where 1000 = 1 second', 'hongo-addons'),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),                
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
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slide delay', 'hongo-addons'),
                'param_name' => 'slidedelay',
                'admin_label' => true,
                'value' => '',
                'description' => esc_html__( 'Enter delay time (before switching to other slide) like 500, where 1000 = 1 second', 'hongo-addons'),
                'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
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
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'separator_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'enable_separator', 'value' => array('1') ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Separator thickness', 'hongo-addons'),
                'param_name' => 'separator_thickness',
                'value' => '',
                'dependency' => array( 'element' => 'enable_separator', 'value' => array('1') ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'description' => esc_html__( 'In pixel like 2px', 'hongo-addons'),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Element ID', 'hongo-addons' ),
                'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %s).', 'hongo-addons'), '<a target="_blank" href="https://www.w3schools.com/tags/att_global_id.asp">w3c specification</a>'),
                'param_name'  => 'hongo_slider_id',
                'group'       => esc_html__( 'Extras', 'hongo-addons' ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'hongo-addons' ),
                'description' => esc_html__( 'Add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2". You can write css code using this class and add it in customizer or your child theme css file.', 'hongo-addons' ),
                'param_name'  => 'hongo_slider_class',
                'group'       => esc_html__( 'Extras', 'hongo-addons' ),
            ),
        ),
    )
);