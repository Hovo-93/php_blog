<?php

namespace src\routing;

use app\models\User;

class Controller
{
    public static function view($view, ...$params)
    {
        if(file_exists("resources/views/$view.php")){
            if (!empty($params)){
                foreach ($params as $key => $item){
                    if(is_array($item)){
                        foreach ($item as $k => $val){
                            $$k = $val;
                        }
                    }else{
                        $$key = $item;
                    }
                }
            }
            require_once "resources/views/$view.php";
        }
    }
}