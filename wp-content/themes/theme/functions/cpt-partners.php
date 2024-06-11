<?php

// Register Custom Post Type - Partners
function custom_post_type_partner() {

    $labels = array(
        'name'                  => 'Partners',
        'singular_name'         => 'Partner',
        'menu_name'             => 'Partners',
        'name_admin_bar'        => 'Partners',
        'archives'              => 'Partner Archives',
        'attributes'            => 'Partner Attributes',
        'parent_item_colon'     => 'Parent Partner:',
        'all_items'             => 'All Partners',
        'add_new_item'          => 'Add New Partner',
        'add_new'               => 'Add New',
        'new_item'              => 'New Partner',
        'edit_item'             => 'Edit Partner',
        'update_item'           => 'Update Partner',
        'view_item'             => 'View Partner',
        'view_items'            => 'View Partner',
        'search_items'          => 'Search Partner',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into Partner',
        'uploaded_to_this_item' => 'Uploaded to this Partner',
        'items_list'            => 'Partners list',
        'items_list_navigation' => 'Partners list navigation',
        'filter_items_list'     => 'Filter Partners list',
    );
    $rewrite = array(
        'slug'                  => 'partners-projects',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'Partner',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'sector' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-post',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true, // Set to false to hide ctp from from end (ie hide single and archive page)
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'partner', $args );

}
add_action( 'init', 'custom_post_type_partner', 0 );

