<?php
/**
 * The template for displaying blog posts + categories (blog archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage
 * @since 1.0.0
 */


?>




<?php if ( have_posts() ) : ?>

    <?php get_template_part( 'templates/page-header' ); ?>


<section>
    <div class="container">

    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>


                    <?php get_template_part( 'templates/card-single' ); ?>


    <?php endwhile; ?>

    <?php //twenty_twenty_one_the_posts_navigation(); ?>


    </div>
</section>


    <?php get_template_part('templates/content', 'pagebuilder'); ?>


<?php endif; ?>

