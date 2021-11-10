<?php

  function findUser($arr, $login, $email) {
    foreach ($arr as $key => $user) {
      if ($user["login"] == $login || $user["email"] == $email) {
        return $key;
      }
    }
    return NULL;
  }

  $users = array(
    array (
      'login' => 'shyki',
      'email' => 'shyki@yandex.by'
    ),
    array (
      'login' => 'falex',
      'email' => 'falex@yandex.by'
    ),
     array (
      'login' => 'hitler',
      'email' => 'hitler@yandex.by'
    ),
  );

  $logins = array_column($users, 'login');
  $emails = array_column($users, 'email');

  $index = findUser($users, "falexx", 'falexx@yandex.by');
  print_r($index);
?>