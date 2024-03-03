<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
// use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use DI\Bridge\Slim\Bridge;

$container = require_once __DIR__ . '/../bootstrap.php';

// $app = AppFactory::create();

// use PHP-DI's Bridge
$app = Bridge::create($container);

$twig = Twig::create(__DIR__ . '/../src/View', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));

// routes
$app->get('/', function (Request $request, Response $response) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'index.twig');
});

$app->get('/about', function (Request $request, Response $response) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'about.twig');
});

$app->run();
