<?php
/**
 * Tavalor: Nav Menus
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 */

include_once 'nav-classes/tavalor_top_walker_menu.php';
/**
 * Top Menu
 *
 * @param $menu_slug
 */
function tavalor_top_menu() {
    // main navigation menu
    $args = array(
        'theme_location'    => 'top',
        'container'         => false,
        'menu_class'        => 'navbar-nav mr-auto',
        'walker'           => new Tavalor_top_walker_menu,
    );

    // print menu
    wp_nav_menu( $args );
}

/**
 * Footer Pages
 *
 * @param $menu_slug
 */
function tavalor_footer_pages() {
    // main navigation menu
    $args = array(
        'theme_location'    => 'fpages',
        'container'         => false,
        'menu_class'        => 'footer-links footer-links-vertical',
    );

    // print menu
    wp_nav_menu( $args );
}

/**
 * Footer Questions
 *
 * @param $menu_slug
 */
function tavalor_footer_questions() {
    // main navigation menu
    $args = array(
        'theme_location'    => 'fquestions',
        'container'         => false,
        'menu_class'        => 'footer-links footer-links-vertical',
    );

    // print menu
    wp_nav_menu( $args );
}