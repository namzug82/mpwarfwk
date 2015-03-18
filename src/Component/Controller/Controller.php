<?php


namespace src\Component\Controller;


use src\Component\Store\SqlDatabase;


abstract class Controller {

    protected $template;
    protected $database;


    public function __construct($appConfig, $databaseConfig)
    {

        $db_type = $appConfig["db_type"];
        $this->database = new SqlDatabase(
            $db_type,
            $databaseConfig[$db_type]["host"],
            $databaseConfig[$db_type]["database"],
            $databaseConfig[$db_type]["user"],
            $databaseConfig[$db_type]["password"]
        );
        //$this->template = $this->template->instance();
    }

}