<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 19:27
 */

namespace src\Component\Templating;


class TemplatingFactory {

    public static function build($template)
    {
        $templateEngine = "src\\component\\Templating\\" . ucwords(strtolower($template));

        if(class_exists($templateEngine)) {
            return new $templateEngine();
        }else {
            throw new \Exception("Invalid template engine type given.");
        }
    }
}