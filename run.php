<?php

use src\database\Model;

require_once "./vendor/autoload.php";


//$db = new Model('127.0.0.1','blog','Test1234*','test_pdo'); Has
$db = new Model('127.0.0.1:3307','root','','test_pdo');

$name = 'murdfk';
$email = 'maasdrterk@l.ru';
$password = 'kar@mail';
$age = 66;
$params = [
    'name' => $name,
    'email'=> $email,
    'password'=> $password,
    'age' => $age,

];
//todo like this way
//User::insert($params);

$db->update($params,"users",['id'=>98]);

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

