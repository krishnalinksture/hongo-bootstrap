<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_title_tagline_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_title_tagline_separator', array(
	    'label'				=> __( 'Site Identity', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'title_tagline',
	    'settings'   		=> 'hongo_title_tagline_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_header_image_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_header_image_separator', array(
	    'label'				=> __( 'Header Image', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'header_image',
	    'settings'   		=> 'hongo_header_image_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */


	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_background_image_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_background_image_separator', array(
	    'label'				=> __( 'Background Image Identity', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'background_image',
	    'settings'   		=> 'hongo_background_image_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_store_notice_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_store_notice_separator', array(
	    'label'				=> __( 'Store Notice', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_store_notice',
	    'settings'   		=> 'hongo_store_notice_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_catalog_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_catalog_separator', array(
	    'label'				=> __( 'Product Catalog', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_product_catalog',
	    'settings'   		=> 'hongo_product_catalog_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_images_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_images_separator', array(
	    'label'				=> __( 'Product Images', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_product_images',
	    'settings'   		=> 'hongo_product_images_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */
