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


    public function __construct($appConfig, Request $request)
    {
        $this->request = $request;
        $this->template = new Container();
        $this->container = new Container();



    }
   /* private function template(){
        $services = new Services();
       return  $this->container = new Container($services->config());

    }*/
}