<?php

namespace Index;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di Dependency Injection Container [Optional]
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            __NAMESPACE__ => __DIR__ . '/',
            'Models'                       => __DIR__ . '/../../../models/',
            //'Components\Palette'   => __DIR__.'/../../common/library/Palette/',
        ]);
        $loader->register();
    }
    /**
     * Registers services related to the module
     *
     * @param DiInterface $di Dependency Injection Container
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/../../views/index/');
            return $view;
        });
    }
}