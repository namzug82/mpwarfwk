<?php

namespace src\Component\Library;


use src\Component\Config\AppConfig;

class MemoryCache extends DiskCache {

    private $memCache;
    private $env;
    public function __construct(){
        $this->env = (new AppConfig())->environment();
        if("dev" != $this->env){
            $this->memCache = new \Memcached();
            $this->memCache->addserver('localhost', 11211);
        }

    }
    public function set($key, $component, $expiration)
    {
        if("dev" == $this->env){
            return null;
        }
        return $this->memCache->set($key, $component,$expiration );

    }

    public function get($key)
    {
        if("dev" == $this->env){
            return null;
        }
        return $this->memCache->get($key);

    }

    public function delete($key)
    {
        if("dev" == $this->env){
            return null;
        }
        $this->memCache->delete($key);
    }
}