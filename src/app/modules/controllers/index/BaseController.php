<?php
namespace Index;

class BaseController extends \Controller\PatternController
{
    public $auth_key = 'auth-admin';
    protected $_msg = [
        'ERR_LOGIN' => 'Invalid login or password',
        'ERR_EMPTY_FIELDS' => 'All fields must not be empty',
        'ERR_SAVE' => 'Failed to save'
    ];
}