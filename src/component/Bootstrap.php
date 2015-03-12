<?php

namespace src\Component;

class Bootstrap {


    public function __construct()
    {
        echo "bootstrap";
    }

    public function execute(){
        $route = new Routing($this->url());
        $controller = key($route->route());
        $newController = new $controller();
        $method = $route->route()[$controller];
        var_dump($method);
        $newController->$method();

    }
    public function url(){
        return $_SERVER['REQUEST_URI'];
    }
}