<?php
namespace Setup\Taxonomies;

class Category
{
    /**
     * Registers Event Post Type
     */
    public static function register()
    {
        $labels = array(

            'name' => __( 'Categories'),
            'singular_name' => __( 'Category'),
            'search_items' =>  __( 'Search Categories'),
            'all_items' => __( 'All Categories'),
            'parent_item' => __( 'Parent Category'),
            'parent_item_colon' => __( 'Parent Category:'),
            'edit_item' => __( 'Edit Category'),
            'update_item' => __( 'Update Category'),
            'add_new_item' => __( 'Add New Category'),
            'new_item_name' => __( 'New Category Name'),

        );

        register_taxonomy('event_category',array('event'),array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_admin_column' => true,
            'show_ui' => true,
            'show_in_rest' => true, //add gutenberg
            'query_var' => true,
            'rewrite' => array(     
                'with_front' => false   
            )

        ));

    }
}
