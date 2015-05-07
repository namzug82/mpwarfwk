<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 12/03/2015
 * Time: 19:12
 */

namespace src\Component\Response;


class Response {

    protected $content;
    protected $status;

    public function __construct($content, $status = 200)
    {
        $this->status = $status;
        $this->content = $content;
    }

    public function send(){
        if($this->status != 200){
            header("HTTP/1.0 404 Not Found");

        }
        header( "Cache-Control: public, max-age=60, smaxage=60" );
        echo $this->content;
    }

    public function redirect($url){
        Header( "HTTP/1.1 301 Moved Permanently" );
        Header( "Location: ".$url );
    }

}