<?php
namespace App\Helpers;

use \App\User;
use Auth;
use DB;
use Route;


class AppHelper{
    
    /**
     * Get current base route (using route name)
     * e.g : profile.show ==> profile
     * @return string current base route
     * 
     */
    public static function getCurrentBaseRoute(){
        $currRouteName = Route::currentRouteName();    
        $parts=explode(".",$currRouteName);
        $route=$parts[0];
        return $route;
    }

    

}