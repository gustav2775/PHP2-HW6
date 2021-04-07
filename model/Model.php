<?php


namespace app\model;

use app\interfaces\{IModel,ITable};

abstract class Model implements IModel, ITable
{
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->prop)) {
            $this->prop[$name] = true;
        }
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->name);
    }
}
