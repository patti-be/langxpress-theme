<?php

/**
 * The template for displaying an Artist
 *
 * Theme: Flowpress
 */

?>

<?php while (have_posts()) : the_post(); ?>

    <!-- SECTION HERO TEXT-IMAGE -->

    <section class="section_hero-text">
        <div class="padding-global">
            <h1 class="heading-page clip-text left">Services &gt; <?php the_title(); ?></h1>
            <div class="hero-text">
                <?php if (have_rows('image_text')) : ?>
                    <?php while (have_rows('image_text')) : the_row();
                        // Get sub field values.
                        $image = get_sub_field('image');
                        $text = get_sub_field('text');
                    ?>
                        <?php if ($image) : ?>
                            <div class="hero-text_image">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <div class="hero-text_txt">
                                <p><?php echo $text; ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- SECTION TEXT CARDS -->

    <section class="section_text-cards">
        <div class="padding-global">
            <div class="text-cards">
                <?php if (have_rows('text_cards')) : ?>
                    <?php while (have_rows('text_cards')) : the_row(); ?>
                        <div class="text-card">
                            <div class="text-size-small text-color-alternate"><?php the_sub_field('card_text'); ?></div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- SECTION IMAGE DIVIDER -->
    <?php
    $image = get_field('image_divider');
    ?>

    <div class="section_image-divider">
        <div class="padding-global">
            <div class="container-large">
                <div class="image-divider" style="background-image: url('<?php echo esc_url($image['url']); ?>');"></div>
            </div>
        </div>
    </div>

    <!-- SECTION ANIMATED TEXT -->
    <?php
    // Get the text from the ACF field 'animated_text'
    $animated_text = get_field('animated_text');

    // Repeat the text 12 times to create 12 instances
    $repeated_text = str_repeat($animated_text . ' • ', 12);
    ?>

    <div data-w-id="862c06db-29b9-043f-1ab6-1eda09e2e6fe" class="section_animated-text">
        <div class="animated-text_row-right">
            <?php for ($i = 0; $i < 12; $i++) : ?>
                <div class="animated-text"><?php echo $repeated_text; ?></div>
            <?php endfor; ?>
        </div>
        <div class="animated-text_row-left">
            <?php for ($i = 0; $i < 12; $i++) : ?>
                <div class="animated-text"><?php echo $repeated_text; ?></div>
            <?php endfor; ?>
        </div>
    </div>

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
                    $first_image = get_sub_field('first_image');
                    $second_image = get_sub_field('second_image');
                    ?>
                    <h2 class="heading-page clip-text left"><?php echo esc_html($heading); ?></h2>
                    <div class="testimonial">
                        <div class="testimonial_text-block">
                            <p class="testimonial_txt"><?php echo esc_html($review); ?></p>
                            <div class="testimonial_client-name"><?php echo esc_html($company_name); ?></div>
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





<?php endwhile; ?>