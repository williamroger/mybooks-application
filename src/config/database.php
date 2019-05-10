<?php
  class DatabaseConnection {
    private $dbHost = 'localhost';
    private $dbUser = 'root';
    private $dbPass = 'root';
    private $dbName = 'mybooksweb_db';

    /**
     * Método para fazer conexão com Banco de Dados
     */
    public function connectDatabase() {
      $mysqlConnect = "mysql:host=$this->dbHost; dbname=$this->dbName;";
      $dbConnection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);

      $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $dbConnection;
    }
  }