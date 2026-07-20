<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  
	
	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_wishlist_general_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_wishlist_general_separator', array(
	    'label'     		=> __( 'General', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'   		=> 'hongo_wishlist_general_separator',
	) ) );

	/* End Separator Settings */

	/* Wishlist Product Heading Color */

	$wp_customize->add_setting( 'hongo_wishlist_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_border_color', array(
	    'label'     		=> __( 'Border color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_border_color',
	) ) );

	/* End Wishlist Product Color */

	/* Wishlist Product Heading Color */

	$wp_customize->add_setting( 'hongo_wishlist_remove_empty_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_remove_empty_color', array(
	    'label'     		=> __( 'Remove / Empty wishlist color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_remove_empty_color',
	) ) );

	/* End Wishlist Product Color */

	/* Wishlist Remove Checkbox Border Color */

	$wp_customize->add_setting( 'hongo_wishlist_remove_checkbox_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_remove_checkbox_color', array(
	    'label'     		=> __( 'Remove checkbox color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_remove_checkbox_color',
	) ) );

	/* End Wishlist Remove Checkbox Border Color */

	/* Wishlist Remove Checkbox Checked Color */

	$wp_customize->add_setting( 'hongo_wishlist_remove_checkbox_checked_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_remove_checkbox_checked_color', array(
	    'label'     		=> __( 'Remove checkbox checked color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_remove_checkbox_checked_color',
	) ) );

	/* End Wishlist Remove Checkbox Checked Color */

	/* Wishlist Remove Icon Color */

	$wp_customize->add_setting( 'hongo_wishlist_remove_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_remove_icon_color', array(
	    'label'     		=> __( 'Remove icon color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_remove_icon_color',
	) ) );

	/* End Wishlist Remove Icon Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_wishlist_product_heading_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_wishlist_product_heading_separator', array(
	    'label'     		=> __( 'Heading typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'   		=> 'hongo_wishlist_product_heading_separator',
	) ) );

	/* End Separator Settings */

	/* Wishlist Product Heading Font size */

    $wp_customize->add_setting( 'hongo_wishlist_product_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_heading_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_heading_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Wishlist Product Heading Font size */
	/* Wishlist Product Heading Line height */

    $wp_customize->add_setting( 'hongo_wishlist_product_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_heading_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_heading_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Heading Line height */
	/* Wishlist Product Heading Letter spacing */

    $wp_customize->add_setting( 'hongo_wishlist_product_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_heading_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Heading Letter spacing */

	/* Wishlist Product Heading Font weight */

    $wp_customize->add_setting( 'hongo_wishlist_product_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_heading_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,

	) ) );

	/* End Wishlist Product Heading Font weight */

	/* Wishlist Product Heading Text Transform */

    $wp_customize->add_setting( 'hongo_wishlist_product_heading_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_heading_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_heading_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 			=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Wishlist Product Heading Text Transform */

	/* Wishlist Product Heading Color */

	$wp_customize->add_setting( 'hongo_wishlist_product_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_heading_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_heading_color',
	) ) );

	/* End Wishlist Product Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_wishlist_product_content_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_wishlist_product_content_separator', array(
	    'label'     		=> __( 'Content typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'   		=> 'hongo_wishlist_product_content_separator',
	) ) );

	/* End Separator Settings */

	/* Wishlist Product Content Font size */

    $wp_customize->add_setting( 'hongo_wishlist_product_content_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_content_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_content_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Wishlist Product Content Font size */
	/* Wishlist Product Content Line height */

    $wp_customize->add_setting( 'hongo_wishlist_product_content_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_content_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_content_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Content Line height */
	/* Wishlist Product Content Letter spacing */

    $wp_customize->add_setting( 'hongo_wishlist_product_content_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_content_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_content_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Content Letter spacing */

	/* Wishlist Product Content Font weight */

    $wp_customize->add_setting( 'hongo_wishlist_product_content_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_content_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_content_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,

	) ) );

	/* End Wishlist Product Content Font weight */

	/* Wishlist Product Content Text Transform */

    $wp_customize->add_setting( 'hongo_wishlist_product_content_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_content_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_content_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Wishlist Product Content Text Transform */

	/* Wishlist Product Content Color */

	$wp_customize->add_setting( 'hongo_wishlist_product_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_content_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_content_color',
	) ) );

	/* End Wishlist Product Color */

	/* Wishlist Product Content Hover Color */

	$wp_customize->add_setting( 'hongo_wishlist_product_content_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_content_hover_color', array(
	    'label'     		=> __( 'Hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_content_hover_color',
	) ) );

	/* End Wishlist Product Hover Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_wishlist_product_stock_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_wishlist_product_stock_separator', array(
	    'label'     		=> __( 'Instock / Outstock typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'   		=> 'hongo_wishlist_product_stock_separator',
	) ) );

	/* End Separator Settings */

	/* Wishlist Product Stock Font size */

    $wp_customize->add_setting( 'hongo_wishlist_product_stock_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_stock_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_stock_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Wishlist Product Stock Font size */
	/* Wishlist Product Stock Line height */

    $wp_customize->add_setting( 'hongo_wishlist_product_stock_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_stock_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_stock_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Stock Line height */
	/* Wishlist Product Stock Letter spacing */

    $wp_customize->add_setting( 'hongo_wishlist_product_stock_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_stock_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_stock_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Stock Letter spacing */

	/* Wishlist Product Stock Font weight */

    $wp_customize->add_setting( 'hongo_wishlist_product_stock_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_stock_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_stock_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,

	) ) );

	/* End Wishlist Product Stock Font weight */

	/* Wishlist Product Stock Text Transform */

    $wp_customize->add_setting( 'hongo_wishlist_product_stock_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_stock_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_stock_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Wishlist Product Stock Text Transform */

	/* Wishlist Product Instock Color */

	$wp_customize->add_setting( 'hongo_wishlist_product_instock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_instock_color', array(
	    'label'     		=> __( 'Instock color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_instock_color',
	) ) );

	/* End Wishlist Product Color */

	/* Wishlist Product Outstock Color */

	$wp_customize->add_setting( 'hongo_wishlist_product_outstock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_outstock_color', array(
	    'label'     		=> __( 'Outstock color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_outstock_color',
	) ) );

	/* End Wishlist Product Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_wishlist_product_button_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_wishlist_product_button_separator', array(
	    'label'     		=> __( 'Button typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'   		=> 'hongo_wishlist_product_button_separator',
	) ) );

	/* End Separator Settings */

	/* Wishlist Product Button Font size */

    $wp_customize->add_setting( 'hongo_wishlist_product_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_button_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_button_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Wishlist Product Button Font size */
	/* Wishlist Product Button Line height */

    $wp_customize->add_setting( 'hongo_wishlist_product_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_button_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_button_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Button Line height */
	/* Wishlist Product Button Letter spacing */

    $wp_customize->add_setting( 'hongo_wishlist_product_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_button_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_button_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Wishlist Product Button Letter spacing */

	/* Wishlist Product Button Font weight */

    $wp_customize->add_setting( 'hongo_wishlist_product_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_button_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,

	) ) );

	/* End Wishlist Product Button Font weight */

	/* Wishlist Product Button Text Transform */

    $wp_customize->add_setting( 'hongo_wishlist_product_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_wishlist_product_button_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_wishlist_panel',
		'settings'			=> 'hongo_wishlist_product_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Wishlist Product Button Text Transform */
	/* Product Wishlist Button BG color setting */

	$wp_customize->add_setting( 'hongo_wishlist_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_button_bg_color', array(
	    'label'     		=> __( 'Background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_button_bg_color',
	) ) );

	/* End Product Wishlist Button BG color setting */	

	/* Product Wishlist Button Hover BG color setting */

	$wp_customize->add_setting( 'hongo_wishlist_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_button_hover_bg_color', array(
	    'label'     		=> __( 'Hover background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_button_hover_bg_color',
	) ) );

	/* End Product Wishlist Button Hover BG color setting */

	/* Product Wishlist Button color setting */

	$wp_customize->add_setting( 'hongo_wishlist_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_button_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_button_color',
	) ) );

	/* End Product Wishlist Button color setting */

	/* Product Wishlist Button Hover color setting */

	$wp_customize->add_setting( 'hongo_wishlist_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_button_hover_color', array(
	    'label'     		=> __( 'Hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_button_hover_color',
	) ) );

	/* End Product Wishlist Button Hover color setting */

	/* Product Wishlist Button Border color setting */

	$wp_customize->add_setting( 'hongo_wishlist_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_button_border_color', array(
	    'label'     		=> __( 'Border color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_button_border_color',
	) ) );

	/* End Product Wishlist Button Border color setting */

	/* Product Wishlist Button Border Hover color setting */

	$wp_customize->add_setting( 'hongo_wishlist_product_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_wishlist_product_button_border_hover_color', array(
	    'label'     		=> __( 'Border hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_wishlist_panel',
	    'settings'	 		=> 'hongo_wishlist_product_button_border_hover_color',
	) ) );

	/* End Product Wishlist Button Border color setting */

/* End Custom Callback Functions */