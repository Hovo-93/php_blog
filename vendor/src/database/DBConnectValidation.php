<?php

namespace src\database;

trait DBConnectValidation
{

    public function isValid()
    {
        try
        {
            $this->connection = new \PDO($this->dsn, $this->username, $this->password);
        }
        catch (\PDOException $PDO) {
            die ('DB Error');
        }
    }
}