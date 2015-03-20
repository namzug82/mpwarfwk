<?php


namespace src\Component\Services;
use src\Component\Config\Services;

class Container {

    private $config;

    public function __construct(){

        $services = new Services();
        $this->config = $services->config();


    }

    public function get($service){

        if(!isset($this->config[$service])){
            throw new \Exception("No está definido el servicio");
        }
        $arguments=array();
        foreach($this->config[$service]["Arguments"] as $argument){
            if(substr($argument,0,1) == '@'){
                $argument = ltrim($argument, '@');
                $arguments[] = $this->get($argument);
            }else{
                $arguments[] = new $argument;
            }
        }

        $reflector = new \ReflectionClass( $this->config[$service]['Controller'] );
        return $reflector->newInstanceArgs($arguments);

    }


}