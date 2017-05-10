<?php
$router = new \Phalcon\Mvc\Router(false);
$router->removeExtraSlashes(true);
/**
 * index routes
 */
$router->add('/', [
    'module' => 'index',
    'namespace' => 'Index\\',
    'controller' => 'index',
    'action' => 'index'
]);

$router->add('/login', [
    'module' => 'index',
    'namespace' => 'Index\\',
    'controller' => 'index',
    'action' => 'login'
]);

$router->add('/logout', [
    'module' => 'index',
    'namespace' => 'Index\\',
    'controller' => 'index',
    'action' => 'logout'
]);

$router->add('/tasks', [
    'module' => 'index',
    'namespace' => 'Index\\',
    'controller' => 'task',
    'action' => 'index'
]);

$router->add('/add', [
    'module' => 'index',
    'namespace' => 'Index\\',
    'controller' => 'task',
    'action' => 'add'
]);

$router->add('/ideas/vote/{id:[a-z0-9]*}', [
    'module' => 'index',
    'namespace' => 'Index\\',
    'controller' => 'ideas',
    'action' => 'vote'
]);

//404 not found
$router->notFound([
    'module' => 'index',
    'namespace' => 'Index\\',
    "controller" => "errors",
    "action" => "show404"
]);

return $router;
