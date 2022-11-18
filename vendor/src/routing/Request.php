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
        //todo get clean request uri without ? symbols
        return $_SERVER["REQUEST_URI"];
    }

}