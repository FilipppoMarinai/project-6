<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require "./Classe.php";

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/alunni', function (Request $request, Response $response, $args) {
    $classe = new Classe();
    $response->getBody()->write("" . $classe->getAlunni());
    return $response;
});

$app->get('/alunni/{nome}', function (Request $request, Response $response, $args) {
    $classe = new Classe();
    $name = $args['nome'];
    $response->getBody()->write("" . $classe->search($name));
    return $response;
});

$app->run();
