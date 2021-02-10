<?php

namespace app\engine;

class Autoload
{

    public function loadClass($className)
    {
        $className= str_replace('app',ROOT_DIR,$className);
        $className= str_replace('\\',DS,$className);
        
        $fileName = "{$className}.php";

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
