<?php

namespace Scout\Wrapper;

/**
 * Theme wrapper to eliminate the need to get_header on every template
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 *
 * Template hierarchy:
 * wrapper-{template}.php > wrapper.php
 *    {template}.php
 *        header-{template}.php > header.php
 *        sidebar-{template}.php > sidebar.php
 *        footer-{template}.php > footer.php
 *
 *  Replace {template} with any template name: single, taxonomy-my_custom_tax etc.
 *
 */

function template_path() {
    return Scout_Wrapping::$main_template;
}

function template_base() {
    return Scout_Wrapping::$base;
}


class  Scout_Wrapping {

    /**
     * Stores the full path to the main template file
     */
    static $main_template;

    /**
     * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
     */
    static $base;

    static function wrap( $template ) {
        self::$main_template = $template;

        self::$base = substr( basename( self::$main_template ), 0, -4 );

        if ( 'index' == self::$base )
            self::$base = false;

        $templates = array( 'wrapper.php' );

        if ( self::$base )
            array_unshift( $templates, sprintf( 'wrapper-%s.php', self::$base ) );

        return locate_template( $templates );
    }
}

add_filter( 'template_include', array( __NAMESPACE__ . '\\Scout_Wrapping', 'wrap' ), 99 );