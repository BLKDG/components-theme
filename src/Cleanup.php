<?php
namespace BLKDG;

class Cleanup
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
		add_action( 'init', array(__CLASS__, 'cleanup_head') );
		add_filter( 'the_generator', 'remove_rss_wp_version' );
    }

    /**
     * Cleanup the head of our application
     */
    public static function cleanup_head()
    {
		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );

		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );

		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Index link.
		remove_action( 'wp_head', 'index_rel_link' );

		// Previous link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

		// Start link.
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10, 0 );

		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		// WP version.
		remove_action( 'wp_head', 'wp_generator' );

		// Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		// Emoji styles.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		// Remove WP version from css.
		add_filter( 'style_loader_src', array(__CLASS__, 'remove_wp_ver_css_js'), 9999 );

		// Remove WP version from scripts.
		add_filter( 'script_loader_src', array(__CLASS__, 'remove_wp_ver_css_js'), 9999 );
    }

    /**
     * Removes the WP Version from RSS by returning an empty string within filter
     */
    public static function remove_rss_wp_version()
    {
        return '';
    }

    /**
     * Removes WP version from scripts and stylesheets
     */
    public static function remove_wp_ver_css_js($src)
    {
        if ( strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src );
		}
		return $src;
    }

}
