<?php
/**
    Plugin Name: PMPro Series
    Plugin URI: http://www.paidmembershipspro.com/pmpro-series/
    Description: Offer serialized (drip feed) content to your PMPro members.
    Version: .2.4-ts
    Author: Thomas Sjolshagen
    Author URI: http://www.eighty20results.com
 */

require_once dirname( __FILE__ ) . '/class.settings-api.php';

if ( !class_exists( 'PMPros_Settings' ) ):
class PMPros_Settings {

    private $settings_api;

    public function __construct()
    {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    public function admin_init()
    {
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        $this->settings_api->admin_init();

    }

    public function admin_menu()
    {
        add_options_page( 'PMPro Series', 'Series Settings', 'manage_options', 'pmpros_settings', array( $this, 'plugin_page' ));
    }

    public function get_settings_sections()
    {
        $sections = array();

        // TODO: List all Series & generate a TAB for each of them
        // Use the series slug as its ID

        $sections[] = array(
            'id' => 'february-2014-nourish-lesson-list', // Series slug
            'title' => __( 'February 2014 - Nourish Lesson List', '' ) // Series Title
        );

        return $sections;
    }

    public function get_settings_fields()
    {
        $settings_fields = array();

        // TODO: Make dynamic, based on the defined series.
        $settings_fields[] = array(
            'february-2014-nourish-lesson-list' => array(
                array(
                    'name' => 'hide',
                    'label' => __( 'Hide', 'pmpro_series' ),
                    'desc' => __( 'Hide future posts', 'pmpro_series' ),
                    'type' => 'checkbox',
                ),
                array(
                    'name' => 'sort',
                    'label' => __( 'Sort Order', 'pmpro_series' ),
                    'desc' => __( 'The sort order for this series', 'pmpro_series' ),
                    'type' => 'select',
                    'options' => array(
                        SORT_ASC => 'Ascending',
                        SORT_DESC => 'Descending',
                    )
                )
            )
        );

        return $settings_fields;
    }

    public function plugin_page()
    {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    public function get_pages()
    {
        $pages = get_pages();
        $pages_options = array();

        if ( $pages )
        {
            foreach ( $pages as $page )
            {
                $pages_options[$page->ID] = $page->$post_title;
            }
        }

        return $pages_options;
    }
}
endif;