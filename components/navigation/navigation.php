<?php if ( has_nav_menu( 'primary' )) : ?>

	<div class="navigation">

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