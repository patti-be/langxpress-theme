<?php

/**
 * Footer Code
 *
 *
 *
 *
 */
?>


<div class="footer" id="contact">
    <div class="padding-global">
        <div class="footer_inner">
            <div class="footer_links">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_navigation',
                    'menu_class'     => '',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'walker'         => new Custom_Footer_Walker_Nav_Menu(),
                    'fallback_cb'    => false
                ));
                ?>
            </div>
            <div class="footer_form-wraper">
                <div class="footer_half_inner">
                    <div class="footer_line"></div>
                    <h3 class="footer_heading">Contact</h3>
                    <div class="footer_link">Fill out the form below and we will get in touch shortly.</div>
                    <div class="spacer-medium"></div>
                    <?php echo apply_shortcodes('[contact-form-7 id="d4401d6" title="Contact form 1"]'); ?>
                </div>
            </div>

        </div>
    </div>
</div>



<?php wp_footer(); ?>

<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->






</body>

</html>