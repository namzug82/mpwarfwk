<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 09/03/2015
 * Time: 20:49
 */
namespace src\component;

class Routing {

    private $config;

    function __construct()
    {
        $this->config = require("config/routingConfig.php");

    }

    public function Controller(){
        var_dump($this->config);
    }

    public function parseUrl($url){
        $param = explode("/", $url);
        var_dump($this->config);
        return $param[1];
    }



}