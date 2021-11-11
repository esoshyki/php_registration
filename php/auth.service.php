<?php
  session_start();
  class AuthService {

    public function createUser($userData) {

      require('./User.php');
      $newUser = new User($userData);

      $userIdx = $this->findUserIndex($newUser->login, $newUser->email);

      if (isset($userIdx)) {
        return array("error" => "The user exists");
      } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $users = $this->getUsers();
        $newUserData = $newUser->getUserData();
        $users[] = $newUserData;
        $jsonData = json_encode($users);

        file_put_contents('./users.json', $jsonData);

        return array("success" => "The user has been created");
      }

    }

    public function deleteUser($login, $email) {
      $users = $this->getUsers();
      $newUsers = array_filter($users, function ($user) use($login, $email)) {
        return $user->login !== $login && $user->email !== $email;
      }
      $jsonData = json_encode($users);
      return file_put_contents('./users.json', $jsonData);    
    }

    public function updateUser($newUserData) {
      $users = $this->getUsers();
      [
        "login" => $login,
        "email" => $email
      ] = $newUserData;
      $userIndex = $this->findUserIndex($login, $email);

      if (isset($userIndex)) {
        $users[$userIndex] = $newUserData;
      }
      $jsonData = json_encode($users);
      return file_put_contents('./users.json', $jsonData);    
    }

    private function authorizeUser($user) {
      $_SESSION["userName"] = $user->userName;
      $_SESSION["userLogin"] = $user->login;     
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

    public function signIn($login, $password) {
      $user = $this->findUser($login);

      if ($user === NULL) {
        return array("error" => "User not found");
      }

      if (password_verify($password, $user->password)) {
        $this->authorizeUser($user);
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
?>