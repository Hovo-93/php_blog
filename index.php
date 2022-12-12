<?php

use app\models\User;
use app\models\News;
use src\database\Model;

require_once "./vendor/autoload.php";

$app = new \src\Application();

$app->run();





$m = new Model();
$n = new Model();
print_r('<br>');
echo  spl_object_id($m->getConnection()).PHP_EOL.spl_object_id($n->getConnection());
//print_r($m);
//print_r('<br>');
