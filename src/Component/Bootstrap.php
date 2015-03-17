<?php

namespace src\Component;


<<<<<<< HEAD
use src\Component\Request\Request;
use src\Component\Routes\Routing;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use src\Component\Store\SqlDatabase;
=======
use src\component\Routes\Routing;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


>>>>>>> origin/develop


class Bootstrap {

    private $routing;
    private $config;

<<<<<<< HEAD


    public function __construct($config)
    {

        $this->config  = $config;

    }

    public function execute(Request $request){


        $this->routing = new Routing ($request, $this->config);
        $controller = $this->routing->controller();
        $newController = new $controller;
        $method = $this->routing->method();
        return $newController->$method();

        /*new SqlDatabase;
=======
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
>>>>>>> origin/develop
        $isDevMode = true;
        $config = Setup::createYAMLMetadataConfiguration(array("../app/Config/yml"), $isDevMode);
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/db.sqlite',
        );
        $entityManager = EntityManager::create($conn, $config);
<<<<<<< HEAD
        //var_dump( $entityManager);*/
=======
        //var_dump( $entityManager);
>>>>>>> origin/develop




    }

<<<<<<< HEAD
=======
    private function url(){

        return $_SERVER['REQUEST_URI'];

    }
>>>>>>> origin/develop

}