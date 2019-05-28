<?php

  namespace App\DAO;

  
  abstract class Conexao
  {
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
      $host = getenv('MYBOOKS_WEB_MYSQL_HOST');
      $port = getenv('MYBOOKS_WEB_MYSQL_PORT');
      $dbname = getenv('MYBOOKS_WEB_MYSQL_DBNAME');
      $user = getenv('MYBOOKS_WEB_MYSQL_USER');
      $pass = getenv('MYBOOKS_WEB_MYSQL_PASSWORD');
      
      $dsn = "mysql:host={$host};dbname={$dbname};port={$port};charset=utf8";

      $this->pdo = new \PDO($dsn, $user, $pass);
      $this->pdo->setAttribute(
        \PDO::ATTR_ERRMODE,
        \PDO::ERRMODE_EXCEPTION
      );
    }
  }