<?php


/**
 * Give the Editor role access to Appearance menu items (theme options)
 *
 * @link https://codex.wordpress.org/Roles_and_Capabilities#edit_theme_options
 */

function scout_give_edit_theme_options( $caps ) {

    /* check if the user has the edit_pages capability */
    if( ! empty( $caps[ 'edit_pages' ] ) ) {

        /* give the user the edit theme options capability */
        $caps[ 'edit_theme_options' ] = true;

    }

    /* return the modified capabilities */
    return $caps;

}
add_filter( 'user_has_cap', 'scout_give_edit_theme_options' );



/**
 * Now remove the option to edit themes and the customiser from the Editor role
 *
 */

function custom_admin_menu() {

    $user = new WP_User(get_current_user_id());
    if (!empty( $user->roles) && is_array($user->roles)) {
        foreach ($user->roles as $role)
            $role = $role;
    }

    if($role == "editor") {
        remove_submenu_page( 'themes.php', 'themes.php' );
        remove_submenu_page( 'themes.php', 'customize.php' );

    }
}

add_action('admin_menu', 'custom_admin_menu');


/**
 * Edits to the dashboard widgets
 *
 */

// Remove welcome panel
remove_action('welcome_panel', 'wp_welcome_panel');


