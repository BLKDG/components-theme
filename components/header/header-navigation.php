

<?php if ( has_nav_menu( 'primary' )) : ?>

		<nav role="navigation" class="nav-desktop">

			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'primary',
					'menu_class'     	=> 'primary-menu'
				 ) );
			?>

		</nav>

		<nav class="nav-mobile">

			<div id="mobile-menu">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>

		</nav>		

		<div class="mobile-menu">
		
			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'primary',
					'menu_class'     	=> 'primary-menu'
				 ) );
			?>

		</div>

<?php endif; ?>