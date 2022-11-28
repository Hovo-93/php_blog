<?php

use src\routing\Route;
use app\controllers\AuthController;


Route::get('/', function (){
    return view("dashboard");
});

Route::get('/test', function (){
    echo 'hello test';
});

Route::post('/login', [AuthController::class, 'login']);


Route::get('/login', [AuthController::class, 'signIn']);