<?php

add_action( 'init', 'codex_register_type_init' );
function codex_register_type_init() {
	$lbl_se = array(
		'name'               => _x( 'Services', 'post type general name', 'twentysixteen' ),
		'singular_name'      => _x( 'Services', 'post type singular name', 'twentysixteen' ),
		'menu_name'          => _x( 'Services', 'admin menu', 'twentysixteen' ),
		'name_admin_bar'     => _x( 'Services', 'add new on admin bar', 'twentysixteen' ),
		'add_paw'            => _x( 'Add New', 'Services', 'twentysixteen' ),
		'add_paw_item'       => __( 'Add New Services', 'twentysixteen' ),
		'new_item'           => __( 'New Services', 'twentysixteen' ),
		'edit_item'          => __( 'Edit Services', 'twentysixteen' ),
		'view_item'          => __( 'View Services', 'twentysixteen' ),
		'all_items'          => __( 'All Services', 'twentysixteen' ),
		'search_items'       => __( 'Search Services', 'twentysixteen' ),
		'parent_item_colon'  => __( 'Parent Services:', 'twentysixteen' ),
		'not_found'          => __( 'No Services found.', 'twentysixteen' ),
		'not_found_in_trash' => __( 'No Services found in Trash.', 'twentysixteen' )
	);
	$args_se = array(
		'labels'             => $lbl_se,
		'description'        => __( 'Description.', 'twentysixteen' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => '/', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_casition'      => null,
		'menu_icon'          => __( 'dashicons-portfolio', 'twentysixteen' ),
		'supports'           => array( 'title', 'editor', 'revisions', ),
		//'supports'           => array( 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail' )
	);
	register_post_type( 'services', $args_se );
}