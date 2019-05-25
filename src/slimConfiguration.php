<?php

  namespace src;

  function slimConfiguration(): \Slim\Container {
    $configuration = [
      'settings' => [
        'displayErrorDetails' => getenv('DISPLAY_ERROR_DETAILS'),
      ],
    ];

    return new \Slim\Container($configuration);
  }