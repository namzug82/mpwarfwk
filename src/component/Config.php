<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 12/03/2015
 * Time: 19:17
 */

namespace src\Component;


class Config {
    public static function detect(){
        $config = require("../app/Config/appConfig.php");
        return $config["configType"];
    }
}