<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

/**
 * GET -> Método para retorna todos os usuários
 */
$app->get('/api/usuarios', function (Request $request, Response $response) {
  $querySQL = "SELECT * FROM usuario";

  try {
    $dataBase = new DatabaseConnection();
    $dataBase = $dataBase->connectDatabase();

    $resultQuery = $dataBase->query($querySQL);

    if ($resultQuery->rowCount() > 0) {
      $users = $resultQuery->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($users);
    } else {
      echo "Não existe nenhum usuário cadastro!";
    }

    $resultQuery = null;
    $dataBase = null;

  } catch (PDOExption $exp) {
    echo $exp->getMessage() ;
  }
});

/**
 * POST -> Método para criar um novo usuário
 */
$app->post('/api/usuarios/novousuario', function (Request $request, Response $response) {
  
  $user = new User(); 

  $user->setNome($request->getParam('nome'));
  $user->setEmail($request->getParam('email'));
  $user->setLogin($request->getParam('login'));
  $user->setSenha($request->getParam('senha'));
  
  $querySQL = "INSERT INTO usuario (nome, email, login, senha)
               VALUES (:nome, :email, :login, :senha)";
  
  try {
    $dataBase = new DatabaseConnection();
    $dataBase = $dataBase->connectDatabase();

    $resultQuery = $dataBase->prepare($querySQL);

    $resultQuery->bindParam(':nome', $user->getNome());
    $resultQuery->bindParam(':email', $user->getEmail());
    $resultQuery->bindParam(':login', $user->getLogin());
    $resultQuery->bindParam(':senha', $user->getSenha());
    
    $resultQuery->execute();

    echo json_encode("Novo usuário cadastrado com sucesso!");

    $resultQuery = null;
    $dataBase = null;
  } catch (PDOExption $exp) {
    echo $exp->getMessage();
  }
});

/**
 * PUT -> Método para editar os dados do usuário
 */
$app->put('/api/usuarios/editarusuario/{id}', function(Request $request, Response $response) {
  $idUser = $request->getAttribute('id');
  
  $user = new User(); 

  $user->setNome($request->getParam('nome'));
  $user->setEmail($request->getParam('email'));
  $user->setLogin($request->getParam('login'));
  $user->setSenha($request->getParam('senha'));
  
  $querySQL = "UPDATE usuario SET 
               nome = :nome,
               email = :email,
               login = :login,
               senha = :senha
               WHERE id = $idUser";
  
  try {
    $dataBase = new DatabaseConnection();
    $dataBase = $dataBase->connectDatabase();

    $resultQuery = $dataBase->prepare($querySQL);

    $resultQuery->bindParam(':nome', $user->getNome());
    $resultQuery->bindParam(':email', $user->getEmail());
    $resultQuery->bindParam(':login', $user->getLogin());
    $resultQuery->bindParam(':senha', $user->getSenha());
    
    $resultQuery->execute();
    echo json_encode("Usuário atualizado com sucesso!");

    $resultQuery = null;
    $dataBase = null;
  } catch (PDOExcetion $exp) {
    echo $exp->getMessage();
  }
});

/**
 * GET -> Método para retorna todos os livros
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
 * POST -> Método para criar um novo livro
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
  $book->setUsuarioId($request->getParam('id-usuario'));
  
  $querySQL = "INSERT INTO livro (titulo, autor, edicao, indicacao, preco,                                     imagem, descricao, biblioteca, lido, usuario_id)
               VALUES (:titulo, :autor, :edicao, :indicacao, :preco, :imagem, :descricao, :biblioteca, :lido, :usuario_id)";
  
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
    $resultQuery->bindParam(':usuario_id', $book->getUsuarioId());
    
    $resultQuery->execute();
    echo json_encode("Novo livro cadastrado com sucesso!");

    $resultQuery = null;
    $dataBase = null;
  } catch (PDOExption $exp) {
    echo $exp->getMessage();
  }
});

/**
 * PUT -> Método para editar os dados do livro
 */
$app->put('/api/livros/editarlivro/{id}', function(Request $request, Response $response) {
  $idBook = $request->getAttribute('id');
  
  $book = new Book(); 

  $book->setTitulo($request->getParam('titulo'));
  $book->setAutor($request->getParam('autor'));
  $book->setEdicao($request->getParam('edicao'));
  $book->setIndicacao($request->getParam('indicacao'));
  $book->setPreco($request->getParam('preco'));
  $book->setImagem($request->getParam('imagem'));
  $book->setDescricao($request->getParam('descricao'));
  
  $querySQL = "UPDATE livro SET 
               titulo = :titulo,
               autor = :autor,
               edicao = :edicao,
               indicacao = :indicacao,
               preco = :preco,
               imagem = :imagem,
               descricao = :descricao
               WHERE id = $idBook";
  
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
    
    $resultQuery->execute();
    echo json_encode("Livro atualizado com sucesso!");

    $resultQuery = null;
    $dataBase = null;
  } catch (PDOExcetion $exp) {
    echo $exp->getMessage();
  }
});