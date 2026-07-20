<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_checkout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_checkout_separator', array(
	    'label'				=> __( 'Checkout', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'hongo_checkout_separator',
	    'priority'	 		=> 1
	) ) );
	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_checkout_heading_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_checkout_heading_separator', array(
	    'label'				=> __( 'Title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'hongo_checkout_heading_separator',	    
	) ) );
	/* End Separator Settings */

	/* Heading Text font size setting */
	$wp_customize->add_setting( 'hongo_checkout_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_heading_font_size', array(
	    'label'				=> __( 'Font size', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_heading_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Heading Text font size setting */

	/* Heading Text Line Height setting */
	$wp_customize->add_setting( 'hongo_checkout_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_heading_line_height', array(
	    'label'				=> __( 'Line height', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_heading_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Heading Text Line Height setting */

	/* Heading Text Letter Spacing setting */
	$wp_customize->add_setting( 'hongo_checkout_heading_latter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_heading_latter_spacing', array(
	    'label'				=> __( 'Letter spacing', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_heading_latter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Heading Text Letter Spacing setting */

	/* Menu Heading Transform setting */
    $wp_customize->add_setting( 'hongo_checkout_heading_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( 'hongo_checkout_heading_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_heading_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		            => esc_html__( 'Select', 'hongo' ),
								    'uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'			=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'				=> esc_html__( 'None', 'hongo' ),
								   ),	 
	) );
	/* End Heading Text Transform setting */

	/* Heading Font weight */

    $wp_customize->add_setting( 'hongo_checkout_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( 'hongo_checkout_heading_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) );

	/* End Heading Font weight */

	/* Select Heading Text Color */
	$wp_customize->add_setting( 'hongo_checkout_heading_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_heading_text_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_heading_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Heading Text Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_checkout_label_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_checkout_label_separator', array(
	    'label'				=> __( 'Form typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'hongo_checkout_label_separator',	    
	) ) );
	/* End Separator Settings */

	/* Label Text font size setting */
	$wp_customize->add_setting( 'hongo_checkout_label_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_label_font_size', array(
	    'label'				=> __( 'Label font size', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_label_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Label Text font size setting */

	/* Label Text Line Height setting */
	$wp_customize->add_setting( 'hongo_checkout_label_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_label_line_height', array(
	    'label'				=> __( 'Label line height', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_label_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Label Text Line Height setting */

	/* Label Text Letter Spacing setting */
	$wp_customize->add_setting( 'hongo_checkout_label_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_label_letter_spacing', array(
	    'label'				=> __( 'Label letter spacing', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_label_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Label Text Letter Spacing setting */

	/* Label Transform setting */
    $wp_customize->add_setting( 'hongo_checkout_label_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_label_text_transform', array(
		'label'				=> __( 'Label text case', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_label_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		        => esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
								   ),	 
	) ) );
	/* End Label Transform setting */

	/* Label Font weight */

    $wp_customize->add_setting( 'hongo_checkout_label_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( 'hongo_checkout_label_font_weight', array(
		'label'				=> __( 'Label font weight', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_label_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) );

	/* End Label Font weight */

	/* Select Label Text Color */
	$wp_customize->add_setting( 'hongo_checkout_label_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_label_text_color', array(
	    'label'				=> __( 'Label color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_label_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Label Text Color */

	/* Input Border Text Color */
	$wp_customize->add_setting( 'hongo_checkout_input_border_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_input_border_color', array(
	    'label'				=> __( 'Input border color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_input_border_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Input Border Text Color */

	/* Input Text Color */
	$wp_customize->add_setting( 'hongo_checkout_input_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_input_color', array(
	    'label'				=> __( 'Input color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_input_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Input Text Color */

	/* Input Placeholder Text Color */
	$wp_customize->add_setting( 'hongo_checkout_input_placeholder_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_input_placeholder_color', array(
	    'label'				=> __( 'Input placeholder color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_input_placeholder_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Input Placeholder Text Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_checkout_button_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_checkout_button_separator', array(
	    'label'				=> __( 'Button typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'hongo_checkout_button_separator',	    
	) ) );

	/* End Separator Settings */

	/* Checkout Button Font size */

    $wp_customize->add_setting( 'hongo_checkout_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_button_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_button_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Button Checkout Font size */
	
	/* Checkout Button Line height */

    $wp_customize->add_setting( 'hongo_checkout_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_button_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_button_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Checkout Button Line height */

	/* Checkout Button Letter spacing */

    $wp_customize->add_setting( 'hongo_checkout_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_button_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_button_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Checkout Button Letter spacing */

	/* Checkout Button Text transform */

    $wp_customize->add_setting( 'hongo_checkout_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_button_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Checkout Button Text transform */

	/* Checkout Button Font weight */

    $wp_customize->add_setting( 'hongo_checkout_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_button_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Checkout Button Font weight */

	/* Checkout Button Background Color */

	$wp_customize->add_setting( 'hongo_checkout_bg_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_bg_button_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_bg_button_color',
	) ) );
	/* End Checkout Button Background Color */

	/* Checkout Button Background Hover Color */

	$wp_customize->add_setting( 'hongo_checkout_bg_hover_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_bg_hover_button_color', array(
	    'label'				=> __( 'Background hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_bg_hover_button_color',
	) ) );
	/* End Checkout Button Background Hover Color */

	/* Checkout Button Color */

	$wp_customize->add_setting( 'hongo_checkout_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_button_color',
	) ) );
	/* End Checkout Button Color */

	/* Checkout Button Hover Color */

	$wp_customize->add_setting( 'hongo_checkout_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_button_hover_color',
	) ) );
	/* End Checkout Button Hover Color */

	/* Checkout Border Button Color */

	$wp_customize->add_setting( 'hongo_checkout_border_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_border_button_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_border_button_color',
	) ) );

	/* End Checkout Border Button Color */

	/* Checkout Border Button Hover Color */

	$wp_customize->add_setting( 'hongo_checkout_border_hover_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_border_hover_button_color', array(
	    'label'				=> __( 'Border hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_border_hover_button_color',
	) ) );
	
	/* End Border Checkout Button Hover Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_checkout_payment_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_checkout_payment_separator', array(
	    'label'				=> __( 'Payment box typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'hongo_checkout_payment_separator',   
	) ) );
	/* End Separator Settings */

	/* Select Payment Background Color */
	$wp_customize->add_setting( 'hongo_checkout_payment_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_payment_background_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_payment_background_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Payment Message-Box Background Color */

	/* Select Payment Message-Box Background Color */
	$wp_customize->add_setting( 'hongo_checkout_payment_msgbox_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize,
	 'hongo_checkout_payment_msgbox_background_color', array(
	    'label'				=> __( 'Content background color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_payment_msgbox_background_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Payment Message-Box Background Color */

	/* Payment Label Text font size setting */
	$wp_customize->add_setting( 'hongo_checkout_payment_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_payment_text_font_size', array(
	    'label'				=> __( 'Label font size', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_payment_text_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Payment Label Text font size setting */

	/* Payment Label Text Line Height setting */
	$wp_customize->add_setting( 'hongo_checkout_payment_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_payment_line_height', array(
	    'label'				=> __( 'Label line height', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_payment_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Payment Label Text Line Height setting */

	/* Payment Label Text Letter Spacing setting */
	$wp_customize->add_setting( 'hongo_checkout_payment_latter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_checkout_payment_latter_spacing', array(
	    'label'				=> __( 'Label letter spacing', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_payment_latter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Payment Label Text Letter Spacing setting */

	/* Payment Label Transform setting */
    $wp_customize->add_setting( 'hongo_checkout_payment_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_payment_text_transform', array(
		'label'				=> __( 'Label text case', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_payment_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
								   ),	 
	) ) );
	/* End Payment Label Transform setting */			

	/* Payment Label Font weight */

    $wp_customize->add_setting( 'hongo_checkout_payment_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_checkout_payment_font_weight', array(
		'label'				=> __( 'Label font weight', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_checkout_payment_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Payment Label Font weight */

	/* Select Payment Label Text Color */
	$wp_customize->add_setting( 'hongo_checkout_payment_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_payment_color', array(
	    'label'				=> __( 'Label color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_payment_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Payment Label Text Color */

	/* Payment Content-Box Text font size setting */
	$wp_customize->add_setting( 'hongo_payment_content_box_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_payment_content_box_font_size', array(
	    'label'				=> __( 'Content font size', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_payment_content_box_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Payment Content-Box Text font size setting */

	/* Payment Content-Box Text Line Height setting */
	$wp_customize->add_setting( 'hongo_payment_content_box_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_payment_content_box_line_height', array(
	    'label'				=> __( 'Content line height', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_payment_content_box_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Payment Content-Box Text Line Height setting */

	/* Payment Content-Box Text Letter Spacing setting */
	$wp_customize->add_setting( 'hongo_payment_content_box_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_payment_content_box_letter_spacing', array(
	    'label'				=> __( 'Content letter spacing', 'hongo' ),
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_payment_content_box_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Payment Content-Box Text Letter Spacing setting */

	/* Payment Content-Box Transform setting */
    $wp_customize->add_setting( 'hongo_payment_content_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_payment_content_text_transform', array(
		'label'				=> __( 'Content text case', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_payment_content_text_transform',
		'type'              => 'select',
		'choices'           => 	array(
									''				=> esc_html__( 'Select', 'hongo' ),
									'uppercase'		=> esc_html__( 'Uppercase', 'hongo' ),
									'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
									'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
									'none'			=> esc_html__( 'None', 'hongo' ),
								),
	) ) );
	/* End Payment Content-Box Transform setting */

	/* Payment Content Font weight */

    $wp_customize->add_setting( 'hongo_payment_content_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_payment_content_font_weight', array(
		'label'				=> __( 'Content font weight', 'hongo' ),
		'section'     		=> 'woocommerce_checkout',
		'settings'			=> 'hongo_payment_content_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Payment Content Font weight */

	/* Select Content Heading Text Color */
	$wp_customize->add_setting( 'hongo_payment_content_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_payment_content_text_color', array(
	    'label'				=> __( 'Content color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_payment_content_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Heading Text Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_checkout_general_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_checkout_general_separator', array(
	    'label'				=> __( 'General', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'hongo_checkout_general_separator',	    
	) ) );
	/* End Separator Settings */

	/* Login / Coupon heading Color */
	$wp_customize->add_setting( 'hongo_checkout_top_heading_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_top_heading_text_color', array(
	    'label'				=> __( 'Login / Coupon heading color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_top_heading_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Login / Coupon heading Color */

	/* Login / Coupon Icon Color */
	$wp_customize->add_setting( 'hongo_checkout_top_heading_icon_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_top_heading_icon_color', array(
	    'label'				=> __( 'Login / Coupon icon color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_top_heading_icon_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Login / Coupon Icon Color */

	/* Lost Password Text Color */
	$wp_customize->add_setting( 'hongo_checkout_lost_pass_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_lost_pass_text_color', array(
	    'label'				=> __( 'Lost password color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_lost_pass_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Lost Password Text Color */

	/* Content Right Background Color */
	$wp_customize->add_setting( 'hongo_checkout_right_box_bg_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_right_box_bg_color', array(
	    'label'				=> __( 'Sidebar background color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_right_box_bg_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Right Background Color */

	/* Content Right Background Color */
	$wp_customize->add_setting( 'hongo_checkout_right_border_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_right_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_right_border_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Right Background Color */

	/* Checkout Total Color */
	$wp_customize->add_setting( 'hongo_checkout_total_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_total_color', array(
	    'label'				=> __( 'Total color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_total_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Right Background Color */

	/* Content Heading Text Color */
	$wp_customize->add_setting( 'hongo_checkout_content_heading_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_content_heading_text_color', array(
	    'label'				=> __( 'Content heading color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_content_heading_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Heading Text Color */

	/* Content Text Color */
	$wp_customize->add_setting( 'hongo_checkout_content_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_checkout_content_text_color', array(
	    'label'				=> __( 'Content color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'	 		=> 'hongo_checkout_content_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Text Color */