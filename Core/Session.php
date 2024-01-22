<?php
namespace Core;

class Session{

    public static function has($key){
        return static::get($key);
    }

    public static function put($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null){
        return $_SESSION['_flashed'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value){
        // dd($key);
        $_SESSION['_flashed'][$key] = $value;
    }
    
    public static function unflash(){
        unset($_SESSION['_flashed']);
    }
}