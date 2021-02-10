<?php

namespace app\controllers;

use app\model\{Catalog,Users,Feedback};
use app\engine\Request;

class CatalogController extends Controller
{
    public function actionCatalog()
    {
        $page = (new Request())->getParams()['page'] ?: 10;
        $catalog = Catalog::getAllLimit($page);
        echo $this->renderLayouts("catalog", [
            "catalog" => $catalog,
            'page' => $page
        ]);
    }

    public function actionProduct()
    {
        $id = (new Request())->getParams()['id'];
        $catalog = Catalog::getOneArray($id);
        $feedback = Feedback::getAlltoId($id);

        echo $this->renderLayouts("product", [
            "item" => $catalog,
            "feedback" => $feedback
        ]);
    }

    public function actionSave()
    {
        $paramsRequest = (new Request())->getParams();
        $id = $paramsRequest['id'];
        $catalog = new Catalog;

        if (isset($id)) {
            $catalog = Catalog::getOne($id);
            $paramsKey = array_keys($paramsRequest);
            foreach ($paramsKey as $key) {
                $catalog->$key = $paramsRequest[$key];
            }
            $catalog->update();
        } else {
            $catalog = new Catalog($paramsRequest['name'], $paramsRequest['price'], $paramsRequest['description']);
            $catalog->insert();
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
