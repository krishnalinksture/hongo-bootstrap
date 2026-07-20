<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Get All Register Footer Section List. */
	$hongo_footer_section_data = hongo_addons_get_builder_section_data( 'footer' );
	$hongo_general_footer_section_data = hongo_addons_get_builder_section_data( 'footer', false, true );

	/* Separator Footer General Settings */

	$wp_customize->add_setting( 'hongo_general_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_general_footer_separator', array(
	    'label'     		=> __( 'General', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_general_footer_separator',	    
	) ) );

	/* End Separator Footer General Settings */

	/* Start Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Footer */

	/* Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section',
		'type'              => 'select',
		'choices'           => $hongo_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
	) ) );

	/* End Footer Section */

	/* Page Separator Footer Settings */

	$wp_customize->add_setting( 'hongo_page_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_page_footer_separator', array(
	    'label'     		=> __( 'Page', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_page_footer_separator',
	) ) );

	/* End Page Separator Footer Settings */

	/* Page Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_single_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_single_page', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_single_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Page Enable General Footer */

	/* Start Page Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_single_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_single_page', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_single_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_page_footer_enable_callback',
	) ) );

	/* End Page Enable Footer */

	/* Page Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_single_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_single_page', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section_single_page',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_page_footer_enable_callback',
	) ) );

	/* End Page Footer Section */

	// Footer enable callback
	if ( ! function_exists( 'hongo_page_footer_enable_callback' ) ) {
        function hongo_page_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_single_page' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Footer Single Post Settings */

	$wp_customize->add_setting( 'hongo_single_post_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_post_footer_separator', array(
	    'label'     		=> __( 'Post Single', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_single_post_footer_separator',
	) ) );

	/* End Separator Footer Single Post Settings */

	/* Post Single Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_single_post', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_single_post', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_single_post',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Post Single Enable General Footer */

	/* Start Post Single Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_single_post', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_single_post', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_single_post',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_single_post_footer_enable_callback',
	) ) );

	/* End Post Single Enable Footer */

	/* Post Single Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_single_post', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_single_post', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section_single_post',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_single_post_footer_enable_callback',
	) ) );

	/* End Post Single Footer Section */

	// Post Single Footer enable callback
	if ( ! function_exists( 'hongo_single_post_footer_enable_callback' ) ) {
        function hongo_single_post_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_single_post' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Footer Post Archive Settings */

	$wp_customize->add_setting( 'hongo_archive_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_archive_footer_separator', array(
	    'label'     		=> __( 'Post Archive', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_archive_footer_separator',	    
	) ) );

	/* End Separator Footer Post Archive Settings */

	/* Post Archive Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_archive', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Post Archive Enable General Footer */

	/* Post Archive Start Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_archive', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_archive_footer_enable_callback',
	) ) );

	/* End Post Archive Enable Footer */

	/* Post Archive Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_archive', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section_archive',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_archive_footer_enable_callback',
	) ) );

	/* End Post Archive Footer Section */

	// Post Archive Footer enable callback
	if ( ! function_exists( 'hongo_archive_footer_enable_callback' ) ) {
        function hongo_archive_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_archive' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Footer Default Settings */

	$wp_customize->add_setting( 'hongo_default_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_footer_separator', array(
	    'label'     		=> __( 'Default Posts / Blog Home', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_default_footer_separator',	    
	) ) );

	/* End Separator Footer Default Settings */

	/* Default Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_default', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Default Enable General Footer */

	/* Start Footer Default Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_default', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_default_footer_enable_callback',
	) ) );

	/* End Footer Default Enable Footer */

	/* Footer Default Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_default', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_default_footer_enable_callback',
	) ) );

	/* End Footer Default Footer Section */

	// Footer Default Footer enable callback
	if ( ! function_exists( 'hongo_default_footer_enable_callback' ) ) {
        function hongo_default_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_default' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Footer Product Single Settings */

	$wp_customize->add_setting( 'hongo_single_product_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_footer_separator', array(
	    'label'     		=> __( 'Product Single', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_single_product_footer_separator',	    
	) ) );

	/* End Separator Footer Product Single Settings */

	/* Product Single Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_single_product', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_single_product', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_single_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Product Single Enable General Footer */

	/* Product Single Start Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_single_product', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_single_product', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_single_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_single_product_footer_enable_callback',
	) ) );

	/* End Product Single Enable Footer */

	/* Product Single Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_single_product', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_single_product', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section_single_product',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_single_product_footer_enable_callback',
	) ) );

	/* End Product Single Footer Section */

	// Product Single Footer enable callback
	if ( ! function_exists( 'hongo_single_product_footer_enable_callback' ) ) {
        function hongo_single_product_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_single_product' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Footer Product Archive Settings */

	$wp_customize->add_setting( 'hongo_product_archive_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_footer_separator', array(
	    'label'     		=> __( 'Product Archive / Shop', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_product_archive_footer_separator',
	) ) );

	/* End Separator Footer Product Archive Settings */

	/* Product Archive Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_product_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_product_archive', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_product_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Product Archive Enable General Footer */

	/* Start Product Archive Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_product_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_product_archive', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_product_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_product_archive_footer_enable_callback',
	) ) );

	/* End Product Archive Enable Footer */

	/* Product Archive Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_product_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_product_archive', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section_product_archive',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_product_archive_footer_enable_callback',
	) ) );

	/* End Product Archive Footer Section */

	// Product Archive Footer enable callback
	if ( ! function_exists( 'hongo_product_archive_footer_enable_callback' ) ) {
        function hongo_product_archive_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_product_archive' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Footer 404 Page Settings */

	$wp_customize->add_setting( 'hongo_404_page_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_404_page_footer_separator', array(
	    'label'     		=> __( '404 Page', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_footer_section',
	    'settings'   		=> 'hongo_404_page_footer_separator',
	) ) );

	/* End Separator Footer 404 Page Settings */

	/* 404 Page Enable General Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_general_404_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_footer_general_404_page', array(
		'label'     		=> __( 'General footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_general_404_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End 404 Page Enable General Footer */

	/* Start 404 Page Enable Footer */

    $wp_customize->add_setting( 'hongo_enable_footer_404_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new hongo_Customize_switch_Control( $wp_customize, 'hongo_enable_footer_404_page', array(
		'label'     		=> __( 'Footer', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_enable_footer_404_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_404_page_footer_enable_callback',
	) ) );

	/* End 404 Page Enable Footer */

	/* 404 Page Footer Section */

    $wp_customize->add_setting( 'hongo_footer_section_404_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_footer_section_404_page', array(
		'label'     		=> __( 'Footer section', 'hongo-addons' ),
		'section'     		=> 'hongo_add_footer_section',
		'settings'			=> 'hongo_footer_section_404_page',
		'type'              => 'select',
		'choices'           => $hongo_general_footer_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage footer in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=footer' ) ),
		'active_callback' 	=> 'hongo_404_page_footer_enable_callback',
	) ) );

	/* End 404 Page Footer Section */

	// 404 Page Footer enable callback
	if ( ! function_exists( 'hongo_404_page_footer_enable_callback' ) ) {
        function hongo_404_page_footer_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_footer_general_404_page' )->value() == '0' ) {
                return true;
            } else {
                return false;
            }
        }
	}