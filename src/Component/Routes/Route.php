<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 16/03/2015
 * Time: 21:35
 */

namespace src\Component\Routes;


class Route {

    private $controller;
    private $method;
    private $params;

    function __construct($controller, $method, $params = array())
    {
        $this->controller = $controller;
        $this->method = $method;
        $this->params = $params;
    }


    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }



}