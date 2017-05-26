<?php
/**
 * The component that handles the post loop.
 */
?>
<div <?php post_class(); ?> >

	<h1><?php the_title(); ?></h1>

	<?php the_post_thumbnail(); ?>

	<?php the_content(); ?>
	
</div>