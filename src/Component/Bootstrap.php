<?php

namespace src\Component;

use src\component\Routes\RoutingPhp;
class Bootstrap {

    private $routing;

    public function __construct()
    {
        echo $this->url();
        $this->routing = new RoutingPhp($this->url());
    }

    public function execute(){

        $controller = $this->routing->controller();
        $newController = new $controller;
        $method = $this->routing->method();
        $newController->$method();


    }

    private function url(){
        return $_SERVER['REQUEST_URI'];
    }

}