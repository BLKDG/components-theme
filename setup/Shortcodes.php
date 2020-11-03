<?php
namespace Setup;

class Shortcodes
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        //add_action('init', array(__CLASS__, 'shortcode_button_init'));
        add_action( 'init', array(__CLASS__, 'filter') );
        //add_action( 'init', array(__CLASS__, 'register') );
    }

    public static function filter()
    {
        //Add a callback to regiser our tinymce plugin   
        add_filter("mce_external_plugins", array(__CLASS__, "register_tinymce_plugin")); 

        // Add a callback to add our button to the TinyMCE toolbar
        //add_filter('mce_buttons', array(__CLASS__, 'add_tinymce_button'));
    }

    public static function register()
    {
        add_shortcode( 'button', array(__CLASS__, 'button_shortcode'));
    }

    public static function shortcode_button_init() {

        //Abort early if the user will never see TinyMCE
        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

    }


    //This callback registers our plug-in
    public static function register_tinymce_plugin($plugin_array) {
        $plugin_array['components_theme_button'] = get_template_directory_uri().'/assets/admin/admin.js';
        return $plugin_array;
    }

    public static function add_tinymce_button($buttons) {
        //Add the button ID to the $button array
        $buttons[] = "components_theme_button";
        return $buttons;
    }

    public static function button_shortcode( $atts ) {
        $a = shortcode_atts( array(
            'url'    => '',
            'text'   => '',
            'target' => '',
            'class'  => ''
        ), $atts );

        return '<a href="'.$a['url'].'" target="'.$a['target'].'" class="'.$a['class']. '">' .$a['text'].'</a>';
    }
}
