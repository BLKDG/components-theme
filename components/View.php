<?php
namespace Components;

class View
{
    public static function render($component, $component_name = false, $DATA = false)
    {
        //$file_check = get_stylesheet_directory() . '/components/'.$component.'/'.$component.'.min.js';
        //$enqueue_path = get_template_directory_uri() . '/components/'.$component.'/'.$component.'.min.js?v='.CACHE_BUST;
        
        // if ( file_exists( $file_check ) ) {
        //     wp_enqueue_script( $component . '-script', $enqueue_path, array(), false, true );
        // }	
        //Get Component View
        if($component_name){
            $component_view = '/components/'.$component.'/views/'.$component_name.'.php';
        }else{
            $component_view = '/components/'.$component.'/views/'.$component.'.php';
        }
        include get_template_directory() . $component_view;
        // Just making phpmd happy :(
        unset($DATA);
    }
}