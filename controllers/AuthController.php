<?php

namespace app\controllers;

use app\interfaces\ILogin;
use app\model\Users;
use app\engine\{ Request};

class AuthController  implements ILogin
{
    public function actionLogin()
    {
        $requestParams = (new Request())->getParams();
        $pass = $requestParams['pass'];

        $user = Users::getOneLogin($requestParams['login']);
        if ($user) {
            if (password_verify( $pass, $user->pass)) {
                $_SESSION["login"] = $user->login;
                $_SESSION['id'] = $user->id;
                
                if ($requestParams['save']) {
                    $hash = uniqid(rand(), true);
                    setcookie('hash', $hash, time() + 3600, '/');
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    $user->hash = $hash;
                    $user->update();
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                die('не верный пароль');
            }
        }
        
    }

    public function actionLogout()
    {
        session_destroy();
        setcookie('hash', '', time() - 3600, '/');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
