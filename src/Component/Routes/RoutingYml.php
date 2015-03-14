<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 15:10
 */

namespace src\component\Routes;



class RoutingYml extends Routing{

    protected function parseConfigToArray(){

        $this->routingConfig = require("../app/Config/php/routingConfig.php");
    }

}