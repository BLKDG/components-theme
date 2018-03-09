	<?php
/**
 * Add some containers to our Woocommerce content
 */

// Product Loop
add_action( 'woocommerce_before_main_content', 'add_bootstrap_columns_to_woo_start' );
add_action( 'woocommerce_after_main_content', 'add_bootstrap_columns_to_woo_end' );

// Cart
add_action( 'woocommerce_before_cart', 'add_bootstrap_columns_to_woo_start' );
add_action( 'woocommerce_after_cart', 'add_bootstrap_columns_to_woo_end' );

// Checkout Form
add_action( 'woocommerce_before_checkout_form', 'add_bootstrap_columns_to_woo_start' );
add_action( 'woocommerce_after_checkout_form', 'add_bootstrap_columns_to_woo_end' );

function add_bootstrap_columns_to_woo_start() {

	echo '<div class="container"><div class="row"><div class="col-xs-12">';

}
function add_bootstrap_columns_to_woo_end() {

	echo '</div></div></div>';

}