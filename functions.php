<?php

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

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$path}");
}
