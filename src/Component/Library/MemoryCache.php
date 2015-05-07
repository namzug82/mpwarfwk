<?php

namespace src\Component\Library;


class MemoryCache extends DiskCache {

    private $memCache;
    public function __construct(){
        $this->memCache = new \Memcached();
        $this->memCache->addserver('localhost', 11211);
    }
    public function set($key, $component, $expiration)
    {
        return $this->memCache->set($key, $component,$expiration );

    }

    public function get($key)
    {
        return $this->memCache->get($key);

    }

    public function delete($key)
    {
        $this->memCache->delete($key);
    }
}