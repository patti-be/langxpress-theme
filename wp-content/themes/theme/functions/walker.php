<?php
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{

    // Start Level
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);
        $classes = array('sub-menu');
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= "{$n}{$indent}<nav class=\"dropdown-column-wrapper w-dropdown-list\"><div class=\"dropdown-pd\"><div class=\"w-layout-grid grid-1-column dropdown-link-column\">{$n}";
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);
        $output .= "{$indent}</div></div></nav>{$n}";
    }

    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add specific classes based on depth
        if ($depth === 0) {
            $classes[] = 'nav_menu_link w-nav-link';
        } else {
            $classes[] = 'dropdown-link w-dropdown-link';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        // Handle different elements based on depth
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $item_output .= '<div data-delay="0" data-hover="true" class="dropdown-wrapper w-dropdown">' .
                '<div class="dropdown-toggle w-dropdown-toggle">' .
                '<div class="dropdown_text">' . apply_filters('the_title', $item->title, $item->ID) . '</div>' .
                '<div class="line-rounded-icon dropdown-arrow w-embed"><svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">' .
                '<path d="M6 6L1 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>' .
                '<path d="M11 1L6 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>' .
                '</svg></div></div>';
        } else {
            $item_output .= '<a' . $id . $class_names . $attributes . '>' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . '</a>';
        }

        $item_output .= $args->after;

        $output .= $indent . apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
            $output .= "</div>{$n}";
        } else {
            $output .= "</a>{$n}";
        }
    }
}

class Custom_Walker_Home_Menu extends Walker_Nav_Menu
{

    // Start Level
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);
        $classes = array('sub-menu');
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= "{$n}{$indent}<nav class=\"dropdown-column-wrapper w-dropdown-list\"><div class=\"dropdown-pd\"><div class=\"w-layout-grid grid-1-column dropdown-link-column\">{$n}";
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);
        $output .= "{$indent}</div></div></nav>{$n}";
    }

    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add specific classes based on depth
        if ($depth === 0) {
            $classes[] = 'nav_menu_link is-home w-nav-link';
        } else {
            $classes[] = 'dropdown-link w-dropdown-link';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        // Handle different elements based on depth
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $item_output .= '<div data-delay="0" data-hover="true" class="dropdown-wrapper w-dropdown">' .
                '<div class="dropdown-toggle w-dropdown-toggle">' .
                '<div class="dropdown_text is-home">' . apply_filters('the_title', $item->title, $item->ID) . '</div>' .
                '<div class="line-rounded-icon dropdown-arrow w-embed"><svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">' .
                '<path d="M6 6L1 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>' .
                '<path d="M11 1L6 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>' .
                '</svg></div></div>';
        } else {
            $item_output .= '<a' . $id . $class_names . $attributes . '>' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . '</a>';
        }

        $item_output .= $args->after;

        $output .= $indent . apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
            $output .= "</div>{$n}";
        } else {
            $output .= "</a>{$n}";
        }
    }
}

class Custom_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start Level - used for opening tags for a new level of depth (submenu)
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        // Add opening tags for accordion content inner
        $output .= "\n$indent<div class=\"accordion_txt is-mobile\"><div class=\"accordion_content_inner is-mobile\">\n";
    }

    // End Level - used for closing tags for a level of depth (submenu)
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        // Add closing tags for accordion content inner
        $output .= "$indent</div></div>\n";
    }

    // Start Element - used for creating each menu item
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Append custom classes
        $link_class = ($depth > 0) ? 'nav-mobile_link is-xs' : 'nav-mobile_link';
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names .= ' ' . $link_class;
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Check if the item has children
        $has_children = in_array('menu-item-has-children', $classes);

        if ($depth === 0 && $has_children) {
            // For parent items with children, wrap in accordion structure
            $output .= $indent . '<div class="accordion-mobile"><div class="accordion_inner is-mobile">';
            $output .= '<div class="accordion_trigger is-mobile"><h4 class="accordion_heading is-mobile">' . apply_filters('the_title', $item->title, $item->ID) . '</h4>';
            $output .= '<div class="accordion_icon is-mobile"><div class="accordion_icon_horizontal is-mobile"></div><div class="accordion_icon_vertical is-mobile"></div></div></div>';
        } else {
            // For regular items or child items, add link with appropriate class
            $output .= $indent . '<a' . $id . $class_names . $attributes . '>' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        }
    }

    // End Element - used for closing tags for each menu item
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
            // Close accordion structure for parent items with children
            $output .= "</div></div>\n";
        }
    }
}

class Custom_Footer_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Do nothing to avoid creating sub-menu wrappers
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        // Do nothing to avoid creating sub-menu wrappers
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        // Add footer column opening tag for top-level menu item
        if ($depth === 0) {
            $output .= "{$n}{$indent}<div class='footer_col'>{$n}";
            $output .= "{$indent}\t<div class='footer_line'></div>{$n}";
            $output .= "{$indent}\t<h3 class='footer_heading'>" . esc_html($item->title) . "</h3>{$n}";
        } else { // Only output as footer link if it's not the top-level item
            // Add menu item
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'footer_link';
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';
            $output .= "{$indent}\t<a{$id}{$class_names} href='" . esc_attr($item->url) . "'>" . esc_html($item->title) . "</a>{$n}";
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        // Add footer column closing tag for top-level menu item
        if ($depth === 0) {
            $output .= "{$indent}</div>{$n}";
        }
    }
}
