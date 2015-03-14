<?php

namespace src\Component\Routes;

abstract class Routing {

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
        $this->parseUrl();
        $this->parseConfigToArray();

        foreach($this->routingConfig as $routeKey => $currentRoute){
            $route = trim(filter_var($routeKey, FILTER_SANITIZE_URL), '/');
            $route = explode('/', $route);

            if($this->isValidRoute($this->url, $route)) return $currentRoute;

        }

    }

    private function parseUrl()
    {
        $this->url = trim(filter_var($this->url, FILTER_SANITIZE_URL), '/');
        $this->url = explode('/', $this->url);
    }

    private function isValidRoute($url, $route)
    {
        return (count($url) == count($route) && $this->checkRoute($url, $route));
    }

    private function checkRoute($url, $route)
    {

        $isValid = true;
        for($i=0;$i<count($url);$i++){
            $urlSection   = $url[$i];
            $routeSection = $route[$i];

            if($param = $this->isParam($routeSection)){
                $this->saveParam( $urlSection,$param);
                continue;
            }
            if ($urlSection == $routeSection) continue;
            $isValid = false;
        }
        return $isValid;
    }

    private function isParam($paramRoute)
    {

        if(substr($paramRoute,0,1) == '{' && substr($paramRoute,-1) == '}'){
            return substr($paramRoute, 1, -1);
        }
        return false;
    }

    private function saveParam($url, $paramVar){
        $_GET[$paramVar] = $url;
    }

    abstract protected function parseConfigToArray();

}