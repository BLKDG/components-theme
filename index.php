<?php
/**
 * Standard Blog Template
 */

get_header();

	if ( have_posts() ) :

		Components\View::render('post', 'listing');

	else :
		
		Components\View::render('post', 'empty' );

	endif;

get_footer(); ?>
