<?php

namespace src\routing;


class Route
{
    protected $request;
    protected $response;
    protected static $method;
    protected static $params;
    protected static $uri;
    protected static $routes = [];


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
        self::$method = $this->request->getMethod();
        self::$uri = $this->request->getUri();

    }
    

    public static function get(string $uri, callable $callable)
    {
        self::$routes[self::$method] = $callable;
    }


    public static function post(string $uri, callable $callable)
    {
        self::$routes[self::$method] = $callable;
    }


    public function run()
    {
        print_r(self::$routes);
    }
}