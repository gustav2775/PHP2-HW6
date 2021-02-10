<?php

namespace app\controllers;

use app\interfaces\{ILogin, IRender};
use app\engine\Session;
use app\model\{Users,Basket};

class Controller
{
    private $defaultLayouts = "index";
    protected $render;
    protected $login;

    public function __construct(IRender $render,ILogin $login)
    {
        $this->render = $render;
        $this->login = $login;
    }

    public function renderLayouts($template, $params = [])
    {
        $id = (new Session)->getSession()['id'];
        if(isset($id)){
            $params['is_admin'] = Users::getOne($id)->is_admin();
        }
        return $this->render->renderVeiws(LAYOUTS . $this->defaultLayouts, [
            'login' => $this->render->renderVeiws('login', [
                'login' => (new Users())->getLogin(),
                'auth' => (new Users())->auth(),
            ]),
            'menu' => $this->render->renderVeiws('menu', [
                'count' => (new Basket())->getCount()['count'],
            ]),
            'content' => $this->render->renderVeiws($template, $params)
        ]);
    }
}
