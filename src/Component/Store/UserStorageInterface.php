<?php

namespace src\classes\storage;


interface UserStorageInterface
{
    public function save($email, $password);

    public function find($userEmail);
}