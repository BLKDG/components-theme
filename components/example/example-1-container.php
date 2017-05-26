
<div class="container margin-top-lg margin-bottom-lg">
	<div class="row">
		<div class="col-sm-8">
			
			<h1><?php echo $DATA->page_title; ?></h1>
			<p><?php echo $DATA->page_description; ?></p>
		</div>

		<div class="col-sm-4">
			
		<?php 
		// We can include standard wordpress stuff as well!
		the_post_thumbnail();
		?>

		</div>

	</div>
</div>

<?php
$interesting_data = $DATA->data_set_one;

/*
We can now loop through the array and filter by featured 'things'
 */ ?>

<div class="container margin-top-lg margin-bottom-lg">
	<div class="row">
		<?php foreach ($interesting_data as $meow) {
			
			if (isset($meow->featured)) {
				renderComponent('example', '1', $meow);
			}else{
				renderComponent('example', '1-alt', $meow);
			}

		} ?>

	</div>
</div>

<?php 
/*
Or we can utilize the same components, with different data.
 */ 

$more_interesting_data = $DATA->data_set_two;

?>

<div class="container margin-top-lg margin-bottom-lg">
	<div class="row">
		<?php foreach ($more_interesting_data as $hiss) {
			
			//The component is variable agnostic
			//This time we don't care about the featured post.

			renderComponent('example', '1-alt', $hiss);

		} ?>

	</div>
</div>