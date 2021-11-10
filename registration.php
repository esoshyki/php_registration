<?php

  if (empty($__POST)) {

  }

  require('form.validator.php');
  $validation = new FormValidator($_POST);
  $ERRORS = $validation->validateForm();

  if (!empty($ERRORS)) {
    header('Content-Type: application/json');
    http_response_code(401);
    echo json_encode($ERRORS);
    exit;
  } else {
    http_response_code(200);
    exit;
  }
    
  ?>