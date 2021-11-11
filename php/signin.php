<?php
  require('form.validator.php');
  require('auth.service.php');

  $fields = ['login', 'password'];

  $validation = new FormValidator($_POST, $fields);
  $ERRORS = $validation->validateForm();

  if (!empty($ERRORS)) {
    http_response_code(401);
    echo json_encode($ERRORS);
    exit;
  } else {
    $auth = new AuthService;
    $authorized = $auth->authorizeUser($_POST['login'], $_POST['password']);
    if (isset($authorized["error"])) {
      http_response_code(401);
      echo json_encode(array(
        "submit" => $authorized["error"]
      ));   
    } else {
      http_response_code(201);
      echo json_encode($authorized);   
    }
  }
    
  ?>