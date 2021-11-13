<?php
  require('./security/disableGetRequest.php');
  $headers = getallheaders();

  require ('./auth/Auth.php');

  $auth = new Auth;
  $auth->signUp();
  ?>