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
<<<<<<< HEAD
        wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css?v='.filemtime(get_stylesheet_directory() . '/assets/css/styles.css'));

        //Mapbox stylesheet
        //wp_enqueue_style( 'mapbox_styles', 'https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css' );
        //Fancybox stylesheet
        //wp_enqueue_style( 'fancybox_styles', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/css/jquery.fancybox.min.css' );
=======
        // Deregister WP jQuery
        if ( !is_admin() ) wp_deregister_script('jquery');

        wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/public/styles.css' );
>>>>>>> e83737a0d973cf1afae464fc87d451065b784d36

        // Enqueue Javascript Files
        // jQuery
        wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', true );

        // Cookies
<<<<<<< HEAD
        // wp_enqueue_script( 'cookies', get_stylesheet_directory_uri() . '/assets/vendor/js-cookie/src/js.cookie.js', array('jquery'), '2.1.2', false);

        // Bootstrap
        wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/vendor/boostrap/dist/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

        // jQuery UI
        // wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/assets/vendor/jquery-ui/jquery-ui.min.js', array('jquery', 'bootstrap'), '3.3.6', true );

        // jQuery Validate
		// wp_enqueue_script( 'jquery-validation', get_stylesheet_directory_uri() . '/assets/vendor/jquery-validation/dist/jquery.validate.min.js', array('jquery'), '1.17.0', true);

        // Mapbox
        // wp_enqueue_script( 'mapbox', 'https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js', array('jquery'), '1.7.0', false );

        // Fancybox
        // wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/js/jquery.fancybox.min.js', array('jquery'), '2.1.7', false );
=======
        wp_enqueue_script( 'cookies', '//cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js', array('jquery'), '2.1.2', true);

        // Bootstrap
        wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
>>>>>>> e83737a0d973cf1afae464fc87d451065b784d36

        // Slick Carousel
        wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true );

        // Scripts
<<<<<<< HEAD
        wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js?v='.filemtime(get_stylesheet_directory() . '/assets/js/scripts.min.js'), array('jquery', 'bootstrap'), '0.0.1', true );

=======
        wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/public/scripts.js', array(), '0.0.1', true );
>>>>>>> e83737a0d973cf1afae464fc87d451065b784d36

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
