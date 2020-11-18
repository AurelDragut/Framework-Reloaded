<?php

namespace App\src\Factory;

use App\src\Routes;
use DI\Container;
use League\Route\Router;

class RouteFactory
{
    public static function build(Container $container):Router
    {
        $route = new Router($container);

        Routes::routes($route);

        return $route;
    }
}
