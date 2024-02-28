<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/SiteController.php';
require __DIR__ . '/controllers/ApiAlunniController.php';
require __DIR__ . '/controllers/AlunniController.php';

$app = AppFactory::create();

$app->get('/', "SiteController:home");

$app->get('/alunni', "AlunniController:index");

$app->get('/alunni/{nome}', "AlunniController:show");

$app->get('/api/alunni', "ApiAlunniController:index");


$app->get('/api/alunni/{nome}', "ApiAlunniController:show");

$app->run();
