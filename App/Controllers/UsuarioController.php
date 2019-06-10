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

    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
      ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
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

    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
      ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }

  public function authUsuario(Request $request, Response $response, array $args) 
  {
    $data = $request->getParsedBody();
    $usuarioDAO = new UsuarioDAO();

    $login = $data['login'];
    $senha = $data['senha'];

    $usuario = $usuarioDAO->auth($login, $senha);
 
    if ($usuario) {
      $response = $response->withJson([
        'data' => $usuario,
        'success' => true,
        'message' => 'Usuário validado com sucesso!'
      ]);
    } else {
      $response = $response->withJson([
        'success' => false,
        'message' => 'Login ou Senha está incorreto!'
      ]);
    }
    
    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
      ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }

  public function deleteUsuario(Request $request, Response $response, array $args) 
  {
    $queryParams = $request->getQueryParams();
    $usuarioDAO = new UsuarioDAO();
    $id = (int)$queryParams['id'];

    $usuarioDAO->deleteUsuario($id);

    $response = $response->withJson([
      'success' => true,
      'message' => 'Usuario excluído com sucesso!'
    ]);

    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }
}