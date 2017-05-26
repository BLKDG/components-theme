<?php
/**
 * A Better Component Rendering function. 
 * Does not require get_template_part() and allows data to be passed into the component
 * This would allow the page template to act as the 'Controller' of sorts, decoupling the components from the data. 
 */
function renderComponent($component, $component_name = false, $DATA = false){

	$file_check = get_stylesheet_directory() . "/components/$component/$component.min.js";
	$enqueue_path = get_template_directory_uri() . "/components/$component/$component.min.js";
	
	if ( file_exists( $file_check ) ) {
        wp_enqueue_script( $component . '-script', $enqueue_path, array(), false, true );
    }	


    //Get Component View
	if($component_name){
		$component_view = '/components/'.$component.'/'.$component.'-'.$component_name.'.php';
	}else{
		$component_view = '/components/'.$component.'/'.$component.'.php';
	}

	require(get_template_directory() . $component_view);

}