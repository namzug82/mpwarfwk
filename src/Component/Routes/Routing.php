<?php

namespace src\Component\Routes;

use src\Component\Config\ConfigFactory;


class Routing {

    private $routingConfig;
    private $appConfig;
    private $request;


    function __construct($request, $config)
    {
        $this->request = strtolower($request->server->getValue('REQUEST_URI'));
        $this->appConfig = $config;
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
        $url = strtolower($this->request->server->getValue('REQUEST_URI'));
        $url = $this->parseUrl($url);
        $this->parseConfigToArray();

        foreach($this->routingConfig as $routeKey => $currentRoute){
            $route = trim(filter_var(strtolower($routeKey), FILTER_SANITIZE_URL), '/');
            $route = explode('/', $route);

            if($this->isValidRoute($url, $route)) return $currentRoute;

        }
        throw new \Exception("Route not exists");

    }

    private function parseUrl($url)
    {
        $url = trim(filter_var($url, FILTER_SANITIZE_URL), '/');
        return explode('/', $url);
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

        $this->request->get->setParameter(array($paramVar => $url));

    }

    private function parseConfigToArray(){

        $config =  ConfigFactory::build($this->appConfig["configType"]);
        $this->routingConfig = $config->routes();
    }

}