<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	/*
	 * Archive layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_archive_layout_container_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_layout_container_separator', array(
	    'label'				=> __( 'Layout and Container', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_layout_container_separator',
	    'priority'			=> '1',
	) ) );

	/* End Separator Settings */

	/* Archive Layout For Post */

	$wp_customize->add_setting( 'hongo_product_archive_layout_setting', array(
		'default' 			=> 'hongo_layout_left_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_layout_setting', array(
		'label'				=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_layout_setting',
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
		'priority'			=> '1',
	) ) );

	/* End Archive Layout For Post */

	/* Archive Left Sidebar */

	$wp_customize->add_setting( 'hongo_product_archive_left_sidebar', array(
		'default' 			=> 'hongo-shop-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_left_sidebar', array(
		'label'				=> __( 'Left sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_left_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_product_left_sidebar_layout_archive_callback',
		'priority'			=> '1',
	) ) );

	/* End Archive Left Sidebar */

	/* Archive Right Sidebar */
	
	$wp_customize->add_setting( 'hongo_product_archive_right_sidebar', array(
		'default' 			=> 'hongo-shop-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_right_sidebar', array(
		'label'				=> __( 'Right sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_right_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_product_right_sidebar_layout_archive_callback',
		'priority'			=> '1',
	) ) );

	/* End Archive Right Sidebar */

	/* Archive Container Setting */

	$wp_customize->add_setting( 'hongo_product_archive_container_style', array(
		'default' 			=> 'container-fluid-with-padding',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_container_style', array(
		'label'				=> __( 'Container style', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container' 					=> esc_html__( 'Fixed', 'hongo' ),
								    'container-fluid' 				=> esc_html__( 'Full width', 'hongo' ),
									'container-fluid-with-padding' 	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
							   ),
		'priority'			=> '1',	
	) ) );

	/* End Archive Container Setting */

	/* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_product_archive_container_fluid_with_padding', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_container_fluid_with_padding', array(
		'label'				=> __( 'Full width padding', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_container_fluid_with_padding',
		'type'              => 'text',
		'active_callback'	=> 'hongo_product_archive_container_fluid_with_padding_callback',
		'priority'			=> '1',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_container_fluid_with_padding_callback' ) ) :
	   	function hongo_product_archive_container_fluid_with_padding_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_product_archive_container_style' )->value() == 'container-fluid-with-padding' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* End Container custom Width setting */

	/* Archieve Page Description like category and tag description */

	$wp_customize->add_setting( 'hongo_product_archive_page_enable_description', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

        $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_page_enable_description', array(
		'label'				=> __( 'Description', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_enable_description',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),		
		'priority'			=> '2',
	) ) );

    /* End Archieve Page Description like category and tag description */

    /* Archive Page Top space like category and tag description */

	$wp_customize->add_setting( 'hongo_product_archive_page_enable_top_space', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

        $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_page_enable_top_space', array(
		'label'				=> __( 'Add margin top of header height', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_enable_top_space',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),		
		'priority'			=> '2',
	) ) );

    /* End Archive Top space Description like category and tag description */

    /* Rich Snippet */

	$wp_customize->add_setting( 'hongo_product_archive_page_rich_snippet', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_page_rich_snippet', array(
		'label'				=> __( 'Rich Snippet', 'hongo' ),
		'section'			=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_rich_snippet',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Rich Snippet */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_archive_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_style_data_separator', array(
	    'label'				=> __( 'Product lists style and data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_style_data_separator',
	    'priority'			=> '2',
	) ) );

	/* End Separator Settings */

	/* Product Archive List Style setting */

    $wp_customize->add_setting( 'hongo_product_archive_premade_style', array(
		'default' 			=> 'shop-standard',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_premade_style', array(
		'label'				=> __( 'Product list style', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_premade_style',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    'shop-classic' 		=> __( 'Classic', 'hongo' ),
								    'shop-minimalist' 	=> __( 'Minimalist', 'hongo' ),
								    'shop-metro'		=> __( 'Metro', 'hongo' ),
								    'shop-flat' 		=> __( 'Flat', 'hongo' ),
								    'shop-modern'		=> __( 'Modern', 'hongo' ),
								    'shop-clean' 		=> __( 'Clean', 'hongo' ),
								    'shop-masonry'		=> __( 'Masonry', 'hongo' ),
									'shop-standard'		=> __( 'Standard', 'hongo' ),
								    'shop-list'			=> __( 'List', 'hongo' ),
									'shop-simple'		=> __( 'Simple', 'hongo' ),
									'shop-boxed'		=> __( 'Boxed', 'hongo' ),
								    'shop-default'		=> __( 'Default', 'hongo' ),
								   ),
		'hongo_img'			=> array(
								  	HONGO_THEME_IMAGES_URI . '/shop-classic.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-minimalist.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-metro.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-flat.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-modern.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-clean.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-masonry.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-standard.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-list.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-simple.jpg',
								  	HONGO_THEME_IMAGES_URI . '/shop-boxed.jpg',
									HONGO_THEME_IMAGES_URI . '/shop-default.jpg',
							   ),
		'hongo_columns'    	=> '2',
		'priority'			=> '2',
	) ) );

	/* End Product Archive List Style setting */

	/* Product Archive Column Type Setting */

	$wp_customize->add_setting( 'hongo_product_archive_page_column', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_page_column', array(
		'label'				=> __( 'No. of columns for desktop', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    '2' => __( '2 Columns', 'hongo' ),
									'3' => __( '3 Columns', 'hongo' ),
									'4' => __( '4 Columns', 'hongo' ),
									'5' => __( '5 Columns', 'hongo' ),
									'6' => __( '6 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/5-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
		'priority'			=> '2',
	) ) );

	/* End Product Archive Column Type Setting */

	/* Product Archive Mini Desktop colum setting */

	$wp_customize->add_setting( 'hongo_product_archive_page_mini_desktop_column', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_page_mini_desktop_column', array(
		'label'				=> __( 'No. of columns for mini desktop', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_mini_desktop_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    '2' => __( '2 Columns', 'hongo' ),
								    '3' => __( '3 Columns', 'hongo' ),
								    '4' => __( '4 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_page_responsive_column_callback',
	) ) );

	/* End Product Archive Mini Desktop colum setting */

	/* Product Archive Tablet column setting */

	$wp_customize->add_setting( 'hongo_product_archive_page_tablet_column', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_page_tablet_column', array(
		'label'				=> __( 'No. of columns for tablet', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_tablet_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    '2' => __( '2 Columns', 'hongo' ),
								    '3' => __( '3 Columns', 'hongo' ),
									'4' => __( '4 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_page_responsive_column_callback',
	) ) );

	/* End Product Archive Tablet column setting */

	/* Product Archive Mobile colum setting */

	$wp_customize->add_setting( 'hongo_product_archive_page_mobile_column', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_page_mobile_column', array(
		'label'				=> __( 'No. of columns for mobile', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_mobile_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'1' => __( '1 Columns', 'hongo' ),
								    '2' => __( '2 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
								  	HONGO_THEME_IMAGES_URI . '/1-columns-mobile.png',
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_page_responsive_column_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_page_responsive_column_callback' ) ) :
		function hongo_product_archive_page_responsive_column_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-list' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Mobile colum setting */

	/* Product Archive Column Gutter setting */

    $wp_customize->add_setting( 'hongo_product_archive_gutter', array(
		'default' 			=> 'gutter-small',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_archive_gutter', array(
		'label'				=> __( 'Spacing between columns', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_gutter',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'' 					=> __( 'Gutter None', 'hongo' ),
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
		'priority'			=> '2',
	) ) );

	/*End Product Archive Column Gutter setting */

	/* Product Archive Show Metro */

	$wp_customize->add_setting( 'hongo_product_archive_page_enable_metro', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

        $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_page_enable_metro', array(
		'label'				=> __( 'Metro style', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_enable_metro',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'	=> 'hongo_product_archive_page_enable_metro_callback',
		'priority'			=> '2',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_page_enable_metro_callback' ) ) :
		function hongo_product_archive_page_enable_metro_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' ||  $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Show Metro */

	/* Product Archive Double Grid Position setting */

    $wp_customize->add_setting( 'hongo_product_archive_page_double_grid_position', array(
		'default' 			=> '*,*,2-2,2-1,2-2,1-2',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_page_double_grid_position', array(
		'label'				=> __( 'Metro grid positions', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_double_grid_position',
		'type'              => 'text',
		'description'		=> __( 'Please add grid position number with comma(,) separator. Like *,*,2-2,2-1,2-2,1-2', 'hongo' ),
		'active_callback'   => 'hongo_product_archive_page_double_grid_position_callback',
		'priority'			=> '2',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_page_double_grid_position_callback' ) ) :
		function hongo_product_archive_page_double_grid_position_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_product_archive_page_enable_metro' )->value() == '1' && ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' ||  $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' ) ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Double Grid Position setting */

	/* Product Archive Animation setting */
    $wp_customize->add_setting( 'hongo_product_archive_animation', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Animation_Control( $wp_customize, 'hongo_product_archive_animation', array(
		'label'				=> __( 'Animation', 'hongo' ),
		'type'              => 'hongo_animation_style',
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_animation',
		'priority'			=> '2',
	) ) );
	/* End Product Archive Animation setting */

	/* Product Archive Animation delay */
	$wp_customize->add_setting( 'hongo_product_archive_animation_delay', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_animation_delay', array(
		'label'				=> __( 'Animation delay', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_animation_delay',
		'type'      		=> 'text',
		'priority'			=> '2',
	) ) );
	/* End Product Archive Animation delay */

	/* Product Archive Animation duration */
	$wp_customize->add_setting( 'hongo_product_archive_animation_duration', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_animation_duration', array(
		'label'				=> __( 'Animation duration', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_animation_duration',
		'type'      		=> 'text',
		'priority'			=> '2',
	) ) );
	/* End Product Archive Animation duration */

	/*  No. of Product Per Page  */

	$wp_customize->add_setting( 'hongo_product_archive_page_per_page', array(
		'default' 			=> '12',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_page_per_page', array(
		'label'				=> __( 'Products per page', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_page_per_page',
		'type'      		=> 'text',
		'priority'			=> '2',
	) ) );

	/* End No. of Product Per Page */

	/* Content Alignment */
	$wp_customize->add_setting( 'hongo_product_archive_product_content_align', array(
		'default' 			=> 'center',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_content_align', array(
		'label'				=> __( 'Content alignment', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_content_align',
		'type'              => 'select',
		'choices'           => array(
									'left'		=> esc_html__( 'Left', 'hongo'),
									'center' 	=> esc_html__( 'Center', 'hongo'),
									'right' 	=> esc_html__( 'Right', 'hongo'),
							   ),
		'active_callback'   => 'hongo_product_archive_content_align_callback',
		'priority'			=> '2',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_content_align_callback' ) ) :
		function hongo_product_archive_content_align_callback( $control ) {
			if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-default' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-minimalist' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-classic' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-masonry' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-standard' ) {
			 	return true;
			} else{
				return false;
			}
		}
	endif;
	/* Enable Pagination */

	$wp_customize->add_setting( 'hongo_product_archive_enable_pagination', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

        $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_pagination', array(
		'label'				=> __( 'Pagination', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_pagination',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* Pagination Style */
	$wp_customize->add_setting( 'hongo_product_archive_product_pagination_style', array(
		'default' 			=> 'pagination',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_pagination_style', array(
		'label'				=> __( 'Pagination style', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_pagination_style',
		'type'              => 'select',
		'choices'           => array(
									'pagination'=> esc_html__( 'Number pagination', 'hongo'),
									'infinite' 	=> esc_html__( 'Infinite scroll', 'hongo'),
									'loadmore'	=> esc_html__( 'Load more button', 'hongo'),
							   ),
		'active_callback'   => 'hongo_product_archive_pagination_callback',
		'priority'			=> '2',
	) ) );

	if( ! function_exists( 'hongo_product_archive_pagination_callback' ) ) :
		function hongo_product_archive_pagination_callback( $control ){
			if( $control->manager->get_setting( 'hongo_product_archive_enable_pagination' )->value() == '1' ){
				return true;
			} else{
				return false;
			}
		}
	endif;

	/* End Pagination Style */

	/* Enable Top Filter Sidebar */

	$wp_customize->add_setting( 'hongo_enable_shop_top_filter_sidebar', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_shop_top_filter_sidebar', array(
	'label'				=> __( 'Top filter', 'hongo' ),
	'section'     		=> 'hongo_add_product_archive_layout_panel',
	'settings'			=> 'hongo_enable_shop_top_filter_sidebar',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
							  	'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'			=> '2',
	) ) );
    /* End Enable Top Filter Sidebar */

    /* Enable off Canvas Filter Sidebar */

	$wp_customize->add_setting( 'hongo_enable_shop_off_canvas_filter_sidebar', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_shop_off_canvas_filter_sidebar', array(
	'label'				=> __( 'Off canvas filter', 'hongo' ),
	'section'     		=> 'hongo_add_product_archive_layout_panel',
	'settings'			=> 'hongo_enable_shop_off_canvas_filter_sidebar',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
							  	'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'			=> '2',
	'active_callback'	=> 'hongo_product_top_sidebar_layout_archive_callback',
	) ) );
    /* End Enable off Canvas Filter Sidebar */

	/* Top Filter Sidebar */

	$wp_customize->add_setting( 'hongo_shop_top_filter_sidebar', array(
		'default' 			=> 'hongo-shop-top',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_shop_top_filter_sidebar', array(
		'label'				=> __( 'Top filter sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_shop_top_filter_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_product_top_sidebar_layout_archive_callback',
		'priority'			=> '2',
	) ) );

	/* End Top Filter Sidebar */

    /* Enable All Filter Ajax Sidebar */

	$wp_customize->add_setting( 'hongo_enable_shop_all_filter_ajax', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_shop_all_filter_ajax', array(
	'label'				=> __( 'Enable ajax filters', 'hongo' ),
	'section'     		=> 'hongo_add_product_archive_layout_panel',
	'settings'			=> 'hongo_enable_shop_all_filter_ajax',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
							  	'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'			=> '2',
	) ) );
    /* End Enable All Filter Ajax Sidebar */

	/* Enable Overlay */

	$wp_customize->add_setting( 'hongo_product_archive_enable_overlay', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_overlay', array(
		'label'				=> __( 'Box hover overlay', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_overlay',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_enable_overlay_callback'
	) ) );

	/* End Enable Overlay */

	/* Product Archive Box hover overlay color */

	$wp_customize->add_setting( 'hongo_product_archive_box_hover_overlay_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_box_hover_overlay_color', array(
	    'label'				=> __( 'Box hover overlay color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_box_hover_overlay_color',
	    'priority'			=> '2',
	    'active_callback'	=> 'hongo_product_archive_box_hover_overlay_callback',
	) ) );

	/* End Product Archive Sale Color */
	if ( ! function_exists( 'hongo_product_archive_box_hover_overlay_callback' ) ) :
		function hongo_product_archive_box_hover_overlay_callback( $control ) {
	      	if ( ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-flat' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-masonry' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-clean' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' ) && $control->manager->get_setting( 'hongo_product_archive_enable_overlay' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Box hover overlay color */

	/* Enable Product Gallery Slider */

	$wp_customize->add_setting( 'hongo_product_archive_enable_gallery_slider', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_gallery_slider', array(
		'label'				=> __( 'Product image gallery slider', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_gallery_slider',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Enable Product Gallery Slider */

	/* Product Gallery Slider image display */

	$wp_customize->add_setting( 'hongo_product_archive_gallery_slide', array(
		'default' 			=> '3',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_gallery_slide', array(
		'label'				=> __( 'No. of image gallery slide', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_gallery_slide',
		'type'      		=> 'text',
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_enable_gallery_slider_callback',
	) ) );

	/* End Product Gallery Slider image display */	

	if ( ! function_exists( 'hongo_product_archive_enable_gallery_slider_callback' ) ) :
		function hongo_product_archive_enable_gallery_slider_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_gallery_slider' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;
	

	/* Enable Product Loop deal */

	$wp_customize->add_setting( 'hongo_product_archive_enable_deal', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_deal', array(
		'label'				=> __( 'Product countdown deal', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_deal',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Enable Product Loop deal */

	/* Enable Product Sale Box */

	$wp_customize->add_setting( 'hongo_product_archive_enable_sale_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_sale_box', array(
		'label'				=> __( 'Sale box', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_sale_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Enable Product Sale Box */

	/* Enable Percentage Sale Box */

	$wp_customize->add_setting( 'hongo_product_archive_display_percentage_sale_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_display_percentage_sale_box', array(
		'label'				=> __( 'Percentage sale box', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_display_percentage_sale_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback' 	=> 'hongo_product_archive_display_percentage_sale_box_callback',
		'priority'			=> '2',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_display_percentage_sale_box_callback' ) ) :
		function hongo_product_archive_display_percentage_sale_box_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_sale_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Enable Percentage Sale Box */

	/*  Sale Text  */

	$wp_customize->add_setting( 'hongo_product_archive_sale_text', array(
		'default' 			=> __( 'Sale!', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_sale_text', array(
		'label'				=> __( 'Sale text', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_sale_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_product_archive_sale_text_callback',
		'priority'			=> '2',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_sale_text_callback' ) ) :
		function hongo_product_archive_sale_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_display_percentage_sale_box' )->value() == '0' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Sale Text */

	/*  Sold Text  */

	$wp_customize->add_setting( 'hongo_product_archive_sold_text', array(
		'default' 			=> __( 'Sold!', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_sold_text', array(
		'label'				=> __( 'Sold text', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_sold_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_product_archive_display_percentage_sale_box_callback',
		'priority'			=> '2',
	) ) );

	/* End Sold Text */

	/* Enable Product New Box */

	$wp_customize->add_setting( 'hongo_product_archive_enable_new_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_new_box', array(
		'label'				=> __( 'New box', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_new_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Enable Product New Box */

	/*  New Text  */

	$wp_customize->add_setting( 'hongo_product_archive_new_text', array(
		'default' 			=> __( 'New', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_new_text', array(
		'label'				=> __( 'New text', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_new_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_product_archive_new_text_callback',
		'priority'			=> '2',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_new_text_callback' ) ) :
		function hongo_product_archive_new_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End New Text */

	/* Enable Alternate Product Image */

	$wp_customize->add_setting( 'hongo_product_archive_enable_alternate_image', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_alternate_image', array(
		'label'				=> __( 'Alternate image', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_alternate_image',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_enable_alternate_image_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_enable_alternate_image_callback' ) ) :
		function hongo_product_archive_enable_alternate_image_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_gallery_slider' )->value() == '0' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Enable Alternate Product Image */

	/* Enable Product Star Rating */

	$wp_customize->add_setting( 'hongo_product_archive_enable_star_rating', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_star_rating', array(
		'label'				=> __( 'Star rating', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_star_rating',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Enable Product Star Rating */

	/* Enable Product Short Description */

	$wp_customize->add_setting( 'hongo_product_archive_enable_short_desc', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_short_desc', array(
		'label'				=> __( 'Short description', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_short_desc',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_product_short_description_callback',
	) ) );

	/* End Enable Product Short Description */

	/* Product Archive Short Description Color */

	$wp_customize->add_setting( 'hongo_product_archive_short_desc_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_short_desc_color', array(
	    'label'				=> __( 'Short description color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_short_desc_color',
	    'priority'			=> '2',
	    'active_callback'	=> 'hongo_product_archive_short_desc_color_callback',
	) ) );

	/* End Product Archive Short Description Color */

	if ( ! function_exists( 'hongo_product_archive_short_desc_color_callback' ) ) :
		function hongo_product_archive_short_desc_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_short_desc' )->value() == '1' && $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* Enable Product Add To Cart */

	$wp_customize->add_setting( 'hongo_product_archive_enable_add_to_cart', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_add_to_cart', array(
		'label'				=> __( 'Add to cart', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_add_to_cart',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
	) ) );

	/* End Enable Product Add To Cart */

	/* Enable Blur effect */

	$wp_customize->add_setting( 'hongo_product_archive_enable_blur_effect', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_blur_effect', array(
		'label'				=> __( 'Blur effect', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_blur_effect',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '2',
		'active_callback'	=> 'hongo_product_archive_enable_blur_effect_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_enable_blur_effect_callback' ) ) :
		function hongo_product_archive_enable_blur_effect_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-clean' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Enable Blur effect */

	/* Product Archive product gallery Separator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_gallery_slider_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_product_gallery_slider_color', array(
	    'label'				=> __( 'Gallery slider & countdown deal color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_product_gallery_slider_color',
	    'active_callback'	=> 'hongo_product_archive_slider_deal_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_slider_deal_callback' ) ) :
		function hongo_product_archive_slider_deal_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_gallery_slider' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_deal' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive product gallery Separator setting */

	/* Product Archive product gallery icon color */

	$wp_customize->add_setting( 'hongo_product_archive_product_gallery_slider_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_gallery_slider_icon_color', array(
	    'label'				=> __( 'Navigation icon color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_gallery_slider_icon_color',
	    'active_callback'	=> 'hongo_product_archive_gallery_slider_callback',
	) ) );

	/* End Product Archive product gallery icon color */

	/* Product Archive product gallery navigation background color */

	$wp_customize->add_setting( 'hongo_product_archive_product_gallery_slider_navigation_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_gallery_slider_navigation_bg_color', array(
	    'label'				=> __( 'Navigation background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_gallery_slider_navigation_bg_color',
	    'active_callback'	=> 'hongo_product_archive_gallery_slider_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_gallery_slider_callback' ) ) :
		function hongo_product_archive_gallery_slider_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_gallery_slider' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive product gallery navigation background color */

	/* Product Archive product deal number color */

	$wp_customize->add_setting( 'hongo_product_archive_product_deal_number_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_deal_number_color', array(
	    'label'				=> __( 'Countdown number color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_deal_number_color',
	    'active_callback'	=> 'hongo_product_archive_deal_callback',
	) ) );

	/* End Product Archive product deal number color */

	/* Product Archive product deal text color */

	$wp_customize->add_setting( 'hongo_product_archive_product_deal_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_deal_text_color', array(
	    'label'				=> __( 'Countdown text color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_deal_text_color',
	    'active_callback'	=> 'hongo_product_archive_deal_callback',
	) ) );

	/* End Product Archive product deal text color */

	/* Product Archive product deal bg color */

	$wp_customize->add_setting( 'hongo_product_archive_product_deal_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_deal_bg_color', array(
	    'label'				=> __( 'Countdown background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_deal_bg_color',
	    'active_callback'	=> 'hongo_product_archive_deal_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_deal_callback' ) ) :
		function hongo_product_archive_deal_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_deal' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Product Archive product deal bg color */

	/* Product Archive Sale Typography Separator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_sale_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_product_sale_typography', array(
	    'label'				=> __( 'Sale, New & Sold box typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_product_sale_typography',
	    'active_callback'	=> 'hongo_product_archive_product_sale_typography_callback',
	) ) );

	/* End Product Archive Sale Typography Separator setting */

	/* Product Archive Sale Font size */

    $wp_customize->add_setting( 'hongo_product_archive_product_sale_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_sale_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_sale_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_product_archive_product_sale_typography_callback',
	) ) );

	/* End Product Archive Sale Font size */

	/* Product Archive Sale Line height */

    $wp_customize->add_setting( 'hongo_product_archive_product_sale_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_sale_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_sale_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_product_archive_product_sale_typography_callback',
	) ) );

	/* End Product Archive Sale Line height */

	/* Product Archive Sale Letter spacing */

    $wp_customize->add_setting( 'hongo_product_archive_product_sale_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_sale_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_sale_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_product_archive_product_sale_typography_callback',
	) ) );

	/* End Product Archive Sale Letter spacing */

	/* Product Archive Sale Font weight */

    $wp_customize->add_setting( 'hongo_product_archive_product_sale_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_sale_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_sale_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_product_archive_product_sale_typography_callback',
	) ) );

	/* End Product Archive Sale Font weight */

	/* Product Archive Sale Text Transform setting */
    $wp_customize->add_setting( 'hongo_product_archive_product_sale_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_sale_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_sale_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			 => esc_html__( 'Select', 'hongo' ),
								    'uppercase'  => esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'	 => esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize' => esc_html__( 'Capitalize', 'hongo' ),
								    'none'	     => esc_html__( 'None', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_product_archive_product_sale_typography_callback',
	) ) );
	/* End Product Archive Sale Text Transform setting */

	/* Product Archive Sale Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_sale_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_sale_color', array(
	    'label'				=> __( 'Sale box color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_sale_color',
	    'active_callback'	=> 'hongo_product_archive_product_sale_callback',
	) ) );

	/* End Product Archive Sale Color */

	/* Product Archive Sale Background Color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_sale_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_sale_bg_color', array(
	    'label'				=> __( 'Sale box background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_sale_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_sale_callback',
	) ) );

	/* Product Archive Sale Background Color setting */

	/* Product Archive Sale Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_new_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_new_color', array(
	    'label'				=> __( 'New box color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_new_color',
	    'active_callback'	=> 'hongo_product_archive_product_new_callback',
	) ) );

	/* End Product Archive Sale Color */

	/* Product Archive Sale Background Color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_new_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_new_bg_color', array(
	    'label'				=> __( 'New box background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_new_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_new_callback',
	) ) );

	/* Product Archive Sale Background Color setting */

	/* Product Archive Sold Box Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_soldout_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_soldout_color', array(
	    'label'				=> __( 'Sold box color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_soldout_color',
	    'active_callback'	=> 'hongo_product_archive_product_sale_callback',
	) ) );

	/* End Product Archive Sold Box Color */

	/* Product Archive Sold Box Background Color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_soldout_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_soldout_bg_color', array(
	    'label'				=> __( 'Sold box background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_soldout_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_sale_callback',
	) ) );

	/* Product Archive Sold Box Background Color setting */

	/* Product Archive Title Typography Separator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_product_title_typography', array(
	    'label'				=> __( 'Title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_product_title_typography',
	) ) );

	/* End Product Archive Title Typography Separator setting */

	/* Product Archive Title Font size */

    $wp_customize->add_setting( 'hongo_product_archive_product_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_title_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_title_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product Archive Title Font size */

	/* Product Archive Title Line height */

    $wp_customize->add_setting( 'hongo_product_archive_product_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_title_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_title_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Archive Title Line height */

	/* Product Archive Title Letter spacing */

    $wp_customize->add_setting( 'hongo_product_archive_product_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_title_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_title_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Archive Title Letter spacing */

	/* Product Archive Title Font weight */

    $wp_customize->add_setting( 'hongo_product_archive_product_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_title_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Archive Title Font weight */

	/* Product Archive Title setting */

    $wp_customize->add_setting( 'hongo_product_archive_product_title_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_title_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			 => esc_html__( 'Select', 'hongo' ),
								    'uppercase'  => esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'	 => esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize' => esc_html__( 'Capitalize', 'hongo' ),
								    'none'	     => esc_html__( 'None', 'hongo' ),
								   ),
	) ) );
	/* End Product Archive Title setting */

	/* Product Archive Title Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_title_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_title_color',
	) ) );

	/* End Product Archive Title Color */

	/* Product Archive Hover Title Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_title_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_title_hover_color',
	) ) );

	/* End Product Archive Hover Title Color */

	/* Product Archive Rating Star Color Separator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_rating_star_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_product_rating_star_typography', array(
	    'label'				=> __( 'Rating star color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_product_rating_star_typography',
		'active_callback'	=> 'hongo_product_archive_product_rating_star_color_callback',
	) ) );

	/* End Product Archive Rating Star Color Separator setting */

	/* Product Archive Rating Star Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_rating_star_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_rating_star_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_rating_star_color',
		'active_callback'	=> 'hongo_product_archive_product_rating_star_color_callback',
	) ) );

	/* End Product Archive Rating Star Color */

	/* Product Archive Price Typography Separator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_price_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_product_price_typography', array(
	    'label'				=> __( 'Price typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_product_price_typography',
	) ) );

	/* End Product Archive Price Typography Separator setting */

	/* Product Archive Price Font size */

    $wp_customize->add_setting( 'hongo_product_archive_product_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_price_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_price_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product Archive Price Font size */

	/* Product Archive Price Line height */

    $wp_customize->add_setting( 'hongo_product_archive_product_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_price_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_price_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Archive Price Line height */

	/* Product Archive Price Letter spacing */

    $wp_customize->add_setting( 'hongo_product_archive_product_price_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_price_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_price_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Archive Price Letter spacing */

	/* Product Archive Price Font weight */

    $wp_customize->add_setting( 'hongo_product_archive_product_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_product_price_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_product_price_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Archive Price Font weight */

	/* Product Archive Price Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_price_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_price_color',
	) ) );

	/* End Product Archive Price Color */

	/* Product Archive Regular Price Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_regular_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_regular_price_color', array(
	    'label'				=> __( 'Regular price color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_regular_price_color',
	) ) );

	/* End Product Archive Regular Price Color */

	/* Product Archive Button Separator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_product_button_typography', array(
	    'label'				=> __( 'Product button typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'   		=> 'hongo_product_archive_product_button_typography',
	    'active_callback' 	=> 'hongo_product_archive_product_icon_callback',
	) ) );

	/* End Product Archive Button Separator setting */

	/* Product Archive Button color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_callback',
	) ) );

	/* End Product Archive Button color setting */

	/* Product Archive Button Hover color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_hover_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_product_button_callback' ) ) :
		function hongo_product_archive_product_button_callback( $control ) {
	      	if ( ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-default' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-minimalist' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-simple' ) && ( $control->manager->get_setting( 'hongo_product_archive_enable_add_to_cart' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_quick_view' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_wishlist' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_compare' )->value() == '1' ) ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Button Hover color setting */

	/* Product Archive Button BG color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_hover_bg_callback',
	) ) );

	/* End Product Archive Button BG color setting */

	/* Product Archive Button Hover BG color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_hover_bg_color', array(
	    'label'				=> __( 'Hover background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_hover_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_hover_bg_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_product_button_hover_bg_callback' ) ) :
		function hongo_product_archive_product_button_hover_bg_callback( $control ) {
	      	if ( ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-default' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' ) && ( $control->manager->get_setting( 'hongo_product_archive_enable_add_to_cart' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_quick_view' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_wishlist' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_compare' )->value() == '1' ) ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Button Hover BG color setting */

	/* Product Archive Button Border color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_border_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_border_callback',
	) ) );	

	/* End Product Archive Button Border color setting */

	/* Product Archive Button Border hover color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_border_hover_color', array(
	    'label'				=> __( 'Border hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_border_hover_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_border_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_product_button_border_callback' ) ) :
		function hongo_product_archive_product_button_border_callback( $control ) {
	      	if ( ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-default' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-minimalist' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-simple' ) && ( $control->manager->get_setting( 'hongo_product_archive_enable_add_to_cart' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_quick_view' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_wishlist' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_compare' )->value() == '1' ) ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Button Border hover color setting */

	/* Product Archive Icon color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_icon_color', array(
	    'label'				=> __( 'Icon color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_icon_color',
	    'active_callback'	=> 'hongo_product_archive_product_icon_callback',
	) ) );

	/* End Product Archive Icon color setting */

	/* Product Archive Icon Hover color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_icon_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_icon_hover_color', array(
	    'label'				=> __( 'Icon hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_icon_hover_color',
	    'active_callback'	=> 'hongo_product_archive_product_icon_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_product_icon_callback' ) ) :
		function hongo_product_archive_product_icon_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_add_to_cart' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_quick_view' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_wishlist' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_compare' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Icon Hover color setting */

	/* Product Archive Icon BG color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_icon_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_icon_bg_color', array(
	    'label'				=> __( 'Icon background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_icon_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_icon_bg_color_callback',
	) ) );
	
	if ( ! function_exists( 'hongo_product_archive_product_icon_bg_color_callback' ) ) :
		function hongo_product_archive_product_icon_bg_color_callback( $control ) {
	      	if ( ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-default' && $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-simple' && $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-minimalist' ) && ( $control->manager->get_setting( 'hongo_product_archive_enable_add_to_cart' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_quick_view' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_wishlist' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_compare' )->value() == '1' ) ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Icon BG color setting */

	/* Product Archive Box Bg Color */

	$wp_customize->add_setting( 'hongo_product_archive_product_box_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_box_bg_color', array(
	    'label'				=> __( 'Box hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_box_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_box_bg_color_callback',
	) ) );
	
	if ( ! function_exists( 'hongo_product_archive_product_box_bg_color_callback' ) ) :
		function hongo_product_archive_product_box_bg_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-minimalist' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Box Bg Color */

	/* Product Archive Icon Hover BG color setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_icon_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_icon_hover_bg_color', array(
	    'label'				=> __( 'Icon hover background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_icon_hover_bg_color',
	    'active_callback'	=> 'hongo_product_archive_product_icon_bg_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_product_icon_bg_callback' ) ) :
		function hongo_product_archive_product_icon_bg_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-classic' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-clean' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-flat' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-masonry' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-standard' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-boxed' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Icon Hover BG color setting */

	/* Product Archive Button seperator setting */

	$wp_customize->add_setting( 'hongo_product_archive_product_button_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_archive_product_button_separator_color', array(
	    'label'				=> __( 'Separator color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_archive_layout_panel',
	    'settings'	 		=> 'hongo_product_archive_product_button_separator_color',
	    'active_callback'	=> 'hongo_product_archive_product_button_separator_color_callback',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_product_button_separator_color_callback' ) ) :
		function hongo_product_archive_product_button_separator_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-flat' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-modern' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-standard' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-boxed' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Product Archive Button seperator color setting */

	if ( ! function_exists( 'hongo_product_archive_enable_overlay_callback' ) ) :
		function hongo_product_archive_enable_overlay_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-flat' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-masonry' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-clean' || $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-metro' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_archive_product_sale_typography_callback' ) ) :
		function hongo_product_archive_product_sale_typography_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_sale_box' )->value() == '1' || $control->manager->get_setting( 'hongo_product_archive_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_archive_product_sale_callback' ) ) :
		function hongo_product_archive_product_sale_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_sale_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_archive_product_new_callback' ) ) :
		function hongo_product_archive_product_new_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_archive_product_rating_star_color_callback' ) ) :
		function hongo_product_archive_product_rating_star_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_star_rating' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_archive_product_sale_border_callback' ) ) :
		function hongo_product_archive_product_sale_border_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_product_sale_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_left_sidebar_layout_archive_callback' ) ) :
		function hongo_product_left_sidebar_layout_archive_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_layout_setting' )->value() == 'hongo_layout_left_sidebar' || $control->manager->get_setting( 'hongo_product_archive_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_right_sidebar_layout_archive_callback' ) ) :
		function hongo_product_right_sidebar_layout_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_product_archive_layout_setting' )->value() == 'hongo_layout_right_sidebar' || $control->manager->get_setting( 'hongo_product_archive_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_top_sidebar_layout_archive_callback' ) ) :
		function hongo_product_top_sidebar_layout_archive_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_enable_shop_top_filter_sidebar' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_product_archive_product_short_description_callback' ) ) :
		function hongo_product_archive_product_short_description_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() == 'shop-list' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;
