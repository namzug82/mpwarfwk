<?php


namespace src\Component\Controller;


use src\Component\Config\Services;
use src\Component\Request\Request;
use src\Component\Services\Container;
use src\Component\Store\SqlDatabase;


abstract class Controller {

    protected $container;
    protected $request;


    public function __construct($appConfig, Request $request)
    {
        $this->request = $request;
        $this->container = new Container();
    }

}