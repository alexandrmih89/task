<?php
namespace Index;

class IndexController extends BaseController
{


    public function indexAction()
    {
        if ($this->auth->isLoggedIn($this->auth_key)) {
            $this->response->redirect('/tasks', true);
        }
    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $login = \App::clearStr($this->request->getPost('login'));
            $password = \App::clearStr($this->request->getPost('password'));

            if (empty($login) or empty($password)) {
                $this->flashSession->error($this->_msg['ERR_LOGIN']);
                $this->response->redirect('/', true);
            }

            $user = \Ext\Users::findByLogPass($login, sha1($password));

            if (!$user) {
                $this->flashSession->error($this->_msg['ERR_LOGIN']);
                header("Location: /");
                exit;
            }

            $this->auth->login([
                'id' => $user->getUsrId(),
                'role' => 'admin',
                'login' => $user->getUsrLogin(),
            ], $this->auth_key);
            $this->response->redirect('/tasks', true);

        } else {
            $this->response->redirect('/', true);
        }
    }

    public function logoutAction()
    {
        $this->auth->logout($this->auth_key);
        $this->response->redirect('/', true);
    }
}