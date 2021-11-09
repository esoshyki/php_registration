<?php
  session_start();
  $handle = fopen('log.json', 'w');
  fwrite($handle, json_encode($_POST));
  fclose($handle);

  $error = FALSE;

  if (!($_POST['login'])) {
    $_SESSION['login_error'] = "Enter login";
    $error = TRUE;
  } else {
    unset($_SESSION['login_error']);
    $error = FALSE;
  };

  if (!($_POST['password'])) {
    $_SESSION['password_error'] = "Enter password";
    $error = TRUE;
  } else {
    unset($_SESSION['login_error']);
    $error = FALSE;
  };

  if (!($_POST['confirm_password'])) {
    $_SESSION['confirm_password_error'] = "Enter confirm password";
    $error = TRUE;
  } else {
    unset($_SESSION['login_error']);
    $error = FALSE;
  };

  if (!($_POST['email'])) {
    $_SESSION['email_error'] = "Enter email";
    $error = TRUE;
  } else {
    unset($_SESSION['login_error']);
    $error = FALSE;
  };

  if (!($_POST['name'])) {
    $_SESSION['name_error'] = "Enter name";
    $error = TRUE;
  } else {
    unset($_SESSION['login_error']);
    $error = FALSE;
  };

  if ($error == TRUE) {
    echo http_response_code(400);
  };

  echo http_response_code(200)

?>