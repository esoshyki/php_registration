<?php
  class FormValidator {

    private $form_data;
    private $errors = [];
    private $fields;

    public function __construct($post_data, $fields) {
      if (isset($post_data)) {
        $this->form_data = $post_data;
      } else {
        $this->form_data = [];
      }
      if (isset($fields)) {
        $this->fields = $fields;
      } else {
        $this->fields = [];
      }
    }

    public function validateForm() {
      foreach ($this->fields as $field) {
        if (!array_key_exists($field, $this->form_data)) {
          $this->addError($field, "$field is required field");
        } else {
          if (empty($this->form_data[$field])) {
            $this->addError($field, "$field is required field");
          }
        }
      }

      $this->validateLogin();

      if (isset($this->confirm_password)) {
        $this->validatePasswords();
      }

      $this->validatePassword();

      if (isset($this->email)) {
        $this->validateEmail();
      }

      if (isset($this->userName)) {
        $this->validateName();
      }   

      return $this->errors;
    }

    private function validateLogin() {

      $value = trim($this->form_data['login']);
      if (!preg_match('/^[a-zA-Z0-9]{6,12}/', $value)) {
        $this->addError('login', 'Login must be 6-12 characters and must not content special symbols');
      }
    }

    private function validatePassword() {

      $password = $this->form_data['password'];

      if (empty($password)) {
        return;
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

    private function validatePasswords() {
      $password = $this->form_data['password'];
      $confirm_password = $this->form_data['confirm_password'];

      if (!($password == $confirm_password)) {
        $this->addError('password', 'passwords doesn\'t match');
        $this->addError('confirm_password', 'passwords doesn\'t match');
      }
    }

    private function validateEmail() {
      
      $email = trim($this->form_data['email']);

      if (empty($email)) {
        return;
      }

      if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email)) {
        $this->addError('email', 'Email must be in email format');
      }
    }

    private function validateName() {

      $userName = trim($this->form_data['userName']);

      if (empty($userName)) {
        return;
      }
      
      if (!preg_match('/(?=.{2,})/', $userName)) {
        $this->addError('userName', 'User name must be two or more symbols');
      }

      if (!preg_match('/^[a-z A-Z]+$/', $userName)) {
        $this->addError('userName', 'User name must consist of only letters');
      }
    }

    private function addError($key, $message) {
      if (array_key_exists($key, $this->errors)) {
        $this->errors[$key] = $this->errors[$key] . "; " . $message;
       } else {
        $this->errors[$key] = $message; 
       }
    }
  }
?>