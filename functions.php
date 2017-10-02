<?php
/**
 * 
 * Set up the theme and provides some helper functions, which are used in the theme as custom template tags. Others are attached to action and filter hooks in WordPress to change core functionality.
 * 
 */

// Environment Variables
include_once('includes/env.php');

// Cleanup Wordpress defaults
include_once('includes/cleanup.php');

// Add theme support
include_once('includes/theme-support.php');

// Add widget support
include_once('includes/widgets.php');

// File routing helpers
include_once('includes/routing.php');

// Enqueue Scripts
include_once('includes/enqueue-scripts.php');

// Custom Post Types
//include_once('includes/custom-post-types.php');

// Advanced Custom Fields Customizations
//include_once('includes/acf.php');

// Customize the Divi Plugin (if installed)
//include_once('includes/divi-customizations.php');

// Customize the Divi Plugin (if installed)
include_once('includes/woocommerce-customizations.php');

?>