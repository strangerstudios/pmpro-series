<?php
/**
 * Created by PhpStorm.
 * User: sjolshag
 * Date: 4/16/14
 * Time: 1:33 PM
 */

class PMProSeriesSettings
{
    /**
     * Hold values to be used in the field callbacks for settings
     */
    private $options;

    /**
     * Start (construct) settings page
     */
    public function __construct()
    {
        add_action( 'admin_init', array($this, 'pmpros_initSettings'));
        add_action( 'admin_menu', array($this, 'pmpros_addSettingsPage'));
    }

    /**
     * Add options page
     */
    public function pmpros_addSettingsPage()
    {
        add_options_page(
            'PMPro Series',
            'PMPro Series',
            'manage_options',
            'pmpros-series-admin',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Settings / Options page callback function
     */
    public function create_admin_page()
    {
        $this->options = get_option( 'pmpros_options' );
        ?>
        <div clas="wrap">
            <h2>PMPro Series - Settings</h2>
            Options for configuring Paid Memberships Pro sequential post or page series (drip content).
            <form action="" method="post">
                <?php
                    settings_fields( 'pmpro_series' );
                    do_settings_sections( 'pmpros-series-admin' );
                    submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function pmpros_initSettings()
    {
        register_setting(
            'pmpros_option_group', // Option Group
            'pmpros_options', // Option Name
            array($this, 'validate') // setting value validation callback
        );

        add_settings_section(
            'pmpros_visibility_settings_id', // ID
            'Visibility', // Title
            array( $this, 'print_section_info'), // Callback
            'pmpros-series-admin' // Page
        );

        add_settings_field(
            'showFutureEntries',
            'Visible',
            array( $this, 'futureEntries_callback' ), // Callback
            'pmpros-series-admin', // Page
            'pmpros_visibility_settings_id' // Section
        );
    }

    public function validate( $input )
    {
        $new_input = array();

        if (isset( $input['showFutureEntries']))
        {
            $new_input['showFutureEntries'] = $input['showFutureEntries'] == "1" ? 1 : 0;
        }

        return $new_input;
    }

    /**
     * Print the Section text for the settings page
     */
    public function print_section_info()
    {
        print 'Use this setting to show or hide upcoming Posts/Pages in the series. This setting will apply to all series';
    }

    /**
     * Print the settings value for the showFutureEntries settings
     */
    public function futureEntries_callback()
    {
        echo "<input id='showFutureEntries' name='pmpros_options[showFutureEntries]' type='checkbox' value='1' class='code' " . checked( 1, get_option( 'pmpros_options' ), false ) . " /> Upcoming posts/pages in series will be visible";
    }
}



if ( is_admin() )
    $pmpros_series_settings_page = new PMProSeriesSettings;