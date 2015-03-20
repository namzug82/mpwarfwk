<?php

namespace src\Component;


use src\Component\Request\Request;
use src\Component\Routes\Routing;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use src\Component\Store\Eloquent;
use src\Component\Store\SqlDatabase;


class Bootstrap {

    private $route;


    public function execute(Request $request){

        new Eloquent($this->getDatabaseConfig());
        $this->route = $this->routing($request);
        $controller = $this->route->getController();
        $method = $this->route->getMethod();
        $newController = new $controller($this->getAppConfig(),$this->getDatabaseConfig(), $request );
        return call_user_func_array (array($newController,$method) , $this->route->getParams() );


    }

    private function getDatabaseConfig(){
        if($this->getEnvironment() === "pro"){
            return require("../app/Config/databaseConfig.php");
        }else{
            return require("../app/Config/dev/databaseConfig.php");
        }
    }

    private function routing($request){
        $routing = new Routing ($request, $this->getAppConfig());
        return $routing->route();
    }
     private function getEnvironment(){

         return $this->getAppConfig()["env"];
     }

    private function getAppConfig(){

        return  require("../app/Config/appConfig.php");
    }


}