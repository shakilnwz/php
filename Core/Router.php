<?php

namespace Core;


use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller, $middleware = null)
    {

        $this->routes[] = compact('uri', 'controller', 'method', 'middleware');
        return $this;
    }


    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    //for adding filter
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            //route if found
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                // use the resolve method from Middleware
                Middleware::resolve($route['middleware']);

                return require base_path("Http/controllers/{$route['controller']}");
            }
        }
        //abort
        $this->abort();
    }
    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];   # code...
    }
    protected function abort($responseCode = 404)
    {
        http_response_code($responseCode);

        require base_path("views/{$responseCode}.php");

        die();
    }
};
