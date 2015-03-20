<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 19/03/2015
 * Time: 14:19
 */

namespace src\Component\Store;
use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent {

    public function __construct($databaseConfig){

        $config = array(
            'driver'    => $databaseConfig->getConfig("driver"),
            'host'      => $databaseConfig->getConfig("host"),
            'database'  => $databaseConfig->getConfig("database"),
            'username'  => $databaseConfig->getConfig("username"),
            'password'  => $databaseConfig->getConfig("password"),
            'charset'   => $databaseConfig->getConfig("charset"),
            'collation' => $databaseConfig->getConfig("collation"),
            'prefix'    => $databaseConfig->getConfig("prefix")
        );
        $capsule = new Capsule;

        $capsule->addConnection($config);

        $capsule->bootEloquent();

    }

}