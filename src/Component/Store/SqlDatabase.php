<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 16/03/2015
 * Time: 15:55
 */

namespace src\Component\Store;

<<<<<<< HEAD
use src\Component\Config\ConfigFactory;

class SqlDatabase {
=======

abstract class SqlDatabase {
>>>>>>> origin/develop

    protected $dbHandler;
    protected $result;
    private $host;
    private $user;
    private $pass;
    private $dbname;

    public function __construct(){
        $config  = require("../app/Config/appConfig.php");
<<<<<<< HEAD
        if($config["env"] == 'dev'){
            $config  = require("../app/Config/dev/databaseConfig.php");
        }else{
            $config  = require("../app/Config/databaseConfig.php");
        }
        $config =  ConfigFactory::build($config["configType"]);
        var_dump($config->database()["mysql"]);
        $this->host = $config->database()["mysql"]["host"];
        $this->user = $config->database()["mysql"]["user"];
        $this->pass = $config->database()["mysql"]["password"];
        $this->dbname = $config->database()["mysql"]["database"];
    }
    //abstract protected function connect();
    //abstract protected function disconnect();
=======
        $config =  ConfigFactory::build($config["configType"]);
        $this->host = $config->routes();
        $this->user = $config->routes();
        $this->pass = $config->routes();
        $this->dbname = $config->routes();
    }
    abstract protected function connect();
    abstract protected function disconnect();
>>>>>>> origin/develop

    public function query($query) {
        $this->result = $this->dbHandler->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
}