<?php

namespace src\Component;


use src\Component\Config\AppConfig;
use src\Component\Config\DatabaseConfig;
use src\Component\Config\Services;
use src\Component\Library\MemoryCache;
use src\Component\Request\Request;
use src\Component\Routes\Routing;


use src\Component\Services\Container;
use src\Component\Store\Eloquent;
use src\Component\Store\SqlDatabase;


class Bootstrap
{

    private $route;
    private $memcache;


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
    private function cacheGet($class, $method, $params = null ){
        $cacheKey = $this->generateCacheKey($class, $method, $params);

        if($cache = $this->memcache->get($cacheKey)){
            return $cache;
        }

        return false;
    }
    private function generateCacheKey($class, $method, array $params = null)
    {
        $key = $method;
        if ($params) {
            $key .= implode($params);
        }
        return $class . "_" . md5($key);

    }

    private function routing($request, $appConfig)
    {
        $routing = new Routing ($request, $appConfig);
        return $routing->route();
    }



}