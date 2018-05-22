<?php
namespace BLKDG;

class ACF
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        add_action( 'init', array(__CLASS__, 'create_theme_settings_options') );
        add_action( 'init', array(__CLASS__, 'add_google_api_key') );
    }

    /**
     * Add theme settings options page
     */
    public static function create_theme_settings_options()
    {
        if( function_exists('acf_add_options_page') ) {

            $option_page = acf_add_options_page(array(
                'page_title' 	=> 'Theme General Settings',
                'menu_title' 	=> 'Theme Settings',
                'menu_slug' 	=> 'theme-general-settings',
                'capability' 	=> 'edit_posts',
                'redirect' 	=> false
            ));

        }
    }

    /**
     * Adds a google API key. The Mapping functionality doesn't work without it.
     */
    public static function add_google_api_key()
    {
        add_filter('acf/settings/google_api_key', function () {
            return GOOGLE_API_KEY;
        });
    }

}
