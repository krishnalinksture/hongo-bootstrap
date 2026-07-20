<?php
/**
 * Shortcode Map For Brand / Client Logo
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product of Brand */
/*-----------------------------------------------------------------------------------*/

if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

$product_single_brand_data = '';
$hongo_custom_image = '1';

$product_brand_data = hongo_product_taxonomy_array('product_brand',true);

$product_single_brand_data = array(
    'type'        => 'dropdown',
    'heading'     => esc_html__( 'Brand', 'hongo-addons'),
    'param_name'  => 'hongo_brand_id',
    'value'       => array_flip( $product_brand_data ),
    'description' => esc_html__( 'Brand / client logos grid', 'hongo-addons' ),
    'dependency'  => array( 'element' => 'hongo_enable_custom_image', 'value' => array('0') ),
);
$hongo_custom_image = '0';

vc_map(
    array(
        'name'     => esc_html__( 'Brand / Client Logo', 'hongo-addons' ),
        'base'     => 'hongo_product_brand',
        'icon'     => 'fa-solid fa-object-group hongo-shortcode-icon',
        'description' => esc_html__( 'Brand / client logos grid', 'hongo-addons' ),
        'category' => 'Hongo',
        'params'   => array(
            array(
	            'type'        => 'dropdown',
	            'heading'     => esc_html__( 'Select style', 'hongo-addons'),
	            'param_name'  => 'hongo_brand_style',
	            'admin_label' => true,
	            'value'       => array(
	            	esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons' ) => 'product-brand-style-1',
                    esc_html__( 'Style 2', 'hongo-addons' ) => 'product-brand-style-2',
                    esc_html__( 'Style 3', 'hongo-addons' ) => 'product-brand-style-3',
                    esc_html__( 'Style 4', 'hongo-addons' ) => 'product-brand-style-4',
	            ),
            ),
            array(
                'type'         => 'hongo_preview_image',
                'heading'      => esc_html__( 'Select pre-made style for brand style', 'hongo-addons' ),
                'param_name'   => 'hongo_brand_preview_images',
            ),
            array(
                'type'         => 'hongo_custom_switch_option',
                'heading'      => esc_html__( 'Custom icon image', 'hongo-addons' ),
                'param_name'   => 'hongo_enable_custom_image',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0',
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' 		   => $hongo_custom_image,
                'dependency'   => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-1', 'product-brand-style-2', 'product-brand-style-3', 'product-brand-style-4' ) ),
            ),
            $product_single_brand_data,
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Custom image', 'hongo-addons' ),
                'param_name' => 'hongo_custom_image',
                'dependency'  => array( 'element' => 'hongo_enable_custom_image', 'value' => array('1') ),
            ),
			array(
                'type'         => 'dropdown',
                'heading'      => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name'   => 'hongo_image_srcset',
                'value'        => hongo_get_thumbnail_image_sizes(),
                'std'          => 'full',
                'dependency'   => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-1', 'product-brand-style-2', 'product-brand-style-3', 'product-brand-style-4' ) ),
            ),
            array(
                'type'         => 'hongo_custom_switch_option',
                'heading'      => esc_html__( 'External link', 'hongo-addons' ),
                'param_name'   => 'hongo_enable_extra_link',
                'value'        => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0',
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'dependency'   => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-1', 'product-brand-style-2', 'product-brand-style-3', 'product-brand-style-4' ) ),
            ),
            array(
		        'type' => 'dropdown',
		        'heading' => esc_html__( 'Link target', 'hongo-addons' ),
		        'param_name' => 'hongo_link_target',
		        'value' => array(
		        	esc_html__('Self', 'hongo-addons' ) => '_self', 
		            esc_html__('New tab / window', 'hongo-addons' ) => '_blank',
		            esc_html__('One page', 'hongo-addons' ) => 'one_page',
		        ),
		        'dependency'  => array( 'element' => 'hongo_enable_extra_link', 'value' => array('1') ),
		      ),
            array(
                'type'         => 'textfield',
                'heading'      => esc_html__( 'Link / URL', 'hongo-addons' ),
                'param_name'   => 'hongo_link_url',
                'std'          => '',
                'description'  => esc_html__( 'Enter full URL with http, like http://www.example.com', 'hongo-addons' ),
                'dependency'   => array( 'element' => 'hongo_enable_extra_link', 'value' => array('1') ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Box hover background color', 'hongo-addons' ),
                'param_name' => 'hongo_box_bgcolor',
                'dependency'  => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-3','product-brand-style-4' ) ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_bg_image_type', 
                'heading' => esc_html__( 'Background type', 'hongo-addons' ),
                'value' => array(
                    esc_html__( 'Select background type', 'hongo-addons' ) => '',
                    esc_html__( 'Fix background', 'hongo-addons' ) => 'fix-background',
                    esc_html__( 'Cover background', 'hongo-addons' ) => 'cover-background',
                ),
                'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_brand_style', 'value' => array('product-brand-style-3' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-3',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-3' ) ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                'type' => 'hongo_custom_title', // this param type
                'value' => '', // your custom markup
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-3' ) ),
            ), 
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Enable responsive css box', 'hongo-addons' ),
                'param_name' => 'hongo_enable_responsive_css',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_brand_style', 'value' => array( 'product-brand-style-3','product-brand-style-4' ) ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'height' => 'no',
                'width' => 'no',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
			$hongo_vc_extra_id,
      		$hongo_vc_extra_class,
        ),
    )
);
