<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 15:10
 */

namespace src\Component\Config;



class ConfigPhp implements ConfigInterface{


    public function routes()
    {
        return require("../app/Routing/php/routingConfig.php");
    }


}