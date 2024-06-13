<?php $data_wf_page = '61e034d5eaffee21a3cbdc4e'; ?>


<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page-header'); 
    ?>


    <?php get_template_part('templates/page-builder'); ?>

    <!-- SECTION LATEST POSTS -->

    <div class="line-divider">
        <div class="padding-global">
            <div class="container-large">
                <div class="line-divider_inner"></div>
            </div>
        </div>
    </div>

    <?php
    // Get the latest 3 posts
    $args = array(
        'posts_per_page' => 3, // Get 3 posts
        'post_type' => array('post', 'your_custom_post_type'), // Include regular posts and your custom post type
        'post_status' => 'publish', // Only get published posts
        'orderby' => 'date', // Order by date
        'order' => 'DESC' // Newest first
    );
    $latest_posts = new WP_Query($args);
    ?>

    <div class="section_blog-preview">
        <div class="section-heading">
            <div class="padding-global">
                <h1 class="heading-page">Blog</h1>
            </div>
        </div>
        <div class="padding-global">
            <div class="container-large">
                <div class="blog-cards">
                    <?php
                    if ($latest_posts->have_posts()) :
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                            $bg_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); // Get the featured image URL
                            $intro_text = get_field('intro_text'); // Get the intro text
                    ?>
                            <div class="blog-card">
                                <div class="blog-card_inner" style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('<?php echo esc_url($bg_image_url); ?>');">
                                    <a href="<?php the_permalink(); ?>" class="button is-icon text-color-alternate w-inline-block">
                                        <div class="btn_text">Read more</div>
                                        <div class="icon-1x1-small w-embed">
                                            <svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="currentColor" stroke-miterlimit="10"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                                <h3 class="heading-style-h2"><?php the_title(); ?></h3>
                                <div class="blog-card_text"><?php echo strip_tags($intro_text); ?></div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata(); // Reset the post data
                    else :
                        echo '<p>No posts found</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>