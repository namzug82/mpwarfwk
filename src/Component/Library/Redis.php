<?php


namespace src\Component\Library;


use Predis\Client;

class Redis
{


    private $client;

    public function __construct()
    {

        
        $this->client = new Client('tcp://127.0.0.1:6379');

    }

    public function client()
    {
        return $this->client;
    }

}