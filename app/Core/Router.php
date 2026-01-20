<?php
namespace App\Core;
use eftec\bladeone\BladeOne;

class Router
{
    private array $routes = [];
    private BladeOne $blade;

    public function __construct(BladeOne $blade)
    {
        $this->blade = $blade;
    }

    public function get(string $uri, string $action){
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, string $action){
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        if($uri == '/')
            $uri = '/admin/dashboard';
        
        if (isset($this->routes[$requestMethod][$uri])) {
            [$controllerName, $methodName] = explode('@', $this->routes[$requestMethod][$uri]);
            $controllerClass = "App\\Controllers\\$controllerName";
            $controller = new $controllerClass($this->blade);
            $controller->$methodName();
            return;
        }

        $controllerClass = "App\\Controllers\\NotFoundController";
        $controller = new $controllerClass($this->blade);
        $controller->index();
    }
}
