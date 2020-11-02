<?php
namespace Setup;

class Scripts
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
	    add_action( 'wp_enqueue_scripts', array(__CLASS__, 'enqueue') );
    }

    public static function enqueue()
    {
        // Deregister WP jQuery
        if ( !is_admin() ) wp_deregister_script('jquery');

        wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/public/styles.css' );

        // Enqueue Javascript Files
        // jQuery
        wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', true );

        // Cookies
        wp_enqueue_script( 'cookies', '//cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js', array('jquery'), '2.1.2', true);

        // Bootstrap
        wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

        // Slick Carousel
        wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true );

        // Scripts
        wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/public/scripts-es5.min.js', array(), '0.0.1', true );


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
