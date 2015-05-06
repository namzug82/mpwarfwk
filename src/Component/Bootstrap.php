<?php

namespace src\Component;


use src\Component\Config\AppConfig;
use src\Component\Config\DatabaseConfig;
use src\Component\Config\Services;
use src\Component\Request\Request;
use src\Component\Routes\Routing;


use src\Component\Services\Container;
use src\Component\Store\Eloquent;
use src\Component\Store\SqlDatabase;


class Bootstrap
{

    private $route;


    public function execute(Request $request)
    {


            $container = new Container();
            $appConfig = $container->get("appConfig");

            $this->route = $this->routing($request, $appConfig);
            $controller = $this->route->getController();

            $method = $this->route->getMethod();
            $newController = new $controller($appConfig, $request);


            $value = call_user_func_array(array($newController, $method), $this->route->getParams());



        return $value;


    }


    private function routing($request, $appConfig)
    {
        $routing = new Routing ($request, $appConfig);
        return $routing->route();
    }


}