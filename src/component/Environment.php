<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 12/03/2015
 * Time: 17:59
 */

namespace src\Component;

class Environment {
    private $environment;
    function __construct()
    {
        $this->environment = require("../app/Config/appConfig.php");

    }

    public function detect(){
        var_dump($this->environment);
    }
}