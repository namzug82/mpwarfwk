<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 20:54
 */

namespace src\Component\Templating;


interface TemplatingInterface {

    public function render($template,$name, $string);

}