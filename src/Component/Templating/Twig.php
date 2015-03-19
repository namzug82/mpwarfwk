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
    const PATH_TEMPLATES = '../app/View';
    public function __construct(\Twig_Loader_Filesystem $loader, \Twig_Environment $environment){

        $loader->setPaths( self::PATH_TEMPLATES );
        $environment->setLoader( $loader);
        $this->twigInstance      = $this->options($environment);
    }

    public function render($template,$name = null, $string = array())
    {
        return $this->twigInstance->render($template, array($name => $string));
    }

    private function options(\Twig_Environment &$environment){
        $config  = require("../app/Config/appConfig.php");
        $cache = '../app/View/cache';

        if($config["env"] = 'dev'){
            $environment->enableDebug();
            $environment->setCache(false);

        }else{
            $environment->disableDebug();
            $environment->setCache($cache);
        }
        return $environment;
    }



}