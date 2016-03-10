<header>

	<div class="branding">

		<h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php 
		$description = get_bloginfo( 'description', 'display' );
		if ( $description ) : 
		?>

			<p class="description"><?php echo $description; ?></p>

		<?php endif; ?>

	</div>

	<?php get_template_part( componentRoute('post-content'), get_post_format() ); ?>

</header>