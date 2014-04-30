<?php
/**
    Plugin Name: PMPro Series
    Plugin URI: http://www.paidmembershipspro.com/pmpro-series/
    Description: Offer serialized (drip feed) content to your PMPro members.
    Version: .2.4
    Author: Stranger Studios
    Author URI: http://www.strangerstudios.com
    Contributor: Thomas Sjolshagen - http://eighty20results.com
 */

require_once dirname( __FILE__ ) . '/class.settings-api.php';

if ( !class_exists( 'PMPros_Settings' ) ):
class PMPros_Settings {

    private $settings_api;
    private $series = array();

    /**
     * Class constructor (creates the
     */
    public function __construct()
    {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Init for PMPro Series settings page
     */
    public function admin_init()
    {
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        $this->settings_api->admin_init();

    }

    /**
     * Add the settings entry for the PMPro Series to the default "Settings" admin menu
     * Only visible to users with 'manage_options' privileges
     */
    public function admin_menu()
    {
        add_options_page( 'PMPro Series', 'PMPro Series', 'manage_options', 'pmpro_series', array( $this, 'plugin_page' ));
    }

    /**
     * Load metadata related to the series (used to populate Settings tabs)
     */
    public function load_series_data()
    {
        $args = array(
            'post_type' => 'pmpro_series',
            'orderby' => 'title',
            'posts_per_page' => -1,
            'caller_get_posts' => 1
        );

        $tmpPosts = null;
        $tmpPosts = get_posts($args);

        foreach ( $tmpPosts as $post) : setup_postdata($post);

            $this->series[] = array(
                'ID' => $post->ID,
                'title' => $post->post_title,
                'name' => $post->post_name
            );

        endforeach;

        wp_reset_postdata();
    }

    /**
     *
     * Create sections for the PMPro Series settings page
     *
     * @return array -- Array of sections (tabs) for the settings page
     */
    public function get_settings_sections()
    {
        /* If the list is empty, grab the list of pmpro_series CPT entries */
        if (empty($this->series[0]))
            $this->load_series_data();

        $sections = array();

        // Append a new section for each of the defined & published series
        foreach ($this->series as $post)
        {
            $sections[] = array(
                'id' => $post['name'], // Series slug
                'title' => __( $post['title'], 'pmpro_series' ) // Series Title
            );
        }

        return $sections;
    }

    /**
     *
     * Define settings fields for each of the sections on the settings page
     *
     * @return array -- Array of fields for each of the defined sections / series
     */
    public function get_settings_fields()
    {
        if (empty($this->series[0]))
            $this->load_series_data();

        $settings_fields = array();

        foreach ($this->series as $post)
        {
            $settings_fields[$post['name']] = array(
                    array(
                        'name' => 'hidden',
                        'label' => __( 'Hide', 'pmpro_series' ),
                        'desc' => __( 'Hide future posts', 'pmpro_series' ),
                        'type' => 'checkbox',
                    ),
                    array(
                        'name' => 'sortOrder',
                        'label' => __( 'Sort Order', 'pmpro_series' ),
                        'desc' => __( 'The sort order for this series', 'pmpro_series' ),
                        'type' => 'select',
                        'options' => array(
                            SORT_ASC => 'Ascending',
                            SORT_DESC => 'Descending',
                        )
                    ), /* TODO: Uncomment to support custom rewrite rules for the series URL
                    array(
                        'name' => 'series-prefix',
                        'label' => __('Series Prefix', 'pmpro_series'),
                        'desc' => __('The prefix to use for this series (i.e. "/prefix/series_name)"', 'pmpro_series'),
                        'type' => 'text',
                    ) */
                );
        }

        // echo '<div>' . var_dump($settings_fields) . '</div>';

        return $settings_fields;
    }

    /**
     * Create the page for the PMPro Series settings
     */
    public function plugin_page()
    {
        echo '<div class="wrap">';
        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Creates the page list & titles
     *
     * @return array -- Array of option pages (i.e. data in the tabs for the settings/options)
     */
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