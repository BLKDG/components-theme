# The Components Theme
By [BLKDG](https://www.blkdg.com)

The Components Theme is a Wordpress theme that utilizes Component Based Development (CBD) practices. Following some simple guidelines, the theme is set up to separate out component views from the templates, allowing developers to treat components as truly reusable views.


## Getting Started

Run the following commands from your terminal.

`npm install`

`gulp`


## The Toolkit

We've found what works for us at [BLKDG](https://www.blkdg.com) and have continually added to the arsenal. The general thought is that the NPM packages are only used locally during the dev process and are in the gitignore file. The bower packages are plugins and other tools that we utilize everywhere, so those get shipped with the production code and are included in `assets/vendor`. Below is the list of bower packages. Not all packages are enqueued, but its nice to know they are there. You can see the list of enqueued javascript plugins in `includes/enqueue-scripts.php`.

* Bootstrap Sass (We'll be updating to Bootstrap 4.0 when its ready for production)
* Font Awesome
* Fancybox - A flexible lightbox plugin
* GSAP - An incredible animation library
* JS Cookie - This plugin helps us utilize cookies with javascript, since Sessions & Cookies can be tricky to work with the WP Engine environment (which we use exclusively for hosting)
* Slick Carousel - By far the best slider plugin we've every used. 


## Development Practices

In order to take advantage of the system we'll want to think about our files a little differently. 


### 1. The Includes Folder

The includes folder contains most of our system, ajax, models, etc. code. Outside of what is already set up (enqueue scripts, theme cleanup & support), we can also add our Classes & Methods (functions) to handle more custom/complicated calls to the database. Be sure to add any file you create in the includes folder to the functions.php file.


### 2. Template Files

This includes everything from our top level files (`single.php`, `index.php`, `page.php`, `front-page.php`, `archive.php`, etc.) to the files we create in our `/templates` directory. This is where we begin treating the files a little differently.

In taking some queues from the MVC model, we're now treating high level template files as a 'Controller' of sorts. With strict practice/implementation, you should not have any html in these files. They are simply there to pass data to & call the appropriate components. Utilization of a routing function called `renderComponent()`, we can call the components similarly to the WP Core function get_template_part(), but with the addition of passing in custom data if needed. An example of this may look like the following:

```
<?php get_header();

	while ( have_posts() ) : the_post(); ?>

		<?php
			// Create a new Object
			$object = new StdClass;

			// Pass your data into the new object
			$object->title = get_the_title();
			$object->image = get_the_post_thumbnail_url();
		
			// Render the component and include our data object
			renderComponent('section', 'title', $object);
		?>

	<?php endwhile;

get_footer(); ?>
```
This is helpful because we may want to reuse this component somewhere else in the site. So by removing data from the component completely, we can pass whatever we want into the component. Here's an example using some Advanced Custom Fields Data.

```
...
<?php
	// Create a new Object
	$object = new StdClass;

	// Pass your data into the new object
	$object->title = get_field('section_header');
	$image = get_field('background_image');
	$object->image = $image['url'];

	// Render the component and include our data object
	renderComponent('section', 'title', $object);
?>
...
```


### 3. Components

Now we'll look at the components themselves. Gulp is set up to automatically comb our components for sass files, so you can create as many sass files in the components folders as you like. We've include an `enqueue_scripts()` function in our `renderComponent()` function that calls the component js file on demand. So that file will only be called if the related components php file is being used on the page. Gulp will automatically minify and uglify the js files you create. Using our example above, the components folder structure may look something like this:

```
/components
├── /section
	├── section-title.php
	├── _section.scss
	├──section.js
```

When creating the component php file, we found that it is very helpful to list out the variables being used within the component at the top of the file. Your component (`section-title.php`) may look something like this:

```
<?php
/**
 * The Section Title Component
 *
 * @param string $DATA->title
 * @param string $DATA->image
 */

if(isset($DATA->title)){ ?>
    <div class="section-title">
		<h1><?php echo $DATA->title; ?></h1>
		<?php echo ($DATA->image)? '<img src=".$DATA->image.">' : ''; ?>
    </div>
<?php } ?>

```


## Theme Enhancements & Updates

We utilize the Trello board below to manage development tasks

https://trello.com/b/mlqDk6Ff/components-theme

