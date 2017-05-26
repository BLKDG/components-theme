<?php
/**
 * Standard Blog Template
 */

get_header(); ?>


	<?php if ( have_posts() ) : ?>

		<article class="container">
			<div class="row">
				<div class="col-xs-12">

					<?php while ( have_posts() ) : the_post();

						renderComponent('post', get_post_format() );

					endwhile; ?>

				</div>
				<div class="col-xs-12">

					<?php // Link Pages
					wp_link_pages();
					
					// Previous/next page navigation.
					the_posts_pagination(); ?>

				</div>
			</div>
		</article>

	<?php // If no content, include the "No posts found" template.
	else :
		
		renderComponent('post', 'empty' );

	endif;
	?>

<?php get_footer(); ?>