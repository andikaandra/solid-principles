<?php

namespace Phalcon\Init\Dashboard;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Phalcon\Init\Dashboard\Controllers\Web' => __DIR__ . '/controllers/web',
            'Phalcon\Init\Dashboard\Controllers\Api' => __DIR__ . '/controllers/api',
            'Phalcon\Init\Dashboard\Models' => __DIR__ . '/models',
            'Phalcon\Init\Dashboard\Domain\Contracts\Repositories' => __DIR__ .'/core/domain/repositories',
            'Phalcon\Init\Dashboard\UseCases' => __DIR__ .'/core/usecases',
            'Phalcon\Init\Dashboard\Infrastructure\Repositories' => __DIR__ .'/core/infrastructure/repositories',
            'Phalcon\Init\Dashboard\Infrastructure\Dto' => __DIR__ .'/core/infrastructure/dto',
            'Phalcon\Init\Dashboard\Infrastructure\ViewModels' => __DIR__ .'/core/infrastructure/viewmodel',
            'Phalcon\Init\Dashboard\Infrastructure\Services' => __DIR__ .'/core/infrastructure/services',
            'Phalcon\Init\Dashboard\Infrastructure\Services\Contracts' => __DIR__ .'/core/infrastructure/services/contracts',

        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        // $moduleConfig = require __DIR__ . '/config/config.php';

        // $di->get('config')->merge($moduleConfig);
        $di['view'] = function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');

            $view->registerEngines(
                [
                    ".volt" => "voltService",
                ]
            );

            return $view;
        };
        include_once __DIR__ . '/config/services.php';
    }
}