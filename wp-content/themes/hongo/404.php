<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

	// Include the page content template.
	get_template_part( 'templates/page-not-found/content' );

get_footer();
