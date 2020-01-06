<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

if (!function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if(!function_exists('set_active')) {
    function set_active ($uri)
    {
        if (is_array($uri))
        {
            foreach ($uri as $uri)
            {
                if ($uri == 'admin' && ! Request::is($uri))
                {
                    return false;
                }

                if (Request::is($uri) || Request::is($uri . '/*'))
                {
                    return true;
                }
            }
        }
        elseif (Request::is($uri) || Request::is($uri . '/*'))
        {
            return true;
        }

        return false;
    }
}
