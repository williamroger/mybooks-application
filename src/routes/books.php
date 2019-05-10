<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

/**
 * Método para retorna todos os livros
 */
$app->get('/api/livros', function (Request $request, Response $response) {
  $querySQL = "SELECT * FROM livro";

  try {
    $dataBase = new DatabaseConnection();
    $dataBase = $dataBase->connectDatabase();

    $resultQuery = $dataBase->query($querySQL);

    if ($resultQuery->rowCount() > 0) {
      $users = $resultQuery->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($users);
    } else {
      echo "Não existe nenhum livro cadastro!";
    }

    $resultQuery = null;
    $dataBase = null;

  } catch (PDOExption $exp) {
    echo $exp->getMessage() ;
  }
});

/**
 * Método para criar um novo livro
 */
$app->post('/api/livros/novolivro', function (Request $request, Response $response) {
  
  $book = new Book(); 
  $book->setTitulo($request->getParam('titulo'));
  $book->setAutor($request->getParam('autor'));
  $book->setEdicao($request->getParam('edicao'));
  $book->setIndicacao($request->getParam('indicacao'));
  $book->setPreco($request->getParam('preco'));
  $book->setImagem($request->getParam('imagem'));
  $book->setDescricao($request->getParam('descricao'));
  $book->setIsBiblioteca($request->getParam('biblioteca'));
  $book->setIsLido($request->getParam('lido'));
  $book->setUsuarioId($request->getParam('usuario'));
  
  $querySQL = "INSERT INTO livro (titulo, autor, edicao, indicacao, preco,                                     imagem, descricao, biblioteca, lido, usuario)
               VALUES (:titulo, :autor, :edicao, :indicacao, :preco, :imagem, :descricao, :biblioteca, :lido, :usuario)";
  
  try {
    $dataBase = new DatabaseConnection();
    $dataBase = $dataBase->connectDatabase();

    $resultQuery = $dataBase->prepare($querySQL);
    
    $resultQuery->bindParam(':titulo', $book->getTitulo());
    $resultQuery->bindParam(':autor', $book->getAutor());
    $resultQuery->bindParam(':edicao', $book->getEdicao());
    $resultQuery->bindParam(':indicacao', $book->getIndicacao());
    $resultQuery->bindParam(':preco', $book->getPreco());
    $resultQuery->bindParam(':imagem', $book->getImagem());
    $resultQuery->bindParam(':descricao', $book->getDescricao());
    $resultQuery->bindParam(':biblioteca', $book->getIsBiblioteca());
    $resultQuery->bindParam(':lido', $book->getIsLido());
    $resultQuery->bindParam(':usuario', $book->getUsuarioId());
    
    $resultQuery->execute();
    
    echo json_encode("Novo livro cadastrado com sucesso!");

    $resultQuery = null;
    $dataBase = null;
  } catch (PDOExption $exp) {
    echo $exp->getMessage();
  }
});