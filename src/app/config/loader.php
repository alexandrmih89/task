<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */

$loader->registerDirs([
    $config->application->libraryDir,
    $config->application->modelsDir,
    $config->application->migrationsDir,
    $config->application->pluginsDir,
]);

$loader->registerNamespaces([
    'Controller' => APP_PATH . '/modules/controllers',
    'Ext'        => APP_PATH . '/models/ext',
    'Index'      => APP_PATH . '/modules/controllers/index',

]);

$loader->register();