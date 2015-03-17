<?php

namespace src\Component;


use src\component\Routes\Routing;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;




class Bootstrap {

    private $routing;
    private $config;

    public function __construct()
    {

        $this->config  = require("../app/Config/appConfig.php");
        $this->routing = new Routing ($this->url());
    }

    public function execute(){

        $controller = $this->routing->controller();
        $newController = new $controller;
        $method = $this->routing->method();
        $newController->$method();
        $isDevMode = true;
        $config = Setup::createYAMLMetadataConfiguration(array("../app/Config/yml"), $isDevMode);
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/db.sqlite',
        );
        $entityManager = EntityManager::create($conn, $config);
        //var_dump( $entityManager);




    }

    private function url(){

        return $_SERVER['REQUEST_URI'];

    }

}