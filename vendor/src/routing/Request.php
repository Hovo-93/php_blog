<?php

namespace src\routing;

class Request
{

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];

    }

    public function getParams()
    {
        return $_REQUEST;
    }

    public function getUri()
    {
        $uri =  $_SERVER["REQUEST_URI"];
        $pos = strpos($uri,'?');
        $clean = substr($uri,0,$pos);
        return $clean;
    }

}