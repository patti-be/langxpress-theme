<?php

/**
 * The template for displaying a Post
 *
 * Theme: langxpress
 */

?>

<?php while (have_posts()) : the_post(); ?>
    <article <?php //post_class(); 
                ?>>


        <div class="section_image-hero">
            <div class="padding-global">
                <h1 class="heading-page clip-text left">Blog</h1>
                <div class="image-hero">
                    <div class="max-width-medium">
                        <h1 data-w-id="d0fbe85e-7c3c-fb36-7111-a50ad9bd2d27" style="opacity:0" class="text-color-heading text-align-center"><?php the_title() ?></h1>
                    </div>

                    <?php
                    // Get the featured image URL
                    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div data-w-id="d0fbe85e-7c3c-fb36-7111-a50ad9bd2d29" style="opacity:0; background-image: url('<?php echo esc_url($featured_image_url); ?>');" class="image-hero_img"></div>

                </div>
                <div class="image-hero_txt">
                    <?php
                    // Get the WYSIWYG field
                    $wysiwyg_content = get_field('intro_text');
                    if ($wysiwyg_content) {
                        echo $wysiwyg_content;
                    } else {
                        echo '<p>Nothing to show here.</p>';
                    }
                    ?> </div>
            </div>
        </div>
        <div class="section_blog">
            <div class="padding-global">
                <div class="blog-post">
                    <div class="max-width-large">
                        <div class="blog-post_content w-richtext">
                            <?php
                            // Get the WYSIWYG field
                            $wysiwyg_content = get_field('content');
                            if ($wysiwyg_content) {
                                echo $wysiwyg_content;
                            } else {
                                echo '<p>Nothing to show here.</p>';
                            }
                            ?> </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="line-divider">
            <div class="padding-global section_text-intro">
                <div class="container-large">
                    <div class="line-divider_inner"></div>
                </div>
            </div>
        </div>


        <!-- SOCIAL SHARE BUTTONS -->
        <?php
        $post_url = urlencode(get_permalink());
        $post_title = urlencode(get_the_title());
        ?>
        <div class="section_share">
            <div class="padding-global">
                <div class="flex-center">
                    <div class="max-width-large">
                        <h2>Share</h2>
                        <div class="share">
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>" target="_blank" class="share_link">LinkedIn</a>
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/vertical-line.svg" alt="" class="share_divider">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank" class="share_link">Facebook</a>
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/vertical-line.svg" alt="" class="share_divider">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" class="share_link">X</a>
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/vertical-line.svg" alt="" class="share_divider">
                            <a href="mailto:?subject=<?php echo $post_title; ?>&body=<?php echo $post_url; ?>" target="_blank" class="share_link">Email</a>
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/vertical-line.svg" alt="" class="share_divider">
                            <a href="#" class="share_link" onclick="copyToClipboard('<?php echo $post_url; ?>')">Copy Link</a>
                        </div>
                    </div>
                </div>

                <script>
                    function copyToClipboard(url) {
                        navigator.clipboard.writeText(url).then(function() {
                            alert('Link copied to clipboard!');
                        }, function(err) {
                            console.error('Could not copy text: ', err);
                        });
                    }
                </script>
                <!-- PREVIOUS - NEXT BUTTONS -->
                <?php
                $next_post_url = get_permalink(get_adjacent_post(false, '', false)->ID);
                $previous_post_url = get_permalink(get_adjacent_post(false, '', true)->ID);
                ?>

                <div class="spacer-huge"></div>
                <div class="navigation-buttons">
                    <a href="<?php echo $previous_post_url ?>" class="button is-icon w-inline-block">
                        <div class="icon-1x1-small w-embed"><svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.33998 19.1101L1.56998 11.3401C0.69998 10.4701 0.69998 9.04993 1.56998 8.17993L9.33998 0.409912" stroke="black" stroke-miterlimit="10"></path>
                            </svg></div>
                        <div>Previous</div>
                    </a>
                    <a href="<?php echo $next_post_url ?>" class="button is-icon w-inline-block">
                        <div>Next</div>
                        <div class="icon-1x1-small w-embed"><svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="black" stroke-miterlimit="10"></path>
                            </svg></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="line-divider">
            <div class="padding-global section_text-intro">
                <div class="container-large">
                    <div class="line-divider_inner"></div>
                </div>
            </div>
        </div>


        <!-- LATEST POSTS -->

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

    </article>



<?php endwhile; ?>