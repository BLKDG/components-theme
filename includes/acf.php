<?php

/**
 * Add an options page
 */
if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
 
}


/**
 * Add a google API key. The Mapping functionality doesn't work without it.
 */
add_filter('acf/settings/google_api_key', function () {
    return GOOGLE_API_KEY;
});