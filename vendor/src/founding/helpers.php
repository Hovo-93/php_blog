<?php
if(!function_exists('scanner')){
    function scanner($path)
    {
        $list = scandir($path);
        return array_slice($list, 2, count($list), );//why offset 2 beacouse array[0]='.' [1]='..'
    }
}


if(!function_exists('view')){
    function view($view, ...$params)
    {
        return \src\routing\Controller::view($view, ...$params);
    }
}