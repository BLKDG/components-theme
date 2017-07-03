<?php
/**
 * Template Name: Example Template
 *
 * This might be a good resource for some, 
 * but if you dont need to see any examples, 
 * you can delete this file and the entire example 
 * folder in components to clear out the dead weight.
 * 
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post();

		

	endwhile; ?>

<?php get_footer(); ?>