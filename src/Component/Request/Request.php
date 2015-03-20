<?php


namespace src\Component\Request;


class Request {

    public $get;
    public $post;
    public $server;
    public $cookie;
    public $session;


    public function __construct(Session $session){
        $this->get     = new Parameter($_GET);
        $this->post    = new Parameter($_POST);
        $this->server  = new Parameter($_SERVER);
        $this->cookie  = new Parameter($_COOKIE);
        $this->session = $session;
        $_GET = $_POST = $_SERVER = $_COOKIE = array();

    }

    public function isAjaxRequest(){
         return strtolower($this->server->getValue('HTTP_X_REQUESTED_WITH')) == 'xmlhttprequest';
    }

}