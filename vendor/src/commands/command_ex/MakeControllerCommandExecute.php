<?php

namespace src\commands\command_ex;

use Symfony\Component\Console\Command\Command;

class MakeControllerCommandExecute
{
    public static function create($name)
    {
        $root_dir = dirname(__DIR__, '4');
        $path = "$root_dir/app/controllers/$name.php";

        if (!file_exists($path)) {
            $str = <<<END
<?php
namespace app\controllers;
use src\routing\Controller;            
class $name extends Controller
{
            
}
END;

            $file = file_put_contents($path, $str);
            if ($file) {
                return true;
            }
            return false;

        }

    }

}