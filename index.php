<?php
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;

  require 'vendor/autoload.php';

  $app = new \Slim\App;

  /**
   * Listar todos os livros
   */  
  $app->get('/books', function (Request $request, Response $response) use ($app) {
    $response->getBody()->write("Listando todos os livros");
    return $response;
  });

  /**
   * Retorna um livro pelo id
   */
  $app->get('/books/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $response->getBody()->write("Exibindo dados do livro {$id}");
    return $response;
  });

  /**
   * Cadastra um novo livro
   */
  $app->get('/books', function (Request $request, Response $response) use ($app) {
    $response->getBody()->write("Livro cadastrado com sucesso!");
    return $response;
  });

  /**
   * Atualiza dados de um livro
   */
  $app->get('/books/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $response->getBody()->write("Alterando dados do livro {$id}");
    return $response;
  });

  /**
   * Deleta um livro informando o id
   */
  $app->get('/books/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $response->getBody()->write("Deletando o livro {$id}");
    return $response;
  });

  $app->run();
?>