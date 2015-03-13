<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 12/03/2015
 * Time: 19:12
 */

namespace src\Component;


class Request {

    public function get($field){
        if(!isset($_GET[$field])){
            throw new \Exception("no request field");
        }
        return $_GET[$field];
    }

    public function post($field){
        if(!isset($_POST[$field])){
            throw new \Exception("no request field");
        }
        return $_POST[$field];
    }

    public function session($field){
        if(!isset($_SESSION[$field])){
            throw new \Exception("no request field");
        }
        return $_SESSION[$field];
    }

    public function cookie($field){
        if(!isset($_COOKIE[$field])){
            throw new \Exception("no request field");
        }
        return $_COOKIE[$field];
    }

    public function server($field){
        if(!isset($_SERVER[$field])){
            throw new \Exception("no request field");
        }
        return $_SERVER[$field];
    }

    public function file($field){
        if(!isset($_FILE[$field])){
            throw new \Exception("no request field");
        }
        return $_FILE[$field];
    }

    public function all(){
       return $_REQUEST;
    }
}