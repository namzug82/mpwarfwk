<?php


namespace src\Component\Controller;


use src\Component\Config\Services;
use src\Component\Request\Request;
use src\Component\Services\Container;
use src\Component\Store\SqlDatabase;


abstract class Controller {

    protected $template;
    protected $database;
    protected $container;
    protected $request;


    public function __construct($appConfig, $databaseConfig, Request $request)
    {
        $this->request = $request;
        $this->template = $this->template();

        $db_type = $appConfig["db_type"];
       /* $this->database = new SqlDatabase(
            $db_type,
            $databaseConfig[$db_type]["host"],
            $databaseConfig[$db_type]["database"],
            $databaseConfig[$db_type]["user"],
            $databaseConfig[$db_type]["password"]
        );*/

    }
    private function template(){
        $services = new Services();
       return  $this->container = new Container($services->config());

    }
}