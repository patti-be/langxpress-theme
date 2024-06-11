<?php
/**
 * Lets clean up some WP outputs
 *
 *
 *
 */




/**
 * Remove inline 'width' attribute from <figure> element
 *
 * Description: The hardcoded with attribute make the figure element not responsive
 * https://stackoverflow.com/questions/23812072/wordpress-3-9-x-remove-inline-width-from-figure-element
 */
add_filter('img_caption_shortcode_width', '__return_false');



