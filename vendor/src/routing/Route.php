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
        self::$routes['get'][$uri] = $callable;
    }


    public static function post(string $uri, callable $callable)
    {
        self::$routes['post'][$uri] = $callable;
    }

    private function getRouteList()
    {
        $path = dirname(dirname(dirname(__DIR__)));
        $route_list = scanner("$path/routes");
        foreach ($route_list as $route){
            if(file_exists("$path/routes/$route")){
                require_once "$path/routes/$route";
            }
        }
    }

    public function run()
    {
        $this->getRouteList();

        if(!isset(self::$routes[self::$method][self::$uri])){
            die('Page not found!');
        }
        $callable = self::$routes[self::$method][self::$uri];
        call_user_func($callable, $this->request);
    }
}