<?php
/**
 * The template for displaying archive pages
 */

get_header();

	if ( have_posts() ) :

		renderComponent('post', 'listing');

	else :
		
		renderComponent('post', 'empty' );

	endif;

get_footer(); ?>
