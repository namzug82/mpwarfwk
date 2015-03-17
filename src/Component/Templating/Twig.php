<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 20:24
 */

namespace src\Component\Templating;


class Twig implements TemplatingInterface {
    private $twigInstance;
    public function __construct(){

        $options = $this->options();
        $loader                 = new \Twig_Loader_Filesystem( '../app/View' );
        $this->twigInstance      = new \Twig_Environment( $loader, $options );
    }

    public function render($template,$name, $string)
    {
        echo $this->twigInstance->render($template, array($name => $string));
    }

    private function options(){
        $config  = require("../app/Config/appConfig.php");
        ($config["env"] = 'prod')? $debug = false : $debug = true;

        return array(
            'cache'  => '../app/View/cache',
            'debug'  => $debug,
            'autoscape' => true,
        );
    }



}