<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 09/03/2015
 * Time: 20:48
 */
namespace src\component;

class Bootstrap {


    public function __construct()
    {
        echo "bootstrap";
    }

    public function execute(){
        $route = new Routing();
        var_dump($route->route($this->url()));
    }
    public function url(){
        return $_SERVER['REQUEST_URI'];
    }
}