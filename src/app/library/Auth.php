<?php

use Phalcon\DI;

class Auth
{
    private $session;
    private $return_url = 'return_url';
    public function __construct()
    {
        $this->session = DI::getDefault()->get('session');
    }

    public function login($data, $auth_key)
    {
        $this->session->set($auth_key, $data);
    }

    public function logout($auth_key)
    {
        $this->session->remove($auth_key);
        $this->session->remove($this->return_url);
    }

    public function isLoggedIn($auth_key)
    {
        if($this->session->has($auth_key)){
            return true;
        }else{
            return false;
        }
    }

    public function getData($auth_key)
    {
        if($this->session->has($auth_key)){
            return $this->session->get($auth_key);
        }else{
            return false;
        }
    }

    public function setReturnUrl($url)
    {
        $this->session->set($this->return_url, $url);
    }

    public function getReturnUrl()
    {
        if($this->session->has($this->return_url)){
            return $this->session->get($this->return_url);
        }else{
            return false;
        }
    }
}