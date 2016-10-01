<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

	<?php if ( have_posts() ) : 

		while ( have_posts() ) : the_post();

		

		endwhile;

	endif;
	?>


<?php get_footer(); ?>
