<?php
/**
 * Metabox For Single Post Layout.
 *
 * @package Hongo
 */

if( ! empty( $post->post_type ) && $post->post_type == 'product' ) {

	$hongo_attribute_array = hongo_attributes_array();

	hongo_after_main_separator_start(
		'separator_main_start',
		''
	);

	hongo_meta_box_separator(
		'hongo_general_separator_single',
		esc_html__( 'General settings', 'hongo-addons' )
	);

	hongo_after_inner_separator_start(
		'separator_start',
		''
	);
	hongo_meta_box_dropdown('hongo_product_single_premade_style_single',
					esc_html__('Single product style', 'hongo-addons'),
					array('default' 								=> esc_html__( 'Default', 'hongo-addons' ),
						  'single-product-default' 					=> esc_html__('Product Layout Default', 'hongo-addons'),
						  'single-product-right-content' 			=> esc_html__('Product Layout Right Content', 'hongo-addons'),
						  'single-product-carousel' 				=> esc_html__('Product Layout Carousel', 'hongo-addons'),
						  'single-product-left-content' 			=> esc_html__('Product Layout Left Content', 'hongo-addons'),
						  'single-product-classic' 					=> esc_html__('Product Layout Classic', 'hongo-addons'),
						  'single-product-sticky' 					=> esc_html__('Product Layout Sticky', 'hongo-addons'),
						  'single-product-modern' 					=> esc_html__('Product Layout Modern', 'hongo-addons'),
						  'single-product-extended-descriptions' 	=> esc_html__('Product Layout Extended Descriptions', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_bg_color_single',
			esc_html__( 'Background color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_product_single_premade_style_single', 'value' => array('single-product-modern') )
		);
	hongo_meta_box_dropdown('hongo_new_product_shop_single',
					esc_html__('New product', 'hongo-addons'),
					array( '0' => esc_html__( 'No', 'hongo-addons' ),
						   '1' => esc_html__('Yes', 'hongo-addons'),
						)
				);
	hongo_meta_box_dropdown('hongo_product_featured_video_type_single',
					esc_html__('Featured video type', 'hongo-addons'),
					array( '' => esc_html__( 'Select Featured type', 'hongo-addons' ),
						   'vimeo' => esc_html__('Vimeo', 'hongo-addons'),
						   'youtube' => esc_html__('Youtube', 'hongo-addons'),
						   'html5' => esc_html__('HTML5', 'hongo-addons'),
						)
				);
	hongo_meta_box_text( 'hongo_product_featured_vimeo_video_single',
			esc_html__( 'Vimeo video URL', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_product_featured_video_type_single', 'value' => array('vimeo') )
		);
	hongo_meta_box_text( 'hongo_product_featured_youtube_video_single',
			esc_html__( 'Youtube video URL', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_product_featured_video_type_single', 'value' => array('youtube') )
		);
	hongo_meta_box_text( 'hongo_product_featured_mp4_video_single',
			esc_html__( 'MP4 video URL', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_product_featured_video_type_single', 'value' => array('html5') )
		);
	hongo_meta_box_text( 'hongo_product_featured_ogg_video_single',
			esc_html__( 'OGG video URL', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_product_featured_video_type_single', 'value' => array('html5') )
		);
	hongo_meta_box_text( 'hongo_product_featured_webm_video_single',
			esc_html__( 'WEBM video URL', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_product_featured_video_type_single', 'value' => array('html5') )
		);
	hongo_meta_box_upload( 'hongo_single_product_ed_bg_image_single', 
	                    esc_html__('Background image', 'hongo-addons'),
	                    esc_html__('Recommended image size is 1920px X 700px.', 'hongo-addons'),
	                    array( 'element' => 'hongo_product_single_premade_style_single', 'value'=>array('default','single-product-extended-descriptions') )
	                );
	hongo_meta_box_dropdown('hongo_single_product_content_position_single',
					esc_html__('Content position', 'hongo-addons'),
					array( 'default'	=> esc_html__( 'Default', 'hongo-addons' ),
							'top' 		=> esc_html__( 'Top', 'hongo-addons'),
							'middle' 	=> esc_html__( 'Middle', 'hongo-addons'),
						 ),
					'',
					array( 'element' => 'hongo_product_single_premade_style_single', 'value'=>array('default','single-product-modern','single-product-extended-descriptions') )
				);
	hongo_meta_box_dropdown('hongo_single_product_variation_swatch_style_single',
			esc_html__( 'Variation swatch style', 'hongo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hongo-addons' ),
				'none' => esc_html__( 'Default dropdown', 'hongo-addons' ),
				'boxed' => esc_html__( 'Boxed', 'hongo-addons' ),
			)		
		);
	hongo_meta_box_dropdown('hongo_single_product_variation_swatch_tooltip_single',
			esc_html__( 'Variation swatch tooltip', 'hongo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hongo-addons' ),
				'1' => esc_html__( 'On', 'hongo-addons' ),
				'0' => esc_html__( 'Off', 'hongo-addons' ),
			),
			'',
			array( 'element' => 'hongo_single_product_variation_swatch_style_single', 'value'=>array('default','boxed') )	
		);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_slider_single',
					esc_html__('Slider', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_image_zoom_effect_single',
					esc_html__('Image zoom effect', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_zoom_icon_single',
					esc_html__('Zoom icon', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_zoom_icon_bg_color_single',
			esc_html__( 'Zoom icon background color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_zoom_icon_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_enable_product_list_tab_single',
					esc_html__('Product list tab', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_brand_single',
					esc_html__('Product brand', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_brand_image_single',
					esc_html__('Product brand image', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 ),
					'',
					array( 'element' => 'hongo_single_product_page_enable_brand_single', 'value' => array('default','1') )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_title_single',
					esc_html__('Title', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);	
	hongo_meta_box_dropdown('hongo_single_product_page_enable_deal_single',
					esc_html__('Product countdown deal', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_deal_number_color_single',
			esc_html__( 'Countdown number color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_deal_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_deal_text_color_single',
			esc_html__( 'Countdown text color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_deal_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_sale_box_single',
					esc_html__('Sale box', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_enable_new_box_single',
					esc_html__('New box', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_short_description_single',
					esc_html__('Short description', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_sku_single',
					esc_html__('SKU', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_category_single',
					esc_html__('Category', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_tag_single',
					esc_html__('Tag', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_wishlist_single',
					esc_html__('Wishlist', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_compare_single',
					esc_html__('Compare', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_social_share_single',
					esc_html__('Share', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_text( 'hongo_single_product_share_title_single',
			esc_html__( 'Share heading', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_social_share_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_enable_tab_content_heading_single',
					esc_html__('Tab content heading', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_size_guide_single',
					esc_html__('Size guide', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						)
				);
	hongo_meta_box_dropdown('hongo_single_product_position_size_guide_single',
					esc_html__('Size guide position', 'hongo-addons'),
					$hongo_attribute_array,
					'',
					array( 'element' => 'hongo_single_product_enable_size_guide_single', 'value' => array('default','1') )
				);
	hongo_meta_box_text( 'hongo_single_product_size_guide_text_single',
			esc_html__( 'Size guide text', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_size_guide_single', 'value' => array('default','1') )
		);
	hongo_meta_box_text( 'hongo_single_product_size_guide_title_single',
			esc_html__( 'Size guide title', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_size_guide_single', 'value' => array('default','1') )
		);
	hongo_meta_box_textarea( 'hongo_single_product_size_guide_content_single',
			esc_html__( 'Size guide content', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_size_guide_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_enable_sticky_add_to_cart_single',
					esc_html__('Sticky add to cart', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_header_top_spacing_single',
					esc_html__('Header top space', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_text( 'hongo_single_product_padding_top_single',
			esc_html__( 'Padding top', 'hongo-addons' ),
			esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
			''
		);
	hongo_meta_box_text( 'hongo_single_product_padding_bottom_single',
			esc_html__( 'Padding bottom', 'hongo-addons' ),
			esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
			''
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_separator_color_single',
			esc_html__( 'Separator color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_related_product_single',
			esc_html__( 'Related products settings', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_enable_related_single',
					esc_html__('Related products', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_text( 'hongo_single_product_related_title_single',
			esc_html__( 'Related product heading', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_related_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_enable_up_sells_single',
					esc_html__('Up sells product', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_text( 'hongo_single_product_up_sells_title_single',
			esc_html__( 'Up sells product heading', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_up_sells_single', 'value' => array('default','1') )
		);
	hongo_meta_box_text( 'hongo_single_product_no_of_products_list_single',
			esc_html__( 'No. of products', 'hongo-addons' ),
			'',
			''
		);

	hongo_meta_box_dropdown('hongo_single_product_no_of_columns_list_single',
					esc_html__('No. of columns for desktop', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),						  
						  '2' => esc_html__('Columns 2', 'hongo-addons'),
						  '3' => esc_html__('Columns 3', 'hongo-addons'),
						  '4' => esc_html__('Columns 4', 'hongo-addons'),
						  '5' => esc_html__('Columns 5', 'hongo-addons'),
						  '6' => esc_html__('Columns 6', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_mini_desktop_column_single',
					esc_html__('No. of columns for mini desktop', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),						  
						  '2' => esc_html__('Columns 2', 'hongo-addons'),
						  '3' => esc_html__('Columns 3', 'hongo-addons'),
						  '4' => esc_html__('Columns 4', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_tablet_column_single',
					esc_html__('No. of columns for tablet', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),						  
						  '2' => esc_html__('Columns 2', 'hongo-addons'),
						  '3' => esc_html__('Columns 3', 'hongo-addons'),
						  '4' => esc_html__('Columns 4', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_mobile_column_single',
					esc_html__('No. of columns for mobile', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),						  
						  '1' => esc_html__('Columns 1', 'hongo-addons'),
						  '2' => esc_html__('Columns 2', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_enable_slider_single',
					esc_html__('Slider', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_slides_per_view_mini_desktop_single',
					esc_html__('Mini desktop slide per view', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('1', 'hongo-addons'),
						  '2' => esc_html__('2', 'hongo-addons'),
						  '3' => esc_html__('3', 'hongo-addons'),
						  '4' => esc_html__('4', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_slides_per_view_tablet_single',
					esc_html__('Tablet slide per view', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('1', 'hongo-addons'),
						  '2' => esc_html__('2', 'hongo-addons'),
						  '3' => esc_html__('3', 'hongo-addons'),
						  '4' => esc_html__('4', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_slides_per_view_mobile_single',
					esc_html__('Mobile slide per view', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('1', 'hongo-addons'),
						  '2' => esc_html__('2', 'hongo-addons'),
						  '3' => esc_html__('3', 'hongo-addons'),
						  '4' => esc_html__('4', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_enable_pagination_single',
					esc_html__('Pagination', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_list_pagination_color_single',
			esc_html__( 'Pagination color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_list_enable_pagination_single', 'value' => array('default','1') ),
			array( 'parent-element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_list_active_pagination_color_single',
			esc_html__( 'Active pagination color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_list_enable_pagination_single', 'value' => array('default','1') ),
			array( 'parent-element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_list_enable_navigation_single',
					esc_html__('Navigation', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_list_navigation_color_single',
			esc_html__( 'Navigation color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_list_enable_navigation_single', 'value' => array('default','1') ),
			array( 'parent-element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_list_enable_loop_single',
					esc_html__('Loop', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_dropdown('hongo_single_product_list_enable_autoplay_single',
					esc_html__('Autoplay', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
				);
	hongo_meta_box_text( 'hongo_single_product_list_enable_delay_single',
			esc_html__( 'Slide delay', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_list_enable_autoplay_single', 'value' => array('default','1') ),
			array( 'parent-element' => 'hongo_single_product_list_enable_slider_single', 'value' => array('default','1') )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_breadcrumb_navigation_single',
			esc_html__( 'Breadcrumb & Navigation box', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_enable_title_after_breadcrumb_single',
					esc_html__('Breadcrumb', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_meta_box_dropdown('hongo_single_product_enable_title_after_navigation_single',
					esc_html__('Navigation', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons'),
						 )
				);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_sale_box_single',
			esc_html__( 'Sale, New & Sold box typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_sale_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_sale_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_sale_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_sale_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_sale_color_single',
			esc_html__( 'Sale box color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_sale_box_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_sale_bg_color_single',
			esc_html__( 'Sale box background color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_sale_box_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_new_color_single',
			esc_html__( 'New box color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_new_box_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_new_bg_color_single',
			esc_html__( 'New box background color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_new_box_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_soldout_color_single',
			esc_html__( 'Sold box color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_sale_box_single', 'value' => array('default','1') )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_soldout_bg_color_single',
			esc_html__( 'Sold box background color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_sale_box_single', 'value' => array('default','1') )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_title_product_single',
			esc_html__( 'Title typography', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_title_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )
		);
	hongo_meta_box_text( 'hongo_single_product_page_title_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )
		);
	hongo_meta_box_text( 'hongo_single_product_page_title_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_page_title_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 ),
					'',
					array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )
				);
	hongo_meta_box_dropdown('hongo_single_product_page_title_font_transform_single',
					esc_html__('Text case', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  'uppercase' => esc_html__('Uppercase', 'hongo-addons'),
						  'lowercase' => esc_html__('Lowercase', 'hongo-addons'),
						  'capitalize' => esc_html__('Capitalize', 'hongo-addons'),
						  'none' => esc_html__('None', 'hongo-addons'),
						 ),
					'',
					array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_title_color_single',
			esc_html__( 'Color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_page_enable_title_single', 'value' => array('default','1') )	
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_rating_star_single',
			esc_html__( 'Rating typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_rating_star_color_single',
			esc_html__( ' Color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_price_typography_single',
			esc_html__( 'Price typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_price_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_price_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_price_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_price_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_price_color_single',
			esc_html__( 'Color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_regular_price_color_single',
			esc_html__( 'Regular price color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_short_desc_single',
			esc_html__( 'Short description typography', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_short_description_single', 'value' => array('default','1') )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_short_description_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_short_description_single', 'value' => array('default','1') )
		);
	hongo_meta_box_text( 'hongo_single_product_short_description_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_short_description_single', 'value' => array('default','1') )
		);
	hongo_meta_box_text( 'hongo_single_product_short_description_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			'',
			array( 'element' => 'hongo_single_product_enable_short_description_single', 'value' => array('default','1') )
		);
	hongo_meta_box_dropdown('hongo_single_product_short_description_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						),
					'',
					array( 'element' => 'hongo_single_product_enable_short_description_single', 'value' => array('default','1') )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_short_description_color_single',
			esc_html__( 'Color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_enable_short_description_single', 'value' => array('default','1') )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_stock_typography_single',
			esc_html__( 'Instock / Outstock typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_stock_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_stock_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_stock_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_stock_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_stock_color_single',
			esc_html__( 'In Stock color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_out_of_stock_color_single',
			esc_html__( 'Out of Stock color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_button_typography_single',
			esc_html__( 'Button typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_button_color_single',
			esc_html__( 'Color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_button_bg_color_single',
			esc_html__( 'Background color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_button_border_color_single',
			esc_html__( 'Border color', 'hongo-addons' )
		);				
	hongo_meta_box_colorpicker( 'hongo_single_product_button_hover_color_single',
			esc_html__( 'Hover color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_button_hover_bg_color_single',
			esc_html__( 'Hover background color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_button_hover_border_color_single',
			esc_html__( 'Hover border color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_product_meta_single',
			esc_html__( 'Product meta typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_meta_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_meta_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_meta_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_page_meta_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_meta_color_single',
			esc_html__( 'Product color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_meta_link_hover_color_single',
			esc_html__( 'Product link hover color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_meta_heading_color_single',
			esc_html__( 'Product heading color', 'hongo-addons' )
		);				
	hongo_meta_box_colorpicker( 'hongo_single_product_page_meta_social_icon_color_single',
			esc_html__( 'Product social icon color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_meta_social_icon_hover_color_single',
			esc_html__( 'Product social icon hover color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_product_tab_single',
			esc_html__( 'Related products typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_list_heading_font_size_single',
			esc_html__( 'Heading font size', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_list_heading_line_height_single',
			esc_html__( 'Heading line height', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_list_heading_letter_spacing_single',
			esc_html__( 'Heading letter spacing', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_list_heading_font_weight_single',
					esc_html__('Heading font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 )
				);
	hongo_meta_box_colorpicker( 'hongo_single_product_list_heading_color_single',
			esc_html__( 'Heading color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_list_heading_hover_color_single',
			esc_html__( 'Heading Hover color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_list_heading_active_color_single',
			esc_html__( 'Heading active color', 'hongo-addons' ),
			'',
			array( 'element' => 'hongo_single_product_enable_product_list_tab_single', 'value' => array('default','1') )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_meta_box_separator(
			'hongo_single_product_tab_single',
			esc_html__( 'Description tab typography', 'hongo-addons' )
		);
	hongo_after_inner_separator_start(
			'separator_start',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_tab_font_size_single',
			esc_html__( 'Font size', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_tab_line_height_single',
			esc_html__( 'Line height', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_text( 'hongo_single_product_page_tab_letter_spacing_single',
			esc_html__( 'Letter spacing', 'hongo-addons' ),
			'',
			''
		);
	hongo_meta_box_dropdown('hongo_single_product_page_tab_font_weight_single',
					esc_html__('Font weight', 'hongo-addons'),
					array('default' => esc_html__( 'Default', 'hongo-addons' ),
						  '100' => esc_html__('100', 'hongo-addons'),
						  '200' => esc_html__('200', 'hongo-addons'),
						  '300' => esc_html__('300', 'hongo-addons'),
						  '400' => esc_html__('400', 'hongo-addons'),
						  '500' => esc_html__('500', 'hongo-addons'),
						  '600' => esc_html__('600', 'hongo-addons'),
						  '700' => esc_html__('700', 'hongo-addons'),
						  '800' => esc_html__('800', 'hongo-addons'),
						  '900' => esc_html__('900', 'hongo-addons'),
						 )
					);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_tab_color_single',
			esc_html__( 'Color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_tab_hover_color_single',
			esc_html__( 'Hover color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_single_product_page_tab_active_color_single',
			esc_html__( 'Active color', 'hongo-addons' )
		);
	hongo_before_inner_separator_end(
			'separator_end',
			''
		);
	hongo_before_main_separator_end(
      'separator_main_end',
      ''
    );
}