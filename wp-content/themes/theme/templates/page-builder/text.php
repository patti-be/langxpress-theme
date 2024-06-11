<?php
/**
 * Page Builder - Text
 *
 *
 */
?>

<?php
/**
 * Variables - Settings
 *
 */

$settings = get_sub_field('settings');

$space_top = $settings['space_top']; // Options: none / l / xl / xxl / h / xh
$space_bottom = $settings['space_bottom']; // Options: none / l / xl / xxl / h / xh
//$width = $settings['content_area_width']; // Options: narrow / wide
//$background = $settings['background'];  // Options: default / bg-transition-bottom / bg / bg-transition-top

?>


<section class="p-t-<?php echo $space_top;?> p-b-<?php echo $space_bottom;?> wf-section">
    <div class="container">
        <?php the_sub_field('content'); ?>
    </div>
</section>