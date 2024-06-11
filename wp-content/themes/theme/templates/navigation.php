<?php

/**
 * Just the Navigation for our theme
 *
 *
 *
 *
 */
?>


<div class="navigation">
    <div data-w-id="b5b93e15-6be4-1a75-7312-7fa51171e00a" data-animation="over-right" data-collapse="medium" data-duration="400" data-easing="ease-in-cubic" data-easing2="ease" role="banner" class="nav_component w-nav">
        <div class="padding-global">
            <div class="nav-desktop">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav_brand w-nav-brand">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/Group.svg" alt="" class="nav_logo">
                </a>
                <nav role="navigation" class="nav_menu w-nav-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary_navigation',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new Custom_Navwalker()
                    ));
                    ?>
                </nav>
                <div id="menu-trigger" class="nav-desktop_btn">
                    <div class="nav-desktop_btn_top"></div>
                    <div class="nav-desktop-btn_middle"></div>
                    <div class="nav-desktop_btn_bottom"></div>
                </div>
            </div>
            <div class="nav-desktop_line"></div>

        </div>
    </div>
</div>