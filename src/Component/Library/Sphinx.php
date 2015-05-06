<?php


namespace src\Component\Library;


use Foolz\SphinxQL\Connection;
use Foolz\SphinxQL\SphinxQL;

class Sphinx {

    private $conn;
    private $index;
    private $query;
    public function __construct($index){
        $this->conn = new Connection();
        $this->conn->setParams(array('host' => '127.0.0.1', 'port' => 9313));
        $this->index = $index;
        $this->query = SphinxQL::create($this->conn);
    }

    public function search($select){

            $this->query
            ->select($select)
            ->from($this->index);


    }
    public function match($field, $match){
        $this->query->match($field, $match);

    }
    public function where($field, $value, $comparation = "="){

        $this->query->where($field, $comparation, $value);

    }
    public function execute(){
        return $this->query->execute();
    }
    public function limit($offset, $limit){
        $this->query->limit($offset, $limit);
    }
}