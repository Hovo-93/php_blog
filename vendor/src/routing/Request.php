<?php

namespace src\routing;

class Request
{

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getParams()
    {
        return $_REQUEST;
    }

    public function getUri()
    {
        $uri =  $_SERVER["REQUEST_URI"];
        $pos = strpos($uri,'?');
        if($pos){
            return substr($uri,0, $pos);
        }

        return $uri;
    }

    public function all()
    {
        return $this->getParams();
    }

    public function input($key)
    {
        return $this->getParams()[$key]??null;
    }

}