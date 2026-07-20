<?php
/**
 * The template for displaying search pages
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

	// Include the search layout template.
	get_template_part( 'templates/archive/layout' );

get_footer();
