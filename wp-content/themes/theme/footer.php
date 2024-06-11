<?php
/**
 * Footer Code
 *
 *
 *
 *
 */
?>


<footer>


<?php get_template_part('templates/snippet-social') ?>


<?php
if (has_nav_menu('footer_navigation')) {

    wp_nav_menu(array(
        'items_wrap'=> '%3$s',
        'walker' => new Anchor_Only_Walker(),
        'container'=>false,
        'menu_class' => '',
        'theme_location'=>'footer_navigation',
        'fallback_cb'=>false
    ));

}
?>



</footer>






<?php wp_footer(); ?>

<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->






</body>
</html>