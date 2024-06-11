<?php

/**
 * BELOW IS OPTIONAL DEPENDING ON THEME
 * Function to make sure we can grab ACF fields on the archive/pafe for posts pages.
 *
 * When you select a page to act as the ‘Blogs’ archive page, the global $post object does not
 * point to the page called Blog, instead it points to the loop of posts.
 * This means that ACF will load the data (via get_field) from the wrong place (not page called Blog).
 * To get around this, you will need to specify the Blog page ID in the get_field function.
 */

//$post_id = false; // Default, dont need post id on normal pages
//
//if( is_home() || is_archive() ) // In this theme the category(archive) page is the same as the blog page
//{
//    $post_id = get_option( 'page_for_posts' ); // get the ID of the 'blog' page.
//}
//?>



<h1><?php echo title(); //cleaned up output ?></h1>