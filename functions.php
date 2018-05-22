<?php

/**
 *
 * Set up the theme and provides some helper functions, which are used in the theme as custom template tags. Others are attached to action and filter hooks in WordPress to change core functionality.
 *
 */

/**
 * Autoload BLKDG and our dependencies with Composer
 */
include_once('vendor/autoload.php');

/**
 * Load our environment variables from .env file
 * Using the .env file prevents us from committing private keys to the repository
 */
$root_dir = dirname(__FILE__);
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
}

BLKDG\Environment::init();
BLKDG\Cleanup::init();
BLKDG\ThemeSupport::init();
BLKDG\Widgets::init();
BLKDG\Scripts::init();

BLKDG\PostTypes\Event::register();

function get_the_content_formatted() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function renderComponent() {
	$file_check = get_stylesheet_directory() . '/components/'.$component.'/'.$component.'.min.js';
	$enqueue_path = get_template_directory_uri() . '/components/'.$component.'/'.$component.'.min.js?v='.CACHE_BUST;

	if ( file_exists( $file_check ) ) {
		wp_enqueue_script( $component . '-script', $enqueue_path, array(), false, true );
	}

	//Get Component View
	if($component_name){
		$component_view = '/components/'.$component.'/'.$component.'-'.$component_name.'.php';
	}else{
		$component_view = '/components/'.$component.'/'.$component.'.php';
	}

	include get_template_directory() . $component_view;

	// Just making phpmd happy :(
	unset($DATA);
}
