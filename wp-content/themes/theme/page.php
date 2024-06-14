<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page-header'); ?>
    <?php //the_content(); Using pagebuilder as default 
    ?>
    <?php get_template_part('templates/page-builder'); ?>
<?php endwhile; ?>