<?php
namespace src\database;

use src\database\DBMethods;


class Model extends DBManager implements DBMethods
{
//    use DBConnectValidation;

    private $values;
    private $fields;
    private $placholder;


    public function dns($dbHost,$db_name)
    {
        $this->dsn = "mysql:host=$dbHost;dbname=$db_name;";
    }

    public function connect()
    {
        try
        {
            $this->connection = new \PDO($this->dsn, $this->username, $this->password);
            return $this;
        }
        catch (\PDOException $PDO) {
            return $PDO->getMessage();
        }
    }
    

    public function insert($params, $table)
    {
        $this->fields = implode(',', array_keys($params));
        $this->values = array_values($params);
        $this->placholder = implode(",", array_fill(0, count($params), "?"));

        $this->sql = "INSERT INTO {$table} ({$this->fields}) VALUES ({$this->placholder})";

        return $this->prepare();
    }

    protected function prepare()
    {
      $stmt = $this->connection->prepare($this->sql);
      $stmt->execute($this->values);
      $this->values = [];
      $this->sql = '';
      return $stmt;
    }

    public function query($sql = null)
    {
        if(!empty($sql)){
            $this->sql = $sql;
        }
        return $this->connection->query($this->sql);
    }

    public function offset($offset)
    {
        // TODO: Implement offset() method.
    }

    public function from($table)
    {
        $this->sql .= " From $table";
        return $this;
    }

    public function get()
    {
        if(!empty($this->values)){
            $result = $this->prepare();
        }else{
            $result = $this->query();
        }
        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    public function first()
    {
        //todo
    }

    public function select(...$params)
    {
        if(empty($params)){
            $this->placholder = " * ";
        }else{
            $this->placholder = implode(",", $params);
        }
        // func_get_args(); get function arguments by array type
        $this->sql = "Select {$this->placholder} ";

        return $this;
    }

    public function update($params)
    {
        // TODO: Implement update() method.
    }

    public function delete($params)
    {
        // TODO: Implement delete() method.
    }

    public function where($field, $value, $condition = "=")
    {
        $this->sql .= " where $field $condition ?";
        $this->values = [$value];
        return $this;
    }

    public function andWhere($field, $value, $condition = "=")
    {
        $this->sql .= " and $field $condition ?";
        $this->values[] = $value;
        return $this;
    }

    public function orWhere($field, $value, $condition = "=")
    {
        // TODO: Implement orWhere() method.
    }

    public function orderBy($field, $sort = "ASC")
    {
        // TODO: Implement orderBy() method.
    }

    public function groupBy($field)
    {
        // TODO: Implement groupBy() method.
    }

    public function limit($limit)
    {
        // TODO: Implement limit() method.
    }

    public function like($field, $value, $wildcard = "both")
    {
        // TODO: Implement like() method.
    }
}