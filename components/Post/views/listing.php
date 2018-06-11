<main class="container">
	<div class="row">
		<div class="col-sm-8">

			<?php while ( have_posts() ) : the_post();

				Components\View::render('post', get_post_format() );

			endwhile; ?>


			<?php // Link Pages
			wp_link_pages();
			
			// Previous/next page navigation.
			the_posts_pagination(); ?>

		</div>
		<div class="col-sm-4">

			<?php Components\View::render('widget', 'sidebar-1'); ?>

		</div>
	</div>
</main>