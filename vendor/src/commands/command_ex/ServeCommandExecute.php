<?php

namespace src\commands\command_ex;

class ServeCommandExecute
{

    public static function serve()
    {
        echo `php -S 127.0.0.1:8000`;
    }

}