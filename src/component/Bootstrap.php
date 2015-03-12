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
        dd($newController);
       // $newController->$route->route()[0];

    }
    public function url(){
        return $_SERVER['REQUEST_URI'];
    }
}