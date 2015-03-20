<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 20/03/2015
 * Time: 19:41
 */

namespace src\Component\Language;


class Language {

    private $language;

    public function __construct(\app\Config\Language $language)
    {
        $this->language = $language->get();
    }

    public function get($key, $language)
    {
        return $this->language[$language][$key];
    }
}