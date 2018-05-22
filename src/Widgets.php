<?php
namespace BLKDG;

class Widgets
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        add_action( 'widgets_init', array(__CLASS__, 'register') );
    }

    /**
     * Registers our theme's widget areas
     */
    public static function register()
    {
        register_sidebar( array(
            'name'          => 'Widget Area 1',
            'id'            => 'widget_1',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ) );
    }
}
