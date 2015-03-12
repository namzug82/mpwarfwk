<?php

namespace src\Component;

class Bootstrap {

    private $routing;

    public function __construct()
    {
        $this->routing = new Routing($this->url());
    }

    public function execute(){

        $controller = $this->$routing->controller();
        $newController = new $controller;
        $newController->$this->$routing->method();

    }

    private function url(){
        return $_SERVER['REQUEST_URI'];
    }

}