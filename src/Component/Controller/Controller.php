<?php


namespace src\Component\Controller;


use src\Component\Library\MemoryCache;
use src\Component\Request\Request;
use src\Component\Services\Container;



abstract class Controller
{

    protected $container;
    protected $request;
    protected $memcache;


    public function __construct($appConfig, Request $request)
    {
        $this->request = $request;
        $this->container = new Container();
        $this->memcache = new MemoryCache();

    }

    protected function generateCacheKey($class, $method, array $params = null)
    {
        $key = $method;
        if ($params) {
            $key .= implode($params);
        }
        return $class . "_" . md5($key);

    }

    protected function cacheGet($class, $method, $params = null ){
        $cacheKey = $this->generateCacheKey($class, $method, $params);

        if($cache = $this->memcache->get($cacheKey)){
            return $cache;
        }

        return false;
    }

}