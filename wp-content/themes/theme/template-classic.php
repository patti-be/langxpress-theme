<?php

/**
 * Template Name: Classic Template
 */
?>


<section class="">
    <div class="container test">

        <h1><?php the_title() ?></h1>

        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>

    </div>
</section>