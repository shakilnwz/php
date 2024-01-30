<?php

use Core\Response;

function ddie($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function urlIs($url)
{
    return $_SERVER["REQUEST_URI"] === $url;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function abort($responseCode = 404)
{
    http_response_code($responseCode);

    require base_path("views/{$responseCode}.php");

    die();
}



function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$path}");
}
