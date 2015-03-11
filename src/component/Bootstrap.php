<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 09/03/2015
 * Time: 20:48
 */
namespace src\component;

class Bootstrap {


    public function __construct(Routing $request)
    {
        var_dump($request->url());
    }
}