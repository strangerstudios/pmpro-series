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

    private function pmp_debug($msg)
    {
        error_log('pmpro-series: ' . $msg);
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
            <form action="options-general.php?page=pmpros-series-admin" method="post">
                <?php
                    settings_fields( 'pmpros_options' );
                    do_settings_sections( 'pmpro-series-admin' );
                    submit_button();
                ?>
            </form>
           <?php $this->pmp_debug('Checked Is: ' . var_dump(get_option('pmpros_options') ));  ?>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function pmpros_initSettings()
    {
        register_setting(
            'pmpros_settings_group', // Option Group
            'pmpros_options', // Option Name
            array($this, 'pmpros_validate') // Validation callback
        );

        $this->pmp_debug('Registered pmpros_options');
        $this->pmp_debug('Value: ' . var_dump( (array) get_option('pmpros_options')));

        add_settings_section(
            'pmpros_visibility_settings_id', // ID
            'Upcoming Posts in Series', // Title
            array( $this, 'print_section_info'), // Callback
            'pmpro-series-admin' // Page
        );

        $this->pmp_debug('Added settings section');

        add_settings_field(
            'showFuturePosts',
            'Visible',
            array( $this, 'futureEntries_callback' ), // Callback
            'pmpro-series-admin', // Page
            'pmpros_visibility_settings_id' // Section
        );

        $this->pmp_debug('Added settings form entry');
    }

    public function pmpros_validate( $input )
    {
        $output = get_option('pmpros_options');

        $this->pmp_debug('pmpros_validate() executing');
        $this->pmp_debug( 'Set to: ' . var_dump($input));

        $output = array();

        if (isset( $input['showFuturePosts']))
        {
            // $this->options = $input;
            $output['showFuturePosts'] = $input['showFuturePosts'];

            $this->pmp_debug('showFuturePosts option is: ' . $output['showFuturePosts']);
        } else {
            $this->pmp_debug('No Options set???');
        }

        return $output;
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
        $this->options = (array) get_option('pmpros_options');

        echo '<input id="showFuturePosts" name="pmpros_options[showFuturePosts]" type="checkbox" value="1" ' . checked( $this->options['showFuturePosts'], 1 ) . ' /> Upcoming posts/pages in series will be visible';
    }
}


/*
if ( is_admin() )
    $pmpros_series_settings_page = new PMProSeriesSettings;

*/