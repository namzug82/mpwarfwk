<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 16/03/2015
 * Time: 15:53
 */

namespace src\Component;


class Model {
    protected $_model;

    function __construct() {

        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $this->_model = get_class($this);
        $this->_table = strtolower($this->_model)."s";
    }

    function __destruct() {
    }
}