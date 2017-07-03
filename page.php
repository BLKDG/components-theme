<?php
/**
 * Standard Page Template
 */

get_header();

	while ( have_posts() ) : the_post(); ?>
	
		<main class="container">
		
			<div class="row">
				
				<div class="col-xs-12">
					
					<h1><?php the_title(); ?></h1>
					
					<?php the_content(); ?>

				</div>

			</div>

		</main>

	<?php endwhile;

get_footer(); ?>