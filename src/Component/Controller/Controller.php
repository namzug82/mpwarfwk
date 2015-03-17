<?php


namespace src\Component\Controller;


use src\Component\Templating\TemplatingFactory;


abstract class Controller {
    protected $template;


    public function __construct()
    {
        $config = require("../app/Config/appConfig.php");
        $this->template =  TemplatingFactory::build($config["templateEngine"]);
        //$this->template = $this->template->instance();
    }

}