<?php

namespace src\component\Config;


class ConfigJson implements ConfigInterface{

    public function routes()
    {
        return json_decode(file_get_contents('../app/Routing/json/routingConfig.json'), true);
    }

}