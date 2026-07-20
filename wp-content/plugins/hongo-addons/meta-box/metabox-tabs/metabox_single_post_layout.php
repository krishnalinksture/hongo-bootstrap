<?php
/**
 * Metabox For Single Post Layout.
 *
 * @package Hongo
 */
?>
<?php 
if($post->post_type == 'post') {
	hongo_after_main_separator_start(
		'separator_main_start',
		''
	);

	hongo_meta_box_separator(
		'hongo_logo_favicon_separator_single',
		esc_html__( 'Single post Settings', 'hongo-addons' )
	);

	hongo_after_inner_separator_start(
		'separator_start',
		''
	);
	hongo_meta_box_dropdown('hongo_post_layout_style_single',
			esc_html__('Post layout style', 'hongo-addons'),
			array('default' => esc_html__('Default', 'hongo-addons'),
				  'post-layout-style-1' => esc_html__('Single Post Layout Style 1', 'hongo-addons'),
				  'post-layout-style-2' => esc_html__('Single Post Layout Style 2', 'hongo-addons')
				 )
		);
	hongo_meta_box_dropdown('hongo_enable_category_single',
				esc_html__('Category', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
	hongo_meta_box_dropdown('hongo_enable_date_single',
				esc_html__('Date', 'hongo-addons'),
				array(
					'default' => esc_html__('Default', 'hongo-addons'),
					'1' => esc_html__('On', 'hongo-addons'),
					'0' => esc_html__('Off', 'hongo-addons')
				)
			);
	hongo_meta_box_text( 'hongo_post_date_format_single', 
				esc_html__('Date format', 'hongo-addons'),
				sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo-addons' ), 'https://wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
				'',
				array( 'element' => 'hongo_enable_date_single', 'value' => array('default', '1'))
			);
	hongo_meta_box_dropdown('hongo_enable_author_single',
				esc_html__('Author', 'hongo-addons'),
				array(
					'default' => esc_html__('Default', 'hongo-addons'),
					'1' => esc_html__('On', 'hongo-addons'),
					'0' => esc_html__('Off', 'hongo-addons')
				)
			);
	hongo_meta_box_dropdown('hongo_enable_tags_single',
				esc_html__('Tags', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
	hongo_meta_box_dropdown('hongo_enable_navigation_link_single',
				esc_html__('Navigation link', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
	hongo_meta_box_dropdown('hongo_enable_like_single',
				esc_html__('Like', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
	hongo_meta_box_dropdown('hongo_enable_share_single',
				esc_html__('Share', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
	hongo_meta_box_dropdown('hongo_enable_post_author_box_single',
				esc_html__('Author box', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
	hongo_meta_box_dropdown('hongo_single_post_meta_text_transform_single',
				esc_html__('Post meta text case', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
					  'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
					  'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
					  'text-none' => esc_html__('None', 'hongo-addons'),
					 )
			);
	hongo_before_inner_separator_end(
		'separator_end',
		''
	);

	hongo_meta_box_separator(
		'hongo_single_related_posts_single',
		esc_html__( 'Related posts', 'hongo-addons' )
	);

	hongo_after_inner_separator_start(
		'separator_start',
		''
	);

	hongo_meta_box_dropdown('hongo_enable_related_posts_single',
				esc_html__('Related posts', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);

	hongo_meta_box_dropdown('hongo_no_of_related_posts_columns_single',
				esc_html__('No. of columns', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => '1',
					  '2' => '2',
					  '3' => '3',
					  '4' => '4',
					  '6' => '6',
					 ),
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);

	hongo_meta_box_text( 'hongo_related_posts_title_single', 
				esc_html__('Title', 'hongo-addons'),
				'',
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))

			);

	hongo_meta_box_dropdown('hongo_no_of_related_posts_single',
				esc_html__('No. of posts', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => '1',
					  '2' => '2',
					  '3' => '3',
					  '4' => '4',
					  '5' => '5',
					  '6' => '6',
					 ),
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);

	hongo_meta_box_dropdown('hongo_related_posts_enable_date_single',
				esc_html__('Post date', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 ),
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);

	hongo_meta_box_text( 'hongo_related_posts_date_format_single', 
				esc_html__('Post date format', 'hongo-addons'),
				sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo-addons' ), 'https://wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
				'',
				array( 'element' => 'hongo_related_posts_enable_date_single', 'value' => array('default', '1')),
				array( 'parent-element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);

	hongo_meta_box_dropdown('hongo_related_posts_enable_author_single',
				esc_html__('Post author', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 ),
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);
	hongo_meta_box_dropdown('hongo_related_posts_separator_single',
				esc_html__('Post separator', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 ),
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);
	hongo_meta_box_text( 'hongo_related_post_excerpt_length_single', 
				esc_html__('Excerpt length', 'hongo-addons'),
				'',
				'',
				array( 'element' => 'hongo_enable_related_posts_single', 'value' => array('default', '1'))
			);
	hongo_before_inner_separator_end(
		'separator_end',
		''
	);
	hongo_meta_box_separator(
		'hongo_single_post_color_single',
		esc_html__( 'Color settings', 'hongo-addons' )
	);
	hongo_after_inner_separator_start(
		'separator_start',
		''
	);
	hongo_meta_box_colorpicker( 'hongo_single_post_meta_text_color_single',
		esc_html__( 'Post meta color', 'hongo-addons' )
	);
	hongo_meta_box_colorpicker( 'hongo_single_post_meta_text_hover_color_single',
		esc_html__( 'Post meta hover color', 'hongo-addons' )
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