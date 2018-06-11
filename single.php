<?php
/**
 * The Single Template
 */

get_header();
	
	while ( have_posts() ) : the_post();

		Components\View::render('post', 'container' );

	endwhile;
	
get_footer(); ?>