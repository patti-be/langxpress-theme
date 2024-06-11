<?php

/**
 * The header for our theme
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage langxpress
 * @since 1.0.0
 */
?>

<?php global $data_wf_page; //We need to grab the webflow page data id to make interactions work. (set in the template file) 
?>

<!doctype html>
<html <?php language_attributes(); ?> data-wf-page="<?php echo $data_wf_page ?>" data-wf-site="61d6c55c4ba164ce5f9cc4cc">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/webclip.png" rel="apple-touch-icon">





    <?php wp_head(); ?>

</head>


<body <?php //body_class(); can cause conflicts with css components 
        ?>>
    <?php wp_body_open(); ?>
    <div class="page-wrapper">

        <?php get_template_part('/templates/navigation'); ?>