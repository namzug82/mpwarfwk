<?php

namespace src\Component;


use src\Component\Request\Request;
use src\Component\Routes\Routing;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use src\Component\Store\SqlDatabase;


class Bootstrap {

    private $routing;
    private $config;



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
        $isDevMode = true;
        $config = Setup::createYAMLMetadataConfiguration(array("../app/Config/yml"), $isDevMode);
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/db.sqlite',
        );
        $entityManager = EntityManager::create($conn, $config);
        //var_dump( $entityManager);*/




    }


}