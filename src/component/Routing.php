<?php

namespace src\Component;

class Routing {

    private $config;
    private $url;
    function __construct($url)
    {
        $this->config = require(__DIR__."/../config/routingConfig.php");
        $this->url = $url;

    }

    public function route(){

        if(array_key_exists($this->parseUrl(), $this->config)){
            return $this->config[$this->parseUrl()];
        }
        throw new \Exception("mal mal");
    }

    public function parseUrl(){
        $param = explode("/", $this->url);

        return $param[1];
    }





}