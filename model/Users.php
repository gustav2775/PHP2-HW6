<?php

namespace app\model;
use app\engine\Session;

class Users extends ModelDb
{
    protected $id;
    protected $login;
    protected $pass;
    public $hash;

    protected $prop = [
        'pass' => false,
        'hash' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function getTableName()
    {
        return 'users';
    }

    public static function auth()
    {
        $session = (new Session())->getSession();
        $cookie = (new Session())->getCookie();
        var_dump( $cookie);
        if (isset($session['login'])) {
            $user = Users::getOneLogin($session['login']);
            if (!empty($user)) {
                return  true;
            }
        }
        if ($_COOKIE['hash']) {
            $user = Users::getOneHash($cookie['hash']);
            if (isset($user)) {
                echo $user['login'];
                $_SESSION['login'] = $user['login'];
                return  true;
            }
        }
    }

    public static function getLogin (){
        return (new Session())->getSession()['login'];
    }

    public function is_admin()
    {
        if ($this->login === "admin") return true;
    }
}
