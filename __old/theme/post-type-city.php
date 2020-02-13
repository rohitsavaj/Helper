<?php
$lbl_city = array(
	'name'               => _x( 'City', 'post type general name', 'dallascarwreck' ),
	'singular_name'      => _x( 'City', 'post type singular name', 'dallascarwreck' ),
	'menu_name'          => _x( 'City', 'admin menu', 'dallascarwreck' ),
	'name_admin_bar'     => _x( 'City', 'add new on admin bar', 'dallascarwreck' ),
	'add_new'            => _x( 'Add New', 'City', 'dallascarwreck' ),
	'add_new_item'       => __( 'Add New City', 'dallascarwreck' ),
	'new_item'           => __( 'New City', 'dallascarwreck' ),
	'edit_item'          => __( 'Edit City', 'dallascarwreck' ),
	'view_item'          => __( 'View City', 'dallascarwreck' ),
	'all_items'          => __( 'All City', 'dallascarwreck' ),
	'search_items'       => __( 'Search City', 'dallascarwreck' ),
	'parent_item_colon'  => __( 'Parent City:', 'dallascarwreck' ),
	'not_found'          => __( 'No City found.', 'dallascarwreck' ),
	'not_found_in_trash' => __( 'No City found in Trash.', 'dallascarwreck' )
);

$args_city = array(
	'labels'             => $lbl_city,
	'description'        => __( 'Description.', 'dallascarwreck' ),
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'city', 'with_front' => false ),
	'capability_type'    => 'post',
	'has_archive'        => false,
	'hierarchical'       => true,
	'menu_position'      => null,
	'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
	'menu_icon'          => __( 'dashicons-store', 'dallascarwreck' ),
);

register_post_type( 'city', $args_city );

$lbl_cities = array(
	'name'              => _x( 'Cities', 'taxonomy general name', 'dallascarwreck' ),
	'singular_name'     => _x( 'Cities', 'taxonomy singular name', 'dallascarwreck' ),
	'search_items'      => __( 'Search Cities', 'dallascarwreck' ),
	'all_items'         => __( 'All Cities', 'dallascarwreck' ),
	'parent_item'       => __( 'Parent Cities', 'dallascarwreck' ),
	'parent_item_colon' => __( 'Parent Cities:', 'dallascarwreck' ),
	'edit_item'         => __( 'Edit Cities', 'dallascarwreck' ),
	'update_item'       => __( 'Update Cities', 'dallascarwreck' ),
	'add_new_item'      => __( 'Add New Cities', 'dallascarwreck' ),
	'new_item_name'     => __( 'New Cities Name', 'dallascarwreck' ),
	'menu_name'         => __( 'Cities', 'dallascarwreck' ),
);

$args_cities = array(
	'hierarchical'      => true,
	'public'            => false,
	'labels'            => $lbl_cities,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'cities' ),
);

register_taxonomy( 'cities', array( 'city' ), $args_cities );
?>