<?php
namespace src\database;

abstract class DBManager
{
    
    protected $host;
    protected $username;
    protected $password;
    protected $db_name;
//    protected \PDO $connection;
    protected $connection;
    protected $dsn;
    protected $sql;
    protected $table;


    public function __construct($dbHostname,$dbUser,$dbPassword,$dbName)
    {
        $this->host=$dbHostname;
        $this->username =$dbUser;
        $this->password=$dbPassword;
        $this->db_name = $dbName;
        $this->dns($dbHostname, $dbName);
        $this->connect();
        
    }
    
    public abstract function dns($dbHost,$db_Name);
    public abstract function connect();
}
