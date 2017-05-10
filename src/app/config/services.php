<?php

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;

$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

$di->set('dispatcher', function () {
    $eventsManager = $this->getShared('eventsManager');
    $eventsManager->attach('dispatch:beforeException', function ($event, $dispatcher, $exception) {
        $dispatcher->forward(array(
            'module'     => 'index',
            'namespace'  => 'Index\\',
            'controller' => 'errors',
            'action'     => 'show500'
        ));
        return false;
    });

    $dispatcher = new Dispatcher;
    $dispatcher->setDefaultNamespace('Index\\');
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

$di->setShared('url', function () {
    $config = $this->getConfig();
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

$di->setShared('db', function () use ($di) {
    $config = $this->getConfig();
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        //'charset'  => $config->database->charset
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);
    return $connection;
});

$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

$di->set('flashSession', function () {
    return new FlashSession([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

$di->set('auth', function () {
    return new \Auth();
});

$di->set('crypt', function() {
    $crypt = new Phalcon\Crypt();
    $crypt->setKey('ReallyRandomKey');
    return $crypt;
});


