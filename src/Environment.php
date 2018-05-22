<?php
namespace BLKDG;

class Environment
{
    /**
     * Initialization
     * This method should be run from functions.php
     */
    public static function init()
    {
        add_action('init', array(__CLASS__, 'define_constants_from_env'));
    }

    /**
     * Defines variables from our hidden .env file
     */
    public static function define_constants_from_env()
    {
        define('CACHE_BUST', getenv('CACHE_BUST'));
        define('GOOGLE_API_KEY', getenv('GOOGLE_API_KEY'));
    }
}
