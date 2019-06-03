<?php

namespace App\DAO;

use App\Models\UsuarioModel;

class UsuarioDAO extends Conexao
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getUsuarios(): array
  {
    $usuarios = $this->pdo
      ->query('SELECT 
                id,
                nome,
                email,
                login,
                senha
                FROM usuarios')
      ->fetchAll(\PDO::FETCH_ASSOC);

    return $usuarios;
  }

  public function insertUsuario(UsuarioModel $usuario): void
  {
    $statement = $this->pdo
      ->prepare('INSERT INTO usuarios VALUES (
        null,
        :nome, 
        :email, 
        :login, 
        :senha
      );');
    $statement->execute([
      'nome' => $usuario->getNome(),
      'email' => $usuario->getEmail(),
      'login' => $usuario->getLogin(),
      'senha' => $usuario->getSenha()
    ]);
  }

  public function validaLoginSenha($login, $senha): array
  {  
    $usuario = $this->pdo
      ->query( 'SELECT 
                 id,
                 nome,
                 email,
                 login,
                 senha
                 FROM usuarios WHERE login = :login AND senha = :senha);')
      ->execute([
        'login' => $login,
        'senha' => $senha
      ])
      ->fetchAll(\PDO::FETCH_ASSOC);
    
    return $usuario;
  }
}

