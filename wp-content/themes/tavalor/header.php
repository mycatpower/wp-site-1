<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="fullPage">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 * @version 1.0
 */

?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/resources/assets/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/resources/assets/images/favicon.ico">
    <?php wp_head(); ?>
</head>
<body>

<div class="page-wrapper">

    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <?php if ($header_logo_url = get_theme_mod( 'header_logo' )) : ?>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img src="<?php echo $header_logo_url; ?>" alt="Tavalor">
                    </a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        if ( has_nav_menu( 'top' ) ) {
                            // Print top menu
                            tavalor_top_menu();
                        }
                    ?>
                    <ul class="navbar-nav ml-auto d-none">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <div <?php echo (is_front_page()) ? 'id="fullPage"' : ''; ?>>
