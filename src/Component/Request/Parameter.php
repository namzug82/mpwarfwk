<?php

namespace src\Component\Request;


class Parameter {

    private $parameter;

    function __construct(Array $parameter)
    {
        $this->parameter = $parameter;
    }


    public function setParameter(Array $parameter)
    {
        $this->parameter = array_merge($this->parameter, $parameter);
    }

    public function getValue($key){
        if(!isset($this->parameter[$key])){
            throw new \Exception("Not a valid param!");
        }
        return $this->parameter[$key];
    }
}