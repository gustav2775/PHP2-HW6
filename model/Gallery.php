<?php

namespace app\model;

class Gallery extends ModelDb
{
    protected $id;
    protected $name;
    protected $size;
    protected $views;

    public function __construct($name = null, $size = null)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public static function getTableName()
    {
        return 'gallery';
    }
}
