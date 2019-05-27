<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\UsuarioDAO;
use App\Models\UsuarioModel;

final class UsuarioController
{
  public function getUsuarios(Request $request, Response $response, array $args): Response
  {
    $usuarioDAO = new UsuarioDAO();
    $usuarios = $usuarioDAO->getUsuarios();

    $response = $response->withJson($usuarios);

    return $response;
  }

  public function insertUsuario(Request $request, Response $response, array $args): Response
  {
    $data = $request->getParsedBody();
    $usuarioDAO = new UsuarioDAO();

    $usuario = new UsuarioModel();

    $usuario->setNome($data['nome'])
      ->setEmail( $data['email'])
      ->setLogin( $data['login'])
      ->setSenha( $data['senha']);

    $usuarioDAO->insertUsuario( $usuario);

    $response = $response->withJson([
      'message' => 'Usuario cadastrado com sucesso!'
    ]);

    return $response;
  }
}