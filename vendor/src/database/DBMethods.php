<?php

namespace src\database;

interface DBMethods
{
    
    public function insert($params, $table);

    public function query($sql);

    public function from($table);

    public function get();

    public function first();

    public function select(...$params);

    public function update($params,$table);

    public function delete($params);

    public function where($field, $value, $condition = "=");

    public function andWhere($field, $value, $condition = "=");

    public function orWhere($field, $value, $condition = "=");

    public function orderBy($field, $sort="ASC");

    public function groupBy($field);

    public function limit($limit);

    public function offset($offset);

    public function like($field, $pattern="both");
}