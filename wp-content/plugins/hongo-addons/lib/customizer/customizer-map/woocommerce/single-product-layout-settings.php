<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Enable Product Variation Swatches Style */

	$wp_customize->add_setting( 'hongo_single_product_variation_swatch_style', array(
		'default' 			=> 'boxed',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_variation_swatch_style', array(
		'label'     		=> __( 'Variation swatch style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_variation_swatch_style',
		'type'              => 'select',
		'choices'           => array(
								    'none' => esc_html__( 'Default dropdown', 'hongo-addons' ),
									'boxed' => esc_html__( 'Boxed', 'hongo-addons' ),
							   ),
		'priority'			=> '3',
	) ) );

	/* End Enable Product Variation Swatches Style */

	/* Enable Product Variation Swatches tootltip */

	$wp_customize->add_setting( 'hongo_single_product_variation_swatch_tooltip', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_variation_swatch_tooltip', array(
		'label'     		=> __( 'Variation swatch tooltip', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_variation_swatch_tooltip',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_single_product_swatch_tooltip',
		'priority'			=> '3',
	) ) );

	if ( ! function_exists( 'hongo_single_product_swatch_tooltip' ) ) :
	   	function hongo_single_product_swatch_tooltip( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_variation_swatch_style' )->value() == 'boxed' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Enable Product Variation Swatches Style */

	/* Enable Product Wishlist */

	$wp_customize->add_setting( 'hongo_single_product_enable_wishlist', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_wishlist', array(
		'label'     		=> __( 'Wishlist', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_wishlist',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '5',
	) ) );

	/* End Enable Product Wishlist */

	/*  Wishlist Text */

	$wp_customize->add_setting( 'hongo_single_product_wishlist_text', array(
		'default' 			=> __( 'Add to Wishlist', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_wishlist_text', array(
		'label'     		=> __( 'Wishlist text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_wishlist_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_single_product_wishlist_text_callback',
		'priority'			=> '5',
	) ) );

	if ( ! function_exists( 'hongo_single_product_wishlist_text_callback' ) ) :
	   	function hongo_single_product_wishlist_text_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_wishlist' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Wishlist Text */

	/* Enable Product Compare */

	$wp_customize->add_setting( 'hongo_single_product_enable_compare', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_compare', array(
		'label'     		=> __( 'Compare', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_compare',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '6',
	) ) );

	/* End Enable Product Compare */

	/*  Compare Text  */

	$wp_customize->add_setting( 'hongo_single_product_compare_text', array(
		'default' 			=> __( 'Add to Compare', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_compare_text', array(
		'label'     		=> __( 'Compare text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_compare_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_single_product_compare_text_callback',
		'priority'			=> '6',
	) ) );

	if ( ! function_exists( 'hongo_single_product_compare_text_callback' ) ) :
	   	function hongo_single_product_compare_text_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_compare' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Compare Text */

	/* Enable Product Share */

	$wp_customize->add_setting( 'hongo_single_product_enable_social_share', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_social_share', array(
		'label'     		=> __( 'Share', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_social_share',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '6',
	) ) );

	/* End Enable Product Share */

	/* Product Share Title */

	$wp_customize->add_setting( 'hongo_single_product_share_title', array(
		'default' 			=> __( 'Share', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_share_title', array(
		'label'     		=> __( 'Share heading', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_share_title',
		'type'              => 'text',
		'active_callback'   => 'hongo_single_product_share_title_callback',
		'priority'			=> '6',
	) ) );

	if ( ! function_exists( 'hongo_single_product_share_title_callback' ) ) :
	   	function hongo_single_product_share_title_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_social_share' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Product Share Title */

	/* Enable Product Sticky add to cart */

	$wp_customize->add_setting( 'hongo_single_product_enable_sticky_add_to_cart', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_sticky_add_to_cart', array(
		'label'     		=> __( 'Sticky add to cart', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_sticky_add_to_cart',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '6',
	) ) );

	/* End Enable Product Sticky add to cart */

	/* Product navigation & Bradcrumb Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_breadcrumb_navigation', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_breadcrumb_navigation', array(
	    'label'     		=> __( 'Breadcrumb & Navigation box', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_breadcrumb_navigation',
	    'priority'			=> '8',
	) ) );

	/* End Product navigation & Bradcrumb Separator setting */

	/* Enable Product Title After Breadcrumb */

	$wp_customize->add_setting( 'hongo_single_product_enable_title_after_breadcrumb', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_title_after_breadcrumb', array(
		'label'     		=> __( 'Breadcrumb', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_title_after_breadcrumb',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '8',
	) ) );

	/* End Enable Product Title After Breadcrumb */

	/* Enable Product Title After Navigation */

	$wp_customize->add_setting( 'hongo_single_product_enable_title_after_navigation', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_title_after_navigation', array(
		'label'     		=> __( 'Navigation', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_title_after_navigation',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'			=> '8',
	) ) );

	/* End Enable Product Title After Breadcrumb */