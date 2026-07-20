<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Get All Register Mini Header Section List. */
	$hongo_mini_header_section_data = hongo_addons_get_builder_section_data( 'mini-header' );
	$hongo_general_mini_header_section_data = hongo_addons_get_builder_section_data( 'mini-header', false, true );

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_header_separator', array(
	    'label'     		=> __( 'General', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_mini_header_separator',	    
	) ) );

	/* End Separator Settings */

 	/* Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Mini Header */

	/* Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section',
		'choices'           => $hongo_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
	) ) );

	/* End Mini Header Section */

	/* Page Separator Settings */

	$wp_customize->add_setting( 'hongo_page_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_page_mini_header_separator', array(
	    'label'     		=> __( 'Page', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_page_mini_header_separator',
	) ) );

	/* End Page Separator Settings */

	/* Page Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_single_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_single_page', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_single_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Page Enable General Mini Header */

 	/* Page Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_single_page', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_single_page', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_single_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_page_mini_header_enable_callback',
	) ) );

	/* End Page Enable Mini Header */

	/* Page Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_single_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_single_page', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_single_page',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_page_mini_header_enable_callback',
	) ) );

	/* End Page Mini Header Section */

	// Page Mini header callback
	if ( ! function_exists( 'hongo_page_mini_header_enable_callback' ) ) {
        function hongo_page_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_single_page' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Single Post Separator Settings */

	$wp_customize->add_setting( 'hongo_single_post_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_post_mini_header_separator', array(
	    'label'     		=> __( 'Post Single', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_single_post_mini_header_separator',
	) ) );

	/* End Single Post Separator Settings */

	/* Single Post Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_single_post', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_single_post', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_single_post',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Single Post Enable General Mini Header */

 	/* Single Post Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_single_post', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_single_post', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_single_post',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_single_post_mini_header_enable_callback',
	) ) );

	/* End Single Post Enable Mini Header */

	/* Single Post Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_single_post', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_single_post', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_single_post',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_single_post_mini_header_enable_callback',
	) ) );

	/* End Single Post Mini Header Section */

	// Single Post Mini header callback
	if ( ! function_exists( 'hongo_single_post_mini_header_enable_callback' ) ) {
        function hongo_single_post_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_single_post' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Post Archive Separator Settings */

	$wp_customize->add_setting( 'hongo_archive_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_mini_header_separator', array(
	    'label'     		=> __( 'Post Archive', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_archive_mini_header_separator',
	) ) );

	/* End Post Archive Separator Settings */

	/* Post Archive Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_archive', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Post Archive Enable General Mini Header */

 	/* Post Archive Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_archive', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_post_archive_mini_header_enable_callback',
	) ) );

	/* End Post Archive Enable Mini Header */

	/* Post Archive Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_archive', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_archive',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_post_archive_mini_header_enable_callback',
	) ) );

	/* End Post Archive Mini Header Section */

	// Post Archive Mini header callback
	if ( ! function_exists( 'hongo_post_archive_mini_header_enable_callback' ) ) {
        function hongo_post_archive_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_archive' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Post Default Separator Settings */

	$wp_customize->add_setting( 'hongo_default_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_mini_header_separator', array(
	    'label'     		=> __( 'Default Posts / Blog Home', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_default_mini_header_separator',
	) ) );

	/* End Post Default Separator Settings */

	/* Default Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_default', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Default Enable General Mini Header */

 	/* Post Default Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_default', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_default_mini_header_enable_callback',
	) ) );

	/* End Post Default Enable Mini Header */

	/* Post Default Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_default', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_default',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_default_mini_header_enable_callback',
	) ) );

	/* End Post Default Mini Header Section */

	// Post Default Mini header callback
	if ( ! function_exists( 'hongo_default_mini_header_enable_callback' ) ) {
        function hongo_default_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_default' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Product Single Separator Settings */

	$wp_customize->add_setting( 'hongo_product_single_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_single_mini_header_separator', array(
	    'label'     		=> __( 'Product Single', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_product_single_mini_header_separator',
	) ) );

	/* End Product Single Separator Settings */

	/* Product Single Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_single_product', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_single_product', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_single_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Product Single Enable General Mini Header */

 	/* Product Single Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_single_product', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_single_product', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_single_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_product_single_mini_header_enable_callback',
	) ) );

	/* End Product Single Enable Mini Header */

	/* Product Single Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_single_product', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_single_product', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_single_product',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_product_single_mini_header_enable_callback',
	) ) );

	/* End Product Single Mini Header Section */

	// Product Single Mini header callback
	if ( ! function_exists( 'hongo_product_single_mini_header_enable_callback' ) ) {
        function hongo_product_single_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_single_product' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Product Archive Separator Settings */

	$wp_customize->add_setting( 'hongo_product_archive_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_mini_header_separator', array(
	    'label'     		=> __( 'Product Archive / Shop', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_product_archive_mini_header_separator',
	) ) );

	/* End Product Archive Separator Settings */

	/* Product Archive Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_product_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_product_archive', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_product_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Product Archive Enable General Mini Header */

 	/* Product Archive Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_product_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_product_archive', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_product_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_product_archive_mini_header_enable_callback',
	) ) );

	/* End Product Archive Enable Mini Header */

	/* Product Archive Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_product_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_product_archive', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_product_archive',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_product_archive_mini_header_enable_callback',
	) ) );

	/* End Product Archive Mini Header Section */

	// Product Archive Mini header callback
	if ( ! function_exists( 'hongo_product_archive_mini_header_enable_callback' ) ) {
        function hongo_product_archive_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_product_archive' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* 404 Page Separator Settings */

	$wp_customize->add_setting( 'hongo_404_page_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_404_page_mini_header_separator', array(
	    'label'     		=> __( '404 Page', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_mini_header_section',
	    'settings'   		=> 'hongo_404_page_mini_header_separator',
	) ) );

	/* End 404 Page Separator Settings */

	/* 404 Page Enable General Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_general_404_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_general_404_page', array(
		'label'     		=> __( 'General mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_general_404_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End 404 Page Enable General Mini Header */

 	/* 404 Page Enable Mini Header */

    $wp_customize->add_setting( 'hongo_enable_mini_header_404_page', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mini_header_404_page', array(
		'label'     		=> __( 'Mini header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_enable_mini_header_404_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_404_page_mini_header_enable_callback',
	) ) );

	/* End 404 Page Enable Mini Header */

	/* 404 Page Mini Header Section */

    $wp_customize->add_setting( 'hongo_mini_header_section_404_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_header_section_404_page', array(
		'label'     		=> __( 'Mini header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_mini_header_section',
		'settings'			=> 'hongo_mini_header_section_404_page',
		'choices'           => $hongo_general_mini_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage mini header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=mini-header' ) ),
		'active_callback' 	=> 'hongo_404_page_mini_header_enable_callback',
	) ) );

	/* End 404 Page Mini Header Section */

	// 404 Page Mini header callback
	if ( ! function_exists( 'hongo_404_page_mini_header_enable_callback' ) ) {
        function hongo_404_page_mini_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_mini_header_general_404_page' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}