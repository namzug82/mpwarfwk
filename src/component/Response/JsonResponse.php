<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 16/03/2015
 * Time: 20:19
 */

namespace src\Component\Response;


class JsonResponse extends Response{

    public function send(){

        if(!is_array($this->content)){
            $this->content = array($this->content);
        }

        return json_encode($this->content);
    }
}