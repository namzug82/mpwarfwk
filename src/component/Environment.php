<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 12/03/2015
 * Time: 17:59
 */

namespace src\Component;

class Environment {

    public static function detect(){
        $environment = require("../app/Config/appConfig.php");

        return $environment["env"];
    }

}