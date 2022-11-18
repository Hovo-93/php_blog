<?php

namespace src\routing;


class Route
{
    protected $request;
    protected $response;
    protected static $method;
    protected static $params;
    protected static $uri;



    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
        self::$method = $this->request->getMethod();
        self::$uri = $this->request->getUri();

    }

    protected static $routes = [];

    public static function get(string $uri, callable $callable)
    {
        self::$routes[self::$method] = $callable;
    }


    public static function post(string $uri, callable $callable)
    {
        self::$routes[self::$method] = $callable;
    }


    public static function run()
    {

    }
}