<?php

/**
 * Page Builder - animated text
 *
 *
 */
?>

<?php
// Get the text from the ACF field 'animated_text'
$animated_text = get_sub_field('text');

// Repeat the text 12 times to create 12 instances
$repeated_text = str_repeat($animated_text . ' • ', 12);
?>


<div data-w-id="<?php echo is_front_page() ? 'f8a571b4-343f-a2f3-7faf-a44d1fb7293c' : '862c06db-29b9-043f-1ab6-1eda09e2e6fe'; ?>" class="section_animated-text">
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