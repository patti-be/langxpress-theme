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

class Custom_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Add your custom methods and properties here

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
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

        // Handle accordion section
        if (in_array('menu-item-has-children', $classes)) {
            $output .= $indent . '<div class="accordion-mobile">' . $n;
            $output .= $indent . $t . '<div class="accordion_inner is-mobile">' . $n;
            $output .= $indent . $t . $t . '<div class="accordion_trigger is-mobile">' . $n;
            $output .= $indent . $t . $t . $t . '<h4 class="accordion_heading is-mobile">' . $item->title . '</h4>' . $n;
            $output .= $indent . $t . $t . $t . '<div class="accordion_icon is-mobile">' . $n;
            $output .= $indent . $t . $t . $t . $t . '<div class="accordion_icon_horizontal is-mobile"></div>' . $n;
            $output .= $indent . $t . $t . $t . $t . '<div class="accordion_icon_vertical is-mobile"></div>' . $n;
            $output .= $indent . $t . $t . $t . '</div>' . $n;
            $output .= $indent . $t . $t . '</div>' . $n;
            $output .= $indent . $t . $t . '<div class="accordion_txt is-mobile">' . $n;
            $output .= $indent . $t . $t . $t . '<div class="accordion_content_inner is-mobile">' . $n;
        } else {
            // Handle regular menu item
            $output .= $indent . '<a href="' . $item->url . '" class="nav-mobile_link">' . $item->title . '</a>' . $n;
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ($depth) ? str_repeat($t, $depth) : '';

        // Close accordion section if applicable
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= $indent . $t . $t . '</div>' . $n; // Close accordion_content_inner
            $output .= $indent . $t . $t . '</div>' . $n; // Close accordion_txt
            $output .= $indent . $t . '</div>' . $n; // Close accordion_inner
            $output .= $indent . '</div>' . $n; // Close accordion-mobile
        }
    }

    // Other methods for your walker class...
}
