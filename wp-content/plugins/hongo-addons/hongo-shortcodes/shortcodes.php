<?php
class Hongo_Require_Shortcode_Files {

    /*
     * Includes all (require_once) php file(s) inside selected folder using class.
     */
    public function __construct() {
        $filename_array = array(
            'row',
            'inner-row',
            'column',
            'text-block',
            'tab',
            'accordian',
            'alert-message',
            'blockquote',
            'blog',
            'button',
            'call-to-action',
            'client-image-slider',
            'counter',
            'feature-product-box',
            'image-carousel',
            'image-gallery',
            'instagram',
            'lists',
            'newsletter',
            'popup',
            'progressbar',
            'product-brand',
            'section-heading',
            'separator',
            'social',
            'content-block',
            'team-member',
            'team-carousel',
            'timer',
            'table-pricing',
            'testimonial',
            'testimonial-slider',
            'video',
            'text-slider',
            '360-image-view',
            'gmap',
            'single-image'
        );

        // Include all smart sections shortcodes files
        $smart_section_files = array(
            'navigation-menu',
            'navigation-links',
            'left-menu',
            'hamburger-menu',
            'logo',
            'single-image',
            'header-with-push',
            'widgtes-sidebar',
            'product-search',
            'newsletter-popup',
            'section-feature-product-box'
        );

        if ( hongo_is_woocommerce_activated() ) {
            $newfilename_array = array(
                'shop-banner',
                'shop-grid',
                'shop-slider',
                'product-slider',
                'product-lists',
                'product-category',
                'product-brand-carousel',
                'image-hotspot'
            );

            $filename_array = array_merge($filename_array,$newfilename_array);
        }

        $filename_array = apply_filters( 'hongo_include_shortcode_files', $filename_array );

        $this->Theme_Require_Shortcode_File( HONGO_SHORTCODE_ADDONS_SHORTCODE_URI, $filename_array );
        $this->Theme_Require_Smart_Shortcode_File( HONGO_SHORTCODE_ADDONS_SHORTCODE_URI, $smart_section_files );
    }

    public function Theme_Require_Shortcode_File( $path, $fileName ) {

        if( is_array( $fileName ) ) {
            foreach($fileName as $name)
            {
                require_once($path.'/hongo-shortcode-'.$name.'.php');
            }
        }
        else {
            throw new Exception('File is not found in folder as you given');
        }
    }

    public function Theme_Require_Smart_Shortcode_File( $path, $fileName ) {

        if( is_array( $fileName ) ) {
            foreach( $fileName as $name ) {
                require_once($path.'/smart-sections/hongo-shortcode-'.$name.'.php');
            }
        }
        else {
            throw new Exception('File is not found in folder as you given');
        }
    }

}
$Hongo_Require_Shortcode_Files = new Hongo_Require_Shortcode_Files();