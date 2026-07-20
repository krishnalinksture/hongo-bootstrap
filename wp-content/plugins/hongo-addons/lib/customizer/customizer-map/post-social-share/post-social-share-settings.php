<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_post_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_post_social_sharing_separator', array(
	    'label'      		=> __( 'Social share', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_social_share_section',
	    'settings'   		=> 'hongo_post_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'hongo_single_post_social_sharing', array(
		'default' 			=> array( 'facebook', '1', 'Facebook', 'twitter', '1', 'Twitter', 'linkedin', '1', 'Linkedin', 'pinterest', '1', 'Pinterest' ),
		'sanitize_callback' => 'hongo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Hongo_Customize_Post_Social_Share( $wp_customize, 'hongo_single_post_social_sharing', array(
		'label'       		=> __( 'Social media websites', 'hongo-addons' ),
		'type'              => 'hongo_post_social_icons',
		'section'     		=> 'hongo_add_social_share_section',
		'settings'			=> 'hongo_single_post_social_sharing',
		'choices'           => array(
									'facebook' 		=> __( 'Facebook', 'hongo-addons' ),
								  	'twitter' 		=> __( 'Twitter', 'hongo-addons' ),								  	
								  	'linkedin' 		=> __( 'Linkedin', 'hongo-addons' ),
								  	'pinterest' 	=> __( 'Pinterest', 'hongo-addons' ),
								  	'reddit' 		=> __( 'Reddit', 'hongo-addons' ),
								  	'stumbleupon'	=> __( 'StumbleUpon', 'hongo-addons' ),
								  	'digg' 			=> __( 'Digg', 'hongo-addons' ),
								  	'vk' 			=> __( 'VK', 'hongo-addons' ),
								  	'xing' 			=> __( 'XING', 'hongo-addons' ),
								  	'telegram' 		=> __( 'Telegram', 'hongo-addons' ),
								  	'oksocial' 		=> __( 'Ok', 'hongo-addons' ),
								  	'viber' 		=> __( 'Viber', 'hongo-addons' ),
								  	'whatsapp' 		=> __( 'WhatsApp', 'hongo-addons' ),
								  	'skype' 		=> __( 'Skype', 'hongo-addons' ),
							   ),
	) ) );

	/* End Facebook Social Icon */