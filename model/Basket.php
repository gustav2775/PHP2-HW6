<?php

namespace app\model;
use app\engine\Db;

class Basket extends ModelDb
{
    protected $id;
    protected $id_session;
    protected $id_user;
    protected $id_product;
    protected $quantity;
    protected $name_product;
    protected $price;
    protected $imgProd;
    protected $views;
    protected $description;

    
    protected $prop = [
        'id_session' => false,
        'id_product' => false,
        'quantity' => false,
    ];

    public function __construct($id_session = null, $id_product = null, $quantity = null)
    {
        if (!is_null($id_session)) {
            $this->id_session = $id_session;
            $this->prop['id_session'] = true;
        }
        if (!is_null($id_product)) {
            $this->id_product = $id_product;
            $this->prop['id_product'] = true;
        }
        if (!is_null($quantity)) {
            $this->quantity = $quantity;
            $this->prop['quantity'] = true;
        }
    }

    public static function getTableName()
    {
        return 'basket';
    }

    public static function getBasket()
    {
        $sql="SELECT basket.id, basket.quantity , basket.id_product, basket.id_session, catalog.name_product, catalog.price, catalog.img_prod FROM basket, catalog WHERE basket.id_product = catalog.id AND basket.id_session =:id_session";
        $params[':id_session'] = session_id();
        return Db::getInstance()->queryAll($sql, $params);
    }
    public function getCount () {
        $sql="SELECT COUNT(id) AS count FROM basket WHERE id_session =:id_session";
        $params[':id_session'] = session_id();
        return Db::getInstance()->queryOne($sql, $params);
    }
}
