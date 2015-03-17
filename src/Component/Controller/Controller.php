<?php


namespace src\Component\Controller;


<<<<<<< HEAD

=======
use src\Component\Templating\TemplatingFactory;
>>>>>>> origin/develop


abstract class Controller {
    protected $template;


    public function __construct()
    {
<<<<<<< HEAD

=======
        $config = require("../app/Config/appConfig.php");
        $this->template =  TemplatingFactory::build($config["templateEngine"]);
>>>>>>> origin/develop
        //$this->template = $this->template->instance();
    }

}