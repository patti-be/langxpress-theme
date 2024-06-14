<?php
/*
Template Name: Blog Page
*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php
            // Start the Loop
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail(); ?>
                                </div><!-- .post-thumbnail -->
                            <?php endif; ?>

                            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php
                            // Output custom fields here using ACF functions
                            the_content();
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
            <?php
                endwhile;
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>