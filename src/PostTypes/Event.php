<?php
namespace BLKDG\PostTypes;

class Event
{
    /**
     * Registers Event Post Type
     */
    public static function register()
    {
        register_post_type( 'event',
            array(
                'labels' => array(
                    'name' => __( 'Events', 'components-theme' ),
                    'singular_name' => __( 'Event', 'components-theme' ),
                    'all_items' => __( 'All Events', 'components-theme' ),
                    'add_new' => __( 'Add New', 'components-theme' ),
                    'add_new_item' => __( 'Add New Event', 'components-theme' ),
                    'edit' => __( 'Edit', 'components-theme' ),
                    'edit_item' => __( 'Edit Event', 'components-theme' ),
                    'new_item' => __( 'New Event', 'components-theme' ),
                    'view_item' => __( 'View Event', 'components-theme' ),
                    'search_items' => __( 'Search Events', 'components-theme' ),
                    'not_found' =>  __( 'Nothing found in the Database.', 'components-theme' ),
                    'not_found_in_trash' => __( 'Nothing found in Trash', 'components-theme' ),
                    'parent_item_colon' => ''
                ),
                'description' => __( 'Add Events', 'components-theme' ),
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'query_var' => true,
                'menu_position' => 9,
                'menu_icon' => 'dashicons-calendar-alt',
                'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ),
                'has_archive' => 'events',
                'capability_type' => 'post',
                'hierarchical' => false,
                'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions')
            )
        );
    }
}
