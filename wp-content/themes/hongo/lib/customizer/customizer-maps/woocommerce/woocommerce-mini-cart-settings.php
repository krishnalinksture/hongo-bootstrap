<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_mini_cart_layout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_layout_separator', array(
	    'label'      		=> __( 'Layout', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_layout_separator',
	) ) );
	/* End Separator Settings */

	/* Mini cart layout style */
	$wp_customize->add_setting( 'hongo_mini_cart_layout_style', array(
		'default' 			=> 'mini-cart-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_mini_cart_layout_style', array(
		'label'       		=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_layout_style',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'mini-cart-style-1' => __( 'Toggle View', 'hongo' ),
									'mini-cart-style-2' => __( 'Left side view', 'hongo' ),
									'mini-cart-style-3' => __( 'Right side view', 'hongo' ),
								),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/mini-cart-toggle.png',
								  	HONGO_THEME_IMAGES_URI . '/mini-cart-left.png',
								  	HONGO_THEME_IMAGES_URI . '/mini-cart-right.png',
							   ),	
		'hongo_columns'    		=> '4',
	) ) );
	/* End Mini cart layout style */

	/* Enable Mini Cart Always Show */

	$wp_customize->add_setting( 'hongo_mini_cart_always_show', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_mini_cart_always_show', array(
		'label'				=> __( 'Always show', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_always_show',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'description'		=> __( 'If On then mini cart icon always show in cart and checkout page', 'hongo' ),
	) ) );

	/* End Enable Mini Cart Always Show */

	/* Default Layout For Post*/
	$wp_customize->add_setting( 'hongo_post_layout_setting_default', array(
		'default' 			=> 'hongo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_post_layout_setting_default', array(
		'label'       		=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'hongo_add_default_layout_panel',
		'settings'			=> 'hongo_post_layout_setting_default',
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
		'hongo_columns'    		=> '4',
	) ) );
	/* End Default Layout For Post */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_mini_cart_usp_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_usp_separator', array(
	    'label'				=> __( 'Unique Selling Proposition', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_usp_separator',	    
	) ) );
	/* End Separator Settings */

	/* Mini Cart USP Text */

    $wp_customize->add_setting( 'hongo_mini_cart_usp_text', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_usp_text', array(
		'label'				=> __( 'USP text', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_usp_text',
		'type'              => 'text',
	) ) );

	/* End Mini Cart USP Text */

	/* Mini Cart USP Text Font size */

    $wp_customize->add_setting( 'hongo_mini_cart_usp_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_usp_text_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_usp_text_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart USP Text Font size */

	/* Mini Cart USP Text Line height */

    $wp_customize->add_setting( 'hongo_mini_cart_usp_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_usp_text_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_usp_text_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart USP Text Line height */

	/* Mini Cart USP Text Letter spacing */

    $wp_customize->add_setting( 'hongo_mini_cart_usp_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_usp_text_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_usp_text_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart USP Text Letter spacing */

	/* Mini Cart USP Text Font weight */

    $wp_customize->add_setting( 'hongo_mini_cart_usp_text_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_usp_text_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_usp_text_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Mini Cart USP Text Font weight */

	/* Mini Cart USP Text Text Transform */

    $wp_customize->add_setting( 'hongo_mini_cart_usp_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_usp_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_usp_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Mini Cart USP Text Transform */

	/* USP text color */

	$wp_customize->add_setting( 'hongo_mini_cart_usp_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_usp_color', array(
	    'label'				=> __( 'USP color', 'hongo' ),
		'section'    		=> 'woocommerce_mini_cart',
		'settings'	 		=> 'hongo_mini_cart_usp_color',
	    'type'              => 'alpha_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	
	/* End USP text color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_mini_cart_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_separator', array(
	    'label'				=> __( 'General', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_separator',	    
	) ) );
	/* End Separator Settings */

	/* Mini cart background color */

	$wp_customize->add_setting( 'hongo_mini_cart_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_background_color', array(
	    'label'				=> __( 'Mini cart background color', 'hongo' ),
		'section'    		=> 'woocommerce_mini_cart',
		'settings'	 		=> 'hongo_mini_cart_background_color',
	    'type'              => 'alpha_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	
	/* End Mini cart background color */

	/* Mini Cart Separator Color */

	$wp_customize->add_setting( 'hongo_mini_cart_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_separator_color', array(
	    'label'				=> __( 'Separator color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_separator_color',
	) ) );

	/* End Mini Cart Separator Color */

	/* Mini Cart Close Button Color */

	$wp_customize->add_setting( 'hongo_mini_cart_close_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_close_button_color', array(
	    'label'				=> __( 'Close button color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_close_button_color',
	) ) );

	/* End Mini Cart Close Button Color */

	/* Mini Cart Title Typography Separator Setting */
	$wp_customize->add_setting( 'hongo_mini_cart_title_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_title_typography_separator', array(
	    'label'				=> __( 'Product title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_title_typography_separator',
	) ) );

	/* End Mini Cart Title Typography Separator Setting */

	/* Mini Cart Title Font size */

    $wp_customize->add_setting( 'hongo_mini_cart_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_title_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_title_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Title Font size */

	/* Mini Cart Title Line height */

    $wp_customize->add_setting( 'hongo_mini_cart_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_title_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_title_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Title Line height */

	/* Mini Cart Title Letter spacing */

    $wp_customize->add_setting( 'hongo_mini_cart_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_title_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_title_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Title Letter spacing */

	/* Mini Cart Title Font weight */

    $wp_customize->add_setting( 'hongo_mini_cart_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_title_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Mini Cart Title Font weight */

	/* Mini Cart Title Text Transform */

    $wp_customize->add_setting( 'hongo_mini_cart_title_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_title_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Mini Cart Title Text Transform */

	/* Mini Cart Title Color */

	$wp_customize->add_setting( 'hongo_mini_cart_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_title_color', array(
	    'label'				=> __( 'Title text color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_title_color',
	) ) );

	/* End Mini Cart Title Color */

	/* Mini Cart Title Background Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_title_hover_color', array(
	    'label'				=> __( 'Title hover text color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_title_hover_color',
	) ) );

	/* Mini Cart Title Background Color setting */

	/* Mini Cart Price Typography Separator Setting */
	$wp_customize->add_setting( 'hongo_mini_cart_price_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_price_typography_separator', array(
	    'label'				=> __( 'Price typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_price_typography_separator',
	) ) );

	/* End Mini Cart Price Typography Separator Setting */

	/* Mini Cart Price Font size */

    $wp_customize->add_setting( 'hongo_mini_cart_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_price_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_price_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Price Font size */

	/* Mini Cart Price Line height */

    $wp_customize->add_setting( 'hongo_mini_cart_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_price_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_price_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Price Line height */

	/* Mini Cart Price Letter spacing */

    $wp_customize->add_setting( 'hongo_mini_cart_price_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_price_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_price_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Price Letter spacing */

	/* Mini Cart Price Font weight */

    $wp_customize->add_setting( 'hongo_mini_cart_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_price_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_price_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Mini Cart Price Font weight */

	/* Mini Cart Price Color */

	$wp_customize->add_setting( 'hongo_mini_cart_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_price_color', array(
	    'label'				=> __( 'Price text color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_price_color',
	) ) );

	/* End Mini Cart Price Color */

	/* Mini Cart Subtotal Typography Separator Setting */
	$wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_typography_separator', array(
	    'label'				=> __( 'Subtotal label typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_subtotal_label_typography_separator',
	) ) );

	/* End Mini Cart Subtotal Typography Separator Setting */

		/* Mini Cart Subtotal label Font size */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_label_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Subtotal label Font size */

	/* Mini Cart Subtotal label Line height */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_label_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Subtotal label Line height */

	/* Mini Cart Subtotal label Letter spacing */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_label_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Subtotal label Letter spacing */

	/* Mini Cart Subtotal label Font weight */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_label_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Mini Cart Subtotal label Font weight */

	/* Mini Cart Subtotal label Transform */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_label_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Mini Cart subtotal label Transform */

	/* Mini Cart Subtotal label Color */

	$wp_customize->add_setting( 'hongo_mini_cart_subtotal_label_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_subtotal_label_color', array(
	    'label'				=> __( 'Subtotal text color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_subtotal_label_color',
	) ) );

	/* End Mini Cart Subtotal label Color */

	/* Mini Cart Subtotal Typography Separator Setting */
	$wp_customize->add_setting( 'hongo_mini_cart_subtotal_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_subtotal_typography_separator', array(
	    'label'				=> __( 'Subtotal price typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_subtotal_typography_separator',
	) ) );

	/* End Mini Cart Subtotal Typography Separator Setting */

	/* Mini Cart Subtotal Font size */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Subtotal Font size */

	/* Mini Cart Subtotal Line height */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Subtotal Line height */

	/* Mini Cart Subtotal Letter spacing */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Subtotal Letter spacing */

	/* Mini Cart Subtotal Font weight */

    $wp_customize->add_setting( 'hongo_mini_cart_subtotal_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_subtotal_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_subtotal_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Mini Cart Subtotal Font weight */

	/* Mini Cart Subtotal Color */

	$wp_customize->add_setting( 'hongo_mini_cart_subtotal_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_subtotal_color', array(
	    'label'				=> __( 'Subtotal text color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_subtotal_color',
	) ) );

	/* End Mini Cart Subtotal Color */

	/* Mini Cart Button Separator setting */

	$wp_customize->add_setting( 'hongo_mini_cart_button_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_button_typography_separator', array(
	    'label'				=> __( 'View cart and Checkout typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_button_typography_separator',
	) ) );

	/* End Mini Cart Button Separator setting */

	/* Mini Cart Button Font size */

    $wp_customize->add_setting( 'hongo_mini_cart_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_button_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_button_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Button Font size */

	/* Mini Cart Button Line height */

    $wp_customize->add_setting( 'hongo_mini_cart_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_button_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_button_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Button Line height */

	/* Mini Cart Button Letter spacing */

    $wp_customize->add_setting( 'hongo_mini_cart_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_button_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_button_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Mini Cart Button Letter spacing */

	/* Mini Cart Button Font weight */

    $wp_customize->add_setting( 'hongo_mini_cart_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_button_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Mini Cart Button Font weight */

	/* Mini Cart Button Transform */

    $wp_customize->add_setting( 'hongo_mini_cart_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_mini_cart_button_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_mini_cart',
		'settings'			=> 'hongo_mini_cart_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Mini Cart Button Transform */

	/* Mini Cart Button Separator setting */

	$wp_customize->add_setting( 'hongo_mini_cart_button_color_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_button_color_separator', array(
	    'label'				=> __( 'View cart colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_button_color_separator',
	) ) );

	/* End Mini Cart Button Separator setting */

	/* Mini Cart Button Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_button_color',
	) ) );

	/* End Mini Cart Button Color setting */

	/* Mini Cart Button Hover Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_button_hover_color',
	) ) );

	/* Mini Cart Button Hover Color setting */

	/* Mini Cart Button background Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_bg_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_bg_button_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_bg_button_color',
	) ) );

	/* End Mini Cart Button color setting */

	/* Mini Cart Button Background Hover Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_button_bg_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_button_bg_hover_color', array(
	    'label'				=> __( 'Hover background color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_button_bg_hover_color',
	) ) );

	/* Mini Cart Button Background Hover Color setting */

	/* Mini Cart Button Border Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_border_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_border_button_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_border_button_color',
	) ) );

	/* End Mini Cart Button color setting */

	/* Mini Cart Button Background Hover Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_button_border_hover_color', array(
	    'label'				=> __( 'Hover border color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_button_border_hover_color',
	) ) );

	/* Mini Cart Button Background Hover Color setting */

	/* Mini Cart checkout Button Separator setting */

	$wp_customize->add_setting( 'hongo_mini_cart_checkout_button_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mini_cart_checkout_button_typography_separator', array(
	    'label'				=> __( 'Checkout colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'   		=> 'hongo_mini_cart_checkout_button_typography_separator',
	) ) );

	/* End Mini Cart checkout Button Separator setting */

	/* Mini Cart checkout Button Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_checkout_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_checkout_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_checkout_button_color',
	) ) );

	/* End Mini Cart checkout Button Color setting */

	/* Mini Cart checkout Button Hover Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_checkout_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_checkout_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_checkout_button_hover_color',
	) ) );

	/* Mini Cart checkout Button Hover Color setting */

	/* Mini Cart checkout Button background Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_bg_checkout_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_bg_checkout_button_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_bg_checkout_button_color',
	) ) );

	/* End Mini Cart checkout Button color setting */

	/* Mini Cart checkout Button Background Hover Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_checkout_button_bg_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_checkout_button_bg_hover_color', array(
	    'label'				=> __( 'Hover background color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_checkout_button_bg_hover_color',
	) ) );

	/* Mini Cart checkout Button Background Hover Color setting */

	/* Mini Cart checkout Button Border Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_border_checkout_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_border_checkout_button_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_border_checkout_button_color',
	) ) );

	/* End Mini Cart checkout Button color setting */

	/* Mini Cart checkout Button Background Hover Color setting */

	$wp_customize->add_setting( 'hongo_mini_cart_checkout_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_mini_cart_checkout_button_border_hover_color', array(
	    'label'				=> __( 'Hover border color', 'hongo' ),
	    'section'    		=> 'woocommerce_mini_cart',
	    'settings'	 		=> 'hongo_mini_cart_checkout_button_border_hover_color',
	) ) );

	/* Mini Cart checkout Button Background Hover Color setting */