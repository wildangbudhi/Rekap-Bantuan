<?php
declare(strict_types=1);

namespace RekapBantuan\Providers;

use RekapBantuan\Plugins\NotFoundPlugin;
use RekapBantuan\Plugins\SecurityPlugin;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Dispatcher;

class DispatcherProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $di->setShared('dispatcher', function () {
            $eventsManager = new EventsManager();
            $eventsManager->attach('dispatch:beforeExecuteRoute', new SecurityPlugin);
            $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('RekapBantuan\Controllers');
            $dispatcher->setEventsManager($eventsManager);

            return $dispatcher;
        });
    }
}
