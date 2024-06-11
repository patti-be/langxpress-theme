<?php
/**
 * ACF
 */





/** Add options page acf  */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page('Theme Settings');

}


/**
 * Add functions to the JS API
 *
 * https://www.advancedcustomfields.com/resources/adding-custom-javascript-fields/
 * https://www.advancedcustomfields.com/resources/javascript-api/
 *
 */
function my_acf_input_admin_footer() {

    ?>
    <script type="text/javascript">
        (function($) {

            // JS here

            // Add a custom palettes to colour picker
            // https://www.advancedcustomfields.com/resources/javascript-api/#filters-color_picker_args
            acf.add_filter('color_picker_args', function( args, field ){

                // do something to args
                args.palettes = ['#F5E3C7', '#7196BF', '#A9C3E0', '#D3E3F0', '#797F86', '#AFB2B6', '#E4E5E7', '#F2F2F3']

                // return
                return args;

            });

            // -------------------------------------------



        })(jQuery);
    </script>
    <?php

}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');



/**
 * Add css to the admin head to style the ACF repeater
 *
 *
 *
 *
 */
function my_acf_admin_head() {
    ?>
    <style type="text/css">

        .acf-flexible-content .layout .acf-fc-layout-handle {
            /*background-color: #00B8E4;*/
            background-color: #202428;
            color: #eee;
        }

        .acf-repeater.-row > table > tbody > tr > td,
        .acf-repeater.-block > table > tbody > tr > td {
            border-top: 2px solid #202428;
        }

        .acf-repeater .acf-row-handle {
            vertical-align: top !important;
            padding-top: 16px;
        }

        .acf-repeater .acf-row-handle span {
            font-size: 20px;
            font-weight: bold;
            color: #202428;
        }

        .imageUpload img {
            width: 75px;
        }

        .acf-repeater .acf-row-handle .acf-icon.-minus {
            top: 30px;
        }

    </style>
    <?php
}

//add_action('acf/input/admin_head', 'my_acf_admin_head');




