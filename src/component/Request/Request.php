<?php


namespace src\Component\Request;


class Request {

    public $get;
    public $post;
    public $server;
    public $cookie;
    public $session;


    public function __construct(){
        $this->get     = new Parameter($_GET);
        $this->post    = new Parameter($_POST);
        $this->server  = new Parameter($_SERVER);
        $this->cookie  = new Parameter($_COOKIE);
        $this->session = new Session();
        $_GET = $_POST = $_SERVER = $_COOKIE = array();

    }

}