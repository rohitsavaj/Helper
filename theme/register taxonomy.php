<?php

add_action('init', 'codex_register_type_init', 0);
function codex_register_type_init()
{
    $lbl_mcat = array(
        'name' => _x('Categories', 'taxonomy general name', 'harriskaufman'),
        'singular_name'     => _x('Categories', 'taxonomy singular name', 'harriskaufman'),
        'search_items'      => __('Search Categories', 'harriskaufman'),
        'all_items'         => __('All Categories', 'harriskaufman'),
        'parent_item'       => __('Parent Categories', 'harriskaufman'),
        'parent_item_colon' => __('Parent Categories:', 'harriskaufman'),
        'edit_item'         => __('Edit Categories', 'harriskaufman'),
        'update_item'       => __('Update Categories', 'harriskaufman'),
        'add_new_item'      => __('Add New Categories', 'harriskaufman'),
        'new_item_name'     => __('New Categories Name', 'harriskaufman'),
        'menu_name'         => __('Categories', 'harriskaufman'),
    );

    $arg_mcat = array(
        'hierarchical'      => true,
        'labels'            => $lbl_mcat,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'practice_category'),
    );

    register_taxonomy('practice_category', array('practicearea'), $arg_mcat);
}