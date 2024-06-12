<?php
class Custom_Navwalker extends Walker_Nav_Menu
{

    // Start Level
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<nav class=\"dropdown-column-wrapper w-dropdown-list\"><div class=\"dropdown-pd\"><div class=\"w-layout-grid grid-1-column dropdown-link-column\">\n";
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div></div></nav>\n";
    }

    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        if ($depth == 0 && in_array('menu-item-has-children', $classes)) {
            $output .= $indent . '<div data-delay="0" data-hover="true" class="dropdown-wrapper w-dropdown">';
            $output .= '<div class="dropdown-toggle w-dropdown-toggle">';
            $output .= '<div class="dropdown_text">' . apply_filters('the_title', $item->title, $item->ID) . '</div>';
            $output .= '<div class="line-rounded-icon dropdown-arrow w-embed"><svg width="12" height="7" viewbox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">';
            $output .= '<path d="M6 6L1 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>';
            $output .= '<path d="M11 1L6 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>';
            $output .= '</svg></div>';
            $output .= '</div>';
        } else {
            $output .= $indent . '<a' . $id . $class_names . ' href="' . esc_url($item->url) . '">';
            $output .= '<div class="nav_menu_link w-nav-link">';
        }

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= $args->after;

        if ($depth == 0 && in_array('menu-item-has-children', $classes)) {
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        } else {
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            $output .= '</div></a>';
        }
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if ($depth == 0 && in_array('menu-item-has-children', $item->classes)) {
            $output .= '</div>';
        }
        $output .= "\n";
    }
}
