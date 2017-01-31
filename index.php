<?php
/**
 * Standard Blog Template
 */

get_header(); ?>


	<?php if ( have_posts() ) : ?>

		<div class="container">
			<div class="row">
			
				<?php while ( have_posts() ) : the_post();

					/**
					 * Adding get_post_format() allows us to specify the format file
					 * for instance, post-content-gallery.php. Just include the  
					 * file name in the post-content component. Here is the full list:
					 * aside, image, video, quote, link, gallery, status, audio, chat
					 */
					get_template_part( componentRoute('post-content'), get_post_format() );

				endwhile;

				// Link Pages
				wp_link_pages();
				
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'components-theme' ),
					'next_text'          => __( 'Next page', 'components-theme' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'components-theme' ) . ' </span>',
				) ); ?>

			</div>
		</div>
	<?php // If no content, include the "No posts found" template.
	else :
		get_template_part( componentRoute('post-content'), 'empty' );

	endif;
	?>

<?php get_footer(); ?>