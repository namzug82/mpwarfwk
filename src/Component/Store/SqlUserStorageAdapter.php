<?php

namespace src\classes\storage;

use src\classes\exceptions\InvalidUserCredentialsException;



Abstract class SqlUserStorageAdapter implements UserStorageInterface
{
    protected $host;
    protected $database;
    protected $user;
    protected $password;
    protected $db;


    public function __construct($host = null, $database = null, $user = '', $password = '')
    {
        $this->host = $host;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
    }

    public function find($userEmail)
    {

        $this->initDB();
        $query = "select email, password from users where email = :userEmail limit 0,1";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":userEmail", $userEmail);

        $stmt->execute();
        $userRow = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$userRow) {
            throw new InvalidUserCredentialsException;
        }
        return $userRow;
    }

    public function save($userEmail, $password)
    {
        $this->initDB();
        $query = "INSERT INTO users SET email = :userEmail, password = :password";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":userEmail", $userEmail);
        $stmt->bindParam(":password", $password);

        return $stmt->execute();
    }


    abstract protected function initDB();

}