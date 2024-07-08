<?php

/**
 * Just the Navigation for our theme
 *
 *
 *
 *
 */
?>
<?php if (is_front_page()) : ?>
    <!-- Navigation for homepage -->

    <div class="home-hero">
        <div data-w-id="314745c6-8dab-e94a-9d7e-6d6ea6cdbedd" data-animation="over-right" data-collapse="medium" data-duration="400" data-easing="ease-in-cubic" data-easing2="ease" role="banner" class="nav_component is-home w-nav">
            <div class="padding-global">
                <div class="nav-desktop is-home">
                    <a data-w-id="06f0079b-df41-7989-8e84-3018b54c1a9c" href="#" class="nav_brand is-home w-nav-brand">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Group.svg" alt="" class="nav_logo">
                    </a>
                    <nav role="navigation" class="nav_menu w-nav-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary_navigation',
                            'menu_class' => '',
                            'container' => false,
                            'items_wrap' => '%3$s', // This removes the <ul> wrapper
                            'walker' => new Custom_Walker_Home_Menu(),
                            'fallback_cb' => false
                        ));
                        ?>
                        <div class="nav_menu_langs">
                            <a href="http://finsweet.com" class="nav_menu_link is-home w-nav-link">en</a>
                            <div class="nav_menu_vertical-line">
                                <div class="w-embed"><svg width="2" height="24" viewbox="0 0 2 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.649963 0.949951V23.51" stroke="currentColor" stroke-miterlimit="10"></path>
                                    </svg></div>
                            </div>
                            <a href="http://finsweet.com" class="nav_menu_link is-home w-nav-link">fr</a>
                            <div class="nav_menu_vertical-line is--home">
                                <div class="w-embed"><svg width="2" height="24" viewbox="0 0 2 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.649963 0.949951V23.51" stroke="currentColor" stroke-miterlimit="10"></path>
                                    </svg></div>
                            </div>
                            <a href="http://finsweet.com" class="nav_menu_link is-home w-nav-link">es</a>
                        </div>
                        <div class="nav_menu_search is-home">
                            <div class="search-icon">
                                <div class="w-embed">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.40997 9.18003C7.72957 9.18003 9.60992 7.29963 9.60992 4.98003C9.60992 2.66043 7.72957 0.780029 5.40997 0.780029C3.09038 0.780029 1.2099 2.66043 1.2099 4.98003C1.2099 7.29963 3.09038 9.18003 5.40997 9.18003Z" stroke="currentColor" stroke-miterlimit="10"></path>
                                        <path d="M11.8 11.4L8.35992 7.94995" stroke="currentColor" stroke-miterlimit="10"></path>
                                    </svg>
                                </div>
                            </div>
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="search" class="search-field is-home" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'your-text-domain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'your-text-domain'); ?></span></button>
                            </form>
                        </div>
                    </nav>
                    <div id="menu-trigger" class="nav-desktop_btn">
                        <div class="nav-desktop_btn_top is--home"></div>
                        <div class="nav-desktop-btn_middle is-home"></div>
                        <div class="nav-desktop_btn_bottom is-home"></div>
                    </div>
                </div>
                <div data-w-id="4ff28850-7040-2b41-e832-feeb9bef859b" class="nav-desktop_line"></div>
                <div class="nav-mobile">
                    <div class="padding-global">
                        <div class="nav-mobile_inner">
                            <div class="nav-mobile_header">
                                <a href="#" class="nav_brand w-nav-brand">
                                    <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-mobile-white.png" alt="" class="nav_logo"></a>
                                <div class="nav-mobile_btn">
                                    <div class="nav-mobile_btn_bottom"></div>
                                </div>
                            </div>
                            <div class="nav-mobile_links">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary_navigation',
                                    'menu_class' => '',
                                    'container' => false,
                                    'items_wrap'    => '%3$s',
                                    'walker' => new Custom_Mobile_Walker_Nav_Menu(),
                                    'fallback_cb' => false
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-hero_container">
            <div class="clip-text center"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/png-logo-white.png" loading="lazy" sizes="(max-width: 479px) 70vw, (max-width: 991px) 79vw, 68vw" alt="" class="home-hero_logo_image clip-image"></div>
        </div>
    </div>
<?php else : ?>
    <!-- Navigation for other pages -->
    <div class="navigation">
        <div data-w-id="b5b93e15-6be4-1a75-7312-7fa51171e00a" data-animation="over-right" data-collapse="medium" data-duration="400" data-easing="ease-in-cubic" data-easing2="ease" role="banner" class="nav_component w-nav">
            <div class="padding-global">
                <div class="nav-desktop">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav_brand w-nav-brand">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Group.svg" alt="" class="nav_logo"></a>
                    <nav role="navigation" class="nav_menu w-nav-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary_navigation',
                            'menu_class' => '',
                            'container' => false,
                            'items_wrap' => '%3$s', // This removes the <ul> wrapper
                            'walker' => new Custom_Walker_Nav_Menu(),
                            'fallback_cb' => false
                        ));
                        ?>
                        <div class="nav_menu_langs">
                            <a href="#" class="nav_menu_link w-nav-link">en</a>
                            <div class="nav_menu_vertical-line">
                                <div class="w-embed"><svg width="2" height="24" viewbox="0 0 2 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.649963 0.949951V23.51" stroke="currentColor" stroke-miterlimit="10"></path>
                                    </svg></div>
                            </div>
                            <a href="#" class="nav_menu_link w-nav-link">fr</a>
                            <div class="nav_menu_vertical-line">
                                <div class="w-embed"><svg width="2" height="24" viewbox="0 0 2 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.649963 0.949951V23.51" stroke="currentColor" stroke-miterlimit="10"></path>
                                    </svg></div>
                            </div>
                            <a href="#" class="nav_menu_link w-nav-link">es</a>
                        </div>
                        <div class="nav_menu_search">
                            <div class="search-icon">
                                <div class="w-embed">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.40997 9.18003C7.72957 9.18003 9.60992 7.29963 9.60992 4.98003C9.60992 2.66043 7.72957 0.780029 5.40997 0.780029C3.09038 0.780029 1.2099 2.66043 1.2099 4.98003C1.2099 7.29963 3.09038 9.18003 5.40997 9.18003Z" stroke="currentColor" stroke-miterlimit="10"></path>
                                        <path d="M11.8 11.4L8.35992 7.94995" stroke="currentColor" stroke-miterlimit="10"></path>
                                    </svg>
                                </div>
                            </div>
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'your-text-domain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'your-text-domain'); ?></span></button>
                            </form>
                        </div>
                    </nav>
                    <div id="menu-trigger" class="nav-desktop_btn">
                        <div class="nav-desktop_btn_top"></div>
                        <div class="nav-desktop-btn_middle"></div>
                        <div class="nav-desktop_btn_bottom"></div>
                    </div>
                </div>
                <div class="nav-desktop_line"></div>
                <div class="nav-mobile">
                    <div class="padding-global">
                        <div class="nav-mobile_inner">
                            <div class="nav-mobile_header">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav_brand w-nav-brand"><img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-mobile-white.png" alt="" class="nav_logo"></a>
                                <div class="nav-mobile_btn">
                                    <div class="nav-mobile_btn_bottom"></div>
                                </div>
                            </div>
                            <div class="nav-mobile_links">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary_navigation',
                                    'menu_class' => '',
                                    'container' => false,
                                    'items_wrap'    => '%3$s',
                                    'walker' => new Custom_Mobile_Walker_Nav_Menu(),
                                    'fallback_cb' => false
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>