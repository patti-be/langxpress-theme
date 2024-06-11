<?php

// Register Custom Post Type - Projects
function custom_post_type_project() {

    $labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'menu_name'             => 'Projects',
        'name_admin_bar'        => 'Projects',
        'archives'              => 'Project Archives',
        'attributes'            => 'Project Attributes',
        'parent_item_colon'     => 'Parent Project:',
        'all_items'             => 'All Projects',
        'add_new_item'          => 'Add New Project',
        'add_new'               => 'Add New',
        'new_item'              => 'New Project',
        'edit_item'             => 'Edit Project',
        'update_item'           => 'Update Project',
        'view_item'             => 'View Project',
        'view_items'            => 'View Project',
        'search_items'          => 'Search Project',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into Project',
        'uploaded_to_this_item' => 'Uploaded to this Project',
        'items_list'            => 'Projects list',
        'items_list_navigation' => 'Projects list navigation',
        'filter_items_list'     => 'Filter Projects list',
    );
    $rewrite = array(
        'slug'                  => 'projects',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'Project',
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
        'publicly_queryable'    => false, // Set to false to hide ctp from from end (ie hide single and archive page)
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'project', $args );

}
add_action( 'init', 'custom_post_type_project', 0 );


// Register Custom Taxonomy
//function custom_taxonomy_expertise() {
//
//    $labels = array(
//        'name'                       => 'Expertise',
//        'singular_name'              => 'Expertise',
//        'menu_name'                  => 'Expertise',
//        'all_items'                  => 'All Expertise',
//        'parent_item'                => 'Parent Expertise',
//        'parent_item_colon'          => 'Parent Expertise:',
//        'new_item_name'              => 'New ExpertiseName',
//        'add_new_item'               => 'Add New Expertise',
//        'edit_item'                  => 'Edit Expertise',
//        'update_item'                => 'Update Expertise',
//        'view_item'                  => 'View Expertise',
//        'separate_items_with_commas' => 'Separate Expertise with commas',
//        'add_or_remove_items'        => 'Add or remove items',
//        'choose_from_most_used'      => 'Choose from the most used',
//        'popular_items'              => 'Popular Expertise',
//        'search_items'               => 'Search Expertise',
//        'not_found'                  => 'Not Found',
//        'no_terms'                   => 'No Expertise',
//        'items_list'                 => 'Expertise list',
//        'items_list_navigation'      => 'Expertise list navigation',
//    );
//    $args = array(
//        'labels'                     => $labels,
//        'hierarchical'               => false,
//        'public'                     => true,
//        'show_ui'                    => true,
//        'show_admin_column'          => true,
//        'show_in_nav_menus'          => true,
//        'show_tagcloud'              => false,
//        'rewrite' => array(
//            'slug' => 'expertise',
//            'with_front' => false
//        ),
//    );
//    register_taxonomy( 'expertise', array( 'project' ), $args );
//
//}
//add_action( 'init', 'custom_taxonomy_expertise', 0 );


// Register Custom Taxonomy
function custom_taxonomy_Sector() {

    $labels = array(
        'name'                       => 'Sector',
        'singular_name'              => 'Sector',
        'menu_name'                  => 'Sector',
        'all_items'                  => 'All Sector',
        'parent_item'                => 'Parent Sector',
        'parent_item_colon'          => 'Parent Sector:',
        'new_item_name'              => 'New SectorName',
        'add_new_item'               => 'Add New Sector',
        'edit_item'                  => 'Edit Sector',
        'update_item'                => 'Update Sector',
        'view_item'                  => 'View Sector',
        'separate_items_with_commas' => 'Separate Sector with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Sector',
        'search_items'               => 'Search Sector',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No Sector',
        'items_list'                 => 'Sector list',
        'items_list_navigation'      => 'Sector list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => false,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true
    );
    register_taxonomy( 'sector', array( 'project', 'partner'), $args );

}
add_action( 'init', 'custom_taxonomy_Sector', 0 );


