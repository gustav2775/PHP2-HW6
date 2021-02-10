<?php

namespace app\controllers;

use app\model\Basket;
use app\engine\{Request};

class BasketController extends Controller
{
    public function actionBasket()
    {
        $basket = Basket::getBasket();
        
        echo $this->renderLayouts("basket", [
            "basket" => $basket
        ]);
    }
    public function actionBuy()
    {
        $id = (new Request())->getParams()['id'];
        $basket = new Basket(session_id(), $id, 1);
        $basket->insert();
    }
    public function actionDelete(){
        $id = (new Request())->getParams()['id'];
        $basket = Basket::getOne($id);
        $basket->delete();
    }
}
