<?php

use Phalcon\Di\FactoryDefault;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {
    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();

    /**
     * Include Composer Autoloader
     */
    require_once BASE_PATH . '/vendor/autoload.php';


    /**
     * Read services
     */
    include APP_PATH . "/config/services.php";

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';


    /**
     * Register routes
     */
    $di->set('router', require APP_PATH . '/config/routes.php');

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);
    $application->registerModules(require APP_PATH . '/config/modules.php');
    echo $application->handle()->getContent();
} catch (\Exception $e) {
    error_log($e->getMessage() . ' File: ' . __FILE__ . ' Line: ' . __LINE__);
    echo 'Service error';
}
