<?php
/**
 * The Single Template
 */

get_header();
	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();

			renderComponent('post-content', get_post_format() );

		endwhile;

	endif;
	
get_footer(); ?>