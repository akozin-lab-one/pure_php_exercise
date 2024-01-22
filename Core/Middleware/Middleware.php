<?php
namespace Core\Middleware;

class Middleware{
    public const Map = [
        'guest' => Guest::class,
        'auth' => Auth::class   
    ];

    public static function resolve($key){
        // dd($key);
        if(!$key){
            return;
        }

        $middleware = Middleware::Map[$key];

        if(!$middleware){
            throw new \Exception(" no matching middleware found for key. '{$key}' .");
        }

        (new $middleware)->handle();
    }
}