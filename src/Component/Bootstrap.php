<?php

namespace src\Component;

use src\component\Routes\RoutingPhp;

class Bootstrap {

    private $routing;
    private $config;

    public function __construct()
    {
        $this->routing = new RoutingPhp($this->url());
        $this->config = require("../app/Config/appConfig.php");

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