<?php

use Core\Response;

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    die();
};

function abort($status = 404){
    http_response_code($status);

    require view($status . '.php');

    die();
}

function autherize($condition){
    // var_dump($condition);
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}

function base_path($path)
{
    // dd(BASE_PATH . ($path));
    return BASE_PATH . ($path);
}


function view($path, $attribute = [])
{   
    extract($attribute);
    // dd(base_path('views/' . $path));
    return base_path('views/' . $path);
}

function redirect($path){
    header("location: {$path}");
    exit();
}

function login($email){
    // dd($email);
    $_SESSION['user'] = [
        'user' => $email
    ];

    session_regenerate_id(true);
}

function logout(){
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '',time() - 3600, $params['path']);
}

function old($key, $default = ''){
    return Core\Session::get('old')[$key] ?? $default;
}