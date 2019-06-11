<?php

namespace App\Controllers;
  
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\BibliotecaDAO;
use App\Models\LivroModel;

final class BibliotecaController
{
  public function getLivros(Request $request, Response $response, array $args): Response 
  {
    $biliotecaDAO = new BibliotecaDAO();
    $livros = $biliotecaDAO->getLivrosBiblioteca();

    $response = $response->withJson($livros);
    
    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }

  public function insertLivro(Request $request, Response $response, array $args): Response 
  {
    $data = $request->getParsedBody();
    $bibliotacaDAO = new BibliotecaDAO();

    $livro = new LivroModel();
    
    $livro->setUsuarioId($data['usuario_id'])
          ->setTitulo($data['titulo'])
          ->setAutor($data['autor'])
          ->setEdicao($data['edicao'])
          ->setIndicacao($data['indicacao'])
          ->setPreco($data['preco'])
          ->setImagem($data['imagem'])
          ->setDescricao($data['descricao'])
          ->setBiblioteca($data['biblioteca'])
          ->setLido($data['lido'])
          ->setEditora($data['editora']);
  
    $bibliotacaDAO->insertLivroBiblioteca($livro);

    $response = $response->withJson([
      'message' => 'Livro cadastrado com sucesso!'
    ]);

    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }

  public function updateLivro(Request $request, Response $response, array $args): Response
  { 
    $data = $request->getParsedBody();
    $bibliotacaDAO = new BibliotecaDAO();

    $id = (int)$data['id'];
    
    $livro = new LivroModel();

    $livro->setTitulo($data['titulo'])
      ->setAutor($data['autor'])
      ->setEdicao($data['edicao'])
      ->setIndicacao($data['indicacao'])
      ->setPreco($data['preco'])
      ->setImagem($data['imagem'])
      ->setDescricao($data['descricao'])
      ->setBiblioteca((int)$data['biblioteca'])
      ->setLido((int)$data['lido'])
      ->setEditora($data['editora']);
  
    $bibliotacaDAO->updateLivroBiblioteca($id, $livro);

    $response = $response->withJson([
      'success' => true,
      'message' => 'Livro atualizado com sucesso!'
    ]);

    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }

  public function deleteLivro(Request $request, Response $response, array $args): Response
  {
    $queryParams = $request->getQueryParams();
    $bibliotecaDAO = new BibliotecaDAO();
    $id = (int)$queryParams['id'];

    $bibliotecaDAO->deleteLivroBiblioteca($id);

    $response = $response->withJson([
      'success' => true,
      'message' => 'Livro excluído com sucesso!'
    ]);

    return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATH, OPTIONS');
  }
}