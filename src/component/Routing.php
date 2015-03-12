<?php

namespace src\Component;

class Routing {

    private $routingConfig;
    private $url;
    function __construct($url)
    {
        $this->routingConfig = require($_SERVER["DOCUMENT_ROOT"]."/../app/Config/routingConfig.php");
        $this->url = $url;

    }

    public function controller()
    {
        var_dump($this->route());
        return key($this->route());
    }

    public function method()
    {
        return $this->route()[key($this->route())];
    }

    private function route()
    {
        if(!array_key_exists($this->parseUrl(), $this->routingConfig)){
            throw new \Exception("No existe la ruta en el fichero de configuración");
        }
        return $this->routingConfig[$this->parseUrl()];
    }

    private function parseUrl()
    {
        $param = explode("/", $this->url);

        return $param[1];
    }



}