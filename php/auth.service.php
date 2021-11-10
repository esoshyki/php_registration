<?php

  require("./logger.php");

  class AuthService {

    public function createUser($userData) {

      [
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'name' => $userName
      ] = $userData;

      $userIdx = $this->findUserIndex($login, $email);

      if (isset($userIdx)) {
        return array("error" => "The user exists");
      } 

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $users = $this->getUsers();
      $newUser = array(
        "userName" => $userName,
        "login" => $login,
        "email" => $email,
        "password" => $hashedPassword
      );
      array_push($users, $newUser);
      $jsonData = json_encode($users);
      file_put_contents('./users.json', $users);
      return array("success" => "The user has been created");
    }

    public function deleteUser($login, $email) {

    }

    public function updateUser($login, $email) {

    }

    private function getUsers() {
      $users = json_decode(file_get_contents('./users.json'));
      return $users;
    }

    private function findUserIndex($login, $email) {

      $users = $this->getUsers();
      print_r($users);
      array_walk($users, function ($a) {
        print_r($a->["login"]);
      });
      // foreach ($users as $key => $user) {
      //   echo $user;
      //   // if ($user["login"] == $login || $user["email"] == $email) {
      //   //   return $key;
      //   // }
      // }
      return NULL;
    }

  }

  $auth = new AuthService;
  $auth->createUser(array(   
    'login' => "login",
    'password' => "password",
    'email' => "email",
    'name' => "userName"
 ));

?>