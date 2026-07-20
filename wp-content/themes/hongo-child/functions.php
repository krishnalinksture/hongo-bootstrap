<?php
/**
 *
 * [Parent Theme] child theme functions and definitions
 * 
 * @package [Parent Theme]
 * @author  Themezaa <info@themezaa.com>
 * 
 */

if ( ! function_exists( 'hongo_child_style' ) ) :
	function hongo_child_style() {
	    wp_enqueue_style( 'hongo-parent-style', get_template_directory_uri(). '/style.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'hongo_child_style', 11 );