<?php


namespace src\Component\Config;

use Symfony\Component\Yaml\Parser;

class ConfigYml implements ConfigInterface{

    private $yml;

    public function __construct(){
        $this->yml = new Parser();
    }
    public function routes()
    {
        return $this->yml->parse(file_get_contents('../app/Routing/yml/routingConfig.yml'));
    }

}