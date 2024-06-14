<?php

/**
 * Page Builder - Two text Blocks
 *
 *
 */
?>
<section class="section_about">
    <div class="padding-global">
        <h1 class="heading-page clip-text left"> <?php the_sub_field('heading'); ?></h1>
        <div class="about-us">
            <div class="about-us_intro">
                <p data-w-id="862c06db-29b9-043f-1ab6-1eda09e2e6ea" class="about-us_intro_txt fade-in">
                    <?php
                    $wysiwyg_content = get_sub_field('first_text_block');
                    if ($wysiwyg_content) {
                        echo $wysiwyg_content;
                    } else {
                        echo '<p>Nothing to show here.</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
        <div class="about-us_text">
            <div data-w-id="862c06db-29b9-043f-1ab6-1eda09e2e6f1" class="about-us_text_inner">
                <p class="text-size-regular"><?php the_sub_field('second_text_block'); ?></p>
                <div class="spacer-small"></div>
                <div class="flex">
                    <?php if (have_rows('buttons')) : ?>
                        <?php while (have_rows('buttons')) : the_row(); ?>
                            <?php
                            $button_1_text = get_sub_field('button_1_text');
                            $button_1_link = get_sub_field('button_1_link');
                            $button_2_text = get_sub_field('button_2_text');
                            $button_2_link = get_sub_field('button_2_link');
                            if ($button_1_text && $button_1_link) :
                            ?>
                                <a href="<?php echo esc_url($button_1_link); ?>" class="button is-icon margin-right margin-large w-inline-block">
                                    <div class="btn_text"><?php echo esc_html($button_1_text); ?></div>
                                    <div class="icon-1x1-small w-embed">
                                        <svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="black" stroke-miterlimit="10"></path>
                                        </svg>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url($button_2_link); ?>" class="button is-icon w-inline-block">
                                    <div class="btn_text"><?php echo esc_html($button_2_text); ?></div>
                                    <div class="icon-1x1-small w-embed">
                                        <svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="black" stroke-miterlimit="10"></path>
                                        </svg>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>