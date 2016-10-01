<?php
/**
 * Standard Blog Post Template
 */

get_header(); ?>

	<?php if ( have_posts() ) : 

		while ( have_posts() ) : the_post();

			/**
			 * Adding get_post_format() allows us to specify the format file
			 * for instance, post-content-gallery.php. Just include the  
			 * file name in the post-content component. Here is the full list:
			 * aside, image, video, quote, link, gallery, status, audio, chat
			 */
			get_template_part( componentRoute('post-content'), get_post_format() );

		endwhile;

	endif;
	?>

<?php get_footer(); ?>