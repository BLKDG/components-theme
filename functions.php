<?php

/**
* Return the route to the component
*
* @param $componentName
* @return string
*/
public static function componentRoute($componentName){

	// The problem: get_template_part() only supports one directory level into the theme.

	// TODO: Create function that calls the component with only the component name.
	// TODO: Pass array of items that can be used in the component?

	$filePath = 'components/'.$componentName.'/'.$componentName.'.php';

	return $filePath;

}

?>