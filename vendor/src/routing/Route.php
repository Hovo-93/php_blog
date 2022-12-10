<?php

namespace src\routing;


use app\controllers\AuthController;

class Route extends AuthController
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
    

    public static function get(string $uri,$callable)
    {
        self::$routes['get'][$uri] = $callable;
    }


    public static function post(string $uri, $callable)
    {
        self::$routes['post'][$uri] = $callable;
    }

    private function getRouteList()
    {
        $path = dirname(dirname(dirname(__DIR__)));//C:\OSPanel\domains\oop_lesson5\blog
//        $path = dirname((__DIR__),levels: 3);
        $route_list = scanner("$path/routes");///routes_listArray ( [0] => api.php [1] => web.php )
        foreach ($route_list as $route){
            if(file_exists("$path/routes/$route")){
                require_once "$path/routes/$route";//api.php web.php

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