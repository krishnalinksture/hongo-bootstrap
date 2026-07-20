<?php
/**
 * Metabox For Title Wrapper.
 *
 * @package Hongo
 */
?>
<?php

/* If WooCommerce plugin is activated */
if ( $post->post_type == 'product' && hongo_is_woocommerce_activated() ){
    hongo_after_main_separator_start(
        'separator_main_start',
        ''
    );
    hongo_meta_box_separator(
        'hongo_single_product_separator_single',
        esc_html__( 'General', 'hongo-addons' )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        ''
    );
    hongo_meta_box_dropdown('hongo_single_product_enable_title_single',
        esc_html__('Title', 'hongo-addons'),
        array(
            'default' => esc_html__('Default', 'hongo-addons'),
            '1' => esc_html__('On', 'hongo-addons'),
            '0' => esc_html__('Off', 'hongo-addons')
        ),
        esc_html__('If on, a title will display in page', 'hongo-addons')
    );
    hongo_meta_box_dropdown(  'hongo_single_product_title_container_style_single',
        esc_html__( 'Container style', 'hongo-addons' ),
        array(
          'default' => esc_html__( 'Default', 'hongo-addons' ),
          'container' => esc_html__( 'Fixed', 'hongo-addons' ),
          'container-fluid' => esc_html__( 'Full Width', 'hongo-addons' ),
          'container-fluid-with-padding' => esc_html__( 'Full width ( with paddings )', 'hongo-addons' ),
        )
    );
    hongo_meta_box_text( 'hongo_single_product_title_container_fluid_with_padding_single', 
        esc_html__('Full width padding', 'hongo-addons'),
        '',
        '',
        array( 'element' => 'hongo_single_product_title_container_style_single', 'value' => array( 'default', 'container-fluid-with-padding' ) )
    );
    hongo_meta_box_dropdown( 'hongo_single_product_title_style_single',
        esc_html__('Style', 'hongo-addons'),
        array(
            'default' => esc_html__('Default', 'hongo-addons'),
            'page-title-style-1'   => esc_html__( 'Left alignment', 'hongo-addons' ),
            'page-title-style-2'   => esc_html__( 'Right alignment', 'hongo-addons' ),
            'page-title-style-3'   => esc_html__( 'Center alignment', 'hongo-addons' ),
            'page-title-style-4'   => esc_html__( 'Classic title style', 'hongo-addons' ),
            'page-title-style-5'   => esc_html__( 'Modern title style', 'hongo-addons' ),
            'page-title-style-6'   => esc_html__( 'Clean title style', 'hongo-addons' ),
            'page-title-style-7'   => esc_html__( 'Gallery background title style', 'hongo-addons' ),
            'page-title-style-8'   => esc_html__( 'Background video title style', 'hongo-addons' ),
            'page-title-style-9'   => esc_html__( 'Mini version title style', 'hongo-addons' )
        ),
        esc_html__('Choose page title style', 'hongo-addons')
    );
    hongo_meta_box_dropdown('hongo_single_product_enable_title_heading_single',
                    esc_html__('Title heading', 'hongo-addons'),
                    array(
                        'default' => esc_html__('Default', 'hongo-addons'),
                        '1' => esc_html__('On', 'hongo-addons'),
                        '0' => esc_html__('Off', 'hongo-addons')
                    ),
                    esc_html__('If on, show title heading.', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_product_title_height_single',
        esc_html__('Content height', 'hongo-addons'),
        array('default' => esc_html__('Default', 'hongo-addons'),
            'very-small-height' => esc_html__('Very Small', 'hongo-addons'),
            'small-height'      => esc_html__('Small', 'hongo-addons'),
            'medium-height'     => esc_html__('Medium', 'hongo-addons'),
            'large-height'      => esc_html__('Large', 'hongo-addons'),
            'extra-large-height' => esc_html__('Extra Large', 'hongo-addons')
        )
    );
    hongo_meta_box_dropdown('hongo_single_product_title_text_transform_single',
        esc_html__('Title text case', 'hongo-addons'),
        array('default' => esc_html__('Default', 'hongo-addons'),
            'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
            'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
            'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
            'text-none' => esc_html__('None', 'hongo-addons'),
        )
    );
    hongo_meta_box_dropdown('hongo_single_product_enable_subtitle_single',
                    esc_html__('Subtitle', 'hongo-addons'),
                    array(
                        'default' => esc_html__('Default', 'hongo-addons'),
                        '1' => esc_html__('On', 'hongo-addons'),
                        '0' => esc_html__('Off', 'hongo-addons')
                    ),
                    esc_html__('If on, show Subtitle.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_product_title_subtitle_single', 
                    esc_html__('Subtitle', 'hongo-addons'),
                    '',
                    '',
                    array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );
    hongo_meta_box_dropdown('hongo_single_product_title_subtitle_text_transform',
        esc_html__('Subtitle text case', 'hongo-addons'),
        array(
            'default' => esc_html__('Default', 'hongo-addons'),
            'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
            'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
            'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
            'text-none' => esc_html__('None', 'hongo-addons'),
        ),
        '',
        array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_dropdown('hongo_single_product_title_subtitle_alignment_single',
                    esc_html__('Title & Subtitle alignment', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'left' => esc_html__('Left', 'hongo-addons'),
                          'center' => esc_html__('Center', 'hongo-addons'),
                          'right' => esc_html__('Right', 'hongo-addons'),
                         ),
                    '',
                    array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-4', 'page-title-style-5','page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );
    hongo_meta_box_dropdown('hongo_single_product_enable_title_image_single',
                    esc_html__('Enable background image', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, background image will show in title.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-8','page-title-style-9'))
                );
    hongo_meta_box_upload( 'hongo_single_product_title_bg_image_single', 
                    esc_html__('Background image', 'hongo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_enable_title_image_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-8','page-title-style-9'))
                );
    hongo_meta_box_upload_multiple('hongo_single_product_title_bg_multiple_image_single', 
                    esc_html__('Background gallery images', 'hongo-addons'),
                    esc_html__('Use only for Page Title Style 7.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7'))
                );
    hongo_meta_box_dropdown('hongo_single_product_title_scroll_to_down_single',
                    esc_html__('Scroll to down', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    '',
                    array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7'))
                );
    hongo_meta_box_text( 'hongo_single_product_title_callto_section_id_single', 
                    esc_html__('Next section ID', 'hongo-addons'),
                    esc_html__('Use only for Page Title Style 7.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_product_title_scroll_to_down_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7'))
                );
    hongo_meta_box_dropdown( 'hongo_single_product_title_video_type_single',
                    esc_html__('Video type', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'self' => esc_html__('Self', 'hongo-addons'),
                          'external' => esc_html__('External', 'hongo-addons'),
                         ),
                    esc_html__('Background video title styleBackground video title style.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-8') )
                );
    hongo_meta_box_text( 'hongo_single_product_title_video_mp4_single', 
                    esc_html__('MP4', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_product_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_product_title_video_ogg_single', 
                    esc_html__('OGG', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_product_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_product_title_video_webm_single', 
                    esc_html__('WEBM', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_product_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_product_title_video_youtube_single', 
                    esc_html__('External video url', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_product_title_video_type_single', 'value' => array('default', 'external')),
                    array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_dropdown( 'hongo_single_product_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'hongo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'hongo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'hongo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'hongo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'hongo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'hongo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'hongo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'hongo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'hongo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'hongo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'hongo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'hongo-addons')
                );
    hongo_meta_box_dropdown( 'hongo_single_product_title_opacity_single',
                    esc_html__('Opacity', 'hongo-addons'),
                    array('default'   => esc_html__( 'Default', 'hongo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'hongo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'hongo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'hongo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'hongo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'hongo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'hongo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'hongo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'hongo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'hongo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'hongo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'hongo-addons' ),
                         ),
                    esc_html__('Choose single product title opacity', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_product_enable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_product_enable_breadcrumb_heading_single',
                    esc_html__('Breadcrumb heading', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, a breadcrumb heading will display in page', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
                );
    hongo_meta_box_dropdown('hongo_single_product_breadcrumb_position_single',
                    esc_html__('Breadcrumb position', 'hongo-addons'),
                    array(
                      'default'    => esc_html__( 'Default', 'hongo-addons' ),
                      'title-area'  => esc_html__( 'In title area', 'hongo-addons' ),
                      'after-title-area'  => esc_html__( 'After title area', 'hongo-addons' ),
                    ),
                    '',
                    array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
                );
    hongo_meta_box_dropdown('hongo_single_product_breadcrumb_alignment_single',
                    esc_html__('Breadcrumb alignment', 'hongo-addons'),
                    array(
                      ''    => esc_html__( 'Default', 'hongo-addons' ),
                      'left'  => esc_html__( 'Left', 'hongo-addons' ),
                      'center'  => esc_html__( 'Center', 'hongo-addons' ),
                      'right' => esc_html__( 'Right', 'hongo-addons' ),
                    ),
                    esc_html__('Use only for when Breadcrumb Position After title area.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) ),
                    array( 'parent-element' => 'hongo_single_product_breadcrumb_position_single', 'value' => array( 'default', 'after-title-area' ) )
                );
    hongo_meta_box_dropdown('hongo_single_product_title_enable_border_single',
                    esc_html__('Border', 'hongo-addons'),
                    array(
                        'default' => esc_html__( 'Default', 'hongo-addons' ),
                        '1' => esc_html__( 'On', 'hongo-addons' ),
                        '0' => esc_html__( 'Off', 'hongo-addons' )
                    ),
                    esc_html__('If on, a title border will display in product', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_product_title_top_space_single',
                    esc_html__('Add top space of header height', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         )                    
                );
    hongo_meta_box_dropdown('hongo_single_product_title_after_header_single',
            esc_html__('After header', 'hongo-addons'),
            array(
                'default' => esc_html__('Default', 'hongo-addons'),
                '1' => esc_html__('On', 'hongo-addons'),
                '0' => esc_html__('Off', 'hongo-addons')
            )
        );
    hongo_meta_box_text( 'hongo_single_product_title_top_section_space_single', 
        esc_html__('Top space', 'hongo-addons'),
        esc_html__('In pixel like 50px', 'hongo-addons')
      );
    hongo_meta_box_text( 'hongo_single_product_title_bottom_section_space_single', 
        esc_html__('Bottom space', 'hongo-addons'),
        esc_html__('In pixel like 50px', 'hongo-addons')
      );
    hongo_before_inner_separator_end(
      'separator_end',
      ''
    );
    hongo_meta_box_separator('hongo_single_product_title_color_single',
        esc_html__( 'Typography settings', 'hongo-addons' )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        ''
    );
    hongo_meta_box_text( 'hongo_single_product_title_font_size_single', 
        esc_html__('Title font size', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons')
    );
    hongo_meta_box_text( 'hongo_single_product_title_line_height_single', 
        esc_html__('Title line height', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons')
    );
    hongo_meta_box_text( 'hongo_single_product_title_letter_spacing_single', 
        esc_html__('Title letter spacing', 'hongo-addons'),
        esc_html__('In pixel like 5px', 'hongo-addons')
    );
    hongo_meta_box_dropdown( 'hongo_single_product_title_font_weight_single', 
        esc_html__('Title font weight', 'hongo-addons'),
            array('default' => esc_html__( 'Default', 'hongo-addons' ),
                '100' => esc_html__('100', 'hongo-addons'),
                '200' => esc_html__('200', 'hongo-addons'),
                '300' => esc_html__('300', 'hongo-addons'),
                '400' => esc_html__('400', 'hongo-addons'),
                '500' => esc_html__('500', 'hongo-addons'),
                '600' => esc_html__('600', 'hongo-addons'),
                '700' => esc_html__('700', 'hongo-addons'),
                '800' => esc_html__('800', 'hongo-addons'),
                '900' => esc_html__('900', 'hongo-addons'),
            )
    );
    hongo_meta_box_text( 'hongo_single_product_subtitle_font_size_single', 
        esc_html__('Subtitle font size', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_text( 'hongo_single_product_subtitle_line_height_single', 
        esc_html__('Subtitle line height', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_text( 'hongo_single_product_subtitle_letter_spacing_single', 
        esc_html__('Subtitle letter spacing', 'hongo-addons'),
        esc_html__('In pixel like 5px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_dropdown('hongo_single_product_subtitle_font_weight_single',
        esc_html__('Subtitle font weight', 'hongo-addons'),
        array('default' => esc_html__( 'Default', 'hongo-addons' ),
                '100' => esc_html__('100', 'hongo-addons'),
                '200' => esc_html__('200', 'hongo-addons'),
                '300' => esc_html__('300', 'hongo-addons'),
                '400' => esc_html__('400', 'hongo-addons'),
                '500' => esc_html__('500', 'hongo-addons'),
                '600' => esc_html__('600', 'hongo-addons'),
                '700' => esc_html__('700', 'hongo-addons'),
                '800' => esc_html__('800', 'hongo-addons'),
                '900' => esc_html__('900', 'hongo-addons'),
            ),
        '',
        array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_text( 'hongo_single_product_breadcrumb_font_size_single', 
        esc_html__('Breadcrumb font size', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )        
    );
    hongo_meta_box_text( 'hongo_single_product_breadcrumb_line_height_single', 
        esc_html__('Breadcrumb line height', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),        
        '',
        array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )        
    );
    hongo_meta_box_text( 'hongo_single_product_breadcrumb_letter_spacing_single', 
        esc_html__('Breadcrumb letter spacing', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )        
    );
    hongo_before_inner_separator_end(
        'separator_end',
        ''
    );
    hongo_meta_box_separator('hongo_single_product_title_color_single',
            esc_html__( 'Color settings', 'hongo-addons' )
    );
    hongo_after_inner_separator_start(
      'separator_start',
      ''
    );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_opacity_color_single',
            esc_html__( 'Opacity color', 'hongo-addons' )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_bg_color_single',
            esc_html__( 'Background color', 'hongo-addons' )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_color_single',
            esc_html__( 'Title Text color', 'hongo-addons' )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_subtitle_color_single',
            esc_html__( 'Subtitle Text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
        );
    hongo_meta_box_colorpicker( 'hongo_page_subtitle_bg_color_single',
        esc_html__( 'Subtitle text background color', 'hongo-addons' ),
        '',
        array( 'element' => 'hongo_single_product_title_style_single', 'value' => array('default','page-title-style-5'))
    );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb text hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_border_color_single',
            esc_html__( 'Border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_title_enable_border_single', 'value' => array('default', '1'))
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_icon_bg_color_single',
            esc_html__( 'Icon background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_icon_hover_bg_color_single',
            esc_html__( 'Icon hover background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_icon_color_single',
            esc_html__( 'Icon color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_product_title_icon_hover_color_single',
            esc_html__( 'Icon Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_product_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_product_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_before_inner_separator_end(
      'separator_end',
      ''
    );
    hongo_before_main_separator_end(
      'separator_main_end',
      ''
    );
} elseif ( $post->post_type == 'post' ) {
  hongo_after_main_separator_start(
    'separator_main_start',
    ''
  );
  hongo_meta_box_separator(
    'hongo_single_post_separator_single',
    esc_html__( 'General', 'hongo-addons' )
  );
  hongo_after_inner_separator_start(
    'separator_start',
    ''
  );
	hongo_meta_box_dropdown( 'hongo_single_post_enable_title_single',
        esc_html__('Title', 'hongo-addons'),
        array( 
            'default' => esc_html__('Default', 'hongo-addons'),
            '1' => esc_html__('On', 'hongo-addons'),
            '0' => esc_html__('Off', 'hongo-addons')
        ),
        esc_html__('If on, a title will display in page', 'hongo-addons')
    );
    hongo_meta_box_dropdown( 'hongo_single_post_title_container_style_single',
        esc_html__( 'Container style', 'hongo-addons' ),
        array(
          'default' => esc_html__( 'Default', 'hongo-addons' ),
          'container' => esc_html__( 'Fixed', 'hongo-addons' ),
          'container-fluid' => esc_html__( 'Full Width', 'hongo-addons' ),
          'container-fluid-with-padding' => esc_html__( 'Full width ( with paddings )', 'hongo-addons' ),
        )
    );
    hongo_meta_box_text( 'hongo_single_post_title_container_fluid_with_padding_single', 
        esc_html__('Full width padding', 'hongo-addons'),
        '',
        '',
        array( 'element' => 'hongo_single_post_title_container_style_single', 'value' => array( 'default', 'container-fluid-with-padding' ) )
    );
    hongo_meta_box_dropdown( 'hongo_single_post_title_style_single',
                    esc_html__('Style', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'page-title-style-1'   => esc_html__( 'Left alignment', 'hongo-addons' ),
                          'page-title-style-2'   => esc_html__( 'Right alignment', 'hongo-addons' ),
                          'page-title-style-3'   => esc_html__( 'Center alignment', 'hongo-addons' ),
                          'page-title-style-4'   => esc_html__( 'Classic title style', 'hongo-addons' ),
                          'page-title-style-5'   => esc_html__( 'Modern title style', 'hongo-addons' ),
                          'page-title-style-6'   => esc_html__( 'Clean title style', 'hongo-addons' ),
                          'page-title-style-7'   => esc_html__( 'Gallery background title style', 'hongo-addons' ),
                          'page-title-style-8'   => esc_html__( 'Background video title style', 'hongo-addons' ),
                          'page-title-style-9'   => esc_html__( 'Mini version title style', 'hongo-addons' )
                         ),
                    esc_html__('Choose page title style', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_post_enable_title_heading_single',
                    esc_html__('Title heading', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, show Title Heading.', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_post_title_height_single',
      esc_html__('Content height', 'hongo-addons'),
      array('default' => esc_html__('Default', 'hongo-addons'),
        'very-small-height' => esc_html__('Very Small', 'hongo-addons'),
        'small-height'      => esc_html__('Small', 'hongo-addons'),
        'medium-height'     => esc_html__('Medium', 'hongo-addons'),
        'large-height'      => esc_html__('Large', 'hongo-addons'),
        'extra-large-height' => esc_html__('Extra Large', 'hongo-addons')
      )
    );
    hongo_meta_box_dropdown('hongo_single_post_title_text_transform_single',
                    esc_html__('Title text case', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
                          'text-none' => esc_html__('None', 'hongo-addons'),
                         )
                );
    hongo_meta_box_dropdown('hongo_single_post_enable_subtitle_single',
                    esc_html__('Subtitle', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_post_title_subtitle_single',
                    esc_html__('Subtitle', 'hongo-addons'),
                    '',
                    '',
                    array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );
    hongo_meta_box_dropdown('hongo_single_post_title_subtitle_text_transform',
                    esc_html__('Subtitle text case', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
                          'text-none' => esc_html__('None', 'hongo-addons'),
                         ),
                    '',
                    array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );
    hongo_meta_box_dropdown('hongo_single_post_title_subtitle_alignment_single',
                    esc_html__('Title & Subtitle alignment', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'left' => esc_html__('Left', 'hongo-addons'),
                          'center' => esc_html__('Center', 'hongo-addons'),
                          'right' => esc_html__('Right', 'hongo-addons'),
                         ),
                    '',
                    array( 'element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-4', 'page-title-style-5','page-title-style-6', 'page-title-style-7','page-title-style-8'))
                );    
    hongo_meta_box_dropdown('hongo_single_post_enable_title_image_single',
                    esc_html__('Enable background image', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, background image will show in title.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-8','page-title-style-9'))
                );
    hongo_meta_box_upload( 'hongo_single_post_title_bg_image_single', 
                    esc_html__('Background image', 'hongo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_post_enable_title_image_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-8','page-title-style-9'))
                );
    hongo_meta_box_upload_multiple('hongo_single_post_title_bg_multiple_image_single', 
                    esc_html__('Background gallery images', 'hongo-addons'),
                    esc_html__('Use only for Page Title Style 7.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7'))
                );
    hongo_meta_box_dropdown('hongo_single_post_title_scroll_to_down_single',
                    esc_html__('Scroll to down', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    '',
                    array( 'element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
                );
    hongo_meta_box_text( 'hongo_single_post_title_callto_section_id_single', 
                    esc_html__('Next section ID', 'hongo-addons'),
                    esc_html__('Use only for Page Title Style 7.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_post_title_scroll_to_down_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7'))
                );
    hongo_meta_box_dropdown( 'hongo_single_post_title_video_type_single',
                    esc_html__('Video type', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'self' => esc_html__('Self', 'hongo-addons'),
                          'external' => esc_html__('External', 'hongo-addons'),
                         ),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    array( 'element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_post_title_video_mp4_single', 
                    esc_html__('MP4', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_post_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_post_title_video_ogg_single', 
                    esc_html__('OGG', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_post_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_post_title_video_webm_single', 
                    esc_html__('WEBM', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_post_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_text( 'hongo_single_post_title_video_youtube_single', 
                    esc_html__('External video url', 'hongo-addons'),
                    esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_single_post_title_video_type_single', 'value' => array('default', 'external')),
                    array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-8'))
                );
    hongo_meta_box_dropdown( 'hongo_single_post_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'hongo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'hongo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'hongo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'hongo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'hongo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'hongo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'hongo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'hongo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'hongo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'hongo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'hongo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'hongo-addons')
                );
    hongo_meta_box_dropdown( 'hongo_single_post_title_opacity_single',
                    esc_html__('Opacity', 'hongo-addons'),
                    array('default'   => esc_html__( 'Default', 'hongo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'hongo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'hongo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'hongo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'hongo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'hongo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'hongo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'hongo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'hongo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'hongo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'hongo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'hongo-addons' ),
                         ),
                    esc_html__('Choose single post title opacity', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_post_enable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_post_enable_breadcrumb_heading_single',
                    esc_html__('Breadcrumb heading', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, a breadcrumb heading will display in page', 'hongo-addons'),
                    array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
                );
    hongo_meta_box_dropdown('hongo_single_post_breadcrumb_position_single',
                    esc_html__('Breadcrumb position', 'hongo-addons'),
                    array(
                      'default'    => esc_html__( 'Default', 'hongo-addons' ),
                      'title-area'  => esc_html__( 'In title area', 'hongo-addons' ),
                      'after-title-area'  => esc_html__( 'After title area', 'hongo-addons' ),
                    ),
                    '',
                    array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
                );
    hongo_meta_box_dropdown('hongo_single_post_breadcrumb_alignment_single',
                    esc_html__('Breadcrumb alignment', 'hongo-addons'),
                    array(
                      'default'    => esc_html__( 'Default', 'hongo-addons' ),
                      'left'  => esc_html__( 'Left', 'hongo-addons' ),
                      'center'  => esc_html__( 'Center', 'hongo-addons' ),
                      'right' => esc_html__( 'Right', 'hongo-addons' ),
                    ),
                    esc_html__( 'Use only for when Breadcrumb Position After title area.', 'hongo-addons' ),
                    array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) ),
                    array( 'parent-element' => 'hongo_single_post_breadcrumb_position_single', 'value' => array( 'default', 'after-title-area' ) )
                );
    hongo_meta_box_dropdown('hongo_single_post_title_enable_border_single',
                    esc_html__('Border', 'hongo-addons'),
                    array(
                        'default' => esc_html__( 'Default', 'hongo-addons' ),
                        '1' => esc_html__( 'On', 'hongo-addons' ),
                        '0' => esc_html__( 'Off', 'hongo-addons' )
                    ),
                    esc_html__('If on, a title border will display in page', 'hongo-addons')
                );
    hongo_meta_box_dropdown('hongo_single_post_title_top_space_single',
        esc_html__('Add top space of header height', 'hongo-addons'),
        array('default' => esc_html__('Default', 'hongo-addons'),
              '1' => esc_html__('On', 'hongo-addons'),
              '0' => esc_html__('Off', 'hongo-addons')
             )
    );
    hongo_meta_box_dropdown('hongo_single_post_title_after_header_single',
            esc_html__('After header', 'hongo-addons'),
            array(
                'default' => esc_html__('Default', 'hongo-addons'),
                '1' => esc_html__('On', 'hongo-addons'),
                '0' => esc_html__('Off', 'hongo-addons')
            )
        );
    hongo_meta_box_text( 'hongo_single_post_title_top_section_space_single', 
        esc_html__('Top space', 'hongo-addons'),
        esc_html__('In pixel like 50px', 'hongo-addons')
    );
    hongo_meta_box_text( 'hongo_single_post_title_bottom_section_space_single', 
        esc_html__('Bottom space', 'hongo-addons'),
        esc_html__('In pixel like 50px', 'hongo-addons')
    );
    hongo_before_inner_separator_end(
        'separator_end',
        ''
    );
    hongo_meta_box_separator('hongo_single_post_title_color_single',
            esc_html__( 'Typography settings', 'hongo-addons' )
    );
    hongo_after_inner_separator_start(
      'separator_start',
      ''
    );
    hongo_meta_box_text( 'hongo_single_post_title_font_size_single', 
        esc_html__('Title font size', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons')
    );
    hongo_meta_box_text( 'hongo_single_post_title_line_height_single', 
        esc_html__('Title line height', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons')
    );
    hongo_meta_box_text( 'hongo_single_post_title_letter_spacing_single', 
        esc_html__('Title letter spacing', 'hongo-addons'),
        esc_html__('In pixel like 5px', 'hongo-addons')
    );
    hongo_meta_box_dropdown( 'hongo_single_post_title_font_weight_single', 
        esc_html__('Title font weight', 'hongo-addons'),
        array('default' => esc_html__( 'Default', 'hongo-addons' ),
            '100' => esc_html__('100', 'hongo-addons'),
            '200' => esc_html__('200', 'hongo-addons'),
            '300' => esc_html__('300', 'hongo-addons'),
            '400' => esc_html__('400', 'hongo-addons'),
            '500' => esc_html__('500', 'hongo-addons'),
            '600' => esc_html__('600', 'hongo-addons'),
            '700' => esc_html__('700', 'hongo-addons'),
            '800' => esc_html__('800', 'hongo-addons'),
            '900' => esc_html__('900', 'hongo-addons'),
        )
    );
    hongo_meta_box_text( 'hongo_single_post_subtitle_font_size_single', 
        esc_html__('Subtitle font size', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );    
    hongo_meta_box_text( 'hongo_single_post_subtitle_line_height_single', 
        esc_html__('Subtitle line height', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_text( 'hongo_single_post_subtitle_letter_spacing_single', 
        esc_html__('Subtitle letter spacing', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',        
        array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_dropdown('hongo_single_post_subtitle_font_weight_single',
        esc_html__('Subtitle font weight', 'hongo-addons'),
        array('default' => esc_html__( 'Default', 'hongo-addons' ),
            '100' => esc_html__('100', 'hongo-addons'),
            '200' => esc_html__('200', 'hongo-addons'),
            '300' => esc_html__('300', 'hongo-addons'),
            '400' => esc_html__('400', 'hongo-addons'),
            '500' => esc_html__('500', 'hongo-addons'),
            '600' => esc_html__('600', 'hongo-addons'),
            '700' => esc_html__('700', 'hongo-addons'),
            '800' => esc_html__('800', 'hongo-addons'),
            '900' => esc_html__('900', 'hongo-addons'),
        ),
        '',
        array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
    hongo_meta_box_text( 'hongo_single_post_breadcrumb_font_size_single', 
        esc_html__('Breadcrumb font size', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );
    hongo_meta_box_text( 'hongo_single_post_breadcrumb_line_height_single', 
        esc_html__('Breadcrumb line height', 'hongo-addons'),
        esc_html__('In pixel like 12px', 'hongo-addons'),
        '',
        array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )        
    );
    hongo_meta_box_text( 'hongo_single_post_breadcrumb_letter_spacing_single', 
      esc_html__('Breadcrumb letter spacing', 'hongo-addons'),      
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )                    
    );
    hongo_before_inner_separator_end(
        'separator_end',
        ''
    );
    hongo_meta_box_separator('hongo_single_post_title_color_single',
            esc_html__( 'Color settings', 'hongo-addons' )
    );
    hongo_after_inner_separator_start(
      'separator_start',
      ''
    );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_opacity_color_single',
            esc_html__( 'Opacity color', 'hongo-addons' )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_bg_color_single',
            esc_html__( 'Background color', 'hongo-addons' )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_color_single',
            esc_html__( 'Title Text color', 'hongo-addons' )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_subtitle_color_single',
            esc_html__( 'Subtitle Text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_subtitle_bg_color_single',
      esc_html__( 'Subtitle text background color', 'hongo-addons' ),
      '',
      array( 'element' => 'hongo_single_post_title_style_single', 'value' => array( 'default','page-title-style-5' ))
    );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb text hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_border_color_single',
            esc_html__( 'Border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_title_enable_border_single', 'value' => array('default', '1'))
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_icon_bg_color_single',
            esc_html__( 'Icon background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_icon_hover_bg_color_single',
            esc_html__( 'Icon hover background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_icon_color_single',
            esc_html__( 'Icon color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_single_post_title_icon_hover_color_single',
            esc_html__( 'Icon Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_single_post_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_single_post_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        ''
      );
    hongo_before_main_separator_end(
        'separator_main_end',
        ''
      );
} else {
  hongo_after_main_separator_start(
    'separator_main_start',
    ''
    );
    hongo_meta_box_separator(
      'hongo_page_title_separator_single',
      esc_html__( 'General', 'hongo-addons' )
    );
    hongo_after_inner_separator_start(
      'separator_start',
      ''
    );
	hongo_meta_box_dropdown('hongo_page_enable_title_single',
					esc_html__('Title', 'hongo-addons'),
					array('default' => esc_html__('Default', 'hongo-addons'),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons')
						 ),
					esc_html__('If on, a title will display in page', 'hongo-addons')
				);
  hongo_meta_box_dropdown(  'hongo_page_title_container_style_single',
        esc_html__( 'Container style', 'hongo-addons' ),
        array(
          'default' => esc_html__( 'Default', 'hongo-addons' ),
          'container' => esc_html__( 'Fixed', 'hongo-addons' ),
          'container-fluid' => esc_html__( 'Full Width', 'hongo-addons' ),
          'container-fluid-with-padding' => esc_html__( 'Full width ( with paddings )', 'hongo-addons' ),
        )
      );
    hongo_meta_box_text( 'hongo_page_title_container_fluid_with_padding_single', 
        esc_html__('Full width padding', 'hongo-addons'),
        '',
        '',
        array( 'element' => 'hongo_page_title_container_style_single', 'value' => array( 'default', 'container-fluid-with-padding' ) )
      );
	hongo_meta_box_dropdown( 'hongo_page_title_style_single',
					esc_html__('Style', 'hongo-addons'),
					array(
                        'default' => esc_html__('Default', 'hongo-addons'),
                        'page-title-style-1'   => esc_html__( 'Left alignment', 'hongo-addons' ),
                        'page-title-style-2'   => esc_html__( 'Right alignment', 'hongo-addons' ),
                        'page-title-style-3'   => esc_html__( 'Center alignment', 'hongo-addons' ),
                        'page-title-style-4'   => esc_html__( 'Classic title style', 'hongo-addons' ),
                        'page-title-style-5'   => esc_html__( 'Modern title style', 'hongo-addons' ),
                        'page-title-style-6'   => esc_html__( 'Clean title style', 'hongo-addons' ),
                        'page-title-style-7'   => esc_html__( 'Gallery background title style', 'hongo-addons' ),
                        'page-title-style-8'   => esc_html__( 'Background video title style', 'hongo-addons' ),
                        'page-title-style-9'   => esc_html__( 'Mini version title style', 'hongo-addons' )
					),
					esc_html__('Choose page title style', 'hongo-addons')
				);
    hongo_meta_box_dropdown('hongo_page_enable_title_heading_single',
                    esc_html__('Title heading', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    esc_html__('If on, show title heading.', 'hongo-addons')
                );
	hongo_meta_box_dropdown('hongo_page_title_text_transform_single',
					esc_html__('Title text case', 'hongo-addons'),
					array(
                        'default' => esc_html__('Default', 'hongo-addons'),
                        'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
                        'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
                        'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
                        'text-normal' => esc_html__('Normal', 'hongo-addons'),
					)
				);
	hongo_meta_box_dropdown('hongo_page_enable_subtitle_single',
					esc_html__('Subtitle', 'hongo-addons'),
					array('default' => esc_html__('Default', 'hongo-addons'),
						  '1' => esc_html__('On', 'hongo-addons'),
						  '0' => esc_html__('Off', 'hongo-addons')
						 ),
					esc_html__('If on, show Subtitle.', 'hongo-addons'),
                    array( 'element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
				);
	hongo_meta_box_text( 'hongo_page_title_subtitle_single', 
					esc_html__('Subtitle', 'hongo-addons'),
                    '',
                    '',
                    array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
				);
    hongo_meta_box_dropdown('hongo_page_title_subtitle_text_transform_single',
        esc_html__('Subtitle text case', 'hongo-addons'),
        array(
            'default' => esc_html__('Default', 'hongo-addons'),
            'text-uppercase' => esc_html__('Uppercase', 'hongo-addons'),
            'text-lowercase' => esc_html__('Lowercase', 'hongo-addons'),
            'text-capitalize' => esc_html__('Capitalize', 'hongo-addons'),
            'text-normal' => esc_html__('Normal', 'hongo-addons'),
        ),
        '',
        array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
        array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
  hongo_meta_box_dropdown('hongo_page_title_subtitle_alignment_single',
          esc_html__('Title & Subtitle alignment', 'hongo-addons'),
          array('default' => esc_html__('Default', 'hongo-addons'),
              'left' => esc_html__('Left', 'hongo-addons'),
              'center' => esc_html__('Center', 'hongo-addons'),
              'right' => esc_html__('Right', 'hongo-addons')
             ),
          '',
          array( 'element' => 'hongo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8'))
        );
	hongo_meta_box_dropdown('hongo_page_enable_title_image_single',
					esc_html__('Enable background image', 'hongo-addons'),
					array(
                        'default' => esc_html__('Default', 'hongo-addons'),
						'1' => esc_html__('On', 'hongo-addons'),
						'0' => esc_html__('Off', 'hongo-addons')
					),
					esc_html__('If on, background image will show in title.', 'hongo-addons'),
                    array( 'element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-8','page-title-style-9'))
				);
	hongo_meta_box_upload( 'hongo_page_title_bg_image_single', 
					esc_html__('Background image', 'hongo-addons'),
					esc_html__('Recommended image size is 1920px X 700px.', 'hongo-addons'),
                    array( 'element' => 'hongo_page_enable_title_image_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-8','page-title-style-9'))
				);
	hongo_meta_box_upload_multiple('hongo_page_title_bg_multiple_image_single', 
					esc_html__('Background gallery images', 'hongo-addons'),
					esc_html__('Use only for Page Title Style 7.', 'hongo-addons'),
                    array( 'element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7'))
				);
    hongo_meta_box_dropdown('hongo_page_title_scroll_to_down_single',
                    esc_html__('Scroll to down', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         ),
                    '',
                    array( 'element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7'))
                );
	hongo_meta_box_text( 'hongo_page_title_callto_section_id_single', 
					esc_html__('Next section ID', 'hongo-addons'),
					esc_html__('Use only for Page Title Style 7.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_page_title_scroll_to_down_single', 'value' => array('default', '1')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7'))
				);
	hongo_meta_box_dropdown( 'hongo_page_title_video_type_single',
					esc_html__('Video type', 'hongo-addons'),
					array('default' => esc_html__('Default', 'hongo-addons'),
						  'self' => esc_html__('Self', 'hongo-addons'),
						  'external' => esc_html__('External', 'hongo-addons'),
						 ),
					esc_html__('Background video title style.', 'hongo-addons'),
                    array( 'element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-8'))
				);
	hongo_meta_box_text( 'hongo_page_title_video_mp4_single', 
					esc_html__('MP4', 'hongo-addons'),
					esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_page_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-8'))
				);
	hongo_meta_box_text( 'hongo_page_title_video_ogg_single', 
					esc_html__('OGG', 'hongo-addons'),
					esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_page_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-8'))
				);
	hongo_meta_box_text( 'hongo_page_title_video_webm_single', 
					esc_html__('WEBM', 'hongo-addons'),
					esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_page_title_video_type_single', 'value' => array('default', 'self')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-8'))
				);
	hongo_meta_box_text( 'hongo_page_title_video_youtube_single', 
					esc_html__('External video url', 'hongo-addons'),
					esc_html__('Background video title style.', 'hongo-addons'),
                    '',
                    array( 'element' => 'hongo_page_title_video_type_single', 'value' => array('default', 'external')),
                    array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-8'))
				);
	hongo_meta_box_dropdown( 'hongo_page_title_parallax_effect_single',
					esc_html__('Parallax effects', 'hongo-addons'),
					array('default' => esc_html__('Default', 'hongo-addons'),
						  'no-parallax' => esc_html__('No Parallax', 'hongo-addons'),
						  '0.1' => esc_html__('Parallax Effect 1', 'hongo-addons'),
						  '0.2' => esc_html__('Parallax Effect 2', 'hongo-addons'),
						  '0.3' => esc_html__('Parallax Effect 3', 'hongo-addons'),
						  '0.4' => esc_html__('Parallax Effect 4', 'hongo-addons'),
						  '0.5' => esc_html__('Parallax Effect 5', 'hongo-addons'),
						  '0.6' => esc_html__('Parallax Effect 6', 'hongo-addons'),
						  '0.7' => esc_html__('Parallax Effect 7', 'hongo-addons'),
						  '0.8' => esc_html__('Parallax Effect 8', 'hongo-addons'),
						  '0.9' => esc_html__('Parallax Effect 9', 'hongo-addons'),
						  '1.0' => esc_html__('Parallax Effect 10', 'hongo-addons')
						 ),
          '',
          array( 'element' => 'hongo_page_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8'))
				);
	hongo_meta_box_dropdown( 'hongo_page_title_opacity_single',
					esc_html__('Opacity', 'hongo-addons'),
					array('default'   => esc_html__( 'Default', 'hongo-addons' ),
						  '0.0'   => esc_html__( 'No Opacity', 'hongo-addons' ),
					    '0.1'   => esc_html__( '0.1', 'hongo-addons' ),
					    '0.2'   => esc_html__( '0.2', 'hongo-addons' ),
					    '0.3'   => esc_html__( '0.3', 'hongo-addons' ),
					    '0.4'   => esc_html__( '0.4', 'hongo-addons' ),
					    '0.5'   => esc_html__( '0.5', 'hongo-addons' ),
					    '0.6'   => esc_html__( '0.6', 'hongo-addons' ),
					    '0.7'   => esc_html__( '0.7', 'hongo-addons' ),
					    '0.8'   => esc_html__( '0.8', 'hongo-addons' ),
					    '0.9'   => esc_html__( '0.9', 'hongo-addons' ),
					    '1.0'   => esc_html__( '1.0', 'hongo-addons' ),
						 ),
					esc_html__('Choose page title opacity', 'hongo-addons')
				);
  hongo_meta_box_dropdown('hongo_page_title_height_single',
    esc_html__('Content height', 'hongo-addons'),
    array('default' => esc_html__('Default', 'hongo-addons'),
        'very-small-height' => esc_html__('Very Small', 'hongo-addons'),
        'small-height'      => esc_html__('Small', 'hongo-addons'),
        'medium-height'     => esc_html__('Medium', 'hongo-addons'),
        'large-height'      => esc_html__('Large', 'hongo-addons'),
        'extra-large-height' => esc_html__('Extra Large', 'hongo-addons')
       )
  );
	hongo_meta_box_dropdown('hongo_page_enable_breadcrumb_single',
					esc_html__('Breadcrumb', 'hongo-addons'),
					array(
                        'default' => esc_html__( 'Default', 'hongo-addons' ),
					    '1' => esc_html__( 'On', 'hongo-addons' ),
                        '0' => esc_html__( 'Off', 'hongo-addons' )
					),
					esc_html__('If on, a breadcrumb will display in page', 'hongo-addons')
				);
    hongo_meta_box_dropdown('hongo_page_enable_breadcrumb_heading_single',
                    esc_html__('Breadcrumb heading', 'hongo-addons'),
                    array(
                        'default' => esc_html__( 'Default', 'hongo-addons' ),
                        '1' => esc_html__( 'On', 'hongo-addons' ),
                        '0' => esc_html__( 'Off', 'hongo-addons' )
                    ),
                    esc_html__('If on, a breadcrumb heading will display in page', 'hongo-addons'),
                    array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
                );
    hongo_meta_box_dropdown('hongo_page_breadcrumb_position_single',
        esc_html__('Breadcrumb position', 'hongo-addons'),
        array(
            'default' => esc_html__('Default', 'hongo-addons'),
            'title-area' => esc_html__('In title area', 'hongo-addons'),
            'after-title-area' => esc_html__('After title area', 'hongo-addons')
        ),
        '',
        array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );
    hongo_meta_box_dropdown('hongo_page_breadcrumb_alignment_single',
        esc_html__('Breadcrumb alignment', 'hongo-addons'),
        array('default' => esc_html__('Default', 'hongo-addons'),
          'left' => esc_html__('Left', 'hongo-addons'),
          'center' => esc_html__('Center', 'hongo-addons'),
          'right' => esc_html__('Right', 'hongo-addons')
         ),
        '',
        array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) ),
        array( 'parent-element' => 'hongo_page_breadcrumb_position_single', 'value' => array( 'default', 'after-title-area' ) )
    );
    hongo_meta_box_dropdown('hongo_page_title_enable_border_single',
                    esc_html__('Border', 'hongo-addons'),
                    array(
                        'default' => esc_html__( 'Default', 'hongo-addons' ),
                        '1' => esc_html__( 'On', 'hongo-addons' ),
                        '0' => esc_html__( 'Off', 'hongo-addons' )
                    ),
                    esc_html__('If on, a title border will display in page', 'hongo-addons')
                );
  hongo_meta_box_dropdown('hongo_page_title_top_space_single',
                    esc_html__('Add top space of header height', 'hongo-addons'),
                    array('default' => esc_html__('Default', 'hongo-addons'),
                          '1' => esc_html__('On', 'hongo-addons'),
                          '0' => esc_html__('Off', 'hongo-addons')
                         )                    
                );
  hongo_meta_box_dropdown('hongo_page_title_after_header_single',
            esc_html__('After header', 'hongo-addons'),
            array(
                'default' => esc_html__('Default', 'hongo-addons'),
                '1' => esc_html__('On', 'hongo-addons'),
                '0' => esc_html__('Off', 'hongo-addons')
            )
        );
  hongo_meta_box_text( 'hongo_page_title_top_section_space_single', 
      esc_html__('Top space', 'hongo-addons'),
      esc_html__('In pixel like 50px', 'hongo-addons')
    );
  hongo_meta_box_text( 'hongo_page_title_bottom_section_space_single', 
      esc_html__('Bottom space', 'hongo-addons'),
      esc_html__('In pixel like 50px', 'hongo-addons')
    );
  hongo_before_inner_separator_end(
      'separator_end',
      ''
  );
  hongo_meta_box_separator('hongo_single_page_title_color_single',
            esc_html__( 'Typography settings', 'hongo-addons' )
    );
  hongo_after_inner_separator_start(
    'separator_start',
    ''
  );
  hongo_meta_box_text( 'hongo_page_title_font_size_single', 
      esc_html__('Title font size', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons') 
    );
  hongo_meta_box_text( 'hongo_page_title_line_height_single', 
      esc_html__('Title line height', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons') 
    );
  hongo_meta_box_text( 'hongo_page_title_letter_spacing_single', 
      esc_html__('Title letter spacing', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons')
    );
  hongo_meta_box_dropdown( 'hongo_page_title_font_weight_single', 
      esc_html__('Title font weight', 'hongo-addons'),
          array('default' => esc_html__( 'Default', 'hongo-addons' ),
              '100' => esc_html__('100', 'hongo-addons'),
              '200' => esc_html__('200', 'hongo-addons'),
              '300' => esc_html__('300', 'hongo-addons'),
              '400' => esc_html__('400', 'hongo-addons'),
              '500' => esc_html__('500', 'hongo-addons'),
              '600' => esc_html__('600', 'hongo-addons'),
              '700' => esc_html__('700', 'hongo-addons'),
              '800' => esc_html__('800', 'hongo-addons'),
              '900' => esc_html__('900', 'hongo-addons'),
             )
        );
  hongo_meta_box_text( 'hongo_page_subtitle_font_size_single', 
      esc_html__('Subtitle font size', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
  hongo_meta_box_text( 'hongo_page_subtitle_line_height_single', 
      esc_html__('Subtitle line height', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
  hongo_meta_box_text( 'hongo_page_subtitle_letter_spacing_single', 
      esc_html__('Subtitle letter spacing', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
    );
  hongo_meta_box_dropdown('hongo_page_subtitle_font_weight_single',
        esc_html__('Subtitle font weight', 'hongo-addons'),
        array('default' => esc_html__( 'Default', 'hongo-addons' ),
              '100' => esc_html__('100', 'hongo-addons'),
              '200' => esc_html__('200', 'hongo-addons'),
              '300' => esc_html__('300', 'hongo-addons'),
              '400' => esc_html__('400', 'hongo-addons'),
              '500' => esc_html__('500', 'hongo-addons'),
              '600' => esc_html__('600', 'hongo-addons'),
              '700' => esc_html__('700', 'hongo-addons'),
              '800' => esc_html__('800', 'hongo-addons'),
              '900' => esc_html__('900', 'hongo-addons'),
             ),
        '',
        array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))        
    );
    hongo_meta_box_text( 'hongo_page_breadcrumb_font_size_single', 
      esc_html__('Breadcrumb font size', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );
    hongo_meta_box_text( 'hongo_page_breadcrumb_line_height_single', 
      esc_html__('Breadcrumb line height', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );
    hongo_meta_box_text( 'hongo_page_breadcrumb_letter_spacing_single', 
      esc_html__('Breadcrumb letter spacing', 'hongo-addons'),
      esc_html__('In pixel like 12px', 'hongo-addons'),
      '',
      array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );

  hongo_before_inner_separator_end(
    'separator_end',
    ''
    );
  hongo_meta_box_separator('hongo_single_page_title_color_single',
            esc_html__( 'Color settings', 'hongo-addons' )
    );
  hongo_after_inner_separator_start(
    'separator_start',
    ''
  );
	hongo_meta_box_colorpicker( 'hongo_page_title_opacity_color_single',
			esc_html__( 'Opacity color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_page_title_bg_color_single',
			esc_html__( 'Background color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_page_title_color_single',
			esc_html__( 'Title text color', 'hongo-addons' )
		);
	hongo_meta_box_colorpicker( 'hongo_page_subtitle_color_single',
			esc_html__( 'Subtitle text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_enable_subtitle_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-1', 'page-title-style-2','page-title-style-3', 'page-title-style-4','page-title-style-5', 'page-title-style-6', 'page-title-style-7','page-title-style-8'))
		);
  hongo_meta_box_colorpicker( 'hongo_page_subtitle_bg_color_single',
      esc_html__( 'Subtitle text background color', 'hongo-addons' ),
      '',
      array( 'element' => 'hongo_page_title_style_single', 'value' => array('default','page-title-style-5'))
    );
    hongo_meta_box_colorpicker( 'hongo_page_title_breadcrumb_bg_color_single',
        esc_html__( 'Breadcrumb background color', 'hongo-addons' ),
        '',
        array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );
    hongo_meta_box_colorpicker( 'hongo_page_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
    );
	hongo_meta_box_colorpicker( 'hongo_page_title_breadcrumb_color_single',
		esc_html__( 'Breadcrumb text color', 'hongo-addons' ),
        '',
        array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
	);
	hongo_meta_box_colorpicker( 'hongo_page_title_breadcrumb_text_hover_color_single',
		esc_html__( 'Breadcrumb text hover color', 'hongo-addons' ),
        '',
        array( 'element' => 'hongo_page_enable_breadcrumb_single', 'value' => array( 'default', '1' ) )
	);
    hongo_meta_box_colorpicker( 'hongo_page_title_border_color_single',
            esc_html__( 'Border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_title_enable_border_single', 'value' => array('default', '1'))
        );
    hongo_meta_box_colorpicker( 'hongo_page_title_icon_bg_color_single',
            esc_html__( 'Icon background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_page_title_icon_hover_bg_color_single',
            esc_html__( 'Icon hover background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_page_title_icon_color_single',
            esc_html__( 'Icon color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
    hongo_meta_box_colorpicker( 'hongo_page_title_icon_hover_color_single',
            esc_html__( 'Icon Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_page_title_scroll_to_down_single', 'value' => array('default', '1')),
            array( 'parent-element' => 'hongo_page_title_style_single', 'value' => array('default', 'page-title-style-7' ) )
        );
  hongo_before_inner_separator_end(
    'separator_end',
    ''
    );
  hongo_before_main_separator_end(
      'separator_main_end',
      ''
    );
}