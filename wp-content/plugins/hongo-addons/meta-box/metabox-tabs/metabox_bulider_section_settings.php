<?php
/**
 * Metabox For Section Settings.
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$section_type       = hongo_addons_get_header_type_by_key();
$section_sticky_type= hongo_addons_get_header_sticky_type_by_key();

/* Section Settings */
hongo_meta_box_separator(
    'hongo_mini_header_color',
    esc_html__( 'General Settings', 'hongo-addons' ),
    esc_html__( 'Please select section type like header, footer, mega menu, etc... and then assign it at Appearance > Customize > Header and Footer.', 'hongo-addons' ) . ' <a href="' . HONGO_ADDONS_DEMO_URI . 'documentation/what-is-hongo-section-builder/?category=header" target="_blank">' . esc_html__( 'Click here', 'hongo-addons' ) . '</a> ' . esc_html__( 'for more information.', 'hongo-addons' ) . ''
);
hongo_meta_box_dropdown( 'hongo_builder_section_type',
    esc_html__( 'Section type', 'hongo-addons' ),
    $section_type,
    ''
);

hongo_meta_box_dropdown( 'hongo_header_sticky_type',
    esc_html__( 'Sticky type', 'hongo-addons' ),
    $section_sticky_type,
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header', 'top-header', 'header' ) )
);

hongo_meta_box_dropdown( 'hongo_footer_sticky_type',
    esc_html__( 'Sticky type', 'hongo-addons' ),
    array(
            ''              => esc_html__( 'Select','hongo-addons' ),
            'sticky'        => esc_html__( 'Sticky footer','hongo-addons' ),
            'non-sticky'    => esc_html__( 'Non sticky footer','hongo-addons' ),
        ),
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
);

hongo_meta_box_dropdown( 'hongo_footer_style',
    esc_html__( 'Style', 'hongo-addons' ),
    array(
            ''             => esc_html__( 'Select', 'hongo-addons' ),
            'dark-style'   => esc_html__( 'Dark style', 'hongo-addons' ),
            'light-style'  => esc_html__( 'Light style', 'hongo-addons' ),
        ),
    esc_html__( 'You will choose footer style of section', 'hongo-addons' ),
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
);

/* Mini Header Settings */
hongo_meta_box_separator(
    'hongo_mini_header_color',
    esc_html__( 'Mini Header Settings', 'hongo-addons' ),
    '',
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
);
hongo_after_main_separator_start(
    'separator_main_start',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
);
    // Mini Header Font and Color
    hongo_meta_box_separator(
        'hongo_mini_header_title_color',
        esc_html__( 'Content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_mini_header_bg',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_mini_header_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_text_hover_bg_color',
            esc_html__( 'Hover background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_text( 'hongo_mini_header_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_text( 'hongo_mini_header_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_text( 'hongo_mini_header_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_dropdown('hongo_mini_header_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_cart_bg_color',
            esc_html__( 'Cart / Wishlist number background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_cart_text_color',
            esc_html__( 'Cart / Wishlist number color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );

    // Sticky Mini Header Font and Color
    hongo_meta_box_separator(
        'hongo_sticky_mini_header_color',
        esc_html__( 'Sticky content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_mini_header_sticky_bg',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_sticky_mini_header_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_mini_header_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_mini_header_text_hover_bg_color',
            esc_html__( 'Hover background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_mini_header_cart_bg_color',
            esc_html__( 'Cart / Wishlist number background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_mini_header_cart_text_color',
            esc_html__( 'Cart / Wishlist number color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );

    // Mini Header Submenu Font and Color
    hongo_meta_box_separator(
        'hongo_mini_header_submenu_color',
        esc_html__( 'Submenu color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );  
        hongo_meta_box_colorpicker( 'hongo_mini_header_submenu_bg_color',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_mini_header_submenu_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_submenu_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_text( 'hongo_mini_header_submenu_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_text( 'hongo_mini_header_submenu_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_text( 'hongo_mini_header_submenu_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_dropdown('hongo_mini_header_submenu_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );

    // Mini Header Mobile Menu Color
    hongo_meta_box_separator(
        'hongo_mini_header_mobile_color',
        esc_html__( 'Mobile menu color', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );  
        hongo_meta_box_colorpicker( 'hongo_mini_header_mobile_menu_bg_color',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_mobile_menu_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_mini_header_mobile_menu_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
    );
hongo_before_main_separator_end(
    'separator_main_end',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'mini-header' ) )
);

/* Top Header Settings */
hongo_meta_box_separator(
    'hongo_top_header_color',
    esc_html__( 'Top Header Settings', 'hongo-addons' ),
    '',
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
);
hongo_after_main_separator_start(
    'separator_main_start',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
);
    // Top Header Font and Color
    hongo_meta_box_separator(
        'hongo_top_header__title_color',
        esc_html__( 'Content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_top_header_bg',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_top_header_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_top_header_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_text( 'hongo_top_header_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_text( 'hongo_top_header_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_text( 'hongo_top_header_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_dropdown('hongo_top_header_text_transform',
            esc_html__('Text transform', 'hongo-addons'),
            array('' => esc_html__('Default', 'hongo-addons'),
                  'uppercase' => esc_html__('Uppercase', 'hongo-addons'),
                  'lowercase' => esc_html__('Lowercase', 'hongo-addons'),
                  'capitalize' => esc_html__('Capitalize', 'hongo-addons'),
                  'none' => esc_html__('None', 'hongo-addons'),
                 ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_top_header_cart_bg_color',
            esc_html__( 'Cart / Wishlist number background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_top_header_cart_text_color',
            esc_html__( 'Cart / Wishlist number color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );

    // Sticky Top Header Font and Color
    hongo_meta_box_separator(
        'hongo_sticky_top_header_color',
        esc_html__( 'Sticky content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_top_header_sticky_bg',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_sticky_top_header_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_top_header_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_top_header_cart_bg_color',
            esc_html__( 'Cart / Wishlist number background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_top_header_cart_text_color',
            esc_html__( 'Cart / Wishlist number color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );

    // Top Header Submenu Font and Color
    hongo_meta_box_separator(
        'hongo_top_header_submenu_color',
        esc_html__( 'Submenu color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );  

        hongo_meta_box_colorpicker( 'hongo_top_header_submenu_bg_color',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_top_header_submenu_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_top_header_submenu_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_text( 'hongo_top_header_submenu_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_text( 'hongo_top_header_submenu_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_text( 'hongo_top_header_submenu_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

        hongo_meta_box_dropdown('hongo_top_header_submenu_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
        );

    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
    );
hongo_before_main_separator_end(
    'separator_main_end',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'top-header' ) )
);

/* Header settings*/
hongo_meta_box_separator(
    'hongo_header_color',
    esc_html__( 'Header Settings', 'hongo-addons' ),
    '',
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
);
hongo_after_main_separator_start(
    'separator_main_start',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
);
    // Header Font and Color
    hongo_meta_box_separator(
        'hongo_header_color_title',
        esc_html__( 'Content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_header_bg',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_header_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_dropdown('hongo_header_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_menu_icon_font_size',
            esc_html__( 'Menu icon font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_icon_font_size',
            esc_html__( 'Header icon font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_icon_line_height',
            esc_html__( 'Header icon line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_cart_bg_color',
            esc_html__( 'Cart / Wishlist number background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_cart_text_color',
            esc_html__( 'Cart / Wishlist number color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_dropdown( 'hongo_header_box_shadow_enable',
            esc_html__( 'Bottom border', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                '1' => esc_html__( 'On', 'hongo-addons' ),
                '0' => esc_html__( 'Off', 'hongo-addons' )
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_header_box_shadow_color',
            esc_html__( 'Bottom border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );

    // Sticky Header Font and Color
    hongo_meta_box_separator(
        'hongo_sticky_header_color',
        esc_html__( 'Sticky content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_header_sticky_bg',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_sticky_header_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_header_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_sticky_header_icon_font_size',
            esc_html__( 'Header icon font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_sticky_header_icon_line_height',
            esc_html__( 'Header icon line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_header_cart_bg_color',
            esc_html__( 'Cart / Wishlist number background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_sticky_header_cart_text_color',
            esc_html__( 'Cart / Wishlist number color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_dropdown( 'hongo_sticky_header_box_shadow_enable',
            esc_html__( 'Bottom border', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                '1' => esc_html__( 'On', 'hongo-addons' ),
                '0' => esc_html__( 'Off', 'hongo-addons' )
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
        hongo_meta_box_colorpicker( 'hongo_sticky_header_box_shadow_color',
            esc_html__( 'Bottom border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );

    // Header Submenu Font and Color
    hongo_meta_box_separator(
        'hongo_header_submenu_color',
        esc_html__( 'Submenu color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );

        hongo_meta_box_colorpicker( 'hongo_header_submenu_bg_color',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_submenu_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_submenu_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_dropdown('hongo_header_submenu_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_dropdown('hongo_header_submenu_font_weight',
            esc_html__( 'Font weight', 'hongo-addons' ),
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
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
        
        hongo_meta_box_text( 'hongo_header_submenu_icon_font_size',
            esc_html__( 'Submenu icon font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );

    // Header Submenu Heading Font and Color
    hongo_meta_box_separator(
        'hongo_header_submenu_heading_color',
        esc_html__( 'Submenu heading color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_header_submenu_heading_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_submenu_heading_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_heading_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_heading_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_heading_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_dropdown('hongo_header_submenu_heading_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_text( 'hongo_header_submenu_heading_icon_font_size',
            esc_html__( 'Heading icon font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );

    // Header Mobile Menu Color
    hongo_meta_box_separator(
        'hongo_header_mobile_color',
        esc_html__( 'Mobile menu color', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
        
        hongo_meta_box_text( 'hongo_header_mobile_menu_breakpoint',
            esc_html__( 'Breakpoint', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 991', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_mobile_menu_bg_color',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_mobile_menu_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_header_mobile_menu_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
    );
hongo_before_main_separator_end(
    'separator_main_end',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'header' ) )
);

/* Mega menu settings */
hongo_meta_box_separator(
    'hongo_megamenu_color',
    esc_html__( 'Megamenu Settings', 'hongo-addons' ),
    esc_html__( 'This settings only for shop category megamenu', 'hongo-addons' ),
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
);
hongo_after_main_separator_start(
    'separator_main_start',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
);  
    hongo_meta_box_separator(
        'hongo_megamenu_bg_settings',
        esc_html__( 'Background', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
    );  
        hongo_meta_box_colorpicker( 'hongo_megamenu_background_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
        );
        hongo_meta_box_upload( 'hongo_megamenu_background_image', 
            esc_html__('Image', 'hongo-addons'),
            esc_html__('Recommended image size is 1920px X 700px.', 'hongo-addons'),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
        );
        hongo_meta_box_dropdown('hongo_megamenu_background_image_position',
            esc_html__('Image position', 'hongo-addons'),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'bg-position-left-top' => esc_html__( 'Left Top', 'hongo-addons' ),
                'bg-position-left-center' => esc_html__( 'Left Middle', 'hongo-addons' ),
                'bg-position-left-bottom' => esc_html__( 'Left Bottom', 'hongo-addons' ),
                'bg-position-center-top' => esc_html__( 'Center Top', 'hongo-addons' ),
                'bg-position-center-center' => esc_html__( 'Center Middle', 'hongo-addons' ),
                'bg-position-center-bottom' => esc_html__( 'Center Bottom', 'hongo-addons' ),
                'bg-position-right-top' => esc_html__( 'Right Top', 'hongo-addons' ),
                'bg-position-right-center' => esc_html__( 'Right Middle', 'hongo-addons' ),
                'bg-position-right-bottom' => esc_html__( 'Right Bottom', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
    );
hongo_before_main_separator_end(
    'separator_main_end',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'megamenu' ) )
);

/* Promo Popup settings */
hongo_meta_box_separator(
    'hongo_megamenu_color',
    esc_html__( 'Promo Popup Settings', 'hongo-addons' ),
    '',
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
);
hongo_after_main_separator_start(
    'separator_main_start',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
);  
    hongo_meta_box_separator(
        'hongo_megamenu_bg_settings',
        esc_html__( 'General settings', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
    );          
        hongo_meta_box_dropdown('hongo_display_promo_popup_after',
            esc_html__( 'Display popup after', 'hongo-addons' ),
            array(  
                ''  => esc_html__( 'Select', 'hongo-addons' ),
                'some-time' => esc_html__( 'Some Time', 'hongo-addons' ),
                'User-scroll' => esc_html__( 'User Scroll', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
        );
        hongo_meta_box_text( 'hongo_delay_time_promo_popup',
            esc_html__( 'Delay time', 'hongo-addons' ),
            esc_html__( 'Show popup after some time (in milliseconds)', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
        );
        hongo_meta_box_text( 'hongo_scroll_promo_popup',
            esc_html__( 'Scroll pixels', 'hongo-addons' ),
            esc_html__( 'Number of pixels to scroll down', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
        );
        hongo_meta_box_text( 'hongo_promo_popup_cokkie_expire',
            esc_html__( 'Re-open popup after (in days)', 'hongo-addons' ),
            esc_html__( 'By default popup will display again after 7 days', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
        );
        hongo_meta_box_dropdown('hongo_enable_mobile_promo_popup',
            esc_html__( 'Display in mobile', 'hongo-addons' ),
            array(
                ''  => esc_html__( 'Select', 'hongo-addons' ),
                '0' => esc_html__( 'On', 'hongo-addons' ),
                '1' => esc_html__( 'Off', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
    );
hongo_before_main_separator_end(
    'separator_main_end',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'promopopup' ) )
);

/* Footer Settings */
hongo_meta_box_separator(
    'hongo_footer_settings',
    esc_html__( 'Footer Settings', 'hongo-addons' ),
    '',
    '',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
);
hongo_after_main_separator_start(
    'separator_main_start',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
);

    // Footer Widget Title Font and Color
    hongo_meta_box_separator(
        'hongo_footer_color_setting',
        esc_html__( 'Widget title color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_footer_widget_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_text( 'hongo_footer_widget_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_text( 'hongo_footer_widget_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_text( 'hongo_footer_widget_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_dropdown('hongo_footer_widget_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );

    // Footer Font and Color
    hongo_meta_box_separator(
        'hongo_footer_color_setting',
        esc_html__( 'Content color and size', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );
        hongo_meta_box_colorpicker( 'hongo_footer_text_color',
            esc_html__( 'Color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_footer_text_hover_color',
            esc_html__( 'Hover color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_text( 'hongo_footer_font_size',
            esc_html__( 'Font size', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_text( 'hongo_footer_line_height',
            esc_html__( 'Line height', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 10px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_text( 'hongo_footer_letter_spacing',
            esc_html__( 'Letter spacing', 'hongo-addons' ),
            '',
            esc_html__( 'Enter value in pixel like 1px', 'hongo-addons' ),
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_dropdown('hongo_footer_text_transform',
            esc_html__( 'Text case', 'hongo-addons' ),
            array(
                '' => esc_html__( 'Default', 'hongo-addons' ),
                'uppercase' => esc_html__( 'Uppercase', 'hongo-addons' ),
                'lowercase' => esc_html__( 'Lowercase', 'hongo-addons' ),
                'capitalize' => esc_html__( 'Capitalize', 'hongo-addons' ),
                'none' => esc_html__( 'None', 'hongo-addons' ),
            ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );
    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );

    // Footer Newsletter Font and Color
    hongo_meta_box_separator(
        'hongo_footer_newsletter_color_setting',
        esc_html__( 'Newsletter font and color', 'hongo-addons' ),
        '',
        '',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );
    hongo_after_inner_separator_start(
        'separator_start',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );  

        hongo_meta_box_colorpicker( 'hongo_footer_newsletter_background_color',
            esc_html__( 'Background color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_footer_newsletter_border_color',
            esc_html__( 'Border color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_footer_newsletter_place_text_color',
            esc_html__( 'Input placeholder color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_footer_newsletter_text_color',
            esc_html__( 'Input text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer') )
        );

        hongo_meta_box_colorpicker( 'hongo_footer_newsletter_button_text_color',
            esc_html__( 'Button text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

        hongo_meta_box_colorpicker( 'hongo_footer_newsletter_button_hover_color',
            esc_html__( 'Button hover text color', 'hongo-addons' ),
            '',
            array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
        );

    hongo_before_inner_separator_end(
        'separator_end',
        array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
    );

hongo_before_main_separator_end(
    'separator_main_end',
    array( 'element' => 'hongo_builder_section_type', 'value' => array( 'footer' ) )
);