<?php
/**
 * Return the Route of the component
 * @param  string $componentName 
 * @return string
 */
function componentRoute($componentName){
	$file_check = get_stylesheet_directory() . "/components/$componentName/$componentName.min.js";
	$enqueue_path = get_template_directory_uri() . "/components/$componentName/$componentName.min.js";
	
	if ( file_exists( $file_check ) ) {
        wp_enqueue_script( $componentName . '-script', $enqueue_path, array(), false, true );
    }	
    
	$componentRoute = 'components/'.$componentName.'/'.$componentName;

	return $componentRoute;

}