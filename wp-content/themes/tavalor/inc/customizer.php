<?php
/**
 * Tavalor: Customizer
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 */

if (class_exists('WP_Customize_Control')) {

    /* Custom Separator */
    class Separator_Custom_control extends WP_Customize_Control{
        public $type = 'separator';
        public function render_content(){
            ?>
            <p><hr></p>
            <?php
        }
    }

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function tavalor_customize_register($wp_customize)
    {

        /**
         * Header
         */
        $wp_customize->add_section(
            'header_section',
            array(
                'title'       => __('Header', THEME_OPT),
                'description' => 'This is a settings section.',
                'priority'    => 30,
            )
        );

        // Image: Header Logo

        $wp_customize->add_setting('header_logo', array(
            'default'    => '',
            'capability' => 'edit_theme_options',
            'type'       => 'theme_mod',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'upload_header_logo', array(
            'label'    => __('Logo', THEME_OPT),
            'section'  => 'header_section',
            'settings' => 'header_logo',
        )));

        // Full Page js Key

        $wp_customize->add_setting('full_page_key', array(
            'default'    => '',
            'capability' => 'edit_theme_options',
            'type'       => 'theme_mod',
        ));

        $wp_customize->add_control('tavalor_full_page_key', array(
            'label'    => __('Full Page Key', THEME_OPT),
            'section'  => 'header_section',
            'settings' => 'full_page_key',
        ));

        /**
         * Footer
         */

        $wp_customize->add_section(
            'footer_section',
            array(
                'title'       => __('Footer', THEME_OPT),
                'description' => 'This is a settings section.',
                'priority'    => 35,
            )
        );

        // Image: Footer Logo

        $wp_customize->add_setting('footer_logo', array(
            'default'    => '',
            'capability' => 'edit_theme_options',
            'type'       => 'theme_mod',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'upload_footer_logo', array(
            'label'    => __('Footer logo', THEME_OPT),
            'section'  => 'footer_section',
            'settings' => 'footer_logo',
        )));

        // Copyright

        $wp_customize->add_setting('copyright', array(
            'default'    => '',
            'capability' => 'edit_theme_options',
            'type'       => 'theme_mod',
        ));

        $wp_customize->add_control('tavalor_copyright', array(
            'label'    => __('Copyright', THEME_OPT),
            'section'  => 'footer_section',
            'settings' => 'copyright',
        ));


    }

    add_action('customize_register', 'tavalor_customize_register');
}