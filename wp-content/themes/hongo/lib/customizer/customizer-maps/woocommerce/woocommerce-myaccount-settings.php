<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	/*
	 * My account layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_account_general_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_account_general_separator', array(
	    'label'				=> __( 'General', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'   		=> 'hongo_account_general_separator',	    
	) ) );
	/* End Separator Settings */

	/* Account Heading Color */

	$wp_customize->add_setting( 'hongo_account_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_heading_color', array(
	    'label'				=> __( 'Heading color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_heading_color',
	) ) );

	/* End Account Heading Color */

	/* Account Content Color */

	$wp_customize->add_setting( 'hongo_account_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_content_color', array(
	    'label'				=> __( 'Content color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_content_color',
	) ) );

	/* End Account Content Color */

	/* Account Table Border Color */

	$wp_customize->add_setting( 'hongo_account_order_table_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_order_table_border_color', array(
	    'label'				=> __( 'Order table border color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_order_table_border_color',
	) ) );

	/* End Account Table Border Color */

	/* Account Order Next Prev Color */

	$wp_customize->add_setting( 'hongo_account_order_next_prev_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_order_next_prev_color', array(
	    'label'				=> __( 'Order pagination color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_order_next_prev_color',
	) ) );

	/* End Account Order Next Prev Color */

	/* Account Order Next Prev Hover Color */

	$wp_customize->add_setting( 'hongo_account_order_next_prev_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_order_next_prev_hover_color', array(
	    'label'				=> __( 'Order pagination hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_order_next_prev_hover_color',
	) ) );

	/* End Account Order Next Prev Color */

	/* Account Login Box Background Color */

	$wp_customize->add_setting( 'hongo_account_loginbox_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_loginbox_bg_color', array(
	    'label'				=> __( 'Login box background color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_loginbox_bg_color',
	) ) );
	
	/* End Account Login Box Background Color */

	/* Account Register Box Background Color */

	$wp_customize->add_setting( 'hongo_account_registerbox_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_registerbox_bg_color', array(
	    'label'				=> __( 'Register box background color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_registerbox_bg_color',
	) ) );
	
	/* End Account Register Box Background Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_myaccount_tabtitle_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_myaccount_tabtitle_separator', array(
	    'label'				=> __( 'Tab typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'   		=> 'hongo_myaccount_tabtitle_separator',
	) ) );
	/* End Separator Settings */

	/* Account Tab Title Font size */

    $wp_customize->add_setting( 'hongo_account_tabtitle_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_tabtitle_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_tabtitle_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Tab Title Account Font size */

	/* Account Tab Title Icon Font size */

    $wp_customize->add_setting( 'hongo_account_tabicon_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_tabicon_font_size', array(
		'label'				=> __( 'Icon font size', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_tabicon_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Tab Title Icon Font size */

	/* Account Tab Title Line height */

    $wp_customize->add_setting( 'hongo_account_tabtitle_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_tabtitle_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_tabtitle_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Account Tab Title Line height */

	/* Account Tab Title Letter spacing */

    $wp_customize->add_setting( 'hongo_account_tabtitle_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_tabtitle_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_tabtitle_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Account Tab Title Letter spacing */

	/* Account Tab Title Text transform */

    $wp_customize->add_setting( 'hongo_account_tabtitle_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_tabtitle_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_tabtitle_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Account Tab Title Text transform */

	/* Account Tab Title Font weight */

    $wp_customize->add_setting( 'hongo_account_tabtitle_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_tabtitle_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_tabtitle_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Account Tab Title Font weight */

	/* Account Tab Background Color */

	$wp_customize->add_setting( 'hongo_account_tab_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_tab_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_tab_bg_color',
	) ) );

	/* End Account Tab Background Color */

	/* Account Tab Title Color */

	$wp_customize->add_setting( 'hongo_account_tabtitle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_tabtitle_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_tabtitle_color',
	) ) );

	/* End Account Tab Title Color */

	/* Account Active Tab Title Color */

	$wp_customize->add_setting( 'hongo_account_active_tabtitle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_active_tabtitle_color', array(
	    'label'				=> __( 'Active color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_active_tabtitle_color',
	) ) );

	/* End Account Active Tab Title Color */

	/* Account Tab Border Color */

	$wp_customize->add_setting( 'hongo_account_tab_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_tab_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_tab_border_color',
	) ) );

	/* End Account Tab Border Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_myaccount_label_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_myaccount_label_separator', array(
	    'label'				=> __( 'Form label typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'   		=> 'hongo_myaccount_label_separator',	    
	) ) );
	/* End Separator Settings */

	/* Label Text font size setting */
	$wp_customize->add_setting( 'hongo_label_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_label_text_font_size', array(
	    'label'				=> __( 'Font size', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_label_text_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Label Text font size setting */

	/* Label Text Line height setting */
	$wp_customize->add_setting( 'hongo_account_label_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_account_label_line_height', array(
	    'label'				=> __( 'Line height', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_label_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Label Text Line height setting */

	/* Label Text Letter spacing setting */
	$wp_customize->add_setting( 'hongo_account_label_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_account_label_letter_spacing', array(
	    'label'				=> __( 'Letter spacing', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_label_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );
	/* End Label Text Letter spacing setting */

	/* Label Transform setting */
    $wp_customize->add_setting( 'hongo_label_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_label_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_label_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
								   ),	 
	) ) );
	/* End Label Transform setting */

	/* Label Font weight */
    $wp_customize->add_setting( 'hongo_label_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_label_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_label_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );
	/* End Label Font weight */

	/* Select Label Text Color */
	$wp_customize->add_setting( 'hongo_label_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_label_text_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_label_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Label Text Color */

	/* Select Field Border Text Color */
	$wp_customize->add_setting( 'hongo_text_field_border_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_text_field_border_text_color', array(
	    'label'				=> __( 'Input border color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_text_field_border_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Field Border Text Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_myaccount_table_heading_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_myaccount_table_heading_separator', array(
	    'label'				=> __( 'Table title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'   		=> 'hongo_myaccount_table_heading_separator',
	) ) );
	/* End Separator Settings */

	/* Account Table Heading Font size */

    $wp_customize->add_setting( 'hongo_table_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_table_heading_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_table_heading_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Table Heading Account Font size */

	/* Account Table Heading Line height */

    $wp_customize->add_setting( 'hongo_table_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_table_heading_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_table_heading_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Account Table Heading Line height */

	/* Account Table Heading Letter spacing */

    $wp_customize->add_setting( 'hongo_table_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_table_heading_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_table_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Account Table Heading Letter spacing */

	/* Account Table Heading Text transform */

    $wp_customize->add_setting( 'hongo_table_heading_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_table_heading_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_table_heading_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Account Table Heading Text transform */

	/* Account Table Heading Font weight */

    $wp_customize->add_setting( 'hongo_table_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_table_heading_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_table_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Account Table Heading Font weight */

	/* Account Table Heading Color */

	$wp_customize->add_setting( 'hongo_table_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_table_heading_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_table_heading_color',
	) ) );

	/* End Account Table Heading Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_myaccount_button_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_myaccount_button_separator', array(
	    'label'				=> __( 'Button typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'   		=> 'hongo_myaccount_button_separator',
	) ) );

	/* End Separator Settings */

	/* Account Button Font size */

    $wp_customize->add_setting( 'hongo_account_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_button_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_button_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Button Account Font size */
	
	/* Account Button Line height */

    $wp_customize->add_setting( 'hongo_account_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_button_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_button_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Account Button Line height */

	/* Account Button Letter spacing */

    $wp_customize->add_setting( 'hongo_account_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_button_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_button_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Account Button Letter spacing */

	/* Account Button Text transform */

    $wp_customize->add_setting( 'hongo_account_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_button_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Account Button Text transform */

	/* Account Button Font weight */

    $wp_customize->add_setting( 'hongo_account_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_account_button_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_myaccount',
		'settings'			=> 'hongo_account_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Account Button Font weight */

	/* Account Button Background Color */

	$wp_customize->add_setting( 'hongo_account_bg_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_bg_button_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_bg_button_color',
	) ) );
	/* End Account Button Background Color */

	/* Account Button Background Hover Color */

	$wp_customize->add_setting( 'hongo_account_bg_hover_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_bg_hover_button_color', array(
	    'label'				=> __( 'Background hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_bg_hover_button_color',
	) ) );
	/* End Account Button Background Hover Color */

	/* Account Button Color */

	$wp_customize->add_setting( 'hongo_account_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_button_color',
	) ) );
	/* End Account Button Color */

	/* Account Button Hover Color */

	$wp_customize->add_setting( 'hongo_account_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_button_hover_color',
	) ) );
	/* End Account Button Hover Color */

	/* Account Border Button Color */

	$wp_customize->add_setting( 'hongo_account_border_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_border_button_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_border_button_color',
	) ) );

	/* End Account Border Button Color */

	/* Account Border Button Hover Color */

	$wp_customize->add_setting( 'hongo_account_border_hover_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_account_border_hover_button_color', array(
	    'label'				=> __( 'Border hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_myaccount',
	    'settings'	 		=> 'hongo_account_border_hover_button_color',
	) ) );
	
	/* End Border Account Button Hover Color */
