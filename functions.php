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

Setup\Environment::init();
Setup\Cleanup::init();
Setup\ThemeSupport::init();
Setup\Widgets::init();
Setup\Scripts::init();

Components\Event\PostType::register();

function get_the_content_formatted() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}