<?php

namespace src\component\Config;


class ConfigJson implements ConfigInterface{

    public function routes()
    {
        return json_decode(file_get_contents('../app/Config/json/routingConfig.json'), true);
    }

    public function database()
    {
        return json_decode(file_get_contents('../app/Config/json/databaseConfig.json'), true);
    }
}