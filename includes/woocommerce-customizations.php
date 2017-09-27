<?php
add_action( 'woocommerce_before_cart', 'add_bootstrap_to_woo_start' );
add_action( 'woocommerce_after_cart', 'add_bootstrap_to_woo_end' );

add_action( 'woocommerce_before_checkout_form', 'add_bootstrap_to_woo_start' );
add_action( 'woocommerce_after_checkout_form', 'add_bootstrap_to_woo_end' );

function add_bootstrap_to_woo_start() {

	echo '<div class="container"><div class="row"><div class="col-xs-12">';

}
function add_bootstrap_to_woo_end() {

	echo '</div></div></div>';

}