<?php
/**
 * WordPress custom install script.
 *
 * Drop-ins are advanced plugins in the wp-content directory that replace WordPress functionality when present.
 *
 *
 */

function wp_install_defaults( $user_id ) {
    global $wpdb, $wp_rewrite, $table_prefix;

    // Default category - rename it to General instead of Uncategorized
    $cat_name = __('General');
    /* translators: Default category slug */
    $cat_slug = sanitize_title( _x( 'General', 'Default category slug' ) );


    if ( global_terms_enabled() ) {
        $cat_id = $wpdb->get_var( $wpdb->prepare( "SELECT cat_ID FROM {$wpdb->sitecategories} WHERE category_nicename = %s", $cat_slug ) );
        if ( $cat_id == null ) {
            $wpdb->insert( $wpdb->sitecategories, array('cat_ID' => 0, 'cat_name' => $cat_name, 'category_nicename' => $cat_slug, 'last_updated' => current_time('mysql', true)) );
            $cat_id = $wpdb->insert_id;
        }
        update_option('default_category', $cat_id);
    } else {
        $cat_id = 1;
    }

    $wpdb->insert( $wpdb->terms, array('term_id' => $cat_id, 'name' => $cat_name, 'slug' => $cat_slug, 'term_group' => 0) );
    $wpdb->insert( $wpdb->term_taxonomy, array('term_id' => $cat_id, 'taxonomy' => 'category', 'description' => '', 'parent' => 0, 'count' => 1));
    $cat_tt_id = $wpdb->insert_id;

    // First post  -  REMOVED
    $now = current_time( 'mysql' );
    $now_gmt = current_time( 'mysql', 1 );
    //    $first_post_guid = get_option( 'home' ) . '/?p=1';
    //
    //    if ( is_multisite() ) {
    //        $first_post = get_site_option( 'first_post' );
    //
    //        if ( ! $first_post ) {
    //            /* translators: %s: site link */
    //            $first_post = __( 'Welcome to %s. This is your first post. Edit or delete it, then start blogging!' );
    //        }
    //
    //        $first_post = sprintf( $first_post,
    //            sprintf( '<a href="%s">%s</a>', esc_url( network_home_url() ), get_network()->site_name )
    //        );
    //
    //        // Back-compat for pre-4.4
    //        $first_post = str_replace( 'SITE_URL', esc_url( network_home_url() ), $first_post );
    //        $first_post = str_replace( 'SITE_NAME', get_network()->site_name, $first_post );
    //    } else {
    //        $first_post = __( 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!' );
    //    }
    //
    //    $wpdb->insert( $wpdb->posts, array(
    //        'post_author' => $user_id,
    //        'post_date' => $now,
    //        'post_date_gmt' => $now_gmt,
    //        'post_content' => $first_post,
    //        'post_excerpt' => '',
    //        'post_title' => __('Hello world!'),
    //        /* translators: Default post slug */
    //        'post_name' => sanitize_title( _x('hello-world', 'Default post slug') ),
    //        'post_modified' => $now,
    //        'post_modified_gmt' => $now_gmt,
    //        'guid' => $first_post_guid,
    //        'comment_count' => 1,
    //        'to_ping' => '',
    //        'pinged' => '',
    //        'post_content_filtered' => ''
    //    ));
    //    $wpdb->insert( $wpdb->term_relationships, array('term_taxonomy_id' => $cat_tt_id, 'object_id' => 1) );

    // Default comment - REMOVED
    //    if ( is_multisite() ) {
    //        $first_comment_author = get_site_option( 'first_comment_author' );
    //        $first_comment_email = get_site_option( 'first_comment_email' );
    //        $first_comment_url = get_site_option( 'first_comment_url', network_home_url() );
    //        $first_comment = get_site_option( 'first_comment' );
    //    }
    //
    //    $first_comment_author = ! empty( $first_comment_author ) ? $first_comment_author : __( 'A WordPress Commenter' );
    //    $first_comment_email = ! empty( $first_comment_email ) ? $first_comment_email : 'wapuu@wordpress.example';
    //    $first_comment_url = ! empty( $first_comment_url ) ? $first_comment_url : 'https://wordpress.org/';
    //    $first_comment = ! empty( $first_comment ) ? $first_comment :  __( 'Hi, this is a comment.
    //To get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.
    //Commenter avatars come from <a href="https://gravatar.com">Gravatar</a>.' );
    //    $wpdb->insert( $wpdb->comments, array(
    //        'comment_post_ID' => 1,
    //        'comment_author' => $first_comment_author,
    //        'comment_author_email' => $first_comment_email,
    //        'comment_author_url' => $first_comment_url,
    //        'comment_date' => $now,
    //        'comment_date_gmt' => $now_gmt,
    //        'comment_content' => $first_comment
    //    ));

    // First Page - Add a blank homepage
    if ( is_multisite() )
        $first_page = get_site_option( 'first_page' );

    $first_page = ! empty( $first_page ) ? $first_page : sprintf( __( "" ), admin_url() );

    $first_post_guid = get_option('home') . '/?page_id=1';
    $wpdb->insert( $wpdb->posts, array(
        'post_author' => $user_id,
        'post_date' => $now,
        'post_date_gmt' => $now_gmt,
        'post_content' => $first_page,
        'post_excerpt' => '',
        'comment_status' => 'closed',
        'post_title' => __( 'Home' ),
        /* translators: Default page slug */
        'post_name' => __( 'Home' ),
        'post_modified' => $now,
        'post_modified_gmt' => $now_gmt,
        'guid' => $first_post_guid,
        'post_type' => 'page',
        'to_ping' => '',
        'pinged' => '',
        'post_content_filtered' => ''
    ));
    $wpdb->insert( $wpdb->postmeta, array( 'post_id' => 1, 'meta_key' => '_wp_page_template', 'meta_value' => 'default' ) );

    // Set up default widgets for default theme.  -  REMOVE (todo: Add footer widgets)
    //    update_option( 'widget_search', array ( 2 => array ( 'title' => '' ), '_multiwidget' => 1 ) );
    //    update_option( 'widget_recent-posts', array ( 2 => array ( 'title' => '', 'number' => 5 ), '_multiwidget' => 1 ) );
    //    update_option( 'widget_recent-comments', array ( 2 => array ( 'title' => '', 'number' => 5 ), '_multiwidget' => 1 ) );
    //    update_option( 'widget_archives', array ( 2 => array ( 'title' => '', 'count' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
    //    update_option( 'widget_categories', array ( 2 => array ( 'title' => '', 'count' => 0, 'hierarchical' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
    //    update_option( 'widget_meta', array ( 2 => array ( 'title' => '' ), '_multiwidget' => 1 ) );
    //    update_option( 'sidebars_widgets', array( 'wp_inactive_widgets' => array(), 'sidebar-1' => array( 0 => 'search-2', 1 => 'recent-posts-2', 2 => 'recent-comments-2', 3 => 'archives-2', 4 => 'categories-2', 5 => 'meta-2' ), 'sidebar-2' => array(), 'sidebar-3' => array(), 'array_version' => 3 ) );
    //    if ( ! is_multisite() )
    //        update_user_meta( $user_id, 'show_welcome_panel', 1 );
    //    elseif ( ! is_super_admin( $user_id ) && ! metadata_exists( 'user', $user_id, 'show_welcome_panel' ) )
    //        update_user_meta( $user_id, 'show_welcome_panel', 2 );
    //
    //    if ( is_multisite() ) {
    //        // Flush rules to pick up the new page.
    //        $wp_rewrite->init();
    //        $wp_rewrite->flush_rules();
    //
    //        $user = new WP_User($user_id);
    //        $wpdb->update( $wpdb->options, array('option_value' => $user->user_email), array('option_name' => 'admin_email') );
    //
    //        // Remove all perms except for the login user.
    //        $wpdb->query( $wpdb->prepare("DELETE FROM $wpdb->usermeta WHERE user_id != %d AND meta_key = %s", $user_id, $table_prefix.'user_level') );
    //        $wpdb->query( $wpdb->prepare("DELETE FROM $wpdb->usermeta WHERE user_id != %d AND meta_key = %s", $user_id, $table_prefix.'capabilities') );
    //
    //        // Delete any caps that snuck into the previously active blog. (Hardcoded to blog 1 for now.) TODO: Get previous_blog_id.
    //        if ( !is_super_admin( $user_id ) && $user_id != 1 )
    //            $wpdb->delete( $wpdb->usermeta, array( 'user_id' => $user_id , 'meta_key' => $wpdb->base_prefix.'1_capabilities' ) );
    //    }


    // Custom Options

    /** Set the tagline to nothing */
    update_option( 'blogdescription', '' );


    /** Allow people to post comments on new articles (this setting may be overridden for individual articles): false */
    update_option( 'default_comment_status', 'closed' );


    /** Disable Pingbacks */
    update_option( 'default_ping_status', 'closed' );
    update_option( 'default_pingback_flag ', 0 );


    /** Media - Don't Organize Uploads by Date */
    update_option('uploads_use_yearmonth_folders',0);


    /** Media - Set all defaults to 0 to prevent multiple images being created.  */
    update_option( 'thumbnail_size_w', 0 ); // Default: 150
    update_option( 'thumbnail_size_h', 0 ); // Default: 150
    update_option( 'medium_size_w', 0 ); // Default: 300
    update_option( 'medium_size_h', 0 ); // Default: 300
    update_option( 'large_size_w', 0 ); // Default: 1024
    update_option( 'large_size_h', 0 ); // Default: 1024


    /** Permalink custom structure: /%postname% */
    update_option( 'permalink_structure', '/%postname%/' );


    /** Set Scout Theme to default */
//    update_option( 'template', 'FlowPress' ); Not working as intended
//    update_option( 'stylesheet', 'FlowPress' );

}