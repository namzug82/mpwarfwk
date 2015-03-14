<?php

namespace src\Component;


use src\component\Routes\RoutingFactory;

class Bootstrap {

    private $routing;
    private $config;

    public function __construct()
    {

        $this->config  = require("../app/Config/appConfig.php");
        $this->routing =  RoutingFactory::build($this->config["configType"], $this->url());
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