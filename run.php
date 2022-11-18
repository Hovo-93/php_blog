<?php

use src\database\Model;

require_once "./vendor/autoload.php";


$db = new Model('127.0.0.1','blog','Test1234*','news'); //Has
//$db = new Model('127.0.0.1:3307','root','','test_pdo');

$params = [
    'name' => 'murdfkfff',
    'email'=> 'maasdrterk@l.ru',
    'password'=> 'kar@mail',
    'age' => 56,

];
//todo like this way
//User::insert($params);

$db->where('id', 15)->andWhere('age', 66)->update($params,"users");

//$db->where()->delete();

//$db->insert($params, "users");
//$users = $db->select("name",'age','id')
//    ->from("users")
//    ->where("id", 98,'>')
//    ->orderBy('age')
//    ->groupBy('age')
//    ->limit('10')
//    ->get();

//print_r($users);

//$db->insertDB('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',$params);
//$res =$db->query("SELECT * FROM users");

