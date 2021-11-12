<?php
  $headers = getallheaders();
  if (!($headers['Sec-Fetch-Mode'] === 'no-cors')) {
    exit;
  }

  require ('./auth/Auth.php');

  $auth = new Auth;
  $auth->signIn();
  ?>