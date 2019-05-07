<?php
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;

  require 'vendor/autoload.php';

  $app = new \Slim\App;

  /**
   * Listar todos os livros
   */  
  $app->get('/books', function (Request $request, Response $response) use ($app) {
    $return = $response->withJson(['msg' => 'Listando todos os livros', 200]);
    return $return;
  });

  /**
   * Retorna um livro pelo id
   */
  $app->get('/books/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');

    $return = $response->withJson(['msg' => "Exibindo dados do livro {$id}", 200]);
    return $return;
  });

  /**
   * Cadastra um novo livro
   */
  $app->post('/books', function (Request $request, Response $response) use ($app) {
    $return = $response->withJson(['msg' => 'Livro cadastrado com sucesso!', 201]);
    return $return;
  });

  /**
   * Atualiza dados de um livro
   */
  $app->put('/books/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');

    $return = $response->withJson(['msg' => "Alterando dados do livro {$id}", 200]);
    return $return;
  });

  /**
   * Deleta um livro informando o id
   */
  $app->delete('/books/{id}', function (Request $request, Response $response) use ($app) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');

    $return = $response->withJson(['msg' => "Deletando o livro {$id}", 204]);
    return $return;
  });

  $app->run();
?>