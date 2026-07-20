<?php
/**
 * Map For Instagram
 *
 * @package Hongo
 */
?>
<?php

/*---------------------------------------------------------------------------*/
/* Instagram */
/*---------------------------------------------------------------------------*/

vc_map(
    array(
        'name' => esc_html__('Instagram Feed', 'hongo-addons'),
        'description' => esc_html__( 'Display Instagram media', 'hongo-addons' ),
        'icon' => 'fa-brands fa-instagram hongo-shortcode-icon',
        'base' => 'hongo_instagram',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'hongo-addons'),
                'param_name' => 'hongo_instagram_style',
                'admin_label' => true,
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Instagram grid', 'hongo-addons') => 'instagram-grid',
                    esc_html__( 'Instagram slider', 'hongo-addons') => 'instagram-slider',
                    esc_html__( 'Instagram masonry', 'hongo-addons') => 'instagram-masonry',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style', 'hongo-addons'),
                'param_name' => 'hongo_instagram_preview_image',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Access token', 'hongo-addons'),
                'param_name' => 'hongo_new_instagram_access_token',
                'description' => sprintf( __( '<a target="_blank" href="%s">Click here</a> for more information on getting Instagram access token.', 'hongo-addons' ), HONGO_ADDONS_DEMO_URI . 'documentation/how-to-find-your-instagram-access-token/' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'hongo-addons'),
                'param_name' => 'hongo_instagram_title',
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('No. of items to display', 'hongo-addons'),
                'param_name' => 'hongo_instagram_feed',
                'admin_label' => true,
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('No. of columns', 'hongo-addons'),
                'param_name' => 'hongo_instagram_column',
                'admin_label' => true,
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Column 1', 'hongo-addons') => 'column-1',
                    esc_html__('Column 2', 'hongo-addons') => 'column-2',
                    esc_html__('Column 3', 'hongo-addons') => 'column-3',
                    esc_html__('Column 4', 'hongo-addons') => 'column-4',
                    esc_html__('Column 5', 'hongo-addons') => 'column-5',
                    esc_html__('Column 6', 'hongo-addons') => 'column-6',
                ),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid', 'instagram-masonry' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Video', 'hongo-addons'),
                'param_name' => 'hongo_enable_video',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '0',
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
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
                    esc_html__( '7', 'hongo-addons') => '7',
                    esc_html__( '8', 'hongo-addons') => '8',
                    esc_html__( '9', 'hongo-addons') => '9',
                    esc_html__( '10', 'hongo-addons') => '10',
                ),
                'std' => '4',
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
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
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
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
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
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
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Spacing between columns', 'hongo-addons'),
                'param_name' => 'hongo_instagram_slider_gutter',
                'description' => esc_html__('Define spacing between columns like 12px', 'hongo-addons'),
                //'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
                'std' => '7px',
            ),
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Spacing between columns', 'hongo-addons'),
                'param_name' => 'hongo_gutter_type',
                'value' => array(
                    esc_html__( 'Gutter none', 'hongo-addons') => '',
                    esc_html__( 'Gutter very small', 'hongo-addons') => 'gutter-very-small',
                    esc_html__( 'Gutter small', 'hongo-addons') => 'gutter-small',
                    esc_html__( 'Gutter medium', 'hongo-addons') => 'gutter-medium',
                    esc_html__( 'Gutter large', 'hongo-addons') => 'gutter-large',
                    esc_html__( 'Gutter extra large', 'hongo-addons') => 'gutter-extra-large',
                ),
                'std' => 'gutter-medium',
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid', 'instagram-masonry' ) ),
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
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid', 'instagram-masonry' ) ),
                'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation delay', 'hongo-addons' ),
                'param_name' => 'hongo_animation_delay',
                'dependency' => array( 'element' => 'hongo_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation delay in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
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
                'type'          => 'hongo_custom_switch_option',
                'heading'       => esc_html__( 'Loop', 'hongo-addons'),
                'param_name'    => 'hongo_enable_loop',
                'value'         => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'group'         => esc_html__('Slider Configuration', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
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
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Slide delay', 'hongo-addons'),
                'param_name'    => 'hongo_dtime',
                'std'           => 2000,
                'group'         => esc_html__('Slider Configuration', 'hongo-addons'),
                'dependency'    => array( 'element' => 'hongo_enable_autoplay', 'value' => array('1') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Pagination', 'hongo-addons'),
                'param_name' => 'hongo_enable_pagination',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'group'         => esc_html__('Slider Configuration','hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
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
                'dependency' => array( 'element' => 'hongo_enable_pagination', 'value' => array('1') ),
            ), 
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Pagination color', 'hongo-addons' ),
                'param_name' => 'pagination_color',
                'dependency' => array( 'element' => 'hongo_enable_pagination', 'value' => array('1') ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Active pagination color', 'hongo-addons' ),
                'param_name' => 'active_pagination_color',
                'dependency' => array( 'element' => 'hongo_enable_pagination', 'value' => array('1') ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
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
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-slider' ) ),
                'group' => esc_html__( 'Slider Configuration', 'hongo-addons'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title color', 'hongo-addons'),
                'param_name' => 'hongo_title_color',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title background color', 'hongo-addons'),
                'param_name' => 'hongo_title_bg_color',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
	    	array(
	        	'type' => 'colorpicker',
	        	'heading' => esc_html__( 'Icon color', 'hongo-addons'),
	        	'param_name' => 'hongo_icon_color',
	        	'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
	                esc_html__( 'On', 'hongo-addons') => '1'
                ),
	        	'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
	        	'group' => esc_html__( 'Style', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
	      	),
	    	array(
	        	'type' => 'colorpicker',
	        	'heading' => esc_html__( 'Counter text color', 'hongo-addons'),
	        	'param_name' => 'hongo_counter_color',
	        	'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
	                esc_html__( 'On', 'hongo-addons') => '1'
                ),
	        	'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
	        	'group' => esc_html__( 'Style', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
	      	),
	    	array(
	        	'type' => 'colorpicker',
	        	'heading' => esc_html__( 'Counter background color', 'hongo-addons'),
	        	'param_name' => 'hongo_counter_background_color',
	        	'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
	                esc_html__( 'On', 'hongo-addons') => '1'
                ),
	        	'dependency'  => array( 'element' => 'hongo_instagram_style', 'value' => array( 'instagram-grid','instagram-slider','instagram-masonry' ) ),
	        	'group' => esc_html__( 'Style', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
	      	),
        	$hongo_vc_extra_id,
        	$hongo_vc_extra_class,
        )
    )
);