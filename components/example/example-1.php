<?php 
/**
 * Available
 * $DATA->title;
 * $DATA->description;
 * $DATA->link
 */
?>

<?php if($DATA): ?>

	<div class="col-sm-3">

		<?php echo (isset($DATA->title))? '<h3>'.$DATA->title.'</h3>' : ''; ?>

		<hr>
		<p class="small">YAY! I'm featured!</p>
		<?php echo (isset($DATA->description))? '<div>'.$DATA->description.'</div>' : ''; ?>

		<?php if (isset($DATA->link)): ?>
			
			<a href="<?php echo $DATA->link; ?>" class="btn btn-primary btn-sm margin-top-sm">A Link</a>

		<?php endif ?>

	</div>

<?php endif; ?>