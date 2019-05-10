<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/database.php';
require '../src/models/user.php';
require '../src/models/book.php';

$app = new \Slim\App;

/**
 * Chamada para rotas
 */
require '../src/routes/users.php';
require '../src/routes/books.php';

$app->run();