<?php
  session_start();
  require('./security/disableGetRequest.php');
  
  require ('./auth/Auth.php');

  $auth = new Auth;
  $auth->signIn();
  ?>