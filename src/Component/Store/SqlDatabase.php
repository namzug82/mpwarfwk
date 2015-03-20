<?php

namespace src\Component\Store;

class SqlDatabase extends \PDO
{

    public function __construct($databaseConfig)
    {

        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        try {

            parent::__construct ($databaseConfig->getConfig("driver") .
            ':host=' .$databaseConfig->getConfig("host") .
            ';dbname=' . $databaseConfig->getConfig("database"),
            $databaseConfig->getConfig("username"),
            $databaseConfig->getConfig("password"),
            $options);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function selectAll($table, $fetchMode = \PDO::FETCH_ASSOC)
    {
        $sql = "SELECT * FROM $table;";
        $sth = $this->prepare($sql);
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    public function select($sql, $array = array(), $fetchMode = \PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    public function insert($table, $data)
    {
        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table ('$fieldNames') VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }

    public function update($table, $data, $where)
    {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }

    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }


}