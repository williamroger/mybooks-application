<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/database.php';

$app = new \Slim\App;

/**
 * Chamada para rotas
 */
require '../src/routes/users.php';

$app->run();