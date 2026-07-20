<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Separator Settings */
$wp_customize->add_setting( 'hongo_custom_sidebar_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_custom_sidebar_separator', array(
	'label'	      		=> __( 'Custom sidebars', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_custom_sidebars_panel',
	'settings'   		=> 'hongo_custom_sidebar_separator',
	'priority'	 		=> 2,
) ) );

/* End Separator Settings */

/* Custom Sidebars Settings */
$wp_customize->add_setting( 'hongo_custom_sidebars', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Custom_Sidebars( $wp_customize, 'hongo_custom_sidebars', array(
	'label'      		=> __( 'Manage sidebars', 'hongo' ),
	'type'              => 'hongo_custom_sidebar',
	'description'		=> __( 'You can add widgets in these sidebars at Appearance > Widgets and these sidebars can be assigned in header, footer, pages and posts.', 'hongo' ),
	'section'    		=> 'hongo_add_custom_sidebars_panel',
	'settings'   		=> 'hongo_custom_sidebars',
	'priority'	 		=> 2,
) ) );

/* End Custom Sidebars Settings */

/* Separator Settings */
$wp_customize->add_setting( 'hongo_page_scroll_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_page_scroll_separator', array(
	'label'     		=> __( 'Page scroll', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'   		=> 'hongo_add_disable_style_script_panel',
	'settings'  		=> 'hongo_page_scroll_separator',
	'priority'	 		=> 6,
) ) );

/* End Separator Settings */

/* Smooth Scroll */

$wp_customize->add_setting( 'hongo_enable_page_scrolling_effect', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_page_scrolling_effect', array(
	'label'     		=> __( 'Page smooth scroll', 'hongo' ),
	'section'   		=> 'hongo_add_disable_style_script_panel',
	'settings'			=> 'hongo_enable_page_scrolling_effect',
	'type'              => 'hongo_switch',
	'choices'   		=> array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	'priority'	 		=> 6,
) ) );

/* Separator Settings */
$wp_customize->add_setting( 'hongo_image_meta_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_image_meta_separator', array(
	'label'      		=> __( 'Image meta data', 'hongo' ),
	'type'              => 'hongo_separator',
	'description'       => __('Set visibility for image alt, title and caption attributes by check marking below options.', 'hongo'),
	'section'    		=> 'hongo_add_general_settings_panel',
	'settings'   		=> 'hongo_image_meta_separator',
	'priority'	 		=> 6,
) ) );

/* End Separator Settings */

/* Render Image Alt */
$wp_customize->add_setting( 'hongo_image_alt', array(
	'default' 			=> '1',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_image_alt', array(
	'label'       		=> __( 'Alt', 'hongo' ),
	'section'     		=> 'hongo_add_general_settings_panel',
	'settings'			=> 'hongo_image_alt',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
								'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'	 		=> 6,
) ) );

/* End Render Image Alt */

/* Render Image Title */
$wp_customize->add_setting( 'hongo_image_title', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_image_title', array(
	'label'       		=> __( 'Title', 'hongo' ),
	'section'     		=> 'hongo_add_general_settings_panel',
	'settings'			=> 'hongo_image_title',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
								'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'	 		=> 6,
) ) );

/* End Render Image Title */

/* Show Image Title in Lightbox Popup */
$wp_customize->add_setting( 'hongo_image_title_lightbox_popup', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_image_title_lightbox_popup', array(
	'label'       		=> __( 'Title in lightbox popup', 'hongo' ),
	'section'     		=> 'hongo_add_general_settings_panel',
	'settings'			=> 'hongo_image_title_lightbox_popup',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
								'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'	 		=> 6,
) ) );

/* End Show Image Title in Lightbox Popup */

/* Show Image Caption in Lightbox Popup */
$wp_customize->add_setting( 'hongo_image_caption_lightbox_popup', array(
	'default' 			=> '1',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_image_caption_lightbox_popup', array(
	'label'       		=> __( 'Caption in lightbox popup', 'hongo' ),
	'section'     		=> 'hongo_add_general_settings_panel',
	'settings'			=> 'hongo_image_caption_lightbox_popup',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
								'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'	 		=> 6,
) ) );

/* End Show Image Caption in Lightbox Popup */

/* Disbale Style & Script Settings */
$wp_customize->add_setting( 'hongo_styles_scripts_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_styles_scripts_separator', array(
	'label'     		=> __( 'Disable styles & scripts', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'   		=> 'hongo_add_disable_style_script_panel',
	'settings'  		=> 'hongo_styles_scripts_separator',
	'priority'	 		=> 7,
) ) );

/* End Disbale Style & Script Settings */

/* Disable Styles */

$wp_customize->add_setting( 'hongo_disable_style_details', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Checkbox_Multiple( $wp_customize, 'hongo_disable_style_details', array(
	'label'     		=> __( 'Disable styles', 'hongo' ),
	'section'   		=> 'hongo_add_disable_style_script_panel',
	'settings'			=> 'hongo_disable_style_details',
	'type'              => 'hongo_checkbox',
	'choices'   		=> array(
		'animate'           			=> __( 'Animation', 'hongo' ),
		'et-line-icons' 				=> __( 'Et Line Icons', 'hongo' ),
		'font-awesome'					=> __( 'Font Awesome', 'hongo' ),
		'themify-icons'					=> __( 'Themify Icons', 'hongo' ),
		'simple-line-icons'				=> __( 'Simple Line icons', 'hongo' ),
		'swiper'						=> __( 'Swiper', 'hongo' ),
		'magnific-popup'				=> __( 'Magnific Popup', 'hongo' ),
		'hongo-mCustomScrollbar-style'	=> __( 'MCustom Scrollbar', 'hongo' ),
		'select2'						=> __( 'Select2', 'hongo' ),
		'justifiedGallery'				=> __( 'Justified Gallery', 'hongo' )
	),
	'priority'	 		=> 7,
) ) );

/* End Disable Styles */

/* Disable Script */

$wp_customize->add_setting( 'hongo_disable_script_details', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Checkbox_Multiple( $wp_customize, 'hongo_disable_script_details', array(
	'label'     		=> __( 'Disable scripts', 'hongo' ),
	'section'   		=> 'hongo_add_disable_style_script_panel',
	'settings'			=> 'hongo_disable_script_details',
	'type'              => 'hongo_checkbox',
	'choices'   		=> array(
		'smooth-scroll' 			=> __( 'Smooth Scroll', 'hongo' ),
		'countdown'					=> __( 'Countdown', 'hongo' ),
		'select2'					=> __( 'Select2', 'hongo' ),
		'wow'						=> __( 'Wow Animation', 'hongo' ),
		'skillbars'					=> __( 'Skillbars', 'hongo' ),
		'page-scroll'				=> __( 'Page Scroll', 'hongo' ),
		'swiper'					=> __( 'Swiper', 'hongo' ),
		'jquery-magnific-popup'		=> __( 'Magnific Popup', 'hongo' ),
		'isotope'					=> __( 'Isotope', 'hongo' ),
		'imagesloaded'				=> __( 'Images Loaded', 'hongo' ),
		'jquery-appear'				=> __( 'Appear', 'hongo' ),
		'jquery-fitvids'			=> __( 'Fit Videos', 'hongo' ),
		'equalize'					=> __( 'Equalize', 'hongo' ),
		'infinite-scroll'			=> __( 'Infinite Scroll', 'hongo' ),
		'hongo-mcustomscrollbar'	=> __( 'MCustom Scrollbar', 'hongo' ),
		'sticky-kit'				=> __( 'Sticky Kit', 'hongo' ),
		'jquery-justifiedGallery'	=> __( 'Justified Gallery', 'hongo' ),
		'jquery-ui-autocomplete'	=> __( 'Autocomplete', 'hongo' ),
		'threesixty'				=> __( 'Threesixty', 'hongo' ),
	),
	'priority'	 		=> 7,
) ) );

/* End Disable Script */

/* Disbale Style & Script Settings */
$wp_customize->add_setting( 'hongo_mobile_animation_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

/* Scroll To Top Title Settings */

$wp_customize->add_setting( 'hongo_scroll_to_top_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_scroll_to_top_separator', array(
	'label'      		=> __( 'Scroll to top', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_scroll_to_top_panel',
	'settings'   		=> 'hongo_scroll_to_top_separator',
	'priority'	 		=> 9,
) ) );

/* End Scroll To Top Title Settings */

/* Hide Scroll to Top */

$wp_customize->add_setting( 'hongo_hide_scroll_to_top', array(
	'default' 			=> '1',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_hide_scroll_to_top', array(
	'label'       		=> __( 'Scroll to top', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_hide_scroll_to_top',
	'type'              => 'hongo_switch',
	'choices'   		=> array(
										'1' => __( 'On', 'hongo' ),
										'0' => __( 'Off', 'hongo' ),
									),
	'priority'	 		=> 9,
) ) );

/* End Hide Scroll to Top */

/* Scroll to Top Show on Mobile */

$wp_customize->add_setting( 'hongo_hide_scroll_to_top_on_phone', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_switch_Control( $wp_customize, 'hongo_hide_scroll_to_top_on_phone', array(
	'label'       		=> __( 'Show on mobile', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_hide_scroll_to_top_on_phone',
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
	'type'              => 'hongo_switch',
	'choices'   		=> array(
										'1' => __( 'On', 'hongo' ),
										'0' => __( 'Off', 'hongo' ),
									),
	'priority'	 		=> 9,
) ) );

/* End Scroll to Top Show on Mobile */

/* Scroll to Top Text */

$wp_customize->add_setting( 'hongo_scroll_to_top_text', array(
	'default' 			=> __( 'SCROLL UP', 'hongo' ),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_scroll_to_top_text', array(
	'label'       		=> __( 'Scroll to top text', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_scroll_to_top_text',
	'type'              => 'text',
	'priority'	 		=> 9,
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
) ) );

/* End Scroll to Top Text */

/* Scroll To Top Title Settings */

$wp_customize->add_setting( 'hongo_scroll_to_top_typography_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_scroll_to_top_typography_separator', array(
	'label'      		=> __( 'Scroll to top typography', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_scroll_to_top_panel',
	'settings'   		=> 'hongo_scroll_to_top_typography_separator',
	'priority'	 		=> 9,
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
) ) );

/* End Scroll To Top Title Settings */

/* Scroll To Top Font Size */

$wp_customize->add_setting( 'hongo_scroll_to_top_font_size', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_scroll_to_top_font_size', array(
	'label'       		=> __( 'Font size', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_scroll_to_top_font_size',
	'type'              => 'text',
	'priority'	 		=> 9,
	'description'		=> __( 'Define font size like 12px', 'hongo' ),
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
) ) );

/* End Scroll To Top Font Size */

/* Scroll To Top Line Height */

$wp_customize->add_setting( 'hongo_scroll_to_top_line_height', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_scroll_to_top_line_height', array(
	'label'       		=> __( 'Line height', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_scroll_to_top_line_height',
	'type'              => 'text',
	'priority'	 		=> 9,
	'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
) ) );

/* End Scroll To Top Line Height */

/* Scroll To Top Font Weight */

$wp_customize->add_setting( 'hongo_scroll_to_top_font_weight', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_scroll_to_top_font_weight', array(
	'label'       		=> __( 'Font weight', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_scroll_to_top_font_weight',
	'type'              => 'select',
	'priority'	 		=> 9,
	'choices'           => $hongo_font_weight,
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
) ) );

/* End Scroll To Top Font Weight */

/* Scroll To Top Font Size */

$wp_customize->add_setting( 'hongo_scroll_to_top_icon_font_size', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_scroll_to_top_icon_font_size', array(
	'label'       		=> __( 'Icon font size', 'hongo' ),
	'section'     		=> 'hongo_add_scroll_to_top_panel',
	'settings'			=> 'hongo_scroll_to_top_icon_font_size',
	'type'              => 'text',
	'priority'	 		=> 9,
	'description'		=> __( 'Define font size like 12px', 'hongo' ),
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
) ) );

/* End Scroll To Top Font Size */

/* Scroll To Top Color */

$wp_customize->add_setting( 'hongo_scroll_to_top_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_scroll_to_top_color', array(
	'label'      		=> __( 'Color', 'hongo' ),
	'section'    		=> 'hongo_add_scroll_to_top_panel',
	'settings'	 		=> 'hongo_scroll_to_top_color',
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
	'priority'	 		=> 9,
) ) );

/* End Scroll To Top Color */

/* Scroll To Top Color */

$wp_customize->add_setting( 'hongo_scroll_to_top_hover_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_scroll_to_top_hover_color', array(
	'label'      		=> __( 'Hover color', 'hongo' ),
	'section'    		=> 'hongo_add_scroll_to_top_panel',
	'settings'	 		=> 'hongo_scroll_to_top_hover_color',
	'active_callback' 	=> 'hongo_scroll_to_top_callback',
	'priority'	 		=> 9,
) ) );

/* End Scroll To Top Color */

/* Callback Functions */

if ( ! function_exists( 'hongo_scroll_to_top_callback' ) ) :
	function hongo_scroll_to_top_callback( $control ) {
		if ( $control->manager->get_setting( 'hongo_hide_scroll_to_top' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
endif;

/* End Callback Functions */

/* GDPR Separator Setting */

$wp_customize->add_setting( 'hongo_general_gdpr_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_general_gdpr_separator', array(
	'label'      		=> __( 'GDPR settings', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'   		=> 'hongo_general_gdpr_separator',
) ) );

/* End GDPR Separator Setting */

/* GDPR Enable */
$wp_customize->add_setting( 'hongo_gdpr_enable', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_gdpr_enable', array(
	'label'       		=> __( 'GDPR', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_enable',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
								'0' => __( 'Off', 'hongo' ),
						   ),
) ) );

/* End GDPR Enable */

/* GDPR Style  */

$wp_customize->add_setting( 'hongo_gdpr_style', array(
	'default' 			=> 'left-content',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_gdpr_style', array(
	'label'       		=> __( 'GDPR style', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_style',
	'type'              => 'hongo_preview_image',
	'choices'           => array(
								'full-content' 	   	=> __( 'Bottom full', 'hongo' ),
								'left-content'      => __( 'Left corner', 'hongo' ),
								'right-content'     => __( 'Right corner', 'hongo' ),
							   ),
	'hongo_img'			=> array(
								HONGO_THEME_IMAGES_URI . '/bottom.jpg',
								HONGO_THEME_IMAGES_URI . '/bottom-left.jpg',
								HONGO_THEME_IMAGES_URI . '/bottom-right.jpg',
						   ),
	'hongo_columns'    	=> '4',
	'active_callback'   => 'hongo_gdpr_callback',
) ) );

/* End GDPR Style */

/* GDPR Text Setting */
$wp_customize->add_setting( 'hongo_gdpr_text', array(
	'default' 			=> sprintf( '%s <a href="#">%s</a>', esc_html__( 'Our site uses cookies. By continuing to our site you are agreeing to our cookie', 'hongo' ), esc_html__( 'privacy policy', 'hongo' ) ),
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_text', array(
	'label'       		=> __( 'GDPR content', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_text',
	'type'              => 'textarea',
	'active_callback'   => 'hongo_gdpr_callback',
) ) );

/* End GDPR Text Setting */

/* GDPR Button Text Setting */

$wp_customize->add_setting( 'hongo_gdpr_button_text', array(
	'default' 			=> __( 'GOT IT', 'hongo' ),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_button_text', array(
	'label'       		=> __( 'Button text', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_button_text',
	'type'              => 'text',
	'active_callback'   => 'hongo_gdpr_callback',
) ) );

/* GDPR Button Text Setting */

/* GDPR General Separator Settings */
$wp_customize->add_setting( 'hongo_gdpr_general_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'		
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_gdpr_general_separator', array(
	'label'      		=> __( 'General', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'   		=> 'hongo_gdpr_general_separator',
	'active_callback'   => 'hongo_gdpr_callback',
) ) );

/* End GDPR General Separator Settings */

/* GDPR Enable Overlay */

$wp_customize->add_setting( 'hongo_gdpr_enable_overlay', array(
	'default' 			=> '1',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_gdpr_enable_overlay', array(
	'label'				=> __( 'Overlay', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_enable_overlay',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
								'0' => __( 'Off', 'hongo' ),
							),
	'active_callback' 	=> 'hongo_gdpr_callback',
) ) );

/* End Enable Product image slider */

/* GDPR Box Background Color */

$wp_customize->add_setting( 'hongo_gdpr_box_background_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_box_background_color', array(
	'label'      		=> __( 'Box background color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_box_background_color',
	'active_callback' 	=> 'hongo_gdpr_callback',
) ) );

/* End GDPR Box Background Color */

/* GDPR Overlay Color */

$wp_customize->add_setting( 'hongo_gdpr_overlay_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_overlay_color', array(
	'label'      		=> __( 'Overlay color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_overlay_color',
	'active_callback' 	=> 'hongo_gdpr_overlay_callback',
) ) );

/* End GDPR Overlay Color */


/* GDPR Content Typography Separator setting */
$wp_customize->add_setting( 'hongo_gdpr_content_typography_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_gdpr_content_typography_separator', array(
	'label'      		=> __( 'Content typography and color', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'   		=> 'hongo_gdpr_content_typography_separator',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Typography Separator setting */

/* GDPR Content Font size setting*/
$wp_customize->add_setting( 'hongo_gdpr_content_font_size', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_content_font_size', array(
	'label'       		=> __( 'Font size', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_content_font_size',
	'type'              => 'text',
	'description'       => __( 'In pixel like 15px', 'hongo' ),
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Font size setting */

/* GDPR Content Line height setting*/
$wp_customize->add_setting( 'hongo_gdpr_content_line_height', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_content_line_height', array(
	'label'       		=> __( 'Line height', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_content_line_height',
	'type'              => 'text',
	'description'       => __( 'In pixel like 15px', 'hongo' ),
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Line height setting */

/* GDPR Content Letter spacing setting*/
$wp_customize->add_setting( 'hongo_gdpr_content_letter_spacing', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_content_letter_spacing', array(
	'label'       		=> __( 'Letter spacing', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_content_letter_spacing',
	'type'              => 'text',
	'description'       => __( 'In pixel like 1px', 'hongo' ),
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Letter spacing setting */

/* GDPR Content Font weight setting */

$wp_customize->add_setting( 'hongo_gdpr_content_font_weight', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_content_font_weight', array(
	'label'       		=> __( 'Font weight', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_content_font_weight',
	'type'              => 'select',
	'choices'           => $hongo_font_weight,
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Font weight setting */

/* GDPR Content Color setting*/
$wp_customize->add_setting( 'hongo_gdpr_content_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_content_color', array(
	'label'       		=> __( 'Color', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_content_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Color setting */

/* GDPR Content Hover Color setting*/
$wp_customize->add_setting( 'hongo_gdpr_content_hover_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_content_hover_color', array(
	'label'       		=> __( 'Hover color', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_content_hover_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Content Hover Color setting */

/* Separator Settings */
$wp_customize->add_setting( 'hongo_gdpr_button_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'		
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_gdpr_button_separator', array(
	'label'      		=> __( 'Button typography and colors', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'   		=> 'hongo_gdpr_button_separator',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );

/* End Separator Settings */

/* GDPR Button Font Size */

$wp_customize->add_setting( 'hongo_gdpr_button_font_size', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_button_font_size', array(
	'label'       		=> __( 'Font size', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_button_font_size',
	'type'              => 'text',
	'description'		=> __( 'Define font size like 12px', 'hongo' ),
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );

/* End Button GDPR Font Size */

/* GDPR Button Line Height */

$wp_customize->add_setting( 'hongo_gdpr_button_line_height', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_button_line_height', array(
	'label'       		=> __( 'Line height', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_button_line_height',
	'type'              => 'text',
	'description'		=> __( 'Define line height like 12px', 'hongo' ),
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );

/* End GDPR Button Line Height */

/* GDPR Button Letter Spacing */

$wp_customize->add_setting( 'hongo_gdpr_button_letter_spacing', array(
	'default' 			=> '',
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_button_letter_spacing', array(
	'label'       		=> __( 'Letter spacing', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_button_letter_spacing',
	'type'              => 'text',
	'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );

/* End GDPR Button Letter Spacing */

/* GDPR Button Font Weight */

$wp_customize->add_setting( 'hongo_gdpr_button_font_weight', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_gdpr_button_font_weight', array(
	'label'       		=> __( 'Font weight', 'hongo' ),
	'section'     		=> 'hongo_add_gdpr_block_panel',
	'settings'			=> 'hongo_gdpr_button_font_weight',
	'type'              => 'select',
	'choices'           => $hongo_font_weight,
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );

/* End GDPR Button Font Weight */

/* GDPR Button Background Color */

$wp_customize->add_setting( 'hongo_gdpr_button_bg_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_button_bg_color', array(
	'label'      		=> __( 'Background color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_button_bg_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Button Background Color */

/* GDPR Button Background Hover Color */

$wp_customize->add_setting( 'hongo_gdpr_button_bg_hover_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_button_bg_hover_color', array(
	'label'      		=> __( 'Background hover color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_button_bg_hover_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Button Background Hover Color */

/* GDPR Button Color */

$wp_customize->add_setting( 'hongo_gdpr_button_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_button_color', array(
	'label'      		=> __( 'Color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_button_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Button Color */

/* GDPR Button Hover Color */

$wp_customize->add_setting( 'hongo_gdpr_button_hover_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_button_hover_color', array(
	'label'      		=> __( 'Hover color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_button_hover_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Button Hover Color */

/* GDPR Border Button Color */

$wp_customize->add_setting( 'hongo_gdpr_button_border_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_button_border_color', array(
	'label'      		=> __( 'Border color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_button_border_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );
/* End GDPR Border Button Color */

/* GDPR Border Button Hover Color */

$wp_customize->add_setting( 'hongo_gdpr_button_border_hover_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_gdpr_button_border_hover_color', array(
	'label'      		=> __( 'Border hover color', 'hongo' ),
	'section'    		=> 'hongo_add_gdpr_block_panel',
	'settings'	 		=> 'hongo_gdpr_button_border_hover_color',
	'active_callback'	=> 'hongo_gdpr_callback',
) ) );

/* End Border GDPR Button Hover Color */

/* Animation Mobile */

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_mobile_animation_separator', array(
	'label'     		=> __( 'Animation in mobile', 'hongo' ),
	'type'              => 'hongo_separator',
	'section'   		=> 'hongo_other_settings_panel',
	'settings'  		=> 'hongo_mobile_animation_separator',
	'priority'	 		=> 12,
) ) );

$wp_customize->add_setting( 'hongo_enable_mobile_animation', array(
	'default' 			=> '0',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mobile_animation', array(
	'label'     		=> __( 'Animation in mobile', 'hongo' ),
	'section'   		=> 'hongo_other_settings_panel',
	'settings'			=> 'hongo_enable_mobile_animation',
	'type'              => 'hongo_switch',
	'choices'   		=> array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	'priority'	 		=> 12,
) ) );

/* Animation Mobile */

/* Callback Functions */

if ( ! function_exists( 'hongo_gdpr_callback' ) ) :
	function hongo_gdpr_callback( $control ) {
		if ( $control->manager->get_setting( 'hongo_gdpr_enable' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
endif;

if ( ! function_exists( 'hongo_gdpr_overlay_callback' ) ) :
	function hongo_gdpr_overlay_callback( $control ) {
		if ( $control->manager->get_setting( 'hongo_gdpr_enable' )->value() == 1 && $control->manager->get_setting( 'hongo_gdpr_enable_overlay' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
endif;
