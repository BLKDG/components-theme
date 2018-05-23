<?php
namespace Components;

abstract class ComponentView
{

    protected static $component;

    protected static function get_component_name()
    {
        $reflector = new \ReflectionClass(get_called_class());
        $folder_full_path = dirname($reflector->getFileName());
        $folder_name = basename($folder_full_path);
        return strtolower( $folder_name );
    }

    public static function render($component_name = false, $DATA = false)
    {
        self::$component = self::get_component_name();

        $file_check = get_stylesheet_directory() . '/components/'.self::$component.'/'.self::$component.'.min.js';
        $enqueue_path = get_template_directory_uri() . '/components/'.self::$component.'/'.self::$component.'.min.js?v='.CACHE_BUST;
    
        if ( file_exists( $file_check ) ) {
            wp_enqueue_script( $component . '-script', $enqueue_path, array(), false, true );
        }
    
        // Get Component View
        if($component_name){
            $component_view = '/components/'.self::$component.'/views/'.$component_name.'.php';
        }else{
            $component_view = '/components/'.self::$component.'/views/'.self::$component.'.php';
        }
    
        include get_template_directory() . $component_view;
    
        // Just making phpmd happy :(
        unset($DATA);
    }
}