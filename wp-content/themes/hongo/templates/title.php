<?php
/**
 * Title section
 *
 * This template can be overridden by copying it to yourchildtheme/templates/title.php
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

if( is_singular( 'attachment' ) ) {
    return;
}

do_action( 'hongo_page_title_section' );
