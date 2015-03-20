<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 19/03/2015
 * Time: 12:56
 */

namespace src\Component\Config;


class Services {

    public function config(){
        return array_merge(array (

            'Twig' => array(
                "Controller" => 'src\Component\Templating\Twig',
                "Arguments" => array('\Twig_Loader_Filesystem', '\Twig_Environment')
            ),
            'Smarty' => array(
                "Controller" => 'src\Component\Templating\Smarty',
                "Arguments" => array('\Smarty')
            ),
            'appConfig' => array(
                "Controller" => 'src\Component\Config\AppConfig',
                "Arguments" => array()
            ),
            'databaseConfig' => array(
                "Controller" => 'src\Component\Config\DatabaseConfig',
                "Arguments" => array('@appConfig')
            ),
            'SqlDatabase' => array(
                "Controller" => 'src\Component\Store\SqlDatabase',
                "Arguments" => array('@databaseConfig')
            ),
            'Eloquent' => array(
                "Controller" => 'src\Component\Store\Eloquent',
                "Arguments" => array('@databaseConfig')
            ),
            'LanguageConfig' => array(
                "Controller" => 'app\Config\Language',
                "Arguments" => array()
            ),
            'Language' => array(
                "Controller" => 'src\Component\Language\Language',
                "Arguments" => array('@LanguageConfig')
            ),


        ),require("../app/Config/services.php"));

    }
}