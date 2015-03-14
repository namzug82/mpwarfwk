<?php

namespace src\Component\Routes;

abstract class Route {

    protected $routingConfig;
    private $url;
    function __construct($url)
    {
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
        var_dump($this->parseConfigToArray());
        /*foreach($this->routingConfig as $currentRoute){
            $route = trim(filter_var($currentRoute, FILTER_SANITIZE_URL), '/');
            $route = explode('/', $route);
            if(isValidRoute($this->url, $route)) var_dump($this->url, $currentRoute, $_GET);
        }
        $route = $this->parseUrl();
        if(!array_key_exists($route, $this->routingConfig)){
            throw new \Exception("No existe la ruta en el fichero de configuración");
        }
        return $this->routingConfig[$route];*/
    }

    private function parseUrl()
    {
        $url = trim(filter_var($this->url, FILTER_SANITIZE_URL), '/');
        return explode('/', $url);
    }

    function isValidRoute($url, $route)
    {

        if(count($url) != count($route)) {
            return false;
        }
        return checkRoute($url, $route);
    }

    function checkRoute($url, $route)
    {

        $isValid = true;
        for($i=0;$i<count($url);$i++){

            $urlSection   = $url[$i];
            $routeSection = $route[$i];

            if($param = isParam($routeSection)){
                saveParam( $urlSection,$param);
                continue;
            }

            if ($urlSection == $routeSection) continue;
            $isValid = false;
        }
        return $isValid;
    }

    function isParam($paramRoute)
    {

        if(substr($paramRoute,0,1) == '{' && substr($paramRoute,-1) == '}'){

            return substr($paramRoute, 1, -1);
        }
        return false;
    }

    function saveParam($url, $paramVar){
        $_GET[$paramVar] = $url;
        var_dump($_GET);
    }

    abstract protected function parseConfigToArray();

}