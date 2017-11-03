<?php
/**
 * The Front Page
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

		<?php
		/**
		 * This is an example of how to use the component system
		 * Instead of StdClass, you can create your own classes to organize you structure
		 * @var StdClass
		 */
		
		// $object = new StdClass;
		// $object->foo = 'bar';
		
		// renderComponent('component-name', 'sub-component', $object);

		the_content();

		?>

	<?php endwhile;

get_footer(); ?>