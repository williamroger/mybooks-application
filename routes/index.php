<?php
  
  use function src\slimConfiguration;
  use App\Controllers\BibliotecaController;
  use App\Controllers\UsuarioController;

  $app = new \Slim\App(slimConfiguration());
// ============================================================

  $app->get('/biblioteca/livros', BibliotecaController::class . ':getLivros');
  $app->post('/biblioteca/adicionarlivro', BibliotecaController::class . ':insertLivro');
  $app->put('/biblioteca', BibliotecaController::class . ':updateLivro');
  $app->delete('/biblioteca/excluirlivro', BibliotecaController::class . ':deleteLivro');

  $app->get('/usuario/usuarios', UsuarioController::class . ':getUsuarios');
  $app->post('/usuario/novousuario', UsuarioController::class . ':insertUsuario'); 
  $app->post('/auth', UsuarioController::class . ':authUsuario'); 
  $app->delete('/usuario/excluirusuario', UsuarioController::class . ':deleteUsuario'); 
  // ============================================================
  $app->run();