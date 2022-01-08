<?php

use App\Models\Menu;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\Crypt;

if (!function_exists('_e')) {
    function _e($string)
    {
        return Crypt::encryptString($string);
    }
}

if (!function_exists('_d')) {
    function _d($string)
    {
        return Crypt::decryptString($string);
    }
}


if(!function_exists('has_child_menu')){
    function has_child_menu($menu, $position = 'top'){
        if($menu){
            $childs = Menu::where("parent_id", $menu)->where("position", $position)->count();
            return $childs ? true : false;
        }else{
            return false;
        }
    }
}

if(!function_exists('get_child_menus')){
    function get_child_menus($menu, $position = 'top'){
        if($menu){
            $childs = Menu::where("parent_id", $menu)->orderBy("sort_order", "asc")->where("position", $position)->get();
            return $childs;
        }else{
            return false;
        }
    }
}

if(!function_exists('_config'))
{
    function _config($key)
    {
        if(!empty($key)){
            $setting = SiteConfig::where("key", $key)->first();
            return $setting ? $setting->value : '';
        }else{
            return '';
        }
    }
}