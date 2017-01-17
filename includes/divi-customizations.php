<?php 

/**
 *
 * Only include this file if the divi builder plugin is installed. 
 * 
 */


/**
 * Hide The Projects content type, automatically included with the Divi Plugin
 */
add_filter( 'et_project_posttype_args', 'components_theme_project_posttype_args', 10, 1 );
function components_theme_project_posttype_args( $args ) {
    return array_merge( $args, array(
        'public'              => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'show_in_nav_menus'   => false,
        'show_ui'             => false
    ));
}


/**
 * Display the builder per content type.
 */
function components_theme_builder_post_types( $post_types ) {
    
    //Remove Post Types (post in this case)
    if(($key = array_search('post', $post_types)) !== false) {
	    unset($post_types[$key]);
	}
	
	// Add Custom Post Type
    $post_types[] = 'event';
     
    return $post_types;
}
add_filter( 'et_builder_post_types', 'components_theme_builder_post_types' );


/**
 * Hide The Divi Builder on page templates 
 */
function components_theme_admin_js() { 
	$s = get_current_screen();

	// Hides the Divi Builder on all but Default Template
	if(!empty($s->post_type) && $s->post_type == 'page' && !empty(get_page_template_slug())) { 
?>

	<script>
		jQuery(function($){
			$('.et_pb_toggle_builder_wrapper').hide();
		});
	</script>

<?php
	}
}
add_action('admin_head', 'components_theme_admin_js');