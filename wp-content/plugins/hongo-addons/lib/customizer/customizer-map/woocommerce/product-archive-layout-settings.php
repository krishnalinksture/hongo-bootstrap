<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Enable Product Quick View */

	$wp_customize->add_setting(
		'hongo_product_archive_enable_quick_view',
		array(
			'default'           => '1',
			'sanitize_callback' => 'esc_attr'
		)
	);

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_quick_view', array(
		'label'     		=> __( 'Quick view', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_quick_view',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '3',
	) ) );

	/* End Enable Product Quick View */

	/*  Quick View Text  */

	$wp_customize->add_setting( 'hongo_product_archive_quick_view_text', array(
		'default' 			=> __( 'Quick View', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_quick_view_text', array(
		'label'     		=> __( 'Quick view text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_quick_view_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_product_archive_quick_view_text_callback',
		'priority'			=> '3',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_quick_view_text_callback' ) ) :
		function hongo_product_archive_quick_view_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_quick_view' )->value() == '1' && $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-minimalist' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Quick View Text */

	/* Enable Product Wishlist */

	$wp_customize->add_setting( 'hongo_product_archive_enable_wishlist', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_wishlist', array(
		'label'     		=> __( 'Wishlist', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_wishlist',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Wishlist */

	/*  Wishlist Text  */

	$wp_customize->add_setting( 'hongo_product_archive_wishlist_text', array(
		'default' 			=> __( 'Add to Wishlist', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_wishlist_text', array(
		'label'     		=> __( 'Wishlist text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_wishlist_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_product_archive_wishlist_text_callback',
		'priority'			=> '4',
	) ) );

	if ( ! function_exists( 'hongo_product_archive_wishlist_text_callback' ) ) :
		function hongo_product_archive_wishlist_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_wishlist' )->value() == '1' && $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-minimalist' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Wishlist Text */	

	/* Enable Product Compare */

	$wp_customize->add_setting( 'hongo_product_archive_enable_compare', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_product_archive_enable_compare', array(
		'label'     		=> __( 'Compare', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_enable_compare',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '5',
	) ) );

	/* End Enable Product Compare */

	/*  Compare Text  */

	$wp_customize->add_setting( 'hongo_product_archive_compare_text', array(
		'default' 			=> __( 'Compare', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_archive_compare_text', array(
		'label'     		=> __( 'Compare text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_archive_layout_panel',
		'settings'			=> 'hongo_product_archive_compare_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_product_archive_compare_text_callback',
		'priority'			=> '5',
	) ) );

	/* End Compare Text */

	if ( ! function_exists( 'hongo_product_archive_compare_text_callback' ) ) :
		function hongo_product_archive_compare_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_archive_enable_compare' )->value() == '1' && $control->manager->get_setting( 'hongo_product_archive_premade_style' )->value() != 'shop-minimalist' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;