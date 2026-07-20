<?php
/**
 * Register Custom Post Type Builder.
 *
 * @package Hongo
 */
?>
<?php
/**
 * Builder custom post type
 */

$labels = array(
	'name'               => _x( 'Section Builder', 'Section', 'hongo-addons' ),
	'singular_name'      => _x( 'Section Builder', 'Section', 'hongo-addons' ),
	'add_new'            => _x( 'Add New', 'Section', 'hongo-addons' ),
	'add_new_item'       => __( 'Add New Section', 'hongo-addons' ),
	'edit_item'          => __( 'Edit Section', 'hongo-addons' ),
	'new_item'           => __( 'New Section', 'hongo-addons' ),
	'all_items'          => __( 'All Sections', 'hongo-addons' ),
	'view_item'          => __( 'View Section', 'hongo-addons' ),
	'search_items'       => __( 'Search Sections', 'hongo-addons' ),
	'not_found'          => __( 'No Sections found', 'hongo-addons' ),
	'not_found_in_trash' => __( 'No Sections found in the Trash', 'hongo-addons' ),
	'menu_name'          => __( 'Section Builder', 'hongo-addons' )
);
$args = array(
    'labels'             => $labels,
	'public'             => true,
	'publicly_queryable' => false,
	'query_var'          => false,
	'exclude_from_search'=> true,
	'capability_type'    => 'post',
	'has_archive'   	 => apply_filters( 'hongo_section_builder_has_archive', false ),
	'hierarchical'       => false,
	'rewrite'			 => array( 'with_front' => false ),
	'menu_position'      => 75,
	'menu_icon'     	 => 'dashicons-editor-kitchensink',
	'supports'           => array( 'title', 'editor', 'revisions' ), //editor, thumbnail, title, author, excerpt, trackpacks, custom-fields, comments, revisions, page-attributes, post-formats
);

register_post_type( 'hongobuilder', $args );