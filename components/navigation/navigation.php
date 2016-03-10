<header>
	<div class="site-header-main">
		<div class="branding">

			<h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<?php 
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : 
			?>

				<p class="description"><?php echo $description; ?></p>

			<?php endif; ?>

		</div>

		<?php if ( has_nav_menu( 'primary' )) : ?>

			<div class="menu">

				<?php if ( has_nav_menu( 'primary' ) ) : ?>

					<nav role="navigation">

						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu',
							 ) );
						?>

					</nav>

				<?php endif; ?>

			</div>
				
		<?php endif; ?>

	</div>
</header>