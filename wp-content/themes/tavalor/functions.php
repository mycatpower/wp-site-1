<?php
/**
 * Tavalor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 */

define('THEME_OPT', 'tavalor');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tavalor_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change THEME_OPT to the name of your theme in all the template files.
     */
    load_theme_textdomain(THEME_OPT, get_stylesheet_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add Solitek image sizes
    // add_image_size( 'user-icon', 170, 170, array( 'center', 'top') );

    // Set the default content width.
    $GLOBALS['content_width'] = 730;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top'          => __( 'Top Menu', THEME_OPT ),
        'fpages'       => __( 'Footer Pages', THEME_OPT ),
        'fquestions'   => __( 'Footer Questions', THEME_OPT ),
        'flinks'       => __( 'Footer Links', THEME_OPT )
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'tavalor_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tavalor_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer First List', THEME_OPT ),
        'id'            => 'footer-list-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-links-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Second List', THEME_OPT ),
        'id'            => 'footer-list-2',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-links-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Location', THEME_OPT ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Links', THEME_OPT ),
        'id'            => 'footer-links',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-links-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'tavalor_widgets_init' );

/**
 * Enqueue styles.
 */
function tavalor_styles() {
    // Google fonts
    $query_args = array(
        'family' => 'Lato:400,700|Open+Sans:400,700',
        'subset' => 'latin,latin-ext'
    );
    wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

    // Theme stylesheet.
    wp_enqueue_style( 'tavalor-style', get_stylesheet_uri() );
    // Main styles
    wp_enqueue_style( 'tavalor-css', get_stylesheet_directory_uri() . '/resources/assets/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'tavalor_styles' );

/**
 * Enqueue scripts.
 */
function tavalor_scripts() {
    // Library scripts
    wp_enqueue_script( 'tavalor-libs-js', get_stylesheet_directory_uri() . '/resources/assets/js/libs-scripts.min.js', array('jquery'), false, true );
    // Main js
    wp_enqueue_script( 'tavalor-js', get_stylesheet_directory_uri() . '/resources/assets/js/index.min.js', array('jquery'), false, true );
    wp_localize_script( 'tavalor-js', 'localize', array(
        'ajaxurl'        => admin_url( 'admin-ajax.php' ),
        'nonce'          => wp_create_nonce( 'tavalor-nonce' ),
        'fullPageKey'    => get_theme_mod('full_page_key')
    ));
}
add_action( 'wp_enqueue_scripts', 'tavalor_scripts' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 *
 * @since Tavalor 1.0
 */
function tavalor_excerpt_more( $link ) {
    return '...';
}
add_filter( 'excerpt_more', 'tavalor_excerpt_more' );

/**
 * Change Excerpt length
 *
 * @param $length
 * @return int
 */
function tavalor_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'tavalor_excerpt_length', 999 );


/**
 * Hide editor on pages.
 */
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
    $post_id = isset($_GET['post']) ? $_GET['post'] : '';
    if ( !isset( $post_id ) )
        return;

    // Hide the editor on the page titled 'Client Area'
    $slug = get_post_field( 'post_name', $post_id );
    if ($slug == 'home') {
        remove_post_type_support('page', 'editor');
    }
}

add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');
function add_active_class_to_nav_menu($classes) {
    if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
        $classes[] = 'active';
    }
    return $classes;
}

/**
 * Helpers
 */
require get_parent_theme_file_path('inc/helpers.php');
/**
 * Theme options
 */
require get_parent_theme_file_path('inc/theme-options.php');

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * Custom nav menu
 */
require get_parent_theme_file_path( '/inc/tavalor-nav-menu.php' );
