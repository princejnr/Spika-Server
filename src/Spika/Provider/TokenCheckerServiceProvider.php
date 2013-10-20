<?php
namespace Spika\Provider;

use Spika\Middleware\TokenChecker;
use Silex\Application;
use Silex\ServiceProviderInterface;

class TokenCheckerServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['beforeTokenChecker'] = $app->share(function () use ($app) {
            return new TokenChecker(
                $app['spikadb'],
                $app['logger']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}
