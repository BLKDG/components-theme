<?php
/**
 * The Single Template
 */

get_header();
	
	while ( have_posts() ) : the_post();

		renderComponent('post', 'container' );

	endwhile;
	
get_footer(); ?>