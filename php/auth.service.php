<?php

  require("./logger.php");

  $initalUsers = array(   
    'login' => "shykiaasa",
    'password' => "password",
    'email' => "shyki@email.com",
    'name' => "userName"
  );

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
      } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $users = $this->getUsers();

        $newUser = array (
          "login" => $login,
          "password" => $hashedPassword,
          "userName" => $userName,
          "email" => $email,
        );

        $users[] = $newUser;

        $jsonData = json_encode($users);

        file_put_contents('./users.json', $jsonData);

        return array("success" => "The user has been created");
      }

    }

    public function deleteUser($login, $email) {

    }

    public function updateUser($login, $email) {

    }

    private function findUser($login) {
      $users = $this->getUsers();
      
      $findedUsers = array_filter($users, function($user) use ($login) {
        return $user->login === "$login";
      });

      if (count($findedUsers) === 0) {
        return NULL;
      } else {
        return $findedUsers[0];
      }
    }

    public function authorizeUser($login, $password) {
      $user = $this->findUser($login);

      if ($user === NULL) {
        return array("error" => "User not found");
      }

      if (password_verify($password, $user->password)) {
        return array("success" => "Authorized");
      } else {
        return array("error" => "Incorrect password");   
      }
   
    }

    private function getUsers() {
      $users = json_decode(file_get_contents('./users.json', TRUE));
      return $users;
    }

    private function findUserIndex($login, $email) {

      $users = $this->getUsers();

      foreach ($users as $key => $user) {
        if ($user->login === $login || $user->email === $email) {
          return $key;
        }
      }
      return NULL;
    }

  }

  // $auth = new AuthService;
  // $auth->createUser($initalUsers);

?>