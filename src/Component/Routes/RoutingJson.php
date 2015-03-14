<?php

namespace src\component\Routes;


class RoutingJson extends Routing{

    protected function parseConfigToArray()
    {
        $this->routingConfig = json_decode(file_get_contents('../app/Config/json/routingConfig.json'), true);

    }

}