<?php
/**
 * Clean up WordPress defaults
 */
if ( ! function_exists( 'components_theme_start_cleanup' ) ) :

	function components_theme_start_cleanup() {

		// Launching operation cleanup.
		add_action( 'init', 'components_theme_cleanup_head' );

		// Remove WP version from RSS.
		add_filter( 'the_generator', 'components_theme_remove_rss_version' );

	}

	add_action( 'after_setup_theme','components_theme_start_cleanup' );

endif;

if ( ! function_exists( 'components_theme_cleanup_head' ) ) :

	function components_theme_cleanup_head() {

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
		add_filter( 'style_loader_src', 'components_theme_remove_wp_ver_css_js', 9999 );

		// Remove WP version from scripts.
		add_filter( 'script_loader_src', 'components_theme_remove_wp_ver_css_js', 9999 );

	}

endif;

// Remove WP version from RSS.
if ( ! function_exists( 'components_theme_remove_rss_version' ) ) :
	
	function components_theme_remove_rss_version() { return ''; }

endif;

// Remove WP version from scripts.
if ( ! function_exists( 'components_theme_remove_wp_ver_css_js' ) ) :
	
	function components_theme_remove_wp_ver_css_js( $src ) {
		
		if ( strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src ); 
		}
		return $src;
	
	}
endif;