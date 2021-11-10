<?php

  if (empty($_POST)) {

  }

  $fields = ['login', 'password'];

  require('form.validator.php');
  $validation = new FormValidator($_POST, $fields);
  $ERRORS = $validation->validateForm();

  if (!empty($ERRORS)) {
    header('Content-Type: application/json');
    http_response_code(401);
    echo json_encode($ERRORS);
    exit;
  } else {
    require('auth.service.php');
    $auth = new AuthService;
    http_response_code(200);
    exit;
  }
    
  ?>