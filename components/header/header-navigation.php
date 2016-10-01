<?php if ( has_nav_menu( 'primary' )) : ?>

		<nav role="navigation">

			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'primary',
					'menu_class'     	=> 'primary-menu',
					'after'				=> '<div class="indicator"></div>'
				 ) );
			?>

		</nav>

<?php endif; ?>