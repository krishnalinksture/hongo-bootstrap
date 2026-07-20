<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    // Global page template functions
    require get_parent_theme_file_path( "/lib/woocommerce/template-functions/hongo-global-page-template-functions.php" );

    // Archive page template functions
    require get_parent_theme_file_path( "/lib/woocommerce/template-functions/hongo-archive-page-template-functions.php" );

    // Single product page template functions
    require get_parent_theme_file_path( "/lib/woocommerce/template-functions/hongo-single-page-template-functions.php" );
}
