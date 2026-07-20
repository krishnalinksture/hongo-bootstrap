<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_general_page_title_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_general_page_title_separator', array(
	    'label'				=> __( 'Title Style and Data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'   		=> 'hongo_general_page_title_separator',	    
	) ) );

	/* End Separator Settings */

  	/* Start Disable Page Title */

    $wp_customize->add_setting( 'hongo_page_enable_title', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_enable_title', array(
		'label'				=> __( 'Title', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_enable_title',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Disable Page Title */

	/* Container Setting*/
    $wp_customize->add_setting( 'hongo_page_title_container_style', array(
        'default'           => 	'container',
        'sanitize_callback' => 	'esc_attr'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_container_style', array(
        'label'             => 	__( 'Container style', 'hongo' ),
        'section'           => 	'hongo_add_page_title_section',
        'settings'          => 	'hongo_page_title_container_style',
        'type'              => 	'select',
        'choices'           => 	array(
                                    'container' 					=> esc_html__( 'Fixed', 'hongo' ),
                                    'container-fluid' 				=> esc_html__( 'Full width', 'hongo' ),
                                    'container-fluid-with-padding' 	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
                               ),
    ) ) );
    /* End Container Setting */

    /* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_page_title_container_fluid_with_padding', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_container_fluid_with_padding', array(
        'label'				=> __( 'Full width padding', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_container_fluid_with_padding',
        'type'              => 'text',
        'active_callback'   => 'hongo_page_title_container_fluid_with_padding_callback',
    ) ) );

    if ( ! function_exists( 'hongo_page_title_container_fluid_with_padding_callback' ) ) :
        function hongo_page_title_container_fluid_with_padding_callback( $control )   {
            if ( $control->manager->get_setting( 'hongo_page_title_container_style' )->value() == 'container-fluid-with-padding' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;
    
    /* End Container custom Width setting */

	/* Page Title Layout Style */

    $wp_customize->add_setting( 'hongo_page_title_style', array(
		'default' 			=> 'page-title-style-5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_page_title_style', array(
		'label'				=> __( 'Style', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_style',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'page-title-style-1'   => __( 'Left alignment', 'hongo' ),
								    'page-title-style-2'   => __( 'Right alignment', 'hongo' ),
								    'page-title-style-3'   => __( 'Center alignment', 'hongo' ),
								    'page-title-style-4'   => __( 'Classic title style', 'hongo' ),
								    'page-title-style-5'   => __( 'Modern title style', 'hongo' ),
								    'page-title-style-6'   => __( 'Clean title style', 'hongo' ),
								    'page-title-style-7'   => __( 'Gallery background title style', 'hongo' ),
								    'page-title-style-8'   => __( 'Background video title style', 'hongo' ),
								    'page-title-style-9'   => __( 'Mini version title style', 'hongo' ),
							   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/left-alignment-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/right-alignment-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/center-alignment-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/classic-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/modern-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/clean-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gallery-background-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/background-video-title-style.jpg',
								  	HONGO_THEME_IMAGES_URI . '/mini-version-title-style.jpg',
							   ),
		'hongo_columns'    	=> '1',
	) ) );
   
  	/* End Page Title Style */

  	/* Enable Title Heading */

	$wp_customize->add_setting( 'hongo_page_enable_title_heading', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_enable_title_heading', array(
		'label'				=> __( 'Title heading', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_enable_title_heading',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   )
	) ) );

	/* End Enable Title Heading */

  	/* Title Content height */

    $wp_customize->add_setting( 'hongo_page_title_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_height', array(
		'label'				=> __( 'Content height', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_height',
		'type'              => 'select',
		'choices'           => array(
							''		             => esc_html__( 'Select', 'hongo' ),
							'very-small-height'  => esc_html__( 'Very Small', 'hongo' ),
        					'small-height'       => esc_html__( 'Small', 'hongo' ),
        					'medium-height'      => esc_html__( 'Medium', 'hongo' ),
        					'large-height'       => esc_html__( 'Large', 'hongo' ),
        					'extra-large-height' => esc_html__( 'Extra Large', 'hongo' )
							),
		'active_callback' 	=> 'hongo_page_title_subtitle_alignment_callback',
	) ) );

	/* End Title Content height */

  	/* Title Text Transform setting */

    $wp_customize->add_setting( 'hongo_page_title_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_text_transform', array(
		'label'				=> __( 'Title text case', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),
								    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								   ),
	) ) );

	/* End Title Text Transform setting */

	/* Subtitle */

	$wp_customize->add_setting( 'hongo_page_title_subtitle', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_title_subtitle', array(
	    'label'				=> __( 'Subtitle', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_subtitle',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'hongo_page_title_subtitle_callback',
	) );

	/* End Subtitle */

	/* Title Text Transform setting */

    $wp_customize->add_setting( 'hongo_page_title_subtitle_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_subtitle_text_transform', array(
		'label'				=> __( 'Subtitle text case', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_subtitle_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''						=> esc_html__( 'Select', 'hongo' ),
								    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								   ),
		'active_callback' 	=> 'hongo_page_title_subtitle_callback',
	) ) );

	/* End Title Text Transform setting */

	/* Title & Subtitle Alignment setting */

    $wp_customize->add_setting( 'hongo_page_title_subtitle_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_subtitle_alignment', array(
		'label'				=> __( 'Title and subtitle alignment', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_subtitle_alignment',
		'type'              => 'select',
		'active_callback' 	=> 'hongo_page_title_subtitle_alignment_callback',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo' ),
								    'left' 		=> esc_html__( 'Left', 'hongo' ),
								    'center'	=> esc_html__( 'Center', 'hongo' ),
								    'right'		=> esc_html__( 'Right', 'hongo' ),
								   ),
	) ) );

	/* End Title & SubTitle Alignment setting */

	/* Enable Title background image */

	$wp_customize->add_setting( 'hongo_page_enable_title_image', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_enable_title_image', array(
		'label'				=> __( 'Enable background image', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_enable_title_image',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_page_enable_title_image_callback'
	) ) );

	/* End Enable Title background image */

	/* Page Title BG Image */

    $wp_customize->add_setting( 'hongo_page_title_bg_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_page_title_bg_image', array(
		'label'				=> __( 'Background image', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_bg_image',
		'description'		=> __( 'Recommended image size is 1920px X 1200px.', 'hongo' ),
		'active_callback' 	=> 'hongo_page_title_image_callback',
	) ) );

	/* End Page Title BG Image */

	/* Archive Title Image srcset setting */

    $wp_customize->add_setting( 'hongo_page_title_image_srcset', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_page_title_image_srcset', array(
		'label'				=> __( 'Thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_image_srcset',
		'active_callback' 	=> 'hongo_page_title_image_callback',
	) ) );

	/* End Archive Title Image srcset */

	/* Page Title Multiple Image */

    $wp_customize->add_setting( 'hongo_page_title_bg_multiple_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Multiple_Image( $wp_customize, 'hongo_page_title_bg_multiple_image', array(
		'label'				=> __( 'Background gallery images ', 'hongo' ),
		'type'              => 'hongo_multiple_image',
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_bg_multiple_image',
		'active_callback' 	=> 'hongo_page_title_slider_callback',
	) ) );

	/* End Page Title Multiple Image */

	/* Start Page Title Scroll to */

    $wp_customize->add_setting( 'hongo_page_title_scroll_to_down', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_title_scroll_to_down', array(
        'label'				=> __( 'Scroll to down', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_scroll_to_down',
        'type'              => 'hongo_switch',
        'choices'           => array(
                                    '1' => __( 'On', 'hongo' ),
                                    '0' => __( 'Off', 'hongo' ),
                               ),
        'active_callback'   => 'hongo_page_title_callto_action_callback',
    ) ) );

    /* End Page Title Scroll to */

    /* Section id */

    $wp_customize->add_setting( 'hongo_page_title_callto_section_id', array(
        'default'           => '#about',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_page_title_callto_section_id', array(
        'label'				=> __( 'Next section ID', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_callto_section_id',
        'type'              => 'text',
        'active_callback'   => 'hongo_page_title_callto_action_id_callback',
    ) );

    /* End Section id */

	/* Start Page Title Video Type */

    $wp_customize->add_setting( 'hongo_page_title_video_type', array(
		'default' 			=> 'self',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_title_video_type', array(
		'label'				=> __( 'Video type', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_video_type',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'self' 		=> __( 'Self', 'hongo' ),
								  	'external' 	=> __( 'External', 'hongo' ),
							   ),
		'active_callback' 	=> 'hongo_page_title_video_callback',
	) ) );

	/* End Page Title Video Type */

	/* MP4 */

	$wp_customize->add_setting( 'hongo_page_title_video_mp4', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'hongo_page_title_video_mp4', array(
	    'label'				=> __( 'MP4', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_video_mp4',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'hongo_page_title_video_self_callback',
	) );

	/* End MP4 */

	/* OGG */

	$wp_customize->add_setting( 'hongo_page_title_video_ogg', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'hongo_page_title_video_ogg', array(
	    'label'				=> __( 'OGG', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_video_ogg',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'hongo_page_title_video_self_callback',
	) );

	/* End OGG */

	/* WEBM */

	$wp_customize->add_setting( 'hongo_page_title_video_webm', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'hongo_page_title_video_webm', array(
	    'label'				=> __( 'WEBM', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_video_webm',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'hongo_page_title_video_self_callback',
	) );

	/* End WEBM */

	/* Start loop */

    $wp_customize->add_setting( 'hongo_page_loop_video', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_loop_video', array(
		'label'				=> __( 'Loop', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_loop_video',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback' 	=> 'hongo_page_title_video_self_callback',
	) ) );

	/* End loop */

	/* Start mute */

    $wp_customize->add_setting( 'hongo_page_mute_video', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_mute_video', array(
		'label'				=> __( 'Mute', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_mute_video',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback' 	=> 'hongo_page_title_video_self_callback',
	) ) );

	/* End mute */

	/* Youtube */

	$wp_customize->add_setting( 'hongo_page_title_video_youtube', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_title_video_youtube', array(
	    'label'				=> __( 'Youtube / Vimeo', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_video_youtube',
	    'type'       		=> 'text',
	    'description'       => sprintf( '<a href="%s" target="_blank" >%s</a> %s', esc_url( '//hongo.themezaa.com/documentation/how-to-manage-youtube-and-vimeo-video-parameters/' ), __( 'Click here', 'hongo'), __('for more information about video embed URL and setting parameters.', 'hongo' ) ),
	    'active_callback' 	=> 'hongo_page_title_video_external_callback',
	) );

	/* End Youtube */

	/* Page Title Parallax Effect */

    $wp_customize->add_setting( 'hongo_page_title_parallax_effect', array(
		'default' 			=> '0.5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_parallax_effect', array(
		'label'				=> __( 'Parallax effect', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_parallax_effect',
		'type'              => 'select',
		'choices'           => array(
									'no-parallax'   => esc_html__( 'No Parallax', 'hongo' ),
									'0.1'   => esc_html__( 'Parallax Effect 1', 'hongo' ),
								    '0.2'   => esc_html__( 'Parallax Effect 2', 'hongo' ),
								    '0.3'   => esc_html__( 'Parallax Effect 3', 'hongo' ),
								    '0.4'   => esc_html__( 'Parallax Effect 4', 'hongo' ),
								    '0.5'   => esc_html__( 'Parallax Effect 5', 'hongo' ),
								    '0.6'   => esc_html__( 'Parallax Effect 6', 'hongo' ),
								    '0.7'   => esc_html__( 'Parallax Effect 7', 'hongo' ),
								    '0.8'   => esc_html__( 'Parallax Effect 8', 'hongo' ),
								    '0.9'   => esc_html__( 'Parallax Effect 9', 'hongo' ),
								    '1.0'   => esc_html__( 'Parallax Effect 10', 'hongo' ),
							   ),
		'active_callback' 	=> 'hongo_page_title_image_callback',
	) ) );
   
  	/* End Page Title Parallax Effect */

  	/* Page Title Opacity */

    $wp_customize->add_setting( 'hongo_page_title_opacity', array(
		'default' 			=> '0.8',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_opacity', array(
		'label'				=> __( 'Opacity', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_opacity',
		'type'              => 'select',
		'choices'           => array(
									'0.0'   => esc_html__( 'No Opacity', 'hongo' ),
								    '0.1'   => esc_html__( '0.1', 'hongo' ),
								    '0.2'   => esc_html__( '0.2', 'hongo' ),
								    '0.3'   => esc_html__( '0.3', 'hongo' ),
								    '0.4'   => esc_html__( '0.4', 'hongo' ),
								    '0.5'   => esc_html__( '0.5', 'hongo' ),
								    '0.6'   => esc_html__( '0.6', 'hongo' ),
								    '0.7'   => esc_html__( '0.7', 'hongo' ),
								    '0.8'   => esc_html__( '0.8', 'hongo' ),
								    '0.9'   => esc_html__( '0.9', 'hongo' ),
								    '1.0'   => esc_html__( '1.0', 'hongo' ),
							   ),
		'active_callback' 	=> 'hongo_page_title_image_opacity_callback',
	) ) );
   
  	/* End Page Title Opacity */

  	/* Page Title Breadcrumb color setting */

	$wp_customize->add_setting( 'hongo_page_title_opacity_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_opacity_color', array(
	    'label'				=> __( 'Opacity color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_opacity_color',
	    'active_callback' 	=> 'hongo_page_title_image_opacity_callback',
	) ) );

	/* End Page Title Breadcrumb color setting */

	/* Start Disable Breadcrumb */

    $wp_customize->add_setting( 'hongo_page_enable_breadcrumb', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_enable_breadcrumb', array(
		'label'				=> __( 'Breadcrumb', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_enable_breadcrumb',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Disable Breadcrumb */

	/* Start Disable Breadcrumb heading */

    $wp_customize->add_setting( 'hongo_page_enable_breadcrumb_heading', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_enable_breadcrumb_heading', array(
		'label'				=> __( 'Breadcrumb heading', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_enable_breadcrumb_heading',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback' 	=> 'hongo_page_enable_breadcrumb_callback',
	) ) );

	/* End Disable Breadcrumb */

	/* Breadcrumb Position setting */

    $wp_customize->add_setting( 'hongo_page_breadcrumb_position', array(
		'default' 			=> 'title-area',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_breadcrumb_position', array(
		'label'				=> __( 'Breadcrumb position', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_breadcrumb_position',
		'type'              => 'select',
		'active_callback' 	=> 'hongo_page_enable_breadcrumb_callback',
		'choices'           => array(
									''					=> esc_html__( 'Select', 'hongo' ),
								    'title-area' 		=> esc_html__( 'In title area', 'hongo' ),
								    'after-title-area'	=> esc_html__( 'After title area', 'hongo' ),
								   ),
	) ) );

	/* End Breadcrumb Position setting */

	/* Breadcrumb Alignment setting */

    $wp_customize->add_setting( 'hongo_page_breadcrumb_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_breadcrumb_alignment', array(
		'label'				=> __( 'Breadcrumb alignment', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_breadcrumb_alignment',
		'type'              => 'select',
		'active_callback' 	=> 'hongo_page_enable_breadcrumb_position_callback',
		'choices'           => array(
									''		=> esc_html__( 'Select', 'hongo' ),
								    'left' 	=> esc_html__( 'Left', 'hongo' ),
								    'center'=> esc_html__( 'Center', 'hongo' ),
								    'right'	=> esc_html__( 'Right', 'hongo' ),
								   ),
	) ) );

	/* End Breadcrumb Alignment setting */

	/* Start Enable Border */

    $wp_customize->add_setting( 'hongo_page_title_enable_border', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_title_enable_border', array(
		'label'				=> __( 'Border', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_enable_border',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Enable Border */

	/* Title Add Top Space setting */

    $wp_customize->add_setting( 'hongo_page_title_top_space', array(
		'default' 			=> 'yes',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_top_space', array(
		'label'				=> __( 'Add top space of header height', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_top_space',
		'type'              => 'select',
		'choices'           => array(
								    'yes'	=> esc_html__( 'Yes', 'hongo' ),
								    'no' 	=> esc_html__( 'No', 'hongo' ),
								   ),
	) ) );

	/* End Title Add Top Space setting */

  	/* Start Page Title After Header */

    $wp_customize->add_setting( 'hongo_page_title_after_header', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_title_after_header', array(
		'label'				=> __( 'After header', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_after_header',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	    'active_callback' 	=> 'hongo_page_title_after_header_callback',
	) ) );

	if ( ! function_exists( 'hongo_page_title_after_header_callback' ) ) :
		function hongo_page_title_after_header_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_top_space' )->value() != 'no' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Page Title After Header */

	/* Title Section Top Space */

    $wp_customize->add_setting( 'hongo_page_title_top_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_top_section_space', array(
		'label'				=> __( 'Top space ( In pixel )', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_top_section_space',
		'type'              => 'text',
	) ) );

	/* End Title Section Top Space */

	/* Title Section Bottom Space */

    $wp_customize->add_setting( 'hongo_page_title_bottom_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_bottom_section_space', array(
		'label'				=> __( 'Bottom space ( In pixel )', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_bottom_section_space',
		'type'              => 'text',
	) ) );

	/* End Title Section Bottom Space */

	/* Page title Separator setting */

	$wp_customize->add_setting( 'hongo_page_title_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_page_title_separator', array(
	    'label'				=> __( 'Title font and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'   		=> 'hongo_page_title_separator',
	) ) );

	/* End Page title Separator setting */

	/* Title Font Size */

	$wp_customize->add_setting( 'hongo_page_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_title_font_size', array(
	    'label'				=> __( 'Title font size', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	) );

	/* End Title Font Size */

	/* Title Line Height */

	$wp_customize->add_setting( 'hongo_page_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_title_line_height', array(
	    'label'				=> __( 'Title line height', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	) );

	/* End Title Line Height */

	/* Title Letter Spacing */

	$wp_customize->add_setting( 'hongo_page_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_title_letter_spacing', array(
	    'label'				=> __( 'Title letter spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 1px', 'hongo' ),
	) );

	/* End Title Letter Spacing */

	/* Title Font weight setting */

    $wp_customize->add_setting( 'hongo_page_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_title_font_weight', array(
		'label'				=> __( 'Title font weight', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Title Font weight setting */

	/* Subtitle Font Size */

	$wp_customize->add_setting( 'hongo_page_subtitle_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_subtitle_font_size', array(
	    'label'				=> __( 'Subtitle font size', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_subtitle_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	    'active_callback' 	=> 'hongo_page_title_subtitle_callback',
	) );

	/* End Subtitle Font Size */

	/* Subtitle Line Height */

	$wp_customize->add_setting( 'hongo_page_subtitle_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_subtitle_line_height', array(
	    'label'				=> __( 'Subtitle line height', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_subtitle_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	    'active_callback' 	=> 'hongo_page_title_subtitle_callback',
	) );

	/* End Subtitle Line Height */

	/* Subtitle Letter Spacing */

	$wp_customize->add_setting( 'hongo_page_subtitle_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_subtitle_letter_spacing', array(
	    'label'				=> __( 'Subtitle letter spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_subtitle_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 1px', 'hongo' ),
	    'active_callback' 	=> 'hongo_page_title_subtitle_callback',
	) );

	/* End Subtitle Letter Spacing */

	/* Subtitle Font weight setting */

    $wp_customize->add_setting( 'hongo_page_subtitle_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_subtitle_font_weight', array(
		'label'				=> __( 'Subtitle font weight', 'hongo' ),
		'section'     		=> 'hongo_add_page_title_section',
		'settings'			=> 'hongo_page_subtitle_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback' 	=> 'hongo_page_title_subtitle_callback',		
	) ) );

	/* End Subtitle Font weight setting */

	/* Breadcrumb Font Size */

	$wp_customize->add_setting( 'hongo_page_breadcrumb_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_breadcrumb_font_size', array(
	    'label'				=> __( 'Breadcrumb font size', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_breadcrumb_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	    'active_callback' 	=> 'hongo_page_title_breadcrumb_callback',
	) );

	/* End Breadcrumb Font Size */

	/* Breadcrumb Line Height */

	$wp_customize->add_setting( 'hongo_page_breadcrumb_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_breadcrumb_line_height', array(
	    'label'				=> __( 'Breadcrumb line height', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_breadcrumb_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	    'active_callback' 	=> 'hongo_page_title_breadcrumb_callback',
	) );

	/* End Breadcrumb Line Height */

	/* Breadcrumb Letter Spacing */

	$wp_customize->add_setting( 'hongo_page_breadcrumb_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_page_breadcrumb_letter_spacing', array(
	    'label'				=> __( 'Breadcrumb letter spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_breadcrumb_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 1px', 'hongo' ),
	    'active_callback' 	=> 'hongo_page_title_breadcrumb_callback',
	) );

	/* End Breadcrumb Letter Spacing */

	/* Page Title color setting */

	$wp_customize->add_setting( 'hongo_page_title_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_bg_color',
	) ) );

	/* End Page Title color setting */

	/* Page Title color setting */

	$wp_customize->add_setting( 'hongo_page_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_color', array(
	    'label'				=> __( 'Title text color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_color',
	) ) );

	/* End Page Title color setting */

	/* Page Subtitle color setting */

	$wp_customize->add_setting( 'hongo_page_subtitle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_subtitle_color', array(
	    'label'				=> __( 'Subtitle text color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_subtitle_color',
	    'active_callback' 	=> 'hongo_page_title_subtitle_callback',
	) ) );

	/* End Page Subtitle color setting */

	/* Page Subtitle color Bg Color setting */

	$wp_customize->add_setting( 'hongo_page_subtitle_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_subtitle_bg_color', array(
	    'label'				=> __( 'Subtitle text background color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_subtitle_bg_color',
	    'active_callback' 	=> 'hongo_page_subtitle_bg_color_callback',
	) ) );

	/* End Page Subtitle color setting */

	/* Page Title Breadcrumb Background color setting */

	$wp_customize->add_setting( 'hongo_page_title_breadcrumb_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_breadcrumb_bg_color', array(
	    'label'				=> __( 'Breadcrumb background color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_breadcrumb_bg_color',
	    'active_callback'	=> 'hongo_page_title_breadcrumb_color_callback',
	) ) );

	/* End Page Title Breadcrumb Background color setting */

	/* Page Title Breadcrumb Background color setting */

	$wp_customize->add_setting( 'hongo_page_title_breadcrumb_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_breadcrumb_border_color', array(
	    'label'				=> __( 'Breadcrumb border color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_breadcrumb_border_color', 
	    'active_callback'	=> 'hongo_page_title_breadcrumb_color_callback',
	) ) );

	/* End Page Title Breadcrumb Background color setting */

	/* Page Title Breadcrumb color setting */

	$wp_customize->add_setting( 'hongo_page_title_breadcrumb_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_breadcrumb_color', array(
	    'label'				=> __( 'Breadcrumb text color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_breadcrumb_color',
	    'active_callback' 	=> 'hongo_page_title_breadcrumb_callback',
	) ) );

	/* End Page Title Breadcrumb color setting */

	/* Page Title Breadcrumb color setting */

	$wp_customize->add_setting( 'hongo_page_title_breadcrumb_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_breadcrumb_text_hover_color', array(
	    'label'				=> __( 'Breadcrumb text hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_breadcrumb_text_hover_color',
	    'active_callback' 	=> 'hongo_page_title_breadcrumb_callback',
	) ) );

	/* End Page Title Breadcrumb color setting */

	/* Page Title border color setting */

	$wp_customize->add_setting( 'hongo_page_title_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'hongo_add_page_title_section',
	    'settings'	 		=> 'hongo_page_title_border_color',
	    'active_callback'	=> 'hongo_page_title_border_color_callback',
	) ) );

	/* End Page Title border color setting */

	/* Page Title Icon Background setting */

    $wp_customize->add_setting( 'hongo_page_title_icon_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_icon_bg_color', array(
        'label'				=> __( 'Icon background color', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_icon_bg_color',
        'active_callback'   => 'hongo_page_title_callto_action_id_callback',
    ) ) );

    /* End Page Title Icon Background setting */

    /* Page Title Icon Hover Background setting */

    $wp_customize->add_setting( 'hongo_page_title_icon_hover_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_icon_hover_bg_color', array(
        'label'				=> __( 'Icon hover background color', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_icon_hover_bg_color',
        'active_callback'   => 'hongo_page_title_callto_action_id_callback',
    ) ) );

    /* End Page Title Icon Hover Background setting */

    /* Page Title Icon setting */

    $wp_customize->add_setting( 'hongo_page_title_icon_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_icon_color', array(
        'label'				=> __( 'Icon color', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_icon_color',
        'active_callback'   => 'hongo_page_title_callto_action_id_callback',
    ) ) );

    /* End Page Title Icon color setting */

	/* Page Title Icon Hover setting */

    $wp_customize->add_setting( 'hongo_page_title_icon_hover_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_page_title_icon_hover_color', array(
        'label'				=> __( 'Icon Hover color', 'hongo' ),
        'section'           => 'hongo_add_page_title_section',
        'settings'          => 'hongo_page_title_icon_hover_color',
        'active_callback'   => 'hongo_page_title_callto_action_id_callback',
    ) ) );

    /* End Page Title Icon Hover setting */

	/* Callback Functions */
	
	if ( ! function_exists( 'hongo_page_enable_title_image_callback' ) ) :
		function hongo_page_enable_title_image_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() != 'page-title-style-7' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_image_callback' ) ) :
		function hongo_page_title_image_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() != 'page-title-style-7' && $control->manager->get_setting( 'hongo_page_enable_title_image' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_image_opacity_callback' ) ) :
		function hongo_page_title_image_opacity_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-1' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-2' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-3' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-4' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-5' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-6' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-7' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-8' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_enable_breadcrumb_callback' ) ) :
		function hongo_page_enable_breadcrumb_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_enable_breadcrumb' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_enable_breadcrumb_position_callback' ) ) :
		function hongo_page_enable_breadcrumb_position_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_breadcrumb_position' )->value() == 'after-title-area' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_subtitle_alignment_callback' ) ) :
		function hongo_page_title_subtitle_alignment_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-4' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-5' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-6' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-7' || $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_video_callback' ) ) :
		function hongo_page_title_video_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_video_self_callback' ) ) :
		function hongo_page_title_video_self_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_video_type' )->value() == 'self' && $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_video_external_callback' ) ) :
		function hongo_page_title_video_external_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_video_type' )->value() == 'external' && $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_slider_callback' ) ) :
		function hongo_page_title_slider_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-7' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_callto_action_callback' ) ) :
        function hongo_page_title_callto_action_callback( $control ){
            if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-7' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'hongo_page_title_callto_action_id_callback' ) ) :
        function hongo_page_title_callto_action_id_callback( $control ){
            if ( $control->manager->get_setting( 'hongo_page_title_scroll_to_down' )->value() == '1' && $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-7' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

	if ( ! function_exists( 'hongo_page_title_opacity_callback' ) ) :
		function hongo_page_title_opacity_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_opacity' )->value() != '' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_breadcrumb_callback' ) ) :
		function hongo_page_title_breadcrumb_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_enable_breadcrumb' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_border_color_callback' ) ) :
		function hongo_page_title_border_color_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_subtitle_callback' ) ) :
		function hongo_page_title_subtitle_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() != 'page-title-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_subtitle_bg_color_callback' ) ) :
		function hongo_page_subtitle_bg_color_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_title_style' )->value() == 'page-title-style-5' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_page_title_breadcrumb_color_callback' ) ) :
		function hongo_page_title_breadcrumb_color_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_page_breadcrumb_position' )->value() == 'after-title-area' &&  $control->manager->get_setting( 'hongo_page_enable_breadcrumb' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Callback Functions */
