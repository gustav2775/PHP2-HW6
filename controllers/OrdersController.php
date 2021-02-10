<?php

namespace app\controllers;

use app\model\Orders;
use app\model\Users;
use app\engine\Request;
use app\engine\Session;

class OrdersController extends Controller
{
    public function actionOrders()
    {
        $id = (new Session())->getSession()['id'];
        var_dump($_SESSION['id']);

        // проверяю адимн пользователь или нет
        if (isset($id)) {
            $is_admin = Users::getOne($id)->is_admin();
            if ($is_admin) {
                $orders = Orders::getAll();
            } else {
                $orders = Orders::getAllOrders($id);
            }
        }

        echo $this->renderLayouts("orders", [
            "orders" => $orders
        ]);
    }

    public function actionOrder()
    {
        $id = (new Request())->getParams()['id'];
        $order = Orders::getAlltoId($id);

        echo $this->renderLayouts("order", [
            "order" => $order
        ]);
    }
}
