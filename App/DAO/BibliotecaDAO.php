<?php

  namespace App\DAO;

use Slim\Http\Response;
use Slim\Http\Request;
use App\Models\LivroModel;

class BibliotecaDAO extends Conexao
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function getLivrosBiblioteca(): array {
      $livros = $this->pdo
        ->query('SELECT 
	               titulo,
                 autor,
                 edicao,
                 indicacao,
                 preco,
                 imagem,
                 descricao,
                 biblioteca,
                 lido,
                 editora
                 FROM livros 
                 WHERE usuario_id = 1 AND biblioteca = 1;')
        ->fetchAll(\PDO::FETCH_ASSOC);
      
      return $livros;
    }

    public function insertLivro(LivroModel $livro) {
      $statement = $this->pdo
        ->prepare( 'INSERT INTO livros VALUES (
          :usuario_id, 
          :titulo, 
          :autor, 
          :edicao, 
          :indicacao, 
          :preco, 
          :imagem, 
          :descricao, 
          :biblioteca, 
          :lido, 
          :editora
        )')
    }
  }