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
