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
        $route = new Routing($this->url());
        var_dump(key($route->route()));
    }
    public function url(){
        return $_SERVER['REQUEST_URI'];
    }
}