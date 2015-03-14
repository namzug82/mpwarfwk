<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 15:10
 */

namespace src\component\Routes;

use Symfony\Component\Yaml\Parser;

class RoutingYml extends Routing{

    protected function parseConfigToArray()
    {
        $yaml = new Parser();
        $this->routingConfig = $yaml->parse(file_get_contents('../app/Config/yml/routingConfig.yml'));
    }

}