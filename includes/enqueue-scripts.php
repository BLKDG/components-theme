<?php
/**
 * Enqueue our stylesheets & scripts
 */
if ( ! function_exists( 'components_theme_enqueue' ) ) :
	function components_theme_enqueue(){

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'components_theme_enqueue' );
endif;