<?php

namespace app\engine;

class Session
{
    protected $session;
    protected $cookie;

    public function __construct()
    {
        $this->Session();
    }

    private function Session()
    {
        $this->session = $_SESSION;
        $this->cookie = $_COOKIE;
    }
    public function getSession()
    {
        return $this->session;
    }
    public function getCookie()
    {
        return $this->cookie;
    }
}
