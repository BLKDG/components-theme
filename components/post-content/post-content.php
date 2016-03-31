<?php
/**
 * The component that handles the post loop.
 */
?>
<div <?php post_class(); ?> >

	<?php the_title(); ?>

	<?php the_post_thumbnail(); ?>

	<?php the_content(); ?>
	
</div>