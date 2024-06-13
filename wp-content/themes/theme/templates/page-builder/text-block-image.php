<?php

/**
 * Page Builder - Text Block + Image
 *
 *
 */
?>
<?php
$image = get_sub_field('image');
?>

<div class="line-divider">
    <div class="padding-global">
        <div class="line-divider_inner"></div>
    </div>
</div>
<div class="section_text-image">
    <div class="padding-global">
        <h1 class="text-image_heading clip-text left"> <?php the_sub_field('heading'); ?></h1>
        <div class="text-image_content">
            <div class="text-image_text">
                <p class="fade-in"> <?php the_sub_field('text'); ?></p>
            </div>
        </div>
        <?php if ($image) : ?>
            <div class="text-image_img" style="background-image: url('<?php echo esc_url($image['url']); ?>');"></div>
        <?php endif; ?>

    </div>
</div>