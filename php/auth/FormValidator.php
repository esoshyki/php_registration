<?php
  require('./security/disableGetRequest.php');
  class FormValidator {
    private $errors = [];

    public function checkSignUpData ($formData) {
      $password = $formData['password'] ?? NULL;
      $confirmPassword = $formData['confirmPassword'] ?? NULL;
      $login = $formData['login'] ?? NULL;
      $email = $formData['email'] ?? NULL;
      $userName = $formData['userName'] ?? NULL;

      $this->checkLogin($login);
      $this->checkPassword($password);
      $this->checkConfirmPassport($confirmPassword, $password);
      $this->checkEmail($email);
      $this->checkUserName($userName);

      return $this->errors;
    }

    public function checkSignInData ($formData) {
      $login = $formData['login'] ?? NULL;
      $password = $formData['password'] ?? NULL;

      $this->checkLogin($login);
      $this->checkPassword($password);

      return $this->errors;
    }

    private function checkPassword ($password) {
      if (!$password) {
        return $this->addError("password", "Password is require field");
      }

      if (!preg_match('/(?=.*[a-z])/', $password)) {
        $this->addError('password', 'Login must contain at least one lowercase letter.');
      }
      if (!preg_match('/(?=.*[A-Z])/', $password)) {
        $this->addError('password', 'Login must contain at least one uppercase letter.');
      }
      if (!preg_match('/(?=.*[0-9])/', $password)) {
        $this->addError('password', 'Login must contain at least one number.');
      }
      if (!preg_match('/(?=.{6,})/', $password)) {
        $this->addError('password', 'Login must consist of at least six symbols.');
      }

    }

    private function checkConfirmPassport ($confirmPassword, $password) {
      if (!$confirmPassword) {
        return $this->addError("confirmPassword", "Confirm passport is require field");
      }

      if ($confirmPassword !== $password) {
        $this->addError("password", "Passwords doesn't match");
        $this->addError("confirmPassword", "Passwords doesn't match");
      }
    }

    private function checkLogin ($login) {
      if (!$login) {
        return $this->addError('login', "Login is required field");
      }
      if (!preg_match('/^[a-zA-Z0-9]{6,12}/', $login)) {
        $this->addError('login', 'Login must be 6-12 characters and must not content special symbols');
      }
    }

    private function checkEmail ($email) {
      if (!$email) {
        return $this->addError('email', "Email is required field");
      }

      if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email)) {
        $this->addError('email', 'Email must be in email format');
      }
    }

    private function checkUserName ($userName) {
      if (!$userName) {
        return $this->addError('userName', "Name is required field");
      }

      if (!preg_match('/(?=.{2,})/', $userName)) {
        $this->addError('userName', 'User name must be two or more symbols');
      }

      if (!preg_match('/^[a-z A-Z]+$/', $userName)) {
        $this->addError('userName', 'User name must consist of only letters');
      }
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