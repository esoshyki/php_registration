<?php
require('./security/disableGetRequest.php');
class User {
  public $userName;
  public $login;
  public $email;
  private $password;

  public function __construct($userData) {
    $this->userName = $userData['userName'];
    $this->login = $userData['login'];
    $this->email = $userData['email'];
    $this->password = $userData['password'];
  }

  public function getUserData() {
    $userData = array(
      "userName" => $this->userName,
      "login" => $this->login,
      "email" => $this->email,
      "password" => password_hash($this->password, PASSWORD_DEFAULT)
    );

    return $userData;
  }
}

?>