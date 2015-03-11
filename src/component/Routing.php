<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 09/03/2015
 * Time: 20:49
 */
namespace src\component;

class Routing {



    function __construct()
    {


    }
    public function route($url){
        return explode("/", $url);
    }



}