<?php
  
  use function src\slimConfiguration;


  $app = new \Slim\App(slimConfiguration());
  // ============================================================
  $app->get('/biblioteca', BibliotecaController::class, ':getLivros');
  $app->get('/biblioteca', BibliotecaController::class, ':insertLivro');
  $app->get('/biblioteca', BibliotecaController::class, ':updateLivro');
  $app->get('/biblioteca', BibliotecaController::class, ':deleteLivro');

  $app->get('/listadedesejos', ListaDeDesejosController::class, ':getLivros');

  // ============================================================
  $app->run();