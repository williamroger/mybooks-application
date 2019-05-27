<?php

  namespace App\DAO;

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

  public function insertLivroBiblioteca(LivroModel $livro): void {

    $statement = $this->pdo
      ->prepare('INSERT INTO livros VALUES (
        null,
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
      );');
    $statement->execute([
      'usuario_id' => $livro->getUsuarioId(),
      'titulo' => $livro->getTitulo(),
      'autor' => $livro->getAutor(),
      'edicao' => $livro->getEdicao(),
      'indicacao' => $livro->getIndicacao(),
      'preco' => $livro->getPreco(),
      'imagem' => $livro->getImagem(),
      'descricao' => $livro->getDescricao(),
      'biblioteca' => $livro->getBiblioteca(),
      'lido' => $livro->getLido(),
      'editora' => $livro->getEditora()
    ]);
  }
}