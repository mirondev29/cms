<?php

namespace Engine\Router;

class Router
{
    private array $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }

    private function getRoutes(): array
    {
        return include_once dirname(__DIR__, 2) . '/app/routes/routes.php';
    }

    public function dispatch(string $uri, string $method)
    {
        $route = $this->findRoute($uri, $method);

        if ($route) {
           $controller = $route->getAction();

           if (is_array($controller))
           {
               call_user_func($controller);
           }
        } else {
            $this->notFindRoute();
        }

    }

    public function notFindRoute(): void{
        echo 'error 404 | not found';
        exit();
    }

    private function initRoutes(): void
    {
        foreach ($this->getRoutes() as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    public function findRoute( string $uri, string $method): Route|false
    {
        if (!isset($this->routes[$method][$uri])){
            return false;
        }
        return $this->routes[$method][$uri];
    }


}