<?php

namespace app\models;
use src\database\Model;

class User extends Model
{
    public function getUserData(){
        return parent::select('email','password')->from($this->getClassName())->first();
    }
}


