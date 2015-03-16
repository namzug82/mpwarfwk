<?php


namespace src\Component\config;


class Config {

    private $configFile;

    public function __construct(){
        $this->configFile = require("../app/Config/appConfig.php");
    }
    public function configFileType(){

        return $this->configFile["configType"];
    }

    public function environment(){

        return $this->configFile["env"];
    }
}