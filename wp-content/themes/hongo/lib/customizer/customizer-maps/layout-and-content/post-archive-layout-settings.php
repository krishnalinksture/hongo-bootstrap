<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	/*
	 * Archive layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_archive_post_layout_container_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_post_layout_container_separator', array(
		'label'				=> __( 'Layout and Container', 'hongo' ),
		'type'				=> 'hongo_separator',
		'section'			=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_archive_post_layout_container_separator',
	) ) );

	/* End Separator Settings */

	/* Archive Layout For Post */

	$wp_customize->add_setting( 'hongo_post_layout_setting_archive', array(
		'default' 			=> 'hongo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_post_layout_setting_archive', array(
		'label'				=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_layout_setting_archive',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'hongo_layout_no_sidebar'    => __( 'No sidebar', 'hongo' ),
								  	'hongo_layout_left_sidebar'  => __( 'Left sidebar', 'hongo' ),
								  	'hongo_layout_right_sidebar' => __( 'Right sidebar', 'hongo' ),
								  	'hongo_layout_both_sidebar'  => __( 'Both sidebar', 'hongo' ),
								   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/1col.png',
									HONGO_THEME_IMAGES_URI . '/2cl.png',
									HONGO_THEME_IMAGES_URI . '/2cr.png',
									HONGO_THEME_IMAGES_URI . '/3cm.png',
								),
		'hongo_columns'		=> '4',
	) ) );

	/* End Archive Layout For Post */

	/* Archive Left Sidebar */

	$wp_customize->add_setting( 'hongo_post_left_sidebar_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_left_sidebar_archive', array(
		'label'				=> __( 'Left sidebar', 'hongo' ),
		'section'			=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_left_sidebar_archive',
		'type'				=> 'select',
		'choices'			=> $hongo_sidebar_array,
		'active_callback'	=> 'hongo_post_left_sidebar_layout_archive_callback',
	) ) );

	/* End Archive Left Sidebar */

	/* Archive Right Sidebar */
	
	$wp_customize->add_setting( 'hongo_post_right_sidebar_archive', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_right_sidebar_archive', array(
		'label'				=> __( 'Right sidebar', 'hongo' ),
		'section'			=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_right_sidebar_archive',
		'type'				=> 'select',
		'choices'			=> $hongo_sidebar_array,
		'active_callback'	=> 'hongo_post_right_sidebar_layout_archive_callback',
	) ) );

	/* End Archive Right Sidebar */

	/* Archive Container Setting */

	$wp_customize->add_setting( 'hongo_post_container_style_archive', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_container_style_archive', array(
		'label'				=> __( 'Container style', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_container_style_archive',
		'type'              => 'select',
		'choices'           => array(
								    'container'						=> esc_html__( 'Fixed', 'hongo' ),
								    'container-fluid'				=> esc_html__( 'Full width', 'hongo' ),
									'container-fluid-with-padding'	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
							   ),
	) ) );

	/* End Archive Container Setting */

	/* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_post_container_fluid_with_padding_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_container_fluid_with_padding_archive', array(
		'label'				=> __( 'Full width padding', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_container_fluid_with_padding_archive',
		'type'              => 'text',
		'active_callback'	=> 'hongo_post_container_fluid_with_padding_archive_callback'
	) ) );

	if ( ! function_exists( 'hongo_post_container_fluid_with_padding_archive_callback' ) ) :
	   	function hongo_post_container_fluid_with_padding_archive_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_post_container_style_archive' )->value() == 'container-fluid-with-padding' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Container custom Width setting */

	/* Archive Show Description setting */

	$wp_customize->add_setting( 'hongo_show_description_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_description_archive', array(
		'label'       		=> 	__( 'Description', 'hongo' ),
		'section'     		=> 	'hongo_add_archive_layout_panel',
		'settings'			=> 	'hongo_show_description_archive',
		'type'              => 	'hongo_switch',
		'choices'           => 	array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   	),
	) ) );

	/* End Archive Show Description setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_archive_post_list_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_post_list_style_data_separator', array(
	    'label'				=> __( 'Post list style and data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_archive_layout_panel',
	    'settings'   		=> 'hongo_archive_post_list_style_data_separator',
	) ) );

	/* End Separator Settings */

	/* Archive Type */

	/* Archive Style setting */

    $wp_customize->add_setting( 'hongo_blog_premade_style_archive', array(
		'default' 			=> 'blog-grid',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_blog_premade_style_archive', array(
		'label'				=> __( 'Post list style', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_blog_premade_style_archive',
		'type'              => 'hongo_preview_image',
		'choices'           => array(									
									'blog-side-image'		=> __( 'Side image', 'hongo' ),
								    'blog-masonry' 	        => __( 'Masonry', 'hongo' ),
								    'blog-grid'		        => __( 'Grid', 'hongo' ),
									'blog-clean'		    => __( 'Clean', 'hongo' ),
									'blog-modern'		    => __( 'Modern', 'hongo' ),
									'blog-only-text'		=> __( 'Only text', 'hongo' ),
									'blog-overlay-image'    => __( 'Overlay Image', 'hongo' ),
                    				'blog-image'            => __( 'Blog Image', 'hongo' ),
                    				'blog-standard'			=> __( 'Standard', 'hongo' ),
								   ),
		'hongo_img'			=> array(									
									HONGO_THEME_IMAGES_URI . '/blog-side-image.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-masonry.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-grid.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-clean.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-modern.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-only-text.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-overlay-image.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-image.jpg',
								  	HONGO_THEME_IMAGES_URI . '/blog-standard.jpg',
							   ),
		'hongo_columns'    	=> '2',
	) ) );

	/* End Archive Style setting */

	/* Archive Column Type setting */

    $wp_customize->add_setting( 'hongo_blog_column_archive', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_blog_column_archive', array(
		'label'				=> __( 'No. of columns', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_blog_column_archive',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    '2' 	=> __( '2 columns', 'hongo' ),
								    '3'		=> __( '3 columns', 'hongo' ),
								    '4'		=> __( '4 columns', 'hongo' ),
								    '5'		=> __( '5 columns', 'hongo' ),
								    '6'		=> __( '6 columns', 'hongo' ),
								   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/5-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'hongo_columns'    	=> '4',
		'active_callback'   => 'hongo_blog_column_archive_callback'
	) ) );

	if ( ! function_exists( 'hongo_blog_column_archive_callback' ) ) :
	   	function hongo_blog_column_archive_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-standard') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;	

	/* End Archive Column Type setting */

	/* Archive Blog Type setting */

    $wp_customize->add_setting( 'hongo_blog_type_archive', array(
		'default' 			=> 'gutter-medium',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_blog_type_archive', array(
		'label'				=> __( 'Spacing between columns', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_blog_type_archive',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'gutter-none' 		=> __( 'Gutter None', 'hongo' ),
								    'gutter-very-small'	=> __( 'Gutter Very Small', 'hongo' ),
								    'gutter-small'		=> __( 'Gutter Small', 'hongo' ),
								    'gutter-medium'		=> __( 'Gutter Medium', 'hongo' ),
								    'gutter-large' 		=> __( 'Gutter Large', 'hongo' ),
								    'gutter-extra-large'=> __( 'Gutter Extra Large', 'hongo' ),
								   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/no-gutter.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gutter-very-small.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gutter-small.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gutter-medium.jpg',
									HONGO_THEME_IMAGES_URI . '/gutter-large.jpg',
									HONGO_THEME_IMAGES_URI . '/gutter-extra-large.jpg',
							   ),
		'hongo_columns'    	=> '3',
		'active_callback'	=> 'hongo_blog_column_spacing_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_blog_column_spacing_archive_callback' ) ) :
	   	function hongo_blog_column_spacing_archive_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-masonry' && $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Blog Type setting */

	/* Archive Animation setting */
    $wp_customize->add_setting( 'hongo_animation_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Animation_Control( $wp_customize, 'hongo_animation_archive', array(
		'label'				=> __( 'Animation', 'hongo' ),
		'type'              => 'hongo_animation_style',
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_animation_archive',
	) ) );
	/* End Archive Animation setting */

	/* Archive Show Pagination setting */
	$wp_customize->add_setting( 'hongo_show_pagination_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_pagination_archive', array(
		'label'				=> __( 'Pagination', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_pagination_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Archive Show Pagination setting */

	/* Archive Show Pagination setting */
	$wp_customize->add_setting( 'hongo_blog_pagination_style_archive', array(
		'default' 			=> 'number-pagination',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_pagination_style_archive', array(
		'label'				=> __( 'Pagination style', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_blog_pagination_style_archive',
		'type'              => 'select',
		'choices'           => array(
									''								=> esc_html__( 'Select', 'hongo' ),
								    'number-pagination' 			=> esc_html__( 'Number pagination', 'hongo' ),
								    'infinite-scroll-pagination'	=> esc_html__( 'Infinite scroll', 'hongo' ),
								    'loadmore'						=> esc_html__( 'Load more button', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_pagination_style_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_pagination_style_archive_callback' ) ) :
	   	function hongo_pagination_style_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_show_pagination_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Pagination setting */

	/* Archive Show Post Thumbnail setting */
	$wp_customize->add_setting( 'hongo_show_post_thumbnail_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_archive', array(
		'label'				=> __( 'Post thumbnail', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Archive Show Post Thumbnail setting */

	/* Archive Show Post Format Setting */
	$wp_customize->add_setting( 'hongo_show_post_format_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_format_archive', array(
		'label'				=> __( 'Post featured image only', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_format_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_post_format_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_post_format_archive_callback' ) ) :
	   	function hongo_show_post_format_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_thumbnail_archive' )->value( '1' ) && $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;	

	/* End Archive Show Post Format Setting */

	/* Archive Show Post Thumbnail Icon setting */
	$wp_customize->add_setting( 'hongo_show_post_thumbnail_icon_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_icon_archive', array(
		'label'				=> __( 'Post type icon', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_icon_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_show_post_thumbnail_icon_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_post_thumbnail_icon_archive_callback' ) ) :
	   	function hongo_show_post_thumbnail_icon_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_thumbnail_archive' )->value( '1' ) && $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Post Thumbnail setting */	

	/* Archive Image srcset setting */
    $wp_customize->add_setting( 'hongo_image_srcset_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_image_srcset_archive', array(
		'label'				=> __( 'Post thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_image_srcset_archive',
		'active_callback'	=> 'hongo_image_srcset_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_image_srcset_archive_callback' ) ) :
	   	function hongo_image_srcset_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_thumbnail_archive' )->value( '1' ) ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Type */

	/* Archive Show Post Title setting */
	$wp_customize->add_setting( 'hongo_show_post_title_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_title_archive', array(
		'label'				=> __( 'Post title', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_title_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Archive Show Post Title setting */

	/* Archive Show Separator setting */
	$wp_customize->add_setting( 'hongo_show_separator_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_separator_archive', array(
		'label'				=> __( 'Separator', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_separator_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_separator_archive_callback'
	) ) );

	if ( ! function_exists( 'hongo_show_separator_archive_callback' ) ) :
   	function hongo_show_separator_archive_callback( $control )	{
        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-grid' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-side-image' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-masonry' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-clean' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-overlay-image' ) {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;
	/* End Archive Show Separator setting */

	/* Archive Show Post Author setting */
	$wp_customize->add_setting( 'hongo_show_post_author_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_author_archive', array(
		'label'				=> __( 'Post author', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_author_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Archive Show Post Author setting */
	
	/* Archive Show Post Author Image setting */

	$wp_customize->add_setting( 'hongo_show_post_author_image_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_author_image_archive', array(
		'label'				=> __( 'Post author image', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_author_image_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_post_author_archive_callback'
	) ) );

	if ( ! function_exists( 'hongo_show_post_author_archive_callback' ) ) :
   	function hongo_show_post_author_archive_callback( $control )	{
        if ( $control->manager->get_setting( 'hongo_show_post_author_archive' )->value() == '1') {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;

	/* End Archive Show Post Author Image setting */

	/* Archive Show Post Date setting */

	$wp_customize->add_setting( 'hongo_show_post_date_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_date_archive', array(
		'label'				=> __( 'Post date', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_date_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Archive Show Post Date setting */

	/* Archive Date Format setting */

	$wp_customize->add_setting( 'hongo_date_format_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_date_format_archive', array(
		'label'				=> __( 'Post date format', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_date_format_archive',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo' ), '//wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
		'active_callback'   => 'hongo_date_format_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_date_format_archive_callback' ) ) :
	   	function hongo_date_format_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_date_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Date Format setting */

	/* Archive Show Excerpt setting */

	$wp_customize->add_setting( 'hongo_show_excerpt_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_excerpt_archive', array(
		'label'				=> __( 'Post excerpt', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_excerpt_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Archive Show Excerpt setting */

	/* Archive Excerpt Length setting */

    $wp_customize->add_setting( 'hongo_excerpt_length_archive', array(
		'default' 			=> 15,
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_excerpt_length_archive', array(
		'label'				=> __( 'Excerpt length', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_excerpt_length_archive',
		'type'              => 'text',
		'active_callback'   => 'hongo_excerpt_length_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_excerpt_length_archive_callback' ) ) :
	   	function hongo_excerpt_length_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Excerpt Length setting */

	/* Archive Show Content setting */

	$wp_customize->add_setting( 'hongo_show_content_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_content_archive', array(
		'label'				=> __( 'Post full content', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_content_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_show_content_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_content_archive_callback' ) ) :
	   	function hongo_show_content_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_archive' )->value() == '0') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Content setting */

	/* Archive Show Categories setting */

	$wp_customize->add_setting( 'hongo_show_category_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_category_archive', array(
		'label'				=> __( 'Post categories', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_category_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Archive Show Categories setting */

	/* Archive Show like setting */

	$wp_customize->add_setting( 'hongo_show_like_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_like_archive', array(
		'label'				=> __( 'Post likes', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_like_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Archive Show like setting */

	/* Archive Show Comment setting */

	$wp_customize->add_setting( 'hongo_show_comment_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_comment_archive', array(
		'label'				=> __( 'Post comments', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_comment_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Archive Show Comment setting */

	/* Archive Show Button setting */

	$wp_customize->add_setting( 'hongo_show_button_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_button_archive', array(
		'label'				=> __( 'Read more button', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_button_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_button_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_button_archive_callback' ) ) :
	   	function hongo_show_button_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-overlay-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Show Button setting */

	/* Archive Button Text setting */

	$wp_customize->add_setting( 'hongo_button_text_archive', array(
		'default' 			=> __( 'continue reading', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_button_text_archive', array(
		'label'				=> __( 'Button text', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_text_archive',
		'type'              => 'text',
		'active_callback'	=> 'hongo_button_text_archive_callback'
	) ) );

	if ( ! function_exists( 'hongo_button_text_archive_callback' ) ) :
	   	function hongo_button_text_archive_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_show_button_archive' )->value() == '1' && $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-overlay-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Button Text setting */

	/* Title Typography Separator setting */

	$wp_customize->add_setting( 'hongo_archive_layout_separator_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_layout_separator_title_typography', array(
	    'label'				=> __( 'Title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_archive_layout_panel',
	    'settings'   		=> 'hongo_archive_layout_separator_title_typography',
	    'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );

	if ( ! function_exists( 'hongo_archive_layout_title_typography_callback' ) ) :
	   	function hongo_archive_layout_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_title_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Title Typography Separator setting */

	/* Archive Font size setting */

	$wp_customize->add_setting( 'hongo_title_font_size_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_font_size_archive', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_title_font_size_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Font size setting */

	/* Archive Line height setting */

	$wp_customize->add_setting( 'hongo_title_line_height_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_line_height_archive', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_title_line_height_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Line height setting */

	/* Archive Letter spacing setting */

	$wp_customize->add_setting( 'hongo_title_letter_spacing_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_letter_spacing_archive', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_title_letter_spacing_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Letter spacing setting */

	/* Archive Font weight setting */
    $wp_customize->add_setting( 'hongo_title_font_weight_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_font_weight_archive', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_title_font_weight_archive',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );
	/* End Archive Font weight setting */

	/* Archive Post Title Text Transform setting */
    $wp_customize->add_setting( 'hongo_blog_post_title_text_transform_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_post_title_text_transform_archive', array(
		'label'				=> __( 'Post title text case', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_blog_post_title_text_transform_archive',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),
								    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );
	/* End Archive Post Title Text Transform setting */

	/* Archive Title Color setting */
	$wp_customize->add_setting( 'hongo_title_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_title_color_archive', array(
		'label'				=> __( 'Title color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_title_color_archive',
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );
	/* End Archive Title Color setting */

	/* Archive Title Hover Color setting */
	$wp_customize->add_setting( 'hongo_title_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_title_hover_color_archive', array(
		'label'				=> __( 'Title hover color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_title_hover_color_archive',
		'active_callback'	=> 'hongo_archive_layout_title_typography_callback',
	) ) );
	/* End Archive Title Hover Color setting */	

	/* Content Typography Separator setting */

	$wp_customize->add_setting( 'hongo_archive_layout_separator_content_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_layout_separator_content_typography', array(
	    'label'				=> __( 'Content typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_archive_layout_panel',
	    'settings'   		=> 'hongo_archive_layout_separator_content_typography',
	    'active_callback'	=> 'hongo_archive_layout_content_typography_callback',
	) ) );

	if ( ! function_exists( 'hongo_archive_layout_content_typography_callback' ) ) :
	   	function hongo_archive_layout_content_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_content_archive' )->value() == '1' || $control->manager->get_setting( 'hongo_show_excerpt_archive' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Content Typography Separator setting */

	/* Archive Font size setting */

	$wp_customize->add_setting( 'hongo_content_font_size_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_font_size_archive', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_content_font_size_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_archive_layout_content_typography_callback',
	) ) );

	/* End Archive Font size setting */

	/* Archive Line height setting */

	$wp_customize->add_setting( 'hongo_content_line_height_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_line_height_archive', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_content_line_height_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_archive_layout_content_typography_callback',
	) ) );

	/* End Archive Line height setting */

	/* Archive Letter spacing setting */

	$wp_customize->add_setting( 'hongo_content_letter_spacing_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_letter_spacing_archive', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_content_letter_spacing_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_archive_layout_content_typography_callback',
	) ) );

	/* End Archive Letter spacing setting */

	/* Archive Font weight setting */
    $wp_customize->add_setting( 'hongo_content_font_weight_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_font_weight_archive', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_content_font_weight_archive',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_archive_layout_content_typography_callback',
	) ) );
	/* End Archive Font weight setting */

	/* Archive content Color setting */
	$wp_customize->add_setting( 'hongo_content_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_content_color_archive', array(
		'label'				=> __( 'Content color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_content_color_archive',
		'active_callback'	=> 'hongo_archive_layout_content_typography_callback',
	) ) );

	/* End Archive content Color setting */


	/* Style Separator setting */

	$wp_customize->add_setting( 'hongo_archive_layout_separator_style_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_layout_separator_style_color', array(
	    'label'				=> __( 'Post meta and button colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_archive_layout_panel',
	    'settings'   		=> 'hongo_archive_layout_separator_style_color',
	) ) );

	/* End Style Separator setting */

	/* Archive Post Meta Color setting */

	$wp_customize->add_setting( 'hongo_post_meta_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_meta_color_archive', array(
		'label'				=> __( 'Post meta color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_meta_color_archive',
	) ) );

	/* End Archive Post Meta Color setting */

	/* Archive Post Meta Hover Color setting */

	$wp_customize->add_setting( 'hongo_post_meta_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_meta_hover_color_archive', array(
		'label'				=> __( 'Post meta hover color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_post_meta_hover_color_archive',
	) ) );

	/* End Archive Post Meta Hover Color setting */

	/* Archive Button Color setting */

	$wp_customize->add_setting( 'hongo_button_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_color_archive', array(
		'label'				=> __( 'Button color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_color_archive',
		'active_callback'	=> 'hongo_button_color_archive_callback',
	) ) );

	/* End Archive Button Color setting */

	/* Archive Button Hover Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_color_archive', array(
		'label'				=> __( 'Button hover color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_hover_color_archive',
		'active_callback'	=> 'hongo_button_color_archive_callback',
	) ) );

	/* End Archive Button Hover Color setting */

	/* Archive Button Text Color setting */

	$wp_customize->add_setting( 'hongo_button_text_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_text_color_archive', array(
		'label'				=> __( 'Button text color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_text_color_archive',
		'active_callback'	=> 'hongo_button_color_archive_callback',
	) ) );

	/* End Archive Button Text Color setting */

	/* Archive Button Hover Text Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_text_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_text_color_archive', array(
		'label'				=> __( 'Button text hover color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_hover_text_color_archive',
		'active_callback'	=> 'hongo_button_color_archive_callback',
	) ) );

	/* End Archive Button Hover Text Color setting */

	/* Archive Button Border Color setting */

	$wp_customize->add_setting( 'hongo_button_border_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_border_color_archive', array(
		'label'				=> __( 'Button border color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_border_color_archive',
		'active_callback'	=> 'hongo_button_color_archive_callback',
	) ) );

	/* End Archive Button Border Color setting */

	/* Archive Button Border Hover Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_border_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_border_color_archive', array(
		'label'				=> __( 'Button border hover color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_button_hover_border_color_archive',
		'active_callback'	=> 'hongo_button_color_archive_callback',
	) ) );

	/* End Archive Button Border Color setting */

	if ( ! function_exists( 'hongo_button_color_archive_callback' ) ) :
	   	function hongo_button_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_button_archive' )->value() == '1'  && $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() != 'blog-overlay-image') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* Extra Setting Separator setting */

	$wp_customize->add_setting( 'hongo_archive_layout_separator_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_layout_separator_style', array(
	    'label'				=> __( 'Extra settings', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_archive_layout_panel',
	    'settings'   		=> 'hongo_archive_layout_separator_style',
	) ) );

	/* Extra Setting Separator setting */

	/* Archive Post Meta Text Transform setting */

    $wp_customize->add_setting( 'hongo_blog_post_meta_text_transform_archive', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_post_meta_text_transform_archive', array(
		'label'				=> __( 'Post meta text case', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_blog_post_meta_text_transform_archive',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),
								    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								   ),
	) ) );

	/* End Archive Post Meta Text Transform setting */

	/* Archive Post Grid Zoom effect*/
	$wp_customize->add_setting( 'hongo_show_post_thumbnail_zoom_effect_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_zoom_effect_archive', array(
		'label'				=> __( 'Image effect on hover', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_zoom_effect_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_post_thumbnail_zoom_effect_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_post_thumbnail_zoom_effect_archive_callback' ) ) :
	   	function hongo_show_post_thumbnail_zoom_effect_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-masonry' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-grid' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-modern' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-image' ||
	        	$control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-clean' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Archive Post Grid Zoom effect */

	/* Archive Show Categories setting*/
	$wp_customize->add_setting( 'hongo_image_hover_icon_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_image_hover_icon_archive', array(
		'label'				=> __( 'Hover icon', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_image_hover_icon_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_image_hover_icon_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_image_hover_icon_archive_callback' ) ) :
	   	function hongo_image_hover_icon_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-clean' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Show Categories setting */

	/* Archive Box Background Color setting */

	$wp_customize->add_setting( 'hongo_box_bg_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_bg_color_archive', array(
		'label'				=> __( 'Box background color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_bg_color_archive',
		'active_callback'	=> 'hongo_box_bg_color_archive_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_bg_color_archive_callback' ) ) :
	   	function hongo_box_bg_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-masonry' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-modern' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-overlay-image' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-only-text' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-standard') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Box Background Color setting */

	/* Archive Box Background Color setting*/
	$wp_customize->add_setting( 'hongo_box_bg_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_bg_hover_color_archive', array(
		'label'				=> __( 'Box hover background color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_bg_hover_color_archive',
		'active_callback'	=> 'hongo_box_bg_hover_color_archive_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_bg_hover_color_archive_callback' ) ) :
	   	function hongo_box_bg_hover_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-only-text') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Archive Box Background Color setting */

	/* Archive Image Opacity */

    $wp_customize->add_setting( 'hongo_image_opacity_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_image_opacity_archive', array(
		'label'				=> __( 'Hover overlay opacity', 'hongo' ),
		'section'			=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_image_opacity_archive',
		'type'				=> 'select',
		'choices'			=> array(
									''		=> esc_html__( 'Default', 'hongo' ),
									'0.0'	=> esc_html__( 'No Opacity', 'hongo' ),
									'0.1'	=> esc_html__( '0.1', 'hongo' ),
									'0.2'	=> esc_html__( '0.2', 'hongo' ),
									'0.3'	=> esc_html__( '0.3', 'hongo' ),
									'0.4'	=> esc_html__( '0.4', 'hongo' ),
									'0.5'	=> esc_html__( '0.5', 'hongo' ),
									'0.6'	=> esc_html__( '0.6', 'hongo' ),
									'0.7'	=> esc_html__( '0.7', 'hongo' ),
									'0.8'	=> esc_html__( '0.8', 'hongo' ),
									'0.9'	=> esc_html__( '0.9', 'hongo' ),
									'1.0'	=> esc_html__( '1.0', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_image_opacity_archive_callback',
	) ) );

	/* End Image Opacity */

	/* Image Opacity Color setting*/
	$wp_customize->add_setting( 'hongo_image_opacity_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_image_opacity_color_archive', array(
		'label'				=> __( 'Hover overlay color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_image_opacity_color_archive',
		'active_callback'	=> 'hongo_image_opacity_archive_callback',
	) ) );
	/* End Image Opacity Color setting */

	if ( ! function_exists( 'hongo_image_opacity_archive_callback' ) ) :
	   	function hongo_image_opacity_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-modern' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-overlay-image' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Archive Category Background Color setting */
	$wp_customize->add_setting( 'hongo_category_bg_color_archive', array(
		'default'			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'			=> 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_bg_color_archive', array(
		'label'				=> __( 'Category background color', 'hongo' ),
		'section'			=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_category_bg_color_archive',
		'active_callback'	=> 'hongo_category_bg_color_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_category_bg_color_archive_callback' ) ) :
	   	function hongo_category_bg_color_archive_callback( $control )	{
	        if ( ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-masonry' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-clean' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-only-text' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-image' ) && $control->manager->get_setting( 'hongo_show_category_archive' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Category Background Color setting */

	/* Archive Category Background hover Color setting*/

    $wp_customize->add_setting( 'hongo_category_bg_hover_color_archive', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_bg_hover_color_archive', array(
        'label'				=> __( 'Category hover background color', 'hongo' ),
        'section'			=> 'hongo_add_archive_layout_panel',
        'settings'			=> 'hongo_category_bg_hover_color_archive',
        'active_callback'	=> 'hongo_category_hover_color_archive_callback',
    ) ) );

    /* End Archive Category Background hover Color setting */

    /* Archive Category box border Color setting*/
    
    $wp_customize->add_setting( 'hongo_category_border_color_archive', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_border_color_archive', array(
        'label'				=> __( 'Category border color', 'hongo' ),
        'section'			=> 'hongo_add_archive_layout_panel',
        'settings'			=> 'hongo_category_border_color_archive',
        'active_callback'	=> 'hongo_category_hover_color_archive_callback',
    ) ) );

    /* End Archive Category box border Color setting*/

    /* Archive Category box border hover Color setting*/
    
    $wp_customize->add_setting( 'hongo_category_border_hover_color_archive', array(
        'default'			=> '',
        'sanitize_callback'	=> 'esc_attr',
        'transport'			=> 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_border_hover_color_archive', array(
        'label'				=> __( 'Category border hover color', 'hongo' ),
        'section'			=> 'hongo_add_archive_layout_panel',
        'settings'			=> 'hongo_category_border_hover_color_archive',
        'active_callback'	=> 'hongo_category_hover_color_archive_callback',
    ) ) );

    /* End Archive Category box border hover Color setting*/

    if ( ! function_exists( 'hongo_category_hover_color_archive_callback' ) ) :
        function hongo_category_hover_color_archive_callback( $control )    {
            if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-image' && $control->manager->get_setting( 'hongo_show_category_archive' )->value() == 1 ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

	/* Archive Separator Color setting */

	$wp_customize->add_setting( 'hongo_separator_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_separator_color_archive', array(
		'label'				=> __( 'Separator color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_separator_color_archive',
		'active_callback'	=> 'hongo_separator_color_archive_callback',
	) ) );    

	if ( ! function_exists( 'hongo_separator_color_archive_callback' ) ) :
	   	function hongo_separator_color_archive_callback( $control )	{
	        if ( ( $control->manager->get_setting( 'hongo_show_separator_archive' )->value() == '1') && ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-side-image' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-grid' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-masonry' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-clean' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-overlay-image' )  ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Separator Color setting */

	/* Archive Separator Thickness setting */

	$wp_customize->add_setting( 'hongo_seperator_height_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_seperator_height_archive', array(
		'label'				=> __( 'Separator thickness', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_seperator_height_archive',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_separator_color_archive_callback',
	) ) );

	/* End Archive Separator Thickness setting */

	/* Archive Show Box Shadow setting */
	$wp_customize->add_setting( 'hongo_box_enable_shadow_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_box_enable_shadow_archive', array(
		'label'				=> __( 'Show box shadow', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_enable_shadow_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_box_enable_shadow_archive_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_enable_shadow_archive_callback' ) ) :
	   	function hongo_box_enable_shadow_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-only-text' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Box Border setting */

	/* Archive Show Box Border setting */

	$wp_customize->add_setting( 'hongo_box_enable_border_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_box_enable_border_archive', array(
		'label'				=> __( 'Show box border', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_enable_border_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_box_enable_border_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_box_enable_border_archive_callback' ) ) :
	   	function hongo_box_enable_border_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-only-text' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-overlay-image' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Box Border setting */	

	/* Archive Box Border Color setting */

	$wp_customize->add_setting( 'hongo_box_border_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_border_color_archive', array(
		'label'				=> __( 'Box border color', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_border_color_archive',
		'active_callback'	=> 'hongo_box_border_color_archive_callback',
	) ) );

	/* End Archive Box Border Color setting */

	/* Archive Box Border Size setting */

	$wp_customize->add_setting( 'hongo_box_border_size_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_box_border_size_archive', array(
		'label'				=> __( 'Box border size', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_border_size_archive',
		'type'              => 'text',
		'active_callback'	=> 'hongo_box_border_color_archive_callback',
	) ) );

	/* End Archive Box Border Size setting */

	/* Archive Box Border Type Transform setting */

    $wp_customize->add_setting( 'hongo_box_border_type_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_box_border_type_archive', array(
		'label'				=> __( 'Box border type', 'hongo' ),
		'section'     		=> 'hongo_add_archive_layout_panel',
		'settings'			=> 'hongo_box_border_type_archive',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'hongo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'hongo' ),
								    'solid'		=> esc_html__( 'Solid', 'hongo' ),
								    'double'	=> esc_html__( 'Double', 'hongo' ),								    
								   ),
		'active_callback'	=> 'hongo_box_border_color_archive_callback',
	) ) );

	if ( ! function_exists( 'hongo_box_border_color_archive_callback' ) ) :
        function hongo_box_border_color_archive_callback( $control ) {          
            if ( $control->manager->get_setting( 'hongo_box_enable_border_archive' )->value() == '1' && ( $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-only-text' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-overlay-image' || $control->manager->get_setting( 'hongo_blog_premade_style_archive' )->value() == 'blog-standard' ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

	/* End Archive Box Border Type Transform setting */

	if ( ! function_exists( 'hongo_post_left_sidebar_layout_archive_callback' ) ) :
		function hongo_post_left_sidebar_layout_archive_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_post_layout_setting_archive' )->value() == 'hongo_layout_left_sidebar' || $control->manager->get_setting( 'hongo_post_layout_setting_archive' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_post_right_sidebar_layout_archive_callback' ) ) :
		function hongo_post_right_sidebar_layout_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_post_layout_setting_archive' )->value() == 'hongo_layout_right_sidebar' || $control->manager->get_setting( 'hongo_post_layout_setting_archive' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;
