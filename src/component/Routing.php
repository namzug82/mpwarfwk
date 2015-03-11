<?php

namespace src\component;

class Routing {

    private $config;
    private $url;
    function __construct($url)
    {
        $this->config = require(__DIR__."/../config/routingConfig.php");
        $this->url = $url;

    }

    public function route(){
        var_dump($this->parseUrl(),$this->config );


        return array_search($this->parseUrl(), $this->config);
    }

    public function parseUrl(){
        $param = explode("/", $this->url);

        return $param[1];
    }





}