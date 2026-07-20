<?php
/**
 * Map For 360 Image view
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* 360 Image view */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__('360 Image View', 'hongo-addons'),
        'description' => esc_html__( '360 degree view of any product', 'hongo-addons' ),
        'icon' => 'hongo-shortcode-icon fa-solid fa-sync-alt',
        'base' => 'hongo_360_image_view',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'hongo_preview_image',
                'param_name' => 'hongo_360_view_preview_image',
                'image_src' => HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE.'/360-view.jpg',
            ),
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Images', 'hongo-addons'),
                'param_name' => 'images_view',
                'holder' => 'div',
                'description' => esc_html__( 'Choose images from media library that all should constitute 360 degree view of your product', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    )
);