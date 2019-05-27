<?php
  
  use function src\slimConfiguration;
  use App\Controllers\BibliotecaController;
  use App\Controllers\UsuarioController;

  $app = new \Slim\App(slimConfiguration());
// ============================================================

  $app->get('/biblioteca/livros', BibliotecaController::class . ':getLivros');
  $app->post('/biblioteca', BibliotecaController::class . ':insertLivro');
  $app->put('/biblioteca', BibliotecaController::class . ':updateLivro');
  $app->delete('/biblioteca', BibliotecaController::class . ':deleteLivro');

  $app->get('/usuario', UsuarioController::class . ':getUsuarios');
  $app->post('/usuario', UsuarioController::class . ':insertUsuario'); 
  // ============================================================
  $app->run();