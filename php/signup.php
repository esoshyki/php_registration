<?php

  require('auth.service.php');
  require('form.validator.php');
  if (empty($_POST)) {

  }

  $fields = ['login', 'password', 'confirm_password', 'email', 'name'];
  
  $validation = new FormValidator($_POST, $fields);
  $ERRORS = $validation->validateForm();

  if (!empty($ERRORS)) {
    header('Content-Type: application/json');
    http_response_code(401);
    echo json_encode($ERRORS);
    exit;
  } else {
    
    $auth = new AuthService;
    $created = $auth->createUser($_POST);
     // if ($created["error"]) {
    //   http_response_code(401);
    //   $errors = array(
    //     "submit_error" => $created["error"]
    //   )
    // }
    echo json_encode($ERRORS);
    exit;
  }
    
  ?>