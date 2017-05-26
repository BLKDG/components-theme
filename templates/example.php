<?php
/**
 * Template Name: Example Template
 *
 * This might be a good resource for some, 
 * but if you dont need to see any examples, 
 * you can delete this file and the entire example 
 * folder in components to clear out the dead weight.
 * 
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post();

		/*
		I thought it would be fun to throw together some data to help explain how this routing/components system could be very helpful, as opposed to the WP get_template_part().
		 */

		/*
		Lets put some data together! Normally this would be done in a Model of sorts, but we are going to do it here for simplicity. I might add a function to the functions.php that pulls the data from some source. Here I would save that data to a variable and include it in the renderComponent. 

		eg. $example_data = get_example_data();
		 */

		$example_data = (object) array(

			'data_set_one' => array(

				(object) array(
					'title' => 'thing1', 
					'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'link' => 'http//www.google.com'
				),			
				(object) array(
					'title' => 'thing2', 
					'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
					'link' => 'http//www.google.com',
					'featured' => true
				),			
				(object) array(
					'title' => 'thing3', 
					'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ',
					'link' => 'http//www.google.com'
				),			
				(object) array(
					'title' => 'thing4', 
					'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				)
			),
			'data_set_two' => array(
					(object) array(
						'title' => 'thing5', 
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'link' => 'http//www.google.com'
					),			
					(object) array(
						'title' => 'thing6', 
						'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
						'link' => 'http//www.google.com',
						'featured' => true
					),			
					(object) array(
						'title' => 'thing7', 
						'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ',
						'link' => 'http//www.google.com'
					),			
					(object) array(
						'title' => 'thing8	', 
						'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					)
			)

		);

		/*
		Hey! Maybe we have some other data we'd like to add to the container
		 */

		$example_data->page_title = 'This is Fun!';
		$example_data->page_description = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.';

		renderComponent('example', '1-container', $example_data);

		/**
		Now, our template files are more like controllers, and our components are reusable views! (NEAT)
		 */

	endwhile; ?>

<?php get_footer(); ?>