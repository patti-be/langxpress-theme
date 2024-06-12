<?php

/**
 * Page Builder - Image
 *
 *
 */
?>

<?php
/*
 * Variables - Settings
 */
$image = get_sub_field('image');
?>


<div class="">
    <div class="">
        <?php
        if (!empty($image)) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
</div>