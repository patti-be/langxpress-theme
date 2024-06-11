<?php

// Register Custom Post Type - History
function custom_post_type_history() {

    $labels = array(
        'name'                  => 'History',
        'singular_name'         => 'History',
        'menu_name'             => 'History',
        'name_admin_bar'        => 'History',
        'archives'              => 'History Archives',
        'attributes'            => 'History Attributes',
        'parent_item_colon'     => 'Parent Year:',
        'all_items'             => 'All History',
        'add_new_item'          => 'Add New Year',
        'add_new'               => 'Add New',
        'new_item'              => 'New Year',
        'edit_item'             => 'Edit Year',
        'update_item'           => 'Update Year',
        'view_item'             => 'View Year',
        'view_items'            => 'View History',
        'search_items'          => 'Search History',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into History',
        'uploaded_to_this_item' => 'Uploaded to this History',
        'items_list'            => 'History list',
        'items_list_navigation' => 'History list navigation',
        'filter_items_list'     => 'Filter History list',
    );
    $rewrite = array(
        'slug'                  => 'history',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'History',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-backup',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'history', $args );

}
add_action( 'init', 'custom_post_type_history', 0 );




