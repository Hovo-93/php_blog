<?php

use src\database\Model;

require_once "./vendor/autoload.php";


$db = new Model('127.0.0.1','blog','Test1234*','news');

$name = 'Ivan';
$email = 'ivgg@mail.ru';
$password = 'test123';
$params = [
    'name' => $name,
    'email'=> $email,
    'password'=> $password
];
//todo like this way
//User::insert($params);


//$db->insert($params, "users");
$users = $db->select("name", "email", "password")
    ->from("users")
    ->where("id", 1)
    ->andWhere("age", 20, ">")
    ->get();

print_r($users);

//$db->insertDB('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',$params);
//var_dump($db->query("SELECT name, email FROM USERS"));

