<?php

namespace Ext;

class Users extends \Users
{
    /**
     * Search users by login and password
     *
     * @param string $login Admin login.
     * @param string $password Admin password.
     *
     * @return object|false Returns Admins model object or false.
     */
    public static function findByLogPass($login, $password)
    {
        $login    = trim($login);
        $password = trim($password);
        if (empty($login) or empty($password)) return false;
        try{
            $user = parent::findFirst([
                'conditions' => 'usr_login = :login: AND usr_password = :password:',
                'bind' => [
                    'login'    => $login,
                    'password' => $password
                ]
            ]);
            return $user;
        } catch (\Exception $e) {
            return false;
        }
    }
}