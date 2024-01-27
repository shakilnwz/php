<?php


function routeToPath($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        //calling the abort function with a response code
        abort(404);
    }
}

//giving abort its own function with a default value of 404
function abort($responsCode = 404)
{
    http_response_code($responsCode);
    require base_path("views/{$responsCode}.php");
    die();
}

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$routes = require base_path("routes.php");
routeToPath($uri, $routes);
