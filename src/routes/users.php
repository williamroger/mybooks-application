<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

/**
 * Método para retorna todos os usuários
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