<?php

namespace Index;

class AccessController extends BaseController
{
    public function initialize()
    {

        if ($this->auth->getData($this->auth_key)['role'] != 'admin') {
            $current_url = $this->router->getRewriteUri();
            $this->auth->setReturnUrl($current_url);
            header('Location: /');
            exit;
        }
    }
}