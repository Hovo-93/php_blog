<?php

namespace src\database;

trait Singletone
{
    private function __construct()
    {
    }
    public function __clone()
    {
        throw new Exception("You cannot clone this.");
    }

    public function __unserialize(array $data)
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }


}