<?php


namespace src\Component\Library;


class Redis {


    private $client;
    public function __construct(){

        $client = new Predis\Client();
    }
}