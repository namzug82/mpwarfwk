<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 19:27
 */

namespace src\Component\Routes;

use src\component\Routes\RoutingPhp;
use src\component\Routes\RoutingYml;
use src\component\Routes\RoutingJson;

class RoutingFactory {
    public static function build($extension, $url)
    {
        $routing = "Routing_" . ucwords(strtolower($extension));
        if(class_exists($routing)) {
            return new $routing($url);
        }else {
            throw new Exception("Invalid file type given.");
        }
    }
}