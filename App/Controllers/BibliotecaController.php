<?php

  namespace App\Controllers;
  
  use Psr\Http\Message\RequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;

  final class BibliotecaController
  {
    public function getLivros(Request $request, Response $response, array $args): Response {
      $response = $response->withJson([
        "message" => "Juntos em Shallow now"
      ]);

      return $response;
    }
  }