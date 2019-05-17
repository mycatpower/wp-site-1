<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
    <div class="section-single">
        <div class="container">
            <div class="row">
                <div class="col-lg">

                    <h1 class="section-title"><?php the_title(); ?></h1>

                    <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();

                                the_content();
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
