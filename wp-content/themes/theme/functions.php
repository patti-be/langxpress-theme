<?php

/**
 * Scout includes
 *
 * The $scout_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * Taken from Sage theme
 * @link https://github.com/roots/sage/pull/1042
 */
$scout_includes = [
    'functions/setup.php',      // Theme Setup


    'functions/admin.php',      // Changes to the admin permissions and styles
    'functions/wrapper.php',    // Theme wrapper class
    'functions/walker.php',     // Webflow compatible navwalker
    'functions/editor.php',     // TinyMCE Editor overrides
    'functions/extras.php',     // Other stuff
    'functions/titles.php',     // Page titles
    'functions/ajax.php',       // WP Ajax requests
    'functions/cleanup.php',     // Cleaning up outputs

    // Modifications to Plugins
    'functions/plugin-acf.php',             // Advanced Custom Fields
    'functions/plugin-gravityforms.php',    // Gravity Forms
    'functions/plugin-yoast.php',           // Yoast
    'functions/woocommerce.php',           // Woocommerce

    // Custom Post Types
    'functions/cpt-services.php',    // CPT Services
    'functions/cpt-workfields.php',    // CPT Fields


];

function remove_editor_support()
{
    // Remove editor support for pages
    remove_post_type_support('services', 'editor');
    remove_post_type_support('workfields', 'editor');
    remove_post_type_support('page', 'editor');
    remove_post_type_support('post', 'editor');
}
add_action('init', 'remove_editor_support');


foreach ($scout_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
