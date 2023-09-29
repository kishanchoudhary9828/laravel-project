<?php // Code within app\Helpers\Helper.php

use App\Models\Country;
use App\Models\State;
class Helper
{
    // public static function shout(string $string)
    // {
    //     return strtoupper($string);
    // }

    public static function country(){
        $country=Country::select('name','id')->get();
     return $country;
    }

   
}
 
 
    