<?php

namespace Setup\Widgets;

class Related_Posts extends \WP_Widget
{

	public function __construct() {
		parent::__construct(
		'related_posts_widget', 
		__('Related Posts', 'related_posts_widget_domain'), 
		array( 'classname' => 'related-posts-widget', 'description' => __( 'Widget to display Related Posts', 'related_posts_widget_domain' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty($instance['number']) ) {
			$number = $instance['number'];
		} else {
			$number = 1;
		}
		echo $args['before_widget'];
			if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// get the current post
		$queried_object = get_queried_object();

		if ( $queried_object ) {
		    $post_id = $queried_object->ID;
		}

		$terms = get_the_terms($post_id, 'category');
		$term_ids = array();
		foreach($terms as $term) {
			array_push($term_ids, $term->term_id);
		}

		//widget content
		$query_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 5,
			'orderby' => 'rand',
			'post__not_in' => array($post_id), //not the current post
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $term_ids,
					'operator' => 'IN'
				),
			),
		);
		$posts = array();
		$the_query = new \WP_Query( $query_args );

		global $post;
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
				
				$item = new \StdClass;
				$item->title = get_the_title();
				$item->link = get_the_permalink();

				array_push($posts, $item);

			endwhile;
		endif;
		wp_reset_postdata();

		if($posts) : ?>
			<div class="related-posts">
			<?php $i = 0;
			foreach($posts as $item) : ?>
				<div class="single-link mb-3">
					<a href="<?php echo $item->link; ?>">
						<h3 class="mt-2"><?php echo $item->title; ?></h3>
						<a href="<?php echo $item->link; ?>" class="btn btn-link text-dark">View</a>
					</a>
				</div>
			<?php
			endforeach; ?>
		</div>
	<?php endif;
		
		echo $args['after_widget'];
	}
			 
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'related_posts_widget_domain' );
		}
		if ( isset( $instance[ 'number' ] ) ) {
			$number = $instance[ 'number' ];
		} else {
			$number = __( '1', 'related_posts_widget_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" />
		</p>
		<?php 
	}
		 
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
		return $instance;
	}
}