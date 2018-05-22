<?php
namespace BLKDG;

class Menus
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        add_action( 'init', array(__CLASS__, 'register') );
    }

    /**
     * Registers menus within our theme
     */
    public static function register()
    {
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'components-theme' ),
            'utility' => __( 'Utility Menu', 'components-theme' ),
            'footer-menu' => __( 'Footer Menu', 'components-theme' ),
            'footer-legal' => __( 'Footer Legal', 'components-theme' )
        ) );
    }
}
