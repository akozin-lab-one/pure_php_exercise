<?php

use Core\Session;
use Core\ValidateException;
session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';

spl_autoload_register(function($class){
    // var_dump($class);
    $class = str_replace('\\', '/', $class);
    // var_dump(base_path($class) . '.php');
    require base_path($class . '.php');
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php');
$urI = parse_url($_SERVER["REQUEST_URI"])['path'];
// var_dump($_POST['_method']);
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
// var_dump($method);   

try {
    $router->route($urI, $method);
} catch (ValidateException $exception) {
    Session::flash('error',$exception->errors);
    Session::flash('old', $exception->old);
    redirect('/loginPage');
}

Core\Session::unflash();
