<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 20/03/2015
 * Time: 15:40
 */

namespace src\Component\Config;


class DatabaseConfig {

    private $configFile;

    public function __construct(AppConfig $appConfig){

        $this->configFile = $this->environmentConfig($appConfig);
    }
    public function getConfig($config){

        return $this->configFile[$config];
    }

    private function environmentConfig(AppConfig $appConfig){

        if($appConfig->environment() === "pro"){
            return require("../app/Config/databaseConfig.php");
        }else{
            return require("../app/Config/dev/databaseConfig.php");
        }
    }
}