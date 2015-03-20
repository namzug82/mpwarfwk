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


        $capsule = new Capsule;

        $capsule->addConnection($databaseConfig);

        $capsule->bootEloquent();

    }

}