<?php
/**
 * Partial for displaying the post card (single)
 *
 *
 *
 * @package WordPress
 * @subpackage FlowPress
 * @since 1.0.0
 */

?>


<a href="<?php the_permalink(); ?>">


        <?php the_post_thumbnail( 'thumbnail' );  ?>

        <h1><?php the_title() ?></h1>
        <p>Learn More</p>

</a>