<?php

// Register Custom Post Type - Work Fields
function custom_post_type_workfields()
{

    $labels = array(
        'name'                  => 'Work Fields',
        'singular_name'         => 'Work Fields',
        'menu_name'             => 'Work Fields',
        'name_admin_bar'        => 'Work Fields',
        'archives'              => 'Work Fields Archives',
        'attributes'            => 'Work Fields Attributes',
        'parent_item_colon'     => 'Parent Work Field:',
        'all_items'             => 'All Work Fields',
        'add_new_item'          => 'Add New Work Field',
        'add_new'               => 'Add New',
        'new_item'              => 'New Work Field',
        'edit_item'             => 'Edit Work Field',
        'update_item'           => 'Update Work Field',
        'view_item'             => 'View Work Field',
        'view_items'            => 'View Work Fields',
        'search_items'          => 'Search Work Fields',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into Work Fields',
        'uploaded_to_this_item' => 'Uploaded to this Work Fields',
        'items_list'            => 'Work Fields list',
        'items_list_navigation' => 'Work Fields list navigation',
        'filter_items_list'     => 'Filter Work Fields list',
    );
    $rewrite = array(
        'slug'                  => 'fields',
        'with_front'            => false, // Whether the permastruct should be prepended with WP_Rewrite::$front. Default true.
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'Work Fields',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('position'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );
    register_post_type('Work Fields', $args);
}
add_action('init', 'custom_post_type_workfields', 0);
