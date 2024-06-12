<?php

/**
 * The template for displaying an Fields
 *
 * Theme: langXpress
 */

?>

<?php while (have_posts()) : the_post(); ?>

    <!-- SECTION IMAGE DIVIDER -->
    <?php
    $image = get_field('image_divider');
    ?>

    <div class="section_image-divider">
        <div class="padding-global">
            <h1 class="heading-page clip-text left">Fields &gt; <?php the_title(); ?></h1>
            <div>
                <div class="image-divider" style="background-image: url('<?php echo esc_url($image['url']); ?>');"></div>
            </div>
        </div>
    </div>

    <!-- SECTION ANIMATED TEXT -->

    <?php
    // Check if the repeater field has rows of data
    if (have_rows('animated_text')) :
    ?>
        <div data-w-id="84a7b741-fa4e-e24b-128f-bab397cc188b" class="section_animated-text">
            <?php
            // Create an array to store all the animated text entries
            $animated_texts = [];

            // Loop through the rows of data
            while (have_rows('animated_text')) : the_row();
                // Get the sub field value
                $text = get_sub_field('text');
                if ($text) {
                    $animated_texts[] = $text . ' • ';
                }
            endwhile;

            // If there are animated texts, divide them into left and right rows
            if (!empty($animated_texts)) :
                $half = ceil(count($animated_texts) / 2);
                $left_texts = array_slice($animated_texts, 0, $half);
                $right_texts = array_slice($animated_texts, $half);
            ?>
                <div class="animated-text_row-left">
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <?php foreach ($left_texts as $text) : ?>
                            <div class="animated-text-small"><?php echo esc_html($text); ?></div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
                <div class="animated-text_row-right">
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <?php foreach ($right_texts as $text) : ?>
                            <div class="animated-text-small"><?php echo esc_html($text); ?></div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
                <div class="animated-text_row-left">
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <?php foreach ($left_texts as $text) : ?>
                            <div class="animated-text-small"><?php echo esc_html($text); ?></div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
                <div class="animated-text_row-right">
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <?php foreach ($right_texts as $text) : ?>
                            <div class="animated-text-small"><?php echo esc_html($text); ?></div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php
    endif;
    ?>

    <!-- SECTION LINE DIVIDER -->

    <?php if (get_field('line_divider')) : ?>
        <div class="line-divider">
            <div class="padding-global">
                <div class="container-large">
                    <div class="line-divider_inner"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- SECTION TESTIMONIALS -->

    <div class="section_testimonial">
        <div class="padding-global">
            <?php if (have_rows('testimonials')) : ?>
                <?php while (have_rows('testimonials')) : the_row(); ?>
                    <?php
                    // Get field values
                    $heading = get_sub_field('heading');
                    $review = get_sub_field('review');
                    $company_name = get_sub_field('company_name');
                    $review_second = get_sub_field('review_second');
                    $company_second = get_sub_field('company_second');
                    $first_image = get_sub_field('first_image');
                    $second_image = get_sub_field('second_image');
                    ?>
                    <h2 class="heading-page clip-text left"><?php echo esc_html($heading); ?></h2>
                    <div class="testimonial">
                        <div class="testimonial_text-block">
                            <p class="testimonial_txt"><?php echo esc_html($review); ?></p>
                            <div class="testimonial_client-name"><?php echo esc_html($company_name); ?></div>
                        </div>
                        <div class="testimonial_block-right">
                            <div class="testimonial_text-block is-right">
                                <p class="testimonial_txt fade-in"><?php echo esc_html($review_second); ?></p>
                                <div class="testimonial_client-name"><?php echo esc_html($company_second); ?></div>
                            </div>
                        </div>
                        <div class="testimonial_images">
                            <div class="testimonial_images_col1">
                                <div class="testimonial_image1"><img src="<?php echo esc_url($first_image['url']); ?>" alt="<?php echo esc_attr($first_image['alt']); ?>"></div>
                            </div>
                            <div class="testimonial_images_col2">
                                <div class="testimonial_image2"><img src="<?php echo esc_url($second_image['url']); ?>" alt="<?php echo esc_attr($second_image['alt']); ?>"></div>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-xhuge"></div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="line-divider">
        <div class="padding-global">
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


<?php endwhile; ?>