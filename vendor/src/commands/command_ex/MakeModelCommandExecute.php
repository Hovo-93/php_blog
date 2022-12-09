<?php

namespace src\commands\command_ex;

use src\database\Model;

class MakeModelCommandExecute
{
    public static function create($name)
    {
        $root_dir = dirname(__DIR__, '4');
        $path = "$root_dir/app/models/$name.php";
        if(!file_exists($path))
        {
            $str = <<<END
<?php 
namespace app\models;

use src\database\Model;

class $name extends  Model
{

}
END;

            if(file_put_contents($path, $str))
                return  true;
        }
        return false;
    }
}