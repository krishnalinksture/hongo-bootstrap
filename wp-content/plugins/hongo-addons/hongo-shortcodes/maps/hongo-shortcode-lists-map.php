<?php
/**
 * Shortcode Map For Lists
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Lists */
/*-----------------------------------------------------------------------------------*/

vc_map( 
  	array(
  		'name' => esc_html__( 'Lists', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
  		'base' => 'hongo_lists', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
  		'description' => esc_html__( 'Icon / bulleted lists', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
  		'icon' => 'fa-solid fa-list-ol hongo-shortcode-icon', //URL or CSS class with icon image.
  		'category' => 'Hongo',
  		'params' => array(
      		array(
        		'type' => 'dropdown',
        		'heading' => esc_html__( 'Style', 'hongo-addons'),
        		'param_name' => 'hongo_list_style',
        		'admin_label' => true,
        		'value' => array( 	esc_html__( 'Select', 'hongo-addons') => '',
                          			esc_html__( 'Style 1', 'hongo-addons') => 'list-style-1',
                          			esc_html__( 'Style 2', 'hongo-addons') => 'list-style-2',
		                          	esc_html__( 'Style 3', 'hongo-addons') => 'list-style-3',
		                          	esc_html__( 'Style 4', 'hongo-addons') => 'list-style-4',
		                          	esc_html__( 'Style 5', 'hongo-addons') => 'list-style-5',
		                          	esc_html__( 'Style 6', 'hongo-addons') => 'list-style-6',
		                          	esc_html__( 'Style 7', 'hongo-addons') => 'list-style-7',
		                          	esc_html__( 'Style 8', 'hongo-addons') => 'list-style-8',
                                    esc_html__( 'Style 9', 'hongo-addons') => 'list-style-9',
                        		),
      		),
	      	array(
	        	'type' => 'hongo_preview_image',
	        	'heading' => esc_html__( 'Select pre-made style for block', 'hongo-addons'),
	        	'param_name' => 'hongo_list_preview_image',            
	      	),
      		array(
        		'param_name' => 'hongo_list_values', // all params must have a unique name
        		'type' => 'param_group', // this param type
        		'heading' => esc_html__( 'Manage list content', 'hongo-addons' ),
        		'value' => '',
        		'params' => array(
            		array(
                		'type' => 'textfield',
                		'heading' => esc_html__( 'List title text', 'hongo-addons' ),
                		'param_name' => 'hongo_list_value',
                		'admin_label' => true,
            		),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__( 'List content text', 'hongo-addons' ),
                        'param_name' => 'hongo_list_content',
                        'description' => esc_html__( 'Use only for style 9', 'hongo-addons' ),
                    ),
        		),
        		'callbacks' => array(
            		'after_add' => 'vcChartParamAfterAddCallback',
        		),
        		'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-1', 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-5', 'list-style-6', 'list-style-7', 'list-style-8', 'list-style-9' ) ),
      		),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Main background color', 'hongo-addons' ),
            'param_name' => 'hongo_main_bg_color',
            'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-6' ) ),
            'group' => esc_html__( 'Style', 'hongo-addons' ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Alternative background color', 'hongo-addons' ),
            'param_name' => 'hongo_alternative_bg_color',
            'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-6' ) ),
            'group' => esc_html__( 'Style', 'hongo-addons' ),
          ),
      		array(
        		'type' => 'colorpicker',
        		'class' => '',
        		'heading' => esc_html__( 'Separator / Border color', 'hongo-addons' ),
        		'param_name' => 'hongo_border_color',
        		'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-7', 'list-style-8', 'list-style-9' ) ),
        		'group' => esc_html__( 'Style', 'hongo-addons' ),
      		),
      		array(
        		'type' => 'textfield',
        		'heading' => esc_html__( 'Separator / Border size', 'hongo-addons' ),
        		'param_name' => 'hongo_border_size',
        		'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-7', 'list-style-8', 'list-style-9' ) ),
        		'description' => esc_html__( 'In pixel like 5px', 'hongo-addons' ),
        		'group' => esc_html__( 'Style', 'hongo-addons' ),
      		),
      		array(
        		'type'        => 'responsive_font_settings',
        		'param_name'  => 'hongo_list_number_font',
        		'heading'     => esc_html__( 'List number / Bullet typography', 'hongo-addons' ),
        		'group' => esc_html__( 'Typography', 'hongo-addons' ),
        		'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-5', 'list-style-6','list-style-8' ) ),
        		'hide_element_keys' => array( 'text-hover-color','text-align','font-weight','font-transform','letter-spacing' ),
      		),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_list_title_font',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-1', 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-5', 'list-style-6', 'list-style-7', 'list-style-8', 'list-style-9' ) ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_list_content_font',
                'heading'     => esc_html__( 'Contnet typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_list_style', 'value' => array( 'list-style-9' ) ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
            ),
      		$hongo_vc_extra_id,
      		$hongo_vc_extra_class,
    	),
  	)
);