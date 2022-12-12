<?php
namespace src\database;

abstract class DBManager
{
    

    protected \PDO $connection;
    protected $dsn;
    protected $sql;


    public function __construct($dbHostname,$dbUser,$dbPassword,$dbName)
    {
        $this->connection = DBConnection::getInstance($this->dns($dbHostname,$dbName),$dbUser,$dbPassword);
        
    }

    public function dns($dbHost,$db_name)
    {
        return "mysql:host=$dbHost;dbname=$db_name;";
    }


}
