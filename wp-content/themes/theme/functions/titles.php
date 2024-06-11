<?php
/**
 * Page titles
 */

function title() {
    if (is_home()) {
        if (get_option('page_for_posts', true)) {
            return get_the_title(get_option('page_for_posts', true));
        } else {
            return 'Latest Posts';
        }
//    } elseif (is_woocommerce()){  // USE FOR WOOCOMMERCE
//        return woocommerce_page_title(false);
    } elseif (is_archive()) {
        return single_term_title('', false);
    } elseif(is_singular('people')) {  // USE FOR CUSTOM POST TYPES
        return 'People';
    } elseif (is_search()) {
        return sprintf('Search Results for %s', get_search_query());
    } elseif (is_404()) {
        return 'Not Found';
    }else {
        return get_the_title();
    }
}
