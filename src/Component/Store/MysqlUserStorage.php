<?php

namespace src\classes\storage;


final class MysqlUserStorage extends SqlUserStorageAdapter
{


    protected function initDB()
    {

        try {
            if ($this->db === null) {
                $this->db = new \PDO("mysql:dbname={$this->database};host={$this->host}", $this->user, $this->password);
            }
        } catch (\PDOException $exception) {

            echo "Error: " . $exception->getMessage() . "\n\n";
        }
    }
}