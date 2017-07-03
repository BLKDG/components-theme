<?php
/**
 * Standard Blog Template
 */

get_header();

	if ( have_posts() ) :

		renderComponent('post', 'listing');

	else :
		
		renderComponent('post', 'empty' );

	endif;

get_footer(); ?>
