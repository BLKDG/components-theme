<?php
/**
 * Return the Route of the component
 * @param  string $componentName 
 * @return string
 */
function componentRoute($componentName){

	$componentRoute = 'components/'.$componentName.'/'.$componentName;

	return $componentRoute;

}