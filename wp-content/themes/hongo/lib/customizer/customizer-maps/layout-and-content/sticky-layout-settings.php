<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_default_post_list_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_default_post_list_style_data_separator', array(
	    'label'				=> __( 'Post list style and data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_sticky_layout_panel',
	    'settings'   		=> 'hongo_default_post_list_style_data_separator',
	) ) );

	/* End Separator Settings */

	/* Sticky Show Post Thumbnail setting */

	$wp_customize->add_setting( 'hongo_show_post_thumbnail_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_thumbnail_sticky', array(
		'label'				=> __( 'Post thumbnail', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_post_thumbnail_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Post Thumbnail setting */

	/* Sticky Show Post Format Setting */

	$wp_customize->add_setting( 'hongo_show_post_format_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_format_sticky', array(
		'label'				=> __( 'Post featured image only', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_post_format_sticky',
		'type'              => 'hongo_switch',
		'choices'           => 	array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Post Format Setting */

	/* Sticky Image srcset setting */

    $wp_customize->add_setting( 'hongo_image_srcset_sticky', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_image_srcset_sticky', array(
		'label'				=> __( 'Post thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_image_srcset_sticky',
	) ) );

	/* End Sticky Type */

	/* Sticky Show Post Title setting */

	$wp_customize->add_setting( 'hongo_show_post_title_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_title_sticky', array(
		'label'				=> __( 'Post title', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_post_title_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Post Title setting */

	/* Sticky Show Post Author setting */

	$wp_customize->add_setting( 'hongo_show_post_author_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_author_sticky', array(
		'label'				=> __( 'Post author', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_post_author_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Post Author setting */

	/* Sticky Show Post Author Image setting */

	$wp_customize->add_setting( 'hongo_show_post_author_image_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_author_image_sticky', array(
		'label'				=> __( 'Post author image', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_post_author_image_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'	=> 'hongo_show_post_author_sticky_callback'
	) ) );

	if ( ! function_exists( 'hongo_show_post_author_sticky_callback' ) ) :
   	function hongo_show_post_author_sticky_callback( $control )	{
        if ( $control->manager->get_setting( 'hongo_show_post_author_sticky' )->value() == '1') {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;

	/* End Sticky Show Post Author Image setting */

	/* Sticky Show Post Date setting */

	$wp_customize->add_setting( 'hongo_show_post_date_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_post_date_sticky', array(
		'label'				=> __( 'Post date', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_post_date_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Post Date setting */

	/* Sticky Date Format setting */

	$wp_customize->add_setting( 'hongo_date_format_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_date_format_sticky', array(
		'label'				=> __( 'Post date format', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_date_format_sticky',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'hongo' ), '//wordpress.org/support/article/formatting-date-and-time/#format-string-examples' ),
		'active_callback'   => 'hongo_date_format_sticky_callback',
	) ) );

	if ( ! function_exists( 'hongo_date_format_sticky_callback' ) ) :
	   	function hongo_date_format_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_date_sticky' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Sticky Date Format setting */

	/* Sticky Show Excerpt setting */

	$wp_customize->add_setting( 'hongo_show_excerpt_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_excerpt_sticky', array(
		'label'				=> __( 'Post excerpt', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_excerpt_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Excerpt setting */

	/* Sticky Excerpt Length setting */

    $wp_customize->add_setting( 'hongo_excerpt_length_sticky', array(
		'default' 			=> '35',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_excerpt_length_sticky', array(
		'label'				=> __( 'Excerpt length', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_excerpt_length_sticky',
		'type'              => 'text',
		'active_callback'   => 'hongo_excerpt_length_sticky_callback',
	) ) );

	if ( ! function_exists( 'hongo_excerpt_length_sticky_callback' ) ) :
	   	function hongo_excerpt_length_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_sticky' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Sticky Excerpt Length setting */

	/* Sticky Show Content setting */

	$wp_customize->add_setting( 'hongo_show_content_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_content_sticky', array(
		'label'				=> __( 'Post full content', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_content_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_show_content_sticky_callback',
	) ) );

	if ( ! function_exists( 'hongo_show_content_sticky_callback' ) ) :
	   	function hongo_show_content_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_sticky' )->value() == '0' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Sticky Show Content setting */

	/* Sticky Show Categories setting */

	$wp_customize->add_setting( 'hongo_show_category_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_category_sticky', array(
		'label'				=> __( 'Post categories', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_category_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Categories setting */

	/* Sticky Show like setting */

	$wp_customize->add_setting( 'hongo_show_like_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_like_sticky', array(
		'label'				=> __( 'Post likes', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_like_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show like setting */

	/* Sticky Show Comment setting */

	$wp_customize->add_setting( 'hongo_show_comment_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_comment_sticky', array(
		'label'				=> __( 'Post comments', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_comment_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Comment setting */

	/* Sticky Show Button setting */

	$wp_customize->add_setting( 'hongo_show_button_sticky', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_show_button_sticky', array(
		'label'				=> __( 'Read more button', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_show_button_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Button setting */

	/* Sticky Button Text setting */

	$wp_customize->add_setting( 'hongo_button_text_sticky', array(
		'default' 			=> __( 'continue reading', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_button_text_sticky', array(
		'label'				=> __( 'Button text', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_button_text_sticky',
		'type'              => 'text',
		'active_callback'	=> 'hongo_button_text_sticky_callback'
	) ) );

	if ( ! function_exists( 'hongo_button_text_sticky_callback' ) ) :
	   	function hongo_button_text_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_button_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Sticky Button Text setting */

	/* Title Typography Separator setting */

	$wp_customize->add_setting( 'hongo_sticky_layout_separator_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_sticky_layout_separator_title_typography', array(
	    'label'				=> __( 'Title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_sticky_layout_panel',
	    'settings'   		=> 'hongo_sticky_layout_separator_title_typography',
	    'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	if ( ! function_exists( 'hongo_sticky_layout_title_typography_callback' ) ) :
	   	function hongo_sticky_layout_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_post_title_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Title Typography Separator setting */

	/* Sticky Font size setting */

	$wp_customize->add_setting( 'hongo_title_font_size_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_font_size_sticky', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_title_font_size_sticky',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Font size setting */

	/* Sticky Line height setting */

	$wp_customize->add_setting( 'hongo_title_line_height_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_line_height_sticky', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_title_line_height_sticky',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Line height setting */

	/* Sticky Letter spacing setting */

	$wp_customize->add_setting( 'hongo_title_letter_spacing_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_letter_spacing_sticky', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'			=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_title_letter_spacing_sticky',
		'type'				=> 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Letter spacing setting */

	/* Sticky Font weight setting */

    $wp_customize->add_setting( 'hongo_title_font_weight_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_title_font_weight_sticky', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_title_font_weight_sticky',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Font weight setting */	

	/* Sticky Post Title Text Transform setting */

    $wp_customize->add_setting( 'hongo_blog_post_title_text_transform_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_post_title_text_transform_sticky', array(
		'label'				=> __( 'Post title text case', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_blog_post_title_text_transform_sticky',
		'type'              => 'select',
		'choices'           => array(
									''							=> esc_html__( 'Select', 'hongo' ),
								    'text-uppercase' 			=> esc_html__( 'Uppercase', 'hongo' ),
								    'text-lowercase'			=> esc_html__( 'Lowercase', 'hongo' ),
								    'text-capitalize'			=> esc_html__( 'Capitalize', 'hongo' ),
								    'text-decoration-none'		=> esc_html__( 'None', 'hongo' ),
								   ),
	) ) );

	/* End Sticky Post Title Text Transform setting */
	
	/* Sticky Title Color setting */

	$wp_customize->add_setting( 'hongo_title_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_title_color_sticky', array(
		'label'				=> __( 'Title color', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_title_color_sticky',
		'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Title Color setting */

	/* Sticky Title Hover Color setting */

	$wp_customize->add_setting( 'hongo_title_hover_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_title_hover_color_sticky', array(
		'label'				=> __( 'Title hover color', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_title_hover_color_sticky',
		'active_callback'	=> 'hongo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Title Hover Color setting */

	/* Content Typography Separator setting */
	$wp_customize->add_setting( 'hongo_sticky_layout_separator_content_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_sticky_layout_separator_content_typography', array(
	    'label'				=> __( 'Content typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_sticky_layout_panel',
	    'settings'   		=> 'hongo_sticky_layout_separator_content_typography',
	    'active_callback'	=> 'hongo_sticky_layout_content_typography_callback',
	) ) );

	if ( ! function_exists( 'hongo_sticky_layout_content_typography_callback' ) ) :
	   	function hongo_sticky_layout_content_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_excerpt_sticky' )->value() == '1' || $control->manager->get_setting( 'hongo_show_content_sticky' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Content Typography Separator setting */

	/* Sticky Content Font size setting*/
	$wp_customize->add_setting( 'hongo_content_font_size_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_font_size_sticky', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_content_font_size_sticky',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_sticky_layout_content_typography_callback',
	) ) );
	/* End Sticky Content Font size setting */

	/* Sticky Content Line height setting*/
	$wp_customize->add_setting( 'hongo_content_line_height_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_line_height_sticky', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_content_line_height_sticky',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 15px', 'hongo' ),
		'active_callback'	=> 'hongo_sticky_layout_content_typography_callback',
	) ) );
	/* End Sticky Content Line height setting */

	/* Sticky Content Letter spacing setting*/
	$wp_customize->add_setting( 'hongo_content_letter_spacing_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_letter_spacing_sticky', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_content_letter_spacing_sticky',
		'type'              => 'text',
		'description'		=> __( 'In pixel like 1px', 'hongo' ),
		'active_callback'	=> 'hongo_sticky_layout_content_typography_callback',
	) ) );
	/* End Sticky Content Letter spacing setting */

	/* Sticky Content Font weight setting */

    $wp_customize->add_setting( 'hongo_content_font_weight_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_content_font_weight_sticky', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_content_font_weight_sticky',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_sticky_layout_content_typography_callback',
	) ) );
	/* End Sticky Content Font weight setting */	

	/* Sticky content Color setting */
	$wp_customize->add_setting( 'hongo_content_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_content_color_sticky', array(
		'label'				=> __( 'Content color', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_content_color_sticky',
		'active_callback'	=> 'hongo_sticky_layout_content_typography_callback',
	) ) );
		
	/* End Sticky content Color setting */

	/* Style Separator setting */

	$wp_customize->add_setting( 'hongo_sticky_layout_separator_style_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_sticky_layout_separator_style_color', array(
	    'label'				=> __( 'Post meta and button colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_sticky_layout_panel',
	    'settings'   		=> 'hongo_sticky_layout_separator_style_color',
	) ) );

	/* End Style Separator setting */

	/* Sticky Post Meta Color setting */

	$wp_customize->add_setting( 'hongo_post_meta_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_meta_color_sticky', array(
		'label'				=> __( 'Post meta color', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_post_meta_color_sticky',
	) ) );

	/* End Sticky Post Meta Color setting */

	/* Sticky Post Meta Hover Color setting */

	$wp_customize->add_setting( 'hongo_post_meta_hover_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_post_meta_hover_color_sticky', array(
		'label'				=> __( 'Post meta hover color', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_post_meta_hover_color_sticky',
	) ) );

	/* End Sticky Post Meta Hover Color setting */

	/* Sticky Button Color setting */

	$wp_customize->add_setting( 'hongo_button_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_color_sticky', array(
		'label'				=> __( 'Button', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_button_color_sticky',
		'active_callback'	=> 'hongo_button_color_sticky_callback',
	) ) );

    if ( ! function_exists( 'hongo_button_color_sticky_callback' ) ) :
	   	function hongo_button_color_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_show_button_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Sticky Button Color setting */

	/* Sticky Button Hover Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_color_sticky', array(
		'label'				=> __( 'Button hover', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_button_hover_color_sticky',
		'active_callback'	=> 'hongo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Hover Color setting */

	/* Sticky Button Text Color setting */

	$wp_customize->add_setting( 'hongo_button_text_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_text_color_sticky', array(
		'label'				=> __( 'Button text', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_button_text_color_sticky',
		'active_callback'	=> 'hongo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Text Color setting */

	/* Sticky Button Hover Text Color setting */

	$wp_customize->add_setting( 'hongo_button_hover_text_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_hover_text_color_sticky', array(
		'label'				=> __( 'Button text hover', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_button_hover_text_color_sticky',
		'active_callback'	=> 'hongo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Hover Text Color setting */

	/* Sticky Button Border Color setting */

	$wp_customize->add_setting( 'hongo_button_border_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_button_border_color_sticky', array(
		'label'				=> __( 'Button border', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_button_border_color_sticky',
		'active_callback'	=> 'hongo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Border Color setting */

	/* Style Separator setting */

	$wp_customize->add_setting( 'hongo_sticky_layout_separator_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_sticky_layout_separator_style', array(
	    'label'				=> __( 'Extra settings', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_sticky_layout_panel',
	    'settings'   		=> 'hongo_sticky_layout_separator_style',
	) ) );

	/* End Style Separator setting */

	/* Sticky Post Meta Text Transform setting */

    $wp_customize->add_setting( 'hongo_blog_post_meta_text_transform_sticky', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_blog_post_meta_text_transform_sticky', array(
		'label'				=> __( 'Post meta text case', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_blog_post_meta_text_transform_sticky',
		'type'              => 'select',
		'choices'           => 	array(
									''						=> esc_html__( 'Select', 'hongo' ),
									'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
									'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
									'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
									'text-decoration-none'	=> esc_html__( 'None', 'hongo' ),
								),
	) ) );

	/* End Sticky Post Meta Text Transform setting */

	/* Sticky Post Box Background Color setting */

	$wp_customize->add_setting( 'hongo_box_bg_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_bg_color_sticky', array(
		'label'				=> __( 'Box background', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_box_bg_color_sticky',
	) ) );

	/* End Sticky Post Box Background Color setting */

	/* Sticky Show Box Border setting */

	$wp_customize->add_setting( 'hongo_box_enable_border_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_box_enable_border_sticky', array(
		'label'				=> __( 'Show box border', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_box_enable_border_sticky',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Sticky Show Box Border setting */

	/* Sticky Box Border Color setting */

	$wp_customize->add_setting( 'hongo_box_border_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_box_border_color_sticky', array(
		'label'				=> __( 'Box border color', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_box_border_color_sticky',
		'active_callback'	=> 'hongo_box_border_color_sticky_callback',
	) ) );

    if ( ! function_exists( 'hongo_box_border_color_sticky_callback' ) ) :
	   	function hongo_box_border_color_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_box_enable_border_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Sticky Box Border Color setting */

	/* Sticky Box Border Size setting */

	$wp_customize->add_setting( 'hongo_box_border_size_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_box_border_size_sticky', array(
		'label'				=> __( 'Box border size', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_box_border_size_sticky',
		'type'              => 'text',
		'active_callback'	=> 'hongo_box_border_color_sticky_callback',
	) ) );

	/* End Sticky Box Border Size setting */

	/* Sticky Box Border Type Transform setting */

    $wp_customize->add_setting( 'hongo_box_border_type_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_box_border_type_sticky', array(
		'label'				=> __( 'Box border type', 'hongo' ),
		'section'     		=> 'hongo_add_sticky_layout_panel',
		'settings'			=> 'hongo_box_border_type_sticky',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo' ),
									'dotted' 	=> esc_html__( 'Dotted', 'hongo' ),
									'dashed'	=> esc_html__( 'Dashed', 'hongo' ),
									'solid'		=> esc_html__( 'Solid', 'hongo' ),
									'double'	=> esc_html__( 'Double', 'hongo' ),
								),
		'active_callback'	=> 'hongo_box_border_color_sticky_callback',
	) ) );
