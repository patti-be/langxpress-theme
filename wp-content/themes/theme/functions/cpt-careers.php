<?php

// Register Custom Post Type - Careers
function custom_post_type_careers() {

    $labels = array(
        'name'                  => 'Careers',
        'singular_name'         => 'Career',
        'menu_name'             => 'Careers',
        'name_admin_bar'        => 'Careers',
        'archives'              => 'Careers Archives',
        'attributes'            => 'Careers Attributes',
        'parent_item_colon'     => 'Parent Career:',
        'all_items'             => 'All Careers',
        'add_new_item'          => 'Add New Career',
        'add_new'               => 'Add New',
        'new_item'              => 'New Career',
        'edit_item'             => 'Edit Career',
        'update_item'           => 'Update Career',
        'view_item'             => 'View Career',
        'view_items'            => 'View Careers',
        'search_items'          => 'Search Careers',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into Careers',
        'uploaded_to_this_item' => 'Uploaded to this Careers',
        'items_list'            => 'Careers list',
        'items_list_navigation' => 'Careers list navigation',
        'filter_items_list'     => 'Filter Careers list',
    );
    $rewrite = array(
        'slug'                  => 'careers',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'Careers',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'careers', $args );

}
add_action( 'init', 'custom_post_type_careers', 0 );



