<?php

namespace src\database;

class DBConnection
{
    use Singletone;
    private static array $connections = [];



    public static function getInstance(string $dsn, $userName, $pass): \PDO
    {
        $key = $dsn . $userName . ';' . $pass;
        print_r($key);
        if (isset(self::$connections[$key])) {

            return self::$connections[$key];
        }
        self::$connections[$key] = new \PDO($dsn, $userName, $pass);
        return self::$connections[$key];
    }



}