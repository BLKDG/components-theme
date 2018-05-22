<?php
namespace BLKDG\WooCommerce;

class Layout
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        // Product Loop
        add_action( 'woocommerce_before_main_content', array(__CLASS__, 'add_bootstrap_columns_to_woo_start') );
        add_action( 'woocommerce_after_main_content', array(__CLASS__, 'add_bootstrap_columns_to_woo_end') );

        // Cart
        add_action( 'woocommerce_before_cart', array(__CLASS__, 'add_bootstrap_columns_to_woo_start') );
        add_action( 'woocommerce_after_cart', array(__CLASS__, 'add_bootstrap_columns_to_woo_end') );

        // Checkout Form
        add_action( 'woocommerce_before_checkout_form', array(__CLASS__, 'add_bootstrap_columns_to_woo_start') );
        add_action( 'woocommerce_after_checkout_form', array(__CLASS__, 'add_bootstrap_columns_to_woo_end') );
    }

    /**
     * Begins Bootstrap wrapper around Woo
     */
    public static function add_bootstrap_columns_to_woo_start()
    {
        echo '<div class="container"><div class="row"><div class="col-12">';
    }

    /**
     * Closes Bootstrap wrapper around Woo
     */
    public static function add_bootstrap_columns_to_woo_end()
    {
        echo '</div></div></div>';
    }
}
