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


<!doctype html>
<html <?php language_attributes(); ?> data-wf-page="<?php echo is_front_page() ? '664b1ad2be6a92018add9893' : '666954a55b66566a334968fa'; ?>" data-wf-site="664b1ad2be6a92018add9897">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/webclip.png" rel="apple-touch-icon">

    <?php
    if (is_single()) {
        global $post;
        $post_url = get_permalink();
        $post_title = get_the_title();
        $post_excerpt = get_the_excerpt();
        $post_image = get_the_post_thumbnail_url($post->ID, 'full');
    ?>
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo esc_url($post_url); ?>" />
        <meta property="og:title" content="<?php echo esc_attr($post_title); ?>" />
        <meta property="og:description" content="<?php echo esc_attr($post_excerpt); ?>" />
        <?php if ($post_image) { ?>
            <meta property="og:image" content="<?php echo esc_url($post_image); ?>" />
        <?php } ?>
    <?php
    }
    ?>

    <?php wp_head(); ?>
</head>
<?php wp_head(); ?>

</head>


<body class="<?php echo is_front_page() ? 'home' : ''; ?>">
    <?php wp_body_open(); ?>
    <div class="page-wrapper">

        <?php get_template_part('/templates/navigation'); ?>