<?php 

namespace Setup\Widgets;

class RelatedPosts
{
	public static function register() {
		add_action( 'widgets_init', [__CLASS__, 'register_widget'] );
	}

	public static function register_widget() {
		register_widget( __NAMESPACE__ . '\Related_Posts' );
	}
}