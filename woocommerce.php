<?php
/**
 * Standard Page Template
 */

get_header();

	while ( have_posts() ) : the_post(); ?>
	
		<?php
			the_content();
		?>

	<?php endwhile;

get_footer(); ?>