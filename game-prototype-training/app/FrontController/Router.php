<?php

namespace MyApp\FrontController;

class Router
{
    public $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function addRoute(String $route, string $target)
    {
        $routeArray = [
            'route' => $route,
            'target' => $target,
        ];
        $this->routes[$route] = $routeArray;
    }

    public function match(string $url)
    {
        if (!isset($this->routes[$url])) {
            return false;
        }
        return $this->routes[$url];
    }


    public function getRoutes()
    {
        return $this->routes;
    }
}
