<header class="clearfix">

	<div class="branding">

		<h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	</div>

	<?php get_template_part( componentRoute('header'), 'navigation' ); ?>

</header>