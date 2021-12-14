<?php
namespace Components;

class View
{
    public static function render($component, $component_name = false, $DATA = false)
    {
        $file_check = get_stylesheet_directory() . '/public/components/js/'.$component.'.js';
        
        if ( file_exists( $file_check ) ) {
            $filetime = filemtime($file_check); 
            $enqueue_path = get_template_directory_uri() . '/public/components/js/'.$component.'.js?v='.$filetime;
            wp_enqueue_script( $component . '-script', $enqueue_path, array(), false, true );
        }	    

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