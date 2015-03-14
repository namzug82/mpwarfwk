<?php

namespace src\Component;

use src\component\Routes\RoutingPhp;
use src\component\Routes\RoutingYml;
use src\component\Routes\RoutingJson;

class Bootstrap {

    private $routing;
    private $config;

    public function __construct()
    {
        //$this->routing = new RoutingPhp($this->url());
        //$this->routing = new RoutingYml($this->url());
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