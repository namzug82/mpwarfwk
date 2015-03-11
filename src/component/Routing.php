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
    private $url;
    function __construct($url)
    {
        $this->config = require("../config/routingConfig.php");
        $this->url = $url;

    }

    public function route(){
        return array_search($this->parseUrl(), $this->config);
    }

    public function parseUrl(){
        $param = explode("/", $this->url);

        return $param[1];
    }





}