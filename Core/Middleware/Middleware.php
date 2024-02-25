<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        // end if key is not provided
        if (!$key) {
            return;
        }

        // access the middleware
        $middleware = static::MAP[$key] ?? false;

        // if middleware is not found or null
        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }
        // call handle on the middleware
        (new $middleware)->handle();
    }
}
