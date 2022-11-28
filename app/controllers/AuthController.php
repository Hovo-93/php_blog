<?php
namespace app\controllers;

use src\routing\Controller;
use src\routing\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //todo get model name dynamic for example
        //User::select()->first();

        print_r($request->all());
    }

    public function signIn()
    {
        $welcome = "Welcome to our blog";
        $user = 'Guest';
        // compact ['welcome' => $welcome, 'user => $user];
        return self::view("auth/login", compact('welcome', 'user'));
    }
}