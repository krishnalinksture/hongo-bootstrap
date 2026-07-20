<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();
	
	/*
	 * Post layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_post_separator', array(
	    'label'				=> __( 'Layout and container', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'   		=> 'hongo_single_post_separator',
	) ) );

	/* End Separator Settings */

	/* General Layout For Post */

	$wp_customize->add_setting( 'hongo_single_post_layout_setting', array(
		'default' 			=> 'hongo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_post_layout_setting', array(
		'label'				=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_single_post_layout_setting',
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
		'hongo_columns'    	=> '4',
	) ) );

	/* End General Layout For Post */

	/* Post Left Sidebar */

	$wp_customize->add_setting( 'hongo_single_post_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_post_left_sidebar', array(
		'label'				=> __( 'Left sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_single_post_left_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_post_left_sidebar_layout_callback',
	) ) );

	/* End Post Left Sidebar */

	/* Post Right Sidebar */
	
	$wp_customize->add_setting( 'hongo_single_post_right_sidebar', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_post_right_sidebar', array(
		'label'				=> __( 'Right sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_single_post_right_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_post_right_sidebar_layout_callback',
	) ) );

	/* End Post Right Sidebar */

	/* Post Container Setting */

	$wp_customize->add_setting( 'hongo_single_post_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_post_container_style', array(
		'label'				=> __( 'Container style', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_single_post_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container'						=> esc_html__( 'Fixed', 'hongo' ),
								    'container-fluid'				=> esc_html__( 'Full width', 'hongo' ),
									'container-fluid-with-padding' 	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
							   ),	
	) ) );

	/* End Post Container Setting */

	/* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_single_post_container_fluid_with_padding', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_post_container_fluid_with_padding', array(
		'label'				=> __( 'Full width padding', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_single_post_container_fluid_with_padding',
		'type'              => 'text',
		'active_callback'	=> 'hongo_single_post_container_fluid_with_padding_callback',		
	) ) );

	if ( ! function_exists( 'hongo_single_post_container_fluid_with_padding_callback' ) ) :
	   	function hongo_single_post_container_fluid_with_padding_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_single_post_container_style' )->value() == 'container-fluid-with-padding' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* End Container custom Width setting */

	/* Rich Snippet */

	$wp_customize->add_setting( 'hongo_post_rich_snippet', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_post_rich_snippet', array(
		'label'				=> __( 'Rich Snippet', 'hongo' ),
		'section'			=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_post_rich_snippet',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Rich Snippet */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_post_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_post_style_separator', array(
	    'label'				=> __( 'Post style and data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'   		=> 'hongo_single_post_style_separator',
	) ) );

	/* End Separator Settings */	

	/* Hide Feature Image */

    $wp_customize->add_setting( 'hongo_featured_image', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_featured_image', array(
		'label'				=> __( 'Featured image', 'hongo' ),
		'section'			=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_featured_image',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Hide Feature Image */

	/* Hide Date */

    $wp_customize->add_setting( 'hongo_enable_date', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_date', array(
		'label'				=> __( 'Date', 'hongo' ),
		'section'			=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_date',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Hide Date */

	/* Post Date Format */

	$wp_customize->add_setting( 'hongo_post_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_date_format', array(
		'label'				=> __( 'Date format', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_post_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo' ), '//wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
		'active_callback'   => 'hongo_post_date_callback',
	) ) );

	/* End Post Date Format */

	/* Hide Author */

    $wp_customize->add_setting( 'hongo_enable_author', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_author', array(
		'label'				=> __( 'Author', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_author',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Hide Author */

	/* Post Style Setting */

	$wp_customize->add_setting( 'hongo_post_layout_style', array(
		'default' 			=> 'post-layout-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_post_layout_style', array(
		'label'				=> __( 'Post style', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_post_layout_style',
		'type'              => 'select',
		'choices'           => array(
								    'post-layout-style-1' => esc_html__( 'Single Post Layout Style 1', 'hongo' ),
									'post-layout-style-2' => esc_html__( 'Single Post Layout Style 2', 'hongo' ),									
							   ),
	) ) );

	/* End Post Style Setting */

	/* Hide Category */

    $wp_customize->add_setting( 'hongo_enable_category', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_category', array(
		'label'				=> __( 'Category', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_category',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Category */

	/* Hide Tags */

    $wp_customize->add_setting( 'hongo_enable_tags', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_tags', array(
		'label'				=> __( 'Tags', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_tags',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Tags */

	/* Hide Navigation Links */

    $wp_customize->add_setting( 'hongo_enable_navigation_link', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_navigation_link', array(
		'label'				=> __( 'Navigation link', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_navigation_link',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Navigation Links */

	/* Hide Like */

	$wp_customize->add_setting( 'hongo_enable_like', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_like', array(
		'label'				=> __( 'Like', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_like',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Like */

	/* Hide Share */

	$wp_customize->add_setting( 'hongo_enable_share', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_share', array(
		'label'				=> __( 'Share', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_share',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Share */

	/* Hide Post Author Box */

	$wp_customize->add_setting( 'hongo_enable_post_author_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_post_author_box', array(
		'label'				=> __( 'Author box', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_post_author_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Post Author Box */

	/* Author Button Title */

    $wp_customize->add_setting( 'hongo_author_box_button_title', array(
		'default' 			=> __( 'All author posts', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_author_box_button_title', array(
		'label'				=> __( 'Author box button title', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_author_box_button_title',
		'type'              => 'text',
		'active_callback'   => 'hongo_author_box_callback',
	) ) );

	/* End Author Button Title */

	/* Hide Comment */

	$wp_customize->add_setting( 'hongo_enable_comment', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_comment', array(
		'label'				=> __( 'Comment', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_comment',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Hide Comment */

	/* Single Post Meta Text Transform setting */

    $wp_customize->add_setting( 'hongo_single_post_meta_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_post_meta_text_transform', array(
		'label'				=> __( 'Post meta text case', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_single_post_meta_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),
									'text-uppercase'		=> esc_html__( 'Uppercase', 'hongo' ),
									'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
									'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
									'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								),
	) ) );

	/* End Single Post Meta Text Transform setting */

	/* Main Section Top Space */

    $wp_customize->add_setting( 'hongo_main_top_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_main_top_section_space', array(
		'label'				=> __( 'Main section top space ( In pixel )', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_main_top_section_space',
		'type'              => 'text',
	) ) );

	/* End Main Section Top Space */

	/* Main Section Bottom Space */

    $wp_customize->add_setting( 'hongo_main_bottom_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_main_bottom_section_space', array(
		'label'				=> __( 'Main section bottom space ( In pixel )', 'hongo' ),
		'section'			=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_main_bottom_section_space',
		'type'				=> 'text',
	) ) );

	/* End Main Section Bottom Space */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_post_related_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_post_related_separator', array(
	    'label'				=> __( 'Related posts', 'hongo' ),
	    'type'				=> 'hongo_separator',
	    'section'			=> 'hongo_add_post_layout_panel',
	    'settings'			=> 'hongo_single_post_related_separator',
	) ) );

	/* End Separator Settings */

	/* Hide Related Posts */

	$wp_customize->add_setting( 'hongo_enable_related_posts', array(
		'default' 			=> '1',
		'sanitize_callback'	=> 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_related_posts', array(
		'label'				=> __( 'Related posts', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_enable_related_posts',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Hide Related Posts */

	/*  No. of Columns  */

	$wp_customize->add_setting( 'hongo_no_of_related_posts_columns', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_no_of_related_posts_columns', array(
		'label'				=> __( 'No. of columns', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_no_of_related_posts_columns',
		'type'              => 'hongo_preview_image',
		'choices'    		=> array(
									'2' => '2',
									'3' => '3',
									'4' => '4',
									'6' => '6',
							 	),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'hongo_columns'    	=> '4',
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End No. of Columns */

	/* Featured Image Size */

    $wp_customize->add_setting( 'hongo_related_post_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_related_post_feature_image_size', array(
		'label'				=> __( 'Post thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_post_feature_image_size',
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Featured Image Size */

    /* Related Post Block Title */

    $wp_customize->add_setting( 'hongo_related_posts_title', array(
		'default' 			=> __( 'Related Posts', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_related_posts_title', array(
		'label'				=> __( 'Title', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_posts_title',
		'type'              => 'text',
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Related Post Block Title */

	/*  No. of related post  */

	$wp_customize->add_setting( 'hongo_no_of_related_posts', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_no_of_related_posts', array(
		'label'				=> __( 'No. of posts', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_no_of_related_posts',
		'type'      		=> 'select',
		'choices'    		=> array(
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
									'5' => '5',
									'6' => '6',
							 	),
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End No. of related post */

	/* Hide Related Block Thumbnail */

    $wp_customize->add_setting( 'hongo_related_posts_enable_post_thumbnail', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_related_posts_enable_post_thumbnail', array(
		'label'				=> __( 'Post thumbnail', 'hongo' ),
		'section'			=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_posts_enable_post_thumbnail',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Hide Related Block Thumbnail */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'hongo_related_posts_enable_date', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_related_posts_enable_date', array(
		'label'				=> __( 'Post date', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_posts_enable_date',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Related Post Block Date */

    $wp_customize->add_setting( 'hongo_related_posts_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_related_posts_date_format', array(
		'label'				=> __( 'Post date format', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_posts_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo' ), '//wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
		'active_callback'   => 'hongo_related_posts_date_callback',
	) ) );

	/* End Related Post Block Date */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'hongo_related_posts_enable_author', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_related_posts_enable_author', array(
		'label'				=> __( 'Post author', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_posts_enable_author',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Hide Separator */

    $wp_customize->add_setting( 'hongo_related_posts_separator', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_related_posts_separator', array(
		'label'				=> __( 'Post separator', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_posts_separator',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Hide Separator */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'hongo_related_post_excerpt', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_related_post_excerpt', array(
		'label'				=> __( 'Post excerpt', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_related_post_excerpt',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Excerpt Length */

	$wp_customize->add_setting( 'hongo_related_post_excerpt_length', array(
		'default' 			=> '15',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_related_post_excerpt_length', array(
	    'label'				=> __( 'Excerpt length', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_excerpt_length',
	    'type'       		=> 'text',
	    'active_callback'   => 'hongo_related_posts_excerpt_callback',
	) );

	/* End Excerpt Length  */

	/* Related Post Title Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_general_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_general_title_color', array(
	    'label'				=> __( 'Related title color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_general_title_color',
	    'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Related Post Title Color Setting */

	/* Related Post Title Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_title_color', array(
	    'label'				=> __( 'Title color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_title_color',
	    'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Related Post Title Color Setting */

	/* Related Post Title Hover Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_title_hover_color', array(
	    'label'				=> __( 'Title hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_title_hover_color',
	    'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Related Post Title Hover Color Setting */

	/* Related Post Meta Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_meta_color', array(
	    'label'				=> __( 'Meta color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_meta_color',
	    'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Related Post Meta Color Setting */

	/* Related Post Meta Hover Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_meta_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_meta_hover_color', array(
	    'label'				=> __( 'Meta hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_meta_hover_color',
	    'active_callback'   => 'hongo_related_posts_callback',
	) ) );

	/* End Related Post Meta Hover Color Setting */

	/* Related Post Content Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_content_color', array(
	    'label'				=> __( 'Content color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_content_color',
	    'active_callback'   => 'hongo_related_posts_excerpt_callback',
	) ) );

	/* End Related Post Content Color Setting */

	/* Related Post Separator Color Setting */

	$wp_customize->add_setting( 'hongo_related_post_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_related_post_separator_color', array(
	    'label'				=> __( 'Separator color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_related_post_separator_color',
	    'active_callback'   => 'hongo_related_posts_separator_callback',
	) ) );

	/* End Related Post Separator Color Setting */

	/* Color Separator Setting */

	$wp_customize->add_setting( 'hongo_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_post_separator', array(
	    'label'				=> __( 'Font and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'   		=> 'hongo_post_separator',
	) ) );

	/* End Color Separator Setting */

	/* Title Text Color Setting */

	$wp_customize->add_setting( 'hongo_post_tag_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_tag_like_color', array(
	    'label'				=> __( 'Tag, Like, Social icon color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_tag_like_color',
	) ) );

	/* End Title Text Color Setting */

	/* Title Text Hover Color Setting */

	$wp_customize->add_setting( 'hongo_post_tag_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_tag_like_hover_color', array(
	    'label'				=> __( 'Tag, Like, Social icon hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_tag_like_hover_color',
	) ) );

	/* End Title Text Hover Color Setting */

	/* Title Text Hover Color Setting */

	$wp_customize->add_setting( 'hongo_post_tag_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_tag_hover_bg_color', array(
	    'label'				=> __( 'Tag hover background color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_tag_hover_bg_color',
	) ) );

	/* End Title Text Hover Color Setting */

	/* Post Meta Color Setting */

	$wp_customize->add_setting( 'hongo_single_post_meta_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_post_meta_text_color', array(
	    'label'				=> __( 'Post meta color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_single_post_meta_text_color',
	) ) );

	/* End Post Meta Color Setting */

	/* Post Meta Hover Color Setting */

	$wp_customize->add_setting( 'hongo_single_post_meta_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_post_meta_text_hover_color', array(
	    'label'				=> __( 'Post meta hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_single_post_meta_text_hover_color',
	) ) );

	/* End Post Meta Hover Color Setting */

	/* Author Box Separator Setting */

	$wp_customize->add_setting( 'hongo_author_box_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_author_box_separator', array(
	    'label'				=> __( 'Author box colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'   		=> 'hongo_author_box_separator',
	) ) );

	/* End Author Box Separator Setting */

	/*
	 * Author Box
	 */

	/* Author Box Background Color Setting */

	$wp_customize->add_setting( 'hongo_post_author_box_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_author_box_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_author_box_bg_color',
	) ) );

	/* End Author Box Background Color Setting */

	/* Author Box Title Text Color Setting */

	$wp_customize->add_setting( 'hongo_post_author_title_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_author_title_text_color', array(
	    'label'				=> __( 'Title color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_author_title_text_color',
	) ) );

	/* End Author Box Title Text Color Setting */

	/* Author Box Title Text Hover Color Setting */

	$wp_customize->add_setting( 'hongo_post_author_title_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_author_title_text_hover_color', array(
	    'label'				=> __( 'Title hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_author_title_text_hover_color',
	) ) );

	/* End Author Box Title Text Hover Color Setting */

	/* Author Box Content Color Setting */

	$wp_customize->add_setting( 'hongo_post_author_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_author_content_color', array(
	    'label'				=> __( 'Content color', 'hongo' ),
	    'section'    		=> 'hongo_add_post_layout_panel',
	    'settings'	 		=> 'hongo_post_author_content_color',
	) ) );

	/* End Author Box Content Color Setting */

	/* Author Box Button Color setting */

	$wp_customize->add_setting( 'hongo_button_color_author_box', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_color_author_box', array(
		'label'				=> __( 'Button color', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_button_color_author_box',
	) ) );

	/* End Author Box Button Color setting */

	/* Author Box Button Hover Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_color_author_box', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_color_author_box', array(
		'label'				=> __( 'Button hover color', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_button_hover_color_author_box',
	) ) );

	/* End Author Box Button Hover Color setting */

	/* Author Box Button Text Color setting */

	$wp_customize->add_setting( 'hongo_button_text_color_author_box', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_text_color_author_box', array(
		'label'				=> __( 'Button text color', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_button_text_color_author_box',
	) ) );

	/* End Author Box Button Text Color setting */

	/* Author Box Button Hover Text Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_text_color_author_box', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_text_color_author_box', array(
		'label'				=> __( 'Button text hover color', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_button_hover_text_color_author_box',
	) ) );

	/* End Author Box Button Hover Text Color setting */

	/* Author Box Button Border Color setting */

	$wp_customize->add_setting( 'hongo_button_border_color_author_box', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_border_color_author_box', array(
		'label'				=> __( 'Button border color', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_button_border_color_author_box',
	) ) );

	/* End Author Box Button Border Color setting */

	/* Author Box Button Border Hover Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_border_color_author_box', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_border_color_author_box', array(
		'label'				=> __( 'Button border hover color', 'hongo' ),
		'section'     		=> 'hongo_add_post_layout_panel',
		'settings'			=> 'hongo_button_hover_border_color_author_box',
	) ) );

	/* End Author Box Button Border Color setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'hongo_post_left_sidebar_layout_callback' ) ) :
		function hongo_post_left_sidebar_layout_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_post_layout_setting' )->value() == 'hongo_layout_left_sidebar' || $control->manager->get_setting( 'hongo_single_post_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_related_posts_excerpt_callback' ) ) :
		function hongo_related_posts_excerpt_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_related_post_excerpt' )->value() == '1' && $control->manager->get_setting( 'hongo_enable_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_post_right_sidebar_layout_callback' ) ) :
		function hongo_post_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_single_post_layout_setting' )->value() == 'hongo_layout_right_sidebar' || $control->manager->get_setting( 'hongo_single_post_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_post_date_callback' ) ) :
	   	function hongo_post_date_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_enable_date' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_related_posts_callback' ) ) :
	   	function hongo_related_posts_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_enable_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_related_posts_post_thumbnail_callback' ) ) :
	   	function hongo_related_posts_post_thumbnail_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_related_posts_enable_post_thumbnail' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_related_posts_date_callback' ) ) :
	   	function hongo_related_posts_date_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_enable_related_posts' )->value() == '1' && $control->manager->get_setting( 'hongo_related_posts_enable_date' )->value() == '1' ) {
		    	return true;
		    }else {
		    	return false;
		    }
		}
	endif;	

	if ( ! function_exists( 'hongo_related_posts_separator_callback' ) ) :
	   	function hongo_related_posts_separator_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_related_posts_separator' )->value() == '1' && $control->manager->get_setting( 'hongo_enable_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_author_box_callback' ) ) :
		function hongo_author_box_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_enable_post_author_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;
	
	/* End Custom Callback Functions */
