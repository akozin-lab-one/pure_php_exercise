<?php
namespace Core;

class Validator{
    public static function string($value, $min = 1, $max = INF){
        $str = strlen($value);
        // dd($str);
        // dd($str >= $min && $str <= $max);
        return $str >= $min && $str <= $max;
    }

    public static function email($value){
        // dd($value);
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}