<?php


namespace src\Component\Services;
class Container {

    private $config;

    public function __construct($config = null){
        if(is_null($config)){
            $this->config = require("../app/Config/services.php");
        }else{
            $this->config = $config;
        }

    }

    public function get($service){
        //$config = require("../app/Config/services.php");


        if(!isset($this->config[$service])){
            throw new \Exception("No está definido el servicio");
        }
        $arguments=array();
        foreach($this->config[$service]["Arguments"] as $argument){
           /* if(substr($argument,0,1) == '@'){
                $arguments[] = $this->get($argument);
            }*/
            $arguments[] = new $argument;
        }

        $reflector = new \ReflectionClass( $this->config[$service]['Controller'] );
        return $reflector->newInstanceArgs($arguments);

    }


}