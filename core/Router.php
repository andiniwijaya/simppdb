<?php

class Router {

    private $routes = [];

    public function get($uri, $action){
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action){
        $this->routes['POST'][$uri] = $action;
    }

    public function run(){

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $route = $this->routes[$method][$uri] ?? null;

        if(!$route){
            echo "404";
            exit;
        }

        list($controller, $method) = explode('@', $route);

        require_once __DIR__ . '/../app/controllers/' . $controller . '.php';

        $object = new $controller;

        return $object->$method();
    }
}
