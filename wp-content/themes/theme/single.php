<?php
/**
 * The template for displaying a Post
 *
 * Theme: Flowpress
 */

?>

<?php while (have_posts()) : the_post(); ?>
    <article <?php //post_class(); ?>>


        <h1><?php the_title() ?></h1>


        <?php the_post_thumbnail('full') ?>


        <?php the_content(); ?>




        <?php get_template_part('templates/content', 'pagebuilder'); //can be optionally added to have page builder on post page ?>



                    <?php
                    $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
                    $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
                    ?>

                    <a href="<?php echo $previous_post_url ?>">Previous</a>

                    <a href="<?php echo $next_post_url ?>">Next</a>



        <?php //comments_template('/templates/comments.php'); ?>

    </article>



<?php endwhile; ?>




