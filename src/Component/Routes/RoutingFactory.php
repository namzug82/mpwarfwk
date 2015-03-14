<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 19:27
 */

namespace src\Component\Routes;


class RoutingFactory {
    public static function build($extension, $url)
    {
        $routing = "src\\component\\Routes\\Routing" . ucwords(strtolower($extension));

        if(class_exists($routing)) {
            return new $routing($url);
        }else {
            throw new \Exception("Invalid file type given.");
        }
    }
}