<?php
/**
 * Standard Page Template
 */

get_header();

	while ( have_posts() ) : the_post(); ?>
	
		<?php
			woocommerce_content();
		?>

	<?php endwhile;

get_footer(); ?>