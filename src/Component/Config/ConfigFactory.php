<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 19:27
 */

namespace src\Component\Config;


class ConfigFactory {
    public static function build($extension)
    {
        $config = "src\\component\\Config\\Config" . ucwords(strtolower($extension));

        if(class_exists($config)) {
            return new $config();
        }else {
            throw new \Exception("Invalid file type given.");
        }
    }
}