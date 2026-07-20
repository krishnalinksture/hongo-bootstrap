<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();
	
	/*
	 * default layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_default_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_post_separator', array(
	    'label'      		=> __( 'Layout and Container', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_default_layout_panel',
	    'settings'   		=> 'hongo_default_post_separator',
	) ) );
	/* End Separator Settings */

	/* Default Layout For Post*/
	$wp_customize->add_setting( 'hongo_post_layout_setting_default', array(
		'default' 			=> 'hongo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_post_layout_setting_default', array(
		'label'       		=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_layout_setting_default',
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
		'hongo_columns'    		=> '4',
	) ) );
	/* End Default Layout For Post */

	/* Default Left Sidebar*/
	$wp_customize->add_setting( 'hongo_post_left_sidebar_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_left_sidebar_default', array(
		'label'       		=> __( 'Left sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_left_sidebar_default',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_post_left_sidebar_layout_default_callback',
	) ) );
	/* End Default Left Sidebar */

	/* Default Right Sidebar */
	
	$wp_customize->add_setting( 'hongo_post_right_sidebar_default', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_right_sidebar_default', array(
		'label'       		=> __( 'Right sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_right_sidebar_default',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_post_right_sidebar_layout_default_callback',
	) ) );
	/* End Default Right Sidebar */

	/* Default Container Setting*/
	$wp_customize->add_setting( 'hongo_post_container_style_default', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_container_style_default', array(
		'label'       		=> __( 'Container style', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_container_style_default',
		'type'              => 'select',
		'choices'           => array(
									'container'						=> esc_html__( 'Fixed', 'hongo' ),
								    'container-fluid'				=> esc_html__( 'Full width', 'hongo' ),
									'container-fluid-with-padding'	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
							   ),
	) ) );
	/* End Default Container Setting */

	/* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_post_container_fluid_with_padding_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_container_fluid_with_padding_default', array(
		'label'       		=> __( 'Full width padding', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_container_fluid_with_padding_default',
		'type'              => 'text',
		'active_callback'	=> 'hongo_post_container_fluid_with_padding_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_post_container_fluid_with_padding_default_callback' ) ) :
	   	function hongo_post_container_fluid_with_padding_default_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_post_container_style_default' )->value() == 'container-fluid-with-padding' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* End Container custom Width setting */

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_default_post_list_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_post_list_style_separator', array(
	    'label'      		=> __( 'Post list style and data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_default_layout_panel',
	    'settings'   		=> 'hongo_default_post_list_style_separator',
	) ) );

	/* End Separator Settings */

	/* Default Type */

	/* Default Style setting */

    $wp_customize->add_setting( 'hongo_blog_premade_style_default', array(
		'default' 			=> 'blog-grid',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_blog_premade_style_default', array(
		'label'       		=> __( 'Post list style', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_blog_premade_style_default',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'blog-side-image'		=> __( 'Side image', 'hongo' ),
								    'blog-masonry' 	        => __( 'Masonry', 'hongo' ),
								    'blog-grid'		        => __( 'Grid', 'hongo' ),
									'blog-clean'		    => __( 'Clean', 'hongo' ),
									'blog-modern'		    => __( 'Modern', 'hongo' ),
									'blog-only-text'		=> __( 'Only text', 'hongo' ),
									'blog-overlay-image'    => __( 'Overlay image', 'hongo' ),
                    				'blog-image'            => __( 'Blog image', 'hongo' ),
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
	/* End Default Style setting */

	/* Default Column Type setting */

    $wp_customize->add_setting( 'hongo_blog_column_default', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_blog_column_default', array(
		'label'       		=> __( 'No. of columns', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_blog_column_default',
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
		'hongo_columns'    	=> '3',
		'active_callback'   => 'hongo_blog_column_default_callback'
	) ) );

	if ( ! function_exists( 'hongo_blog_column_default_callback' ) ) :
	   	function hongo_blog_column_default_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() != 'blog-standard') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Column Type setting */

	/* Default Blog Type setting */

    $wp_customize->add_setting( 'hongo_blog_type_default', array(
		'default' 			=> 'gutter-medium',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_blog_type_default', array(
		'label'       		=> __( 'Spacing between columns', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_blog_type_default',
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
		'active_callback'	=> 'hongo_blog_column_spacing_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_blog_column_spacing_default_callback' ) ) :
	   	function hongo_blog_column_spacing_default_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() != 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Blog Type setting */

	/* Default Animation setting */

    $wp_customize->add_setting( 'hongo_animation_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Animation_Control( $wp_customize, 'hongo_animation_default', array(
		'label'       		=> __( 'Animation', 'hongo' ),
		'type'              => 'hongo_animation_style',
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_animation_default',
	) ) );
	/* End Default Animation setting */

	/* default Blog Title setting */

    $wp_customize->add_setting( 'hongo_default_post_title_default', array(
		'default' 			=> __( 'Blog', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_default_post_title_default', array(
		'label'       		=> __( 'Blog title', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_default_post_title_default',
		'type'              => 'text',
	) ) );
	/* End default Posts Per Page setting */

	/* Default Show Pagination setting*/
	$wp_customize->add_setting( 'hongo_show_pagination_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_pagination_default', array(
		'label'       		=> __( 'Pagination', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_pagination_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Pagination setting */

	/* Default Show Pagination setting*/
	$wp_customize->add_setting( 'hongo_blog_pagination_style_default', array(
		'default' 			=> 'number-pagination',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_pagination_style_default', array(
		'label'       		=> __( 'Pagination style', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_blog_pagination_style_default',
		'type'              => 'select',
		'choices'           => array(
									''								=> esc_html__( 'Select', 'hongo' ),
								    'number-pagination' 			=> esc_html__( 'Number pagination', 'hongo' ),
								    'infinite-scroll-pagination'	=> esc_html__( 'Infinite scroll', 'hongo' ),
								    'loadmore'						=> esc_html__( 'Load more button', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_pagination_style_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_pagination_style_default_callback' ) ) :
	   	function hongo_pagination_style_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_pagination_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Show Pagination setting */

	/* Default Show Post Thumbnail setting*/
	$wp_customize->add_setting( 'hongo_show_post_thumbnail_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_default', array(
		'label'       		=> __( 'Post thumbnail', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );	

	/* End Default Show Post Thumbnail setting */

	/* Default Show Post Format Setting*/
	$wp_customize->add_setting( 'hongo_show_post_format_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_format_default', array(
		'label'       		=> __( 'Post featured image only', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_format_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_post_format_default_callback',
	) ) );
    if ( ! function_exists( 'hongo_show_post_format_default_callback' ) ) :
	   	function hongo_show_post_format_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_thumbnail_default' )->value( '1' ) && $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	
	/* End Default Show Post Format Setting */

	/* Default Show Post Thumbnail Icon setting*/
	$wp_customize->add_setting( 'hongo_show_post_thumbnail_icon_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_icon_default', array(
		'label'       		=> __( 'Post type icon', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_icon_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_post_thumbnail_icon_default_icon_callback',
	) ) );

	if ( ! function_exists( 'hongo_post_thumbnail_icon_default_icon_callback' ) ) :
	   	function hongo_post_thumbnail_icon_default_icon_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_thumbnail_default' )->value( '1' ) && $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() != 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Show Post Thumbnail Icon setting */

	/* Default Image srcset setting */

    $wp_customize->add_setting( 'hongo_image_srcset_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_image_srcset_default', array(
		'label'       		=> __( 'Post thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_image_srcset_default',
		'active_callback'	=> 'hongo_image_srcset_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_image_srcset_default_callback' ) ) :
	   	function hongo_image_srcset_default_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_show_post_thumbnail_default' )->value( '1' ) ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Type */	

	/* Default Show Post Title setting*/
	$wp_customize->add_setting( 'hongo_show_post_title_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_title_default', array(
		'label'       		=> __( 'Post title', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_title_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Post Title setting */

	/* Default Show Separator setting */
	$wp_customize->add_setting( 'hongo_show_separator_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_separator_default', array(
		'label'       		=> __( 'Separator', 'hongo' ),
		'section'     		=>	'hongo_add_default_layout_panel',
		'settings'			=>	'hongo_show_separator_default',
		'type'              =>	'hongo_switch',
		'choices'           =>	array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   	),
		'active_callback'	=> 'hongo_show_separator_default_callback'
	) ) );

	if ( ! function_exists( 'hongo_show_separator_default_callback' ) ) :
   	function hongo_show_separator_default_callback( $control )	{
        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-side-image' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-grid' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-masonry' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-clean' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-overlay-image' ) {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;
	/* End Default Show Separator setting */

	/* Default Show Post Author setting */
	$wp_customize->add_setting( 'hongo_show_post_author_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_author_default', array(
		'label'       		=> __( 'Post author', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_author_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Post Author setting */
	
	/* Default Show Post Author Image setting*/
	$wp_customize->add_setting( 'hongo_show_post_author_image_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_author_image_default', array(
		'label'       		=> __( 'Post author image', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_author_image_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_post_author_default_callback'
	) ) );

	if ( ! function_exists( 'hongo_show_post_author_default_callback' ) ) :
   	function hongo_show_post_author_default_callback( $control )	{
        if ( $control->manager->get_setting( 'hongo_show_post_author_default' )->value() == '1') {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;
	/*End Default Show Post Author Image setting */

	/* Default Show Post Date setting*/
	$wp_customize->add_setting( 'hongo_show_post_date_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_date_default', array(
		'label'       		=> __( 'Post date', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_date_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Post Date setting */

	/* Default Date Format setting*/
	$wp_customize->add_setting( 'hongo_date_format_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_date_format_default', array(
		'label'       		=> __( 'Post date format', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_date_format_default',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo' ), '//wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
		'active_callback'   => 'hongo_date_format_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_date_format_default_callback' ) ) :
	   	function hongo_date_format_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_date_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Date Format setting */

	/* Default Show Excerpt setting*/
	$wp_customize->add_setting( 'hongo_show_excerpt_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_excerpt_default', array(
		'label'       		=> __( 'Post excerpt', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_excerpt_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Excerpt setting */

	/* Default Excerpt Length setting */

    $wp_customize->add_setting( 'hongo_excerpt_length_default', array(
		'default' 			=> 15,
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_excerpt_length_default', array(
		'label'       		=> __( 'Excerpt length', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_excerpt_length_default',
		'type'              => 'text',
		'active_callback'   => 'hongo_excerpt_length_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_excerpt_length_default_callback' ) ) :
	   	function hongo_excerpt_length_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Excerpt Length setting */

	/* Default Show Content setting*/
	$wp_customize->add_setting( 'hongo_show_content_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_content_default', array(
		'label'       		=> __( 'Post full content', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_content_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_show_content_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_content_default_callback' ) ) :
	   	function hongo_show_content_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_default' )->value() == '0') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Show Content setting */

	/* Default Show Categories setting*/
	$wp_customize->add_setting( 'hongo_show_category_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_category_default', array(
		'label'       		=> __( 'Post categories', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_category_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Categories setting */

	/* Default Show like setting*/
	$wp_customize->add_setting( 'hongo_show_like_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_like_default', array(
		'label'       		=> __( 'Post likes', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_like_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show like setting */

	/* Default Show Comment setting*/
	$wp_customize->add_setting( 'hongo_show_comment_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_comment_default', array(
		'label'       		=> __( 'Post comments', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_comment_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );
	/* End Default Show Comment setting */

	/* Default Show Button setting*/
	$wp_customize->add_setting( 'hongo_show_button_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_button_default', array(
		'label'       		=> __( 'Read more button', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_button_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_button_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_button_default_callback' ) ) :
	   	function hongo_show_button_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() != 'blog-overlay-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Show Button setting */

	/* Default Button Text setting*/
	$wp_customize->add_setting( 'hongo_button_text_default', array(
		'default' 			=> __( 'continue reading', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_button_text_default', array(
		'label'       		=> __( 'Button text', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_text_default',
		'type'              => 'text',
		'active_callback'	=> 'hongo_button_text_default_callback'
	) ) );

	if ( ! function_exists( 'hongo_button_text_default_callback' ) ) :
	   	function hongo_button_text_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_button_default' )->value() == '1' && $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() != 'blog-overlay-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Button Text setting */

	/* Title Typography Separator setting */
	$wp_customize->add_setting( 'hongo_default_layout_separator_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_layout_separator_title_typography', array(
	    'label'      		=> __( 'Title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_default_layout_panel',
	    'settings'   		=> 'hongo_default_layout_separator_title_typography',
	    'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );

	if ( ! function_exists( 'hongo_default_layout_title_typography_callback' ) ) :
	   	function hongo_default_layout_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_title_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Title Typography Separator setting */

	/* Default Font size setting*/
	$wp_customize->add_setting( 'hongo_title_font_size_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_font_size_default', array(
		'label'       		=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_title_font_size_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Font size setting */

	/* Default Line height setting*/
	$wp_customize->add_setting( 'hongo_title_line_height_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_line_height_default', array(
		'label'       		=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_title_line_height_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Line height setting */

	/* Default Letter spacing setting*/
	$wp_customize->add_setting( 'hongo_title_letter_spacing_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_letter_spacing_default', array(
		'label'       		=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_title_letter_spacing_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Letter spacing setting */

	/* Default Font weight setting */

    $wp_customize->add_setting( 'hongo_title_font_weight_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_font_weight_default', array(
		'label'       		=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_title_font_weight_default',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Font weight setting */

	/* Default Post Title Text Transform setting */
    $wp_customize->add_setting( 'hongo_blog_post_title_text_transform_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_post_title_text_transform_default', array(
		'label'       		=> __( 'Post title text case', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_blog_post_title_text_transform_default',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),
								    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Post Title Text Transform setting */

	/* Default Title Color setting*/
	$wp_customize->add_setting( 'hongo_title_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_title_color_default', array(
		'label'       		=> __( 'Title color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_title_color_default',
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Title Color setting */

	/* Default Title Hover Color setting*/
	$wp_customize->add_setting( 'hongo_title_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_title_hover_color_default', array(
		'label'       		=> __( 'Title hover color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_title_hover_color_default',
		'active_callback'	=> 'hongo_default_layout_title_typography_callback',
	) ) );
	/* End Default Title Hover Color setting */

	/* Content Typography Separator setting */
	$wp_customize->add_setting( 'hongo_default_layout_separator_content_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_layout_separator_content_typography', array(
	    'label'      		=> __( 'Content typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_default_layout_panel',
	    'settings'   		=> 'hongo_default_layout_separator_content_typography',
	    'active_callback'	=> 'hongo_default_layout_content_typography_callback',
	) ) );

	/* End Content Typography Separator setting */

	/* Default Content Font size setting*/
	$wp_customize->add_setting( 'hongo_content_font_size_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_font_size_default', array(
		'label'       		=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_content_font_size_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_default_layout_content_typography_callback',
	) ) );
	/* End Default Content Font size setting */

	/* Default Content Line height setting*/
	$wp_customize->add_setting( 'hongo_content_line_height_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_line_height_default', array(
		'label'       		=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_content_line_height_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_default_layout_content_typography_callback',
	) ) );
	/* End Default Content Line height setting */

	/* Default Content Letter spacing setting*/
	$wp_customize->add_setting( 'hongo_content_letter_spacing_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_letter_spacing_default', array(
		'label'       		=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_content_letter_spacing_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_default_layout_content_typography_callback',
	) ) );
	/* End Default Content Letter spacing setting */

	/* Default Content Font weight setting */

    $wp_customize->add_setting( 'hongo_content_font_weight_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_font_weight_default', array(
		'label'       		=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_content_font_weight_default',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_default_layout_content_typography_callback',
	) ) );
	/* End Default Content Font weight setting */	

	/* Default content Color setting */
	$wp_customize->add_setting( 'hongo_content_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_content_color_default', array(
		'label'       		=> __( 'Content color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_content_color_default',
		'active_callback'	=> 'hongo_default_layout_content_typography_callback',
	) ) );
		
	/* End Default content Color setting */

	if ( ! function_exists( 'hongo_default_layout_content_typography_callback' ) ) :
	   	function hongo_default_layout_content_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_default' )->value() == '1' || $control->manager->get_setting( 'hongo_show_content_default' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Style Separator setting*/
	$wp_customize->add_setting( 'hongo_default_layout_separator_style_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_layout_separator_style_color', array(
	    'label'      		=> __( 'Post meta and button colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_default_layout_panel',
	    'settings'   		=> 'hongo_default_layout_separator_style_color',
	) ) );
	/* End Style Separator setting */

	/* Default Post Meta Color setting*/
	$wp_customize->add_setting( 'hongo_post_meta_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_meta_color_default', array(
		'label'       		=> __( 'Post meta color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_meta_color_default',
	) ) );
	/* End Default Post Meta Color setting */

	/* Default Post Meta Hover Color setting*/
	$wp_customize->add_setting( 'hongo_post_meta_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_meta_hover_color_default', array(
		'label'       		=> __( 'Post meta hover color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_meta_hover_color_default',
	) ) );
	/* End Default Post Meta Hover Color setting */

	/* Default Button Color setting*/
	$wp_customize->add_setting( 'hongo_button_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_color_default', array(
		'label'       		=> __( 'Button color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_color_default',
		'active_callback'	=> 'hongo_button_color_default_callback',
	) ) );

    if ( ! function_exists( 'hongo_button_color_default_callback' ) ) :
	   	function hongo_button_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_button_default' )->value() == '1' && $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() != 'blog-overlay-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Button Color setting */

	/* Default Button Hover Color setting*/
	$wp_customize->add_setting( 'hongo_button_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_color_default', array(
		'label'       		=> __( 'Button hover color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_hover_color_default',
		'active_callback'	=> 'hongo_button_color_default_callback',
	) ) );
	/* End Default Button Hover Color setting */

	/* Default Button Text Color setting*/
	$wp_customize->add_setting( 'hongo_button_text_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_text_color_default', array(
		'label'       		=> __( 'Button text color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_text_color_default',
		'active_callback'	=> 'hongo_button_color_default_callback',
	) ) );
	/* End Default Button Text Color setting */

	/* Default Button Hover Text Color setting*/
	$wp_customize->add_setting( 'hongo_button_hover_text_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_text_color_default', array(
		'label'       		=> __( 'Button text hover color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_hover_text_color_default',
		'active_callback'	=> 'hongo_button_color_default_callback',
	) ) );
	/* End Default Button Hover Text Color setting */

	/* Default Button Border Color setting*/
	$wp_customize->add_setting( 'hongo_button_border_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_border_color_default', array(
		'label'       		=> __( 'Button border color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_border_color_default',
		'active_callback'	=> 'hongo_button_color_default_callback',
	) ) );
	/* End Default Button Border Color setting */

	/* Default Button Border Color setting*/
	$wp_customize->add_setting( 'hongo_button_border_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_border_hover_color_default', array(
		'label'       		=> __( 'Button hover border color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_button_border_hover_color_default',
		'active_callback'	=> 'hongo_button_color_default_callback',
	) ) );
	/* End Default Button Border Color setting */
	
	/* Style Separator setting*/
	$wp_customize->add_setting( 'hongo_default_layout_separator_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_layout_separator_style', array(
	    'label'      		=> __( 'Extra setting', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_default_layout_panel',
	    'settings'   		=> 'hongo_default_layout_separator_style',
	) ) );
	/* End Style Separator setting */

	/* Default Post Meta Text Transform setting */
    $wp_customize->add_setting( 'hongo_blog_post_meta_text_transform_default', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_post_meta_text_transform_default', array(
		'label'       		=> __( 'Post meta text case', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_blog_post_meta_text_transform_default',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),									
								    'text-uppercase'		=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								   ),
	) ) );
	/* End Default Post Meta Text Transform setting */

	/* Default Post Grid Zoom effect*/
	$wp_customize->add_setting( 'hongo_show_post_thumbnail_zoom_effect_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_zoom_effect_default', array(
		'label'       		=> __( 'Image effect on hover', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_zoom_effect_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_show_post_thumbnail_zoom_effect_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_post_thumbnail_zoom_effect_default_callback' ) ) :
	   	function hongo_show_post_thumbnail_zoom_effect_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-masonry' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-grid' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-modern' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-image' ||
	        	$control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-clean' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Post Grid Zoom effect */

	/* Default Show Categories setting*/
	$wp_customize->add_setting( 'hongo_image_hover_icon_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_image_hover_icon_default', array(
		'label'       		=> __( 'Hover icon', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_image_hover_icon_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_image_hover_icon_default_callback',
	) ) );

	if ( ! function_exists( 'hongo_image_hover_icon_default_callback' ) ) :
	   	function hongo_image_hover_icon_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-clean' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Show Categories setting */

	/* Default Category Background Color setting*/
	$wp_customize->add_setting( 'hongo_category_bg_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_bg_color_default', array(
		'label'       		=> __( 'Category background color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_category_bg_color_default',
		'active_callback'	=> 'hongo_category_bg_color_default_callback',
	) ) );

    if ( ! function_exists( 'hongo_category_bg_color_default_callback' ) ) :
	   	function hongo_category_bg_color_default_callback( $control )	{
	        if ( ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-masonry' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-clean' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-only-text' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-image' ) && $control->manager->get_setting( 'hongo_show_category_default' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Category Background Color setting */

	/* Default Category Background hover Color setting*/

	$wp_customize->add_setting( 'hongo_category_bg_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_bg_hover_color_default', array(
		'label'       		=> __( 'Category hover background color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_category_bg_hover_color_default',
		'active_callback'	=> 'hongo_category_hover_color_default_callback',
	) ) );

	/* End Default Category Background hover Color setting */

	/* Default Category box border Color setting*/
	
	$wp_customize->add_setting( 'hongo_category_border_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_border_color_default', array(
		'label'       		=> __( 'Category border color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_category_border_color_default',
		'active_callback'	=> 'hongo_category_hover_color_default_callback',
	) ) );

	/* End Default Category box border Color setting*/

	/* Default Category box border hover Color setting*/
	
	$wp_customize->add_setting( 'hongo_category_border_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_category_border_hover_color_default', array(
		'label'       		=> __( 'Category border hover color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_category_border_hover_color_default',
		'active_callback'	=> 'hongo_category_hover_color_default_callback',
	) ) );

	/* End Default Category box border hover Color setting*/

    if ( ! function_exists( 'hongo_category_hover_color_default_callback' ) ) :
	   	function hongo_category_hover_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-image' && $control->manager->get_setting( 'hongo_show_category_default' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	

	/* Default Box Background Color setting*/
	$wp_customize->add_setting( 'hongo_box_bg_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_bg_color_default', array(
		'label'       		=> __( 'Box background color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_bg_color_default',
		'active_callback'	=> 'hongo_box_bg_color_default_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_bg_color_default_callback' ) ) :
	   	function hongo_box_bg_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-masonry' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-modern' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-overlay-image' ||
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-only-text' || 
	        	 $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Box Background Color setting */

	/* Default Box Background Color setting*/
	$wp_customize->add_setting( 'hongo_box_bg_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_bg_hover_color_default', array(
		'label'       		=> __( 'Box hover background color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_bg_hover_color_default',
		'active_callback'	=> 'hongo_box_bg_hover_color_default_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_bg_hover_color_default_callback' ) ) :
	   	function hongo_box_bg_hover_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-only-text') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Box Background Color setting */

	/* Image Opacity */

    $wp_customize->add_setting( 'hongo_image_opacity_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_image_opacity_default', array(
		'label'       		=> __( 'Hover overlay opacity', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_image_opacity_default',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Default', 'hongo' ),
									'0.0'   => esc_html__( 'No Opacity', 'hongo' ),
								    '0.1'   => esc_html__( '0.1', 'hongo' ),
								    '0.2'   => esc_html__( '0.2', 'hongo' ),
								    '0.3'   => esc_html__( '0.3', 'hongo' ),
								    '0.4'   => esc_html__( '0.4', 'hongo' ),
								    '0.5'   => esc_html__( '0.5', 'hongo' ),
								    '0.6'   => esc_html__( '0.6', 'hongo' ),
								    '0.7'   => esc_html__( '0.7', 'hongo' ),
								    '0.8'   => esc_html__( '0.8', 'hongo' ),
								    '0.9'   => esc_html__( '0.9', 'hongo' ),
								    '1.0'   => esc_html__( '1.0', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_image_opacity_default_callback',
	) ) );

	/* End Image Opacity */

	/* Image Opacity Color setting*/
	$wp_customize->add_setting( 'hongo_image_opacity_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_image_opacity_color_default', array(
		'label'       		=> __( 'Hover overlay color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_image_opacity_color_default',
		'active_callback'	=> 'hongo_image_opacity_default_callback',
	) ) );
	/* End Image Opacity Color setting */


	if ( ! function_exists( 'hongo_image_opacity_default_callback' ) ) :
	   	function hongo_image_opacity_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-modern' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-overlay-image' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-image' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* Default Separator Color setting*/
	$wp_customize->add_setting( 'hongo_separator_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_separator_color_default', array(
		'label'       		=> __( 'Separator color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_separator_color_default',
		'active_callback'	=> 'hongo_separator_color_default_callback',
	) ) );

    if ( ! function_exists( 'hongo_separator_color_default_callback' ) ) :
	   	function hongo_separator_color_default_callback( $control )	{
	        if ( ( $control->manager->get_setting( 'hongo_show_separator_default' )->value() == '1') && ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-side-image' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-grid' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-masonry' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-clean' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-overlay-image' )  ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Separator Color setting */

	/* Default Separator Thickness setting*/
	$wp_customize->add_setting( 'hongo_seperator_height_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_seperator_height_default', array(
		'label'       		=> __( 'Separator thickness', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_seperator_height_default',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_separator_color_default_callback',
	) ) );
	/* End Default Separator Thickness setting */
	
	/* Default Show Box Shadow setting */
	$wp_customize->add_setting( 'hongo_box_enable_shadow_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_box_enable_shadow_default', array(
		'label'       		=> __( 'Show box shadow', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_enable_shadow_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_box_enable_shadow_default_callback',
	) ) );

     if ( ! function_exists( 'hongo_box_enable_shadow_default_callback' ) ) {
	   	function hongo_box_enable_shadow_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-only-text' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}
	/* End Default Show Box Border setting */

	/* Default Show Box Border setting */
	$wp_customize->add_setting( 'hongo_box_enable_border_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_box_enable_border_default', array(
		'label'       		=> __( 'Show box border', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_enable_border_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_box_enable_border_default_callback',
	) ) );

     if ( ! function_exists( 'hongo_box_enable_border_default_callback' ) ) {
	   	function hongo_box_enable_border_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-only-text' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-overlay-image' || 
	        	$control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-standard' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}
	/* End Default Show Box Border setting */

	/* Default Box Border Color setting*/
	$wp_customize->add_setting( 'hongo_box_border_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_border_color_default', array(
		'label'       		=> __( 'Box border color', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_border_color_default',
		'active_callback'	=> 'hongo_box_border_color_default_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_border_color_default_callback' ) ) :
	   	function hongo_box_border_color_default_callback( $control ) {	   		
	        if ( $control->manager->get_setting( 'hongo_box_enable_border_default' )->value() == '1' && ( $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-only-text' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-overlay-image' || $control->manager->get_setting( 'hongo_blog_premade_style_default' )->value() == 'blog-standard' ) ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/*End Default Box Border Color setting */

	/* Default Box Border Size setting*/
	$wp_customize->add_setting( 'hongo_box_border_size_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_box_border_size_default', array(
		'label'       		=> __( 'Box border size', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_border_size_default',
		'type'              => 'text',
		'active_callback'	=> 'hongo_box_border_color_default_callback',
	) ) );
	/* End Default Box Border Size setting */

	/* Default Box Border Type Transform setting */

    $wp_customize->add_setting( 'hongo_box_border_type_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_box_border_type_default', array(
		'label'       		=> __( 'Box border type', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_box_border_type_default',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'hongo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'hongo' ),
								    'solid'		=> esc_html__( 'Solid', 'hongo' ),
								    'double'	=> esc_html__( 'Double', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_box_border_color_default_callback',
	) ) );
	/* End Default Box Border Type Transform setting */

	if ( ! function_exists( 'hongo_post_left_sidebar_layout_default_callback' ) ) :
		function hongo_post_left_sidebar_layout_default_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_post_layout_setting_default' )->value() == 'hongo_layout_left_sidebar' || $control->manager->get_setting( 'hongo_post_layout_setting_default' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_post_right_sidebar_layout_default_callback' ) ) :
		function hongo_post_right_sidebar_layout_default_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_post_layout_setting_default' )->value() == 'hongo_layout_right_sidebar' || $control->manager->get_setting( 'hongo_post_layout_setting_default' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;
