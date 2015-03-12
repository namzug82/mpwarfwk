<?php

namespace src\Component;

class Routing {

    private $routingConfig;
    private $url;
    function __construct($url)
    {
       $config = Config::detect();
        $this->routingConfig = require("../app/Config/".$config."/routingConfig.".$config);
        $this->url = $url;


    }

    public function controller()
    {
        return key($this->route());
    }

    public function method()
    {
        return $this->route()[key($this->route())];
    }

    private function route()
    {
        $route = $this->parseUrl();
        if(!array_key_exists($route, $this->routingConfig)){
            throw new \Exception("No existe la ruta en el fichero de configuración");
        }
        return $this->routingConfig[$route];
    }

    private function parseUrl()
    {

        $path = '/';

        if($this->url != '/'){
            $path = substr($this->url, 1);
            /*$path = explode("/", $this->url);
            unset($path[0]);
            $path = array_values($path);*/
        }

        return $path;
    }


}