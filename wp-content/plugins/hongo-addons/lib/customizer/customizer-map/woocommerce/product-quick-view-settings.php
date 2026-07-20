<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_quick_view_product_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_style_separator', array(
	    'label'     		=> __( 'Product style and data', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_style_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Product Deal */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_deal', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_deal', array(
		'label'     		=> __( 'Product countdown deal', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_deal',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Deal */

	/* Enable Product Sale Box */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_sale_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_sale_box', array(
		'label'     		=> __( 'Sale box', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_sale_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Sale Box */

	/* Enable Product New Box */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_new_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_new_box', array(
		'label'     		=> __( 'New box', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_new_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product New Box */

	/* Enable Product Title */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_title', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_title', array(
		'label'     		=> __( 'Title', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_title',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Title */

	/* Enable Product Title */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_title_link', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_title_link', array(
		'label'     		=> __( 'Title link', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_title_link',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Title */

	/* Enable Product Rating */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_rating', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_rating', array(
		'label'     		=> __( 'Rating', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_rating',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Rating */

	/* Enable Product Price */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_price', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_price', array(
		'label'     		=> __( 'Price', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_price',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Price */

	/* Enable Product Short Description */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_short_description', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_short_description', array(
		'label'     		=> __( 'Short description', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_short_description',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Short Description */

	/* Enable Product AJAX Add to Cart */

	$wp_customize->add_setting( 'hongo_quick_view_ajax_add_to_cart', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_ajax_add_to_cart', array(
		'label'     		=> __( 'AJAX add to cart', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_ajax_add_to_cart',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product AJAX Add to Cart */

	/* Enable Product Wishlist */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_wishlist', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_wishlist', array(
		'label'       		=> __( 'Wishlist', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_wishlist',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Wishlist */

	/*  Wishlist Text  */

	$wp_customize->add_setting( 'hongo_quick_view_product_wishlist_text', array(
		'default' 			=> __( 'Add to Wishlist', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_wishlist_text', array(
		'label'     		=> __( 'Wishlist text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_wishlist_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_quick_view_product_wishlist_text_callback',
	) ) );

	/* End Wishlist Text */

	/* Enable Product Compare */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_compare', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_compare', array(
		'label'     		=> __( 'Compare', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_compare',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Compare */

	/* Compare Text */

	$wp_customize->add_setting( 'hongo_quick_view_product_compare_text', array(
		'default' 			=> __( 'Add to Compare', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_compare_text', array(
		'label'     		=> __( 'Compare text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_compare_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_quick_view_product_compare_text_callback',
	) ) );

	/* End Compare Text */

	/* Enable Product SKU */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_sku', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_sku', array(
		'label'     		=> __( 'SKU', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_sku',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product SKU */

	/* Enable Product Category */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_category', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_category', array(
		'label'     		=> __( 'Category', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_category',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Category */

	/* Enable Product Tag */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_tag', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_tag', array(
		'label'     		=> __( 'Tag', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_tag',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Tag */

	/* Enable Product Share */

	$wp_customize->add_setting( 'hongo_quick_view_product_enable_social_share', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_quick_view_product_enable_social_share', array(
		'label'     		=> __( 'Share', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_enable_social_share',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Product Share */

	/* Quick view countdown color Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_deal_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_deal_color', array(
	    'label'				=> __( 'Countdown color', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_deal_color',
	    'active_callback'	=> 'hongo_quick_view_product_deal_color_callback',
	) ) );

	/* End Quick view countdown color Separator setting */

/* Quick view single countdown number color */

	$wp_customize->add_setting( 'hongo_quick_view_product_number_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_number_color', array(
	    'label'				=> __( 'Countdown number color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_number_color',
	    'active_callback'	=> 'hongo_quick_view_product_deal_color_callback',
	) ) );

	/* End Quick view single countdown number color */

	/* Quick view single countdown text color */

	$wp_customize->add_setting( 'hongo_quick_view_product_deal_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_deal_text_color', array(
	    'label'				=> __( 'Countdown text color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_deal_text_color',
	    'active_callback'	=> 'hongo_quick_view_product_deal_color_callback',
	) ) );

	/* End Quick view single countdown text color */

	$wp_customize->add_setting( 'hongo_quick_view_product_sale_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_sale_typography', array(
	    'label'     		=> __( 'Sale, New & Sold box typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_sale_typography',
	 	'active_callback'   => 'hongo_quick_view_product_sale_and_new_box_callback',
	) ) );

	/* End Product Sale Typography Separator setting */

	/* Product Sale Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_sale_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_sale_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_sale_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	 	'active_callback'   => 'hongo_quick_view_product_sale_and_new_box_callback',
	) ) );

	/* End Product Sale Font size */

	/* Product Sale Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_sale_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_sale_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_sale_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	 	'active_callback'   => 'hongo_quick_view_product_sale_and_new_box_callback',
	) ) );

	/* End Product Sale Line height */

	/* Product Title Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_sale_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_sale_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_sale_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_sale_and_new_box_callback',
	) ) );

	/* End Product Title Letter spacing */


	/* Product Sale Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_sale_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_sale_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_sale_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	 	'active_callback'   => 'hongo_quick_view_product_sale_and_new_box_callback',
	) ) );

	/* End Product Sale Font weight */

	/* Product Sale Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_sale_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_sale_color', array(
	    'label'     		=> __( 'Sale box color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_sale_color',
	 	'active_callback'   => 'hongo_quick_view_product_sale_box_callback',
	) ) );

	/* End Product Sale Color */

	/* Product Sale Background Color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_sale_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_sale_bg_color', array(
	    'label'     		=> __( 'Sale box background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_sale_bg_color',
	 	'active_callback'   => 'hongo_quick_view_product_sale_box_callback',
	) ) );

	/* Product Sale Background Color setting */

	/* Product New Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_new_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_new_color', array(
	    'label'     		=> __( 'New box color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_new_color',
	 	'active_callback'   => 'hongo_quick_view_product_new_box_callback',
	) ) );

	/* End Product New Color */

	/* Product New Background Color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_new_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_new_bg_color', array(
	    'label'     		=> __( 'New box background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_new_bg_color',
	 	'active_callback'   => 'hongo_quick_view_product_new_box_callback',
	) ) );

	/* Product New Background Color setting */

	/* Product Sold Box Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_soldout_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_soldout_color', array(
	    'label'     		=> __( 'Sold box color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_soldout_color',	 	
	) ) );

	/* End Product Sold Color */

	/* Product Sold Background Color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_soldout_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_soldout_bg_color', array(
	    'label'     		=> __( 'Sold box background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_soldout_bg_color',	 	
	) ) );

	/* Product Sold Background Color setting */

	/* Product Title Typography Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_page_title_typography', array(
	    'label'     		=> __( 'Title typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_page_title_typography',
		'active_callback'	=> 'hongo_quick_view_product_page_title_callback',
	) ) );

	/* End Product Title Typography Separator setting */

	/* Product Title Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_title_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_title_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_page_title_callback',
	) ) );

	/* End Product Title Font size */

	/* Product Title Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_title_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_title_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_page_title_callback',
	) ) );

	/* End Product Title Line height */

	/* Product Title Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_title_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_title_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_page_title_callback',
	) ) );

	/* End Product Title Letter spacing */

	/* Product Title Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_title_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_quick_view_product_page_title_callback',
	) ) );

	/* End Product Title Font weight */	

	/* Product Title Text Transform */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_title_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_title_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Product Title Text Transform */

	/* Product Title Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_page_title_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_page_title_color',
		'active_callback'	=> 'hongo_quick_view_product_page_title_callback',
	) ) );

	/* End Product Title Color */

	/* Product Rating Star Color Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_rating_star_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_rating_star_typography', array(
	    'label'     		=> __( 'Rating star color', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_rating_star_typography',
		'active_callback'	=> 'hongo_quick_view_product_rating_callback',
	) ) );

	/* End Product Rating Star Color Separator setting */

	/* Product Rating Star Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_rating_star_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_rating_star_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_rating_star_color',
		'active_callback'	=> 'hongo_quick_view_product_rating_callback',
	) ) );

	/* End Product Rating Star Color */

	/* Product Price Typography Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_price_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_price_typography', array(
	    'label'     		=> __( 'Price typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_price_typography',
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Price Typography Separator setting */

	/* Product Price Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_price_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_price_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Price Font size */

	/* Product Price Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_price_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_price_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define line height like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Price Line height */

	/* Product Price Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_price_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_price_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_price_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Price Letter spacing */

	/* Product Price Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_price_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_price_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Price Font weight */

	/* Product Price Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_price_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_price_color',
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Price Color */

	/* Product Regular Price Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_regular_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_regular_price_color', array(
	    'label'     		=> __( 'Regular price color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_regular_price_color',
		'active_callback'	=> 'hongo_quick_view_product_price_callback',
	) ) );

	/* End Product Regular Price Color */

	/* Product Short Description Typography Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_short_description_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_short_description_typography', array(
	    'label'     		=> __( 'Short description typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_short_description_typography',
		'active_callback'	=> 'hongo_quick_view_product_short_description_callback',
	) ) );

	/* End Product Short Description Typography Separator setting */

	/* Product Short Description Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_short_description_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_short_description_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_short_description_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_short_description_callback',
	) ) );

	/* End Product Short Description Font size */

	/* Product Short Description Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_short_description_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_short_description_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_short_description_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_short_description_callback',
	) ) );

	/* End Product Short Description Line height */

	/* Product Short Description Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_short_description_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_short_description_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_short_description_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_quick_view_product_short_description_callback',
	) ) );

	/* End Product Short Description Letter spacing */

	/* Product Short Description Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_short_description_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_short_description_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_short_description_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_quick_view_product_short_description_callback',
	) ) );

	/* End Product Short Description Font weight */

	/* Product Short Description Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_short_description_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_short_description_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_short_description_color',
		'active_callback'	=> 'hongo_quick_view_product_short_description_callback',
	) ) );

	/* End Product Short Description Color */

	/* Product Stock Typography Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_stock_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_stock_typography', array(
	    'label'     		=> __( 'Instock / Outstock typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_stock_typography',
	) ) );

	/* End Product Stock Typography Separator setting */

	/* Product Stock Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_stock_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_stock_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_stock_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Product Stock Font size */

	/* Product Stock Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_stock_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_stock_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_stock_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Product Stock Line height */

	/* Product Stock Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_stock_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_stock_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_stock_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Product Stock Letter spacing */

	/* Product Stock Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_stock_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_stock_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_stock_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Stock Font weight */

	/* Quick View Product Stock Text Transform */

    $wp_customize->add_setting( 'hongo_quick_view_product_stock_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_stock_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_stock_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Quick View Product Stock Text Transform */

	/* Product In Stock Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_stock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_stock_color', array(
	    'label'     		=> __( 'InStock color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_stock_color',
	) ) );

	/* End Product In Stock Color */

	/* Product Out Of Stock Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_out_of_stock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_out_of_stock_color', array(
	    'label'     		=> __( 'Out of Stock color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_out_of_stock_color',
	) ) );

	/* End Product Out Of Stock Color */

	/* Product Button Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_button_typography', array(
	    'label'     		=> __( 'Button typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_button_typography',
	) ) );

	/* End Product Button Separator setting */

	/* Quick View Product Button Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_button_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_button_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Quick View Product Button Font size */

	/* Quick View Product Button Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_button_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_button_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Quick View Product Button Line height */

	/* Quick View Product Button Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_button_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_button_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Quick View Product Button Letter spacing */

	/* Quick View Product Button Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_button_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,

	) ) );

	/* End Quick View Product Button Font weight */

	/* Quick View Product Button Text Transform */

    $wp_customize->add_setting( 'hongo_quick_view_product_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_button_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Quick View Product Button Text Transform */

	/* Product Button color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_button_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_button_color',
	) ) );

	/* End Product Button color setting */

	/* Product Button BG color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_button_bg_color', array(
	    'label'     		=> __( 'Background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_button_bg_color',
	) ) );

	/* End Product Button BG color setting */

	/* Product Button Border color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_button_border_color', array(
	    'label'     		=> __( 'Border color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_button_border_color',
	) ) );

	/* End Product Button Border color setting */

	/* Product Compare Button Border Hover color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_button_border_hover_color', array(
	    'label'     		=> __( 'Border hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_button_border_hover_color',
	) ) );

	/* End Product Compare Button Border Hover color setting */

	/* Product Button Hover color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_button_hover_color', array(
	    'label'     		=> __( 'Hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_button_hover_color',
	) ) );

	/* End Product Button Hover color setting */

	/* Product Button Hover BG color setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_button_hover_bg_color', array(
	    'label'     		=> __( 'Hover background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_button_hover_bg_color',
	) ) );

	/* End Product Button Hover BG color setting */

	/* Product Meta Typography Separator setting */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_meta_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_quick_view_product_page_meta_typography', array(
	    'label'     		=> __( 'Product meta typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'   		=> 'hongo_quick_view_product_page_meta_typography',
	) ) );

	/* End Product Meta Typography Separator setting */

	/* Product Meta Font size */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_meta_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_meta_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Product Meta Font size */

	/* Product Meta Line height */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_meta_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_meta_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Product Meta Line height */

	/* Product Meta Letter spacing */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_meta_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_meta_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_meta_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Product Meta Letter spacing */

	/* Product Meta Font weight */

    $wp_customize->add_setting( 'hongo_quick_view_product_page_meta_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_quick_view_product_page_meta_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_quick_view_panel',
		'settings'			=> 'hongo_quick_view_product_page_meta_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Meta Font weight */

	/* Product Meta Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_page_meta_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_page_meta_color',
	) ) );

	/* End Product Meta Color */

	/* Product Meta Link Hover Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_meta_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_page_meta_link_hover_color', array(
	    'label'     		=> __( 'Link hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_page_meta_link_hover_color',
	) ) );

	/* End Product Meta Link Hover Color */

	/* Product Meta Heading Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_meta_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_page_meta_heading_color', array(
	    'label'     		=> __( 'Heading color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_page_meta_heading_color',
	) ) );

	/* End Product Meta Heading Color */

	/* Product Meta Social Icon Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_meta_social_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_page_meta_social_icon_color', array(
	    'label'     		=> __( 'Social icon color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_page_meta_social_icon_color',
	) ) );

	/* End Product Meta Social Icon Color */

	/* Product Meta Social Icon Color */

	$wp_customize->add_setting( 'hongo_quick_view_product_page_meta_social_icon_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_quick_view_product_page_meta_social_icon_hover_color', array(
	    'label'     		=> __( 'Social icon hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_quick_view_panel',
	    'settings'	 		=> 'hongo_quick_view_product_page_meta_social_icon_hover_color',
	) ) );

	/* End Product Meta Social Icon Color */

	/* Custom Callback Functions */

	if ( ! function_exists( 'hongo_quick_view_product_sale_box_callback' ) ) :
		function hongo_quick_view_product_sale_box_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_sale_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_new_box_callback' ) ) :
		function hongo_quick_view_product_new_box_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_wishlist_text_callback' ) ) :
		function hongo_quick_view_product_wishlist_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_wishlist' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_compare_text_callback' ) ) :
		function hongo_quick_view_product_compare_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_compare' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	

	if ( ! function_exists( 'hongo_quick_view_product_deal_color_callback' ) ) :
		function hongo_quick_view_product_deal_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_deal' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_sale_and_new_box_callback' ) ) :
		function hongo_quick_view_product_sale_and_new_box_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_new_box' )->value() == '1' || $control->manager->get_setting( 'hongo_quick_view_product_enable_sale_box' )->value() == '1'  ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_sale_border_callback' ) ) :
		function hongo_quick_view_product_sale_border_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_sale_box' )->value() == '1' && $control->manager->get_setting( 'hongo_quick_view_product_sale_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_page_title_callback' ) ) :
		function hongo_quick_view_product_page_title_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_title' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_rating_callback' ) ) :
		function hongo_quick_view_product_rating_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_rating' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_price_callback' ) ) :
		function hongo_quick_view_product_price_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_price' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_short_description_callback' ) ) :
		function hongo_quick_view_product_short_description_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_short_description' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_stock_border_callback' ) ) :
		function hongo_quick_view_product_stock_border_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_quick_view_product_stock_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_quick_view_product_share_title_callback' ) ) :
	   	function hongo_quick_view_product_share_title_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_quick_view_product_enable_social_share' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Custom Callback Functions */