<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 15:10
 */

<<<<<<< HEAD
namespace src\Component\Config;
=======
namespace src\component\Config;
>>>>>>> origin/develop



class ConfigPhp implements ConfigInterface{


    public function routes()
    {
        return require("../app/Config/php/routingConfig.php");
    }

    public function database()
    {
        return require("../app/Config/php/databaseConfig.php");
    }
}