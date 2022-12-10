<?php

use app\models\User;
use app\models\News;
require_once "./vendor/autoload.php";

$app = new \src\Application();

$app->run();

//$u =new User('127.0.0.1:3307','root','','test_pdo');
//var_dump($_SERVER);
//$n =new News('127.0.0.1:3307','root','','test_pdo');
//print_r($table = $u->getUserData());
//print_r($table = $u->getUserEmail());
//print_r($table = $u->getUserPassword());



//echo $table = $n->getClassName();
//$u->select('email','password')->from($table);
//var_dump($u);
