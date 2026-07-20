<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_social_sharing_separator', array(
	    'label'     		=> __( 'Social share', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_product_add_social_share_section',
	    'settings'   		=> 'hongo_product_social_sharing_separator',
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'hongo_single_product_social_sharing', array(
		'default' 			=> array( 'facebook', '1', 'Facebook', 'twitter', '1', 'Twitter', 'linkedin', '1', 'Linkedin', 'pinterest', '1', 'Pinterest' ),
		'sanitize_callback' => 'hongo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Hongo_Customize_Post_Social_Share( $wp_customize, 'hongo_single_product_social_sharing', array(
		'label'     		=> __( 'Social media websites', 'hongo-addons' ),
		'type'              => 'hongo_post_social_icons',
		'section'     		=> 'hongo_product_add_social_share_section',
		'settings'			=> 'hongo_single_product_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'hongo-addons' ),
								  	'twitter' => esc_html__( 'Twitter', 'hongo-addons' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'hongo-addons' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'hongo-addons' ),
								  	'reddit' => esc_html__( 'Reddit', 'hongo-addons' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'hongo-addons' ),
								  	'digg' => esc_html__( 'Digg', 'hongo-addons' ),
								  	'vk' => esc_html__( 'VK', 'hongo-addons' ),
								  	'xing' => esc_html__( 'XING', 'hongo-addons' ),
								  	'telegram' 		=> __( 'Telegram', 'hongo-addons' ),
								  	'oksocial' 		=> __( 'Ok', 'hongo-addons' ),
								  	'viber' 		=> __( 'Viber', 'hongo-addons' ),
								  	'whatsapp' 		=> __( 'WhatsApp', 'hongo-addons' ),
								  	'skype' 		=> __( 'Skype', 'hongo-addons' ),
							   ),
	) ) );

	/* End Facebook Social Icon */