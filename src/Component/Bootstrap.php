<?php

namespace src\Component;


use src\Component\Request\Request;
use src\Component\Routes\Routing;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use src\Component\Store\SqlDatabase;


class Bootstrap {

    private $route;
    private $config;
    private $databaseConfig;

    public function __construct($config, $databaseConfig)
    {
        $this->config  = $config;
        $this->databaseConfig  = $databaseConfig;
    }

    public function execute(Request $request){


        $routing = new Routing ($request, $this->config);
        $this->route = $routing->route();
        $controller = $this->route->getController();
        $method = $this->route->getMethod();
        $newController = new $controller($this->config,$this->databaseConfig );
        return call_user_func_array (array($newController,$method) , $this->route->getParams() );

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

    public function getDatabaseConfig($database){

    }


}