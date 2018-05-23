<div class="container">
	
	<div class="row">
		<div class="col-sm-8">
			<?php 
			
			renderComponent('post', get_post_format()); 
			
			the_post_navigation();

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			?>
		</div>
		<div class="col-sm-4">

			

		</div>
	</div>

</div>