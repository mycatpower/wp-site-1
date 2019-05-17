<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 * @version 1.0
 */

get_header();

    if (have_rows('front_page_blocks')) {
        while( have_rows('front_page_blocks') ) : the_row();

            $layout = get_row_layout();

            switch ( $layout ) {
                case 'banner_block':
                    get_template_part('templates/parts/front-page/banner');
                    break;

                case 'vision_block':
                    get_template_part('templates/parts/front-page/vision');
                    break;

                case 'investors_block':
                    get_template_part('templates/parts/front-page/investors');
                    break;

                case 'borrowers_block':
                    get_template_part('templates/parts/front-page/borrowers');
                    break;

                case 'originators_block':
                    get_template_part('templates/parts/front-page/originators');
                    break;

                case 'team_block':
                    get_template_part('templates/parts/front-page/team');
                    break;

                default:
                    break;
            }

        endwhile;
    }

get_footer();