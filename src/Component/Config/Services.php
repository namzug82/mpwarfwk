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
        return array (

            'Twig' => array(
                "Controller" => 'src\Component\Templating\Twig',
                "Arguments" => array('\Twig_Loader_Filesystem', '\Twig_Environment')
            ),
            'Smarty' => array(
                "Controller" => 'src\Component\Templating\Smarty',
                "Arguments" => array('\Smarty')
            ),


        );
    }
}