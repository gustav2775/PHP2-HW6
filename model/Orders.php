<?php

namespace app\model;

class Orders extends ModelDb
{
    protected $id_order;
    protected $id_user;
    protected $user_name;
    protected $number;
    protected $email;
    protected $city;
    protected $status;
    
    protected $prop = [
        'id_user' => false,
        'user_name' => false,
        'number' => false,
        'email' => false,
        'city' => false,
        'status' => false
    ];


    public function __construct($id_order = null, $id_user = null)
    {
        $this->login = $id_order;
        $this->id_user = $id_user;
    }

    public static function getTableName()
    {
        return 'orders';
    }
}
