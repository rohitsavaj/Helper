<?php

add_action( 'init', 'codex_register_type_init' );
function codex_register_type_init() {
	$lbl_at = array(
		'name'               => _x( 'Attorney', 'post type general name', 'law-ohio' ),
		'singular_name'      => _x( 'Attorney', 'post type singular name', 'law-ohio' ),
		'menu_name'          => _x( 'Attorney', 'admin menu', 'law-ohio' ),
		'name_admin_bar'     => _x( 'Attorney', 'add new on admin bar', 'law-ohio' ),
		'add_paw'            => _x( 'Add New', 'Attorney', 'law-ohio' ),
		'add_paw_item'       => __( 'Add New Attorney', 'law-ohio' ),
		'new_item'           => __( 'New Attorney', 'law-ohio' ),
		'edit_item'          => __( 'Edit Attorney', 'law-ohio' ),
		'view_item'          => __( 'View Attorney', 'law-ohio' ),
		'all_items'          => __( 'All Attorney', 'law-ohio' ),
		'search_items'       => __( 'Search Attorney', 'law-ohio' ),
		'parent_item_colon'  => __( 'Parent Attorney:', 'law-ohio' ),
		'not_found'          => __( 'No Attorney found.', 'law-ohio' ),
		'not_found_in_trash' => __( 'No Attorney found in Trash.', 'law-ohio' )
	);
	$args_at = array(
		'labels'             => $lbl_at,
		'description'        => __( 'Description.', 'law-ohio' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'practicearea', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_casition'      => null,
		'menu_icon'          => __( 'dashicons-portfolio', 'law-ohio' ),
		'supports'           => array( 'title', 'editor', 'revisions', 'thumbnail' ),
		//'supports'           => array( 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail' )
	);
	register_post_type( 'practicearea', $args_at );
}