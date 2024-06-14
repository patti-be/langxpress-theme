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




<?php if (have_posts()) : ?>
    <div class="padding-global"><?php get_template_part('templates/page-header'); ?></div>
    <section>
        <div style=" padding-top: 4rem;  padding-bottom: 5rem;">

            <div class="padding-global">

                <?php
                // Start the Loop
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php if (has_post_thumbnail()) :
                                // Get the URL of the post thumbnail
                                $featured_image_url = get_the_post_thumbnail_url();
                            ?>
                                <div class="blog-card is-blog">
                                    <div class="blog-card_inner is-blog" style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('<?php echo esc_url($featured_image_url); ?>');">
                                        <h3 class="heading-style-h2"><?php the_title(); ?></h3>
                                        <a href="<?php the_permalink(); ?>" class="button is-icon text-color-alternate w-inline-block">
                                            <div class="btn_text">Read more</div>
                                            <div class="icon-1x1-small w-embed">
                                                <svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="currentColor" stroke-miterlimit="10"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>


                                </div>
                        </div><!-- #post-<?php the_ID(); ?> -->
                    <?php endif; ?>

            <?php
                    endwhile;
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
            ?>
            </div>

            <?php //twenty_twenty_one_the_posts_navigation(); 
            ?>


        </div>
    </section>


    <?php get_template_part('templates/content', 'pagebuilder'); ?>

<?php endif; ?>