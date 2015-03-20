<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 16/03/2015
 * Time: 21:24
 */

namespace src\Component\Request;


class Session {

    private $session;

    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->session = $_SESSION;
    }

    public function getValue($key){
        if(!isset($this->session[$key])){
           return false;
        }
        return $this->session[$key];
    }

    public function setValue($key, $value){
         $this->session[$key] = $value;
        $_SESSION[$key] = $value;
    }

    public function close(){
        session_destroy();
    }


}