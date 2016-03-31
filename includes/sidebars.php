<?php
/**
 * Registers a widget area.
 */

function components_theme_sidebars() {

	/**
	 * Register our first footer widget (who the hell uses sidebars anyway?)
	 */
	register_sidebar( array(
		'name'          => __( 'Footer Widget One', 'components-theme' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'components-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'components_theme_sidebars' );