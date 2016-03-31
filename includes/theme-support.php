<?php
if ( ! function_exists( 'components_theme_support' ) ) :
	function components_theme_support(){
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Theme Check Wants it :()
		 */
		add_theme_support( 'automatic-feed-links' )

		/**
		 * Editor Style Support
		 */
		function add_editor_style( $stylesheet = 'editor-style.css' ) {
		    add_theme_support( 'editor-style' );
		 
		    if ( ! is_admin() )
		        return;
		 
		    global $editor_styles;
		    $editor_styles = (array) $editor_styles;
		    $stylesheet    = (array) $stylesheet;
		    if ( is_rtl() ) {
		        $rtl_stylesheet = str_replace('.css', '-rtl.css', $stylesheet[0]);
		        $stylesheet[] = $rtl_stylesheet;
		    }
		 
		    $editor_styles = array_merge( $editor_styles, $stylesheet );
		}

		/**
		 * Set the content width variable
		 */
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'components-theme' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
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
	add_action( 'after_setup_theme', 'components_theme_support' );
endif; // components_theme_support
	