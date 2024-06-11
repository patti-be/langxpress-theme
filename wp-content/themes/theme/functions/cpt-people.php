<?php

// Register Custom Post Type - People
function custom_post_type_people() {

    $labels = array(
        'name'                  => 'People',
        'singular_name'         => 'Person',
        'menu_name'             => 'People',
        'name_admin_bar'        => 'People',
        'archives'              => 'People Archives',
        'attributes'            => 'People Attributes',
        'parent_item_colon'     => 'Parent Person:',
        'all_items'             => 'All People',
        'add_new_item'          => 'Add New Person',
        'add_new'               => 'Add New',
        'new_item'              => 'New Person',
        'edit_item'             => 'Edit Person',
        'update_item'           => 'Update Person',
        'view_item'             => 'View Person',
        'view_items'            => 'View People',
        'search_items'          => 'Search People',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into People',
        'uploaded_to_this_item' => 'Uploaded to this People',
        'items_list'            => 'People list',
        'items_list_navigation' => 'People list navigation',
        'filter_items_list'     => 'Filter People list',
    );
    $rewrite = array(
        'slug'                  => 'our-people',
        'with_front'            => false, // Whether the permastruct should be prepended with WP_Rewrite::$front. Default true.
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'People',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'position','filter' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'people', $args );

}
add_action( 'init', 'custom_post_type_people', 0 );


// Register Custom Taxonomy
function custom_taxonomy_position() {

    $labels = array(
        'name'                       => 'Position',
        'singular_name'              => 'Position',
        'menu_name'                  => 'Position',
        'all_items'                  => 'All Position',
        'parent_item'                => 'Parent Position',
        'parent_item_colon'          => 'Parent Position:',
        'new_item_name'              => 'New PositionName',
        'add_new_item'               => 'Add New Position',
        'edit_item'                  => 'Edit Position',
        'update_item'                => 'Update Position',
        'view_item'                  => 'View Position',
        'separate_items_with_commas' => 'Separate Position with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Position',
        'search_items'               => 'Search Position',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No Position',
        'items_list'                 => 'Position list',
        'items_list_navigation'      => 'Position list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true, // True = categories, False = Tags
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => false, // Controls the slugs used for this taxonomy.
    );
    register_taxonomy( 'position', array( 'people' ), $args );

}
add_action( 'init', 'custom_taxonomy_position', 0 );


// Register Custom Taxonomy
function custom_taxonomy_filter() {

    $labels = array(
        'name'                       => 'Filter Category',
        'singular_name'              => 'Filter Category',
        'menu_name'                  => 'Filter Category',
        'all_items'                  => 'All Filter Categories',
        'parent_item'                => 'Parent Filter Category',
        'parent_item_colon'          => 'Parent Filter Category:',
        'new_item_name'              => 'New Filter Category',
        'add_new_item'               => 'Add New Filter Category',
        'edit_item'                  => 'Edit Filter Category',
        'update_item'                => 'Update Filter Category',
        'view_item'                  => 'View Filter Category',
        'separate_items_with_commas' => 'Separate Filter Category with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Filter Category',
        'search_items'               => 'Search Filter Category',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No Filter Category',
        'items_list'                 => 'Filter Category list',
        'items_list_navigation'      => 'Filter Category list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true, // True = categories, False = Tags
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => false, // Controls the slugs used for this taxonomy.
    );
    register_taxonomy( 'filter', array( 'people' ), $args );

}
add_action( 'init', 'custom_taxonomy_filter', 0 );
