<?php
/**
 * The Single Template
 */

get_header();
	
	while ( have_posts() ) : the_post();

		renderComponent('post', get_post_format() );

		the_post_navigation();

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;


	endwhile;
	
get_footer(); ?>