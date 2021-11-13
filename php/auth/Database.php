<?php
  require('User.php');
  require('./security/disableGetRequest.php');
  
  class Database {
    private $errors = [];
    private $dbfile = "./users.json";
    
    public function createUser ($userData) {
      $newUser = new User($userData);
      $newUserData = $newUser->getUserData();
      [ "login" => $login , "email" => $email ] = $newUserData;
      $users = $this->getUsers();
      $foundUserIndex = $this->findUserIndex($users, $login, $email);

      if (isset($foundUserIndex)) {
        $this->addError("submit", "User exists");
        return $this->errors;
      }

      array_push($users, $newUserData);
      $jsonData = json_encode($users);
      $save = file_put_contents($this->dbfile, $jsonData);

      if (!$save) {
        $this->addError("database", "Error on saving database file");
      }
      return $this->errors;
      
    }
    public function deleteUser($login, $email) {
      // $users = $this->getUsers();
      // $newUsers = array_filter($users, function ($user) use($login, $email)) {
      //   return $user->login !== $login && $user->email !== $email;
      // };
      // $jsonData = json_encode($users);
      // return file_put_contents('./users.json', $jsonData);    
    }

    public function findUser($login) {
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

    public function updateUser($newUserData) {
      $users = $this->getUsers();
      [
        "login" => $login,
        "email" => $email
      ] = $newUserData;
      $userIndex = $this->findUserIndex($users, $login, $email);

      if (isset($userIndex)) {
        $users[$userIndex] = $newUserData;
      }
      $jsonData = json_encode($users);
      return file_put_contents('./users.json', $jsonData);    
    }

    private function getUsers() {
      $users = json_decode(file_get_contents($this->dbfile, TRUE));
      return $users;
    }

    private function findUserIndex($users, $login, $email) {

      foreach ($users as $key => $user) {
        if ($user->login === $login || $user->email === $email) {
          return $key;
        }
      }
      return NULL;
    }

    private function addError ($type, $message) {
      $error = array(
        "type" => $type,
        "message" => $message
      );
      array_push($this->errors, $error);
    }
  }

?>