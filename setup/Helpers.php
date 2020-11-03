<?php
namespace Setup;
class Helpers
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        //add_action('acf/save_post', array(__CLASS__, 'saving_options_page') );
        //add_action( 'save_post', array(__CLASS__, 'saving_post_page') );
    }

    public static function custom_excerpt($excerpt, $length){
        $full = $excerpt;
        $full_stripped = strip_tags($full);
        $max_length = $length;
        if (strlen($full_stripped) > $max_length){
            $offset = ($max_length - 3) - strlen($full_stripped);
            $short = substr($full_stripped, 0, strrpos($full_stripped, ' ', $offset)) . '...';
        } else {
            $short = $full_stripped;
        }
        return $short;
    }
    public static function strip_images($content){
        $strp_content = preg_replace("/<img[^>]+\>/i", "", $content); 
        return $strp_content;
    }
    public static function get_the_content_formatted() {
        $content = get_the_content();
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }

    public static function google_address_link($address) {
        $rm_br = str_replace('<br>', ' ', $address);
        $url_addr = urlencode($rm_br);
        $g_map_link = 'https://www.google.com/maps/place/'.$url_addr;
        return $g_map_link;
    }

    public static function saving_options_page() {
        $screen = get_current_screen();
        if (strpos($screen->id, "theme-general-settings") == true) {
            error_log(print_r('saved theme gen settings', true));
            $map_address = get_field('address', 'option');
            $rm_br = str_replace('<br>', ' ', $map_address);
            error_log(print_r($rm_br, true));
    
            if (!empty($map_address)) {
                $url_addr = urlencode($map_address);
                $geocode = file_get_contents('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$url_addr.'.json?access_token=pk.eyJ1IjoiYmxrZGciLCJhIjoiY2tkZzZvOWM1MG8zYTJ4bmFpazNyaGJsaiJ9.6W5RmROE3cv2zdT51kI_1g');
                $output = json_decode($geocode);
                $latitude = $output->features[0]->geometry->coordinates[1];
                $longitude = $output->features[0]->geometry->coordinates[0];
                if ( !empty(get_option('location_lat')) && !empty(get_option('location_lng')) ) {
                    update_option('location_lat', $latitude);
                    update_option('location_lng', $longitude);
                } else {
                    add_option('location_lat', $latitude);
                    add_option('location_lng', $longitude);
                }
            }
        }
    }
        
    public static function saving_post_page( $post_id ) {
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }
        if ( get_post_type( $post_id ) == 'event' ) {
            //error_log(print_r('UPDATING EVENT POST', true));
            $e_address = get_field('address', $post_id);
            //error_log(print_r($e_address, true));
            $url_addr = urlencode($e_address);
            $geocode = file_get_contents('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$url_addr.'.json?access_token=pk.eyJ1IjoiYmxrZGciLCJhIjoiY2tkZzZvOWM1MG8zYTJ4bmFpazNyaGJsaiJ9.6W5RmROE3cv2zdT51kI_1g');
            $output = json_decode($geocode);
            $latitude = $output->features[0]->geometry->coordinates[1];
            $longitude = $output->features[0]->geometry->coordinates[0];
            if ( !empty(get_post_meta($post_id, 'event_location_lat', true)) && !empty(get_post_meta($post_id, 'event_location_lng', true)) ) {
                update_post_meta($post_id, 'event_location_lat', $latitude);
                update_post_meta($post_id, 'event_location_lng', $longitude);
            } else {
                add_post_meta($post_id, 'event_location_lat', $latitude);
                add_post_meta($post_id, 'event_location_lng', $longitude);
            }
        }
    }   
}    