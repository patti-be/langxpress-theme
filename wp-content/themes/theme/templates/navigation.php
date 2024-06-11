<?php
/**
 * Just the Navigation for our theme
 *
 *
 *
 *
 */
?>



<?php
if (has_nav_menu('primary_navigation')) {

    wp_nav_menu(array(
        'items_wrap'=> '%3$s',
        'walker' => new Anchor_Only_Walker(),
        'container'=>false,
        'menu_class' => '',
        'theme_location'=>'primary_navigation',
        'fallback_cb'=>false
    ));

}
?>
