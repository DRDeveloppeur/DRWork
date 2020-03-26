<?php

namespace DRWork;

use App\Controller\ErrorController;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Router
{
    private $uri;
    private $routeInfo;
    private $dispatcher;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, $pos);
        }
        $this->dispatcher = simpleDispatcher(function(RouteCollector $r) {include __DIR__.'/../routes.php';});
    }
    
    public function load()
    {
        $this->routeInfo = $this->dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($this->uri));
        
        switch ($this->routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // ... 404 Method Not Found
                header("HTTP/1.0 404 Not Found");
                $class = new ErrorController;
                $class->notFound();
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                // ... 405 Method Not Allowed
                $allowedMethods = $this->routeInfo[1];
                break;
            case Dispatcher::FOUND:
                // ... 200 Call The Method
                if (is_array($this->routeInfo[1])) {
                    $handler = $this->routeInfo[1];
                    $class = $handler[0];
                    $action = $handler[1];
                    $class = new $class;
                    $class->$action();
                }elseif(is_string($this->routeInfo[1])) {
                    $route = explode('::', $this->routeInfo[1]);
                    $method = [new $route[0], $route[1]];
                }elseif(is_callable($this->routeInfo[1])) {
                    $method = $this->routeInfo[1];
                }
                call_user_func_array($method, $this->routeInfo[2]);
            break;
        }
    }
}