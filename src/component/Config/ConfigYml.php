<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 15:10
 */

namespace src\component\Config;

use Symfony\Component\Yaml\Parser;

class ConfigYml implements ConfigInterface{

    private $yml;

    public function __construct(){
        $this->yml = new Parser();
    }
    public function routes()
    {
        return $this->yml->parse(file_get_contents('../app/Config/yml/routingConfig.yml'));
    }

    public function database()
    {
        return $this->yml->parse(file_get_contents('../app/Config/yml/databaseConfig.yml'));
    }
}