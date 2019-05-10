<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->get('/api/usuarios', function (Request $request, Response $response) {
  echo "Lista todos usuários!";
});