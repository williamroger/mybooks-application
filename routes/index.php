<?php
  
  use function src\slimConfiguration;
  use App\Controllers\BibliotecaController;
  use App\Controllers\HomeController;

  $app = new \Slim\App(slimConfiguration());
// ============================================================

  $app->get('/biblioteca', BibliotecaController::class . ':getLivros');
  $app->post('/biblioteca', BibliotecaController::class . ':insertLivro');
  $app->put('/biblioteca', BibliotecaController::class . ':updateLivro');
  $app->delete('/biblioteca', BibliotecaController::class . ':deleteLivro');

  // $app->get('/listadedesejos', ListaDeDesejosController::class . ':getLivros');

  // ============================================================
  $app->run();