<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 16/03/2015
 * Time: 16:33
 */

namespace src\Component\config;


interface ConfigInterface {
    public function routes();
    public function database();
}