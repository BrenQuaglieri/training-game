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
            'cible' => $target,
        ];
        $this->routes[] = $routeArray;
    }

    public function match()
    {

    }


    public function getRoutes()
    {
        return $this->routes;
    }
}
