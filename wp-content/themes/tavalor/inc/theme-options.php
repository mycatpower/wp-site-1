<?php
class TavalorSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );

        add_action( 'admin_enqueue_scripts', array($this, 'wptuts_add_color_picker') );
    }

    /**
     * Include scripts and styles
     */
    public function wptuts_add_color_picker( $hook )
    {
        if (is_admin()) {
            // Add the color picker css file
            wp_enqueue_style('wp-color-picker');
            // Include our custom jQuery file with WordPress Color Picker dependency
            wp_enqueue_script(
                'admin-script-handle',
                get_template_directory_uri() .'/resources/assets/js/admin-script.js',
                array('wp-color-picker'),
                false,
                true
            );
        }
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            __('Theme Options', THEME_OPT),
            __('Theme Options', THEME_OPT),
            'manage_options',
            'my-setting-admin',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'tavalor_options' );
        ?>
        <div class="wrap">
            <h1><?php _e('Theme Options', THEME_OPT); ?></h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'my_option_group', // Option group
            'tavalor_options', // Option name
            array( $this, 'validate_options' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            '', // Title
            '', // Callback
            'my-setting-admin' // Page
        );

        add_settings_field(
            'subscr_bg', // ID
            __('Subscriber background color', THEME_OPT), // Title
            array( $this, 'subscr_bg_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    /**
     * Function that will validate all fields.
     */
    public function validate_options( $fields ) {

        $valid_fields = array();

        // Validate Title Field
        $title = trim( $fields['title'] );
        $valid_fields['title'] = strip_tags( stripslashes( $title ) );

        // Validate Background Color
        $background = trim( $fields['subscr_bg'] );
        $background = strip_tags( stripslashes( $background ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $background ) ) {

            // Set the error message
            add_settings_error( 'tavalor_options', 'cpa_bg_error', 'Insert a valid color for Background', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $valid_fields['subscr_bg'] = $this->options['subscr_bg'];

        } else {

            $valid_fields['subscr_bg'] = $background;

        }

        return apply_filters( 'validate_options', $valid_fields, $fields);
    }

    /**
     * Function that will check if value is a valid HEX color.
     */
    public function check_color( $value ) {

        if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #
            return true;
        }

        return false;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function subscr_bg_callback()
    {
        printf(
            '<input type="text" id="subscr_bg" name="tavalor_options[subscr_bg]" value="%s" class="color-field"/>',
            isset( $this->options['subscr_bg'] ) ? esc_attr( $this->options['subscr_bg']) : ''
        );
    }
}

if( is_admin() ) {
    $my_settings_page = new TavalorSettingsPage();
}
