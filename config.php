<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;

return [
    'request' => function() {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    },
    'response' => new Response(),
    Twig\Environment::class => function() {
        $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/views');
        return new Twig\Environment($loader);
    },
    QueryBuilder::class => function() {
        $options = [
            'dbname' => 'rezepten',
            'username' => 'root',
            'password' => '',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        $connection = DriverManager::getConnection($options);

        return $connection->createQueryBuilder();
    },
];
