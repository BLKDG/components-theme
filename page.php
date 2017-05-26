<?php
/**
 * Standard Page Template
 */

get_header();
	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();

			the_content();

		endwhile;

	else :

		renderComponent('post-content', 'empty' );

	endif;
	
get_footer(); ?>