<?php



/**
 * Reveal the hidden “Styles” dropdown in the advanced toolbar.
 */
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {
    //Add style selector to the beginning of the toolbar
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}


/**
 * Add styles/classes to the "Styles" drop-down
 */
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );

function fb_mce_before_init( $settings ) {

    // Change align buttons to classes instead of inline css
    $settings['formats'] = '{' .
        'alignleft: [' .
        '{selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li", classes: "text-left"},' .
        '{selector: "img,table,dl.wp-caption", classes: "alignleft"}' .
        '],' .
        'aligncenter: [' .
        '{selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li", classes: "text-center"},' .
        '{selector: "img,table,dl.wp-caption", classes: "aligncenter"}' .
        '],' .
        'alignright: [' .
        '{selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li", classes: "text-right"},' .
        '{selector: "img,table,dl.wp-caption", classes: "alignright"}' .
        '],' .
        'strikethrough: {inline: "del"}' .
        '}'
    ;


    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
//        array(
//            'title' => 'Display Title',
//            'selector' => 'p,h1,h2,h3,h4,h5,h6',
//            'classes' => 'display-title',
//            //'wrapper' => true,
//
//        ),
//        array(
//            'title' => 'BIG',
//            'selector' => 'p,h1,h2,h3,h4,h5,h6',
//            'classes' => 'big',
//            //'wrapper' => true,
//        ),
        array(
            'title' => 'Small Caps',
            'selector' => 'p,h1,h2,h3,h4,h5,h6',
            'classes' => 'small-caps',
            //'wrapper' => true,
        ),
//        array(
//            'title' => 'Lead',
//            'selector' => 'p,h1,h2,h3,h4,h5,h6',
//            'classes' => 'lead',
//            //'wrapper' => true,
//        ),
        array(
            'title' => 'h1',
            'selector' => 'p,h1,h2,h3,h4,h5,h6',
            'classes' => 'h1',
            //'wrapper' => true,
        ),
        array(
            'title' => 'h2',
            'selector' => 'p,h1,h2,h3,h4,h5,h6',
            'classes' => 'h2',
            //'wrapper' => true,
        ),
        array(
            'title' => 'h3',
            'selector' => 'p,h1,h2,h3,h4,h5,h6',
            'classes' => 'h3',
            //'wrapper' => true,
        ),
        array(
            'title' => 'h4',
            'selector' => 'p,h1,h2,h3,h4,h5,h6',
            'classes' => 'h4',
            //'wrapper' => true,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $settings['style_formats'] = json_encode( $style_formats );




    return $settings;

}
