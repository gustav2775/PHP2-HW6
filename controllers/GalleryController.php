<?php

namespace app\controllers;

use app\model\Gallery;
use app\engine\Request;

class GalleryController extends Controller
{
    public function actionGallery()
    {
        $gallery = Gallery::getAll();

        echo $this->renderLayouts("gallery", [
            "gallery" => $gallery
        ]);
    }
    
    public function actionGalleryItem()
    {
        $id = (new Request())->getParams()['id'];

        $gallery = Gallery::getOneArray($id);

        echo $this->renderLayouts("galleryItem", [
            "itemGallery" => $gallery,
        ]);
    }
}
