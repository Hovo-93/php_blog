<?php
namespace app\controllers;

use app\models\User;
use src\routing\Controller;
use src\routing\Request;

class AuthController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user=new User();
    }

    public function login(Request $request)
    {
//        $user= new User();
        $userData = $this->user->getUserData();
        $email = $request->input('email');
        $password= $request->input('password');
        if ($email ===$userData['email'] && $password===$userData['password'] ){

            header('Location: /');
        }
        else{
                echo 'Rewrite password does not match';
        }
        //todo get model name dynamic for example
        //User::select()->first();

    }
    public function register(Request $request){
        if (!empty($request->getParams())){
                $email =$request->input('email');
                $name = $request->input('name');
                $password= $request->input('password');
                $re_password = $request->input('re_password');
                $params = [
                    'name' => $name,
                    'email'=> $email,
                    'password'=> $password,
                    'age'=>22,

                ];
                if ($password === $re_password){
                        print_r($this->user->insert($params,$this->user->getClassName()));
                        header('Location: /login');
                }
                else{
                    header('Location: /registration');
                }

            }

    }

    public function signIn()
    {
        $welcome = "Welcome to our blog";
        $user = 'Guest';
        // compact ['welcome' => $welcome, 'user => $user];
         self::view("auth/login", compact('welcome', 'user'));
    }

    public function signUp()
    {
        self::view("auth/register");
    }

}