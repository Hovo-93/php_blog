<?php

namespace src;

use app\models\User;
use src\routing\Request;
use src\routing\Response;
use src\routing\Route;

class Application
{
    protected Route $router;
    protected Request $request;
    protected Response $response;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Route($this->request, $this->response);
    }

    public function run()
    {
        $this->router->run();
    }
}