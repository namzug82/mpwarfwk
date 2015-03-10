<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 09/03/2015
 * Time: 20:49
 */

class Request {


    private $url;

    function __construct()
    {

        $this->url = $_SERVER['REQUEST_URI'];
    }
    public function url(){
        return $this->url;
    }



}