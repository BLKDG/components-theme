<?php

/**
 * Return the Route of the component
 * @param  string $componentName 
 * @return string
 */
function componentRoute($componentName){

	// The problem: get_template_part() only supports one directory level into the theme.

	// TODO: Pass array of items that can be used in the component?

	$componentRoute = 'components/'.$componentName.'/'.$componentName;

	return $componentRoute;

}

?>