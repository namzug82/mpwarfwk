<?php


namespace src\Component\Library\Contracts;


interface Cache
{

    public function set($key, $component, $expiration);

    public function get($key);

    public function delete($key);

    public function getKeyName($parameters);

}