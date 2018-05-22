<?php
namespace BLKDG;

class ThemeSupport
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public function init()
    {
        add_action( 'after_setup_theme', array(__CLASS__, 'add_title_tag_support') );
        add_action( 'after_setup_theme', array(__CLASS__, 'add_auto_feed_link_support') );
        add_action( 'after_setup_theme', array(__CLASS__, 'add_post_thumbnail_support') );
        add_action( 'after_setup_theme', array(__CLASS__, 'add_html5_support') );
        add_action( 'after_setup_theme', array(__CLASS__, 'add_post_format_support') );
        // add_action( 'after_setup_theme', array(__CLASS__, 'add_woocommerce_support') );

        add_action( 'after_setup_theme', array(__CLASS__, 'set_post_thumbnail_size') );
        add_action( 'after_setup_theme', array(__CLASS__, 'set_content_width') );

    }

    /*
     * Lets WordPress manage the document title.
     *
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    public static function add_title_tag_support()
    {
		add_theme_support( 'title-tag' );
    }

    /**
     * Adds automatic feed link support
     *
     * Theme Check Wants it :()
     */
    public static function add_auto_feed_link_support()
    {
		add_theme_support( 'automatic-feed-links' );
    }

    /**
     * Adds thumbnail support
     */
    public static function add_post_thumbnail_support()
    {
		add_theme_support( 'post-thumbnails' );
    }

    /*
     * Switch default core markup for search form, comment form, and comments to output valid HTML5.
     */
    public static function add_html5_support()
    {
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    public static function add_post_format_support()
    {
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );
    }

    /**
     * Woocommerce Theme Support
     */
    public static function add_woocommerce_support()
    {
		add_theme_support( 'woocommerce' );
    }

    /**
     * Sets default thumbnail size
     */
    public static function set_post_thumbnail_size()
    {
		set_post_thumbnail_size( 1200, 9999 );
    }

    /**
     * Sets the content width variable
     */
    public static function set_content_width()
    {
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}
    }

}
