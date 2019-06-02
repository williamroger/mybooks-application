<?php
  
  use function src\slimConfiguration;
  use App\Controllers\BibliotecaController;
  use App\Controllers\UsuarioController;

  $app = new \Slim\App(slimConfiguration());
// ============================================================

  $app->get('/biblioteca/livros', BibliotecaController::class . ':getLivros');
  $app->post('/biblioteca/adicionarlivro', BibliotecaController::class . ':insertLivro');
  $app->put('/biblioteca', BibliotecaController::class . ':updateLivro');
  $app->delete('/biblioteca', BibliotecaController::class . ':deleteLivro');

  $app->get('/usuario', UsuarioController::class . ':getUsuarios');
  $app->post('/usuario/novousuario', UsuarioController::class . ':insertUsuario'); 
  $app->post('/usuario/usuariologin', UsuarioController::class . ':getUsuarioLogin'); 
  // ============================================================
  $app->run();