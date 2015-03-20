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


class Bootstrap {

    private $route;


    public function execute(Request $request){

        $services = new Services();
        $container = new Container($services->config());
        $appConfig = $container->get("appConfig");
        //$databaseConfig = $container->get("databaseConfig");
        //new Eloquent($databaseConfig);
        //$database =  $container->get("SqlDatabase");//   new SqlDatabase($databaseConfig);

        $this->route = $this->routing($request);
        $controller = $this->route->getController();

        $method = $this->route->getMethod();




        $newController = new $controller($appConfig, $request );

        return call_user_func_array (array($newController,$method) , $this->route->getParams() );



    }



    private function routing($request){
        $routing = new Routing ($request, $this->getAppConfig());
        return $routing->route();
    }


    private function getAppConfig(){

        return  require("../app/Config/appConfig.php");
    }


}