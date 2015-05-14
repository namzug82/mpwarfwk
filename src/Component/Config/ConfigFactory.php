<?php

namespace src\Component\Config;


class ConfigFactory {
    public static function build($extension)
    {
        $config = "src\\Component\\Config\\Config" . ucwords(strtolower($extension));

        if(class_exists($config)) {
            return new $config();
        }else {
            throw new \Exception("Invalid file type given.");
        }
    }
}