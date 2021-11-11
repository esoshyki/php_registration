<?php

  require('auth.service.php');
  require('form.validator.php');

  $fields = ['login', 'password', 'confirm_password', 'email', 'name'];
  
  $validation = new FormValidator($_POST, $fields);
  $ERRORS = $validation->validateForm();

  if (!empty($ERRORS)) {
    http_response_code(401);
    echo json_encode($ERRORS);
    exit;
  } else {
    
    $auth = new AuthService;
    $created = $auth->createUser($_POST);
     if (isset($created["error"])) {
      http_response_code(401);
      $ERRORS = array(
        "submit" => $created["error"]
      );
      echo json_encode($ERRORS);
      exit;
    } else {
      http_response_code(201);
      echo json_encode($created);
      exit;
    }
  }
    
  ?>