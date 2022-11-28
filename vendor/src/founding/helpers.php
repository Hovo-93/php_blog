<?php
if(!function_exists('scanner')){
    function scanner($path)
    {
        $list = scandir($path);
        return array_slice($list, 2, count($list), );
    }
}


if(!function_exists('view')){
    function view($view, ...$params)
    {
        return \src\routing\Controller::view($view, ...$params);
    }
}