<?php
/**
 * Created by PhpStorm.
 * User: sjolshag
 * Date: 4/16/14
 * Time: 1:33 PM
 */

define('SORT_ASC', 100);
define('SORT_DESC', 200);

class PMProSeriesSettings
{
    /**
     * Hold values to be used in the field callbacks for settings
     */
    protected $option_name = 'pmpros_settings';
    protected $options = array(
        'showFuturePosts' => 1,
        'sortOrder' => SORT_ASC,
    );

    /**
     * Start (construct) settings page
     */
    public function __construct()
    {
        add_action( 'admin_init', array($this, 'admin_init'));
        add_action( 'admin_menu', array($this, 'pmpros_addSettingsPage'));
    }

    public function activate()
    {
        $settings = new PMProSeriesSettings();
        update_option($settings->option_name, $settings->options);
    }

    public function deactivate()
    {
        $settings = new PMProSeriesSettings();
        delete_option($settings->option_name);
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
        $this->options = get_option($this->option_name);

        ?>
        <div clas="wrap">
            <h2>PMPro Series - Settings</h2>
            Options for configuring Paid Memberships Pro sequential post or page series (drip content).
            <form action="<?php admin_url( 'admin-post.php' ); ?>" method="post">
                <?php
                    settings_errors();
                    settings_fields( $this->option_name );
                    do_settings_sections( 'pmpro-series-admin' );
                    submit_button();
                ?>
            </form>
           <div><?php $this->pmp_debug('Variable contents are: ' . var_dump(get_option($this->option_name) ));  ?></div>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function admin_init()
    {
        if (is_null($this->options))
            $this->options = get_option( $this->option_name );

        $default_values = array(
            'showFuturePosts' => 1,
            'sortOrder' => SORT_DESC
        );

        $data = shortcode_atts($default_values, $this->options);

        register_setting(
            'pmpros_settings_group', // Option Group
            $this->option_name, // Option Name
            array($this, 'validate') // Validation callback
        );

        $this->pmp_debug('Registered new option');
        $this->pmp_debug('Value: ' . var_dump( (array) get_option($this->option_name)));

        add_settings_section(
            'pmpros_post_settings_id', // ID
            'Post Series Settings', // Title
            array( &$this, 'print_section_info'), // Callback
            'pmpro-series-admin' // Page
        );

        $this->pmp_debug('Added settings section');

        add_settings_field(
            $this->options['showFuturePosts'],
            'Display Future Posts',
            array( $this, 'renderInput' ), // Callback
            'pmpro-series-admin', // Page
            'pmpros_post_settings_id', // Section
            array(
                'label_for' => 'showFuturePosts',
                'type' => 'checkbox',
                'descr' => 'Display upcoming (future) Posts in series (checked)',
                'name' => 'showFuturePosts',
                'value' => esc_attr($data['showFuturePosts']),
                'option_name' => $this->option_name
            )
        );

        add_settings_field(
            $this->options['sortOrder'],
            'Sort Order',
            array( $this, 'renderSelect'),
            'pmpro-series-admin',
            'pmpros_post_settings_id',
            array(
                'label_for' => 'sortOrder',
                'name' => 'sortOrder',
                'type' => 'select',
                'value' => esc_attr($data['sortOrder']),
                'options' => array(
                    100 => 'Ascending',
                    200 => 'Descending'
                ),
                'option_name' => $this->option_name,
            )
        );

        $this->pmp_debug('Added settings form entry');
    }

    public function validate( $input )
    {
        $default_values = array(
            'showFuturePosts' => 1,
            'sortOrder' => SORT_DESC,
        );

        if (! is_array($input))
            return $default_values;


        $this->pmp_debug('validate() executing');

        $valid = array();

        foreach ($default_values as $key => $value)
        {
            if (empty($input[ $key ]))
            {
                $valid[ $key ] = $value;

            } else {
                if ( ( $input[$key] !== SORT_DESC ) || ($input[$key] !== SORT_ASC) )
                    add_settings_error(
                        $this->option_name,
                        'invalid-sort-value',
                        'Sort order must be "Ascending" or "Descending".'
                    );
                else
                    $valid[ $key ] = $input[ $key ];
            }
        }

        return $valid;
    }

    /**
     * Print the Section text for the settings page
     */
    public function print_section_info()
    {
        // print 'Use this setting to show or hide upcoming Posts/Pages in the series. This setting will apply to all series';
        print '';
    }

    public function renderSelect( $args )
    {
        printf(
            '<select name="%1$s[%2$s]" id=%3$s>',
            $args['option_name'],
            $args['name'],
            $args['label_for']
        );

        foreach( $args['options'] as $val => $title )
        {
            printf(
                '<option value="%1$s" %2$s>%3$s</option>',
                $val,
                selected( $val, $args['value'], FALSE),
                $title
            );
        }

        print '</select>';
    }
    /**
     * Print the settings value for the showFutureEntries settings
     */
    public function renderInput( $args )
    {
        if ( $args['type'] == 'checkbox') {
            printf(
                '<input type="%1$s" id="%2" name="%3[%1]" value="%4%" %5 /> %6',
                $args['type'],
                $args['label_for'],
                $args['option_name'],
                $args['value'],
                checked( $args['name'], 1),
                $args['descr']
            );
        } else {

            printf(
                '<input type="%1" id="%2" name="%3[%1]" />',
                $args['type'],
                $args['label_for'],
                $args['option_name']
            );
        }
    }
}
