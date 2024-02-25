<?php

// set location for namespaced Router
use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';

// require the composers autoloader
require BASE_PATH . "vendor/autoload.php";

//start a session to use name
session_start();

//require the functions
require BASE_PATH . "Core/functions.php";


require base_path('bootstrap.php');

// create an instance of the router
$router = new Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

//try to catch exceptions
try {
    //try to route
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    //store errors into session
    Session::flash('errors', $exception->errors);
    // flash the email for passing to the view.
    Session::flash('old', $exception->old);
    //redirect to login if fails
    return redirect($router->previousUrl());
}

// unflash session
Session::unflash();
