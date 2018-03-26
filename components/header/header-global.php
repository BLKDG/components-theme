<header>
	<?php if ( has_nav_menu( 'utility' )) : ?>

		<nav class="utility-desktop clearfix">

			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'utility',
					'menu_class'     	=> 'utility-menu'
				 ) );
			?>

		</nav>

	<?php endif; ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 clearfix">
				
				<div class="branding">

					<h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				</div>

				<?php renderComponent('header', 'navigation' ); ?>

			</div>
		</div>
	</div>
</header>