<?php
namespace src\database;

use src\database\DBMethods;


class Model extends DBManager implements DBMethods
{
//    use DBConnectValidation;

    private $values;
    private $fields;
    private $placholder;
    private $from;


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
        $this->placholder = implode(",", array_fill(0, count($params),"?"));

        $this->sql = "INSERT INTO {$table} ({$this->fields}) VALUES ({$this->placholder})";
//        echo $this->sql;
//        var_dump($this->prepare());
//        die();
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
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function first()
    {
        if(!empty($this->values)){
            $result = $this->prepare();

        }else{
            $result = $this->query();
        }
        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    public function select(...$params)
    {
        if(empty($params)){
            $this->placholder = " * ";
        }else{
            $this->placholder = implode(",", $params);
        }
        // func_get_args(); get function arguments by array type
        $this->sql = "SELECT {$this->placholder} ";


        return $this;
    }

    public function update($params,$table,$where=[])
    {

//        $sql = "UPDATE users SET name=?, surname=?, sex=? WHERE id=?";
//        $stmt= $pdo->prepare($sql);
//        $stmt->execute([$name, $surname, $sex, $id]);
        $this->fields =  array_keys($params);
        $this->placholder = implode(",", array_fill(0, count($params), "?"));
        $finalFields = [];
        for ($i=0; $i<count($this->fields);$i++){
                   array_push($finalFields,$this->fields[$i]."=". $this->placholder[0]);
        }
//        var_dump($finalFields);
        $this->values = array_values($params);
        $eachFields = implode(',',array_values($finalFields));//name=?,email=?,password=?,age=?
        $this->sql ="UPDATE {$table} SET {$eachFields}";

//        echo $this->sql;
//        var_dump($this->prepare());
//        die();
//        if(!empty($where)){
//
//            foreach ($where as $k=>$item){
//                $this->where($k,$item);
//            }
//        }
//        $this->prepare();
//        return $this;
    }

    public function delete($params)
    {
//        $sql = "DELETE FROM users WHERE id=?";
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
        $this->sql .= " or $field $condition ?";
        $this->values[] = $value;
        return $this;
    }

    public function orderBy($field, $sort = "ASC")
    {

        $this->sql.=" order by $field $sort";
//        $this->values[] =$value;
        return $this;
    }

    public function groupBy($field)
    {
        $this->sql .=" group by $field";
        return $this;
    }

    public function limit($limit)
    {
        $this->sql .=" limit $limit";
        return $this;
    }

    public function like($field, $value, $wildcard = "both")
    {
        // TODO: Implement like() method.
    }

}