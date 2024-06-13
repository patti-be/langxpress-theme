<?php



/**
 * Theme setup
 */

function setup()
{

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
        'primary_navigation' => 'Primary Navigation',
        'footer_navigation' => 'Footer Navigation',
    ]);

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');


    // Enable post thumbnails (ie. The feature image)
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable post formats
    // http://codex.wordpress.org/Post_Formats
    //add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    // Enable HTML5 markup support (forms)
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    //add_editor_style( 'dist/css/styles.css');


    // CLEAN UP THE HEADER
    // http://cubiq.org/clean-up-and-optimize-wordpress-for-your-next-theme

    // Remove WP Emojies
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    // In admin
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');


    // Remove the “generator” meta tag from the document header
    remove_action('wp_head', 'wp_generator');


    // Remove Weblog client link
    remove_action('wp_head', 'rsd_link');


    // Remove Windows Live Writer Manifest Link
    remove_action('wp_head', 'wlwmanifest_link');

    // “wp_shortlink_wp_head” adds a “shortlink” into your document head that will look like http://example.com/?p=ID. No need, thanks.
    remove_action('wp_head', 'wp_shortlink_wp_head');

    // Removes a link to the next and previous post from the document header.
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
}
add_action('after_setup_theme', 'setup');



/**
 * Theme assets
 */
function assets()
{

    // STYLES
    // (these will be combined and minified with a plugin)
    wp_enqueue_style('normalize_css', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style('components_css', get_template_directory_uri() . '/assets/css/components.css');
    wp_enqueue_style('theme_css', get_template_directory_uri() . '/assets/css/langxpress.css');
    wp_enqueue_style('extra_css', get_template_directory_uri() . '/assets/css/extra.css');
    wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');



    // SCRIPTS

    // Update Jquery - https://nimblewebdeveloper.com/blog/use-modern-jquery-in-wordpress Use modern locally
    global $wp_scripts;
    if (!is_admin()) {
        $wp_scripts->registered['jquery-core']->src = get_stylesheet_directory_uri() . '/assets/js/jquery-3.5.1.min.js';
        $wp_scripts->registered['jquery']->deps = ['jquery-core'];
    }

    wp_enqueue_script('extra_js', get_template_directory_uri() . '/assets/js/extra.js', array('jquery'), 1.0, true);
    wp_enqueue_script('webflow_js', get_template_directory_uri() . '/assets/js/langxpress.js', array('jquery'), 1.0, true);


    // Include WP comment-reply.js only if relevant
    // https://peterwilson.cc/including-wordpress-comment-reply-js/
    //https://developer.wordpress.org/themes/basics/including-css-javascript/#the-comment-reply-script
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'assets', 100);
