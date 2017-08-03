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
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Set the content width variable
		 */
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'components-theme' ),
			'utility' => __( 'Utility Menu', 'components-theme' ),
			'footer-menu' => __( 'Footer Menu', 'components-theme' ),
			'footer-legal' => __( 'Footer Legal', 'components-theme' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
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

		/**
		 * Register our widgetized areas.
		 */
		function widgets_init() {

			register_sidebar( array(
				'name'          => 'Widget Area 1',
				'id'            => 'widget_1',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );

		}
		add_action( 'widgets_init', 'widgets_init' );
	}
	add_action( 'after_setup_theme', 'components_theme_support' );
endif; // components_theme_support
	