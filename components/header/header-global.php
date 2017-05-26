<div class="container">
	<div class="row">
		<header class="col-xs-12 clearfix">
			<?php if ( has_nav_menu( 'utility' )) : ?>
				<div class="utility clearfix">
					<nav role="navigation" class="utility-desktop">

						<?php
							wp_nav_menu( array(
								'theme_location' 	=> 'utility',
								'menu_class'     	=> 'utility-menu'
							 ) );
						?>

					</nav>
				</div>
			<?php endif; ?>
			
			<div class="branding">

				<h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			</div>

			<?php renderComponent('header', 'navigation' ); ?>

		</header>
	</div>
</div>