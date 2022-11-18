<?php

use src\routing\Route;
use app\controllers\AuthController;


Route::get('/test', function (){
    echo 'hello test';
});

Route::post('/login', [AuthController::class, '']);