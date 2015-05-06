<?php


namespace src\Component\Library;



class Sphinx extends SphinxClient{

    public function __construct(){
        $this->SphinxClient();
        // Set the server
        $this->SetServer('localhost', 3312);

        $this->SetMatchMode(SPH_MATCH_ALL);
        $this->SetArrayResult(true);
    }

    public function search($query, $index){
        return $this->Query($query, $index);
    }
}