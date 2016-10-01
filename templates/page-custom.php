<?php
/**
 * Template Name: Custom Page
 *
 * @package WordPress
 * @subpackage Components Theme
 * @since 0.1
 */

get_header(); ?>

	<?php if ( have_posts() ) : 

		while ( have_posts() ) : the_post();



		endwhile;

	endif;
	?>

<?php get_footer(); ?>