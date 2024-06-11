<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 500,
        'gallery_thumbnail_image_width' => 100,
        'single_image_width' => 1080,
    ) );

    //add_theme_support( 'wc-product-gallery-zoom' );

}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );



if(is_page('shop')){

    //add_filter( 'woocommerce_enqueue_styles', '__return_false' );

}





// Uhookings
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


// remove 'reset variations' link product page
add_filter('woocommerce_reset_variations_link', '__return_empty_string');

// show variation price
add_filter('woocommerce_show_variation_price', function() {return true;});


add_filter( 'wc_add_to_cart_message_html', '__return_false' );



// Override to replace the 'Choose and option' text in the dropdowns
function get_text_for_select_based_on_attribute($attribute) {

// Find the name of the attribute for the slug we passed in to the function
    $attribute_name = wc_attribute_label($attribute);

// Create a string for our select
    $select_text = '' . $attribute_name;

// Send the $select_text variable back to our calling function
    return $select_text;
}


// Main woocomerce function to override
function wc_dropdown_variation_attribute_options( $args = array() ) {

    // Uses the same function as above, or optionally a custom filter
    $select_text = get_text_for_select_based_on_attribute($args['attribute']);

    $args = wp_parse_args(
        apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ),
        array(
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected'         => false,
            'name'             => '',
            'id'               => '',
            'class'            => '',
            'show_option_none' => __( $select_text, 'woocommerce' ),
        )
    );

    // Get selected value.
    if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
        $selected_key = 'attribute_' . sanitize_title( $args['attribute'] );
        // phpcs:disable WordPress.Security.NonceVerification.Recommended
        $args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
        // phpcs:enable WordPress.Security.NonceVerification.Recommended
    }

    $options               = $args['options'];
    $product               = $args['product'];
    $attribute             = $args['attribute'];
    $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
    $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
    $class                 = $args['class'];
    $show_option_none      = (bool) $args['show_option_none'];
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

    if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
        $attributes = $product->get_variation_attributes();
        $options    = $attributes[ $attribute ];
    }

    $html  = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
    $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

    if ( ! empty( $options ) ) {
        if ( $product && taxonomy_exists( $attribute ) ) {
            // Get terms if this is a taxonomy - ordered. We need the names too.
            $terms = wc_get_product_terms(
                $product->get_id(),
                $attribute,
                array(
                    'fields' => 'all',
                )
            );

            foreach ( $terms as $term ) {
                if ( in_array( $term->slug, $options, true ) ) {
                    $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ) . '</option>';
                }
            }
        } else {
            foreach ( $options as $option ) {
                // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                $html    .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
            }
        }
    }

    $html .= '</select>';

    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
}



// Change 'order notes' field placeholder
add_filter( 'woocommerce_checkout_fields' , 'change_order_notes_placeholder' );
function change_order_notes_placeholder( $fields ) {
    $fields['order']['order_comments']['placeholder'] = _x('', 'placeholder', 'woocommerce');

    return $fields;
}